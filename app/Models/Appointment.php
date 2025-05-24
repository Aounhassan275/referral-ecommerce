<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','phone','date','department_id','message','user_id'
    ];
    public function department()
    {
        return $this->belongsTo('App\Models\Special','department_id');
    }
}
