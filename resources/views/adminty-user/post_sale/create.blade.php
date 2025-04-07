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
                            <select class="js-example-basic-single col-sm-12"  id="receiver_id" name="receiver_id">
                                <option>Select Member</option>
                                <optgroup label="Members">
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
              
                        </div>    
                    </div>
                    <div class="row float-right" >
                        <a href="#add-member-modal" data-toggle="modal" data-target="#add-member-modal">
                            <button type="button" style="margin-right:10px;" class="btn btn-warning">Add Member </button>
                        </a>
                        <a href="#transfer_modal" data-toggle="modal" data-target="#transfer_modal">
                            <button type="button" class="btn btn-primary">Sale Now 
                            </button>
                        </a>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div id="add-member" class="modal fade">
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
<div id="add-member-modal" class="modal fade">
    <div class="modal-dialog">
   
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form  action="{{route('user.user.store')}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <input type="hidden" name="code" value="{{Auth::user()->code}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> User Name</label>
                                    <input class="form-control" type="text" name="name" id="name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Email Address</label>
                                    <input class="form-control" type="email" name="email" id="email" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Password</label>
                                    <input class="form-control" id="pwd" minlength="4" onkeyup="validatePassword(this.value);" type="password" name="password" id="password" >
                                    <span id="msg"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Confirm Password</label>
                                    <input class="form-control" id="confirmpwd" minlength="4" onkeyup="confirmPassword(this.value);" type="password" name="confirm_password" id="confirm_password" >
                                    <span id="confirmmsg"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Image</label>
                                    <input class="form-control" type="file" name="image" id="image" >
                                </div>
                            </div>
                            @if(in_array('date_of_birth',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Date Of Birth</label>
                                    <input class="form-control" type="date" name="dob" id="dob" >
                                </div>
                            </div>
                            @endif
                            @if(in_array('country',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Country</label>
                                    <select class="form-control"  id="country_id" name="country_id">
                                        <option>Select Country</option>
                                        @foreach(App\Models\Country::orderBy('name','ASC')->get() as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(in_array('city',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> City</label>
                                    <select class="form-control"  id="city_id" name="city_id">
                                        <option>Select City</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(in_array('service',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Service</label>
                                    <select class="form-control"  id="service_id" name="service_id">
                                        <option>Choose a Service</option>
                                        @foreach(App\Models\Service::orderBy('name','ASC')->get() as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(in_array('service_type',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Service Type</label>
                                    <select class="form-control"  id="type_id" name="type_id">
                                        <option>Choose a Service Type</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(in_array('gender',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Gender</label>
                                    <select class="form-control"  id="gender" name="gender">
                                        <option value="">Choose a Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="TransGender">TransGender</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @if(in_array('phone',App\Helpers\Helper::registerFields()))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Phone</label>
                                    <input class="form-control" type="text" name="phone" id="phone" >
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <p>Password Recovery Questions</p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Your Birth Place</label>
                                    <input class="form-control" type="text" name="birth_place" id="birth_place" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Your Favourite Place</label>
                                    <input class="form-control" type="text" name="favourite_place" id="favourite_place" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=" User Name"> Your Favourite Person</label>
                                    <input class="form-control" type="text" name="favourite_uncle" id="favourite_uncle" >
                                </div>
                            </div>
                        </div>
                        <p id="member-error" style="color:red;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                </div>
            </form>
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
    $('#amount').on('change', function () {
        amount = $(this).val();
        saleFee = "{{App\Models\Setting::saleFee()}}";
        totalSaleFee = amount/100 * saleFee;
        $('#amount_charged').val(totalSaleFee);
    });
</script>
<script>
    function validatePassword(password) {
        
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("msg").innerHTML = "";
            return;
        }
        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]");      // Uppercase Alpabates
        matchedCase.push("[0-9]");      // Numbers
        matchedCase.push("[a-z]");     // Lowercase Alphabates

        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }
        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Very Weak";
                color = "red";
                break;
            case 3:
                strength = "Medium";
                color = "orange";
                break;
            case 4:
                strength = "Strong";
                color = "green";
                break;
        }
        document.getElementById("msg").innerHTML = strength;
        document.getElementById("msg").style.color = color;
    }
    function confirmPassword(password) {
        
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("confirmmsg").innerHTML = "";
            return;
        }
        // new_password = document.getElementById("pwd").val();
        new_password =  $('#pwd').val();
        if(new_password == password)
        {
            var strength = "Password Matched";
            var color = "green";
        }else{
            var strength = "Password dont Matched";
            var color = "red";
        }

        document.getElementById("confirmmsg").innerHTML = strength;
        document.getElementById("confirmmsg").style.color = color;
    }
    $(document).ready(function(){
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
                success: function(result){
                    $('#city_id').empty();
                    $('#city_id').append('<option disabled>Select Product Cities</option>');
                    for (i=0;i<result.cities.length;i++){
                        $('#city_id').append('<option value="'+result.cities[i].id+'">'+result.cities[i].name+'</option>');
                    }
                }
            });
        });
        $('#service_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.service.types')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#type_id').empty();
                    $('#type_id').append('<option disabled>Select Service Tyoe</option>');
                    for (i=0;i<result.length;i++){
                        $('#type_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection