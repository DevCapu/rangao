@extends('template')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/recipe/recipes.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('conteudo')
    <main>
        <div class="row">
            <div class="col s12 m12 l4 recipe__info">
                <img class="recipe__photo" src="{{$recipe->photo}}" alt="{{$recipe->name}}">
                <div class="recipe__about">
                    <span class="recipe__description">
                        {{$recipe->description}}
                    </span>
                    <ul class="category__list">
                        @foreach($recipe->recipeCategories as $category)
                            <li class="category__item">{{$category->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="rate">
                    <span>Nota:</span>
                    @for($i = 5; $i >= 1; $i-- )
                        <input type="radio" id="rateAvarage-{{$i}}" name="rateAvarage"
                               value="{{$i}}"
                               {{$i === $recipe->getAvarageRate() ? "checked=true": ''}}
                            disabled
                        />
                        <label for="rateAvarage-{{$i}}" title="text">{{$i}} star</label>
                    @endfor
                </div>
                <button class="waves-effect waves-light btn right full-width mb-4 modal-trigger" data-target="rateModal"
                        name="action">
                    Já fiz<i class="material-icons right">check</i>
                </button>
                <div id="rateModal" class="modal">
                    <div class="modal-content">
                        <h5>Avalie: {{$recipe->name}}</h5>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5"/>
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4"/>
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3"/>
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2"/>
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1"/>
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <button id="js-sendRate" class="waves-effect waves-light btn full-width mt-4">Enviar avaliação
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="modal-close waves-effect waves-green btn-flat">Não avaliar</button>
                    </div>
                </div>
            </div>
            <ul class="collection with-header col s12 m12 l4 recipe__ingredients">
                <li class="collection-header"><h4>Ingredientes</h4></li>
                @foreach($recipe->ingredients as $ingredient)
                    <li class="collection-item avatar ">
                        <img
                            src="https://png.pngtree.com/png-vector/20190114/ourlarge/pngtree-vector-onion-icon-png-image_313938.jpg"
                            alt="{{$ingredient->name}}" class="circle">
                        <span class="title">{{$ingredient->name}}</span>
                        <p>
                            Medida: {{$ingredient->pivot->measure}}<br>
                            Quantidade: {{$ingredient->pivot->quantity}}
                        </p>
                        <label class="secondary-content">
                            <input type="checkbox"/>
                            <span></span>
                        </label>
                    </li>
                @endforeach
            </ul>
            <div class="col s12 m12 l4 recipe__steps">
                <ul class="collection with-header collapsible">
                    <li class="collection-header"><h4>Passo a passo</h4></li>
                    @foreach($recipe->steps as $index => $step)
                        <li>
                            <div class="collapsible-header">
                                {{$loop->iteration}}º passo
                            </div>
                            <div class="collapsible-body">
                                @if($step->videoUrl !== null && $step->videoUrl !== '')
                                    <video src="{{$step->videoUrl}}" controls></video>
                                @endif
                                <span>{{$step->description}}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{asset('js/HttpClient.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.collapsible').collapsible();
            $('.modal').modal();
        });
    </script>
    <script>
        const httpClient = new HttpClient();
        const rateButton = document.querySelector('#js-sendRate');

        rateButton.addEventListener('click', () => {
            const rateValue = $('input[name=rate]:checked', '.rate').val();
            httpClient.post('/rate', {
                userId: {{$userId}},
                recipeId: {{$recipe->id}},
                rate: rateValue
            });
        });
    </script>
@endsection
