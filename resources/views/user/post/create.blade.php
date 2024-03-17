@extends('user.layout.index')
@section('title')
Add Post
@endsection
@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            It will charge you 1 USD for a single post.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        {{Auth::user()->posts->count()}}
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Posts</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Your Post</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                <form method="POST" action="{{route('user.post.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Name</label>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="text" name="name" class="form-control" placeholder="Post Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Category</label>
                            <select name="post_category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\PostCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Product Brands</label>
                            <select name="post_brand_id" id="brand_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Images</label>
                            <input type="file" name="images[]" class="form-control" multiple  required>
                        </div>
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
                    </div>
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Price <small id="conversionText"></small></label>
                            <input type="number" name="price" class="form-control" required placeholder="Post Price">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Post available on installment </small></label>
                            <br>
                            <input type="radio" class="" name="is_installment_allowed" value="1"> Yes
                            <input type="radio" class="" name="is_installment_allowed" checked value="0"> No
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Post Description</label>
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
                url: "{{route('user.post.brands')}}",
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