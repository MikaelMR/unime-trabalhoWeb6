<?php

/*
* União Metropolitana de Educação e Cultura
* Bacharelado em Sistemas de Informação
* Programação Orientada a Objetos II
* Prof. Pablo Ricardo Roxo Silva
* Mikael Magalhães Ramos
*/

use App\Http\Controllers\AventureiroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/aventureiro', [AventureiroController::class, 'index']);
Route::get('/aventureiro/{id}', [AventureiroController::class, 'show']);
Route::post('/aventureiro', [AventureiroController::class, 'store']);
Route::put('/aventureiro/{id}', [AventureiroController::class, 'update']);
Route::delete('/aventureiro/{id}', [AventureiroController::class, 'destroy']);
