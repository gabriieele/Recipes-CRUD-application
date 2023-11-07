<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request, int $id) {
    
            if (auth()->check()) {
            $validated = $request->validate(
                [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:3|max:300',
        ],
        [
        'content.required' => 'The comment field is required.',
        'content.min' => 'The comment must be at least 3 characters.',
        'content.max' => 'The comment must not be greater than 300 characters.',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['recipe_id'] = $id;
        
        Comment::create($validated);
   
        return redirect()->route('recipe', ['id' => $id])->with('success', 'Comment posted!');
        }
        else{
            return redirect()->route('recipe', ['id' => $id])->with(['user' => 'Only registered users can comment, please log in!']);
        }

       
        
    }

    
    public function showEdit(int $id){
        $data = Recipe::find($id);
        $comments = Comment::where('recipe_id', $id)->get();
        $rating = Rating::select(DB::raw('ROUND(AVG(rating), 2) as rating'))
        ->where('recipe_id', $data->id)
        ->first();
        $editMode = true;
        
        return view('recipe-page.recipe', [
            'recipe' => $data,
            'comments' => $comments,
            'rating' => $rating,
            'editMode' => $editMode
        ]);
    }

  public function edit(Request $request, int $id) {
        if (auth()->check()) {
            $validated = $request->validate(
                [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:3|max:300'
        ],
        [
        'content.required' => 'The comment field is required.',
        'content.min' => 'The comment must be at least 3 characters.',
        'content.max' => 'The comment must not be greater than 300 characters.',
        ]);

        $comment = Comment::find($id);
        $validated['recipe_id'] = $comment->recipe_id;
        $recipeId = $comment->recipe_id;
        $validated['user_id'] = auth()->user()->id;
        $validated['edited'] = true;

        $comment->update($validated);
   
        return redirect()->route('recipe', ['id' => $recipeId])->with('success', 'Comment updated!');
        }
    }

    public function delete(int $id) {
        if (auth()->check()) {
        try{
            
            $comment = Comment::find($id); 
            $comment->delete();
            $recipeId = $comment->recipe_id;
            return redirect()->route('recipe', ['id' => $recipeId])->with('success', 'Comment deleted successfully!');
        }
    

        catch (\Exception $e) {
            return redirect()->route('recipe', ['id' => $recipeId])->with('error', 'Failed to delete the comment');
        }
    }
    }
}
