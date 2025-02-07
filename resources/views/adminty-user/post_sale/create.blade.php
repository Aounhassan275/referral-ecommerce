@extends('adminty-user.layout.index')
@section('title')
Sale
@endsection
@section('styles')

@endsection
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="alert bg-info text-white alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Alert! </span> There is {{App\Models\Setting::saleFee()}} % on every sale.
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">Add Sale</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form id="transcationsForm" action="{{route('user.post_sale.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Amount</label>
                            <input type="number"    name="amount" id="amount" class="form-control"  required>                        
                            <input type="hidden"  name="sender_id" id="sender_id" class="form-control" value="{{Auth::user()->id}}">                        
                            <input type="hidden"  name="new_password" id="new_password" class="form-control" >                        
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Amount To Charge</label>
                            <input type="text" id="amount_charged" name="amount_charged" class="form-control"  readonly>                        
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Members</label>
                            <select data-placeholder="Enter 'as'" name="receiver_id" id="receiver_id" class="form-control select-minimum " data-fouc>
                                <option></option>
                                <optgroup label="Members">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
              
                        </div>    
                    </div>
                    <div class="row float-right" >
                        <a href="#transfer_modal" data-toggle="modal" data-target="#transfer_modal">
                            <button type="button" class="btn btn-primary">Sale Now 
                                <i class="icon-plus22 ml-2"></i>
                            </button>
                        </a>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div id="transfer_modal" class="modal fade">
    <div class="modal-dialog">
   
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title mt-0" id="myModalLabel">Verify Yourself?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Password</label>
                    <input class="form-control" type="password" name="password" id="password" >
                </div>
                <p id="errors" style="color:red;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" id="transfer_form" class="btn btn-success waves-effect waves-light">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#transfer_form').on('click', function () {
        var password = $('#password').val();
        $('#new_password').val(password);
        $('#transfer_modal').modal('hide');
        $('#transcationsForm').submit();
    });
    $('#amount').on('change', function () {
        amount = $(this).val();
        saleFee = "{{App\Models\Setting::saleFee()}}";
        totalSaleFee = amount/100 * saleFee;
        $('#amount_charged').val(totalSaleFee);
    });
</script>
@endsection