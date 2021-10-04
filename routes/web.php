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

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
|
|
*/

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});

/*
|--------------------------------------------------------------------------
| Regiões
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'pais' => 'PaisController',
        'estado' => 'EstadoController',
        'cidade' => 'CidadeController'
    ]);

    Route::name('pais.')->group(function () {
        Route::post('pais/createPais', 'PaisController@createPais')->name('createPais');
    });

    Route::name('estado.')->group(function () {
        Route::post('estado/createEstado', 'EstadoController@createEstado')->name('createEstado');
    });

    Route::name('cidade.')->group(function () {
        Route::post('cidade/createCidade', 'CidadeController@createCidade')->name('createCidade');
        Route::post('cidade/createCidadeMedico', 'CidadeController@createCidadeMedico')->name('createCidadeMedico');
    });

});

/*
|--------------------------------------------------------------------------
| Equipe
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'fornecedor' => 'FornecedorController',
        'medico' => 'MedicoController'
    ]);

    Route::name('medico.')->group(function () {
        Route::post('medico/createMedico', 'MedicoController@createMedico')->name('createMedico');
    });

});

/*
|--------------------------------------------------------------------------
| Geral
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'cliente' => 'ClienteController',
        'paciente' => 'PacienteController',
        'exame' => 'ExameController',
        'categoria' => 'CategoriaController'
    ]);

    Route::name('cliente.')->group(function () {
        Route::post('cliente/fisico', 'ClienteController@createClienteFisico')->name('createClienteFisico');
        Route::post('cliente/juridico', 'ClienteController@createClienteJuridico')->name('createClienteJuridico');
        Route::get('cliente/fisico/{id}', 'ClienteController@showFisico')->name('showClienteFisico');
        Route::get('cliente/juridico/{id}', 'ClienteController@showJuridico')->name('showClienteJuridico');
    });

});

/*
|--------------------------------------------------------------------------
| Negócio
|--------------------------------------------------------------------------
|
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'condicaoPagamento' => 'CondicaoPagamentoController',
        'formaPagamento' => 'FormaPagamentoController',
        'contrato' => 'ContratoController'
    ]);

    Route::name('condicaoPagamento.')->group(function () {
        Route::post('condicaoPagamento/createCondicao_pagamento', 'CondicaoPagamentoController@createCondicao_pagamento')->name('createCondicao_pagamento');
    });

    Route::name('formaPagamento.')->group(function () {
        Route::post('formaPagamento/createForma_pagamento', 'FormaPagamentoController@createForma_pagamento')->name('createForma_pagamento');
    });

});