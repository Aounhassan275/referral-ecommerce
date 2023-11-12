<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\City;
use App\Models\Country;
use App\Models\Service;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceFrontendController extends Controller
{
    public function showService(Request $request)
    {
        if($request->name)
        {
            $users = User::where('name', 'LIKE', '%'.$request->name.'%')->where('service_id',$request->service_id)
            ->where('type_id',$request->type_id)->orderBy('created_at','DESC')->paginate(12);
        }elseif($request->keyword)
        {
            $users = User::where('name', 'LIKE', '%'.$request->keyword.'%')->orWhere('phone', 'LIKE', '%'.$request->keyword.'%')->orderBy('created_at','DESC')->paginate(12);
        }
        else{
            $users = User::whereNotNull('service_id')->whereNotNull('type_id')->orderBy('created_at','DESC')->paginate(12);
        }
        return view('front.service.index',compact('users'));
    }
    
    public function showServiceDetails($id)
    {
        $user = User::find($id);
        $user->update([
           'view' => $user->view+1
        ]);
        return view('front.product.user',compact('user'));
    }
    public function getServiceTypes(Request $request)
    {
        
        if($request->id == 'all'){
            $types = Type::all();
        } else {
            $types = Service::find($request->id)->types;
        }
        
        return response()->json($types);
    }
    public function showCities(Request $request)
    {   
        if($request->keyword)
        {
            $cities = City::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            // $cities = City::paginate(12);
            $cities = City::select('cities.*')
                        ->join('users', 'cities.id', 'users.city_id')
                        ->groupBy('users.city_id')
                        ->paginate(12);
        }
        return view('front.service_city.index',compact('cities'));
    }
    public function showCityDetails($name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$name))->first();
        if($request->keyword)
        {
            $type_ids = User::where('city_id',$city->id)->get()->pluck('type_id')->toArray();
            $type_ids = array_unique($type_ids);
            $types = Type::whereIn('id',$type_ids)->where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }else{
            
            $type_ids = User::where('city_id',$city->id)->get()->pluck('type_id')->toArray();
            $type_ids = array_unique($type_ids);
            $types = Type::whereIn('id',$type_ids)->orderBy('name','ASC')->paginate(12);      
        }
        return view('front.service_city.show',compact('city','types'));
    }
    public function showServiceCityDetails($type_name,$city_name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$city_name))->first();
        $type = Type::where('name',str_replace('_', ' ',$type_name))->first();
        if($request->keyword)
        {   
            $users = User::where('name', 'LIKE', '%'.$request->keyword.'%')->where('city_id',$city->id)->where('type_id',$type->id)->paginate(12);
        }else{
            $users = User::where('city_id',$city->id)->where('type_id',$type->id)->paginate(12);
        }
        return view('front.service_city.show_city',compact('users','city','type'));
    }
    public function search_service_type(Request $request)
    {
        $types = Type::where('name', 'LIKE', '%'.$request->brand.'%')->get()->take(4);
        $html = "";
        if($types->count() > 0)
        {
            $html = view('front.service_city.partials.service_type_detail', compact('types'))->render();
        }
        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'success',
        ]);
    }
    public function showCountries(Request $request)
    {
        if($request->keyword)
        {
            $countries = Country::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(12);
        }
        else{
            
            $countries = Country::select('countries.*')
                        ->join('users', 'countries.id', 'users.country_id')
                        ->groupBy('users.country_id')
                        ->paginate(12);
        }
        return view('front.service_country.index',compact('countries'));
    }
    public function showCountryDetails($name)
    {
        $country = Country::where('name',str_replace('_', ' ',$name))->first();
        $cities = City::select('cities.*')
            ->join('users', 'cities.id', 'users.city_id')
            ->where('cities.country_id',$country->id)
            ->groupBy('users.city_id')
            ->paginate(12);
        return view('front.service_country.show',compact('country','cities'));
    }
    public function showServices(Request $request)
    {
        if($request->keyword)
        {
            $services = Service::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $services = Service::orderBy('name','ASC')->paginate(12);
        }
        return view('front.services.index',compact('services'));
    }
    public function showServicesDetails($name)
    {
        $service = Service::where('name',str_replace('_', ' ',$name))->first();
        $types = Type::where('service_id',$service->id)->orderBy('name','ASC')->paginate(12);
        return view('front.services.show',compact('service','types'));
    }
    public function showServiceTypes(Request $request)
    {
        if($request->keyword)
        {
            $types = Type::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $types = Type::orderBy('name','ASC')->paginate(12);
        }
        return view('front.service_type.index',compact('types'));
    }
    public function showServiceTypeDetails($name)
    {
        $type = Type::where('name',str_replace('_', ' ',$name))->first();
        $users = User::where('type_id',$type->id)->paginate(12);
        return view('front.service_type.show',compact('type','users'));
    }
}
