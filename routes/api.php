<?php

use App\Alimento;
use App\AlimentoRefeicao;
use App\Refeicao;
use Carbon\Carbon;
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
        'data' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
        'usuario_id' => $request->id
    ]);

    foreach ($request->alimentos as $alimento) {
        $alimentoRefeicao = new AlimentoRefeicao();
        $alimentoRefeicao->refeicao_id = $refeicao->id;
        $alimentoRefeicao->alimento_id = $alimento['id'];
        $alimentoRefeicao->quantidade = $alimento['quantidade'];

        $alimentoRefeicao->save();
    }
});
