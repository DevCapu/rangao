<?php

namespace App\Http\Controllers;

use App\Servicos\CalculadoraDeNecessidadesEnergeticas;
use App\Servicos\UsuarioService;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * @var CalculadoraDeNecessidadesEnergeticas
     */
    private CalculadoraDeNecessidadesEnergeticas $calculadoraDeNecessidadesEnergeticas;
    /**
     * @var UsuarioService
     */
    private UsuarioService $usuarioService;
    /**
     * @var Usuario
     */
    private Usuario $usuario;

    /**
     * UsuarioController constructor.
     * @param CalculadoraDeNecessidadesEnergeticas $calculadoraDeNecessidadesEnergeticas
     * @param UsuarioService $usuarioService
     * @param Usuario $usuario
     */
    public function __construct(CalculadoraDeNecessidadesEnergeticas $calculadoraDeNecessidadesEnergeticas, UsuarioService $usuarioService, Usuario $usuario)
    {

        $this->calculadoraDeNecessidadesEnergeticas = $calculadoraDeNecessidadesEnergeticas;
        $this->usuarioService = $usuarioService;
        $this->usuario = $usuario;
    }

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
     * @param UsuarioService $usuarioService
     * @return void
     */
    public function store(Request $request)
    {

        $gastoEnergeticoBasal = $this->calculadoraDeNecessidadesEnergeticas->calculaGastoEnergeticoBasal(
            $request->sexo,
            $request->peso,
            $request->altura,
            $request->nascimento
        );

        $gastoEnergeticoTotal = $this->calculadoraDeNecessidadesEnergeticas->calculaGastoEnergeticoTotal(
            $gastoEnergeticoBasal,
            $request->atividade
        );

        $caloriasParaConseguirObjetivo = $this->calculadoraDeNecessidadesEnergeticas->calculaCaloriasNecessariasParaCumprirObjetivo(
            $gastoEnergeticoTotal,
            $request->objetivo
        );

        $arrayComDadosPreenchidos = $this->usuarioService->preencheUsuario($request, $gastoEnergeticoBasal, $gastoEnergeticoTotal, $caloriasParaConseguirObjetivo);
        $novoUsuario = $this->usuario->create($arrayComDadosPreenchidos);
        return $novoUsuario;
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
