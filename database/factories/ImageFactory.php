<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => 'resources/imgs/icons/categories/coins-solid.svg',
            'type' => 'category_icon',
            'mime_type' => 'image/svg+xml',
            'user_id' => User::factory(),
            'shared' => true,
        ];
    }
}
