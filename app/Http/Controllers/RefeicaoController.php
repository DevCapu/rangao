<?php

namespace App\Http\Controllers;

use App\Refeicao;
use Illuminate\Http\Request;

class RefeicaoController extends Controller
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
        return view('refeicao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Refeicao $refeicao
     * @return \Illuminate\Http\Response
     */
    public function show(Refeicao $refeicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Refeicao $refeicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Refeicao $refeicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Refeicao $refeicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refeicao $refeicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Refeicao $refeicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refeicao $refeicao)
    {
        //
    }
}
