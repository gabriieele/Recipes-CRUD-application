

<section class="section3">
    <div class="container">
       
           <h1 class="text-center mb-3">All recipes</h1>
        
        <div class="row">
            <div class="col-12">
                <div class="container d-flex justify-content-center flex-wrap gap-3">
                    @foreach($recipes as $recipe)
                    <div class="card recipeCard rcard align-items-center shadow-sm mb-3">
                    <a href="">
                        <div class="d-flex justify-content-center align-item-center">
                        <img class="recipeImg" src="{{ asset('storage/' . $recipe['image']) }}" alt="recipe"></div>
                    <hr class="mx-2">
                    <h6 class="px-2 recipe-title m-0">{{$recipe['title']}}</h6>
                    <p class="p-2 author-name" style="font-size: 12px;">Author: {{ $recipe->user->name }}</p></a>
                    
</div>
                    @endforeach
                   
                    

                </div>
            </div>
        </div>
    </div>
</section>
