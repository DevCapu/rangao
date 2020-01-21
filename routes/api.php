<?php

use App\Alimento;
use App\Refeicao;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/alimento', function (Request $request) {
    return Alimento::all();
});

Route::post('/refeicao', function (Request $request) {
    $refeicao = Refeicao::create([
        'periodo' => $request->periodo,
        'data' => date("d/m/Y")
    ]);

    foreach ($request->alimentos as $alimento) {
        $alimentoRefeicao = new \App\AlimentoRefeicao();
        $alimentoRefeicao->id_refeicao = $refeicao->id;
        $alimentoRefeicao->id_alimento = $alimento['id'];

        $alimentoRefeicao->save();
    }

    return \App\AlimentoRefeicao::all();
});
