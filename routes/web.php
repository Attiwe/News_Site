<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ShowPostsController;
use App\Http\Controllers\frontend\ContactUsController;
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group( [ 'as' => 'frontend.'], function(){
    
    Route::get('/',[HomeController::class,'index'])->name('post');
    Route::post('/new-subscriber', [NewSubscriberController::class, 'store'])->name('new-subscriber');
    Route::get('/category/{slug}', CategoryController::class)->name('category');
    Route::controller(ShowPostsController::class)->group(function(){
        Route::get('/show-posts/{slug}', 'index')->name('show-posts');
        Route::get('/show-more-comments/{slug}', 'showMoreComments')->name('show-more-comments');
        Route::post('/add-comment', 'addComment')->name('add-comment');
    });
    Route::controller(ContactUsController::class)->group(function(){
        Route::get('/contact-us', 'index')->name('contact-us');
        Route::post('/contact-us', 'store')->name('sing-in');
    });

 });    