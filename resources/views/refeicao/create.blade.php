<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rangão</title>
    <link rel="favicon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">

</head>
<body>
<main class="container">
    <div class="row">
        <div class="col s10">
            <h1>Sua refeição</h1>
        </div>
        <div class="col s2">
            <button id="salvarRefeições" style="background-color: #39754f">Salvar refeições</button>
        </div>
    </div>
    <div class="row">
        <section class="col s12 m8">
            <form action="#" id="adicionaAlimento">
                <label for="refeicao">Escolha uma refeição
                    <select name="refeicao" id="refeicao">
                        <option value="cafeDaManha">Café da manhã</option>
                        <option value="almoco">Almoço</option>
                        <option value="cafeDaTarde">Café da tarde</option>
                        <option value="jantar">Jantar</option>
                    </select>
                </label>
                <br>
                <label for="alimentos">Escolha um alimento</label>
                <select name="alimento" id="alimentos">
                    <option value="false" disabled>Escolha um alimento</option>
                </select>
                <br>
                <label for="quantidade">Quanto que você comeu desse alimento?
                    <input type="number" name="" id="quantidade" step="1" min="1" max="100">
                </label>
                <button id="button-adiciona">Adicionar alimento</button>
            </form>
        </section>
        <section class="col s12 m4">
            <table id="tabela-cafeDaManha">
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

            <table id="tabela-almoco">
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

            <table id="tabela-cafeDaTarde">
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

            <table id="tabela-jantar">
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
        </section>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{asset('js/refeicao/busca-alimentos.js')}}"></script>
<script src="{{asset('js/refeicao/adiciona-alimentos.js')}}"></script>
<script src="{{asset('js/refeicao/salva-refeicoes.js')}}"></script>
</body>
</html>
