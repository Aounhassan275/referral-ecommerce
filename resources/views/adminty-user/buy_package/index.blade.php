@extends('adminty-user.layout.index')
@section('title')
Buy Packages For User
@endsection
@section('styles')

@endsection
@section('contents')
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header table-card-header">
                <h5>Add Buy Packages For User</h5>
            </div>
 
            <div class="card-body">
                <form id="transcationsForm" action="{{route('user.buy_package.store')}}"  method="post">
                    @csrf
                    <input type="hidden"  name="new_password" id="new_password" class="form-control" >                        
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Pending Members</label>
                            <select class="js-example-basic-single col-sm-12"  id="user_id" name="user_id">
                                <option>Select Member</option>
                                <optgroup label="Members">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
              
                        </div>   
                        <div class="form-group col-md-4">
                            <label class="form-label">Packages</label>
                            <select class="js-example-basic-single col-sm-12"  id="package_id" name="package_id">
                                <option>Select Package</option>
                                <optgroup label="Package">
                                    @foreach (App\Models\Package::where('is_renew',0)->where('is_associate',0)->get() as $key => $package)
                                    <option value="{{$package->id}}">{{$package->name}} (PKR {{$package->price}})</option>
                                    @endforeach
                                </optgroup>
                            </select>
              
                        </div>    
                    </div>
                    <div class="row float-right" >
                        <a href="#transfer_modal" data-toggle="modal" data-target="#transfer_modal">
                            <button type="button" class="btn btn-primary">Buy Now 
                                <i class="icon-plus22 ml-2"></i>
                            </button>
                        </a>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->
        <div class="card">
            <div class="card-header table-card-header">
                <h5>View Buy Packages For User</h5>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
            
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Package Price</th>
                                <th>User</th>
                                <th>Pruchase At</th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($packages as $key => $history)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$history->package->name}}</td>
                                    <td>{{$history->package->price}}</td>
                                    <td>{{$history->user->name}}</td>
                                    <td>{{$history->created_at->format('d M,Y')}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                <button type="button" id="transfer_form" class="btn btn-success waves-effect waves-light">Verify</button>
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
</script>
@endsection