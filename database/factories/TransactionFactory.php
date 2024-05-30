<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'trans. ' . fake()->word,
            'date' => fake()->date,
            'amount' => fake()->randomElement(['1000', '20000', '150000']),
            'description' => fake()->text(20),
            'type' => fake()->randomElement(['income', 'expense']),
            'user_id' => User::factory(),
        ];
    }
}
