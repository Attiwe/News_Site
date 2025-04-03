<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedNewsSite extends Model
{
    protected $table = 'related_news_site';
    protected $fillable = ['name', 'url'];
}
