<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/create', [RegisterController::class, 'create'])->name('user.create');
Route::post('/store', [RegisterController::class, 'store'])->name('user.store');

Route::get('/login', [SessionController::class, 'gotoLogin'])->name('gotoLogin');
Route::post('/login-check', [SessionController::class, 'checkUserEmail'])->name('checkUserEmail');

Route::get('/components.login-pass', [SessionController::class, 'loginPass'])->name('loginPass');

Route::post('/login-user', [SessionController::class, 'loginUser'])->name('loginUser');

Route::get('/home', [TimelineController::class, 'home'])->name('home');

// Route::