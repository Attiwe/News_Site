<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ichtrojan\Otp\Otp;
use Log;
use App\Notifications\Api\SentOtpRegister;

class VerifyController extends Controller
{
    private $otp;
    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function verifyEmail(Request $request)
    {
        try {
            $request->validate($this->filterData());
            $user = auth()->user();
            $otp = $this->otp->validate($user->email, $request->token);
            if ($otp->status == false) {
                return apiResponse(400, 'Invalid Token');
            }
            $user->update([
                'email_verified_at' => now(),
            ]);
            return apiResponse(200, 'Email Verified Successfully');
        } catch (\Exception $e) {

            Log::error('error : ' . $e->getMessage());
            return apiResponse(400, 'Invalid Token');
        }

    }

    protected function filterData():array
    {
        return [
            'token' => ['required', 'max:8'],
        ];
    }

    public function sendOtpAgain(){
        $user = request()->user();
        $user->notify(new SentOtpRegister());
        return apiResponse(200, 'Otp Sent Successfully');
    }
}
