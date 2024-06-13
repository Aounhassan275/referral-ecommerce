<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
      return view('admin.user.index');
    }
    public function active()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
      return view('admin.user.active');
    }
    public function pending()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
      return view('admin.user.pending');
    }
    public function email_verification()
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
      return view('admin.user.email_verification');
    }
    public function showDetail($id)
    {
        if(Auth::user()->type == 2) 
        {
            toastr()->warning('You dont have access');
            return redirect()->route('admin.dashboard.index');
        }
      $user = User::find($id);
      $placement = User::where('referral',$user->id)->get();
      return view('admin.user.detail',compact('user','placement'));
    }
    public function delete($id){
      User::find($id)->delete();
      toastr()->success('User  is Deleted Successfully');
      return redirect()->route('admin.user.index');
    }
    public function activation($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => 'active',
        ]);     
        toastr()->success('User is active Now');
        return redirect()->back();
    } 
    public function block($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => 'block',
        ]);     
        toastr()->success('User is block Now');
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        if($request->password)
        {
            $user->update([
                'password' => $request->password,
                'temp_password' => $request->password
            ]);
        }
        $request->merge([
            'email_verified' => $request->email_verified?1:0,
            'fund_fee_deduction' => $request->fund_fee_deduction?1:0,
        ]);
        $user->update($request->except('password'));
        toastr()->success('User is Updated Successfully');
        return redirect()->back();
    }
    public function fakeLogin(User $user)
    {
        // Auth::logout();
        Auth::guard('user')->login($user);
        request()->session()->put('cash_wallet', $user->cash_wallet);
        request()->session()->put('name', $user->name);
        request()->session()->put('user_id', $user->id);
        return redirect()->route('user.dashboard.index');
    }
    public function user_view($id)
    {
        if($id == 1)
        {
            $users = User::where('type','Team Head')->get();
            $type = 'Team Head';
        }elseif($id == 2)
        {
            $users = User::where('type','Regional Manager')->get();
            $type = 'Regional Manager';
        }elseif($id == 3)
        {
            $users = User::where('type','Zonal Manager')->get();
            $type = 'Zonal Manager';
        }elseif($id == 4)
        {
            $users = User::where('type','Area Manager')->get();
            $type = 'Area Manager';
        }elseif($id == 5)
        {
            $users = User::where('type','Field Manager')->get();
            $type = 'Field Manager';
        }else{
            $users = User::where('type','Member')->get();
            $type = 'Member';
        }
        return view('admin.user.user_view',compact('users','type'));
    }
}
