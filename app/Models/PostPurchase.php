<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostPurchase extends Model
{
    protected $fillable = [
        'amount',
        'type',
        'post_id',
        'post_installement_id',
        'owner_id',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo('App\Models\Post','post_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function owner()
    {
        return $this->belongsTo('App\Models\User','owner_id');
    }
    public function post_installement()
    {
        return $this->belongsTo('App\Models\PostInstallement','post_installement_id');
    }
    public function payments()
    {
        return $this->hasMany(PostPayment::class,'post_purchase_id');
    }
    public function pendingAmount()
    {
        return $this->amount - $this->payments->sum('amount');
    }
}
