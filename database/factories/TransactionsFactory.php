<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomNum' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 100),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'bill' => $this->faker->numberBetween(200, 300),
            'status' => $this->faker->randomElement(['created', 'paid', 'completed']),
        ];
    }
}
