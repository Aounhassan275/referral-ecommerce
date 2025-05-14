@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD BLOG | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Blog</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Blog Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Blog Name">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Url</label>
                            <input type="text" name="url" class="form-control" placeholder="Blog Url">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Category</label>
                            <select name="blog_category_id" id="category_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\BlogCategory::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Blog Images</label>
                            <input type="file" name="images[]" class="form-control" multiple  required>
                        </div>
                   </div>
                   <div class="row">
                        
                        <div class="form-group col-12">
                            <label class="form-label">Blog Description</label>
                            <textarea name="description" class="form-control" required id="" rows="2"></textarea>
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
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('admin.product.brands')}}",
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
                url: "{{route('admin.product.cities')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#city_id').empty();
                    $('#city_id').append('<option disabled>Select Product Cities</option>');
                    for (i=0;i<result.length;i++){
                        $('#city_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection