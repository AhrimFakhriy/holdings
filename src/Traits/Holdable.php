<?php

namespace AhrimFakhriy\Holdings\Traits;

use AhrimFakhriy\Holdings\Models\Holding;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Holdable {

    public function hold(): MorphOne {
        return $this->morphOne(Holding::class, 'holdable')->ofMany('starts_at', 'max');
    }

    public function handsTo(?Authenticatable $user = null, ?Authenticatable $from = null, array $files = [], ?string $notes = null) {

        if (auth()->check()) {
            $user ??= auth()->user();
            $from ??= auth()->user();
        }

        $this->hold()?->update(['ends_at' => now()]);

        $this->hold()->create([
            'user_id'       => $user?->getAuthIdentifier(),
            'user_type'     => $user?->getMorphClass(),
            'hander_id'     => $from?->getAuthIdentifier(),
            'hander_type'   => $from?->getMorphClass(),
            'files'         => $files,
            'notes'         => $notes,
            'starts_at'     => now(),
        ]);

    }

}
