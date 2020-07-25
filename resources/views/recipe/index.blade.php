@extends('template')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/recipe/recipes-all.css')}}">
@endsection

@section('conteudo')
    <main class="content">
        <ul id="js-categoryList" class="category__list">
            <li class="category__item category__item--active">Todos</li>
            @foreach($recipeCategories as $category)
                <li class="category__item">{{$category->name}}</li>
            @endforeach
        </ul>
        @foreach($recipeCategories as $category)
            <div class="card__container js-results">
                <h4 class="category__name">{{$category->name}}</h4>
                @foreach($category->recipes as $recipe)
                    <a class="recipe__card" href="#">
                        <div class="recipe__header">
                            <img class="recipe__image"
                                 src="https://loveveg.com.br/app/uploads/2019/03/feijoada-vegana-header@2x-1300x899.jpg"
                                 alt="{{$recipe->name}}">
                            <span class="recipe__title">{{$recipe->name}}</span>
                        </div>
                        <div class="recipe__body">
                            <div class="recipe__calories">{{$recipe->calories}} Kcal</div>
                            <div class="recipe__time">{{$recipe->timeToPrepare}} minutos</div>
                            <div class="recipe__difficulty">{{$recipe->difficulty}}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </main>
@endsection

@section('scripts')
    <script src="{{asset('js/HttpClient.js')}}"></script>
    <script src="{{asset('js/recipe/filterRecipes.js')}}"></script>
@endsection
