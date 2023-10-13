<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  

    public function index()
    {
        $data = \App\Models\Category::all();

        return view('home', ['data' => $data]);
    }
}
