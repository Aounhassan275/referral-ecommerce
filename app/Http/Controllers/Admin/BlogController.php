<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:blogs',
            'images' => 'required|array',
            'description' => 'required',
        ]);
        
        if($validator->fails()){
            toastr()->error('Blog name or url already exists');
            return redirect()->back();
        }
        $blog = Blog::create($request->all());
        foreach($request->images as $image)
        {
            BlogImage::create([
                'image' => $image,
                'blog_id' => $blog->id
            ]);
        }
        toastr()->success('Blog is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit')->with('blog',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blog = Blog::find($id);
        $blog->update($request->all());
        toastr()->success('Blog Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        toastr()->success('Blog Deleted Successfully');
        return redirect()->back();
    }
}
