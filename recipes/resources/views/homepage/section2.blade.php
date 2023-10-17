@php
    use App\Http\Controllers\CategoryController;
@endphp
    <section class="section2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container d-flex overflow-hidden gap-3">
                    @foreach($categories as $category)
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
<script src="https://kit.fontawesome.com/33ae1132d9.js" crossorigin="anonymous"></script>