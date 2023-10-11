<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes',[RecipeController::class, 'index']);
Route::post('/recipes/new', [RecipeController::class, 'saveNew']);
Route::get('/recipes/edit/{id}', [RecipeController::class, 'editForm']);
Route::post('/recipes/edit/{id}', [RecipeController::class, 'saveEdit']);
Route::get('/recipes/delete/{id}', [RecipeController::class, 'delete']);
// Route::get('/songs/2', [SongController::class, 'singleSong']);
// Route::get('/songs/where', [SongController::class, 'where']);
// Route::get('/songs/or-where', [SongController::class, 'orWhere']);
// Route::get('/songs/and-where', [SongController::class, 'andWhere']);
// Route::get('/songs/new', [SongController::class, 'newForm']);
