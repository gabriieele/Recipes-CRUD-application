<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class PrivateController extends Controller
{
    public function newRecipe(Request $request) {
        $categories = Category::all();
        return view('forms.upload', [
            'categories' => $categories]);
 
    }


 public function saveRecipe(Request $request) {
    try {
        $validated = $request->validate([
            'title' => 'required|min:3|max:200', 
            'image' => 'required|max:10000|mimes:jpg,png',
            'ingredients' => 'required|min:3', 
            'description' => 'required|min:3', 
            'category' => 'required|exists:categories,id',
        ]);

        $validated['image'] = $request->file('image')->store('photos', 'public');
        $validated['category_id'] = $request->input('category');
        $validated['user_id'] = auth()->user()->id;

        Recipe::create($validated);

        return redirect()->route('myRecipes')->with('success', 'Recipe uploaded successfully');
    } catch (\Exception $e) {
        return redirect()->route('newRecipe')->with('error', 'Failed to upload the recipe');
    }
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
        try{
            Recipe::find($id)->delete();
        return redirect()->route('myRecipes')->with('success', 'Recipe deleted successfully');; 
        }

        catch (\Exception $e) {
            return redirect()->route('myRecipes')->with('error', 'Failed to delete the recipe');
        }
       
    }
}
