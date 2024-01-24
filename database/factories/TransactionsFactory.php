<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();
        return [
            'product_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 20),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'receipt_id' => fake()->numerify('ORDER-#######'),
            'bill' => $this->faker->numberBetween(30, 60),
            'status' => $this->faker->randomElement(['created', 'paid', 'completed', 'canceled', 'in-shipment']),
            'created_at' => $this->faker->dateTimeBetween($startDate, $endDate),
        ];
    }
}
