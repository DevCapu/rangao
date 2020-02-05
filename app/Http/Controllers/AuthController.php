<?php

namespace App\Http\Controllers;

use App\Servicos\RefeicaoService;
use App\Servicos\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function perfil(RefeicaoService $refeicaoService, UsuarioService $usuarioService)
    {
        if (Auth::check()) {
            $cardapio = $refeicaoService->buscaAlimentosDoDia(Auth::id());
            $tamanhoMaximo = $this->calculaNumeroDeLinhasMaximoDoCardapio($cardapio);

            $informacoesDaView = [
                'usuario' => Auth::user(),
                'idade' => $usuarioService->calculaIdade(Auth::user()->nascimento),
                'refeicoes' => $cardapio,
                'quantidadeDeLinhas' => $tamanhoMaximo
            ];

            return view('usuario.show', $informacoesDaView);
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

    /**
     * @param array $cardapio
     * @return int
     */
    private function calculaNumeroDeLinhasMaximoDoCardapio(array $cardapio): int
    {
        $tamanhoMaximo = 0;
        foreach ($cardapio as $refeicao) {
            $tamanhoMaximo = (count($refeicao) > $tamanhoMaximo) ? count($refeicao) : $tamanhoMaximo;
        }
        return $tamanhoMaximo;
    }
}
