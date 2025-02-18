<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CompanyAccount;
use App\Models\Post;
use App\Models\PostInstallement;
use App\Models\PostCategory;
use App\Models\PostImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
        return view($this->directory.'.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->directory.'.post.create');
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
            $validator = Validator::make($request->all(),[
                'name' => 'required|unique:posts'
            ]);
            
            if($validator->fails()){
                toastr()->error('Post Name already exists');
                return redirect()->back();
            }   
            if(Auth::user()->cash_wallet >= 1)
            {
                Auth::user()->update([
                    'cash_wallet' => Auth::user()->cash_wallet - 1,
                ]);
                $company_account= CompanyAccount::find(1);
                $company_account->update([
                    'balance' => $company_account->balance + 1,
                ]);
            }else{
                toastr()->error('Insufficent amount in Cash Wallet!');
                return back();
            }
            $post = Post::create($request->all());
            foreach($request->images as $image)
            {
                PostImage::create([
                    'image' => $image,
                    'post_id' => $post->id
                ]);
            }
            toastr()->success('Post is Created Successfully');
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view($this->directory.'.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view($this->directory.'.post.edit')->with('post',$post);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        toastr()->success('Post Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post = Post::find($id);
        $post->delete();
        toastr()->success('Post Deleted Successfully');
        return redirect()->back();
    }
    public function getCategoryBrand(Request $request)
    {
        $brands = PostCategory::find($request->id)->brands;
        return response()->json($brands);
    }
    public function getPostInstallement($id)
    {
        $post = Post::find($id);
        $installements = PostInstallement::where('post_id',$id)->get();
        return view($this->directory.'.post.installement',compact('installements','post'));
    }
}
