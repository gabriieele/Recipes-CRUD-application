<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'ingredients',
        'description',
        'author'
    ];

    public function formatIngredients()
{
    return explode(',', $this->ingredients);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function ratings()
{
    return $this->hasMany(Rating::class);
}
}
