<?php

namespace AhrimFakhriy\Holdings\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property ?Authenticatable user
 * @property ?Authenticatable hander
 * @property Model holdable
 *
 */
interface Holding {

    public function user(): BelongsTo;
    public function hander(): BelongsTo;
    public function holdable(): MorphTo;

}
