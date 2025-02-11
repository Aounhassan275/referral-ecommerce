<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSpecial;
use Exception;
use Illuminate\Http\Request;

class UserSpecialController extends Controller
{
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
            UserSpecial::create($request->all());
            toastr()->success('User Special is Created Successfully');
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
     * @param  \App\Models\UserSpecial  $userSpecial
     * @return \Illuminate\Http\Response
     */
    public function show(UserSpecial $userSpecial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSpecial  $userSpecial
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSpecial $userSpecial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSpecial  $userSpecial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $userSpecial = UserSpecial::find($id);
            $userSpecial->update($request->all());
            toastr()->success('User Special is Updated Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSpecial  $userSpecial
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSpecial $userSpecial)
    {
        //
    }
}
