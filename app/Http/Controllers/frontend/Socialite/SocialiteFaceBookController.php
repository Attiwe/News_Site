<?php

namespace App\Http\Controllers\frontend\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class SocialiteFaceBookController extends Controller
{
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(){

        try{
        $user = Socialite::driver('facebook')->stateless()->user();
     
        $user_database =  User::firstOrCreate(
        [ 'email' => $user->email,
        'facebook_id' => $user->id,
        ],

        [
            'name' => $user->name, 
            'email' => $user->email, 
            'image' => $user->avatar,
            'username' => Str::slug($user->name) . Str::random(4),
            'facebook_id' => $user->id,
            'status' => 'active',
            'country' => 'undefined',
            'city' => 'undefined',
            'street' => 'undefined',
            'phone' => 'undefined',
            'email_verified_at' => now(),
            'password' => Hash::make(Str::random(10))
    ]);
    Auth::login($user_database, true);
    return redirect()->route('frontend.dashboard');
    }catch(Exception $e){
        
        return redirect()->route('login');
    }

}
}
