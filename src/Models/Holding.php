<?php

namespace AhrimFakhriy\Holdings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 * @property string notes
 * @property array files
 * @property Carbon starts_at
 * @property Carbon ends_at
 *
 */
class Holding extends Model implements \AhrimFakhriy\Holdings\Contracts\Holding {
    use \AhrimFakhriy\Holdings\Traits\Holding;

    protected $guarded = [];

    protected $casts = [
        'files' => 'array',
    ];

}
