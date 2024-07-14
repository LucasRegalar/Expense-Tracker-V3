<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'cat. ' . fake()->word,
            'type' => fake()->randomElement(['income', 'expense']),
            'image_id' => Image::factory(),
            'user_id' => User::factory(),
        ];
    }
}
