<?php

namespace AhrimFakhriy\Holdings\Tests\Models;

use AhrimFakhriy\Holdings\Models\Holding;
use Database\Factories\Tests\UserFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements Authenticatable {
    use HasFactory, \Illuminate\Auth\Authenticatable;

    protected $guarded = [];

    protected static function newFactory() {
        return UserFactory::new();
    }

    public function holds(): HasMany {
        return $this->hasMany(Holding::class);
    }

}
