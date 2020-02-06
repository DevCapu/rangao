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
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Cadastre-se!</h1>
    </div>
    <div class="row">
        <div class="col s12 m8"
             style="background-image: url('{{asset('img/health-food.jpeg')}}'); height: 82vh; background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 6px">
        </div>
        <div class="col s12 m4">
            <form action="/usuario" method="post">
                @csrf

                @error('nome')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="nome">Nome
                    <input type="text" name="nome" id="nome" placeholder="Felipe" required>
                </label>


                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="nome">Email
                    <input type="email" name="email" id="email" placeholder="felipe.b2014@gmail.com" required>
                </label>


                @error('senha')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="nome">Senha
                    <input type="password" name="senha" id="senha" placeholder="*******" required>
                </label>

                <div class="row">
                    @error('peso')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="peso" class="col s6">Peso
                        <input type="text" name="peso" id="peso" placeholder="56?" required>
                    </label>

                    @error('altura')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="altura" class="col s6">Altura
                        <input type="text" name="altura" id="altura" placeholder="1.78" required>
                    </label>
                </div>


                <div class="row">
                    @error('nascimento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="nascimento" class="col s6">Data de nascimento
                        <input type="date" name="nascimento" id="nascimento" required>
                    </label>

                    @error('sexo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="sexo" class="col s6">Sexo biológico
                        <select name="sexo" id="sexo" required>
                            <option value="male">Masculino</option>
                            <option value="female">Feminino</option>
                        </select>
                    </label>
                </div>
                <div class="row">

                    @error('objetivo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="objetivo" class="col s6">Objetivo
                        <select name="objetivo" id="objetivo" required>
                            <option value="lose">Perder peso</option>
                            <option value="define">Definir músculo</option>
                            <option value="gain">Ganhar Massa</option>
                        </select>
                    </label>

                    @error('atividade')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="atividade" class="col s6">Nível de atividade
                        <select name="atividade" id="atividade" required>
                            <option value="sedentary">Sedentário</option>
                            <option value="littleActive">Atividade baixa</option>
                            <option value="active">Ativo</option>
                            <option value="veryActive">Muito ativo</option>
                        </select>
                    </label>
                </div>
                <button style="background-color: #39754f; width: 100%">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
