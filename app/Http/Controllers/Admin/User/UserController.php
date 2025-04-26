<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Utils\ImageMangment;
use Str;

class UserController extends Controller
{
     public function __construct()
     {
        $this->middleware('can:index_user') ->only('index');
         $this->middleware('can:delete_user') ->only('destroy');
        $this->middleware('can:status_user') ->only('status');
        $this->middleware('can:create_user') ->only('create');
        $this->middleware('can:store_user') ->only('store');

     }

    public function index()
    {
        //  return request();
        try {
            $users = User::when(request()->keyword, function ($query) {
                $query->where('name', 'like', '%' . request()->keyword . '%')
                    ->orWhere('username', 'like', '%' . request()->keyword . '%')
                    ->orWhere('email', 'like', '%' . request()->keyword . '%');
            })

                ->when(request()->status, function ($query) {
                    $query->where('status', request()->status);
                })

                ->orderBy(request('search_by', 'id'), request('order_dir', 'desc'))

                ->paginate(request('show', 8));

            return view('admin.users.index', compact('users'));
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to fetch users: ' . $e->getMessage());
            return redirect()->back();
        }

    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(AddUserRequest $request)
    {
         try {
            $request->validated();
            $request->merge([
                'email_verified_at' => $request->email_verified_at == 1 ? now() : null,
            ]);

            $user = User::create($request->except('_token', 'image'));

            //store image 
            ImageMangment::uploadUserImage($request, $user);

            session()->flash('success', 'User created successfully');
            return redirect()->back();
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['name' => 'Failed to create user: ' . $e->getMessage()]);
        }

    }

 
 

    public function destroy(Request $request)
    {
        try {
            $users = User::findorFail($request->input('id'));
            ImageMangment::deleteFile($users->image);
            $users->delete();
            session()->flash('success', 'User deleted successfully');
            return redirect()->route('admin.users.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete user: ' . $e->getMessage());
            return redirect()->route('admin.users.index');
        }
    }

    public function status(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user->status == 'active') {
            $user->update(['status' => 'inactive']);
            session()->flash('success', 'User status changed to inactive');
        } else {
            $user->update(['status' => 'active']);
            session()->flash('success', 'User status changed to active');
        }
        return redirect()->back();
    }

}
