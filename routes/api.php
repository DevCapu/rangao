<?php

use App\Alimento;
use App\AlimentoRefeicao;
use App\Ingerido;
use App\Models\Food;
use App\Models\Ingested;
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

Route::get('/foods', function () {
   return Food::all();
});

Route::post('/foods', function (Request $request) {

    foreach ($request->alimentos as $alimento) {
        $food = new Food();

        $food->name = $alimento['name'];
        $food->base_qty = $alimento["base_qty"];
        $food->base_unit = $alimento["base_unit"];
        $food->calories = $alimento["calories"];
        $food->category_id = $alimento["category_id"];

        $food->save();
    }
});

/*Ingested Routes*/
Route::post('/ingested', function (Request $request) {
    foreach ($request->foods as $food) {

        $ingested = new Ingested();
        $ingested->food_id = $food['id'];
        $ingested->user_id = $request->user_id;
        $ingested->quantity = $food['quantity'];
        $ingested->period = $request->period;
        $ingested->calories = Food::find($food['id'])->calories * $food['quantity'];
        $ingested->date = Carbon::now('America/Sao_Paulo')
            ->format("d/m/y");

        $ingested->save();
    }
});
