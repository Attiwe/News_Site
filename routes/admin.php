
<?php

use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\Password\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\Password\ResetPasswordController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Admin\AdminController;
 

// auth admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'  ], function() {
    //======================routes login=========================== 
    Route::controller(AdminLoginController::class)->group(function() {
        Route::get('login', 'show')->name('login');
        Route::post('login', 'login')->name('login.check');
        Route::get('logout', 'logout')->name('logout');
    });

    //======================routes verify password=========================== 
    Route::group(['prefix' => 'password', 'as' => 'password.'],function(){
        //======================routes forgot verify password=========================== 
        Route::controller(ForgotPasswordController::class)->group(function() {
            Route::get('forget', 'show')->name('forget');
            Route::post('forget/password', 'sendResetLinkEmail')->name('forget.check');
            Route::get('confirm/{email}', 'showResetForm')->name('confirm');
            Route::post('verify', 'verifyOtp')->name('verifyOtp.check');
        });
        //======================routes reset verify password=========================== 
        Route::controller( ResetPasswordController::class)->group(function() {
            Route::get('reset/{email}', 'show')->name('reset');
            Route::post('reset', 'reset')->name('reset.check');
        });
        
    });
    

});
 
Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=> 'auth:admin' ], function() {
    
     Route::get('home',function(){
        return view('admin.index');
     })->name('home');

     //======================routes Users===============================
     Route::resource('users',UserController::class);
     Route::get('users/status/{id}',[UserController::class,'status'])->name('users.status');

     //======================routes Categories==========================
     Route::resource('categories',CategoryController::class);
     Route::get('categories/status/{id}',[CategoryController::class,'status'])->name('categories.status');

     //======================routes posts==========================
     Route::resource('posts',PostsController::class);
     Route::controller(PostsController::class)->group(function() {
        Route::get('posts/commentable/{id}', 'commentable')->name('posts.commentable');
        Route::get('posts/status/{id}', 'status')->name('posts.status');
     });
     
     //======================routes settings==========================
    Route::controller(SettingController::class)->group(function() {
        Route::get('settings', 'index')->name('settings');
        Route::get('settings/edit', 'edit')->name('settings.edit');
        Route::put('settings/update', 'update')->name('settings.update');
    });

    //======================routes admins==========================
    Route::resource('admins',AdminController::class);
    Route::get('admins/status/{id}', [AdminController::class, 'status'])->name('admins.status');
    
});