<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class CheakSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         Setting::firstOr(function(){
           return Setting::create([
                'stie_name' => 'News Social',
                'email' => 'info@newssocial.com',
                'favicon' => 'favicon.ico',
                'logo' => 'logo.png',
                'phone' => '+1234567890',
                'facebook' => 'https://facebook.com/newssocial',
                'linkendin' => 'https://linkedin.com/company/newssocial',
                'twitter' => 'https://twitter.com/newssocial',
                'youtube' => 'https://youtube.com/newssocial',
                'instagram' => 'https://instagram.com/newssocial',
                'country' => 'United States',
                'city' => 'New York',
                'street' => '123 News Street'
            ]);
         });
    }
}
