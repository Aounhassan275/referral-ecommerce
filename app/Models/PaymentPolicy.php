<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentPolicy extends Model
{
    protected $fillable = [
        'type',
        'sender_twenty_team_level',
        'receiver_twenty_team_level',
        'company_trade_income',
        'company_products',
        'purchase_reward',
        'draw_monthly'
    ];
}

