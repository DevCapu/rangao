<?php

namespace App\Http\Controllers;

use App\Refeicao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RefeicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        if(Auth::check()){
            return view('refeicao.create', ['id'=> Auth::id()]);
        }
        return redirect()->route('usuario.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $refeicao = new Refeicao();
        $refeicao->refeicao = $request->refeicao;
        $refeicao->data = $request->data;
    }

    /**
     * Display the specified resource.
     *
     * @param Refeicao $refeicao
     * @return Response
     */
    public function show(Refeicao $refeicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Refeicao $refeicao
     * @return Response
     */
    public function edit(Refeicao $refeicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Refeicao $refeicao
     * @return Response
     */
    public function update(Request $request, Refeicao $refeicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Refeicao $refeicao
     * @return Response
     */
    public function destroy(Refeicao $refeicao)
    {
        //
    }
}
