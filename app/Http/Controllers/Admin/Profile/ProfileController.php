<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
 

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }
     
    public function update(Request $request){
        $request->validate($this->filterData());
        $admin = Admin::findOrFail($request->id);

        if(Hash::check($request->password, $admin->password)){
            $admin->update($request->except('password','_token','_method'));
          session()->flash('success', 'Profile updated successfully');
          return redirect()->back();
        }
        warning()->flash('error', 'Date  is incorrect ');
        return redirect()->back();
         

    }

    public function filterData(): array{
        return [
            'name' =>['required', 'string', 'max:255'],
            'username' =>['required', 'string', 'max:255'],
            'email' =>['required', 'string', 'email', 'unique:admins,email,' . Auth::guard('admin')->user()->id],
            'password' =>['required'],
        ];
    }

}
