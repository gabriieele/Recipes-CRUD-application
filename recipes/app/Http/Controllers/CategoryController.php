<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
       
       
        foreach(Category::all() as $data){
            echo '<pre>';
            echo $data->name;
        }
    }

    public static function getCategoryIcon($categoryName) {
        switch ($categoryName) {
            case 'Vegetarian':
                return 'fa-leaf';
            case 'Breakfast meals':
                return 'fa-bread-slice';
            case 'Main courses':
                return 'fa-drumstick-bite';
            case 'Salads':
                return 'fa-carrot';
            case 'Soups':
                return 'fa-bowl-rice';
            case 'Desserts':
                return 'fa-ice-cream';
            case 'Seafood':
                return 'fa-shrimp';
            case 'Appetizers and snacks':
                return 'fa-pizza-slice';
            case 'Drinks':
                return 'fa-martini-glass';
            default:
                return 'fa-default-icon-class';
        }
    }
}
