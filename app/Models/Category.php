<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    public function totalBrands()
    {
        return Brand::where('category_id',$this->id)->whereHas('products')->count();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
