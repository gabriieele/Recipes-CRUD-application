<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class PrivateController extends Controller
{
    public function newRecipe() {
        $categories = Category::all();
        return view('forms.upload', [
            'categories' => $categories
        ]);
 
    }


 public function saveRecipe(Request $request) {
    
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
    
}

public function editRecipe(int $id) {
    $recipe = Recipe::find($id);
    $categories = Category::all();
    return view('forms.edit', [
        'recipe' => $recipe, 
        'categories' => $categories
    ]);
}

public function saveEdit(Request $request, int $id) {

        $validated = $request->validate([
            'title' => 'required|min:3|max:200', 
            'image' => 'max:10000|mimes:jpg,png',
            'ingredients' => 'required|min:3', 
            'description' => 'required|min:3', 
            'category' => 'required|exists:categories,id',
        ]);

        $recipe = Recipe::find($id);
        $oldImage = $recipe->image;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('photos', 'public');
      
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }
     
        $validated['category_id'] = $request->input('category');
        $validated['user_id'] = auth()->user()->id;

        Recipe::find($id)->update($validated);

        return redirect()->route('myRecipes')->with('success', 'Recipe updated successfully');
    
}

    public function delete(int $id) {
        try{
            $recipe = Recipe::find($id); 
            $img = $recipe->image;
            $recipe->delete();
           
            if ($img) {
                Storage::disk('public')->delete($img);
            }

        return redirect()->route('myRecipes')->with('success', 'Recipe deleted successfully');
        
        }

        catch (\Exception $e) {
            return redirect()->route('myRecipes')->with('error', 'Failed to delete the recipe');
        }
       
    }

 
}
