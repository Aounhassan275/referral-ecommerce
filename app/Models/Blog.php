<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name','blog_category_id','user_id','description',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory','post_category_id');
    }
    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }
    public function tags()
    {
        return $this->hasMany(BlogTag::class);
    }
}
