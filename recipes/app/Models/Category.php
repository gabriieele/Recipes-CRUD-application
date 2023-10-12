<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name']; //kad leistu pildyti masiskai

  
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
