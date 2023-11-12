@extends('front.layout.service_index')
@section('meta')
    
<title>{{$type->name}} SERVICE PROVIDERS | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('our_service')}}" class="breadcrumb-label">{{$type->name}} Service Provider</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.service-sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category ">{{$type->name}} Service Provider</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($users as $user)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<a href="{{route('product.user',$user->id)}}" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($user->image)}}" data-src="{{asset($user->image)}}" alt="{{$user->name.' 0' }}" title="{{$user->name.' 0' }}">
						</a>
						{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('product.user',$user->id)}}">{!! substr( $user->name, 0, 15) !!}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">(<span style="color:green;"><i class="fa fa-eye"></i>{{$user->view}}</span>)</span>
						</div>
						<div class="description"> {!! substr( $user->name, 0, 15) !!}... </div>
						<div class="product-colors" data-product-id="130"></div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('product.user',$user->id)}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">View Profile</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $users->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection