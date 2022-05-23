<?php

namespace AhrimFakhriy\Holdings\Tests\Models;

use AhrimFakhriy\Holdings\Models\Holding;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements Authenticatable {
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function holds(): HasMany {
        return $this->hasMany(Holding::class);
    }

}
