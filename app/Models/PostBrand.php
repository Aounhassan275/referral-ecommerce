<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class PostBrand extends Model
{
    protected $fillable = [
        'name','post_category_id','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory','post_category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'post_brand_id');
    }
}
