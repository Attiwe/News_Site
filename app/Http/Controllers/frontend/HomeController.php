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
        
        $categories  = Category::get();
        $categoryWithPost = $categories->map(function ($category) {
            $category->posts = $category->posts()->limit(2)->get();
            return $category;
        });
        return view("frontend.index", compact(['posts', 'mostRead', 'oldesNews', 'popularNews', 'categoryWithPost']));
    }
}