<?php

namespace Database\Factories\Tests;

use AhrimFakhriy\Holdings\Tests\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory {

    protected $model = File::class;

    public function definition(): array {
        return [
            'name' => $this->faker->name,
        ];
    }

}
