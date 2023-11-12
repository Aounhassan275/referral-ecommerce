<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostBrand;
use Illuminate\Http\Request;

class PostBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post_brand.index');
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
        PostBrand::create($request->all());
        toastr()->success('Post Brand is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostBrand  $postBrand
     * @return \Illuminate\Http\Response
     */
    public function show(PostBrand $postBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostBrand  $postBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(PostBrand $postBrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostBrand  $postBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $brand = PostBrand::find($id);
        $brand->update($request->all());
        toastr()->success('Brand Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostBrand  $postBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = PostBrand::find($id);
        $brand->delete();
        toastr()->success('Brand Deleted Successfully');
        return redirect()->back();
    }
}
