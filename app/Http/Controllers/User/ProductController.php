<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\CompanyAccount;
use App\Models\Country;
use App\Models\Earning;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.product.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        try{
            Validator::make($request->all(),[
                'name' => 'required|unique:products',
                'price' => 'required|numeric'
            ],[
                'price.numeric' => 'Price must be numeric.',
            ]);
            if($user->package)
            {
                if($user->checkLimitForProducts() == false && Setting::enablepurchase() == 1)
                {
                    $amount = $request->price;
                    if($user->cash_wallet >= $amount)
                    {
                        $user->update([
                            'cash_wallet' => $user->cash_wallet - $amount,
                        ]);
                        $company_account= CompanyAccount::find(1);
                        $company_account->update([
                            'balance' => $company_account->balance + $amount,
                        ]);
                    }else{
                        toastr()->error('Insufficent amount in Cash Wallet!');
                        return redirect()->back();
                    }
                }   
            }else{
                if(Setting::enablepurchase() == 1)
                {

                    $amount = $request->price + Setting::productFee();
                    if($user->cash_wallet >= $amount)
                    {
                        $user->update([
                            'cash_wallet' => $user->cash_wallet - $amount,
                        ]);
                        $company_account= CompanyAccount::find(1);
                        $company_account->update([
                            'balance' => $company_account->balance + $amount,
                        ]);
                    }else{
                        toastr()->error('Insufficent amount in Cash Wallet!');
                        return redirect()->back();
                    }

                }else{
                    $amount = Setting::productFee();
                    if($user->cash_wallet >= $amount)
                    {
                        $user->update([
                            'cash_wallet' => $user->cash_wallet - $amount,
                        ]);
                        $direct_refferral = $amount/2;
                        $company = $amount/2;
                        $company_account= CompanyAccount::find(1);
                        $company_account->update([
                            'balance' => $company_account->balance + $company,
                        ]);
                        if($user->refer_by)
                        {
                            $refer_by = User::find($user->refer_by);
                            Earning::create([
                                'price' => $direct_refferral,
                                'user_id' => $refer_by->id,
                                'due_to' => $user->id,
                                'type' => 'trade_income'
                            ]);
                            if($refer_by->salary_type == 1)
                            {
                                $refer_by->update([
                                    'cash_wallet' => $refer_by->cash_wallet + $direct_refferral,
                                ]);
                            }else if($refer_by->salary_type == 3)
                            {
                                $salary_account= CompanyAccount::find(1);
                                $salary_account->update([
                                    'balance' => $salary_account->balance + $direct_refferral,
                                ]);
                                info("Direct Income Transfer Successfully to Salary Account");
                            }
                            else{
                                $refer_by->update([
                                    'total_income' => $refer_by->total_income + $direct_refferral,
                                ]);
                            }
                        }else{
                            $company_account->update([
                                'balance' => $company_account->balance + $direct_refferral,
                            ]);
                        }

                    }else{
                        toastr()->error('Insufficent amount in Cash Wallet!');
                        return redirect()->back();
                    }
                }
            }
            $request->merge([
                'uuid' => Str::uuid()
            ]);
            $product = Product::create($request->all());
            foreach($request->images as $key => $image)
            {
                if($key < 10)
                {
                    ProductImage::create([
                        'image' => $image,
                        'product_id' => $product->id
                    ]);
                }
            }
            toastr()->success('Product is Created Successfully');
            return redirect()->back();
		} catch (\Exception $e) 
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function productCreateThroughOther($id)
    {
        $user = Auth::user();
        if(!$user->country_id || !$user->city_id )
        {
            toastr()->error('Please Add City Or Country in Profile Page!');
            return redirect(route('user.user.index'));
        }
        $product = Product::find($id);
        if($user->package)
        {
            if($user->checkLimitForProducts() == false && Setting::enablepurchase() == 1)
            {
                $amount = $product->price;
                if($user->cash_wallet >= $amount)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet - $amount,
                    ]);
                    $company_account= CompanyAccount::find(1);
                    $company_account->update([
                        'balance' => $company_account->balance + $amount,
                    ]);
                }else{
                    toastr()->error('Insufficent amount in Cash Wallet!');
                    return redirect()->back();
                }
            }   
        }else{
            if(Setting::enablepurchase() == 1)
            {

                $amount = $product->price + Setting::productFee();
                if($user->cash_wallet >= $amount)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet - $amount,
                    ]);
                    $company_account= CompanyAccount::find(1);
                    $company_account->update([
                        'balance' => $company_account->balance + $amount,
                    ]);
                }else{
                    toastr()->error('Insufficent amount in Cash Wallet!');
                    return redirect()->back();
                }

            }else{
                $amount = Setting::productFee();
                if($user->cash_wallet >= $amount)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet - $amount,
                    ]);
                    $company_account= CompanyAccount::find(1);
                    $company_account->update([
                        'balance' => $company_account->balance + $amount,
                    ]);
                }else{
                    toastr()->error('Insufficent amount in Cash Wallet!');
                    return redirect()->back();
                }
            }
        }
        $new_product = Product::create([
            'name' => $product->name, 
            'price' => $product->price, 
            'phone' => $user->phone, 
            'description' => @$product->description, 
            'category_id' => @$product->category_id, 
            'brand_id' => @$product->brand_id, 
            'country_id' => @$user->country_id, 
            'city_id' => @$user->city_id, 
            'user_id' => @$user->id, 
            'uuid' => Str::uuid(), 
        ]);
        toastr()->success('Product is Created Successfully');
        return redirect(route('admin.product.edit',$new_product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('user.product.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        toastr()->success('Product Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product = Product::find($id);
        $product->delete();
        toastr()->success('Prodct Deleted Successfully');
        return redirect()->back();
    }
    public function getCategoryBrand(Request $request)
    {
        if($request->id == 'all'){
            $brands = Brand::all();
        } else {
            $brands = Category::find($request->id)->brands;
        }
        
        return response()->json($brands);
    }
    public function getCountryCities(Request $request)
    {
        $html = "";
        if($request->id == 'all'){
            $cities = City::orderBy('name','ASC')->get();
        } else {
            $country = Country::find($request->id);
            $code = $country->code;
            $html .= '<a href="https://www.google.com/search?q='.$code.'+to+usd+calculator" target="_blank"><span class="badge badge-success">Convert '.$code.' to USD</span>';
            // $cities = $country->cities->orderBy('name','ASC');
            $cities = City::where('country_id',$country->id)->orderBy('name','ASC')->get();
        }
        return response([
            'cities' => $cities,
            'html' => $html
        ]);
        // return response()->json($cities);
    }
    
    public function showProducts()
    {
        $products = Product::orderBy('display_order')->paginate(30);
        return view('user.product.view',compact('products'));
    }
    public function showProductDetails($name)
    {
        $product = Product::where('name',str_replace('_', ' ',$name))->first();
        return view('user.product.show',compact('product'));
    }
    public function orderProducts($id)
    {
        $product = Product::find($id);
        if($product->user_id == Auth::user()->id)
        {
            toastr()->error('You are the owner of this Product!');
            return back();
        }
        return view('user.order.create',compact('product'));
    }
}
