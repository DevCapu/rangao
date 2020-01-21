<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rangão</title>
</head>
<body>
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
<table id="tabela-cafeDaManha">
    <thead>
    <tr>
        <th colspan="2">Café da manhã</th>
    </tr>
    <tr>
        <td>Nome</td>
        <td>Quantidade</td>
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
        <td>Nome</td>
        <td>Quantidade</td>
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
        <td>Nome</td>
        <td>Quantidade</td>
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
        <td>Nome</td>
        <td>Quantidade</td>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<button id="salvarRefeições">Salvar cardápio</button>
<script src="{{asset('js/refeicao/busca-alimentos.js')}}"></script>
<script src="{{asset('js/refeicao/adiciona-alimentos.js')}}"></script>
</body>
</html>
