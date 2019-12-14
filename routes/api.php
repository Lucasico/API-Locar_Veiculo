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

//----------------------------rotas para cliente---------------------------//
//criar
Route::post('/cliente', 'controllerCliente@save');

//atualizar
Route::put('/cliente/atualizar/{id}', 'controllerCliente@update');

//lista
Route::get('/cliente/lista', 'controllerCliente@index');

//apagar
Route::delete('/cliente/apagar/{id}', 'controllerCliente@apagar');


//----------------------------rotas para carro---------------------------//

//criar
Route::post('/carro', 'controllerCarro@save');

//atualizar
Route::put('/carro/atualizar/{id}', 'controllerCarro@update');

//listar
Route::get('/carro/lista', 'controllerCarro@index');

//apagar
Route::delete('/carro/apagar/{id}', 'controllerCarro@apagar');

//----------------------------rotas para locação---------------------------//

//criar
Route::post('/locar', 'controllerLocar@save');

//atualizar
Route::put('/locar/atualizar/{id}', 'controllerLocar@update');

//listar
Route::get('/locar/lista', 'controllerLocar@index');

//apagar
Route::delete('/locar/apagar/{id}', 'controllerLocar@apagar');
