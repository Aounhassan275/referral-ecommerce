@extends('front.layout.index')
@section('meta')
    
<title>{{$blog->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="{!! $blog->description !!}">

<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{!! $blog->name !!} | {{@$blog->category->name}}" />
<meta property="og:description" content="{!! $blog->description !!}" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:site_name" content="BUYEBAZAR.COM" />
<meta property="article:publisher" content="{{url(App\Models\Setting::facebook())}}" />
<meta property="og:image" content="{{asset($blog->images->first()->image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{!! $blog->name !!} | {{@$blog->category->name}}" />
<meta name="twitter:description" content="{!! $blog->description !!}" />
<meta name="twitter:image" content="{{asset($blog->images->first()->image)}}" />
@endsection

@section('search-tab')
@include('front.layout.partials.search-tab')
@endsection
@section('content')

<div class="sb-breadcrumbs breadcrumb-bg ">
	<ul class="breadcrumb ">
	   <li class="breadcrumb-item ">
		  <i class="fa fa-home"></i>
		  <a href="{{url('/')}}" class="breadcrumb-label">Home</a>
	   </li>
	   <li class="breadcrumb-item">
			<i class="fa fa-home"></i>
		  <a href="{{url('blogs')}}" class="breadcrumb-label">Blog</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('blogs')}}" class="breadcrumb-label">{{$blog->name}}</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
        <div class="productView">
            <section class="productView-images" data-image-gallery style="width:100%!important;">
                <figure class="productView-image"
                    data-image-gallery-main
                    data-zoom-image="{{asset($blog->images->first()->image)}}"
                    >
                    <a class="productView-image-main " target="_blank" href="{{asset($blog->images->first()->image)}}">
                    <img class="productView-image--default lazyload" 
                        data-sizes="auto" 
                        style="height: 400px!important;width:800px!important;"
                        src="{{asset($blog->images->first()->image)}}" 
                        data-src="{{asset($blog->images->first()->image)}}"
                        alt="{{$blog->name}}" title="{{$blog->name}}" data-main-image>
                    </a>
                </figure>
                <div class="btn-productViewzoom text-center">
                    <button class="btn btn-outline-secondary" id="btn-productViewzoom" type="submit"><i class="fa fa-search"></i>  Click to zoom in</button>
                </div> 
                <ul class="productView-thumbnails">
                    @foreach($blog->images as $image_key => $image)
                    <li class="productView-thumbnail">
                        <a
                        class="productView-thumbnail-link {{$image_key == 0?'is-active':''}}  "
                        href="../../cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/500x659/products/94/524/19__540094847.jpg?c=2"
                        data-image-gallery-item ="{{$image_key}}"
                        data-image-gallery-new-image-url="{{asset($image->image)}}"
                        data-image-gallery-zoom-image-url="{{asset($image->image)}}">
                        <img class="lazyload" data-sizes="auto" src="{{asset($image->image)}}"
                            data-src="{{asset($image->image)}}" alt="{{$image->image}}" title="{{$image->image}}">
                        </a>
                    </li>
                    @endforeach
                </ul>				
            </section>
        </div>
	</main>
 </div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection