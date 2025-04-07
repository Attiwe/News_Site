<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewSubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\ShowPostsController;
use App\Http\Controllers\frontend\ContactUsController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\frontend\dashboard\ProfileController;






Auth::routes();
 
//==================routes verification=========================== 
Route::controller(VerificationController::class)->prefix('email')->name('verification.')->group(function(){
    Route::get('/verify', 'show')->name('notice');
    Route::get('/verify/{id}/{hash}', 'verify')->name('verify');
    Route::post('/resend', 'resend')->name('resend');
});

//==================routes frontend=========================== 
Route::group( [ 'as' => 'frontend.'], function(){  
    Route::get('/home',[HomeController::class,'index'])->name('post');
    Route::post('/new-subscriber', [NewSubscriberController::class, 'store'])->name('new-subscriber');
    Route::get('/category/{slug}', CategoryController::class)->name('category');
    //==================routes show posts=========================== 
    Route::controller(ShowPostsController::class)->group(function(){
        Route::get('/show-posts/{slug}', 'index')->name('show-posts');
        Route::get('/show-more-comments/{slug}', 'showMoreComments')->name('show-more-comments');
        Route::post('/add-comment', 'addComment')->name('add-comment');
    });
    //==================routes contact-us=========================== 
    Route::controller(ContactUsController::class)->group(function(){
        Route::get('/contact-us', 'index')->name('contact-us');
        Route::post('/contact-us', 'store')->name('sing-in');
    });
    //==================routes search=========================== 
    Route::match(['get','post'],'/search',SearchController::class)->name('search');

    //==================routes dashboard=========================== 
    Route::controller(ProfileController::class)->prefix('account')->middleware(['auth','verified'])->group(function(){
        Route::get('/', 'index')->name('dashboard');
        Route::post('/add-post', 'addPost')->name('add-post');
        Route::delete('/delete-post/{id}', 'deletePost')->name('delete-post');
    });
    
    
 });    