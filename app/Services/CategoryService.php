<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getCategories(): Collection
    {
        return Category::get();
    }
    public function getPrimaryCategory(Transaction $transaction): Category
    {
        return $transaction->categories()->where('primary_category', true)->first();
    }

    public function getSecondaryCategory(Transaction $transaction): Category
    {
        return $transaction->categories()->where('primary_category', false)->first();
    }

    public function findCategoryByName(string $categoryName): Category
    {
        return Category::where('title', $categoryName)->firstOrFail();
    }
}
