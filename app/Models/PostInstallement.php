<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostInstallement extends Model
{
    protected $fillable = [
        'price','post_id','monthly_amount','duration','user_id'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
