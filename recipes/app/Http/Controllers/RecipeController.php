<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function index()
    {
        $data = Recipe::all();

        return view('home', [
            'data' => $data
        ]);
    }

    public function recipeByCategory(int $id){
        $categories = Category::all();
        $category = Category::find($id);
        $recipes = $category->recipes()->paginate(12);
    
        return view('filtered-recipes.category', [
            'category' => $category,
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    public function allRecipes() {

        $categories = Category::all();
        $recipes = Recipe::whereIn('category_id', $categories->pluck('id'))->paginate(12);
    
        return view('filtered-recipes.category', [
            'category' => null, 
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    //show one recipe
    public function showRecipe(int $id){
        $data = Recipe::find($id);
        $comments = Comment::where('recipe_id', $id)->get();
        $rating = Rating::select(DB::raw('ROUND(AVG(rating), 2) as rating'))
        ->where('recipe_id', $data->id)
        ->first();
        $editMode = false;
        
        return view('recipe-page.recipe', [
            'recipe' => $data,
            'comments' => $comments,
            'rating' => $rating,
            'editMode' => $editMode
        ]);
    }

 
    public function uploadedRecipes()
    {
        $user = auth()->user();
        $recipes = $user->recipes()->orderBy('created_at', 'desc')->paginate(10);

        return view('loggedin-user-pages.uploadedRecipes', [
            'recipes'=> $recipes
        ]);
    }
    public function recipeByUser(int $id)
    {
        $user = User::find($id);
        $recipes =  $user->recipes()->orderBy('created_at', 'desc')->paginate(10);

        return view('filtered-recipes.userRecipes', [
            'recipes'=> $recipes,
            'user' => $user,
        ]);
    }
   

    public function search(Request $request)
    {
        $search = $request->input('q');
        
        $data = Recipe::where('ingredients', 'like', '%' . $search . '%')
        ->Orwhere('title', 'like', '%' . $search . '%')
        //user rysys
        ->orWhereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(12);
        
        return view('search.results', [
            'recipes' => $data,
            'keyword' => $search
        ]);
    }
    
  
}
