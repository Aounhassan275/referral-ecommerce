<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $fillable = [
        'image','blog_id'
    ];
    public function blogs()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveProductImage($value,'/uploaded_images/products/');
    }
}
