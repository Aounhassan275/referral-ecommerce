@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Notes | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Notes</h5>
                
                {{-- <div class="row">
                    <div class="col-12">
                        <a href="{{route('admin.setting.empty_database')}}" class="btn btn-info " style="margin-top:10px;">Empty Database</a>
                    </div>
                </div> --}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.note.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Note Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Setting Name" required>
                        </div>
                        <div class="form-group col-12">
                            <label class="form-label">Note Value</label>
                            <textarea name="text" class="form-control" required id="" rows="2"></textarea>
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
            <h5 class="card-title">View Notes Detail</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Note Name</th>
                    <th>Note Value</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Note::all() as $key => $note)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$note->name}}</td>
                    <td>{{$note->text}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$note->name}}" text="{{$note->text}}" 
                                id="{{$note->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.note.destroy',$note->id)}}" method="POST">
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Note Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>   
                    <div class="form-group ">
                        <label>Note Text</label>
                        <textarea name="text" class="form-control" id="text"></textarea>
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
            let text = $(this).attr('text');
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#text').val(text);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.note.update','')}}' +'/'+id);
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