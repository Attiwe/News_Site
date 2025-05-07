<?php

namespace App\Http\Controllers\Api\Auth\Password;

use App\Http\Controllers\Controller;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    private $otp;
    public function __construct()
    {
        $this->otp = new Otp;
    }
    public function resetPassword(Request $request)
    {
        $request->validate($this->filterData());
        $checkOtp = $this->otp->validate($request->email, $request->token); 

        if ($checkOtp->status == false) {
            return apiResponse(401, 'Token is invalid or expired');
        }
        $user = User::whereEmail($request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return apiResponse(200, 'success', 'Password reset successfully');
    }

    public function filterData(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:8|max:12|confirmed',
            'password_confirmation' => 'required|min:8|max:12',
        ];
    }
}
