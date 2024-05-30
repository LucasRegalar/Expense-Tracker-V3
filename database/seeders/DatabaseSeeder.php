<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Standingorder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);

        
        $image = Image::factory()->create([
            'user_id' => $user['id']
        ]);
        
        $categories = Category::factory()->count(5)->create([
            'image_id' => $image['id'],
            'user_id' => $user['id']
        ]);
        
        Transaction::factory()->count(5)->create([
            'user_id' => $user['id'],
        ])->each(function ($transaction) use ($categories) {
            $selectedCategories = $categories->random(2);

            // Attach accepts array of IDs of the related model (categories) and the values are arrays of additional pivot table attributes.
            $transaction->categories()->attach([
                $selectedCategories[0]->id => ['primary_category' => true],
                $selectedCategories[1]->id => ['primary_category' => false],
            ]);
        });

        Standingorder::factory()->count(2)->create([
            'user_id' => $user['id'],
        ]);
        
    }
}
