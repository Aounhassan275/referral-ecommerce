<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuperPool;
use Illuminate\Http\Request;

class SuperPoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.super_pool.index');
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
        SuperPool::create($request->all());
        toastr()->success('Super Pool is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SuperPool $superPool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperPool  $superPool
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperPool $superPool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuperPool  $superPool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $superPool = SuperPool::find($id);
        $superPool->update($request->all());
        toastr()->success('Super Pool Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperPool  $superPool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superPool = SuperPool::find($id);
        $superPool->delete();
        toastr()->success('Super Pool Deleted Successfully');
        return redirect()->back();
    }
}
