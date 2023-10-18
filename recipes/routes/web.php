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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/recipes',[RecipeController::class, 'index']);
Route::get('/categories',[CategoryController::class, 'index']);


Route::get('/recipes/new', [PrivateController::class, 'newRecipe'])->name('newRecipe');
Route::post('/recipes/new', [PrivateController::class, 'saveRecipe'])->name('saveRecipe');


Route::get('/recipes', [PrivateController::class, 'allRecipes'])->name('uploadedRecipes');


// Route::get('/recipes/edit/{id}', [RecipeController::class, 'editForm']);
// Route::post('/recipes/edit/{id}', [RecipeController::class, 'saveEdit']);
// Route::get('/recipes/delete/{id}', [RecipeController::class, 'delete']);

Auth::routes(); 

//homepage
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/search', [RecipeController::class, 'search'])->name('search')->middleware('web');

//logout
Route::get('logout', [LoginController::class, 'logout'])->name('home');;
