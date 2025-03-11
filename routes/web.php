<?php

use App\Http\Controllers\frontend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PostController::class)->group(function(){
    Route::get('/','index')->name('post');
});
 
 