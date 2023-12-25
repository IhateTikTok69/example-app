<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\rooms>
 */
class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->numberBetween(200, 1000),
            'availability' => $this->faker->boolean,
            'wifi' => $this->faker->boolean,
            'gym' => $this->faker->boolean,
            'breakfast' => $this->faker->boolean,
            'park' => $this->faker->boolean,
            'smoking' => $this->faker->boolean,
            'pool' => $this->faker->boolean,
        ];
    }
}
