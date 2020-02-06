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
        <h1>Entre!</h1>
    </div>
    <div class="row">
        <div class="col s12 m8"
             style="background-image: url('{{asset('img/health-food.jpeg')}}'); height: 82vh; background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 6px">
        </div>
        <div class="col s12 m4">
            <form action="/login" method="post">
                @csrf
                @error('incorreto')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="nome">Email
                    <input type="email" name="email" id="email" placeholder="felipe.b2014@gmail.com" required>
                </label>

                @error('senha')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="senha">Senha
                    <input type="password" name="senha" id="senha" placeholder="*******" required>
                </label>

                <button style="background-color: #39754f; width: 100%">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
