<?php

namespace Database\Factories\Tests;

use AhrimFakhriy\Holdings\Tests\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory {
    protected $model = User::class;

    public function definition(): array {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make('password')
        ];
    }
}
