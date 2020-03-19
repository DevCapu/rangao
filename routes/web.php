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

Route::get('/', function () {
    return redirect()->route('usuario.login');
});

Auth::routes();

Route::resource('alimento', 'AlimentoController')->middleware('auth');
Route::resource('refeicao', 'RefeicaoController')->middleware('auth');
Route::resource('usuario', 'UsuarioController');

Route::get('/geladeira', 'GeladeiraController@index')->middleware('auth')->name('geladeira');
Route::get('/geladeira/create', 'GeladeiraController@create')->middleware('auth')->name('geladeira.criar');
Route::post('/geladeira', 'GeladeiraController@store')->middleware('auth')->name('geladeira.salvar');
Route::get('/geladeira/{geladeira}/edit', 'GeladeiraController@edit')->middleware('auth')->name('geladeira.editar');
Route::put('geladeira/{geladeira}', 'GeladeiraController@update')->middleware('auth');

Route::get('/perfil', 'UsuarioController@perfil')->middleware('auth')->name('perfil');
Route::get('/login', 'AuthController@login')->name('usuario.login');
Route::post('/login', 'AuthController@doLogin')->name('usuario.login.do');
Route::get('/logout', 'AuthController@logout')->name('usuario.logout')->middleware('auth');
