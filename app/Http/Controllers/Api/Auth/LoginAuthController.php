<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 



class LoginAuthController extends Controller
{
    public function login(Request $request){
       
       
        $request->validate(filterDataAuthLogin($request ));
      
        $user = User::active()->where('email',$request->email)->first();
       
        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken('user_token',[],now()->addMinutes(60))->plainTextToken;
            
           return apiResponse(200, 'Login Successfully', ['token_user' => $token]);
        }else{
            return apiResponse(401, 'Login Failed');
        }
            
         
    }
      public function logout(Request $request){
          auth()->user()->currentAccessToken()->delete();
        return apiResponse(200, 'Logout Successfully');

    }


   
}
