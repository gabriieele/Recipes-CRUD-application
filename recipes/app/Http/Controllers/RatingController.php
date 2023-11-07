<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index(Request $request, int $id)
    {
        if (auth()->check()) {
            $validated = $request->validate([
                'star' => 'required|integer|between:1,5',
            ]);

            $user = auth()->user()->id;
            $ratingExist = Rating::where('recipe_id', $id)
            ->where('user_id', $user)
            ->first();

            if ($ratingExist) {
                $ratingExist->update(['rating' => $validated['star']]);
            } 
            else {
                $validated['user_id'] = $user;
                $validated['recipe_id'] = $id;
                $validated['rating'] = $validated['star'];
                Rating::create($validated);
            }

        return redirect()->route('recipe', ['id' => $id])->with('success', 'Rating submitted!');
        } 
        else{
            return redirect()->route('recipe', ['id' => $id])->with(['user' => 'Only registered users can submit a rating, please log in!']);
        }
        

    }
}
