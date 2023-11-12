@extends('front.layout.index')
@section('meta')
    
<title>Register User | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('search-tab')
@include('front.layout.partials.search-tab')
@endsection
@section('content')

<div class="sb-breadcrumbs breadcrumb-bg ">
	<ul class="breadcrumb ">
	   <li class="breadcrumb-item ">
		  <i class="fa fa-home"></i>
		  <a href="{{url('home')}}" class="breadcrumb-label">Home</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{Request::URL()}}" class="breadcrumb-label">Create Account</a>
	   </li>
	</ul>
 </div>
 <h1 class="page-heading">New Account</h1>
<div class="row ">
    @if(@$user)
    <div class="col-md-5"></div>
    <div class="col-md-3">
        <img src="{{asset($user->image)}}" width="150" height="150" class="rounded-circle" alt="">
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-5"></div>
    <div class="col-md-3 ">
        <p>Refer by : {{$user->name}}</p>
    </div>
    <div class="col-md-4"></div>
    @endif
</div>
<div class="account account--fixed">
    <div class="account-body">
        <form action="{{route('user.register')}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="form-row form-row--half">
                <input type="hidden" id="code"  value="{{$code ?? ''}}" name="code">
                <div class="form-field">
                    <label class="form-label" for="FormField_1_input">
                        User Name
                        <small>Required</small>
                    </label>
                    <input type="text" required  name="name" class="form-input"  />
                </div>
                <div class="form-field">
                    <label class="form-label" for="FormField_1_input">
                        Email Address
                        <small>Required</small>
                    </label>
                    <input type="email" required data-label="Email Address" name="email" class="form-input" aria-required="true" data-field-type="EmailAddress" />
                </div>

                <div class="form-field" >
                    <label class="form-label">
                        Password
                        <small>Required</small>
                    </label>
                    <input id="pwd" minlength="4" onkeyup="validatePassword(this.value);" type="password" class="form-input" name="password"  required/>
                    <span id="msg"></span>
                </div>
                <div class="form-field" >
                    <label class="form-label">
                        Confirm Password
                        <small>Required</small>
                    </label>
                    <input id="confirmpwd" minlength="4" onkeyup="confirmPassword(this.value);" type="password" class="form-input" name="confirm_password"  required/>
                    <span id="confirmmsg"></span>
                </div>

                <div class="form-field" >
                    <label class="form-label">
                        Image
                        <small>Required</small>
                    </label>
                    <input type="file" class="form-input" name="image"  required/>
                </div>
                
                @if(in_array('date_of_birth',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Date Of Birth
                        <small>Required</small>
                    </label>
                    <input type="date" class="form-input" name="dob"  required/>
                </div>
                @endif
                @if(in_array('country',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Country
                        <small>Required</small>
                    </label>
                    <select class="form-select"  aria-required="true" name="country_id" id="country_id" >
                        <option value="">Choose a Country</option>
                        @foreach(App\Models\Country::orderBy('name','ASC')->get() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if(in_array('city',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        City
                        <small>Required</small>
                    </label>
                    <select class="form-select"  aria-required="true"  name="city_id" id="city_id" >
                        <option value="">Choose a City</option>
                    </select>
                </div>
                @endif
                @if(in_array('service',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Service
                        <small>Required</small>
                    </label>
                    <select class="form-select"  aria-required="true" name="service_id" id="service_id">
                        <option value="">Choose a Service</option>
                        @foreach(App\Models\Service::orderBy('name','ASC')->get() as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @if(in_array('service_type',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Service Type
                        <small>Required</small>
                    </label>
                    <select class="form-select"  aria-required="true"  name="type_id" id="type_id" >
                        <option value="">Choose a Service Type</option>
                    </select>
                </div>
                @endif
                @if(in_array('gender',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Gender
                        <small>Required</small>
                    </label>
                    <select class="form-select"  aria-required="true"  name="gender" id="gender" >
                        <option value="">Choose a Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="TransGender">TransGender</option>
                    </select>
                </div>
                @endif
                @if(in_array('phone',App\Helpers\Helper::registerFields()))
                <div class="form-field" >
                    <label class="form-label">
                        Phone
                        <small>Required</small>
                    </label>
                    <input type="text" class="form-input" name="phone"  required/>
                </div>
                @endif
                <br>
                <p>Password Recovery Questions</p>
            </div>
            <div class="form-row form-row--half">
                <div class="form-field" >
                    <label class="form-label">
                        Your Birth Place
                        <small>Required</small>
                    </label>
                    <input type="text" class="form-input" name="birth_place"  required/>
                </div>
                <div class="form-field" >
                    <label class="form-label">
                        Your Favourite Place
                        <small>Required</small>
                    </label>
                    <input type="text" class="form-input" name="favourite_place"  required/>
                </div>
                <div class="form-field" >
                    <label class="form-label">
                        Your Favourite Person
                        <small>Required</small>
                    </label>
                    <input type="text" class="form-input" name="favourite_uncle"  required/>
                </div>
            </div>
            <br />
            <div class="form-actions">
                <input type="submit" class="button button--primary" value="Create Account" />
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
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