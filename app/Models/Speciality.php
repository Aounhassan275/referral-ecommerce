<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','description','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/uploaded_images/');
    }
}
