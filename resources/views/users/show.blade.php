@extends("template")

@section("conteudo")
    <main class="container">
        <div class="row">
            <section class="col s12 m3">
                <img class="img user__photo" src="https://i.pravatar.cc/310"
                     alt="{{$user->name}}"/>
                <h5 class="center">{{$user->name}}</h5>
                <br>
                <a class="waves-effect waves-light btn right full-width mb-4" href="{{route('users.edit', ['user' => $user->id])}}"><i
                        class="material-icons right">add</i>Ver mais</a>
            </section>
            <section class="col s12 m9">
                <a class="waves-effect waves-light btn mb-4" href="cardapio/gerar"><i
                        class="material-icons right">add</i>Gerar cardápio</a>
                <a class="waves-effect waves-light btn mb-4" href="{{route('ingested.create', [''])}}"><i
                        class="material-icons right">add</i>Adicionar alimentos no cardápio de hoje</a>
                <table class="striped centered">
                    <thead>
                    <tr>
                        <th>Café da Manhã</th>
                        <th>Almoço</th>
                        <th>Café da tarde</th>
                        <th>Jantar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < $numberOfLines; $i++)
                        <tr>
                            @foreach($meals as $meal)
                                @if(array_key_exists($i, $meal))
                                    <td>{{$meal[$i]}}</td>
                                @else
                                    <td></td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </section>
        </div>
    </main>
@endsection
