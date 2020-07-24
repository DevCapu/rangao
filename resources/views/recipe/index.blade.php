@extends('template')
@section('conteudo')
    <style>
        .card__container {
            display: flex;
            justify-content: flex-start;

            flex-wrap: wrap;
            align-items: center;
        }

        .content {
            padding: 0 2rem;
        }

        .category__list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .category__item {
            padding: .5rem 1rem;
            margin: 10px;
            border-radius: 20px;
            border: 2px solid #81C784;
            background-color: #ffffff;
            cursor: pointer;
        }

        .category__item--active {
            background-color: #81C784;
        }

        .categoryItem__name {
            color: #81C784;
            font-weight: bold;
        }

        .category__item--active .categoryItem__name {
            color: #FFFFFF;
        }

        .category__name {
            display: block;
            width: 100%;
            margin: 1rem .5rem;
            color: #333;
        }

        .recipe__card {
            height: auto;
            min-width: 350px;
            width: 350px;
            max-width: 350px;
            margin: .5rem;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.75);
            transition: box-shadow ease-in-out 250ms;
            flex: 1;
        }

        .recipe__card:hover {
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.75);
            cursor: pointer;
        }

        .recipe__header {
            position: relative;
            background-color: #EEEEEE;
        }

        .recipe__image {
            width: 100%;
            height: 100%;
        }

        .recipe__title {
            font-size: 1.5rem;
            left: 1rem;
            bottom: 1rem;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.75);
            color: #eee;
            padding: .3rem;
        }

        .recipe__body {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            background-color: #EEEEEE;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .recipe__calories, .recipe__time, .recipe__difficulty {
            font-weight: bold;
            padding: .3rem;
            color: #333;
        }

        .recipe__calories {
            background-image: url("{{asset('img/calories.png')}}");
            background-repeat: no-repeat;
            background-position: center top;
            padding-top: 3rem;
        }

        .recipe__time {
            background-image: url("{{asset('img/clock.png')}}");
            background-repeat: no-repeat;
            background-position: center top;
            background-size: 48px 48px;
            padding-top: 3rem;
        }

        .recipe__difficulty {
            background-image: url("{{asset('img/knife-spoon.png')}}");
            background-repeat: no-repeat;
            background-position: center top;
            padding-top: 3rem;
        }
    </style>
    <main class="content">
        <ul class="category__list">
            <li class="category__item category__item--active">
                <span class="categoryItem__name">Todos</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Vegetariano</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Vegano</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Low Carb</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Café da manhã</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Almoço</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Jantar</span>
            </li>
            <li class="category__item">
                <span class="categoryItem__name">Rápido</span>
            </li>
        </ul>
        <div class="card__container">
            <h4 class="category__name">Vegetarianos</h4>
            <a class="recipe__card" href="#">
                <div class="recipe__header">
                    <img class="recipe__image"
                         src="https://loveveg.com.br/app/uploads/2019/03/feijoada-vegana-header@2x-1300x899.jpg"
                         alt="Feijoada vegana">
                    <span class="recipe__title">Feijoada vegana</span>
                </div>
                <div class="recipe__body">
                    <div class="recipe__calories">150 Kcal</div>
                    <div class="recipe__time">60 minutes</div>
                    <div class="recipe__difficulty">Fácil</div>
                </div>
            </a>
        </div>
    </main>
@endsection
