<?php

namespace App\Http\Controllers;

use App\Refeicao;
use App\Servicos\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function perfil(UsuarioService $usuarioService)
    {
        if (Auth::check()) {
            $refeicoes = $usuarioService->buscaRefeicoesDoDiaAtual();
            foreach ($refeicoes as $refeicao) {
                echo "<pre>";
                var_dump($refeicao);
                echo "</pre>";
                echo "<hr>";
            }

            return view('usuario.show', ['usuario' => Auth::user(), 'idade' => '19', 'refeicoes' => $refeicoes]);
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
