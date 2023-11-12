<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
    public function brands()
    {
        return $this->hasMany(PostBrand::class,'post_category_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'post_category_id');
    }
}
