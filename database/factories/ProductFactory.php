<?php

namespace Database\Factories;

use App\Models\categories;
use App\Models\sub_categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */

    public function definition(): array
    {
        $cat = categories::inRandomOrder()->first();
        $sub = sub_categories::inRandomOrder()->first();
        return [
            'item_name' => fake()->domainName(),
            'price' => $this->faker->numberBetween(20, 300),
            'cat_id' => $cat->cat_id,
            'sub_cat_id' => $sub->sub_cat_id,
            'width' => $this->faker->numberBetween(1, 10),
            'weight' => $this->faker->numberBetween(1, 10),
            'height' => $this->faker->numberBetween(1, 10),
            'width' => $this->faker->numberBetween(1, 10),
            'length' => $this->faker->numberBetween(1, 10),
            'stock' => $this->faker->numberBetween(1, 10),
            'prevImg' => $this->faker->numberBetween(1, 10),
        ];
    }
}
