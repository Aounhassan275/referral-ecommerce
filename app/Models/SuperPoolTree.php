<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperPoolTree extends Model
{
    protected $fillable = [
        'user_id','left_refferral','right_refferral','super_pool_id','rebirth',
        'next_pool_income','direct_pool_income','revenue','downline_income'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
