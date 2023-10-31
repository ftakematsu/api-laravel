<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Requisições que não precisam de autenticação (middleware) */
Route::controller(AuthController::class)->group(function() {
    Route::get('test', 'testeApi');
    Route::post('auth', 'login');
});

/* Requisições que precisam de um token de autenticação */
Route::controller(AuthController::class)
    ->middleware('auth:sanctum')->group( function () {
    Route::get('user', 'usuarioLogado');
});

Route::controller(UserController::class)
    ->middleware('auth:sanctum')->group( function () {
    Route::post('user', 'store');
});