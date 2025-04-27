<?php
namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RelsAuthProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        foreach (config('Authorization.permissions') as $config_permission => $value) {
            Gate::define($config_permission, function ($auth) use ($config_permission) {
                return $auth->hasPermission($config_permission);
            });
        }
    }
}
