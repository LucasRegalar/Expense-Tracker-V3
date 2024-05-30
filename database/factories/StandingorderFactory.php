<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Standingorder>
 */
class StandingorderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'standingorder ' . fake()->word,
            'starting_date' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'end_date' => null,
            'interval' => fake()->randomElement(['daily', 'weekly', 'monthly', 'quarterly', 'yearly']),
            'description' => fake()->text(15),
            'user_id' => User::factory(),
        ];
    }
}
