@extends('front.layout.post_index')
@section('meta')
    
<title> PRODUCTS | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('/')}}" class="breadcrumb-label">Home</a>
	   </li>
	   <li class="breadcrumb-item">
			<i class="fa fa-home"></i>
		  <a href="{{url('posts')}}" class="breadcrumb-label">Posts</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar-posts')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category "> Posts</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($posts as $post)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<div class="product-card__gallery product-card__left d-none d-sm-block">
							@foreach($post->images as $image_key => $image)
							<div class="item-img {{$image_key == 0?'thumb-active':''}} " data-src="{{asset($image->image)}}">
								<img class="card-image lazyload" data-sizes="auto" width="41px" height="41px" src="{{asset($image->image)}}" 
								data-src="{{asset($image->image)}}" alt="{{$post->name.' '.$image_key }}" title="{{$post->name.' '.$image_key }}">
							</div>
							@endforeach
						</div>
						<a href="{{route('post.show',str_replace(' ', '_',$post->name))}}" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($post->images->first()->image)}}" data-src="{{asset($post->images->first()->image)}}" alt="{{$post->name.' 0' }}" title="{{$post->name.' 0' }}">
						</a>
						{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('post.show',str_replace(' ', '_',$post->name))}}">{{$post->name}}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">{{@$post->brand->name}}</span>
						</div>
						<div class="description"> {!! substr( $post->name, 0, 50) !!}... </div>
						<div class="product-colors" data-product-id="130"></div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('post.show',str_replace(' ', '_',$post->name))}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">Purchase</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $posts->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection