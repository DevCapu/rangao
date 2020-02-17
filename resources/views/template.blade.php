<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rangão</title>
    <link rel="favicon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .hidden {
            display: none;
        }

        .user__photo {
            display: block;
            width: 100%;
            border-radius: 50%;
            text-align: center;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.75);
        }

        .centered-content {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .full-width {
            width: 100%;
        }

        .wallpaper {
            height: 100vh;
            width: 100vw;
            background-image: url("./img/wallpapaer.jpg");
            background-size: cover;
            background-position: right bottom;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
@auth
    <header>
        <ul id="configuration-dropdown" class="dropdown-content">
            <li><a href="/perfil">Perfil</a></li>
            <li><a href="#!">Conta</a></li>
            <li class="divider"></li>
            <li><a href="/logout">Sair</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo">Rangão</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/feed">Feed</a></li>
                    <li><a href="/geladeira">Minha geladeira</a></li>
                    <li><a href="/refeicao/create">Suas refeições</a></li>
                    <li><a href="/dicas">Dicas</a></li>
                    <li><a class="dropdown-trigger" data-target="configuration-dropdown"
                           href="#!">Configurações<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="row"></div>
@endauth
@yield('conteudo')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $(".dropdown-trigger").dropdown();
    });
</script>
@yield("scripts")
</body>
</html>
