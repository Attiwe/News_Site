<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ShowPostsController;
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group( [ 'as' => 'frontend.'], function(){
    
    Route::get('/',[HomeController::class,'index'])->name('post');
    Route::post('/new-subscriber', [NewSubscriberController::class, 'store'])->name('new-subscriber');
    Route::get('/category/{slug}', CategoryController::class)->name('category');
    Route::get('/show-posts/{slug}', [ShowPostsController::class,'index'])->name('show-posts');
    Route::get('/show-more-comments/{slug}', [ShowPostsController::class,'showMoreComments'])->name('show-more-comments');
    Route::post('/add-comment', [ShowPostsController::class,'addComment'])->name('add-comment');

 });    