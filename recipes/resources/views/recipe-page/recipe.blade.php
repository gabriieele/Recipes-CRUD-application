@extends('layouts.app')
@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$recipe->title}}</li>
  </ol>
</nav>

<form method="POST" id="deleteForm">
        @csrf
@method('DELETE')
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure you want to delete the comment?</h1>
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

@if (session()->has('success'))
    <div class="mt-3 alert alert-success shadow-sm" id="message">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('user'))
    <div class="mt-3 alert alert-danger shadow-sm" id="message">
    {{ session()->get('user') }}
    </div>
@endif
        <div class="bg-white shadow-sm my-4">
            <div class="row gap-5">
                <div class="col-4 m-3">       
                    <h1>{{$recipe->title}}</h1> 
 <h6>
    @if($rating->rating > 0)
        Rating: {{ $rating->rating }}
    @else
        This recipe has no ratings yet
    @endif
</h6>
@if ($rating->rating > 0)
    <form method="POST" action="{{ route('ratings', $recipe->id) }}" id="ratingForm">
        @csrf
        <div class="rating">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{$i}}" name="star" value="{{$i}}" {{ $rating->rating <= $i ? 'checked' : '' }}>
                <label for="star{{$i}}"><i class="fa fa-star"></i></label>
            @endfor
        </div>
        <div class="rating">
   
</div>
    </form>
@else
    <form method="POST" action="{{ route('ratings', $recipe->id) }}" id="ratingForm">
        @csrf
        <div class="rating">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" id="star{{ $i }}" name="star" value="{{ $i }}">
                <label for="star{{ $i }}"><i class="fa fa-star"></i></label>
            @endfor
        </div>
    </form>
@endif
<img class="mb-3" src="{{ asset('storage/' . $recipe->image) }}" alt="recipe">
                <h4>Ingredients:</h4>
                    <p>{!! nl2br(e($recipe->ingredients)) !!}</p>
                </div>
                <div class="col-6 my-3">
                    <h4 class="mt-3">Instructions:</h4>
                    <p>{!! nl2br(e($recipe->description)) !!}</p>
                    <div class="card comments shadow-lg p-3">
                        <h4 class="mb-3">Comments</h4>
         @if($comments->isEmpty())
        <p>This recipe has no comments</p>
    @else
                      
        @foreach($comments as $comment)
            <div class="card p-2 mb-3 shadow-sm border-0" style="background-color: #eff0f2"> 
               <div class="del-btn-div d-flex justify-content-end">    
            </div>
            <div class="d-flex justify-content-between gap-2">
            <h6 class="mb-1" style="font-size: 13px; color: rgb(87, 87, 87);">{{ $comment->user->name }}</h6> 
            @if ($comment->edited)
            <span style="font-size: 10px;"> Edited {{ $comment->updated_at->diffForHumans() }}</span>
            @else
            <span style="font-size: 10px;"> Commented {{ $comment->created_at->diffForHumans() }}</span>
            @endif
</div>
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
             <h5 class="mb-1">{{ $comment->title }}  
            @if ($comment->edited)
    <span style="font-size: 10px; color:grey">(Edited)</span>
        @endif
</h5>
            
                </div>
            </div>

            <div class="row">
    <div class="col-md-10">
        <p class="mb-0">{!! nl2br(e($comment->content)) !!}</p>
    </div>
    @if (auth()->check() && auth()->user()->id === $comment->user->id)
    <div class="col-2">
        <div class="text-end">
            <button type="submit" class="del commentButton delBtn" data-url="{{ route('deleteComment', $comment->id) }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-trash3"></i></button>
            <a href="{{ route('showEdit', $recipe->id) }}">
                <button type="submit" class="commentButton editBtn"><i class="bi bi-pencil"></i></button>
            </a>
        </div>
    </div>
    @endif
</div>
           </div>
        @endforeach
        @endif
                        <form id="form" class="my-3" method="POST" action="{{ $editMode ? route('editComment', $comment->id) : route('comment', $recipe->id) }}">
                        @csrf
                        <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" style="background-color: #eff0f2" value="{{ old('title', $editMode ? $comment->title : '') }}">
                         @error('title')
                        <span class="error text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="mb-3">
                        <label>Leave a comment</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="What's on your mind?" rows="7" style="background-color: #eff0f2">{{ old('content', $editMode ? $comment->content : '') }}</textarea>
                        @error('content')
                        <span class="error text-danger">{{$message}}</span>
                        @enderror
                        </div>

            <button class="btn btn-primary" type="submit">{{ $editMode ? 'Update' : 'Post' }}</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div></div>
        @if($editMode || $errors->any())
            <script>
                document.getElementById('form').scrollIntoView();
            </script>
        @endif
        

@endsection
<script src="https://kit.fontawesome.com/33ae1132d9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

