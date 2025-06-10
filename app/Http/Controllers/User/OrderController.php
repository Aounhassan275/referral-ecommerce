<?php

namespace App\Http\Controllers\User;

use App\Helpers\FundTransferHelper;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Order;
use App\Models\PaymentPolicy;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        return view($this->directory.'.order.index');
    }
    public function orders()
    {
        return view($this->directory.'.order.orders');
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
        $totalDeduction =  $request->total_amount;
        if($request->payment_option == "Pay on System")
        {
            if($totalDeduction > Auth::user()->cash_wallet)
            {            
                toastr()->error('You dont have enough amount in Cash Wallet to purchase this Product!');
                return redirect()->back();
            }
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet -= $totalDeduction
            ]);
        }
        elseif($request->payment_option == "Pay From Stock")
        {
            if($totalDeduction > Auth::user()->stockBalance())
            {        
                $remainingDeductionAmount = $totalDeduction - Auth::user()->stockBalance();    
                if($remainingDeductionAmount > Auth::user()->cash_wallet){
                    toastr()->error('You dont have enough amount in For Stock/Cash Wallet to purchase this Product!');
                    return redirect()->back();
                }else{
                    Auth::user()->update([
                        'cash_wallet' => Auth::user()->cash_wallet -= $remainingDeductionAmount
                    ]);
                    $request->merge([
                        'extra_amount' => Auth::user()->stockBalance()
                    ]);
                }
            }else{
                $request->merge([
                    'extra_amount' => $totalDeduction
                ]);
            }
        }
        elseif($request->payment_option == "Pay From Health")
        {
            if($totalDeduction > Auth::user()->healthBalance())
            {        
                $remainingDeductionAmount = $totalDeduction - Auth::user()->healthBalance();    
                if($remainingDeductionAmount > Auth::user()->cash_wallet){
                    toastr()->error('You dont have enough amount in For Health/Cash Wallet to purchase this Product!');
                    return redirect()->back();
                }else{
                    Auth::user()->update([
                        'cash_wallet' => Auth::user()->cash_wallet -= $remainingDeductionAmount
                    ]);
                    $request->merge([
                        'extra_amount' => Auth::user()->healthBalance()
                    ]);
                }
            }else{
                $request->merge([
                    'extra_amount' => $totalDeduction
                ]);
            }
        }
        elseif($request->payment_option == "Pay From Purchase")
        {
            if($totalDeduction > Auth::user()->purchaseBalance())
            {        
                $remainingDeductionAmount = $totalDeduction - Auth::user()->purchaseBalance();    
                if($remainingDeductionAmount > Auth::user()->cash_wallet){
                    toastr()->error('You dont have enough amount in For Purchase/Cash Wallet to purchase this Product!');
                    return redirect()->back();
                }else{
                    Auth::user()->update([
                        'cash_wallet' => Auth::user()->cash_wallet -= $remainingDeductionAmount
                    ]);
                    $request->merge([
                        'extra_amount' => Auth::user()->purchaseBalance()
                    ]);
                }
            }else{
                $request->merge([
                    'extra_amount' => $totalDeduction
                ]);
            }
        }
        else{
            if($totalDeduction > Auth::user()->cash_wallet)
            {            
                toastr()->error('You dont have enough amount in Cash Wallet to purchase this Product!');
                return redirect()->back();
            }
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet -= $totalDeduction
            ]);
        }
        $owner = null;
        if($request->owner_id){
            $owner = User::find($request->owner_id);
        }
        $paymentPolicy = PaymentPolicy::where('type','Post Sale')->first();
        if($paymentPolicy){
            FundTransferHelper::transfer($request->order_fee,Auth::user(),$paymentPolicy,$owner);
        }
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
