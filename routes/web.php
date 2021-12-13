<?php

use App\Http\Controllers\Admin\AddStudentFeeController;
use App\Http\Controllers\Admin\AdminFeeController;
use App\Http\Controllers\Admin\AdminStudentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeOtpController;
use App\Http\Controllers\StudentDetailsController;
use App\Http\Controllers\StudentDetailsOtpController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['manager', 'prevent-back-history']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('student', [StudentsController::class, 'create'])->name('student.create');
    Route::post('student', [StudentsController::class, 'store'])->name('student.store');
    
    Route::get('verify/email', [VerifyEmailController::class, 'index'])->name('verify.email');
    Route::get('verify/email/otp/{id}', [VerifyEmailController::class, 'otp'])->name('verify.email.otp');
    Route::post('verify/email/otp', [VerifyEmailController::class, 'otpPost'])->name('verify.email.otp.store');
    
    Route::get('fee/otp', [FeeOtpController::class, 'otp'])->name('fee.otp');
    Route::post('fee/otp', [FeeOtpController::class, 'otpPost'])->name('fee.otp.store');
    Route::get('fee/otp/verify/{id}', [FeeOtpController::class, 'verifyEmail'])->name('fee.verify.email');
    Route::post('fee/otp/verify', [FeeOtpController::class, 'verifyEmailPost'])->name('fee.verify.store');
    
    Route::get('fee/create/{checksum}/{id}', [FeeController::class, 'create'])->name('fee.create');
    Route::post('fee/store', [FeeController::class, 'store'])->name('fee.store');
    
    Route::get('student/details/otp', [StudentDetailsOtpController::class, 'otp'])->name('student.details.otp');
    Route::post('student/details/otp', [StudentDetailsOtpController::class, 'otpPost'])->name('student.details.otp.store');
    Route::get('student/details/otp/verify/{id}', [StudentDetailsOtpController::class, 'verifyEmail'])->name('student.details.verify.email');
    Route::post('student/details/otp/verify', [StudentDetailsOtpController::class, 'verifyEmailPost'])->name('student.details.verify.store');
    
    Route::get('Student/details/show/{checksum}/{id}', [StudentDetailsController::class, 'show'])->name('student.details.show');
    
});


//Route::get('verify/email/sendOTP/{id}', [VerifyEmailController::class, 'sendOTP'])->name('verify.email.sendOTP');


/***************************************** ADMIN ROUTES **********************************/
Route::group(['prefix'=>'admin'], function(){
    Route::group(['middleware'=>['adminMiddleware', 'prevent-back-history']],function(){
        Route::resource('dashboard', DashboardController::class);
        Route::resource('admin_student', AdminStudentsController::class);
        Route::resource('admin_fee', AdminFeeController::class);
        Route::resource('status', StatusController::class);

        Route::get('student/fee/{id}', [AddStudentFeeController::class, 'show'])->name('admin.add.student.fee');
        Route::post('student/fee', [AddStudentFeeController::class, 'store'])->name('admin.add.student.fee.store');
    });
});

Auth::routes();

