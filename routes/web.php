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
use App\Http\Controllers\frontend\dashboard\SettingController;
use App\Http\Controllers\frontend\dashboard\NotificationsController;
use App\Http\Controllers\frontend\Socialite\SocialiteGoogleController;
use App\Http\Controllers\frontend\Socialite\SocialiteFaceBookController;
 
<<<<<<< HEAD



=======
>>>>>>> api

Auth::routes();
//====================routes verification======================
Route::controller(VerificationController::class)->prefix('email')->name('verification.')->group(function () {
    Route::get('/verify', 'show')->name('notice');
    Route::get('/verify/{id}/{hash}', 'verify')->name('verify');
    Route::post('/resend', 'resend')->name('resend');
});

//==================routes frontend=========================== 
Route::group( [ 'as' => 'frontend.'], function(){  
<<<<<<< HEAD
    Route::get('/home',[HomeController::class,'index'])->name('post');
=======

    //==================routes home=========================== 
    Route::get('/home',[HomeController::class,'index'])->name('home');

    //================== routes new-subscriber=========================== 
>>>>>>> api
    Route::post('/new-subscriber', [NewSubscriberController::class, 'store'])->name('new-subscriber');

    //================== routes category=========================== 
    Route::get('/category/{slug}', CategoryController::class)->name('category');

    //================== routes show posts=========================== 
    Route::controller(ShowPostsController::class)->group(function () {
        Route::get('/show-posts/{slug}', 'index')->name('show-posts')->middleware('checkNotificationReadAs');
        Route::get('/show-more-comments/{slug}', 'showMoreComments')->name('show-more-comments');
        Route::post('/add-comment', 'addComment')->name('add-comment');//ajax
    });
    //==================routes contact-us=========================== 
    Route::controller(ContactUsController::class)->group(function () {
        Route::get('/contact-us', 'index')->name('contact-us');
        Route::post('/contact-us', 'store')->name('sing-in');
    });
    //============================ End routes contact-us ============================
    
<<<<<<< HEAD
    //==================routes search=========================== 
=======
    //================== routes search ============================ 
>>>>>>> api
    Route::match(['get', 'post'], '/search', SearchController::class)->name('search');
    //============================ End routes search ============================

    //================== routes dashboard ============================ 
    Route::controller(ProfileController::class)->prefix('account')->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::post('/add-post', 'addPost')->name('add-post');
        Route::get('/post/{slug}/edit', 'editPost')->name('edit-post');
        Route::put('/update-post', 'updatePost')->name('update-post');
        Route::get('/show-more-comments/{id}', 'showMoreComments')->name('show-more-comments-dashbord');//ajax
        Route::delete('/delete-post/{id}', 'deletePost')->name('delete-post');
    });
    //============================ End routes dashboard ============================

    //==================routes setting profile=========================== 
    Route::controller(SettingController::class)->prefix('dashboard/account')->middleware(['auth:web', 'verified'])->group(function () {
        Route::get('/setting', 'index')->name('setting');
        Route::put('/setting', 'update')->name('update-setting');
    });  
<<<<<<< HEAD
    //============================ End routes setting profile ============================
     

=======
    //============================ End routes setting profile ===========================
     
>>>>>>> api
    //==================routes notifications=========================== 
    Route::controller(NotificationsController::class)->prefix('dashboard/account')->middleware(['auth:web', 'verified'])->group(function () {
        Route::get('/notifications', 'index')->name('notifications-profile');
        Route::get('/read-all', 'readAll')->name('read-all');
        Route::delete('/delete-notification', 'deleteNotification')->name('delete-notification');
        Route::delete('/delete-all', 'deleteAll')->name('delete-all');
    });
    //============================ End routes notifications ============================
<<<<<<< HEAD

});

//==================routes Socialite Google===========================
=======
});

//================== routes Socialite Google ============================
>>>>>>> api
Route::controller(SocialiteGoogleController::class)->prefix('auth')->group(function () {
    Route::get('/redirect', 'redirectToGoogle')->name('google.login');
    Route::get('/callback', 'handleGoogleCallback')->name('google.callback');
});

//==================routes Socialite facebook===========================
Route::controller(SocialiteFaceBookController::class)->prefix('auth/facebook')->group(function () {
    Route::get('/redirect', 'redirectToFacebook')->name('facebook.login');
    Route::get('/callback', 'handleFacebookCallback')->name('facebook.callback');
});
 
require __DIR__ . '/admin.php';


