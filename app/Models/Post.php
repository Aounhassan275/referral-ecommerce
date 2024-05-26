<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name','post_category_id','post_brand_id','user_id','description',
        'city_id','country_id','price','is_installment_allowed',
        'facebook','instagram','whatsapp','youtube','linkedin','twitter','snack_video','tiktok',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory','post_category_id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\PostBrand','post_brand_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City','city_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function images()
    {
        return $this->hasMany(PostImage::class,'post_id');
    }
    public function installements()
    {
        return $this->hasMany(PostInstallement::class,'post_id');
    }
    public function purchases()
    {
        return $this->hasMany(PostPurchase::class,'post_id');
    }
}
