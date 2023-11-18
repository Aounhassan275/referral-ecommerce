@extends('front.layout.index')
@section('meta')
    
<title>CONTACT US | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<div class="sb-breadcrumbs breadcrumb-bg ">
	<ul class="breadcrumb ">
	   <li class="breadcrumb-item ">
		  <i class="fa fa-home"></i>
		  <a href="{{url('home')}}" class="breadcrumb-label">Home</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{Request::URL()}}" class="breadcrumb-label">Contact Us</a>
	   </li>
	</ul>
 </div>
 
<div class="account account--fixed">
    <div class="account-body">
        <form action="{{route('admin.message.store')}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="form-row form-row--half">
                <div class="form-field">
                    <label class="form-label" for="FormField_1_input">
                         Name
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
            </div>
            <div class="form-field">
                <label class="form-label">
                    Subject
                    <small>Required</small>
                </label>
                <input type="text" required name="subject" class="form-input"  />
            </div>
            <div class="form-field" >
                <label class="form-label">
                    Message
                    <small>Required</small>
                </label>
                <textarea name="message" id="message" rows="5" cols="50" required class="form-input"></textarea>
            </div>
            <br />
            <div class="form-actions">
                <input type="submit" class="button button--primary" value="Send Message" />
            </div>
        </form>
    </div>
</div>
@endsection