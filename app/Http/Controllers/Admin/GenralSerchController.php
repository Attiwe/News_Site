<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class GenralSerchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate( $this->filterData()); 
        $keyword = strip_tags($request->keyword);

        if($request->option == 'users'){
          return $this->searchUser($keyword);
        }elseif($request->option == 'posts'){
            return $this->searchPost($keyword);
        }elseif($request->option == 'categories'){
            return $this->searchCategory($keyword);
        }else{
            session()->flash('error', 'Invalid search option');
            return redirect()->back();
        }
        
    }

    public function searchUser(  $keyword){
        $users = User::where('name', 'like', '%' . $keyword . '%')->paginate(8);
        return  view('admin.users.index', compact('users'));
    }

    public function searchPost(  $keyword){
        $posts = Post::where('title', 'like', '%' . $keyword . '%')->paginate(8);
        return  view('admin.posts.index', compact('posts'));
    }

    public function searchCategory(  $keyword){
        $categories = Category::where('name', 'like', '%' . $keyword . '%')->paginate(8);
        return  view('admin.categories.index', compact('categories'));
    }

    public function filterData(){
        return[
            'option' => ['required', 'string', 'in:users,posts,categories'],
            'keyword' => ['required', 'string']
        ];
    }
}
