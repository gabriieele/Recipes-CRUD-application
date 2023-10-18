<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function index()
    {
        $data = Recipe::all();

        return view('home', ['data' => $data]);
    }
   

    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = Recipe::where('ingredients', 'like', '%' . $search . '%')
        ->Orwhere('title', 'like', '%' . $search . '%')
        ->get();

        return view('search.results', [
            'data' => $data,
            'keyword' => $search,
        ]);
    }
    
}
