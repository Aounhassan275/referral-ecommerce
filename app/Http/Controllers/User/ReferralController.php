<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Payment;
use App\Models\ReferralLog;
use App\Models\CompanyAccount;
use App\Models\PoolEarning;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReferralController extends Controller
{
    public function showTree()
    {
        $user = Auth::user();
        if($user->checkStatus() == false)   
        {
          toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $upline = $user->uplineUser();
        $downline = $user->downlineUser();
        return view('user.refer.user_tree',compact('user','downline','upline'));
    }    
    public function showSuperPool(Request $request)
    {
        if($request->user_id)
        {
            $user = User::find($request->user_id);
        }else{
            $user = Auth::user();
        }
        if($user->checkStatus() == false)   
        {
            toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $users  = User::where('refer_by',$user->id)->where('status','active')->get()->toArray();
        foreach($users as $key => $directReferral)
        {
            if($key == 0 && $user->for_pool >= 6
                || $key == 1 && $user->for_pool >= 12
                || $key == 2 && $user->for_pool >= 18
                || $key == 3 && $user->for_pool >= 24
                || $key == 4 && $user->for_pool >= 30
                || $key == 5 && $user->for_pool >= 36
            )
            {
                $this->transferEarning($directReferral,$user);
            }
        }
        // dd($users);
        return view('user.refer.super_pool',compact('user','users'));
    }    
    public function transferEarning($directReferral,$user)
    {
        $isAlready = PoolEarning::where('direct_referral_id',$directReferral['id'])->where('user_id',$user->id)->first();
        if(!$isAlready)
        {
            for($i = 1;$i<3;$i++)
            {
                if(count($user->uplineUser()) >= $i)
                {
                    $upline = User::find($user->uplineUser()[$i]['id']);
                    $upline->update([
                        'pool_income' => $upline->pool_income + 2,
                        'for_pool' => $upline->pool_income + 1
                    ]);
                    Earning::create([
                        'price' => 3,
                        'user_id' => $user->uplineUser()[$i]['id'],
                        'due_to' => $user->id,
                        'type' => 'pool_income'
                    ]);
                }else{
                    $pool_account= CompanyAccount::where('name','Pool Income')->first();
                    $pool_account->update([
                        'balance' => $pool_account->balance + 3,
                    ]);
                }
            }  
            PoolEarning::create([
                'direct_referral_id' => $directReferral['id'],
                'user_id' => $user->id,
            ]);
        }
    }
}