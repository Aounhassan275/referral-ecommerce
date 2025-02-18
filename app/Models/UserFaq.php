<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFaq extends Model
{
    protected $fillable = [
        'question','answer','user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
