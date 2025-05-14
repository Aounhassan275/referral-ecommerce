<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogTagController extends Controller
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
            'name' => 'required'
        ]);
        if($validator->fails()){
            toastr()->error('Add Tag Please.');
            return redirect()->back();
        }
        BlogTag::create($request->all());
        toastr()->success('Blog Tag is Created Successfully');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogTag $blogTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogTag $blogTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogTag $blogTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $blogTag = BlogTag::find($id);
        $blogTag->delete();
        toastr()->success('Blog Tag Deleted Successfully');
        return redirect()->back();
    }
}
