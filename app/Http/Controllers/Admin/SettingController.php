<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\CompanyAccount;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Email;
use App\Models\Location;
use App\Models\Message;
use App\Models\Order;
use App\Models\PackageHistory;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductImage;
use App\Models\Setting;
use App\Models\Transcation;
use App\Models\User;
use App\Models\UserImages;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
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
        Setting::create($request->all());
        toastr()->success('Setting is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $setting = Setting::find($id);
        $setting->update($request->all());
        toastr()->success('Setting Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        toastr()->success('Setting Message Informations Deleted successfully');
        return redirect()->back();
    }
    public function empty_database()
    {
        $company_accounts = CompanyAccount::all();
        foreach($company_accounts as $account)
        {
            $account->update([
                'balance' => 0
            ]);
        }
        ChatMessage::query()->delete();
        Chat::query()->delete();
        Deposit::query()->delete();
        Earning::query()->delete();
        Email::query()->delete();
        Location::query()->delete();
        Message::query()->delete();
        PackageHistory::query()->delete();
        Order::query()->delete();
        ProductImage::query()->delete();
        ProductComment::query()->delete();
        Product::query()->delete();
        Transcation::query()->delete();
        UserImages::query()->delete();
        Withdraw::query()->delete();
        User::query()->delete();
        
        for($i = 1;$i<= 20;$i++)
        {
            if($i == 1)
            {
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '9',
                    'email_verified' => true,
                    'status' => 'active',
                    'a_date' =>  Carbon::today(),
                    'code' => uniqid(),
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }elseif($i == 20)
            {
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'email_verified' => true,
                    'temp_password' =>'1234',
                    'package_id' => '9',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $i - 1,
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }
            else{
                DB::table('users')->insert([
                    [ 'name' => 'company'.$i,
                    'email' => 'company'.$i.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'email_verified' => true,
                    'package_id' => '9',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $i - 1,
                    'referral' => $i + 1,
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            } 
            DB::table('package_histories')->insert([
                [ 'user_id' => $i,
                'package_id' => '9',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ]);
        }
        for($k = 21;$k<= 40;$k++)
        {
            if($k == 40)
            {
                DB::table('users')->insert([
                    [ 'name' => 'fake'.$k,
                    'email' => 'fake'.$k.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '9',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $k - 1,
                    'type' => 'fake',
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            }
            else{
                DB::table('users')->insert([
                    [ 'name' => 'fake'.$k,
                    'email' => 'fake'.$k.'@cashwecan.com',
                    'password' => Hash::make('1234'),
                    'temp_password' =>'1234',
                    'package_id' => '9',
                    'status' => 'active',
                    'code' => uniqid(),
                    'refer_by' => $k - 1,
                    'referral' => $k + 1,
                    'type' => 'fake',
                    'image' => '/profile/311639246735.jpg',
                    'a_date' =>  Carbon::today(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ]);
            } 
            DB::table('package_histories')->insert([
                [ 'user_id' => $k,
                'package_id' => '9',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ]);
        }
        toastr()->success('Database is Empty Now');
        return redirect()->back();
    }
}
