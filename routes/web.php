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

/*Base*/
Route::redirect('/', '/login')->name('index');

/*Criar um novo usuário*/
Route::get('/register', 'UserController@create')->name('users.create');
Route::post('/users', 'UserController@store')->name('users.store');

/*Fazer login*/
Route::get('/login', 'AuthController@login')->name('users.login');
Route::post('/login', 'AuthController@doLogin')->name('users.login.do');

/*Fazer logout*/
Route::get('/logout', 'AuthController@logout')->name('users.logout')->middleware('auth');

/*Perfil*/
Route::get('/profile/{user}', 'UserController@profile')->name('profile')->middleware('auth');
Route::get('user/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('auth');
Route::put('user/{user}', 'UserController@update')->name('users.update')->middleware('auth');

/*Alimentos da geladeira*/
Route::get('/refrigerator', 'RefrigeratorController@index')->name('refrigerator.index')->middleware('auth');
Route::get('/refrigerator/create', 'RefrigeratorController@create')->name('refrigerator.create')->middleware('auth');
Route::post('/refrigerator', 'RefrigeratorController@store')->name('refrigerator.store')->middleware('auth');
Route::get('/refrigerator/{foodId}/edit', 'RefrigeratorController@edit')->name('refrigerator.edit')->middleware('auth');

/*Receitas*/
Route::get('/recipes', 'RecipeController@index')->name('recipe.index')->middleware('auth');

/*Alimentos ingeridos*/
Route::get('meal/create', 'MealController@index')->name('meal.create')->middleware('auth');

/*Feed*/
Route::get('/feed', 'FeedController@index')->name('feed.index')->middleware('auth');
Route::post('/feed', 'FeedController@store')->name('feed.store')->middleware('auth');

/*Tips*/
Route::get('/tips', 'TipController@index')->name('tips.index')->middleware('auth');

/*Menu*/
Route::post('/menu/generate', 'MenuController@generate')->name('menu.generate')->middleware('auth');

