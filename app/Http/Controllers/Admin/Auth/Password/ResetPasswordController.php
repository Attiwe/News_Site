<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function show($email)
    {
        return view('admin.auth.password.reset', compact('email'));
    }
    public function reset(Request $request)
    {
        $request->validate($this->filterValidationReset());
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->with('email', 'Email not found');
        }
        $admin->update([
            'password' => Hash::make($request->password)
        ]);
        session()->flash('success', 'Password reset successfully');
        return redirect()->route('admin.login');
    }

    private function filterValidationReset()
    {
        return [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }
}
