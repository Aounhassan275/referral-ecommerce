<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\PostPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPaymentController extends Controller
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
        return view($this->directory.'.post_payment.index');
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
            PostPayment::create($request->all());
            
            Auth::user()->update([
                'cash_wallet' => Auth::user()->cash_wallet - $request->amount
            ]);
            toastr()->success('Post Payment is Created Successfully');
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
     * @param  \App\Models\PostPayment  $postPayment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postPayments = PostPayment::where('post_purchase_id',$id)->get();
        return view($this->directory.'.post_payment.index',compact('postPayments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostPayment  $postPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostPayment $postPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostPayment  $postPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostPayment $postPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostPayment  $postPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostPayment $postPayment)
    {
        //
    }
}
