@php
    use App\Http\Controllers\CategoryController;
@endphp

<section class="section2">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-12 owl-carousel owl-theme">
            <a href="{{ route('allRecipes')}}">
                    <div class="card categoryCard d-flex justify-content-center align-items-center">
                        <i class="fas fa-house mb-3"></i> All recipes
                    </div></a>
                    @foreach($categories as $category)
                        <a href="{{ route('category', $category->id) }}">
                            <div class="card categoryCard d-flex justify-content-center align-items-center">
                                <i class="fas {{ CategoryController::getCategoryIcon($category['name']) }} mb-3"></i>
                                {{ $category['name'] }}
                            </div>
                        </a>
                    @endforeach
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://kit.fontawesome.com/33ae1132d9.js" crossorigin="anonymous"></script>

