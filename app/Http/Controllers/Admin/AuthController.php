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
    // public function payment_distrubtion_for_assoiated_account() {
	// 	info("Payment Distrubtion For Assoiated Account CRONJOB CALLED AT " . date("d-M-Y h:i a"));
    //     $users = User::where('associated_with','!=',null)
    //             ->where('cash_wallet','>',1)
    //             ->get();
	// 	if ($users) {
    //         $total_users = $users->count();
    //         info("Payment Distrubtion For Assoiated Account  CRONJOB Total Users : $total_users");
    //         foreach($users as $user)
    //         {
    //             info("Payment Distrubtion For Assoiated Account   CRONJOB User : $user->name");
    //             $total_amount = $user->cash_wallet;
    //             info("Payment Distrubtion For Assoiated Account   CRONJOB User Total Income : $total_amount");
    //             $amount = $total_amount/2;
    //             $company_products_account = CompanyAccount::where('name','Company Products Account')->first();
    //             if($company_products_account ){
    //                 $company_products_account->update([
    //                     'balance' => $company_products_account->balance + $amount,
    //                 ]);
    //             }
    //             // $owner = User::find($user->associated_with);
    //             // info("Payment Distrubtion For Assoiated Account CRONJOB User Total Income  $amount added to : $owner->name");
    //             // $owner->update([
    //             //     'total_income' => $user->total_income + $amount
    //             // ]);
    //             // Earning::create([
    //             //     'price' => $amount,
    //             //     'user_id' => $owner->id,
    //             //     'due_to' => $user->id,
    //             //     'type' => 'associated_income'
    //             // ]);
    //             $user->update([
    //                 'cash_wallet' => $user->cash_wallet - $total_amount
    //             ]);
    //             $flush_account = CompanyAccount::find(1);
    //             $flush_account->update([
    //                 'balance' => $flush_account->balance + $amount,
    //             ]);
    //             info("Payment Distrubtion For Assoiated Account   CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
    //         }

	// 	} else {
	// 		info("Payment Distrubtion For Assoiated Account   CRONJOB: Users not found. ");
	// 	}
	// 	info("Payment Distrubtion For Assoiated Account   CRONJOB END AT " . date("d-M-Y h:i a"));
	// }
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
            if($trade_income->balance > 0){
                $trade_balance = $trade_income->balance/10;
                $amount = round($trade_balance/$total_users,2);
                info("Payment Distrubtion of Trade Income CRONJOB Total Users : $total_users");
                foreach($users as $user)
                {
                    info("Payment Distrubtion of Trade Income CRONJOB User : $user->name");
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount,
                        'company_reward' => $user->company_reward + $amount,
                    ]);
                    info("Payment Distrubtion of Trade Income CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
                }
                $trade_income->update([
                    'balance' => $trade_income->balance -= $trade_balance 
                ]);

            }
		} else {
			info("Payment Distrubtion of Trade Income CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Trade Income CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Trade Income Done Successfully');
        return back();
	}
    public function paymentDistrubtionofAllPurchase() {
		info("Payment Distrubtion of All Purchase CRONJOB CALLED AT " . date("d-M-Y h:i a"));
        $purchase_account= CompanyAccount::where('name','For Purchase All Account')->first();
        if($purchase_account->balance > 0){
            $purchase_balance = $purchase_account->balance/4;
            $ranges = [
                [
                    'from' => 1,
                    'to' => 9999,
                ],
                [
                    'from' => 10000,
                    'to' => 29999,
                ],    
                [
                    'from' => 30000,
                    'to' => 59999,
                ],    
                [
                    'from' => 60000,
                    'to' => 99999,
                ],    
            ];
            foreach($ranges as $range){
                $users = User::select('users.id','users.cash_wallet','users.company_reward', DB::raw('SUM(transcations.amount) as total_amount'))
                    ->join('transcations', 'transcations.sender_id', '=', 'users.id')
                    ->whereNotNull('users.refer_by')
                    ->whereNotNull('users.package_id')
                    ->whereNotIn('users.type', ['fake', 'rebirth'])
                    ->groupBy('users.id')
                    ->havingRaw('total_amount BETWEEN ? AND ?', [$range['from'], $range['to']])
                    ->get();
                if($users->count() > 0){
                    $amount = round($purchase_balance/$users->count(),  2);
                    info("Payment Distrubtion of All Purchase Income CRONJOB Total Users : {{$users->count()}}");
                    foreach($users as $user)
                    {
                        info("Payment Distrubtion of All Purchase Income CRONJOB User : $user->name");
                        $user->update([
                            'cash_wallet' => $user->cash_wallet + $amount,
                            'company_reward' => $user->company_reward + $amount,
                        ]);
                        info("Payment Distrubtion of All Purchase Income CRONJOB For User $user->name : Amount $amount Added to All Purchases Company Account");  
                    }
                }else{
                    $flush_account = CompanyAccount::find(1);
                    $flush_account->update([
                        'balance' => $flush_account->balance + $purchase_balance,
                    ]);

                }
                $purchase_account->update([
                    'balance' => $purchase_account->balance -= $purchase_balance 
                ]);
            }
            

        }
		info("Payment Distrubtion of All Purchases Income CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of All Purchases Income Done Successfully');
        return back();
	}
    public function paymentDistrubtionofProductIncome() {
		info("Payment Distrubtion of Product Income CRONJOB CALLED AT " . date("d-M-Y h:i a"));
	
        $users = User::where('refer_by','!=',null)
                ->whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $productAccount = CompanyAccount::where('name','Company Products Account')->first();
		if ($users) {
            $total_users = $users->count();
            if($productAccount->balance > 0){
                $trade_balance = $productAccount->balance/10;
                $amount = round($trade_balance/$total_users,2);
                info("Payment Distrubtion of Product Income CRONJOB Total Users : $total_users");
                foreach($users as $user)
                {
                    info("Payment Distrubtion of Product Income CRONJOB User : $user->name");
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $amount,
                        'star_rank_income' => $user->star_rank_income + $amount,
                    ]);
                    info("Payment Distrubtion of Product Income CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
                }
                $productAccount->update([
                    'balance' => $productAccount->balance -= $trade_balance 
                ]);

            }
		} else {
			info("Payment Distrubtion of Product Income CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Product Income CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Product Income Done Successfully');
        return back();
	}
    public function paymentDistrubtionofAllRenew() {
		info("Payment Distrubtion of All Renew CRONJOB CALLED AT " . date("d-M-Y h:i a"));
	
        $users = User::where('refer_by','!=',null)
                ->whereNotNull('package_id')
                ->whereNotIn('type',['fake','rebirth'])
                ->get();
        $renew_all_account= CompanyAccount::where('name','Renew All Account')->first();
        if ($users) {
            $total_users = $users->count();
            if($renew_all_account->balance > 0){
                $trade_balance = $renew_all_account->balance/10;
                $amount = round($trade_balance/$total_users,2);
                info("Payment Distrubtion of For Renew CRONJOB Total Users : $total_users");
                foreach($users as $user)
                {
                    info("Payment Distrubtion of Renew CRONJOB User : $user->name");
                    
                    $user->update([
                        'for_renew' => $user->for_renew + $amount
                    ]);
                    info("Payment Distrubtion of For Renew CRONJOB For User $user->name : Amount $amount Added to flush company Account");  
                }
                $renew_all_account->update([
                    'balance' => $renew_all_account->balance -= $trade_balance 
                ]);

            }
		} else {
			info("Payment Distrubtion of All Renew CRONJOB: Users not found. ");
		}
		info("Payment Distrubtion of Product Income CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Payment Distribution of Product Income Done Successfully');
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
                ->where('community_pool','>',$package->distribution)
                ->get();
            foreach($users as $user){
                $community_pool = $user->community_pool;
                $total_packages = $community_pool/$package->distribution;
                $total_packages = (int)$total_packages;
                $package_amount = $total_packages * $package->distribution;
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
            $users = User::where('for_renew','>',$package->distribution)
                ->where('status','active')
                ->whereNotNull('package_id')
                ->get();
            foreach($users as $user){
                DB::beginTransaction();
                try{
                    $user->update([
                        'package_id' => $package->id,
                        'for_renew' => $user->for_renew -= $package->distribution,    
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
