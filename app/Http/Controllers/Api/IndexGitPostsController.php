<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\AdminResource;
use App\Http\Resources\CategoryCollection; 
 
class IndexGitPostsController extends Controller
{
    public function getPosts()
  
    {       
         $query = Post::query()->with(['user', 'category','admin','images'])->active()->activeUser()->activeCategory();
 
        $request =  request()->query('keyword');
        if(strip_tags($request)){
            $query->where('title', 'LIKE', '%' . $request . '%');
        }
  
        $posts_all       = $this->postsAll($query);
        $posts_last      = $this->postsLast($query);
        $posts_oldes     = $this->postsOldes($query);
        $posts_popular   = $this->postsPopular($query);
        $posts_most_read = $this->postsMostRead($query);
 
        $posts_with_category = $this->postsWithCategory($query);

        $data = [
            'posts_all'       =>   (new PostCollection ($posts_all))->response()->getData(true),
            'posts_last'      =>  new PostCollection($posts_last),
            'posts_oldes'     => new PostCollection($posts_oldes),
            'posts_popular'   => new PostCollection($posts_popular),
            'posts_most_read' => new PostCollection($posts_most_read),
            'posts_with_category' => new CategoryCollection($posts_with_category),     
        ];

        return apiResponse(200, 'the post  is successfully', $data);
    }


    private function postsAll($query)
    {
        $posts_all =  (clone $query)->latest()->paginate(5);
        if(!$posts_all){
             return apiResponse(404, 'the post not found');
        }
        return $posts_all;

    }

    private function postsLast($query)
    {
        $posts_last = (clone $query)->latest()->take(5)->get();
        if(!$posts_last){
             return apiResponse(404, 'the post not found');
        }
        return $posts_last;
    }

    private function postsOldes($query)
    {
        $posts_oldes = (clone $query)->oldest()->take(5)->get();
        if(!$posts_oldes){
             return apiResponse(404, 'the post not found');
        }
        return $posts_oldes;
    }
    
    private function postsPopular($query)
    {
        $posts_popular = (clone $query)->withCount('comments')->orderBy('comments_count', 'desc')->take(5)->get();
        if(!$posts_popular){
             return apiResponse(404, 'the post not found');
        }
        return $posts_popular;
    }

    private function postsMostRead($query)
    {
        $posts_most_read = (clone $query)->orderBy('number_view', 'desc')->take(5)->get();
        if(!$posts_most_read){
             return apiResponse(404, 'the post not found');
        }
        return $posts_most_read;
    }

    private function postsWithCategory($query)
    {
        $posts_with_category = Category::with([ 'posts' => function ($query) {
       return $query->latest()->take(2);
       }])->get();

       if(!$posts_with_category){
             return apiResponse(404, 'the post not found');
        }
        return $posts_with_category;
    }

    public function showPost(Request $request)
    {
         $show_post = Post::with('user','admin','images','category')->where('slug',$request->slug)->first();
         $show_post = Post::with(['user','admin','images','category', 'comments' ])
        ->where('slug',$request->slug)
        ->first();
         if(!$show_post){
           return apiResponse(404, 'the post not found');
        }
        return   apiResponse(200, 'the post show successfully', PostResource::make($show_post));
    }
     

 
}
