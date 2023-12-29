<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
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
