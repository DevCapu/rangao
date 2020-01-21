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
<form action="/alimento" method="post">
    @csrf
    <label for="nome">Nome do alimento
        <input type="text" name="nome" placeholder="Banana">
    </label><br>
    <label for="calorias">Calorias
        <input type="text" name="calorias" placeholder="310">
    </label><br>
    <label for="nome">Medida
        <input type="text" name="medida" placeholder="Unidade">
    </label><br>
    <button>Salvar</button>
</form>
</body>
</html>
