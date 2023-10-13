<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Document</title>

    <style>

.search input, .search-btn{
border-radius: 80px;
}
.search{
width: 500px;
}

.search-btn{
    background-color: white;
    border: 1px solid #dee2e6;
}

.nav-cont{
    gap: 50px;
}

.section1{
    height: 400px;
    background: url('food.jpg') no-repeat center/cover;
}
.section2{
    height: 400px;
    background-color: #f8f9fa;
}

.card{
    height:200px;
    width: 200px;
    margin-right: 10px;
    background-color: #dfd1bf;
    border: 1px solid #dee2e6;
}

.fa, .fas {
    font-size: 35px;
}

    </style>
</head>
<body>
    @extends('layouts.main')

@section('title', 'Home Page')

@section('content')
    
<header>
<nav class="navbar bg-body-tertiary py-3">
  <div class="container nav-cont justify-content-center">
     <form class="d-flex input-group search" role="search">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
      <button class="btn search-btn" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <div>
    <button class="btn btn-light">Log in</button>
    <button class="btn btn-light">Register</button>
   </div>
  </div>
</nav>
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
                            <div class="card d-flex justify-content-center align-items-center">
                                <i class="fas fa-fw {{ getCategoryIcon($category['name']) }} mb-3"></i> {{$category['name']}}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ---------------------- -->
</main>

@endsection
<?php
function getCategoryIcon($categoryName) {
    switch ($categoryName) {
        case 'Vegetarian':
            return 'fa-leaf';
        case 'Breakfast meals':
            return 'fa-bread-slice';
        default:
            return 'fa-default-icon-class';
    }
}
?>
</body>
</html>
