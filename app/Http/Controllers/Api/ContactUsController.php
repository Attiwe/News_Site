<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\ContactUsRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSubscribersMail;

class ContactUsController extends Controller
{
     public function contactStore(ContactUsRequest $request){
      
        $request->validated();
        $request->merge(['ip_address' => $request->ip()]);
        $contact = Contact::create($request->all());
       Mail::to($request->email)->send(new NewSubscribersMail());   
       
        if($contact){
             return apiResponse(200,'Message sent successfully');
        }else{
            return apiResponse(400,'Message not sent');
        }
     }
}
