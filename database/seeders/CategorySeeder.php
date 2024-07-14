<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($user): void
    {
        $categoriesData = [
            [
                'path' => 'resources/imgs/icons/categories/bitcoin.svg',
                'title' => 'investment',
                'type' => 'income',
            ],
            [
                'path' => 'resources/imgs/icons/categories/coins-solid.svg',
                'title' => 'freelance',
                'type' => 'income',
            ],
            [
                'path' => 'resources/imgs/icons/categories/money-bill-solid.svg',
                'title' => 'salary',
                'type' => 'income',
            ],
            [
                'path' => 'resources/imgs/icons/categories/piggy-bank-solid.svg',
                'title' => 'rental income',
                'type' => 'income',
            ],
            [
                'path' => 'resources/imgs/icons/categories/sack-dollar-solid.svg',
                'title' => 'goverment benefits',
                'type' => 'income',
            ],
            [
                'path' => 'resources/imgs/icons/categories/wallet-solid.svg',
                'title' => 'child support',
                'type' => 'income',
            ],

            // Expenses

            [
                'path' => 'resources/imgs/icons/categories/house-solid.svg',
                'title' => 'rent',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/credit-card-regular.svg',
                'title' => 'debt payments',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/internet-explorer.svg',
                'title' => 'subscriptions',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/cart-shopping-solid.svg',
                'title' => 'groceries',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/bus-solid.svg',
                'title' => 'transportation',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/car-burst-solid.svg',
                'title' => 'insurance',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/utensils-solid.svg',
                'title' => 'dining out',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/tv-solid.svg',
                'title' => 'entertainment',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/shirt-solid.svg',
                'title' => 'clothing',
                'type' => 'expense',
            ],
            [
                'path' => 'resources/imgs/icons/categories/baseball-bat-ball-solid.svg',
                'title' => 'hobbies',
                'type' => 'expense',
            ],

        ];

        $categories = collect([]);
        
        foreach ($categoriesData as $data) {
            $image = Image::factory()->create([
                'user_id' => $user['id'],
                'path' => $data['path'],
            ]);

            $category = Category::factory()->create([
                'image_id' => $image['id'],
                'user_id' => $user['id'],
                'title' => $data['title'],
                'type' => $data['type'],
            ]);

            $categories->push($category);
        }

        $this->callWith(TransactionSeeder::class, [
            'user' => $user,
            'categories' => $categories,
        ]);
    }
}
