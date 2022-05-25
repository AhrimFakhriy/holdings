<?php

namespace AhrimFakhriy\Holdings\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Holdable {
    public function hold(): MorphOne;
    public function handsTo(?Authenticatable $user = null, ?Authenticatable $from = null);
}
