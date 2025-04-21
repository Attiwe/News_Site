<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'stie_name',
        'email',
        'favicon',
        'logo',
        'phone',
        'facebook', 
        'linkendin',
        'twitter',
        'youtube',
        'instagram', 
        'country',
        'city',
        'street',
        'smail_desc',
    ];
}
