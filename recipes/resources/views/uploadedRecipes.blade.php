@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My recipes</li>
        </ol>
    </nav>

    <form method="POST" id="deleteForm">
        @csrf
@method('DELETE')
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure you want to delete the recipe?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                    <a href="{{ route('edit', $recipe['id']) }}"> <button class="btn btn-primary">Edit</button> </a>
                    <button class="btn btn-danger del-recipe" data-url="{{ route('delete', $recipe['id']) }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
