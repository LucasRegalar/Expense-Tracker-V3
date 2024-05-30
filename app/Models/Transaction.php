<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('primary_category')
            ->withTimestamps();
    }

    public function standingorder()
    {
        return $this->belongsTo(Standingorder::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
