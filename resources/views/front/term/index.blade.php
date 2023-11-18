@extends('front.layout.index')
@section('meta')
    
<title>TERM AND CONDITIONS | {{App\Models\Setting::siteName()}}</title>
@endsection

@section('content')
<div class="sb-breadcrumbs breadcrumb-bg ">
    <ul class="breadcrumb ">
        <li class="breadcrumb-item ">
            <i class="fa fa-home"></i>
            <a href="{{url('home')}}" class="breadcrumb-label">Home</a>
        </li>
        <li class="breadcrumb-item is-active">
            <a href="{{url('terms_and_condition')}}" class="breadcrumb-label">Term & Condition</a>
        </li>
    </ul>
</div>
<main class="page page--information">
    <div class="page-content ">
        <div class="about_us about-demo-1">
            <div class="image-about-us module">
                <a href="{{App\Models\Setting::termAndConditionImage()}}">
                    <img class="__mce_add_custom__"
                        title="about/image-about-1.jpg" 
                        src="{{App\Models\Setting::termAndConditionImage()}}"
                        style="height:450px;width:1170px;" 
                        alt="{{App\Models\Setting::termAndConditionImage()}}" />
                </a>
            </div>
            <div class="about_wrapper">
                <h3 class="title font-ct">TERMS AND CONDITIONS FOR {{App\Models\Setting::siteName()}}</h3>
                <div class="content-page">{{App\Models\Setting::termAndConditionContent()}}</div>
            </div>
        </div>
    </div>
</main>
@endsection