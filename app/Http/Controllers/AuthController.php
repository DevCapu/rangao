<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function doLogin(LoginUsuario $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usuario.login');
    }
}
