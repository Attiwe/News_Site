<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Api\SentOtpRegister;
use App\Utils\ImageMangment;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
 

class RegesterAuthController extends Controller
{
    public function register(Request $request)
    {
      DB::beginTransaction();
      $request->validate(filterDataAuthLogin($request));
      try {
          $user = $this->createUser($request);
        
          if($request->hasFile('image')){
              ImageMangment::uploadUserImage($request, $user);
            }
          $token = $user->createToken('user_token')->plainTextToken;
            DB::commit();

          $user->notify(new SentOtpRegister());
            
          return apiResponse(201, 'Register Successfully',['token' => $token]);
          } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error : ' . $e->getMessage());
            return apiResponse(400, 'Register Failed');
          }
    }

    protected function createUser(Request $request){
      $user = User::create([
        'name' => $request->post('name'),
        'username' => $request->post('username'),
        'email' => $request->post('email'),
         
        'country' => $request->post('country'),
        'city' => $request->post('city'),
        'street' => $request->post('street'),
        'phone' => $request->post('phone'),
        'password' => $request->post('password'),                
      ]);
        return $user;

    }
}
