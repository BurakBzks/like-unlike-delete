<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;





Route::get('/register',[RegisterController::class,'showw'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/',[DashboardController::class,'index'])->name('index');


Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'operation']);

Route::post('/logout',[LogoutController::class,'ex'])->name('logout');


Route::get('/post',[PostController::class,'pos'])->name('post');
Route::get('/post/{post}',[PostController::class,'show'])->name('show');
Route::post('/post',[PostController::class,'post']);
Route::delete('/post/{post}',[PostController::class,'del'])->name('post.del');

Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('post.like');

Route::delete('/posts/{post}',[LikeController::class,'destroy'])->name('post.destroy');

Route::get('/users/{user:surname}/posts',[UserPostController::class,'index'])->name('users.posts');






