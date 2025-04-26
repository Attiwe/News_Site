<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Utils\ImageMangment;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:index_post')->only('index');
        $this->middleware('can:create_post')->only('create','store');
        $this->middleware('can:edit_post')->only('edit');
        $this->middleware('can:delete_post')->only('destroy');
        $this->middleware('can:status_post')->only('status');
        $this->middleware('can:commentable_post')->only('commentable');
        $this->middleware('can:view_post')->only('show');
 
    }
    public function index()
    {
        try {
            
            $posts = Post::with('user', 'category') ->when(request()->keyword, function ($query) {
                $query->where('title', 'like', '%' . request()->keyword . '%')
                    ->orWhere('slug', 'like', '%' . request()->keyword . '%')
                    ->orWhere('desc', 'like', '%' . request()->keyword . '%');
            })
            
                ->orderBy(request('search_by', 'id'), request('order_dir', 'desc'))

                ->paginate(request('show', 10));

            return view('admin.posts.index', compact('posts'));
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch users: ' . $e->getMessage());
            return redirect()->back();
        }       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        try {   
            DB::beginTransaction();
            $request->validated();
            $post = Auth::guard('admin')->user()->posts()->create($request->except('images'));
            ImageMangment::uploadImage(  $request, $post) ;
            DB::commit();
            session()->flash('success', 'Post created successfully');
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create post: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    
 
    public function show(string $id)
    {
        $post = Post::with(['user', 'category', 'images','admin'])->findOrFail($id);
     
        return view('admin.posts.edit', compact('post'));
    }

   

     
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = Post::findOrFail($request->id);
             
            $post->update($request->all());

            ImageMangment::updateLoade($request, $post);

            DB::commit();
            session()->flash('success', 'Post updated successfully');
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,)
    {
        $post = Post::findOrFail($request->id);
        ImageMangment::deleteImage($post);
        $post->delete();
        session()->flash('success', 'Post deleted successfully');
        return redirect()->back();   
    }
    public function status(Request $request){
        $post = Post::findOrFail($request->id);
        $post->update(['status' => !$post->status]);
        session()->flash('success', 'Post status updated successfully');
        return redirect()->back();
    }
    
    public function commentable(Request $request){
        $post = Post::findOrFail($request->id);
        $post->update(['comment_able' => !$post->comment_able]);
        session()->flash('success', 'Post commentable updated successfully');
        return redirect()->back();
    }
}
