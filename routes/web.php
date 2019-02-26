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

Route::group(['prefix'=>'api'],function()
{
    Route::group(['prefix'=>'vagas'],function()
    {
        Route::get('',['uses'=>'VagasController@TodasVagas']);

        Route::get('{id}',['uses'=>'VagasController@consultaVaga']);
        
        Route::post('',['uses'=>'VagasControllerr@incluiVaga']);

        Route::put('{id}',['uses'=>'VagasController@atualizaVaga']);

        Route::delete('{id}',['uses'=>'VagasController@deletaVaga']);

    });

    Route::group(['prefix'=>'candidato'],function()
    {
        Route::get('',['uses'=>'CandidatoController@todosCandidatos']);

        Route::get('{id}',['uses'=>'CandidatoController@consultaCandidato']);
        
        Route::post('',['uses'=>'CandidatoController@incluiCandidato']);

        Route::put('{id}',['uses'=>'CandidatoController@atualizaCandidato']);

        Route::delete('{id}',['uses'=>'CandidatoController@deletaCandidato']);

    });

   



});



/**
 * adicionar vagas
 * atualizar vaga
 * excluir vaga
 * visualizar vaga
 * 
 * 
 */