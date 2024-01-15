<?php

namespace Database\Factories;

use App\Models\countries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cities>
 */
class CitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $country = countries::inRandomOrder()->first();
        return [
            'city' => fake()->city(),
            'country_id' => $country->country_id,
        ];
    }
}
