<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order.index');
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
        //
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
        return redirect(route('admin.order.index'));
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
        return redirect(route('admin.order.index'));
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
        return redirect(route('admin.order.index'));
    }
}
