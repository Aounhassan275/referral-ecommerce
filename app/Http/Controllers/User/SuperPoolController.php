<?php

namespace App\Http\Controllers\User;

use App\Helpers\AutoPoolForPackage;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SuperPool;
use App\Models\SuperPoolTree;
use App\Models\User;
use Illuminate\Http\Request;

class SuperPoolController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    public function index()
    {
        $super_pools = SuperPool::orderBy('price','asc')->get()->toArray();
        return view($this->directory.'.super_pool.index',compact('super_pools'));
    }

    public function show($id)
    {
        $super_pool = SuperPool::find($id);
        return view($this->directory.'.super_pool.detail',compact('super_pool'));
    }
    public function getTree(Request $request)
    {
        try {
            $user = User::find($request->id);
            $refferral = SuperPoolTree::where('super_pool_id',$request->super_pool_id)->where('user_id',$user->id)->first();
            
            $left = null;
            $right = null;
            $left_refferral = null;
            $right_refferral = null;
            if($refferral && $refferral->left_refferral)
            {
                $left = User::find($refferral->left_refferral);
                $left_refferral = SuperPoolTree::where('super_pool_id',$request->super_pool_id)->where('user_id',$left->id)->first();
            }
            if($refferral && $refferral->right_refferral)
            {
                $right = User::find($refferral->right_refferral);
                $right_refferral = SuperPoolTree::where('super_pool_id',$request->super_pool_id)->where('user_id',$right->id)->first();
            }
            $html = view($this->directory.'.super_pool.partials.tree', compact('user','left','right','left_refferral','right_refferral'))->render();
            return response([
                'html' => $html,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
