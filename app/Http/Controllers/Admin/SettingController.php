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
        
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Chat::truncate();
        DB::statement('ALTER TABLE chats AUTO_INCREMENT = 1;');
        ChatMessage::truncate();
        DB::statement('ALTER TABLE chat_messages AUTO_INCREMENT = 1;');
        Deposit::truncate();
        DB::statement('ALTER TABLE deposits AUTO_INCREMENT = 1;');
        Earning::truncate();
        DB::statement('ALTER TABLE earnings AUTO_INCREMENT = 1;');
        Email::truncate();
        DB::statement('ALTER TABLE emails AUTO_INCREMENT = 1;');
        Location::truncate();
        DB::statement('ALTER TABLE locations AUTO_INCREMENT = 1;');
        Message::truncate();
        DB::statement('ALTER TABLE messages AUTO_INCREMENT = 1;');
        PackageHistory::truncate();
        DB::statement('ALTER TABLE package_histories AUTO_INCREMENT = 1;');
        Order::truncate();
        DB::statement('ALTER TABLE orders AUTO_INCREMENT = 1;');
        ProductImage::truncate();
        DB::statement('ALTER TABLE product_images AUTO_INCREMENT = 1;');
        ProductComment::truncate();
        DB::statement('ALTER TABLE product_comments AUTO_INCREMENT = 1;');
        Product::truncate();
        DB::statement('ALTER TABLE products AUTO_INCREMENT = 1;');
        Transcation::truncate();
        DB::statement('ALTER TABLE transcations AUTO_INCREMENT = 1;');
        UserImages::truncate();
        DB::statement('ALTER TABLE user_images AUTO_INCREMENT = 1;');
        Withdraw::truncate();
        DB::statement('ALTER TABLE withdraws AUTO_INCREMENT = 1;');
        User::truncate();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
