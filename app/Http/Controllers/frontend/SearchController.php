<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => ['nullable','string','max:100'],
        ]);
        $kayword = strip_tags($request->search);

        $searchPosts = Post::active()->where('title','LIKE','%'.$kayword.'%')
        ->orWhere('desc','LIKE','%'.$kayword.'%')
        ->paginate(9);
        return view('frontend.search',compact('searchPosts'));
     }
     
}
