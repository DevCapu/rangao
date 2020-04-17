<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        Auth::logout();
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credenciais = $request->only(['email', 'password']);

        if (Auth::attempt($credenciais)) {
            return redirect()->route('profile', ['user'=> Auth::id()]);
        }
        return redirect()->route('users.login')->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');
    }
}
