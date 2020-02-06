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
    <style>
        .img {
            display: block;
        }

        .centered {
            margin: 0 auto;
        }

        .text-align-center {
            text-align: center;
        }

        .img-rounded {
            border-radius: 50%;
        }

        .img-bordered {
            border: 2px solid #DDD;
        }

        .label {
            font-weight: 800;
        }

        .mt-5 {
            margin-top: 15px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s10">
            <h1>Perfil</h1>
        </div>
        <div class="col s2">
            <a href="/logout">
                <button>Sair</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col s3 m3">
            <img class="img centered img-rounded img-bordered" src="https://i.pravatar.cc/250"
                 alt="{{__($usuario->nome)}}">
            <h5 class="text-align-center">{{__($usuario->nome)}}</h5>
            <div class="row">
                <div class="col s5">
                    @if($usuario->sexo === 'male')
                        <span class="label">{{__('Masculino')}}</span>
                    @else
                        <span>{{__('Feminino')}}</span>
                    @endif
                </div>
                <div class="col s7">
                    {{__(join('/',array_reverse(explode('-', $usuario->nascimento))) . ': ')}} <span
                        class="label">{{__($idade . " anos")}}</span>
                </div>
                <a href="">
                    <button class="mt-5" style="width: 100%">Ver mais</button>
                </a>
            </div>
        </div>
        <div class="col s6 m9">
            {{--            <div class="row">--}}
            {{--                <a href="/usuario/{{__($usuario->id)}}/edit">--}}
            {{--                    <button>Editar informações</button>--}}
            {{--                </a>--}}
            {{--            </div>--}}
            <table>
                <thead>
                <tr>
                    <th colspan="4">{{\Carbon\Carbon::now('America/Sao_Paulo')}}</th>
                </tr>
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
            <a href="/refeicao/create">
                <button>
                    Adicionar o que eu comi hoje!
                </button>
            </a>
        </div>

    </div>
</div>
</body>
</html>
