<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\BuyPackage;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BuyPackageController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->checkStatus() == false)   
        {
          toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        $users = User::where('id','!=',Auth::user()->id)->whereNotIn('type',['fake','rebirth'])
                ->where('status','pending')->orderBy('name')->get();
        $packages = BuyPackage::where('payee_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view($this->directory.'.buy_package.index',compact('users','packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payee = User::find(Auth::user()->id);
        if($payee->temp_password != $request->new_password)
        {
            toastr()->error('Password Not Matched!!');
            return redirect()->back();
        }
        
        $validator = Validator::make($request->all(),[
            'package_id' => 'required',
            'user_id' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error('Must Fill All Fields');
            return redirect()->back();
        }
        $user= User::find($request->user_id);
        $package= Package::find($request->package_id);
        if($payee->cash_wallet >= $package->price)
        {
            DB::beginTransaction();
            try{
                $user->update([
                    'status' => 'active',
                    'a_date' => Carbon::today(),
                    'package_id' => $package->id,
                ]);     
                $payee->update([
                  'cash_wallet' => $payee->cash_wallet -= $package->price,    
                ]);     
                $status = ReferralIncome::referral($user);
                if($status == false)
                {
                    DB::rollBack();
                    toastr()->error('Something Went Wrong!');
                    return redirect()->back();
                }  
                BuyPackage::create([
                  'package_id' => $package->id,
                  'payee_id' => $payee->id,
                  'user_id' => $user->id,
                ]);
                DB::commit();
            }catch (Exception $e)
            {
                DB::rollBack();
                toastr()->error($e->getMessage());
                return redirect()->back();
            }
            toastr()->success('Member Package Active Successfully.');
            return redirect()->back();
        }else{
            toastr()->warning('Your Cash Wallet have not enough balance to purchase Package.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BuyPackage $buyPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuyPackage $buyPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuyPackage $buyPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuyPackage $buyPackage)
    {
        //
    }
}
