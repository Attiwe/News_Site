<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Auth;
     
 


class ShowPostsController extends Controller
{
    public function index($slug){

        $mainPosts = Post::active()->with(['comments'=>function($query){
            $query->limit(3);
        }])->where('slug', $slug)->firstorfail();
        $category = $mainPosts->category;
        $category_posts = $category->posts()
        ->select('id', 'title', 'slug')
        ->limit(5)
        ->get();
        
        $mainPosts->increment('number_view'); //count Number view image
        return view('frontend.show_posts', compact('mainPosts', 'category_posts'));
    }
    public function showMoreComments($slug){
        $posts = Post::active()->  where('slug', $slug)->first();
        $comments = $posts->comments()->latest()->with('user')->get();
        return response()->json($comments);
    }

    public function addComment(Request $request){
     

         $request->validate([
            'commit' => ['required','string','max:255'],
            'post_id' => ['required','exists:posts,id'],
            'user_id' => ['required','exists:users,id'],
            'ip_address' => ['required','ip'],
        ]);
        
        $comment = Comment::create([
            'commit' => $request->commit,
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'ip_address' => $request->ip_address,
        ]);
        $post = Post::findOrFail($request->post_id);
        $post->user->notify (new CommentNotification($comment, $post));
        
        $comment->load('user'); //dowenlode related user
        

        if($comment){
            return response()->json([
            'status' => 'success', 
            'message' => 'Comment added successfully',
            'comment' => $comment
        ]);
        }else{
            return response()->json([
            'status' => 'error',
             'message' => 'Failed to add comment'
             
            ]);
        }

        
     }

    public function categoryPosts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->latest()->paginate(10);
        
        return view('frontend.category-posts', compact('category', 'posts'));
    }
}