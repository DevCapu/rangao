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
    return view('welcome');
});

Auth::routes();

Route::resource('alimento', 'AlimentoController');
Route::resource('refeicao', 'RefeicaoController');
Route::resource('usuario', 'UsuarioController');

Route::get('/perfil', 'AuthController@perfil')->name('perfil');
Route::get('/login', 'AuthController@login')->name('usuario.login');
Route::post('/login', 'AuthController@store')->name('usuario.login.do');
