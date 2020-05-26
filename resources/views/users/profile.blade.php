@extends("template")

@section("conteudo")
    <main class="container">
        <div class="row">
            <section class="col s12 m3">
                <img class="img user__photo" src="https://i.pravatar.cc/310"
                     alt="{{$user->name}}"/>
                <h5 class="center">{{$user->name}}</h5>
                <br>
                <a class="waves-effect waves-light btn right full-width mb-4" href="{{route('users.edit', ['user' => \Illuminate\Support\Facades\Auth::id()])}}"><i
                        class="material-icons right">add</i>Ver mais</a>
            </section>
            <section class="col s12 m9">
                <div style="display: flex">
                    <form style="margin-right: 1rem" action="{{route('menu.generate')}}" METHOD="POST">
                        @csrf
                        <button class="waves-effect waves-light btn mb-4"><i
                                class="material-icons right">add</i>Gerar cardápio
                        </button>
                    </form>
                    <a class="waves-effect waves-light btn mb-4" href="{{route('meal.create')}}"><i
                            class="material-icons right">add</i>Refeições</a>
                </div>
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
                    @for($i = 0; $i < $rows; $i++)
                        <tr>
                            @foreach($ingested as $refeicao)
                                @if(array_key_exists($i, $refeicao))
                                    <td>{{$refeicao[$i]->name}}</td>
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
