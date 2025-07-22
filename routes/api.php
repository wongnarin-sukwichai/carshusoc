<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\NationController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\UploadController;

Route::middleware(['web'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    //Guest
    Route::middleware('guest')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });

    //Auth
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('user', UserController::class);
        Route::put('userPic/{id}', [UserController::class, 'userPic']);
        Route::put('user/{id}', [UserController::class, 'update']);

        Route::resource('gender', GenderController::class);
        Route::resource('type', TypeController::class);
        Route::resource('degree', DegreeController::class);
        Route::resource('nation', NationController::class);
        Route::resource('upload', UploadController::class);
        
    });
});
