<?php

namespace AhrimFakhriy\Holdings\Tests\Models;

use AhrimFakhriy\Holdings\Contracts\Holdable;
use AhrimFakhriy\Holdings\Models\Holding;
use AhrimFakhriy\Holdings\Traits\Holdable as HoldableTrait;
use Database\Factories\Tests\FileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class File extends Model implements Holdable {
    use HasFactory, HoldableTrait;

    protected $guarded = [];

    protected static function newFactory() {
        return FileFactory::new();
    }

    public function holding(): MorphOne {
        return $this->morphOne(Holding::class, 'holdable');
    }

}
