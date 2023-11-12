<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = [
        'name', 'email','message','image','product_id'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveProductImage($value,'/uploaded_images/products/');
    }
}
