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
use App\Models\Loan;
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
    public function paymentDistrubtionofTradeIncome() {
		info("Payment Distrubtion of Trade Income CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $payment_distrubtion_days = 1;
		$payment_distrubtion_days = date('Y-m-d', strtotime("-$payment_distrubtion_days days"));
	
        $users = User::where('refer_by','!=',null)
                // ->whereDate('last_login','>=',$payment_distrubtion_days)
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
    public function get_pending_loan()
    {
        $pendingLoans = Loan::where('status',0)->whereDate('return_date','<',date('Y-m-d'))->get();
        $salary_account= CompanyAccount::where('name','Salary Account')->first();
		if ($pendingLoans->count() > 0) {
            $total_loans = $pendingLoans->count();
            info("Get Pending Loans CRONJOB Total Users : $total_loans");
            foreach($pendingLoans as $pendingLoan)
            {
                $user = User::find($pendingLoan->user_id);
                info("Get Pending Loans CRONJOB User : $user->name");
                $user->update([
                    'cash_wallet' => $user->cash_wallet - $pendingLoan->amount
                ]);
                $pendingLoan->update([
                    'status' => 1
                ]);
            }
		} else {
			info("Get Pending Loan CRONJOB: Loan not found. ");
		}
		info("Get Pending Loan CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Pending Loan Cleared Successfully');
        return back();
    }
    public function create_associate_account()
    {
        $package = Package::where('is_associate',1)->first();
        if($package){
            $users = User::where('associated_with',null)
                ->where('community_pool','>',$package->price)
                ->get();
            foreach($users as $user){
                $community_pool = $user->community_pool;
                $total_packages = $community_pool/$package->price;
                $total_packages = (int)$total_packages;
                $package_amount = $total_packages * $package->price;
                $community_amount = $community_pool - $package_amount;
                if($total_packages > 0)
                {
                    for($i = 0;$i < $total_packages;$i++)     
                    {
                        UserHepler::CreateUser($user,$package);
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
            }
        }
		info("Create Associate Account CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Associated User Created Successfully');
        return back();
    }
    public function renew_account()
    {
        $package = Package::where('is_renew',1)->first();
        if($package){
            $users = User::where('for_renew','>',$package->price)
                ->where('status','active')
                ->whereNotNull('package_id')
                ->get();
            foreach($users as $user){
                DB::beginTransaction();
                try{
                    $user->update([
                        'package_id' => $package->id,
                        'for_renew' => $user->for_renew -= $package->price,    
                    ]);     
                    $status = RenewReferralIncome::referral($user);
                    if($status == false)
                    {
                        DB::rollBack();
                    } 
                    DB::commit();
                }catch (Exception $e)
                {
                    DB::rollBack();
                    toastr()->error($e->getMessage());
                    return redirect()->back();
                }
            }
        }
		info("Renew Account CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Renew Account Created Successfully');
        return back();
    }
}
