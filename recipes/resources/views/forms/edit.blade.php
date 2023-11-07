
@extends('layouts.app')
@section('content')

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update a recipe</li>
  </ol>
</nav>

@if (session()->has('success'))
    <div class="mt-3 alert alert-success shadow-sm" id="message">
        {{ session()->get('success') }}
    </div>
@endif
    <h1 class="my-3">Update a recipe</h1>
    <form class="my-3 addNew" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div class="mb-3">
            <label>Recipe title</label>
            <input type="text" name="title" class="form-control shadow-sm @error('title') is-invalid @enderror" value="{{ $recipe->title }}">
            @error('title')
             <span class="error text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Ingredients:</label>
            <textarea class="form-control shadow-sm @error('ingredients') is-invalid @enderror" placeholder="Enter ingredients" name="ingredients" rows="7">{{ $recipe->ingredients }}</textarea>
            @error('ingredients')
             <span class="error text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea class="form-control shadow-sm @error('description') is-invalid @enderror" placeholder="Enter description" name="description" rows="7">{{ $recipe->description }}</textarea>
            @error('description')
             <span class="error text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <select class="form-select shadow-sm @error('category') is-invalid @enderror" name="category">
            <option selected value="{{ $recipe->category_id }}">{{ $recipe->category->name }}</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
            @error('category')
             <span class="error text-danger">{{$message}}</span>
            @enderror

        </div>
       
        <div class="mb-3">
    <label>Current Image:</label>
    <img src="{{ asset('storage/' . $recipe->image) }}" alt="Current Recipe Image" class="mb-2" style="max-width: 200px;">
</div>
<div class="mb-3">
    <label>New Image:</label>
    <input type="file" name="image" class="form-control">
</div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
