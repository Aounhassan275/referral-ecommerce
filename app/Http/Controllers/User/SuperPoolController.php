<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SuperPool;
use Illuminate\Http\Request;

class SuperPoolController extends Controller
{
    public function index()
    {
        $super_pools = SuperPool::orderBy('price','asc')->get()->toArray();
        return view('user.super_pool.index',compact('super_pools'));
    }
}
