<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Recipe::factory(9)->create();
        Category::factory()->create(['name' => 'Vegetarian']);
        Category::factory()->create(['name' => 'Breakfast meals']);
        Category::factory()->create(['name' => 'Main courses']);
        Category::factory()->create(['name' => 'Salads']);
        Category::factory()->create(['name' => 'Soups']);
        Category::factory()->create(['name' => 'Desserts']);
        Category::factory()->create(['name' => 'Seafood']);
        Category::factory()->create(['name' => 'Appetizers and snacks']);
        Category::factory()->create(['name' => 'Drinks']);
    }
}
