<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class CacheServiesProvider extends ServiceProvider
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
        if(!Cache::has('read_most_posts')){
            $read_most_posts = Post::select('id', 'title')->latest()->limit(10)->get();
            $read_most_posts = Cache::remember('read_most_posts',3600,function() use ($read_most_posts){
                return $read_most_posts;
            });
            $read_most_posts = Cache::get('read_most_posts');
            view()->share([
                'read_most_posts' => $read_most_posts,
            ]);

        }

     }
    
}
    