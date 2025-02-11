<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Special;
use App\Models\Type;
use App\Models\User;
use App\Models\UserFaq;
use App\Models\UserMainSection;
use App\Models\UserReview;
use App\Models\UserSpecial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function showCategory(Request $request)
    {
        if($request->keyword)
        {
            $categories = Category::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $categories = Category::orderBy('name','ASC')->paginate(12);
        }
        return view('front.category.index',compact('categories'));
    }
    public function showCategoryDetails($name)
    {
        $category = Category::where('name',str_replace('_', ' ',$name))->first();
        $brands = Brand::where('category_id',$category->id)->orderBy('name','ASC')->paginate(12);
        return view('front.category.show',compact('category','brands'));
    }
    public function home(Request $request)
    {
        if($request->keyword)
        {
            return redirect()->to(url('products?keyword='.$request->keyword));
            // $products = Product::where('name', 'LIKE', '%'.$request->keyword.'%')->where('show_on_home',1)->orderBy('created_at','DESC')->get();
        }else{
            $products = Product::where('show_on_home',1)->orderBy('created_at','DESC')->get();
        }
        $user_products = Product::whereNotNull('user_id')->latest()->get()->take(12);
        $new_products = Product::latest()->get()->take(8);
        $posts = Post::latest()->get()->take(8);
        $serviceTypeUsers = User::whereNotNull('type_id')->whereNotNull('service_id')->latest()->get()->take(8);
        if(Setting::productCategory())
            $product_category = Category::find(Setting::productCategory());
        else 
            $product_category = Category::first();
        $service_category = Service::find(Setting::serviceCategory());
        $post_category = PostCategory::find(Setting::postCategory());
        $countries = Country::select('countries.*')
                    ->join('users', 'countries.id', 'users.country_id')
                    ->groupBy('users.country_id')
                    ->get()->take(12);
        
        $cities = City::select('cities.*')
                    ->join('users', 'cities.id', 'users.city_id')
                    ->groupBy('users.city_id')
                    ->get()->take(12);
        return view('front.home.index',compact('products','user_products','product_category','service_category','post_category','countries','cities','new_products','serviceTypeUsers','posts'));
    }
    public function search_user(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->user.'%')->get()->take(4);
        $html = "";
        if($users->count() > 0)
        {
            $html = view('front.home.partials.user_detail', compact('users'))->render();
        }
        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'success',
        ]);
    }
    public function search_brand(Request $request)
    {
        $brands = Brand::where('name', 'LIKE', '%'.$request->brand.'%')->get()->take(4);
        $html = "";
        if($brands->count() > 0)
        {
            $html = view('front.city.partials.brand_detail', compact('brands'))->render();
        }
        return response()->json([
            'status' => true,
            'html' => $html,
            'message' => 'success',
        ]);
    }
    public function showBrands(Request $request)
    {
        if($request->keyword)
        {
            $brands = Brand::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $brands = Brand::orderBy('name','ASC')->paginate(12);
        }
        return view('front.brand.index',compact('brands'));
    }
    public function showBrandDetails($name)
    {
        $brand = Brand::where('name',str_replace('_', ' ',$name))->first();
        $products = Product::where('brand_id',$brand->id)->paginate(12);
        return view('front.brand.show',compact('brand','products'));
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
                        ->join('products', 'cities.id', 'products.city_id')
                        ->groupBy('products.city_id')
                        ->paginate(12);
        }
        return view('front.city.index',compact('cities'));
    }
    public function showCityDetails($name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$name))->first();
        if($request->keyword)
        {
            $products = Product::where('city_id',$city->id)->paginate(12);
            $brand_ids = Product::where('city_id',$city->id)->get()->pluck('brand_id')->toArray();
            $brand_ids = array_unique($brand_ids);
            $brands = Brand::whereIn('id',$brand_ids)->where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);;
            // $brands_id = Brand::where('name', 'LIKE', '%'.$request->keyword.'%')->get()->pluck('id')->toArray();
            // $products = Product::where('city_id',$city->id)->whereIn('brand_id',$brands_id)->paginate(12);
        }else{
            $products = Product::where('city_id',$city->id)->paginate(12);
            $brand_ids = Product::where('city_id',$city->id)->get()->pluck('brand_id')->toArray();
            $brand_ids = array_unique($brand_ids);
            $brands = Brand::whereIn('id',$brand_ids)->orderBy('name','ASC')->paginate(12);;
        }
        return view('front.city.show',compact('city','products','brands'));
    }
    public function showProductCityDetails($brand_name,$city_name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$city_name))->first();
        $brand = Brand::where('name',str_replace('_', ' ',$brand_name))->first();
        if($request->keyword)
        {
            
            $products = Product::where('name', 'LIKE', '%'.$request->keyword.'%')->where('city_id',$city->id)->where('brand_id',$brand->id)->paginate(12);
        }else{
            $products = Product::where('city_id',$city->id)->where('brand_id',$brand->id)->paginate(12);
        }
        return view('front.city.city_show',compact('products','city','brand'));
    }
    public function showCountries(Request $request)
    {
        if($request->keyword)
        {
            $countries = Country::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(12);
        }
        else{
            
            $countries = Country::select('countries.*')
                        ->join('products', 'countries.id', 'products.country_id')
                        ->groupBy('products.country_id')
                        ->paginate(12);
        }
        return view('front.country.index',compact('countries'));
    }
    public function showCountryDetails($name)
    {
        $country = Country::where('name',str_replace('_', ' ',$name))->first();
        $cities = City::select('cities.*')
            ->join('products', 'cities.id', 'products.city_id')
            ->where('cities.country_id',$country->id)
            ->groupBy('products.city_id')
            ->paginate(12);
        $products = Product::where('country_id',$country->id)->paginate(12);
        return view('front.country.show',compact('country','products','cities'));
    }
    public function showProducts(Request $request)
    {
        
        if($request->name)
        {
            $products = Product::where('name', 'LIKE', '%'.$request->name.'%')->where('category_id',$request->category_id)
            ->where('brand_id',$request->brand_id)->paginate(12);
        }elseif($request->keyword)
        {
            $products = Product::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(12);
        }
        else{
            $products = Product::latest()->paginate(12);
        }
        return view('front.product.index',compact('products'));
    }
    public function showProductDetails($uuid)
    {
        $product = Product::where('uuid',$uuid)->first();
        // $related_products = Product::where('category_id',$product->category_id)->get();
        // if($related_products->count() == 0)
        // {
            $related_products = Product::where('show_on_home',1)->orderBy('created_at','DESC')->get();
        // }
        if(!$product->view)
        {
            $product->update([
                'view' => 0
            ]);
        }
        $product->update([
           'view' => $product->view+1
        ]);
        $imagehtml = '';
        foreach($product->images as $image_key => $image)
        {
            $imagehtml .= '{src: "{{asset('.$image->image.')}}" },';
        }
        return view('front.product.show',compact('product','related_products','imagehtml'));
    }
    public function getProductBrands(Request $request)
    {
        if($request->id == 'all'){
            $brands = Brand::all();
        } else {
            $brands = Category::find($request->id)->brands;
        }
        return response()->json($brands);
    }
    public function showProductUserDetails($id)
    {
        $user = User::find($id);
        $user->update([
           'view' => $user->view+1
        ]);
        $brandIds = Product::where('user_id',$user->id)->get()->pluck('brand_id')->toArray();
        $brands = Brand::whereIn('id',$brandIds)->get()->take(4);
        $allProducts = Product::whereNull('user_id')->orderBy('created_at','DESC')->get()->take(8);
        $products = Product::where('user_id',$user->id)->orderBy('created_at','DESC')->get()->take(8);
        $singleProduct = Product::where('user_id',$user->id)->orderBy('created_at','DESC')->first();
        $events = Event::where('user_id',$user->id)->orderBy('created_at','DESC')->get()->take(3);
        $specials = Special::where('user_id',$user->id)->get()->take(5);
        $userSpecials = UserSpecial::where('user_id',$user->id)->get()->take(4);
        $userMainSections = UserMainSection::where('user_id',$user->id)->get()->take(4);
        $userFaqs = UserFaq::where('user_id',$user->id)->get()->take(6);
        if(Helper::dashboard() == 'adminty-user'){
            return view('front.product.adminty-user',compact('user','brands','products','events','userSpecials','specials','userMainSections','singleProduct','allProducts','userFaqs'));
        }else{
            return view('front.product.user',compact('user','brands','products'));
        }
    }
    public function showProductLike($id)
    {
        $product = Product::find($id);
        $product->update([
            'like' => $product->like + 1
        ]);
        return back();
    }
    public function showProductDisLike($id)
    {
        $product = Product::find($id);
        $product->update([
            'dislike' => $product->dislike + 1
        ]);
        return back();
    }
    public function check_refferral_code(Request $request)
    {
        $user = User::where('code',$request->code)->first();
        if($user)
        {
            return response()->json([
                'status' => true,
                'message' => $user->name." user attached.",
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No User Found',
            ]);

        }

    }
    public function storeUserReview(Request $request)
    {
        UserReview::create($request->all());
        toastr()->success('User Review is Created Successfully');
        return redirect()->back();
    }
}
