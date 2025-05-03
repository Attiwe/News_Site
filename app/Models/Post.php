<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 use Cviebrock\EloquentSluggable\Sluggable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;
use App\Models\Comment; 
use App\Models\Admin;
use Carbon\Carbon;

class Post extends Model
{
    use Sluggable , HasFactory;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
 

    protected $fillable = [
        'user_id',
        'admin_id',
        'number_view',
        'category_id',
        'title',
        'slug',
        'desc',
        'comment_able',
        'status',
        'smail_desc' 
    ];

    

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


 //===============================Scopes====================    
    public function scopeActive($query){
        return $query->where('status',1);
    }

    public function scopeActiveUser($q)
    {
        return $q->where(function($q){
             $q->whereHas('user',function($user){
                $user->whereStatus('active');
             });
        })->Orwhere('user_id',null);
    }
    
    public function scopeActiveCategory($query){
        return $query->whereHas('category',function ($query){
            $query->whereStatus(1);
        });
    }
    //===============================End Scopes====================

    //===============================Attributes Accessors====================
    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->format('Y-m-d H:i:s');
    // }
    //===============================End Attributes Accessors====================
    
    
    public function status(){
        return $this->status == 1 ? 'Active' : 'Inactive';
    }
   static public function commentAble(){
        return  'comment_able' == 1 ? 'Active' : 'Inactive';
    }

}