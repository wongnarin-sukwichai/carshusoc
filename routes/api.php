<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

Route::middleware(['web'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    //Guest
    Route::middleware('guest')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });

    //Auth
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('user', UserController::class);
    });
    
});
