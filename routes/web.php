<?php

/**
 * Projeto: API de Gerenciamento de Vagas e Candidatos;
 * Autho: Uilan Souza;
 * Email: uilan.souza@hotmail.com;
 * Date: 28-02-2019;
 */

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'api'],function()
{
    /**
     * Rotas para Gerenciar Candidatos CRUD
     */
    Route::group(['prefix'=>'vagas'],function()
    {
        Route::get('',['uses'=>'VagasController@TodasVagas']);

        Route::get('{id}',['uses'=>'VagasController@consultaVaga']);
        
        Route::post('',['uses'=>'VagasController@incluiVaga']);

        Route::put('{id}',['uses'=>'VagasController@atualizaVaga']);

        Route::delete('{id}',['uses'=>'VagasController@deletavaga']);

    });

     /**
     * Rotas para Gerenciar VAGAS CRUD
     */

    Route::group(['prefix'=>'candidato'],function()
    {
        Route::get('',['uses'=>'CandidatoController@todosCandidatos']);

        Route::get('{nome}',['uses'=>'CandidatoController@consultaCandidato']);
        
        Route::post('',['uses'=>'CandidatoController@incluiCandidato']);

        Route::put('{id}',['uses'=>'CandidatoController@atualizaCandidato']);

        Route::delete('{id}',['uses'=>'CandidatoController@deletaCandidato']);

    });

    /**
     * Rotas para Gerenciar CANDIDATURA
     */

    Route::group(['prefix'=>'candidatura'],function()
    {
        Route::get('',['uses'=>'CandidaturaController@todasCandidaturas']);

        Route::get('{nome}',['uses'=>'CandidaturaController@consultaCandidaturas']);
        
        Route::post('',['uses'=>'CandidaturaController@incluirCandidatura']);

        Route::put('{id}',['uses'=>'CandidaturaController@atualizaCandidatura']);

        Route::delete('{id}',['uses'=>'CandidaturaController@deletaCandidatura']);

    });



});
