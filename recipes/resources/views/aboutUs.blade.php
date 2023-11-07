@extends('layouts.app')
@section('content')
<div class="container">

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">About me</li>
  </ol>
</nav>
 
<div class="card aboutCard shadow-lg mt-3" style="border-radius: 0;"> 
    
<div class="row">  
    <div class="col-6 d-flex justify-content-center align-items-center">
    <img src="profilePic2.png" alt="Profile picture" style="width: 500px;">
  </div>
  <div class="col-6 d-flex flex-column justify-content-center">
    <h2>About me</h2>
    <hr style="color: #706556; width: 550px; border-radius: 2px; border: 1px solid" class="mb-4">
 <p><i class="bi bi-person-fill"></i> Gabrielė Bataitytė</p> 
 <p><i class="bi bi-geo-alt-fill"></i> Vilnius, Lithuania</p> 
 <p><i class="bi bi-envelope-fill"></i> bataitytegabriele991@gmail.com</p> 
 
    <div class="d-flex gap-4">
        <div>
        <p><i class="bi bi-linkedin"></i> Connect with me on LinkedIn</p> 
        <img src="linkedin.png" alt="LinkedIn qr code" style="width: 100px;">
    </div>
      
    <div>
        <p><i class="bi bi-github"></i> Follow me on GitHub</p> 
        <img src="github.png" alt="Github qr code" style="width: 100px;">
    </div>

 </div>


  </div>
</div>
</div>
</div>



@endsection