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

Route::get('/perfil', 'UsuarioController@perfil')->middleware('auth')->name('perfil');
Route::get('/login', 'AuthController@login')->name('usuario.login');
Route::post('/login', 'AuthController@doLogin')->name('usuario.login.do');
Route::get('/logout', 'AuthController@logout')->name('usuario.logout')->middleware('auth');
