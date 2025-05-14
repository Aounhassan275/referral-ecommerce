@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update {{$blog->name}} Product Information | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update {{$blog->name}} Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Blog Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Blog Name" value="{{@$blog->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Url</label>
                            <input type="text" name="url" class="form-control" placeholder="Blog Url" value="{{@$blog->url}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Category</label>
                            <select name="blog_category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\BlogCategory::all() as $category)
                                <option @if($blog->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Blog Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2">{{$blog->description}}</textarea>
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
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Blog Images</h5>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="modal" data-target="#add_image_model" href="#" class="btn btn-success">Add New Image</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Blog Image</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blog->images as $key => $image)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td><img src="{{asset($image->image)}}" height="100" width="100" alt=""></td>
                        <td class="table-action">
                            <form action="{{route('admin.blog_image.destroy',$image->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="add_image_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.blog_image.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Blog Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Blog Image</label>
                        <input class="form-control" type="hidden"  name="blog_id" value="{{$blog->id}}">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Blog Tag</h5>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-toggle="modal" data-target="#add_tag_model" href="#" class="btn btn-success">Add New Tag</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Blog Tag</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blog->tags as $key => $tag)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$tag->name}}</td>
                        <td class="table-action">
                            <form action="{{route('admin.blog_tag.destroy',$tag->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="add_tag_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('admin.blog_tag.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Blog Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Blog Tag</label>
                        <input class="form-control" type="hidden"  name="blog_id" value="{{$blog->id}}">
                        <input class="form-control" type="text" name="name" placeholder="Blog Tag">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
     $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select Category",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
@endsection