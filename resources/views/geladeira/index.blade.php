@extends('template')
@section('conteudo')
    <div class="container">
        <div class="row">
            <a class="waves-effect waves-light btn mb-4" href="/geladeira/create">
                <i class="material-icons right">add</i>Adicionar alimentos
            </a>
        </div>
        <table class="responsive-table  highlight">
            @foreach($geladeiras as $geladeira)
                <tr>
                    <td>{{$geladeira->alimento->nome}} (Notificação no dia: {{$geladeira->validade}})</td>
                    <td>
                        <a href="/geladeira/{{$geladeira->id}}/edit" class="btn">Editar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
