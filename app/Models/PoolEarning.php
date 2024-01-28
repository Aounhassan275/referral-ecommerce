<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoolEarning extends Model
{
    protected $fillable = [
        'direct_referral_id','user_id'
    ];
}
