<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AutoPoolForPackage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ReferralIncome;
use App\Helpers\RenewReferralIncome;
use App\Helpers\UserHepler;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Product;
use App\Models\SuperPool;
use App\Models\SuperPoolTree;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($creds))
        {
            toastr()->success('You Login Successfully');
            return redirect()->intended(route('admin.dashboard.index'));
        } else {
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }
    public function payment_distrubtion() {
		info("Payment Distrubtion CRONJOB CALLED AT " . date("d-M-Y h:i a"));
		// $payment_distrubtion_days = 3;
		// $payment_distrubtion_days = date('Y-m-d', strtotime("-$payment_distrubtion_days days"));
		// info("Payment Distrubtion CRONJOB:   $payment_distrubtion_days");
        $users = User::where('associated_with',null)
                // ->whereDate('last_login',$payment_distrubtion_days)
                ->where('total_income','>',10)
                ->where('refer_by','!=',null)
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion CRONJOB User : $user->name");
                $total_amount = $user->total_income;
                info("Payment Distrubtion CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide: $amount");
                $amount_to_divide = $amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide into Community Pool and Cash wallet: $amount_to_divide");
                if($user->package->price >= 10)
                {
                    $amount_for_packages = $amount_to_divide + $user->community_pool;
                    $total_packages = $amount_for_packages/10;
                    $total_packages = (int)$total_packages;
                    $package_amount = $total_packages * 10;
                    $community_amount = $amount_for_packages - $package_amount;
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                    if($total_packages > 0)
                    {
                        for($i = 0;$i < $total_packages;$i++)     
                        {
                            UserHepler::CreateUser($user);
                        }     
                    }
                    if($community_amount > 0)
                    {
                        $user->update([
                            'community_pool' =>  $community_amount,
                        ]);
                    }else{
                        $user->update([
                            'community_pool' =>  0,
                        ]);
                    }
                    
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                }else{
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'investment_amount' =>  $user->investment_amount +$amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                }
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function payment_distrubtion_for_assoiated_account() {
		info("Payment Distrubtion For Assoiated Account CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('associated_with','!=',null)
                ->where('cash_wallet','>',5)
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion For Assoiated Account  CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion For Assoiated Account   CRONJOB User : $user->name");
                $total_amount = $user->cash_wallet;
                info("Payment Distrubtion For Assoiated Account   CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                $owner = User::find($user->associated_with);
                info("Payment Distrubtion For Assoiated Account CRONJOB User Total Income  $amount added to : $owner->name");
                $owner->update([
                    'total_income' => $user->total_income + $amount
                ]);
                Earning::create([
                    'price' => $amount,
                    'user_id' => $owner->id,
                    'due_to' => $user->id,
                    'type' => 'associated_income'
                ]);
                $user->update([
                    'cash_wallet' => $user->cash_wallet - $total_amount
                ]);
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion For Assoiated Account   CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion For Assoiated Account   CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion For Assoiated Account   CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function upgradePackage() {
		info("Package Upgrade CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('investment_amount','>=',50)
                    ->whereNotIn('type',['fake','rebirth'])
                    ->get();
		if ($users) {
            $total_users = $users->count();
            info("Package Upgrade  CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Package Upgrade CRONJOB User : $user->name");
                $total_amount = $user->investment_amount + $user->package->price;
                $package = Package::where('price','>',$user->package->price)->first();
                if($package)
                {
                    if($total_amount >= $package->price)
                    {
                        $remaining = $total_amount - $package->price;
                        $user->update([
                            'a_date' => Carbon::today(),
                            'package_id' => $package->id,
                            'investment_amount' => $remaining,
                        ]);
                    }
                    
                    info("Package Upgrade CRONJOB User : $user->name  is upgraded to $package->name");
                }
            }
		} else {
			info("Package Upgrade CRONJOB: Users not found. ");
		}
		info("Package Upgrade CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function payment_distrubtionforassociatedUsers() {
		info("Payment Distrubtion CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $users = User::where('associated_with','!=',null)
                ->where('total_income','>',5)
                ->where('refer_by','!=',null)
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Payment Distrubtion CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion CRONJOB User : $user->name");
                $total_amount = $user->total_income;
                info("Payment Distrubtion CRONJOB User Total Income : $total_amount");
                $amount = $total_amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide: $amount");
                $amount_to_divide = $amount/2;
                info("Payment Distrubtion CRONJOB User Income to Divide into Community Pool and Cash wallet: $amount_to_divide");
                if($user->package->price >= 1000)
                {
                    $amount_for_packages = $amount_to_divide + $user->community_pool;
                    $total_packages = $amount_for_packages/50;
                    $total_packages = (int)$total_packages;
                    $package_amount = $total_packages * 50;
                    $community_amount = $amount_for_packages - $package_amount;
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                    if($total_packages > 0)
                    {
                        for($i = 0;$i < $total_packages;$i++)     
                        {
                            UserHepler::CreateUser($user);
                        }     
                    }
                    if($community_amount > 0)
                    {
                        $user->update([
                            'community_pool' =>  $community_amount,
                        ]);
                    }else{
                        $user->update([
                            'community_pool' =>  0,
                        ]);
                    }
                    
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                }else{
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount_to_divide,
                        'investment_amount' =>  $user->investment_amount +$amount_to_divide,
                        'total_income' => $user->total_income - $total_amount
                    ]);
                    ReferralIncome::CommunityPoolIncome($user,$amount_to_divide);
                }
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $amount,
                ]);
                info("Payment Distrubtion CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }

		} else {
			info("Payment Distrubtion CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion CRONJOB END AT " . date("d-M-Y h:i a"));
	}
    public function paymentDistrubtionofTradeIncome() {
		info("Payment Distrubtion of Trade Income CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $payment_distrubtion_days = 1;
		$payment_distrubtion_days = date('Y-m-d', strtotime("-$payment_distrubtion_days days"));
	
        $users = User::where('refer_by','!=',null)
                ->whereDate('last_login','>=',$payment_distrubtion_days)
                ->whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
		if ($users) {
            $total_users = $users->count();
            $trade_balance = $trade_income->balance;
            $amount = round($trade_balance/$total_users,2);
            info("Payment Distrubtion of Trade Income CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion of Trade Income CRONJOB User : $user->name");
                Earning::create([
                    'price' => $amount,
                    'user_id' => $user->id,
                    'type' => 'trade_income'
                ]);
                
                $user->update([
                    'total_income' => $user->total_income + $amount
                ]);
                info("Payment Distrubtion of Trade Income CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }
            $trade_income->update([
                'balance' => $trade_income->balance -= $trade_balance 
            ]);
		} else {
			info("Payment Distrubtion of Trade Income CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Trade Income CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Trade Income Done Successfully');
        return back();
	}
    
    public function add_user_to_super_pool()
    {
        $superPools = SuperPool::all();
        $main_user = User::find(1);
        foreach($superPools as $superPool)
        {
            $users = User::whereNotNull('package_id')->where('for_pool','>','2')->where('id','!=',1)->where('super_pool_'.$superPool->id,0)->get();
            if ($users->count() > 0) {
                $total_users = $users->count();
                info("Add Autopool For Super Pool ".$superPool->id." to User CRONJOB Total Users : $total_users");
                foreach($users as $user)
                {
                    if($user->package && $user->package->price > 2)
                    {
                        if($user->for_pool >= $superPool->price)
                        {
                            info("Add AutoPool For Super Pool ".$superPool->id." adding in tree for: $user->name");
                            AutoPoolForPackage::addUserInTree($user,$main_user,$superPool);
                        }else{
                            info("Add AutoPool For Super Pool ".$superPool->id." CRONJOB: Not applicable. ");
                        }
                    }else{
                        info("Add AutoPool For Super Pool ".$superPool->id." CRONJOB: ".$user->name." package is not applicable.");
                    }
                }
            } else {
                info("Add AutoPool For Super Pool ".$superPool->id." CRONJOB: Users not found. ");
            }
        }
        
		info("Add AutoPool For Package ".$superPool->id." CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Auto Pool Package '.$superPool->id.' Cronjob Run Successfully');
        return back();
    }
    public function add_user_rebirth_to_super_pool()
    {
        $superPool = SuperPool::first();
        $main_user = User::find(1);
        $trees = SuperPoolTree::where('super_pool_id',$superPool->id)->where('rebirth','>=',3)->get();
        if ($trees->count() > 0) {
            $totalTrees = $trees->count();
            info("Add Autopool For Super Pool ".$superPool->id." to User CRONJOB Total Users : $totalTrees");
            foreach($trees as $tree)
            {
                $user = $tree->user;
                $userCount = User::where('rebirth_id',Auth::user()->id)->count() * 3;       
                if($tree->rebirth > $userCount) 
                {
                    AutoPoolForPackage::createUserForRebirth($user,$main_user,$superPool);
                }
            }
        } else {
            info("Add AutoPool For Super Pool ".$superPool->id." CRONJOB: Users not found. ");
        }
    
		info("Add AutoPool For Package ".$superPool->id." CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Auto Pool Package '.$superPool->id.' Cronjob Run Successfully');
        return back();
    }
    public function tranferTempAmount()
    {
        $users = User::where('total_income','>=',1)
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        foreach($users as $user)
        {
            DB::beginTransaction();
            try{
                $status = RenewReferralIncome::referral($user);
                if($status == false)
                {
                    DB::rollBack();
                }else{
                    DB::commit();
                    $user->update([
                        'total_amount' => 0,    
                    ]);  
                }  
            }catch (Exception $e)
            {
                DB::rollBack();
            }
        }
        toastr()->success('Transfer Temp Income Cronjob Run Successfully');
        return back();
    }
    public function add_uuid_to_products()
    {
        $products = Product::whereNull('uuid')->get();
        foreach($products as $product)
        {
            $product->update([
                'uuid' => Str::uuid()
            ]);
        }
    }
    public function starter_package_reward_payment()
    {
        $users = User::whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $starter_income= CompanyAccount::where('name','Starter Account')->first();
		if ($users) {
            $total_users = $users->count();
            $starter_balance = $starter_income->balance/10;
            $amount = round($starter_balance/$total_users,2);
            info("Payment Distrubtion of Starter Package Reward CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion of Starter Package Reward CRONJOB User : $user->name");
                Earning::create([
                    'price' => $amount,
                    'user_id' => $user->id,
                    'type' => 'starter_package_reward'
                ]);
                
                $user->update([
                    'total_income' => $user->total_income + $amount
                ]);
                info("Payment Distrubtion of Starter Package Reward CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }
            $starter_income->update([
                'balance' => $starter_income->balance -= $starter_balance 
            ]);
		} else {
			info("Payment Distrubtion of Starter Package Reward CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Starter Package Reward CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Starter Package Reward Done Successfully');
        return back();
    }
    public function seller_package_reward_payment()
    {
        $users = User::whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $seller_income= CompanyAccount::where('name','Seller Account')->first();
		if ($users) {
            $total_users = $users->count();
            $seller_balance = $seller_income->balance/10;
            $amount = round($seller_balance/$total_users,2);
            info("Payment Distrubtion of seller Package Reward CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion of seller Package Reward CRONJOB User : $user->name");
                Earning::create([
                    'price' => $amount,
                    'user_id' => $user->id,
                    'type' => 'seller_package_reward'
                ]);
                
                $user->update([
                    'total_income' => $user->total_income + $amount
                ]);
                info("Payment Distrubtion of seller Package Reward CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }
            $seller_income->update([
                'balance' => $seller_income->balance -= $seller_balance 
            ]);
		} else {
			info("Payment Distrubtion of seller Package Reward CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of seller Package Reward CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of seller Package Reward Done Successfully');
        return back();
    }
    public function brand_package_reward_payment()
    {
        $users = User::whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $brand_income= CompanyAccount::where('name','Brand Account')->first();
		if ($users) {
            $total_users = $users->count();
            $brand_balance = $brand_income->balance/10;
            $amount = round($brand_balance/$total_users,2);
            info("Payment Distrubtion of brand Package Reward CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion of brand Package Reward CRONJOB User : $user->name");
                Earning::create([
                    'price' => $amount,
                    'user_id' => $user->id,
                    'type' => 'brand_package_reward'
                ]);
                
                $user->update([
                    'total_income' => $user->total_income + $amount
                ]);
                info("Payment Distrubtion of brand Package Reward CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }
            $brand_income->update([
                'balance' => $brand_income->balance -= $brand_balance 
            ]);
		} else {
			info("Payment Distrubtion of brand Package Reward CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of brand Package Reward CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of brand Package Reward Done Successfully');
        return back();
    }
    public function salary_account_payment()
    {
        $users = User::whereNotNull('package_id')
                ->whereIn('type',['Regional Manager','Zonal Manager','Area Manager','Field Manager','Seller','Managing Director'])
                ->get();
        $salary_account= CompanyAccount::where('name','Salary Account')->first();
		if ($users) {
            $total_users = $users->count();
            $salary_balance = $salary_account->balance/10;
            $amount = round($salary_balance/$total_users,2);
            info("Payment Distrubtion of Salary Package Reward CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                info("Payment Distrubtion of Salary Package Reward CRONJOB User : $user->name");
                Earning::create([
                    'price' => $amount,
                    'user_id' => $user->id,
                    'type' => 'trade_rank_reward'
                ]);
                
                $user->update([
                    'total_income' => $user->total_income + $amount
                ]);
                info("Payment Distrubtion of Salary Package Reward CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
            }
            $salary_account->update([
                'balance' => $salary_account->balance -= $salary_account 
            ]);
		} else {
			info("Payment Distrubtion of Salary Package Reward CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Salary Package Reward CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Salary Package Reward Done Successfully');
        return back();
    }
}
