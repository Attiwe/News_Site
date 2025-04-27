<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class LastPostsOrComment extends Component
{
    public function render()
    {
        $last_posts = Post::with('category')->latest()->take(10)->get();
        $last_comments = Comment::with('post')->latest()->take(10)->get();
        return view('livewire.admin.last-posts-or-comment', compact('last_posts', 'last_comments'));
    }
}
