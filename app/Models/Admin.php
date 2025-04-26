<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\Authorization;


class Admin extends Authenticatable  implements MustVerifyEmail 
{

    use Notifiable;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'status',
        'password',
        'role_id'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function role(){
        return $this->belongsTo(Authorization::class);
    }
   
    //=================role methods==================
    public function hasPermission($config_permission)
    {
       $authrization =  $this->role ;   // get authrization speciality user
       if(!$authrization){
           return false;
       }
      foreach($authrization->permissions as $permission){
        if($permission == $config_permission ?? ' '){
            return true;
        }
      }
        
    }
    
    

}
