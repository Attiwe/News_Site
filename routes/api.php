<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IndexGitPostsController;
use App\Http\Controllers\Api\ContactUsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//======================== All Posts ========================
Route::controller(IndexGitPostsController::class)->prefix('posts')->group(function () {
    Route::get('/{keyword?}', 'getPosts');
    Route::get('/show/{slug}', 'showPost');
});

//======================== Categories ========================
Route::controller( CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::get('/category-posts/{slug}', 'getCategoryPosts');
});

//======================== Contact Us ========================
Route::post('contact',[ContactUsController::class,'contactStore']);

 
//======================== Setting ========================
Route::controller(SettingsController::class)->prefix('settings')->group(function () {

    Route::get('/', 'index');
    Route::get('related-site', 'related');
});