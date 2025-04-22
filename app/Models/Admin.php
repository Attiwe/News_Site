<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;


class Admin extends Authenticatable  implements MustVerifyEmail 
{

    use Notifiable;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'status',
        'password'
    ];

    public function posts(){
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
    

}
