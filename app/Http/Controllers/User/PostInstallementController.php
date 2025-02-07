<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\PostInstallement;
use Exception;
use Illuminate\Http\Request;

class PostInstallementController extends Controller
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
        //
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
            $alreadyHave = PostInstallement::where('post_id',$request->post_id)
                        ->where('duration',$request->duration)->first();
            if($alreadyHave)
            {
                toastr()->error("Already have this setup.");
                return redirect()->back();
            }
            PostInstallement::create($request->all());
            toastr()->success('Post Installment is Created Successfully');
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
     * @param  \App\Models\PostInstallement  $postInstallement
     * @return \Illuminate\Http\Response
     */
    public function show(PostInstallement $postInstallement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostInstallement  $postInstallement
     * @return \Illuminate\Http\Response
     */
    public function edit(PostInstallement $postInstallement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostInstallement  $postInstallement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostInstallement $postInstallement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostInstallement  $postInstallement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $postInstallement = PostInstallement::find($id);
        $postInstallement->delete();
        toastr()->success('Post Installemnt Deleted Successfully');
        return redirect()->back();
    }
}
