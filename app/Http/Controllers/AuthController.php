<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function doLogin(UserLogin $request)
    {
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {
            return redirect()->route('profile');
        }
        return redirect()->back()->withInput()->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usuario.login');
    }
}
