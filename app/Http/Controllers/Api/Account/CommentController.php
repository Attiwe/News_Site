<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'commit' => 'required|string|max:255',
        ]);
        $user = auth()->user();
        $post = $user->posts()->where('id', $request->id)->first();
        if (!$post) {
            return apiResponse(404, 'Post not found');
        }
        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'commit' => $request->commit,
            'ip_address' => $request->ip(),

        ]);

        // if ( auth()->user()->id != $post->user_id) {
            $user->notify(new CommentNotification($comment, $post));
        // }/

        if (!$comment) {
            return apiResponse(400, 'error in create comment');
        }

        return apiResponse(200, 'success', new CommentResource($comment));
    }


}
