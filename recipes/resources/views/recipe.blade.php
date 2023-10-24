@extends('layouts.app')
@section('content')
        <div class="card recipeCard bg-white shadow-sm mb-3">
            <div class="row align-items-center">
                <div class="col-2">
                <img class="recipeImg p-3" src="{{ asset('storage/' . $recipe->image) }}" alt="recipe">

                </div>
                <div class="col-10">
                    <h4 class="pt-3">{{$recipe->title}}</h4>
                    <p>{{$recipe->description}}</p>
                </div>
            
            </div>
        </div>
@endsection