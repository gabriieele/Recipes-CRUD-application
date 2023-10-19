@extends('layouts.app')
@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My recipes</li>
  </ol>
</nav>
<h1 class="my-3">My recipes</h1>
@if(session()->has('success'))
    <div class=" mt-3 alert alert-success" id="message">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class=" mt-3 alert alert-danger" id="message">
        {{ session()->get('error') }}
    </div>
@endif
@foreach($recipes as $recipe)
<div class="card recipeCard bg-white shadow-sm mb-3">
    <div class="row align-items-center">
        <div class="col-2">
            <a href=""><img class="recipeImg p-3" src="{{ asset('storage/' . $recipe['image']) }}" alt="recipe"></a>
        </div>
        <div class="col-8">
            <h4 class="pt-3">{{$recipe['title']}}</h4>
            <p>{{ Str::words($recipe['description'], 50, '...') }}</p>
        </div>
        <div class="col-2">
        <button class="btn btn-primary">Edit</button>
        <a href="{{ route('delete', $recipe['id']) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection