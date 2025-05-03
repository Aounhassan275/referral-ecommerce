<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Helpers\MailHelper;
use App\Helpers\ReferralIncome;
use App\Helpers\UserHepler;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->directory.'.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->code)
        { 
            if($request->password != $request->confirm_password){
                toastr()->error('Password Dont Match');
                return redirect()->back()->withInput();
            }
            $image = $request->image->getClientOriginalExtension();
            if($image != "jpeg" && $image != "jpg" && $image != "png"){
                toastr()->error('Only Image File get Upload');
                return redirect()->back()->withInput();
            }
            $code = $request->code?$request->code:$request->new_code;
            $user= User::where('code',$code)->first();
            if($user){
           
                $validator = Validator::make($request->all(),[
                    'name' => 'required|unique:users'
                ]);
                
                if($validator->fails()){
                    toastr()->error('Username  already exists');
                    return redirect()->back();
                }
                $new_user =  User::create([
                    'code' => uniqid(),
                    'verification' => uniqid(),
                    'refer_by' => $user->id,
                    'temp_password' => $request->password,
                ]+$request->all());
                
            }
        }else{
           $validator = Validator::make($request->all(),[
                'name' => 'required|unique:users'
            ]);

            if($validator->fails()){
                toastr()->error('Username  already exists');
                return redirect()->back();
            }
            toastr()->error('Contact Support.');
            return redirect()->back();
            
        }
        toastr()->success('Your Account Has Been successfully Created, Please Verify Your Email Account via Link.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        if($request->banner)
        {
            if($user->banner())
            {
                $banner_image = $user->images->where('name','Banner')->first();
                $banner_image->update([
                    'image' => $request->banner
                ]);
            }else{
                UserImages::create([
                    'name' => 'Banner',
                    'image' => $request->banner,
                    'user_id' => $user->id
                ]);
            }
            
        }         
        if($request->cnic_front)
        {
            if($user->cnicFront())
            {
                $cnic_front = $user->images->where('name','Cnic Front')->first();
                $cnic_front->update([
                    'image' => $request->cnic_front
                ]);
            }else{
                UserImages::create([
                    'name' => 'Cnic Front',
                    'image' => $request->cnic_front,
                    'user_id' => $user->id
                ]);
            }
            
        }      
        if($request->cnic_back)
        {
            if($user->cnicBack())
            {
                $cnic_back = $user->images->where('name','Cnic Back')->first();
                $cnic_back->update([
                    'image' => $request->cnic_back
                ]);
            }else{
                UserImages::create([
                    'name' => 'Cnic Back',
                    'image' => $request->cnic_back,
                    'user_id' => $user->id
                ]);
            }
            
        }     
        if($request->main_image)
        {
            if($user->mainImage())
            {
                $main_image = $user->images->where('name','Main Image')->first();
                $main_image->update([
                    'image' => $request->main_image
                ]);
            }else{
                UserImages::create([
                    'name' => 'Main Image',
                    'image' => $request->main_image,
                    'user_id' => $user->id
                ]);
            } 
        }   
        if($request->main_image)
        {
            if($user->mainImage())
            {
                $main_image = $user->images->where('name','Main Image')->first();
                $main_image->update([
                    'image' => $request->main_image
                ]);
            }else{
                UserImages::create([
                    'name' => 'Main Image',
                    'image' => $request->main_image,
                    'user_id' => $user->id
                ]);
            } 
        } 
        if($request->passport)
        {
            if($user->passport())
            {
                $passport = $user->images->where('name','Passport')->first();
                $passport->update([
                    'image' => $request->passport
                ]);
            }else{
                UserImages::create([
                    'name' => 'Passport',
                    'image' => $request->passport,
                    'user_id' => $user->id
                ]);
            } 
        }  
        if($request->driving_license)
        {
            if($user->drivingLicense())
            {
                $driving_license = $user->images->where('name','Driving License')->first();
                $driving_license->update([
                    'image' => $request->driving_license
                ]);
            }else{
                UserImages::create([
                    'name' => 'Driving License',
                    'image' => $request->driving_license,
                    'user_id' => $user->id
                ]);
            } 
        }    
        if($request->utility_bill)
        {
            if($user->utilityBill())
            {
                $utility_bill = $user->images->where('name','Utility Bill')->first();
                $utility_bill->update([
                    'image' => $request->utility_bill
                ]);
            }else{
                UserImages::create([
                    'name' => 'Utility Bill',
                    'image' => $request->utility_bill,
                    'user_id' => $user->id
                ]);
            } 
        }    
        if($request->password)
        {
            $user->update([
                'password' => $request->password,
                'temp_password' => $request->password
            ]);
        }
        $request->merge(['hide_profile' => $request->hide_profile?1:0]);
        $user->update($request->except('password'));
        toastr()->success('Your Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function refer(Request $request)
    {
        $user = Auth::user();
        if($user->checkStatus() == false)   
        {
          toastr()->success('Your Package is Expire');
           return redirect(route('user.dashboard.index'));
        }
        if($request->member_type == 'active'){
            $referrals = Auth::user()->mrefers()->where('status','active');
        }else if($request->member_type == 'pending'){
            $referrals = Auth::user()->mrefers()->where('status','!=','active');
        }else{
            $referrals = Auth::user()->mrefers();
        }
        return view($this->directory.'.refer.index')->with('user',$user)->with('referrals',$referrals);
    }
    public function emailVerification()
    {
        $user = Auth::user();
        if($user->email_verified == true){
            toastr()->error('Your Account is already Verified');
            return redirect()->back();
        }
        $user->verification = uniqid();
        $user->save();
        try {
            MailHelper::EmailVerified($user);
            toastr()->success('Email Send Successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            $error  =  $e->getmessage();
            info("Email Error $error");
            toastr()->error('Invalid Email Contact Support!!');
            return redirect()->back();
        }
    }
    public function transferFunds(Request $request)
    {
        $user = Auth::user();
        $amount = $request->cash_wallet + $request->community_pool;
        if($amount > $user->total_income)
        {
            return response()->json([
                'status' => false,
                'message' => 'Amount is greater than temp income'
            ]);
           
        }
        if($amount < 2)
        {
            return response()->json([
                'status' => false,
                'message' => 'Amount must be '.Setting::currency().' 2 or more'
            ]);
           
        }
        $user->update([
            'cash_wallet' => $user->cash_wallet + $request->cash_wallet,
            // 'community_pool' =>  $user->community_pool +$request->community_pool,
            'investment_amount' =>  $user->investment_amount +$request->community_pool,
            'total_income' => $user->total_income - $amount
        ]);
        toastr()->success('Amount Transferred Successfully');
        return response()->json([
            'status' => true,
            'message' => 'Amount Transferred Successfully!!'
        ]);
    }
    public function transferPoolIncomeFunds(Request $request)
    {
        $user = Auth::user();
        $amount = $request->cash_wallet + $request->direct_referral +  $request->fee;
        if($amount > $user->pool_income)
        {
            return response()->json([
                'status' => false,
                'message' => 'Amount is greater than pool income'
            ]);
           
        }
        if($amount < 2)
        {
            return response()->json([
                'status' => false,
                'message' => 'Amount must be '.Setting::currency().'2 or more'
            ]);
           
        }
        $user->update([
            'cash_wallet' => $user->cash_wallet + $request->cash_wallet,
            'pool_income' => $user->pool_income - $amount
        ]);
        $pool_account= CompanyAccount::where('name','Pool Income')->first();
        $pool_account->update([
            'balance' => $pool_account->balance + $request->fee,
        ]);
        $refer_by = User::find($user->refer_by);
        if($refer_by)
        {
            $refer_by->update([
                'cash_wallet' => $user->cash_wallet + $request->direct_referral,
            ]);
            Earning::create([
                'price' => $request->direct_referral,
                'user_id' => $refer_by->id,
                'due_to' => $user->id,
                'type' => 'direct_income'
            ]);
        }else{
            $pool_account->update([
                'balance' => $pool_account->balance + $request->direct_referral,
            ]);
        }
        toastr()->success('Amount Transferred Successfully');
        return response()->json([
            'status' => true,
            'message' => 'Amount Transferred Successfully!!'
        ]);
    }
    public function coins()
    {
        $currencies = [];
        try{
            $client = new Client();
            $currencies_list = $client->request('GET', 'https://graphql.coincap.io/');
            $body = json_decode($currencies_list->getBody() , true);
            dd($body);
            $currencies = array_slice($body, 0, 30, true);
            $currencies = $currencies['data'];
        }catch (\Exception $e) {
            // dd($e->getMessage());
        }
        return view($this->directory.'.coin.index', compact('currencies'));
    }
}