<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name','service_id','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
