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
// HOME

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// REGIÕES

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
// EQUIPE

Route::group(['middleware' => 'auth'], function () {

    Route::resource('fornecedor', 'FornecedorController');

    Route::resource('medico', 'MedicoController');
    Route::name('medico.')->group(function () {
        Route::post('medico/createMedico', 'MedicoController@createMedico')->name('createMedico');
    });

});

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// GERAL

Route::group(['middleware' => 'auth'], function () {

    Route::resource('cliente', 'ClienteController');
    Route::name('cliente.')->group(function () {
        Route::post('cliente/fisico', 'ClienteController@createClienteFisico')->name('createClienteFisico');
        Route::post('cliente/juridico', 'ClienteController@createClienteJuridico')->name('createClienteJuridico');
    });
    Route::resource('paciente', 'PacienteController');
    Route::resource('exame', 'ExameController');

});

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
// NEGÓCIO

Route::group(['middleware' => 'auth'], function () {

    Route::resource('condicaoPagamento', 'CondicaoPagamentoController');
    Route::name('condicaoPagamento.')->group(function () {
        Route::post('condicaoPagamento/createCondicao_pagamento', 'CondicaoPagamentoController@createCondicao_pagamento')->name('createCondicao_pagamento');
    });

    Route::resource('formaPagamento', 'FormaPagamentoController');
    Route::name('formaPagamento.')->group(function () {
        Route::post('formaPagamento/createForma_pagamento', 'FormaPagamentoController@createForma_pagamento')->name('createForma_pagamento');
    });

    Route::resource('contrato', 'ContratoController');

});