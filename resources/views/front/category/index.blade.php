@extends('front.layout.index')
@section('meta')
    
<title>CATEGORIES | {{App\Models\Setting::siteName()}}</title>
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
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('categories')}}" class="breadcrumb-label">Categories</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category ">Categories</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($categories as $category)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
				<article class="product-item-container ">
					<div class="left-block d-flex align-items-center justify-content-center">
						<a href="{{asset($category->image)}}" target="_blank" class="product-item-photo">
							<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($category->image)}}" data-src="{{asset($category->image)}}" alt="{{$category->name}}" title="{{$category->name}}">
						</a>
					</div>
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('category.show',str_replace(' ', '_',$category->name))}}">{{$category->name}}</a>
						</h4>
						<div class="price-section price-section--withoutTax ">
							<span data-product-price-without-tax class="price price--withoutTax">({{$category->brands->count()}})</span>
						</div>
						<div class="button-group">
							<div class="action-item addToCart">
								<a href="{{route('category.show',str_replace(' ', '_',$category->name))}}" data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">View</a>
							</div>
						</div>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $categories->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection