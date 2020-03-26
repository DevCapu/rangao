@extends('template')
@section('conteudo')
    <div class="container">
        <div class="row">
            <a class="waves-effect waves-light btn mb-4" href="{{route('refrigerators.create')}}">
                <i class="material-icons right">add</i>Adicionar alimentos
            </a>
        </div>
        <table class="responsive-table  highlight">
            @foreach($refrigerators as $refrigerator)
                <tr>
                    <td>{{$refrigerator->food->name}} (Notificação no dia: {{$refrigerator->expiration_date}})</td>
                    <td>
                        <a href="/geladeira/{{$refrigerator->id}}/edit" class="btn">Editar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
