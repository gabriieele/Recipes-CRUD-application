@extends('layouts.app')
@section('content')


<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">

Recipes by {{$user->name}} user


</li>
  </ol>
</nav>
       <h3 class="text-center my-3">
            Recipes uploaded by user {{$user->name}} 
        
       </h3>
       <div class="row">
            <div class="col-12">
                <div class="container d-flex flex-wrap gap-3 p-0">
                @foreach($recipes as $recipe)
                    <div class="card recipeCard rcard bg-white shadow-sm mb-3">
                    <a href="{{ route('recipe', $recipe->id)}}">
                        <div class="d-flex justify-content-center align-item-center">
                        <img class="recipeImg" src="{{ asset('storage/' . $recipe->image) }}" alt="recipe"></div></a>
                    <hr class="mx-2">
                    <h6 class="px-2 recipe-title m-0">{{$recipe->title}}</h6>
                    <p class="p-2 author-name" style="font-size: 12px;">Author: <a href="{{route('userRecipes', $recipe->user->id)}}" class="p-0">{{ $recipe->user->name }}</a> </p>
                    
</div>
                    @endforeach
                   
                    

                </div>
            </div>
        </div>
</div>
@endsection