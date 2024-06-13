<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    protected $fillable = [
        'subject','message','user_id','reviewer_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function reviewer()
    {
        return $this->belongsTo('App\Models\User','reviewer_id');
    }
}
