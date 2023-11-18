@extends('front.layout.index')
@section('meta')
    
<title>PRIVACY POLICY | {{App\Models\Setting::siteName()}}</title>
@endsection

@section('content')
<div class="sb-breadcrumbs breadcrumb-bg ">
    <ul class="breadcrumb ">
        <li class="breadcrumb-item ">
            <i class="fa fa-home"></i>
            <a href="{{url('home')}}" class="breadcrumb-label">Home</a>
        </li>
        <li class="breadcrumb-item is-active">
            <a href="{{url('privacy_policy')}}" class="breadcrumb-label">Privacy Policy</a>
        </li>
    </ul>
</div>
<main class="page page--information">
    <div class="page-content ">
        <div class="about_us about-demo-1">
            <div class="image-about-us module">
                <a href="{{App\Models\Setting::privacyPolicyImage()}}">
                    <img class="__mce_add_custom__"
                        title="about/image-about-1.jpg" 
                        src="{{App\Models\Setting::privacyPolicyImage()}}"
                        style="height:450px;width:1170px;" 
                        alt="{{App\Models\Setting::privacyPolicyImage()}}" />
                </a>
            </div>
            <div class="about_wrapper">
                <h3 class="title font-ct">PRIVACY POLICY FOR {{App\Models\Setting::siteName()}}</h3>
                <div class="content-page">{{App\Models\Setting::privacyPolicyContent()}}</div>
            </div>
        </div>
    </div>
</main>
@endsection