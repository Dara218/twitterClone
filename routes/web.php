<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/create', [RegisterController::class, 'create'])->middleware('guest')->name('user.create');
Route::post('/store', [RegisterController::class, 'store'])->middleware('guest')->name('user.store');

Route::get('/login', [SessionController::class, 'gotoLogin'])->middleware('guest')->name('gotoLogin');
Route::post('/login-check', [SessionController::class, 'checkUserEmail'])->middleware('guest')->name('checkUserEmail');

Route::get('/components.login-pass', [SessionController::class, 'loginPass'])->name('loginPass');

Route::post('/login-user', [SessionController::class, 'loginUser'])->middleware('auth')->name('loginUser');

Route::get('/home', [TimelineController::class, 'home'])->middleware('auth')->name('home');

Route::post('/store-tweet', [PostController::class, 'store'])->middleware('auth')->name('post.store');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('user.destroy');

Route::post('/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');
