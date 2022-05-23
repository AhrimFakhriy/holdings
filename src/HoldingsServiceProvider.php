<?php

namespace AhrimFakhriy\Holdings;

use Illuminate\Support\ServiceProvider;

class HoldingsServiceProvider extends ServiceProvider {

    public function boot() {
        $this->mergeConfigFrom(__DIR__ . '/../config/holdings.php', 'holdings');
        $this->loadMigrationsFrom(__DIR__. '/../database/migrations');
    }

}
