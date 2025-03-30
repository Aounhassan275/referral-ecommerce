<?php

namespace App\Http\Controllers\User;

use App\Helpers\FundTransferHelper;
use App\Helpers\Helper;
use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\PaymentPolicy;
use App\Models\PostSale;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostSaleController extends Controller
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
        $sales = PostSale::where('sender_id',Auth::user()->id)->get();
        return view($this->directory.'.post_sale.index')->with('sales',$sales);
    }
    public function receivedSale()
    {
        $sales = PostSale::where('receiver_id',Auth::user()->id)->get();
        return view($this->directory.'.post_sale.received')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=',Auth::user()->id)->whereNotIn('type',['fake','rebirth'])->orderBy('name')->get();
        return view($this->directory.'.post_sale.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'receiver_id' => 'required',
            'sender_id' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error('Must Fill All Fields');
            return redirect()->back();
        }
        $user = User::find($request->sender_id);
        if($user->temp_password != $request->new_password)
        {
            toastr()->error('Password Not Matched!!');
            return redirect()->back();
        }
        $sale_fee = $request->amount/100 * Setting::saleFee();
        if($user->cash_wallet < $sale_fee)
        {
            toastr()->error('Insufficient Balance.');
            return redirect()->back();
        }
        $receiver = User::find($request->receiver_id);
        PostSale::create([
            'detail' => 'Amount Sale from '.$user->name.' to '.$receiver->name.' account.'
        ]+$request->all());
        $paymentPolicy = PaymentPolicy::where('type','Post Sale')->first();
        if($paymentPolicy){
            FundTransferHelper::transfer($sale_fee,$user,$paymentPolicy,$receiver);
        }
        toastr()->success('Sale Created To User Account Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostSale  $postSale
     * @return \Illuminate\Http\Response
     */
    public function show(PostSale $postSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostSale  $postSale
     * @return \Illuminate\Http\Response
     */
    public function edit(PostSale $postSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostSale  $postSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostSale $postSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostSale  $postSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostSale $postSale)
    {
        //
    }
    public function get_sale_create()
    {
        $users = User::where('id','!=',Auth::user()->id)->whereNotIn('type',['fake','rebirth'])->orderBy('name')->get();
        return view($this->directory.'.post_sale.get_sale_create')->with('users',$users);
    }
}
