<?php

namespace AhrimFakhriy\Holdings\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Holdable {
    public function hold(): MorphOne;
}
