@extends('adminty-user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Post {{$post->name}} Installements</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a data-toggle="modal" data-target="#add_installement_model" href="#" class="btn btn-success">Add New Installement Plan</a>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th >Sr#</th>
                <th >Post Name</th>
                <th >Post Price</th>
                <th >Installement Duration</th>
                <th >Monthly Amount</th>
                <th >Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($installements as $key => $installement)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{@$installement->post->name}}</td>
                <td>{{@$installement->price}}</td>
                <td>{{@$installement->duration}}</td>
                <td>{{@$installement->monthly_amount}}</td>
                <td class="text-center">
                    <form action="{{route('user.post_installement.destroy',$installement->id)}}" method="POST">
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
<div id="add_installement_model" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('user.post_installement.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control" type="hidden"  name="post_id" value="{{$post->id}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Post Installement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Post price</label>
                        <input class="form-control" type="number" readonly id="price" required name="price" value="{{$post->price}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Installement Duration</label>
                        <select name="duration" id="duration" class="form-control" required>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12" selected>12 Months</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Installement Per Month</label>
                        <input class="form-control" type="text" value="{{$post->price/12}}" readonly id="monthly_amount" required name="monthly_amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#duration').on('change', function() {
            var duration = parseFloat(this.value);
            var price = parseFloat($("#price").val());
            newPrice = price/duration;
            $("#monthly_amount").val(newPrice);
        }); 
    });
</script>
@endsection