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


class SocialiteGoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

    try{
        $user = Socialite::driver('google')->stateless()->user();
     
       

        $user_database =  User::updateOrCreate(
        [ 'email' => $user->email,
        'google_id' => $user->id,
        ],

        [
            'name' => $user->name, 
            'email' => $user->email, 
            'image' => $user->avatar,
            'username' => Str::slug($user->name) . Str::random(4),
            'google_id' => $user->id,
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
