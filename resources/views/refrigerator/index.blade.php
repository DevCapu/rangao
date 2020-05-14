@extends('template')
@section('conteudo')
    <div class="container">
        <div class="row">
            <a class="waves-effect waves-light btn mb-4" href="">
                <i class="material-icons right">add</i>Adicionar alimentos
            </a>
        </div>
        <table class="responsive-table  highlight">
            @foreach($foods as $food)
                <tr>
                    <td>{{$food->name}} (Notificação no dia: {{$food->pivot->expiration_date}})</td>
                    <td>
                        <a href="" class="btn">Editar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
