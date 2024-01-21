<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostSale extends Model
{
    protected $fillable = [
        'amount','amount_charged','sender_id','receiver_id','detail'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id');
    }
}
