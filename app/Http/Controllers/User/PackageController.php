<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
  public $directory;
  public function __construct(){
      $this->directory = Helper::dashboard();
  }
    public function payment($id)
    {
      $package = Package::find($id);
      return view($this->directory.'.package.payment')->with('package',$package);
    }
    public function index()
    {
      return view($this->directory.'.package.index');
    }
    public function history()
    {
      return view($this->directory.'.package.history');
    }
}
