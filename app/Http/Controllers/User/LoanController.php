<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('adminty-user.loan.index',compact('loans'));
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
        try{
            if($request->amount > Auth::user()->loanBalance()){
                toastr()->error('Amount greater than allowed balance.');
                return redirect()->back();
            }
            Loan::create([
                'user_id' => Auth::user()->id,
                'amount' => $request->amount,
                'return_date' => Carbon::today()->addDays(30),
                'status' => 0,
            ]);
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet + $request->amount
            ]);
            toastr()->success('Loan is Created Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
    public function pay($id)
    {
        try{
            $loan = Loan::find($id);
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet - $loan->amount
            ]);
            $loan->update([
                'status' => 1
            ]);
            toastr()->success('Loan Paid Succesfully!');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
