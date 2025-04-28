<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{ 
    protected $fillable = ['role', 'permissions']; 


    public function admins()
    {
        return $this->hasMany(Admin::class,'role_id');
    }

    public function getPermissionsAttribute($value) //accessor
    {
        return json_decode($value, true);
    }
    public function setPermissionsAttribute($value) //mutator
    {
        $this->attributes['permissions'] =  json_encode($value);
    }


}
