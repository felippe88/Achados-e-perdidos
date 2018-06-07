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
    return view('home');
});



Route::get('cadastro', 'CadastroController@getIndex')->name('cadastro');

Route::post('cadastro/salvar', 'CadastroController@createUser')->name('create');
  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

