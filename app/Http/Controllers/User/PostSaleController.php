<?php

namespace App\Http\Controllers\User;

use App\Helpers\ReferralIncome;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\PostSale;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = PostSale::where('sender_id',Auth::user()->id)->get();
        return view('user.post_sale.index')->with('sales',$sales);
    }
    public function receivedSale()
    {
        $sales = PostSale::where('receiver_id',Auth::user()->id)->get();
        return view('user.post_sale.received')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id','!=',Auth::user()->id)->whereNotIn('type',['fake','rebirth'])->orderBy('name')->get();
        return view('user.post_sale.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->temp_password != $request->new_password)
        {
            toastr()->error('Password Not Matched!!');
            return redirect()->back();
        }
        
        $validator = Validator::make($request->all(),[
            'receiver_id' => 'required',
            'sender_id' => 'required',
            'amount' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error('Must Fill All Fields');
            return redirect()->back();
        }
        $sale_fee = $request->amount/100 * Setting::saleFee();
        if($user->cash_wallet < $sale_fee)
        {
            toastr()->error('Insufficient Balance.');
            return redirect()->back();
        }
        $companyAmount = $sale_fee/100*10;
        $companyTradeAmount = $sale_fee/100*10;
        $companyGiftAmount = $sale_fee/100*10;
        $teamLeaderAmount = $sale_fee/100*10;
        $directRefferralAmount = $sale_fee/100*10;
        $transferToRefferrals = $sale_fee/100*50;
        if($user->refer_by)
        {
            $parent = User::find($user->refer_by);
            $parent->update([
                'total_income' => $parent->total_income + $directRefferralAmount,
            ]);
            Earning::create([
                'price' => $directRefferralAmount,
                'user_id' => $parent->id,
                'due_to' => $user->id,
                'type' => 'reward_income'
            ]);
        }else{
            $flush_account = CompanyAccount::where('name','Flush Income')->first();
            $flush_account->update([
                'balance' => $flush_account->balance + $directRefferralAmount,
            ]);
        }
        ReferralIncome::transferAmountToUpline($transferToRefferrals,$user);
        $companyAccount= CompanyAccount::find(1);
        $companyAccount->update([
            'balance' => $companyAccount->balance += $companyAmount
        ]);
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $companyTradeAmount
        ]);
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance += $companyGiftAmount
        ]);
        $teamLeaderAccount = CompanyAccount::where('name','Team Leader')->first();
        $teamLeaderAccount->update([
            'balance' => $teamLeaderAccount->balance += $teamLeaderAmount
        ]);
        $receiver = User::find($request->receiver_id);
        PostSale::create([
            'detail' => 'Amount Sale from '.$user->name.' to '.$receiver->name.' account.'
        ]+$request->all());
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
}
