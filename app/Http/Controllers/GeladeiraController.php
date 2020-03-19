<?php

namespace App\Http\Controllers;

use App\Geladeira;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GeladeiraController extends Controller
{
    public function index()
    {
        $geladeiras = Auth::user()->geladeiras;
        $variaveis = [
            'geladeiras' => $geladeiras,
            'usuarioId' => Auth::id()
        ];

        return view('geladeira.index', $variaveis);
    }

    public function create()
    {
        return view('geladeira.create');
    }

    public function store(Request $request)
    {
        try {
            $novaGeladeira = new Geladeira();
            $novaGeladeira->quantidade = $request->quantidade;
            $novaGeladeira->alimento_id = $request->alimento;
            $novaGeladeira->validade = $request->validade;
            $novaGeladeira->dias_notificacao = $request->notificacao;
            $novaGeladeira->usuario_id = Auth::id();
            $novaGeladeira->save();

            return redirect()->route('geladeira.criar');
        } catch (\Exception $exception) {
            return redirect()->route('geladeira.criar')->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);
        }
    }

    public function edit(Geladeira $geladeira)
    {
        $temAutorizacao = Auth::id() === $geladeira->usuario->id;

        if ($temAutorizacao){
            return view('geladeira.edit', ['geladeira' => $geladeira]);
        }
        return redirect()->route('geladeira')->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);

    }

    public function update(Geladeira $geladeira, Request $request)
    {
        try {
            $geladeira->quantidade = $request->quantidade;
            $geladeira->validade = $request->validade;
            $geladeira->dias_notificacao = $request->notificacao;

            $geladeira->save();
            return redirect()->route('geladeira');
        } catch (\Exception $exception) {
            return redirect()->route('geladeira')->withErrors(['incorreto' => 'Os dados informados estão incorretos!']);
        }
    }
}
