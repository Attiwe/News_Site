<?php

 
namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSubscribersMail;

class NewSubscriberController extends Controller
{
     public function store(Request $request){
        try {
            $validate = $request->validate(NewSubscriber::filterValidateEmail($request->email));
            if($validate){
                NewSubscriber::create([
                    'email' => $request->email,
                ]);
             Mail::to($request->email)->send(new NewSubscribersMail());
             session()->flash('success', 'Email added to the list');
             return redirect()->back();
            }  
            } catch (\Exception $e) {
             return redirect()->back()->with('error', $e->getMessage());
        }
      }
}
