<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\EnsureGuest;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware(EnsureGuest::class)
        ->name('register');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware(EnsureGuest::class)
        ->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth:api')
        ->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])
        ->middleware('auth:api')
        ->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])
        ->middleware('auth:api')
        ->name('me');
});