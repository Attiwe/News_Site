<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts       = Post::active()->with('images')->latest()->paginate(9);
        $mostRead    = Post::active()->orderBy('number_view', 'desc')->take(3)->get();
        $oldesNews   = Post::active()->oldest()->take(3)->get();
        $popularNews = Post::active()->withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();
        
        $categories  = Category::active()->has('posts', '>=', 2 )->get();    //if casts posts make show category without Not show category 
        $categoryWithPost = $categories->map(function ($category) {
            $category->posts = $category->posts()->active()->limit(2)->get();
            return $category;
        });
        return view("frontend.index", compact(['posts', 'mostRead', 'oldesNews', 'popularNews', 'categoryWithPost']));
    }
}