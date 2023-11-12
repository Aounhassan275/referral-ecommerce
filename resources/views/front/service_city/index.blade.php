@extends('front.layout.service_index')
@section('meta')
    
<title> CITIES | {{App\Models\Setting::siteName()}}</title>
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
		  <a href="{{url('cities')}}" class="breadcrumb-label">Cities</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	   <div class="products-category clearfix">
		  <div class="form-group category-info">
			 <h3 class="title-category "> Cities</h3>
			 <!-- snippet location categories -->
		  </div>
		  <div class="products-list row" >
			@foreach($cities as $city)
			<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-12">
				<article class="product-item-container ">
					<div class="right-block">
						<h4 class="card-title">
							<a href="{{route('service_cities.show',str_replace(' ', '_',$city->name))}}">{{$city->name}}  ({{$city->users->count()}})</a>
						</h4>
					</div>
				</article>
			</div>
			@endforeach
		</div>
		  <div class="pagination">
			 <ul class="pagination-list">
				{!! $cities->links() !!}
			 </ul>
		  </div>
	   </div>
	</main>
 </div>
@endsection