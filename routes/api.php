<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('test', 'testeApi');
    Route::post('auth', 'login');
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(AuthController::class)->middleware('auth:sanctum')->group( function () {
    Route::get('user', 'usuarioLogado');
    Route::post('logout', 'logoutUser');
});

Route::controller(UserController::class)->middleware('auth:sanctum')->group( function () {
    Route::get('users', 'getAllUsers');
    Route::post('user', 'createUser');
});
