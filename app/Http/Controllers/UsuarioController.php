<?php

namespace App\Http\Controllers;

use App\Servicos\CalculadoraDeNecessidadesEnergeticas;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param CalculadoraDeNecessidadesEnergeticas $calculadoraDeNecessidadesEnergeticas
     * @return void
     */
    public function store(Request $request, CalculadoraDeNecessidadesEnergeticas $calculadoraDeNecessidadesEnergeticas)
    {

        $gastoEnergeticoBasal = $calculadoraDeNecessidadesEnergeticas->calculaGastoEnergeticoBasal(
            $request->sexo,
            $request->peso,
            $request->altura,
            $request->nascimento
        );

        $gastoEnergeticoTotal = $calculadoraDeNecessidadesEnergeticas->calculaGastoEnergeticoTotal(
            $gastoEnergeticoBasal,
            $request->atividade
        );

        $caloriasParaConseguirObjetivo = $calculadoraDeNecessidadesEnergeticas->calculaCaloriasNecessariasParaCumprirObjetivo(
            $gastoEnergeticoTotal,
            $request->objetivo
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
