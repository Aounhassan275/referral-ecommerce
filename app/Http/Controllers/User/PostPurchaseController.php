<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostPayment;
use App\Models\PostPurchase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPurchaseController extends Controller
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
        return view($this->directory.'.post_purchase.index');
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
            $purchase = PostPurchase::create($request->all());
            if($request->amount_charged > 0)
            {
                PostPayment::create([
                    'amount' => $request->amount_charged,
                    'post_id' => $request->post_id,
                    'post_purchase_id' => $purchase->id,
                    'user_id' => Auth::user()->id,
                ]);
                Auth::user()->update([
                    'cash_wallet' => Auth::user()->cash_wallet - $request->amount_charged
                ]);
            }
            toastr()->success('Post Purchase is Created Successfully');
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
     * @param  \App\Models\PostPurchase  $postPurchase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post->user_id == Auth::user()->id)
        {
            toastr()->warning("Its your post. System not allowed to purchase own post.");
            return redirect()->to(route('user.dashboard.index'));
        }
        return view($this->directory.'.post_purchase.create',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostPurchase  $postPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(PostPurchase $postPurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostPurchase  $postPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostPurchase $postPurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostPurchase  $postPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostPurchase $postPurchase)
    {
        //
    }
}
