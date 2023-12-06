<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('index');});

Route::get('/cadastroLogin', 'App\Http\Controllers\Controlador@formLogin');

Route::post('/', 'App\Http\Controllers\Controlador@preencheLogin' ) -> name ('formularioLogin');

Route::post('/paginaInicial', 'App\Http\Controllers\Controlador@validaLogin' ) -> name ('validaLogin');

Route::get('/meioAmbiente', 'App\Http\Controllers\Controlador@meioAmbiente');

Route::get('/abrirProtocolo', 'App\Http\Controllers\Controlador@abrirProtocolo');

Route::get('/editarPerfil', 'App\Http\Controllers\Controlador@editarPerfil');

Route::post('/atualizaPerfil', 'App\Http\Controllers\Controlador@atualizaPerfil' ) -> name ('atualizaPerfil');

Route::get('/meusProtocolos', 'App\Http\Controllers\Controlador@meusProtocolos');

Route::get('/filtrarProtocolos', 'App\Http\Controllers\Controlador@filtrarProtocolos')->name('filtrarProtocolos');

Route::get('/get-protocolos', 'App\Http\Controllers\Controlador@getProtocolos')->name('get-protocolos');

Route::post('/formularioProtocolo', 'App\Http\Controllers\Controlador@formularioProtocolo' ) -> name ('formularioProtocolo');

Route::get('/detalhesProtocolos/{id}', 'App\Http\Controllers\Controlador@detalhesProtocolos')-> name ('detalhesProtocolos');

