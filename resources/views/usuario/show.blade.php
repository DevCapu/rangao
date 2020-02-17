@extends("template")

@section("conteudo")
    <main>
        <div class="row">
            <section class="col s3">
                <img class="img user__photo" src="https://i.pravatar.cc/310"
                     alt="{{$usuario->nome}}"/>
                <h5 class="center">{{$usuario->nome}}</h5>
                <br>
                <a class="waves-effect waves-light btn right" href="/usuario/edit"><i
                        class="material-icons right">add</i>Ver mais</a>
            </section>
            <section class="col s9">
                <a class="waves-effect waves-light btn" href="/refeicao/create"><i
                        class="material-icons right">add</i>Gerar cardápio</a>
                <a class="waves-effect waves-light btn" href="/refeicao/create"><i
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
                    @for($i = 0; $i < $quantidadeDeLinhas; $i++)
                        <tr>
                            @foreach($refeicoes as $refeicao)
                                @if(array_key_exists($i, $refeicao))
                                    <td>{{$refeicao[$i]->nome}}</td>
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
