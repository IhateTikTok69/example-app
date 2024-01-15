<?php

namespace Database\Factories;

use App\Models\categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sub_categories>
 */
class Sub_CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cat = categories::inRandomOrder()->first();
        return [
            'cat_id' => $cat->cat_id,
            'sub_category' => fake()->word(),
        ];
    }
}
