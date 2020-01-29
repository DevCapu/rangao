<?php

use App\Alimento;
use App\AlimentoRefeicao;
use App\Refeicao;
use App\Servicos\UsuarioService;
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

Route::post('/refeicao', function (Request $request, UsuarioService $usuarioService) {
    $refeicao = Refeicao::create([
        'periodo' => $request->periodo,
        'data' => $usuarioService->retornaDataAtualFormatada(),
        'id_usuario' => $request->id
    ]);

    foreach ($request->alimentos as $alimento) {
        $alimentoRefeicao = new AlimentoRefeicao();
        $alimentoRefeicao->id_refeicao = $refeicao->id;
        $alimentoRefeicao->id_alimento = $alimento['id'];
        $alimentoRefeicao->quantidade = $alimento['quantidade'];

        $alimentoRefeicao->save();
    }
});
