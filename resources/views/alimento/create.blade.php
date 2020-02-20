@extends('template')

@section('conteudo')
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="/alimento" method="post">
                    @csrf
                    <label for="nome">Nome do alimento
                        <input type="text" name="nome" placeholder="Banana">
                    </label><br>
                    <label for="calorias">Calorias
                        <input type="text" name="calorias" placeholder="310">
                    </label><br>
                    <label for="nome">Medida
                        <input type="text" name="medida" placeholder="Unidade">
                    </label><br>
                    <button class="btn full-width">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
