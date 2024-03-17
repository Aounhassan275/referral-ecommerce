@extends('user.layout.index')
@section('title')
Edit {{$post->name}} Post
@endsection
@section('contents')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Edit {{$post->name}} Post</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                <form method="POST" action="{{route('user.post.update',$post->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Name</label>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="text" name="name" value="{{$post->name}}" class="form-control" placeholder="Post Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Category</label>
                            <select name="post_category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\PostCategory::all() as $category)
                                <option @if($post->post_category_id == $category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Post Brands</label>
                            <select name="post_brand_id" id="brand_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                <option value="{{@$post->post_brand_id}}" selected>{{@$post->brand->name}}</option>
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Country</label>
                            <select data-placeholder="Enter 'as'" name="country_id" id="country_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Countries">
                                    @foreach(App\Models\Country::all() as $country)
                                    <option @if($post->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>                                        
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Cities</label>
                            <select data-placeholder="Enter 'as'" name="city_id" id="city_id" class="form-control select-minimum " data-fouc>
                                <option selected value="{{@$post->city_id}}">{{@$post->city->name}}</option>
                            </select>                          
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Post Price <small id="conversionText"></small></label>
                            <input type="number" name="price" class="form-control" value="{{$post->price}}" required placeholder="Post Price">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Post available on installment </small></label>
                            <br>
                            <input type="radio" class="" {{$post->is_installment_allowed ? 'checked' : ''}} name="is_installment_allowed" value="1"> Yes
                            <input type="radio" class="" {{!$post->is_installment_allowed ? 'checked' : ''}} name="is_installment_allowed" value="0"> No
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Post Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2">{{$post->description}}</textarea>
                        </div>
                   </div>
                   <p><strong>Social Links:</strong></p>
                   <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{@$post->facebook}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{@$post->instagram}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{@$post->whatsapp}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{@$post->youtube}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{@$post->linkedin}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{@$post->twitter}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Tiktok</label>
                            <input type="text" name="tiktok" class="form-control" value="{{@$post->tiktok}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Snack Video</label>
                            <input type="text" name="snack_video" class="form-control" value="{{@$post->snack_video}}" >
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
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Post Images</h5>
        <div class="header-elements">
            <div class="list-icons">
                @if(@$post->images->count() < 9)
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
                <th>Post Image</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($post->images as $key => $image)
            <tr> 
                <td>{{$key+1}}</td>
                <td><img src="{{asset($image->image)}}" height="100" width="100" alt=""></td>
                <td class="text-center">
                    <form action="{{route('user.post_image.destroy',$image->id)}}" method="POST">
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
        <form action="{{route('user.post_image.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Post Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Post Image</label>
                        <input class="form-control" type="hidden"  name="post_id" value="{{$post->id}}">
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