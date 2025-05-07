<?php

use App\Http\Controllers\Api\Account\CommentController;
use App\Http\Controllers\Api\Account\NotificationsController;
use App\Http\Controllers\Api\Account\PostsController;
use App\Http\Controllers\Api\Auth\LoginAuthController;
use App\Http\Controllers\Api\Auth\Password\ForgetPasswordcontroller;
use App\Http\Controllers\Api\Auth\RegesterAuthController;
use App\Http\Controllers\Api\Auth\VerifyController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IndexGitPostsController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\Account\SettingController;



Route::get('/user', function (Request $request) {
    return UserResource::make($request->user());
    ;
})->middleware('auth:sanctum');

//======================== Routes admin sanctum ========================
Route::middleware('auth:sanctum')->prefix('account')->group(function () {

    //======================== get user  ========================
    Route::get('/user', function (Request $request) {
        return UserResource::make($request->user());
    });
    //======================== update user  ========================
    Route::put('user/setting/update', [SettingController::class, 'update']);/// setting user
    Route::put('chang_password', [SettingController::class, 'changePassword']);/// setting user

    //======================== route posts user  ========================
    Route::controller(PostsController::class)->prefix('posts')->group(function () {
        Route::get('/', 'getPosts');
        Route::post('/create_posts', 'createPosts');
        Route::put('/update_posts/{slug}', 'updatePosts');
        Route::delete('/delete_posts/{id}', 'deletePosts');
        Route::get('post_comments/{id}', 'postComments');
    });

    //======================== route comments user  ========================
    Route::post('posts/{id}/comments', [CommentController::class, '__invoke']);

    //======================== route notifications user  ========================
    Route::post('notification/user', [NotificationsController::class, '__invoke']);


});


//======================== Auth Login ========================
Route::controller(LoginAuthController::class)->prefix('auth')->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
//======================== Auth Register ========================
Route::post('register', [RegesterAuthController::class, 'register']);

//======================== Auth Verify ========================
Route::controller(VerifyController::class)->prefix('auth')->group(function () {
    Route::post('email/verify', 'verifyEmail')->middleware('auth:sanctum');
    Route::get('/send/otp', 'sendOtpAgain')->middleware('auth:sanctum');
});

//======================== ForgetPassword ========================
Route::post('password/forget', [ForgetPasswordcontroller::class, 'sendOtp']);

//======================== ResetPassword ========================
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword']);

//================================End Auth ========================



//======================== All Posts ========================
Route::controller(IndexGitPostsController::class)->prefix('posts')->group(function () {
    Route::get('/{keyword?}', 'getPosts');
    Route::get('/show/{slug}', 'showPost');
});

//======================== Categories ========================
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');
    Route::get('/category-posts/{slug}', 'getCategoryPosts');
});

//======================== Contact Us ========================
Route::post('contact', [ContactUsController::class, 'contactStore']);


//======================== Setting ========================
Route::controller(SettingsController::class)->prefix('settings')->group(function () {

    Route::get('/', 'index');
    Route::get('related-site', 'related');
});