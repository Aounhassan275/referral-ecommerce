<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPayment extends Model
{
    
    protected $fillable = [
        'amount',
        'post_id',
        'post_purchase_id',
        'user_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id');
    }

    public function post_purchase()
    {
        return $this->belongsTo('App\Models\PostPurchase','post_purchase_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
