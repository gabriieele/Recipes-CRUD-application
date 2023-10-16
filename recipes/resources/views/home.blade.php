
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css" />

    <title>Home</title>

</head>
<body>
@php
use App\Http\Controllers\CategoryController;
@endphp
@section('content')
    
<header>
@extends('layouts.app')
</header>
<main>
    <section class="section1 d-flex align-items-center">
               <div class="container">
        <div class="row ">
            <div class="col-12">
                <h2 class="text-center">What are you cooking today?</h2>
            </div>
        </div>
    </div>

    <!-- --------------------- -->
    </section>
    <section class="section2 d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container d-flex overflow-hidden gap-3">
                    @foreach($data as $category)
                        <a href='/recipes'>
                            <div class="card categoryCard d-flex justify-content-center align-items-center">
                            <i class="fas {{ CategoryController::getCategoryIcon($category['name']) }} mb-3"></i> {{$category['name']}}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

</main>

@endsection

<script src="https://kit.fontawesome.com/33ae1132d9.js" crossorigin="anonymous"></script>
</body>
</html>

