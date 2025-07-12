<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    public function index()
    {
        // if(Setting::dashboard() == '1')
        // {
            return view($this->directory.'.dashboard.index_new');
        // }else{
        //     return view($this->directory.'.dashboard.index');
        // }
    }
}
