<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //auth:routes kad veiktu
// use App\Models\Recipe;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//



//prisijungus
Route::get('/recipes/new', [PrivateController::class, 'newRecipe'])->name('newRecipe');
Route::post('/recipes/new', [PrivateController::class, 'saveRecipe'])->name('saveRecipe');

//edit
Route::get('/recipes/edit/{id}', [PrivateController::class, 'editRecipe'])->name('edit');
Route::put('/recipes/edit/{id}', [PrivateController::class, 'saveEdit'])->name('saveEdit');

//delete
Route::get('/myrecipes', [RecipeController::class, 'uploadedRecipes'])->name('myRecipes');
Route::delete('/myrecipes/delete/{id}', [PrivateController::class, 'delete'])->name('delete');

//receptas
Route::get('/recipes/{id}', [RecipeController::class, 'showRecipe'])->name('recipe');
Route::post('/recipes/comment/{id}', [CommentController::class, 'index'])->name('comment');
Route::delete('/recipes/comment/delete/{id}', [CommentController::class, 'delete'])->name('deleteComment');
Route::get('/recipes/comment/edit/{id}', [CommentController::class, 'showEdit'])->name('showEdit');
Route::post('/recipes/comment/edit/{id}', [CommentController::class, 'edit'])->name('editComment');


Route::post('/recipes/rating/{id}', [RatingController::class, 'index'])->name('ratings');


//category
Route::get('category/{id}', [RecipeController::class, 'recipeByCategory'])->name('category');
Route::get('/category', [RecipeController::class, 'allRecipes'])->name('allRecipes');

Route::get('/recipes/user/{id}', [RecipeController::class, 'recipeByUser'])->name('userRecipes');

//logout
Route::get('logout', [LoginController::class, 'logout'])->name('home');

Auth::routes(); 

//homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [RecipeController::class, 'search'])->name('search');

Route::get('/aboutus', function () {
    return view('aboutUs');
})->name('aboutUs');


