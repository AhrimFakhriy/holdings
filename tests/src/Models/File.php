<?php

namespace AhrimFakhriy\Holdings\Tests\Models;

use AhrimFakhriy\Holdings\Models\Holding;
use Database\Factories\Tests\FileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class File extends Model {
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory() {
        return FileFactory::new();
    }

    public function holding(): MorphOne {
        return $this->morphOne(Holding::class, 'holdable');
    }

}
