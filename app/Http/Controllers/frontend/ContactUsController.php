<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\frontend\ContactUsRequest;
class ContactUsController extends Controller
{
     public function index(){
        return view('frontend.contactUs');
     }

     public function store(ContactUsRequest $request){
         try {
            $request->validated();
            $request->merge(['ip_address' => $request->ip()]);
            $contact = Contact::create($request->except('_token'));
           
            if($contact){
                session()->flash('success','Message sent successfully');
                return redirect()->back();
            }else{
                session()->flash('error','Message not sent');
                return redirect()->back();
            }
         } catch (\Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
         }  
    }

    
}
