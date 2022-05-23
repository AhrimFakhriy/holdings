<?php

namespace AhrimFakhriy\Holdings\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Holder {
    public function holds(): HasMany;
}
