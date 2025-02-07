<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Exception;
use Illuminate\Http\Request;

class PostImageController extends Controller
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
            PostImage::create($request->all());
            toastr()->success('Post Image is Created Successfully');
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
     * @param  \App\Models\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function show(PostImage $postImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PostImage $postImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostImage $postImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostImage  $postImage
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $postImage = PostImage::find($id);
        $postImage->delete();
        toastr()->success('Post Image Deleted Successfully');
        return redirect()->back();
    }
}
