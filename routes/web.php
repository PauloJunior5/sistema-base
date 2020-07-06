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
    if (session('logged') == 'true') {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');









Route::group(['middleware' => 'auth'], function () {
    Route::resource('cliente', 'ClienteController', ['except' => ['show']]);
    Route::put('cliente/{id}', 'ClienteController@update')->name('cliente.update');
    Route::post('cliente/getCidade', 'ClienteController@getCidade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('medico', 'MedicoController', ['except' => ['show']]);
    Route::put('medico/{id}', 'MedicoController@update')->name('medico.update');
    Route::post('medico/show', 'MedicoController@show');
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
    Route::resource('laboratorio', 'LaboratorioController', ['except' => ['show']]);
    Route::put('laboratorio/{id}', 'LaboratorioController@update')->name('laboratorio.update');
});








Route::group(['middleware' => 'auth'], function () {
    Route::resource('pais', 'PaisController', ['except' => ['show']]);
    Route::post('pais/createPais', 'PaisController@createPais')->name('pais.createPais');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('estado', 'EstadoController', ['except' => ['show']]);
    Route::post('estado/destroy', 'EstadoController@destroy');
    Route::get('estado/destroy', 'EstadoController@destroy');
    Route::post('estado/getPais', 'EstadoController@getPais');
    Route::post('estado/createEstado', 'EstadoController@createEstado')->name('estado.createEstado');
});

Route::group(['middleware' => 'auth'], function () {    
    Route::resource('cidade', 'CidadeController', ['except' => ['show']]);
    Route::post('cidade/destroy', 'CidadeController@destroy');
    Route::get('cidade/destroy', 'CidadeController@destroy');
    Route::post('cidade/getEstado', 'CidadeController@getEstado');
    Route::post('cidade/show', 'CidadeController@show');
    Route::post('cidade/createCidade', 'CidadeController@createCidade')->name('cidade.createCidade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
