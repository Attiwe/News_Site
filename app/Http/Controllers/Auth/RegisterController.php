<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


 class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048' ],
            'country' => ['nullable','string'],
            'city' => ['nullable','string'],
            'street' => ['nullable','string'],
            'phone' => ['nullable','numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' =>[ 'required'],
            
        ]); 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'country' => $data['country'],
            'city' => $data['city'],
            'street' => $data['street'],
            'phone' => $data['phone'],
            'status'=> 'active',
            'password' => Hash::make($data['password']),
        ]);
        
        if(isset($data['image']) && $data['image']){
            $file = $data['image'];
            $nameImage = Str::slug($data['username']) . time() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/users', $nameImage, ['disk' => 'uploads']);
            
            $user->update([
                'image' => $path,
            ]);
        }   
        
        return $user;
    }

    public function register(Request $request)
    {
        // return $request;
         $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);


        if ($response = $this->registered($request, $user)) {
              return $response;
        }
         return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
    

    protected function registered(Request $request, $user)
    {
        session()-> flash('success', 'You have registered successfully.');
        return redirect()->route('frontend.post');
        
    }

}
