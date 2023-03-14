<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RetweetController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'auth',], function () {
    Route::controller(TimelineController::class)->group(function(){
        Route::get('/home', 'home')->name('home');
    });

    Route::controller(PostController::class)->group(function(){
        Route::post('/store-tweet', 'store')->name('post.store');
        Route::delete('/deleteTweet/{post}', 'destroy')->name('tweet.destroy');
        Route::delete('/deleteRetweet/{retweet}', 'destroyRetweet')->name('retweet.destroy');
    });

    Route::controller(SessionController::class)->group(function(){
        Route::post('/logout', 'destroy')->name('user.destroy');
    });

    Route::controller(CommentController::class)->group(function(){
        Route::get('/comment/{post}', 'store')->name('comment.store');
        Route::get('/commentretweet/{retweet}', 'storeCommentRetweet')->name('commentretweet.store');
        Route::delete('/deleteComment/{comment}', 'destroy')->name('comment.destroy');
    });

    Route::controller(RetweetController::class)->group(function(){
        Route::post('/retweet/{post}', 'store')->name('retweet.store');
        Route::post('/retweet-retweet/{post}', 'storeRetweet')->name('retweet-retweet.store');
    });

    Route::controller(ReplyController::class)->group(function(){
        Route::post('/reply/{comment}', 'store')->name('reply.store');
        Route::delete('/deleteReply/{reply}', 'destroy')->name('reply.destroy');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller(RegisterController::class)->group(function(){
        Route::get('/create', 'create')->name('user.create');
        Route::post('/store', 'store')->name('user.store');
    });

    Route::controller(SessionController::class)->group(function(){
        Route::get('/login', 'gotoLogin')->name('gotoLogin');
        Route::post('/login-check', 'checkUserEmail')->name('checkUserEmail');
        Route::get('/components.login-pass', 'loginPass')->name('loginPass');
        Route::post('/login-user', 'loginUser')->name('loginUser');
    });
});
