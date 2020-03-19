@extends('template')

@section('conteudo')
<div class="container">
    <div class="row">
        <h2>{{$geladeira->alimento->nome}}</h2>

    </div>
    <div class="row">
        <form action="/geladeira/{{$geladeira->id}}" method="POST">
            @method('PUT')
            @csrf
            <label for="quantidade">Quantidade
                <input type="number" name="quantidade" value="{{$geladeira->quantidade}}" min="0" max="100">
            </label><br>
            <label for="validade">Validade
                <input type="text" name="validade" value="{{$geladeira->validade}}">
            </label><br>
            <label for="notificacao">Avisar quantos dias antes de vencer
                <input type="number" name="notificacao" value="{{$geladeira->dias_notificacao}}" min="0">
            </label><br>
            <button class="btn full-width">Editar</button>
        </form>
    </div>
</div>
@endsection
