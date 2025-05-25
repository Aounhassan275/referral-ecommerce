<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/package/');
    }
    public function types()
    {
        return $this->hasMany(Type::class,'service_id');
    }
    public function typeWithUsers()
    {
        return Type::where('service_id', $this->id)
                    ->whereHas('users') // ensures type has at least 1 user
                    ->count();
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
