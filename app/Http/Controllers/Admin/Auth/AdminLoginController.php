<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('auth:admin')->only('logout');
    }

    public function show()
    {
        return view('admin.login_admin');
    }

    public function login(Request $request)
    {

        $request->validate($this->FilterValidateLogin());
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password , 'status' => 1],  $request->remember = true)) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
    }
    private function FilterValidateLogin()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        session()->flash('success', 'You have been logged out successfully');
        return redirect()->route('admin.login');
    }

}



