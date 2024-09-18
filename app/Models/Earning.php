<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $fillable = [
        'price','user_id','type','due_to','level'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
