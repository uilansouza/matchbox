<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'api'],function()
{
    Route::group(['prefix'=>'vagas'],function()
    {
        Route::get('',['uses'=>'VagasController@TodasVagas']);

        Route::get('{id}',['uses'=>'VagasController@gconsultaVaga']);
        
        Route::post('',['uses'=>'VagasControllerr@incluiVaga']);

        Route::put('{id}',['uses'=>'VagasController@atualizaVaga']);

        Route::delete('{id}',['uses'=>'VagasController@deletavaga']);

    });

    Route::group(['prefix'=>'candidato'],function()
    {
        Route::get('',['uses'=>'CandidatoController@todosCandidatos']);

        Route::get('{id}',['uses'=>'CandidatoController@consultaCandidato']);
        
        Route::post('',['uses'=>'CandidatoController@incluiCandidato']);

        Route::put('{id}',['uses'=>'CandidatoController@atualizaCandidato']);

        Route::delete('{id}',['uses'=>'CandidatoController@deleteCandidato']);

    });



});