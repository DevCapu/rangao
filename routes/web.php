<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('usuario.login');
});

Auth::routes();

/*Foods Routes*/
Route::get('foods/create', 'FoodController@create')->middleware('auth')->name('foods.create');
Route::post('foods', 'FoodController@store')->middleware('auth')->name('foods.store');

/*User Routes*/
Route::resource('users', 'UserController')->except(['create', 'show']);
Route::get('register', 'UserController@create')->name('users.create');
Route::get('profile', 'UserController@show')->middleware('auth')->name('profile');


/*Authentication Routes*/
Route::get('/login', 'AuthController@login')->name('usuario.login');
Route::post('/login', 'AuthController@doLogin')->name('usuario.login.do');
Route::get('/logout', 'AuthController@logout')->name('usuario.logout')->middleware('auth');

/*Refrigerator Routes*/
Route::resource('refrigerators', 'RefrigeratorController')->middleware('auth');

/*Meal Routes*/
//Route::resource('refeicao', 'RefeicaoController')->middleware('auth');

/*Ingested Routes*/
Route::resource('ingested', 'IngestedController')->middleware('auth');

/*Feed Route*/
Route::get('feed', function (Request $request){
    return 'Feed';
})->name('feed');

Route::get('tips', function (Request $request){
    return 'tips';
})->name('tips');

//Route::get('/geladeira', 'GeladeiraController@index')->middleware('auth')->name('geladeira');
//Route::get('/geladeira/create', 'GeladeiraController@create')->middleware('auth')->name('geladeira.criar');
//Route::post('/geladeira', 'GeladeiraController@store')->middleware('auth')->name('geladeira.salvar');
//Route::get('/geladeira/{geladeira}/edit', 'GeladeiraController@edit')->middleware('auth')->name('geladeira.editar');
//Route::put('geladeira/{geladeira}', 'GeladeiraController@update')->middleware('auth');
