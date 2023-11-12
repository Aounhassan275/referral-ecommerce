@extends('front.layout.index')
@section('meta')
    
<title>Login | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('user/login')}}" class="breadcrumb-label">Login</a>
	   </li>
	</ul>
 </div>
 <div class="row login--row">
     <form class="col-sm-6 form" action="{{route('user.login')}}" method="post">
        @csrf
         <div class="panel">
             <div class="panel-header">
                 <h2 class="panel-title">Sign in</h2>
             </div>

             <div class="panel-body">
                 <div class="form-field">
                     <label class="form-label" for="login_email">User Name:</label>
                     <input class="form-input" name="name" id="login_email" type="text" required />
                 </div>
                 <div class="form-field">
                     <label class="form-label" for="login_pass">Password:</label>
                     <input class="form-input" id="login_pass" type="password" name="password" required />
                     <a class="forgot-password" href="{{route('user.verification')}}">Forgot your password?</a>
                 </div>
                 <div class="form-actions">
                     <input type="submit" class="button button--primary" value="Sign in" />
                 </div>
             </div>
         </div>
     </form>
     <div class="col-sm-6 new-customer">
         <div class="panel">
             <div class="panel-header">
                 <h2 class="panel-title">New Customer?</h2>
             </div>
             <div class="panel-body">
                 <p class="new-customer-intro">Create an account with us and you&#x27;ll be able to:</p>
                 {{-- <ul class="new-customer-fact-list">
                     <li class="new-customer-fact">Check out faster</li>
                     <li class="new-customer-fact">Save multiple shipping addresses</li>
                     <li class="new-customer-fact">Access your order history</li>
                     <li class="new-customer-fact">Track new orders</li>
                     <li class="new-customer-fact">Save items to your Wish List</li>
                 </ul> --}}
                 <a href="{{App\Models\Setting::companyReferralLink()}}"><button class="button button--primary">Create Account</button></a>
             </div>
         </div>
     </div>
 </div>
@endsection