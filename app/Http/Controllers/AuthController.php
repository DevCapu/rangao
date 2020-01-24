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
            $diasDaSemana = [
                0 => 'Domingo',
                1 => 'Segunda',
                2 => 'Terça',
                3 => 'Quarta',
                4 => 'Quinta',
                5 => 'Sexta',
                6 => 'Sabado',
            ];
            $variaveisDaView = [
                'usuario' => Auth::user(),
                'idade' => $usuarioService->calculaIdade(Auth::user()->nascimento),
                'diasDaSemana' => $diasDaSemana
            ];
            return view('usuario.show', $variaveisDaView);
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
