<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MartialStatus;
use Illuminate\Http\Request;

class MartialStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.martial_status.index');
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
        MartialStatus::create($request->all());
        toastr()->success('Martial Status is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MartialStatus  $martialStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MartialStatus $martialStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MartialStatus  $martialStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MartialStatus $martialStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MartialStatus  $martialStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $martialStatus = MartialStatus::find($id);
        $martialStatus->update($request->all());
        toastr()->success('Martial Status Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MartialStatus  $martialStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $martialStatus = MartialStatus::find($id);
        $martialStatus->delete();
        toastr()->success('Martial Status Deleted Successfully');
        return redirect()->back();
    }
}
