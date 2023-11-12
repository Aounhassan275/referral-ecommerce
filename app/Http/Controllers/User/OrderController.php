<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.order.index');
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
        if($request->payment_option == "Pay on System")
        {
            $totalDeduction =  $request->price/100 * Setting::orderFee() + $request->price;
            if($totalDeduction > Auth::user()->cash_wallet)
            {            
                toastr()->error('You dont have enough amount in Cash Wallet to purchase this Product!');
                return redirect()->back();
            }
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet -= $totalDeduction
            ]);
        }else{
            if($request->order_fee > Auth::user()->cash_wallet)
            {            
                toastr()->error('You dont have enough amount in Cash Wallet to purchase this Product!');
                return redirect()->back();
            }
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet -= $request->order_fee
            ]);
        }
        $sale_reward_for_users = $request->order_fee/100 * 20;
        if($request->owner_id)
        {
            $owner = User::find($request->owner_id);
            $owner->update([
                'sale_reward' => $owner->sale_reward += $sale_reward_for_users
            ]);
        }else{
            $trade_income= CompanyAccount::where('name','Trade Income')->first();
            $trade_income->update([
                'balance' => $trade_income->balance += $sale_reward_for_users
            ]);

        }
        $user = User::find($request->user_id);
        $user->update([
            'sale_reward' => $user->sale_reward += $sale_reward_for_users
        ]);
        $sale_reward_for_trade = $request->order_fee/100*50;
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $sale_reward_for_trade
        ]);
        $sale_reward_for_gift = $request->order_fee/100*10;
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance += $sale_reward_for_gift
        ]);
        Order::create($request->all());
        $product = Product::find($request->product_id);
        $product->update([
            'stock' => $product->stock - 1
        ]);
        toastr()->warning('Order Created Successfully!');
        return redirect(url('user/orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $order = Order::find($id);
        $order->update($request->all());
        toastr()->success('Order Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function orderonHold($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'onHold'
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
    public function orderCompleted($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Completed'
        ]);
        if($order->owner_id)
        {
            $owner = User::find($order->owner_id);
            $owner->update([
                'cash_wallet' => $owner->cash_wallet + $order->price,
            ]);
        }else{
            $company_income= CompanyAccount::find(1);
            $company_income->update([
                'balance' => $company_income->balance += $order->price
            ]);
        }
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
    public function orderRejected($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'Rejected'
        ]);
        $user = User::find($order->user_id);
        $user->update([
            'cash_wallet' => $user->cash_wallet + $order->price,
        ]);
        toastr()->warning('Order Updated Successfully!');
        return redirect(route('user.order.index'));
    }
}
