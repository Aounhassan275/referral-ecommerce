<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'image' => 'required'
        ]);
        if($validator->fails()){
            toastr()->error('Add Image Please.');
            return redirect()->back();
        }
        BlogImage::create($request->all());
        toastr()->success('Blog Image is Created Successfully');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogImage $blogImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogImage $blogImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogImage $blogImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $blogImage = BlogImage::find($id);
        $blogImage->delete();
        toastr()->success('Blog Image Deleted Successfully');
        return redirect()->back();
    }
}
