
@extends('layouts.app')
@section('content')


<div class="container">
       
       <h1 class="text-center my-3">Recipes found by {{$keyword}}</h1>
    
    <div class="row">
        <div class="col-12">
            <div class="container d-flex justify-content-center flex-wrap gap-3">
            @foreach ($data as $recipe)
                <div>
                <a href=""><img class="recipeImg" src="{{ asset('storage/' . $recipe['image']) }}" alt="recipe">
                <h3>{{$recipe['title'][0]}}</h3></a>
</div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection