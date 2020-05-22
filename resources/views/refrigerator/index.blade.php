@extends('template')
@section('conteudo')
    <div class="container">
        <div class="row">
            <a class="waves-effect waves-light btn mb-4 green lighten-2" href="{{route('refrigerator.create')}}">
                <i class="material-icons right">add</i>Adicionar alimentos
            </a>
        </div>
        <table class="responsive-table  highlight">
            @forelse($foods as $food)
                <tr>
                    <td>{{$food->name}} (Notificação no dia: {{\Carbon\Carbon::parse($food->pivot->expiration_date)->format('d/m/Y')}})</td>
                    <td>
                        <a href="{{route('refrigerator.edit', ['foodId' => $food->id])}}" class="btn">Editar</a>
                    </td>
                </tr>
            @empty
                <div class="col s12 m12">
                    <div class="card-panel red lighten-2">
                        <span class="white-text">
                            Ou você não tem alimentos ou precisa mudar a data de validade dos alimentos que já tem, em ambos os casos selecione adicionar alimentos e insira uma data de validade superior ao dia de hoje.
                        </span>
                    </div>
                </div>
            @endforelse
        </table>
    </div>
@endsection
