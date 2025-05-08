<?php

use Illuminate\Support\Facades\Route;

Route::get('symlink', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'OK';
});

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');
