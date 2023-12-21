<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomNum' => $this->faker->unique()->numberBetween(1, 10),
            'wifi' => $this->faker->boolean,
            'gym' => $this->faker->boolean,
            'breakfast' => $this->faker->boolean,
            'park' => $this->faker->boolean,
            'smoking' => $this->faker->boolean,
            'pool' => $this->faker->boolean,
        ];
    }
}
