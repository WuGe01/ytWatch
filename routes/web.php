<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'show'])->name('default')->middleware('checkloggedin');
Route::get('/home', [HomeController::class, 'show'])->name('home')->middleware('checkloggedin');

Route::get('/login', [AccountController::class, 'show'])->name('login');
Route::post('/login', [AccountController::class, 'login'])->name('postLogin');

Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::get('/register', [AccountController::class, 'registerShow'])->name('register');
Route::post('/register', [AccountController::class, 'register'])->name('postRegister');

Route::get('/password/forget', [AccountController::class, 'passwordForget'])->name('password.forget');
Route::post('/password/email', [AccountController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AccountController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AccountController::class, 'resetPassword'])->name('password.update');

// 測驗信件
Route::get('/send-mail', function () {
    Mail::raw('這是一封測試郵件', function ($message) {
        $message->to('dennis.wu@ccdntech.com')->subject('測試郵件');
    });

    return '郵件已發送！';
});
