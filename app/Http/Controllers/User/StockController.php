<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('adminty-user.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            if($request->amount > Auth::user()->cash_wallet){
                toastr()->error('Low Balance.');
                return redirect()->back();
            }
            Stock::create([
                'user_id' => Auth::user()->id,
                'amount' => $request->amount,
                'return_date' => $request->status == 0 ? Carbon::today() : null,
                'status' => $request->status,
            ]);
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet - $request->amount
            ]);
            toastr()->success('Stock Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
