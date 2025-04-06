<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Models\RelatedNewsSite;
use App\Models\Category;
    
class ShareViewProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

  
    public function boot(): void
    {
        //  Cache::forget('last_posts');
        if(!Cache::has('last_posts')){
        $last_posts = Post::select('id', 'title', 'slug')->latest()->limit(4)->get();
        Cache::remember('last_posts', 3600, function () use ($last_posts) {
            return $last_posts;
         });
       }
       $last_posts = Cache::get('last_posts');

         
        if(!Cache::has('popular_posts')){
        $popular_posts = Post::select('id', 'title', 'slug')->orderBy('number_view', 'desc')->limit(4)->get();
        Cache::remember('popular_posts', 3600, function () use ($popular_posts) {
            return $popular_posts;
         });
       }
        $popular_posts = Cache::get('popular_posts');
        
        $getRelatedNewsSite = RelatedNewsSite::select('name','url')->get();
        $categories = Category::select('id','name','slug')->get();

       view()->share([
        'last_posts'=>  $last_posts ,
        'popular_posts'=>  $popular_posts ,
        'getRelatedNewsSite' => $getRelatedNewsSite,
        'categories' => $categories,
        ]);
    }
}