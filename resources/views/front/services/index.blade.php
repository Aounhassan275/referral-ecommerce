@extends('front.layout.service_index')
@section('meta')
    
<title> SERVICES | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('services')}}" class="breadcrumb-label">Service Providers</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.service-sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category "> Service Providers</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($services as $service)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<a href="{{route('services.show',str_replace(' ', '_',$service->name))}}" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($service->image)}}" data-src="{{asset($service->image)}}" alt="{{$service->name.' 0' }}" title="{{$service->name.' 0' }}">
						</a>
						{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('services.show',str_replace(' ', '_',$service->name))}}">{!! substr( $service->name, 0, 15) !!}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">(<span style="color:green;"><i class="fa fa-eye"></i>{{$service->types->count()}}</span>)</span>
						</div>
						<div class="description"> {!! substr( $service->name, 0, 15) !!}... </div>
						<div class="product-colors" data-product-id="130"></div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('services.show',str_replace(' ', '_',$service->name))}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">View Profile</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $services->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection