<?php

namespace AhrimFakhriy\Holdings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCase extends \Orchestra\Testbench\TestCase {
    use RefreshDatabase;

    public function setUp(): void {

        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    }

    protected function getEnvironmentSetup($app) {

        // Database
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

    }

    protected function getPackageProviders($app) {
        return [];
    }


}
