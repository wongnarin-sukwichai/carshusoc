<?php

use Illuminate\Support\Facades\Route;

Route::get('symlink', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'OK';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*');
