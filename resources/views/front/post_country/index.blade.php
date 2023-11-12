@extends('front.layout.post_index')
@section('meta')
    
<title> COUNTRIES | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('post/countries')}}" class="breadcrumb-label">Countries</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar-posts')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category "> Countries</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($countries as $country)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<a href="{{asset($country->image)}}" target="_blank" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($country->image)}}" data-src="{{asset($country->image)}}" alt="{{$country->name}}" title="{{$country->name}}">
						</a>
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('post.country.show',str_replace(' ', '_',$country->name))}}">{{$country->name}}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">({{$country->posts->count()}})</span>
						</div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('post.country.show',str_replace(' ', '_',$country->name))}}"  class="" title="Add to Cart">View</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $countries->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection