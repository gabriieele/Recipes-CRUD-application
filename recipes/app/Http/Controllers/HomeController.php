<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     //uzkomentuota, kad nedirectintu neprisijungusiu vartotoju i logina
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $recipes = Recipe::orderBy('created_at', 'desc')->paginate(12);

        return view('home', [
            'categories' => $categories,
            'recipes' => $recipes

    ]);
    }

    
}
