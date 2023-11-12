@extends('front.layout.index')
@section('meta')
    
<title>{{$category->name}} BRANDS | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('categories')}}" class="breadcrumb-label">Categories</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('categories')}}" class="breadcrumb-label">{{$category->name}} BRANDS</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category ">{{$category->name}} BRANDS</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($brands as $brand)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<a href="{{asset($brand->image)}}" target="_blank" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($brand->image)}}" data-src="{{asset($brand->image)}}" alt="{{$brand->name}}" title="{{$brand->name}}">
						</a>
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}">{{$brand->name}}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">({{$brand->products->count()}})</span>
						</div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}"  class="" title="Add to Cart">View</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $brands->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection