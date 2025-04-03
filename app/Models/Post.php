<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 use Cviebrock\EloquentSluggable\Sluggable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
use App\Models\Image;
use App\Models\Comment; 
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
        'number_view',
        'category_id',
        'title',
        'slug',
        'desc',
        'comment_able'
    ];

    public function user(){
        return $this->belongsTo(User::class);
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
}