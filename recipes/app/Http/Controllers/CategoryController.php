<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
       
        //visi receptai
        foreach(Category::all() as $data){
            echo '<pre>';
            echo $data->name;
        }
    }
}
