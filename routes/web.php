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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (session('logged') == 'true') {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------


Route::group(['middleware' => 'auth'], function () {

    Route::resource('pais', 'PaisController');
    Route::name('pais.')->group(function () {
        Route::post('pais/createPais', 'PaisController@createPais')->name('createPais');
    });

    Route::resource('estado', 'EstadoController');
    Route::name('estado.')->group(function () {
        Route::post('estado/createEstado', 'EstadoController@createEstado')->name('createEstado');
    });

    Route::resource('cidade', 'CidadeController');
    Route::name('cidade.')->group(function () {
        Route::post('cidade/createCidade', 'CidadeController@createCidade')->name('createCidade');
        Route::post('cidade/createCidadeMedico', 'CidadeController@createCidadeMedico')->name('createCidadeMedico');
    });

});


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------


Route::group(['middleware' => 'auth'], function () {
    Route::resource('cliente', 'ClienteController', ['except' => ['show']]);
    Route::put('cliente/{id}', 'ClienteController@update')->name('cliente.update');
    Route::post('cliente/getCidade', 'ClienteController@getCidade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('medico', 'MedicoController', ['except' => ['show']]);
    Route::put('medico/{id}', 'MedicoController@update')->name('medico.update');
    Route::post('medico/show', 'MedicoController@show');
    Route::post('medico/createMedico', 'MedicoController@createMedico')->name('medico.createMedico');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('exame', 'ExameController', ['except' => ['show']]);
    Route::put('exame/{id}', 'ExameController@update')->name('exame.update');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('paciente', 'PacienteController', ['except' => ['show']]);
    Route::put('paciente/{id}', 'PacienteController@update')->name('paciente.update');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('fornecedor', 'FornecedorController', ['except' => ['show']]);
    Route::put('fornecedor/{id}', 'FornecedorController@update')->name('fornecedor.update');
});


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------


Route::group(['middleware' => 'auth'], function () {
    Route::resource('condicaoPagamento', 'CondicaoPagamentoController', ['except' => ['show']]);
    Route::get('condicaoPagamento/show', 'CondicaoPagamentoController@show');
    Route::post('condicaoPagamento/createCondicao_pagamento', 'CondicaoPagamentoController@createCondicao_pagamento')->name('condicaoPagamento.createCondicao_pagamento');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('formaPagamento', 'FormaPagamentoController', ['except' => ['show']]);
    Route::post('formaPagamento/show', 'FormaPagamentoController@show');
    Route::post('formaPagamento/createForma_pagamento', 'FormaPagamentoController@createForma_pagamento')->name('formaPagamento.createForma_pagamento');
});