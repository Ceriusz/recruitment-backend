<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->firstName() . fake()->lastName(),
            'year' => fake()->year(),
            'description' => fake()->text(),
            'quantity' => fake()->randomNumber(3),
            'category_id' => fake()->randomDigitNot(0)
        ];
    }
}
