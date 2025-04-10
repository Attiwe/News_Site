<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

         if(request()->is('/home')){
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('optimize:clear');
         }  
    }
}
