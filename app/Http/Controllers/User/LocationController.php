<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.location.index');
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
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $location = Location::find($id);
        $location->update([
            'lat' => $request->lat,
            'long' => $request->long, 
            'responsed_at' => Carbon::now(), 
        ]);
        return response('Success',200);
    }
    public function location_update(Request $request)
    {
        $location = Location::find($request->location_id);
        $location->update([
            'lat' => $request->lat,
            'long' => $request->long, 
            'responsed_at' => Carbon::now(), 
        ]);
        toastr()->success('Location Updated Successfully');
        return response('Success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $location = Location::find($id);
        $location->delete();
        toastr()->success('Location Deleted Successfully');
        return redirect()->back();
    }
    public function requestLocation($id)
    {
        Location::create([
            'receiver_id' => $id,
            'sender_id' => Auth::user()->id,
        ]);
        toastr()->success('Location Request Send to User Successfully');
        return back();
    }
}
