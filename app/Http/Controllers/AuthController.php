<?php

namespace App\Http\Controllers;

use App\Servicos\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function perfil(UsuarioService $usuarioService)
    {
        if (Auth::check()) {
            $refeicoesObjeto = $usuarioService->buscaRefeicoesDoDiaAtual();

            $refeicoes = [];
            $cafeDaManha = [];
            $almoco = [];
            $cafeDaTarde = [];
            $jantar = [];

            foreach ($refeicoesObjeto as $refeicao) {
                switch ($refeicao->periodo) {
                    case "CAFÉ DA MANHÃ":
                        array_push($cafeDaManha, $refeicao);
                        break;
                    case "ALMOÇO":
                        array_push($almoco, $refeicao);
                        break;
                    case "CAFÉ DA TARDE":
                        array_push($cafeDaTarde, $refeicao);
                        break;
                    case "JANTAR":
                        array_push($jantar, $refeicao);
                        break;
                }
            }
            array_push($refeicoes, $cafeDaManha, $almoco, $cafeDaTarde, $jantar);

            $tamanhoMaximo = 0;
            foreach ($refeicoes as $refeicao) {
                $tamanhoMaximo = (count($refeicao) > $tamanhoMaximo) ? count($refeicao) : $tamanhoMaximo;
            }

            return view('usuario.show',
                [
                    'usuario' => Auth::user(),
                    'idade' => '19',
                    'refeicoes' => $refeicoes,
                    'quantidadeDeLinhas' => $tamanhoMaximo
                ]);
        }
        return redirect()->route('usuario.login');
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados estão incorretos!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usuario.login');
    }
}
