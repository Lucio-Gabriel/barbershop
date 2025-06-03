<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BarberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'   => $this->faker->name(),
            'email'  => $this->faker->unique()->safeEmail(),
            'avatar' => $this->faker->imageUrl(300, 300, 'people'),
            'rating' => $this->faker->randomFloat(1, 3.0, 5.0),
            'active' => $this->faker->boolean(90),
        ];
    }
}
