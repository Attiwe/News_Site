<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IndexGitPostsController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//======================== posts ========================
Route::controller(IndexGitPostsController::class)->prefix('posts')->group(function () {
    Route::get('/', 'getPosts');
    Route::get('/show/{slug}', 'showPost');
});