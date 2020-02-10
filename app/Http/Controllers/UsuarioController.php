<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroUsuario;
use App\Servicos\CalculadoraDeNecessidadesEnergeticas;
use App\Servicos\RefeicaoService;
use App\Servicos\UsuarioService;
use App\Usuario;
use App\Utilidade\DataUtilidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(CadastroUsuario $request)
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
        Auth::login($novoUsuario);

        return redirect()->route('perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Usuario $usuario
     * @return Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Usuario $usuario
     * @return Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Usuario $usuario
     * @return Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function perfil(RefeicaoService $refeicaoService, UsuarioService $usuarioService)
    {
        $cardapio = $refeicaoService->buscaAlimentosDoDia(Auth::id());
        $tamanhoMaximo = $refeicaoService->calculaNumeroDeLinhasMaximoDoCardapio($cardapio);

        $informacoesDaView = [
            'usuario' => Auth::user(),
            'idade' => $usuarioService->calculaIdade(DataUtilidade::retornaDataAtualFormatada(Auth::user()->nascimento)),
            'refeicoes' => $cardapio,
            'quantidadeDeLinhas' => $tamanhoMaximo
        ];
        return view('usuario.show', $informacoesDaView);
    }

}
