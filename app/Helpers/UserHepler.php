<?php

namespace App\Helpers;

use App\Models\User;
use App\Helpers\ReferralIncome;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserHepler
{
    public static function CreateUser($user,$package)
    {
        $new_user = User::create([
            'name' => $user->name.uniqid(),
            'email' => $user->email,
            'password' => Hash::make('1234'),
            'temp_password' => '1234',
            'package_id' => $package->id,
            'status' => 'active',
            'a_date' =>  Carbon::today(),
            'code' => uniqid(),
            'associated_with' => $user->id,
            'refer_by' => $user->id,
            'email_verified' => true,
        ]);
        info("$user->name  associted User Created : $new_user->name"); 
        ReferralIncome::referral($new_user);
    } 
    
}