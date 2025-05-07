<?php

namespace App\Http\Controllers\Api\Auth\Password;

use App\Http\Controllers\Controller;
use App\Notifications\Api\Passowrd\sandOtpForgetPassword;
use Illuminate\Http\Request;
use App\Models\User;

class ForgetPasswordcontroller extends Controller
{
    public function sendOtp(Request $request){
        $request->validate(['email'=>'required|email|exists:users,email']);  
      
        $user = User::whereEmail($request->email)->first();
        $user->notify( new sandOtpForgetPassword());

        return apiResponse(200, 'success', 'we send you an email with the otp code');

    }
}
