<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'     => User::factory(),
            'name'        => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
            'time'        => $this->faker->numberBetween(30, 180),
            'price'       => $this->faker->numberBetween(50, 1000),
        ];
    }
}
