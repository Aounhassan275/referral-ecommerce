@extends('user.layout.index')
@section('title')
Add Products to Store
@endsection
@section('contents')
@if(Auth::user()->package)
@if(Auth::user()->checkLimitForProducts() == false)
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Oh!</span> 
            Your Limit For Adding Products / Stocks is Completed.You only allow to have {{Auth::user()->package->product_limit}}.
            Please upgrade <a href="{{route('user.package.index')}}" class="alert-link">package</a> Or Pay Product Fee which is {{App\Models\Setting::productFee()}} USD Dollar deducted from your cash wallet.
        </div>
    </div>
</div>
@endif
@else
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Oh!</span> 
            You dont purchase package till now.
            Please purchase <a href="{{route('user.package.index')}}" class="alert-link">package</a>  Or Pay Product Fee which is {{App\Models\Setting::productFee()}} USD Dollar deducted from your cash wallet..
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-sm-6 col-xl-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        {{Auth::user()->products->count()}}
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Products</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-enter6 icon-3x text-indigo-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->package->product_limit - Auth::user()->products->count()}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Product Remaining</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Your Products</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                <form method="POST" action="{{route('user.product.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Name</label>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="display_order" value="2">
                            <input type="text" name="name" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Category</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Brands</label>
                            <select name="brand_id" id="brand_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                
                            </select>                        
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" required name="phone"  placeholder="Contact Number" value="{{Auth::user()->phone}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Country</label>
                            <select data-placeholder="Enter 'as'" name="country_id" id="country_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Countries">
                                    @foreach(App\Models\Country::all() as $country)
                                    <option  value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>                       
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Cities</label>
                            <select data-placeholder="Enter 'as'" name="city_id" id="city_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Cities">
                                </optgroup>
                            </select>       
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Product Price <small id="conversionText"></small></label>
                            <input type="text" name="price" class="form-control" required placeholder="Product Price">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Product Stocks</label>
                            <input type="number" name="stock" class="form-control"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="images[]" class="form-control" multiple  required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Product Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2"></textarea>
                        </div>
                   </div>
                   <p><strong>Social Links:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="youtube" class="form-control"  >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tiktok</label>
                            <input type="text" name="tiktok" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Snack Video</label>
                            <input type="text" name="snack_video" class="form-control"  >
                        </div>
                   </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.brands')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#brand_id').empty();
                    $('#brand_id').append('<option disabled>Select Product Brands</option>');
                    for (i=0;i<result.length;i++){
                        $('#brand_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
        
        $('#country_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.cities')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    $('#city_id').empty();
                    $('#city_id').append('<option disabled>Select Product Cities</option>');
                    $('#conversionText').html("");
                    result = response.cities;
                    for (i=0;i<result.length;i++){
                        $('#city_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                    $('#conversionText').html(response.html);
                }
            });
        });
    });
</script>
@endsection