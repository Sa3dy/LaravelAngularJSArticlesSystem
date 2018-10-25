<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'body',
        'published'
      ];

    public function category()
    {
        return $this->belongsTo(\App\Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class, 'article_id');
    }
}
