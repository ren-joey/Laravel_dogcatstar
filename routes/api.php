<?php

use App\Http\Controllers\Api\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\EnsureMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/orders', [OrderController::class, 'index']);

Route::get('/user/orders', [OrderController::class, 'userOrders'])->middleware('auth:api');

Route::post('/orders/create', [OrderController::class, 'store'])->middleware('auth:api');

Route::put('/orders/{id}', [OrderController::class, 'update'])->middleware('auth:api');

Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->middleware('auth:api');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

require __DIR__ . '/auth.php';
