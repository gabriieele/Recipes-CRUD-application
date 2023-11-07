

<section class="section3">
    <div class="container">
       
           <h1 class="text-center mb-3">Most recent recipes</h1>
        
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center flex-wrap gap-3">
                @foreach($recipes as $recipe)
                    <div class="card recipeCard rcard  shadow-sm mb-3">
                    <a href="{{ route('recipe', $recipe->id)}}">
                        <div class="d-flex justify-content-center align-item-center">
                        <img class="recipeImg" src="{{ asset('storage/' . $recipe->image) }}" alt="recipe"></div></a>
                    <hr class="mx-2">
                    <h6 class="px-2 recipe-title m-0">{{$recipe->title}}</h6>
                    <p class="p-2 author-name" style="font-size: 12px;">Author: <a href="{{route('userRecipes', $recipe->user->id)}}" class="p-0">{{ $recipe->user->name }}</a> </p>
                    
</div>
                    @endforeach
                   
                    

                </div>
            </div>
        </div>    
        @include('pagination.pagination') 
    </div>

</section>
