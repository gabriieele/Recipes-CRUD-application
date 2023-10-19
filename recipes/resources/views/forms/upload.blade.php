
@extends('layouts.app')
@section('content')

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Upload a recipe</li>
  </ol>
</nav>

@if(session()->has('error'))
<div class="mt-3 alert alert-danger" id="message">
        {{ session()->get('error') }}
    </div>
@endif
    <h1 class="my-3">Upload a recipe</h1>
    <form class="my-3 addNew" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="mb-3">
            <label>Recipe title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Ingredients:</label>
            <textarea class="form-control" placeholder="Enter ingredients" name="ingredients" rows="7"></textarea>
        </div>
        <div class="mb-3">
            <label>Description:</label>
            <textarea class="form-control" placeholder="Enter description" name="description" rows="7"></textarea>
        </div>
        <div class="mb-3">
            <label>Category:</label>
            <select class="form-select" name="category">
            <option selected>Select a category</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>

            
        </div>
       
        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection