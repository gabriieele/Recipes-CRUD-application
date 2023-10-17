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
    public function saveNew(Request $request) {
     
        $song = Recipe::create($request->all());
    }

    public function editForm(int $id) {
        return view('form');
    }

    public function saveEdit (
        int $id, 
        Request $request
    ) {

        //Mass Update 
        try {
            Recipe::find($id)->update($request->all());
        } catch(\Exception $e) {
            //Atvaizduojama žinutė
        }
    }

    public function delete(int $id) {
        Recipe::find($id)->delete();
    }
}
