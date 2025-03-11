<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'commit',
        'ip_address',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
