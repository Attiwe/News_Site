<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class Stastistis extends Component
{
    public function render()
    {

        $active['active_postsCount'] = Post::active()->count();
        $active['active_usersCount'] = User::active()->count();
        $active['active_categoriesCount'] = Category::active()->count();
        $active['active_commentsCount'] = Comment::count();

        return view('livewire.admin.stastistis', compact('active'));
    }
}
