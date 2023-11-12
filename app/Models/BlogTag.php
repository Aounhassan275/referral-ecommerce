<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = [
        'name','blog_id'
    ];
    public function blogs()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
