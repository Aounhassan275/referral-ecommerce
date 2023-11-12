@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Type | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Type</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.type.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Type Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Type Image</label>
                            <input type="file" name="image" class="form-control"  required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Type Service</label>
                            <select name="service_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach (App\Models\Service::all() as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>                        
                        </div>
                    </div>      
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Types</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type Image</th>
                    <th>Type Name</th>
                    <th>Service Name</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Type::all() as $key => $type)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($type->image)}}" height="100px" width="100px"></td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->service->name}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$type->name}}" 
                            service_id="{{$type->service_id}}"  id="{{$type->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.type.destroy',$type->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Type Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Type Image</label>
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="title">type Service</label>
                        <select name="service" id="service_id" class="form-control select2" required>
                            <option disabled>Select</option>
                            @foreach(App\Models\Service::all() as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
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
        $('.edit-btn').click(function(){
            let name = $(this).attr('name');
            let service_id = $(this).attr('service_id');
            let id = $(this).attr('id');
            $('#service_id').val(service_id);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.type.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection