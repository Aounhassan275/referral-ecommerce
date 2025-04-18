<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','package_id','payee_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function payee()
    {
        return $this->belongsTo('App\Models\User','payee_id');
    }
    public function package()
    {
        return $this->belongsTo('App\Models\Package','package_id');
    }
}
