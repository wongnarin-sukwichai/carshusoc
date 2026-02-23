<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CertController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\DegreeController;
use App\Http\Controllers\Api\EnrollController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\NationController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CompleteController;
use App\Http\Controllers\Api\ExportController;
use App\Http\Controllers\Api\WorkController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\PasswordResetController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ReceiptController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\ScoreController;

Route::middleware(['web'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    ////////////////////////// Guest //////////////////////////////////
    Route::middleware('guest')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::resource('register', RegisterController::class);
        Route::post('forgot-password', [PasswordResetController::class, 'sendLink']);
        Route::post('reset-password',   [PasswordResetController::class, 'reset']);
    });

    ////////////////////////// Authen //////////////////////////////////
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('user', UserController::class);
        Route::put('userPic/{id}', [UserController::class, 'userPic']);
        Route::put('user/{id}', [UserController::class, 'update']);
        Route::get('userAdmin', [UserController::class, 'userAdmin']);
        Route::get('user/{id}', [UserController::class, 'show']);

        Route::resource('member', MemberController::class);

        Route::post('chkSearch', [SearchController::class, 'chkSearch']);
        Route::post('search', [SearchController::class, 'Search']);
        Route::post('searchEnroll', [SearchController::class, 'SearchEnroll']);

        Route::resource('gender', GenderController::class);
        Route::resource('type', TypeController::class);
        Route::resource('degree', DegreeController::class);
        Route::resource('nation', NationController::class);
        Route::resource('upload', UploadController::class);
        Route::resource('event', EventController::class);

        Route::post('uploadContent', [UploadController::class, 'uploadContent']);
        Route::resource('content', ContentController::class);

        Route::resource('section', SectionController::class);
        Route::get('sectionTrain', [SectionController::class, 'sectionTrain']);
        Route::get('sectionTest', [SectionController::class, 'sectionTest']);
        Route::get('sectionEnd/{id}', [SectionController::class, 'sectionEnd']);

        Route::resource('enroll', EnrollController::class);

        Route::get('detail/{id}', [ContentController::class, 'detail']);

        Route::resource('course', CourseController::class);

        Route::resource('complete', CompleteController::class);
        Route::resource('work', WorkController::class);

        Route::post('uploadComplete', [UploadController::class, 'uploadComplete']);

        Route::resource('payment', PaymentController::class);

        Route::post('uploadCert', [UploadController::class, 'uploadCert']);

        Route::resource('cert', CertController::class);

        Route::resource('report', ReportController::class);
        Route::post('reportSearchTrain', [ReportController::class, 'reportSearchTrain']);
        Route::post('reportTrain', [ReportController::class, 'reportTrain']);

        Route::post('reportSearchTest', [ReportController::class, 'reportSearchTest']);
        Route::post('reportTest', [ReportController::class, 'reportTest']);

        Route::resource('export', ExportController::class);

        Route::post('uploadReceipt', [UploadController::class, 'uploadReceipt']);

        Route::resource('receipt', ReceiptController::class);

        Route::resource('email', EmailController::class);

        Route::get('chkPass', [EnrollController::class, 'chkPass']);

        Route::resource('score', ScoreController::class);

        Route::get('warnMail', [EmailController::class, 'warnMail']);
        Route::post('sendWarnMail', [EmailController::class, 'sendWarnMail']);

        ////////////////////////// Member //////////////////////////////////
        Route::get('showEnroll', [EnrollController::class, 'showEnroll']);
        Route::get('detailEnroll/{id}', [EnrollController::class, 'detailEnroll']);
        Route::get('editEnroll/{id}', [EnrollController::class, 'editEnroll']);
        Route::post('uploadWork', [UploadController::class, 'uploadWork']);
        Route::post('uploadPayment', [UploadController::class, 'uploadPayment']);
        Route::get('showCert', [CertController::class, 'showCert']);
        Route::get('certTrain/{id}', [CertController::class, 'certTrain']);
        Route::get('certTest/{id}', [CertController::class, 'certTest']);
    });
});
