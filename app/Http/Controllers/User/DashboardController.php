<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    public function index()
    {
        // foreach(Auth::user()->directParentsForDirectIncome() as  $direcUser){
        //     if($)
        //     $direcUser->update([
        //         'name' => 'atifalikhan123'
        //     ]);
        // }
        dd(Auth::user()->directParentsForDirectIncome()); 
        if(Setting::dashboard() == '1')
        {
            return view($this->directory.'.dashboard.index_new');
        }else{
            return view($this->directory.'.dashboard.index');
        }
    }
}
