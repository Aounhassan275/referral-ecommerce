<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\PostBrand;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostFrontendController extends Controller
{
    
    public function showCategory(Request $request)
    {
        if($request->keyword)
        {
            $categories = PostCategory::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $categories = PostCategory::orderBy('name','ASC')->paginate(12);
        }
        return view('front.post_category.index',compact('categories'));
    }
    public function showCategoryDetails($name)
    {
        $category = PostCategory::where('name',str_replace('_', ' ',$name))->first();
        $brands = PostBrand::where('post_category_id',$category->id)->orderBy('name','ASC')->paginate(12);
        return view('front.post_category.show',compact('category','brands'));
    }
    
    public function showBrands(Request $request)
    {
        if($request->keyword)
        {
            $brands = PostBrand::where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);
        }
        else{
            $brands = PostBrand::orderBy('name','ASC')->paginate(12);
        }
        return view('front.post_brand.index',compact('brands'));
    }
    public function showBrandDetails($name)
    {
        $brand = PostBrand::where('name',str_replace('_', ' ',$name))->first();
        $posts = Post::where('post_brand_id',$brand->id)->paginate(12);
        return view('front.post_brand.show',compact('brand','posts'));
    }
    public function showPosts(Request $request)
    {
        if($request->keyword)
        {
            $posts = Post::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(12);
        }
        else{
            $posts = Post::latest()->paginate(12);
        }
        return view('front.post.index',compact('posts'));
    }
    public function showPostDetails($name)
    {
        $post = Post::where('name',str_replace('_', ' ',$name))->first();
        return view('front.post.show',compact('post'));
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
                        ->join('posts', 'cities.id', 'posts.city_id')
                        ->groupBy('posts.city_id')
                        ->paginate(12);
        }
        return view('front.post_city.index',compact('cities'));
    }
    public function showCityDetails($name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$name))->first();
        if($request->keyword)
        {
            
            $brand_ids = Post::where('city_id',$city->id)->get()->pluck('post_brand_id')->toArray();
            $brand_ids = array_unique($brand_ids);
            $brands = PostBrand::whereIn('id',$brand_ids)->where('name', 'LIKE', '%'.$request->keyword.'%')->orderBy('name','ASC')->paginate(12);;
            // $brands_id = Brand::where('name', 'LIKE', '%'.$request->keyword.'%')->get()->pluck('id')->toArray();
            // $products = Product::where('city_id',$city->id)->whereIn('brand_id',$brands_id)->paginate(12);
        }else{
            $posts = Post::where('city_id',$city->id)->paginate(12);
            $brand_ids = Post::where('city_id',$city->id)->get()->pluck('post_brand_id')->toArray();
            $brand_ids = array_unique($brand_ids);
            $brands = PostBrand::whereIn('id',$brand_ids)->orderBy('name','ASC')->paginate(12);;
        }
        return view('front.post_city.show',compact('city','posts','brands'));
    }
    public function showProductCityDetails($brand_name,$city_name,Request $request)
    {
        $city = City::where('name',str_replace('_', ' ',$city_name))->first();
        $brand = PostBrand::where('name',str_replace('_', ' ',$brand_name))->first();
        if($request->keyword)
        {   
            $posts = Post::where('name', 'LIKE', '%'.$request->keyword.'%')->where('city_id',$city->id)->where('post_brand_id',$brand->id)->paginate(12);
        }else{
            $posts = Post::where('city_id',$city->id)->where('post_brand_id',$brand->id)->paginate(12);
        }
        return view('front.post_city.city_show',compact('posts','city','brand'));
    }
    public function showCountries(Request $request)
    {
        if($request->keyword)
        {
            $countries = Country::where('name', 'LIKE', '%'.$request->keyword.'%')->paginate(12);
        }
        else{
            
            $countries = Country::select('countries.*')
                        ->join('posts', 'countries.id', 'posts.country_id')
                        ->groupBy('posts.country_id')
                        ->paginate(12);
        }
        return view('front.post_country.index',compact('countries'));
    }
    public function showCountryDetails($name)
    {
        $country = Country::where('name',str_replace('_', ' ',$name))->first();
        $cities = City::select('cities.*')
            ->join('posts', 'cities.id', 'posts.city_id')
            ->where('cities.country_id',$country->id)
            ->groupBy('posts.city_id')
            ->paginate(12);
        $posts = Post::where('country_id',$country->id)->paginate(12);
        return view('front.post_country.show',compact('country','posts','cities'));
    }
}
