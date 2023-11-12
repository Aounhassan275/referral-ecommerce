<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'ip', 'lat','long','source','sender_id','receiver_id','status','responsed_at'
    ];
    
    public function sender()
    {
        return $this->belongsTo('App\Models\User','sender_id');
    }   
    public function receiver()
    {
        return $this->belongsTo('App\Models\User','receiver_id');
    }   
}
