<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.payment_policy.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
        return view('admin.payment_policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaymentPolicy::create($request->all());
        toastr()->success('Payment Policy is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentPolicy  $paymentPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentPolicy $paymentPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentPolicy  $paymentPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentPolicy $paymentPolicy)
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return view('admin.dashboard.index');
        }
        return view('admin.payment_policy.edit')->with('paymentPolicy',$paymentPolicy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentPolicy  $paymentPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentPolicy $paymentPolicy)
    {
        $paymentPolicy->update($request->all());
        toastr()->success('Payment Policy Informations Updated successfully');
        return redirect()->route('admin.payment_policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentPolicy  $paymentPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentPolicy $paymentPolicy)
    {
        $paymentPolicy->delete();
        toastr()->success('Payment Policy Informations Deleted successfully');
        return redirect()->back();
    }
}
