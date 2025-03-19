<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts       = Post::with('images')->latest()->paginate(9);
        $mostRead    = Post::orderBy('number_view', 'desc')->take(3)->get();
        $oldesNews   = Post::oldest()->take(3)->get();
        $popularNews = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(3)->get();
        $categories  = Category::get();
        $categoryWithPost = $categories->map(function ($category) {
            $category->posts = $category->posts()->limit(2)->get();
            return $category;
        });
        return view("frontend.pages.index", compact(['posts', 'mostRead', 'oldesNews', 'popularNews', 'categoryWithPost']));
    }
}
