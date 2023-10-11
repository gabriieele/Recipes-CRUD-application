<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(1, 5), true),
            'image' => 'https://picsum.photos/500/500/?' . rand(0, 1210000),
            'ingredients' => fake()->words(rand(1, 7), true),
            'description' => rand(1, 700)
        ];
    }
}
