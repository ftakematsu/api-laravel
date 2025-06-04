<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Requisições que não precisam de autenticação (middleware) */
Route::controller(AuthController::class)->group(function() {
    Route::get('test', 'testeApi');
    Route::post('auth', 'login');
});

Route::controller(ItemController::class)->group(function() {
    Route::post('items', 'create');
    Route::get('items', 'getAll');
});

/* Requisições que precisam de um token de autenticação */
Route::controller(AuthController::class)
    ->middleware('auth:sanctum')->group( function () {
    Route::get('user', 'usuarioLogado');
    Route::post('logout', 'logoutUser');
});

Route::controller(UserController::class)
    ->middleware('auth:sanctum')->group( function () {
    Route::post('user', 'store');
});

// Exemplo de método que exige autenticação do usuário
Route::group(['middleware' => 'auth:sanctum'], function () { // Adição de camada de segurança
    Route::get('test-auth', [UserController::class, 'testAuth']);
});

