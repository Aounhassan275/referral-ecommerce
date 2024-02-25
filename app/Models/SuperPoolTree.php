<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperPoolTree extends Model
{
    protected $fillable = [
        'user_id','left_refferral','right_refferral','super_pool_id'
    ];
}
