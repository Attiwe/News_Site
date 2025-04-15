<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
 
class CategoryController extends Controller
{
    
    public function __invoke($slug)
    {
        // return $slug;
        $categorys = Category::active()->where('slug',$slug)->firstOrFail();
        $posts = $categorys->posts()->paginate(9);
                
        return view('frontend.category_posts', compact('posts','categorys'));
        
     }
    
}
