<?php

namespace AhrimFakhriy\Holdings\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

trait Holding {

    public function user(): BelongsTo {
        return $this->morphTo();
    }

    public function hander(): BelongsTo {
        return $this->morphTo();
    }

    public function holdable(): MorphTo {
        return $this->morphTo();
    }

}
