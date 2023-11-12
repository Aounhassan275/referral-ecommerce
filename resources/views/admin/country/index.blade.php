@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Country | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Country</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.country.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Country Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Country Name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Country Currency</label>
                            <input type="text" name="currency" class="form-control" placeholder="Enter Country Currency" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Country Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Enter Code" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Country Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Enter Code" required>
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
            <h5 class="card-title">View Countries</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Country Image</th>
                    <th>Country Name</th>
                    <th>Country Currency</th>
                    <th>Country Code</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Country::all() as $key => $country)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><img src="{{asset($country->image)}}" height="100" width="100"></td>
                    <td>{{$country->name}}</td>
                    <td>{{$country->currency}}</td>
                    <td>{{$country->code}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$country->name}}" 
                            code="{{$country->code}}" currency="{{$country->currency}}" id="{{$country->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.country.destroy',$country->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Country</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Country Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label class="form-label">Country Currency</label>
                        <input type="text" id="currency" name="currency" class="form-control" placeholder="Enter Country Currency" required>
                    </div>
                    <div class="form-group ">
                        <label class="form-label">Country Code</label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code" required>
                    </div>
                    <div class="form-group ">
                        <label class="form-label">Country Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Enter Code" required>
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
        $('.edit-btn').click(function(){
            let name = $(this).attr('name');
            let currency = $(this).attr('currency');
            let code = $(this).attr('code');
            let id = $(this).attr('id');
            $('#code').val(code);
            $('#currency').val(currency);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.country.update','')}}' +'/'+id);
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