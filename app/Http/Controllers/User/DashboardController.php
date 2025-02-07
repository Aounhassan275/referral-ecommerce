<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $directory;
    public function __construct(){
        $this->directory = Helper::dashboard();
    }
    public function index()
    {
        return view($this->directory.'.dashboard.index');
    }
}
