<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 class NewSubscriber extends Model
{
     protected $fillable = ['email'];

    //validate 
    public static function filterValidateEmail($email){
        return  [
            'email' => 'required|email|unique:new_subscribers,email',
        ];
    }
}
