@extends('template')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="{{route('foods.store')}}" method="post">
                    @csrf
                    <label for="nome">Nome do alimento
                        <input type="text" name="name" placeholder="Banana">
                    </label><br>
                    <label for="nome">Quantidade
                        <input type="text" name="base_qty" placeholder="100">
                    </label><br>

                    <label for="nome">Medida
                        <input type="text" name="base_unit" placeholder="g">
                    </label><br>
                    <label for="calorias">Calorias
                        <input type="text" name="calories" placeholder="57">
                    </label><br>
                    <label for="nome">Categoria
                        <input type="number" name="category_id" min="1" placeholder="1">
                    </label><br>
                    <button class="btn full-width">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
