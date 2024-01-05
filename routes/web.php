<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PasswordController;
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

// 登入
Route::get('/login', [AccountController::class, 'show'])->name('login');
Route::post('/login', [AccountController::class, 'login'])->name('postLogin');

// 登出
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

// 註冊
Route::get('/register', [AccountController::class, 'registerShow'])->name('register');
Route::post('/register', [AccountController::class, 'register'])->name('postRegister');

// 忘記密碼流程
Route::get('/password/forget', [PasswordController::class, 'passwordForget'])->name('password.forget');
Route::post('/password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordController::class, 'resetPassword'])->name('password.update');

// 登入後才可以使用的功能
Route::middleware('checkloggedin')->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('default');
    Route::get('/home', [HomeController::class, 'show'])->name('home');
    Route::get('/member/edit', [MemberController::class, 'show'])->name('member.show');
    Route::post('/member/edit', [MemberController::class, 'edit'])->name('member.edit');
});
