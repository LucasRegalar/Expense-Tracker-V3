<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($user, $categories): void
    {
        Transaction::factory()->count(20)->create([
            'user_id' => $user['id'],
        ])->each(function ($transaction) use ($categories) {
            $selectedCategories = $categories->where('type', $transaction->type)->random(2);

            // Attach accepts array of IDs of the related model (categories) and the values are arrays of additional pivot table attributes.
            $transaction->categories()->attach([
                $selectedCategories[0]->id => ['primary_category' => true],
                $selectedCategories[1]->id => ['primary_category' => false],
            ]);
        });

        $this->callWith(StandingorderSeeder::class, ['user' => $user]);
    }
}
