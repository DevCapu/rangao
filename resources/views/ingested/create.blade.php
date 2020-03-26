@extends("template")

@section("conteudo")
    <div class="row">
        <section class="col s12 m4">
            <form action="#" id="adicionaAlimento">
                <div class="input-field col s12">
                    <select name="period" id="refeicao" required>
                        <option value="cafeDaManha" selected>Café da manhã</option>
                        <option value="almoco">Almoço</option>
                        <option value="cafeDaTarde">Café da tarde</option>
                        <option value="jantar">Jantar</option>
                    </select>
                    <label for="refeicao">Em qual refeição você deseja adicionar?</label>
                </div>

                <div class="input-field col s12">
                    <select name="food" id="alimentos" required>
                    </select>
                    <label for="alimentos">Qual alimento você ingeriu?</label>
                </div>
                <div class="input-field col s12">
                    <input id="quantidade" type="number" name="quantity" step="1" min="1" max="100">
                    <label for="quantidade">Quantidade em unidades</label>
                </div>
                <button class="btn" type="submit">Adicionar</button>
            </form>
        </section>


        <div class="col s12 m8">
            <button id="salvarRefeições" class="btn right">Salvar refeições</button>
            <br><br>
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#cafeDaManha">Café da manhã</a></li>
                <li class="tab col s3"><a href="#almoco">Almoço</a></li>
                <li class="tab col s3"><a href="#cafeDaTarde">Café da tarde</a></li>
                <li class="tab col s3"><a href="#jantar">Jantar</a></li>
            </ul>

            <div class="row" id="cafeDaManha">
                <table class="centered col s12" id="tabela-cafeDaManha">
                    <thead>
                    <tr>
                        <th colspan="2">Café da manhã</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="row" id="almoco">
                <table class="centered col s12" id="tabela-almoco">
                    <thead>
                    <tr>
                        <th colspan="2">Almoço</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="row" id="cafeDaTarde">
                <table class="centered col s12" id="tabela-cafeDaTarde">
                    <thead>
                    <tr>
                        <th colspan="2">Café da tarde</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="row" id="jantar">
                <table class="centered col s12" id="tabela-jantar">
                    <thead>
                    <tr>
                        <th colspan="2">Janta</th>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    </div>
@endsection

@section("scripts")
    <script>
        const id = {{__($id)}};

        $(document).ready(function () {
            $('#refeicao').formSelect();
            $('#alimentos').formSelect();
            $('.tabs').tabs();

            //Aquelas dúvidas que eu nunca vou entender, pq precisei fazer isso
            setTimeout(() => {
                $("#alimentos").trigger('contentChanged');
            }, 1000)
        });

        $('#alimentos').on('contentChanged', function () {
            $(this).formSelect();
        });
    </script>
    <script src="{{asset('js/refeicao/busca-alimentos.js')}}"></script>
    <script src="{{asset('js/refeicao/adiciona-alimentos.js')}}"></script>
    <script src="{{asset('js/refeicao/salva-refeicoes.js')}}"></script>
@endsection
