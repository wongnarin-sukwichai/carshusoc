<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('symlink', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'OK';
});

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'th'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/temp-code', function () {
    return view('emails/temp-code');
});
Route::get('/completeMail', function () {
    return view('emails/completeMail');
});
Route::get('/finishMail', function () {
    return view('emails/finishMail');
});
Route::get('/paymentMail', function () {
    return view('emails/paymentMail');
});
Route::get('/receiptMail', function () {
    return view('emails/receiptMail');
});
Route::get('/workMail', function () {
    return view('emails/workMail');
});
Route::get('/enroll', function () {
    return view('emails/enroll');
});

//////////////////////////// ไว้ล่างสุด ///////////////////////////////////////////
Route::get('{any}', function () {
    return view('home');
})->where('any', '.*');

