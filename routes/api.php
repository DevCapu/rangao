<?php

use App\Alimento;
use App\AlimentoRefeicao;
use App\Ingerido;
use App\Models\Food;
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

Route::get('/foods', function (Request $request) {
    return Food::all();
});

Route::post('/users', 'AuthController@doLogin');

Route::post('/meal', 'MealController@Store');

Route::get('/recipes', 'RecipeController@find');

Route::post("/rate", 'RateController@store');
