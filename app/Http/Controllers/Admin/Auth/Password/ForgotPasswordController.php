<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Notifications\OtpVerifyNotification;
use Illuminate\Support\Facades\Notification;
use Ichtrojan\Otp\Otp;

class ForgotPasswordController extends Controller
{
    public $otp;
    public function __construct(){
        $this->otp = new Otp();
    }
    public function show()
    {
        return view('admin.auth.password.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate($this->filterValidationEmail());
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->with('email', 'Email not found');
        }
        $admin->notify(new OtpVerifyNotification());
        return redirect()->route('admin.password.confirm', ['email'=>$admin->email]);
    }

    private function filterValidationEmail()
    {
        return [
            'email' => 'required|email|exists:admins,email',
        ];
    }

    public function showResetForm($email)
    {
        return view('admin.auth.password.confirm', compact('email'));
    }


    public function verifyOtp(Request $request)
    {
        $request->validate($this->filterValidationOtp());
       $otp = $this->otp->validate($request->tonken, $request->email);
        if(!$otp){
            return back()->with('tonken', 'Invalid token');
        }
        return redirect()->route('admin.password.reset', ['email'=>$request->email]);
 

        
    }
    private function filterValidationOtp(){
        return[
            'tonken' => 'required',
            'email' => 'required|email|exists:admins,email',
        ];
    } 

}
