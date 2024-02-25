@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Super Pool | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Super Pool</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.super_pool.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Super Pool Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Super Pool Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Super Pool Price</label>
                            <input type="number" name="price" placeholder="Enter Super Pool Price" class="form-control"  required>
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
            <h5 class="card-title">View Super Pools</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Super Pool Name</th>
                    <th>Super Pool Price</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\SuperPool::all() as $key => $super_pool)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$super_pool->name}}</td>
                    <td>{{$super_pool->price}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$super_pool->name}}" 
                                id="{{$super_pool->id}}"  price="{{$super_pool->price}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.super_pool.destroy',$super_pool->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Super Pool</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Super Pool Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Super Pool Price</label>
                        <input type="text" name="price" id="price"  class="form-control" required>
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
            let price = $(this).attr('price');
            let name = $(this).attr('name');
            let id = $(this).attr('id');
            $('#price').val(price);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.super_pool.update','')}}' +'/'+id);
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