<?php

namespace App\Http\Controllers\frontend\dashboard;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Utils\ImageMangment;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Str;




class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
        $this->middleware('statusUserLogin');
        $this->middleware('verified');
    }

    public function index()
    {
        $posts = Auth::user()->posts()->with('images')->active()->get();
        return view('frontend.dashboard.profile', compact('posts'));
    }

    public function addPost(ProfileRequest $request)
    {

        $data = $request->validated();
        $data['smail_desc'] = $request->smail_desc;
        $data['comment_able'] = $request->comment_able == 'on' ? 1 : 0;
        $data['user_id'] = Auth::user()->id;
        try {
            DB::beginTransaction();
            $posts = Post::create($data);

            $imagesMangment = new ImageMangment();
            $imagesMangment->uploadImage($request, $posts);

            DB::commit();
            Cache::forget('last_posts');
            // Cache::forget('popular_posts');
            
            session()->flash('success', 'Post added successfully');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function showMoreComments(Request $request)
    {
        $comments = Comment::where('post_id', $request->id)->with('user')->get();
        return response()->json($comments);
    }

    public function editPost(Request $request)
    {

        $post = Post::where('slug', $request->slug)
            ->select('id', 'title', 'slug', 'category_id', 'user_id', 'comment_able', 'desc', 'status', 'smail_desc')
            ->active()
            ->with([
                'category:id,name,status',
                'user:id,name,username,image',
                'images:id,path,post_id'
            ])
            ->first();
        return view('frontend.dashboard.edit_profile', compact('post'));
    }

    public function updatePost(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = Post::findOrFail($request->id);
             
            $post->update($request->all());

            ImageMangment::updateLoade($request, $post);

            DB::commit();
            session()->flash('success', 'Post updated successfully');
            return redirect()->route('frontend.dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    
    public function deletePost(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = Post::with('images')->findOrFail($request->id);

            ImageMangment::deleteImage($post);

            $post->images()->delete();
            $post->delete();
            DB::commit();
            session()->flash('success', 'Post and its images deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


}
