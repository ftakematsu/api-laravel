<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactsController;
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

Route::controller(ContactsController::class)->middleware('auth:sanctum')->group( function () {
    Route::get('contacts', 'getAll');
    Route::post('contact', 'create');
    Route::get('contact/{id}', 'get');
    Route::put('contact/{id}', 'edit');
    Route::delete('contact/{id}', 'remove');
});
