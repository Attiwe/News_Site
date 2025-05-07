<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Utils\ImageMangment;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Log\Logger;
use Log;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Str;

class PostsController extends Controller
{
    public function getPosts()
    {

        try {
            $posts = auth()->user()->posts()->with(['images', 'category'])
                ->active()
                ->activeUser()
                ->activeCategory()
                ->paginate(6);

            if ($posts->isEmpty()) {
                return apiResponse(204, 'no posts found');
            }
            return apiResponse(200, 'success', [
                'name_user' => auth()->user()->name,
                'posts_user' => (new PostCollection($posts))->response()->getData(true),
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching posts: ' . $e->getMessage());
            return apiResponse(500, 'server error');
        }
    }

    public function createPosts(ProfileRequest $request)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $posts = Post::create($this->extractPostData($request))
                ?: apiResponse(400, 'error in create post');

            ImageMangment::uploadImage($request, $posts);
            DB::commit();
            return apiResponse(200, 'success', new PostResource($posts));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating post: ' . $e->getMessage());
            return apiResponse(500, 'server error');
        }
    }

    public function updatePosts(ProfileRequest $request, $slug)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $posts = Post::where('slug', $slug)->first();

            if (!$posts) {
                return apiResponse(404, 'slug not correct');
            }

            $posts->update($this->extractPostData($request))
             ?: apiResponse(400, 'error in update post');

            ImageMangment::updateLoade($request, $posts);
            DB::commit();
            return apiResponse(200, 'success', new PostResource($posts));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating post: ' . $e->getMessage());
            return apiResponse(500, 'server error');
        }
    }


    private function extractPostData($request)
    {
        return [

            'title' => $request->post('title'),
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->post('title')),
            'desc' => $request->post('desc'),
            'smail_desc' => $request->post('smail_desc'),
            'category_id' => $request->post('category_id'),
            'comment_able' => $request->post('comment_able') == 'on' ? 1 : 0,
            'status' => $request->post('status'),
        ];
    }

    public function deletePosts($id)
    {
        try {
            $user = auth()->user();
            $posts = $user->posts()->find($id);
            if (!$posts) {
                return apiResponse(404, 'post not found');
            }
            ImageMangment::deleteImage($posts);
            $posts->delete();
            return apiResponse(200, 'success', 'post deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return apiResponse(500, 'server error');
        }
    }

    public function postComments($id)
    {
        try {
            $user = auth()->user() ?: apiResponse(401, 'user not found');
            $posts = $user->posts()->find($id);
            if (!$posts) {
                return apiResponse(404, 'post not found');
            }
            $comments = $posts->comments()->paginate() ?: apiResponse(404, 'comments not found');
            if ($comments->isEmpty()) {
                return apiResponse(204, 'no comments found');
            }
            return apiResponse(200, 'success', (new CommentCollection($comments))->response()->getData(true));
        } catch (\Exception $e) {
            Log::error('Error fetching comments: ' . $e->getMessage());
            return apiResponse(500, 'server error');
        }
    }

}
