@extends('user.layout.index')
@section('title')
Edit {{$product->name}} Product
@endsection
@section('contents')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Update {{$product->name}} Product Information</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                <form action="{{route('user.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" readonly placeholder="Product Name" value="{{@$product->name}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" name="price" class="form-control" required placeholder="Product Price" value="{{@$product->price}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Category</label>
                            <select name="category_id" id="category_id" class="form-control select2" required>
                                <option  disabled>Select</option>
                                @foreach(App\Models\Category::all() as $category)
                                <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control select2" required>
                                <option >Select</option>
                                <option value="{{@$product->brand_id}}" selected>{{@$product->brand->name}}</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Product Stocks</label>
                            <input type="number" name="stock" class="form-control" value="{{@$product->stock}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" required name="phone"  placeholder="Contact Number" value="{{@$product->phone}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Country</label>
                            <select data-placeholder="Enter 'as'" name="city_id" id="city_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Countries">
                                    @foreach(App\Models\Country::all() as $country)
                                    <option @if($product->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>                                        
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Cities</label>
                            <select data-placeholder="Enter 'as'" name="city_id" id="city_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Cities">
                                    @foreach(App\Models\City::where('country_id',$product->country_id)->get() as $city)
                                    <option @if($product->city_id == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>                          
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Product Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2">{{$product->description}}</textarea>
                        </div>
                   </div>
                   <p><strong>Social Links:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{@$product->facebook}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{@$product->instagram}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{@$product->whatsapp}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{@$product->youtube}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{@$product->linkedin}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{@$product->twitter}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tiktok</label>
                            <input type="text" name="tiktok" class="form-control" value="{{@$product->tiktok}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Snack Video</label>
                            <input type="text" name="snack_video" class="form-control" value="{{@$product->snack_video}}" >
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Product Images</h5>
        <div class="header-elements">
            <div class="list-icons">
                @if(@$product->images->count() < 9)
                <a data-toggle="modal" data-target="#add_image_model" href="#" class="btn btn-success">Add New Image</a>
                @endif
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>Sr#</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($product->images as $key => $image)
            <tr> 
                <td>{{$key+1}}</td>
                <td><img src="{{asset($image->image)}}" height="100" width="100" alt=""></td>
                <td class="text-center">
                    <form action="{{route('user.product_image.destroy',$image->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn"><i class="icon-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="add_image_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('user.product_image.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Product Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Product Image</label>
                        <input class="form-control" type="hidden"  name="product_id" value="{{$product->id}}">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
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