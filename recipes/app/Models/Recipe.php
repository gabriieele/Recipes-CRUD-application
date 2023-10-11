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
}
