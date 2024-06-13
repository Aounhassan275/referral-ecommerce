@extends('front.layout.index')
@section('meta')
    
<title>HOME | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection
@section('search-tab')

<div class="header-bottom">
	<div class="container ">
		<div class="row">
			<div class="header-bottom-left col-lg-3 col-md-2 col-3">
				<div id="menu--verticalCategories" class="navPages-container navPages-verticalCategories">
					<a href="{{url('categories')}}" class="navPages-action megamenuToogle-wrapper hidden-sm hidden-xs" data-collapsible="verticalCategories" data-collapsible-disabled-breakpoint="medium" data-collapsible-disabled-state="open" data-collapsible-enabled-state="open" data-collapsible-limit="9" data-collapsible-textmore="More Categories" data-collapsible-textclose="Close Categories">
						<svg class="icon-alignleft" width="18" height="18">
							<use xlink:href="#icon-alignleft"></use>
						</svg>
						<span class="title-mega">All Categories </span>
						<svg class="icon-caret-circle" width="16" height="16">
							<use xlink:href="#icon-caret-circle-down"></use>
						</svg>
					</a>
					<div class="verticalCategories {{Request::url() == "home"?'is-open':''}}" id="verticalCategories" aria-hidden="true" tabindex="-1">
						<span class="mobileMenu-close fa fa-times"></span>
						<ul class="navPages-list navPages-list--categories">
							@foreach(App\Models\Category::all()->take(10) as  $category)
							<li class="navPages-item navPages-item--default ">
								<a class="navPages-action has-subMenu" href="{{route('category.show',str_replace(' ', '_',$category->name))}}">
									<i class="fa fa-shopping-bag"></i> {{$category->name}} 
									@if($category->brands->count() > 0)
									<span class=" has-subMenu" data-collapsible="navPages-vertical-{{$category->id}}">
										<i class="icon navPages-action-moreIcon" aria-hidden="true">
											<svg>
												<use xlink:href="#icon-chevron-right" />
											</svg>
										</i>
									</span>
									@endif
								</a>
								@if($category->brands->count() > 0)
								<div class="navPage-subMenu subMenu--default" id="navPages-vertical-{{$category->id}}" aria-hidden="true" tabindex="-1">
									<ul class="navPage-subMenu-list">
										@foreach($category->brands as $category_brand)
										<li class="navPage-subMenu-item">
											<a class="navPage-subMenu-action navPages-action has-subMenu" href="{{route('brand.show',str_replace(' ', '_',$category_brand->name))}}"> {{$category_brand->name}} 
												@if($category_brand->products->count() > 0)
												<span class=" has-subMenu" data-collapsible="navPages-vertical-{{$category_brand->id}}">
													<i class="icon navPages-action-moreIcon" aria-hidden="false">
														<svg>
															<use xlink:href="#icon-chevron-right" />
														</svg>
													</i>
												</span>
												@endif
											</a>
											@if($category_brand->products->count() > 0)
											<div class="navPage-subMenu subMenu--default subMenu--level2" id="navPages-vertical-{{$category_brand->id}}" aria-hidden="false" tabindex="-1">
												<ul class="navPage-childList">
													@foreach($category_brand->products->take(5) as $product)
													<li class="navPage-childList-item">
														<a class="navPage-subMenu-action navPages-action" href="{{route('product.show',$product->uuid)}}">{{$product->name}}</a>
													</li>
													@endforeach
												</ul>
											</div>
											@endif
										</li>
										@endforeach
									</ul>
								</div>
								@endif
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<a href="#" class="mobileMenu-toggle mobileMenu--vertical" data-mobile-menu-toggle="menu--verticalCategories" aria-controls="menu--verticalCategories">
					<span class="mobileMenu-toggleIcon"> Vertical Categories</span>
				</a>
			</div>
			<div class="header-bottom-right col-lg-9 col-md-10 col-9">
				<div class="row">
					<div class="header-bottom__search collapsed-block col-xl-9 col-lg-8 col-sm-8 col-4">
						<h5 class="search-info-heading  d-sm-none d-xl-none">
							<span class="expander btn btn-outline-secondary"> <i class="fa fa-search"></i> </span>
						</h5>
						<div class="sb-quickSearch search-info-content" aria-hidden="true" tabindex="-1" data-prevent-quick-search-close>
							<form class="sb-searchpro" method="GET">
								<fieldset class="form-fieldset">
									<div class="input-group">
										<input class="form-control form-input" data-search-quick name="keyword" value="{{@request()->keyword}}" id="search_query" data-error-message="Search field cannot be empty." placeholder="Search the store" autocomplete="off">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary" id="btn-quickSearch" type="submit"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</fieldset>
							</form>
							<div class="dropdown dropdown--quickSearch">
								<section class="quickSearchResults " data-bind="html: results"></section>
							</div>
						</div>
					</div>
					<div class="header-bottom__cart col-xl-3 col-lg-4 col-sm-4 col-8 text-right">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('slider')

<div class="section-slideshow">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-sm-12  offset-lg-3 block-slideshow">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-sm-12  col_qavo block-slideshow__left">
						<div class="slideshow ">
							<div class="heroCarousel " data-slick='{
									"dots": true,
									"arrows": false,
									"mobileFirst": false,
									"slidesToShow": 1,
									"slidesToScroll": 1,
									"autoplay": true,
									"autoplaySpeed": 15000
								}'>
								@foreach(App\Models\Slider::all() as $key => $slider)
								<div class="heroCarousel-slide " style="background-image: url({{asset($slider->image)}}">
									<a href="{{url('/')}}">
										<img class="heroCarousel-image lazyload" src="{{asset($slider->image)}}" style="height:510px;" alt="" title="" />
										<div class="heroCarousel-content heroCarousel-content--empty">
											<h1 class="heroCarousel-title">{{$slider->name}}</h1>
											{{-- <div class="heroCarousel-description">
												<h3 class="description-tilte">5 looks we love this month </h3>
												<span class="heroCarousel-action "><i class="fa fa-caret-right" aria-hidden="true"></i> See More</span>
											</div> --}}
										</div>
									</a>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 col-sm-12  col_jztu block-slideshow__right">
						<div class="module sb-banner sb-banner--slideshow ">
							<div class="block-content clearfix ">
								<div class="banners">
									<div class="banner-figure">
										<a href="#"><img class="img-fluid" src="{{asset(App\Models\Setting::sliderOneImage())}}" style="height:170px;width:250px;" alt="slideshow banner1" /></a>
									</div>
								</div>
								<div class="banners">
									<div class="banner-figure">
										<a href="#"><img class="img-fluid" src="{{asset(App\Models\Setting::sliderTwoImage())}}" style="height:170px;width:250px;" alt=" " /></a>
									</div>
								</div>
								<div class="banners">
									<div class="banner-figure">
										<a href="#"><img class="img-fluid" src="{{asset(App\Models\Setting::sliderThreeImage())}}" style="height:170px;width:250px;" alt=" " /></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="main-full ">
	@if(App\Models\Setting::enableCategoryOnHome() == '1')
	<div class="module sb-banner sb-banner--feature_category ">
		<h5 class="block-title"> Featured Categories</h5>
		<div class="block-content clearfix d-flex flex-row">
			@foreach(App\Models\Category::all()->take(5) as $category)
			<div class="banners">
				<div class="banner-figure">
					<a href="{{route('category.show',str_replace(' ', '_',$category->name))}}"><img class="img-fluid" src="{{asset($category->image)}}" alt="{{$category->name}}" /></a>
				</div>
				<div class="banner-figcaption">
					<div class="banner-figcaption__body">
						<h5 class="banner-figcaption__title">{{$category->name}}</h5>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endif
	<div class="module extraslider--home3 extraslider--banner_no  extraslider--feature">
		<h5 class="block-title"> News Products </h5>
		<div class="block-content row no-gutters">
			<div class="sb-extraslider-container col-sm-12">
				<section class="productCarousel products-list " data-slick='{
						"dots": false,
						"infinite": true,
						"mobileFirst": true,
						"slidesToShow": 1,
						"slidesToScroll": 1,
						"responsive": [
							{
									"breakpoint": 1260,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 5
									}
								},
								{
									"breakpoint": 991,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 3
									}
								},
								{
									"breakpoint": 400,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 2
										
									}
								},
								{
									"breakpoint": 0,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 1,
										"arrows": false
									}
								}
						]
					}'>
					@foreach($user_products as $key => $product)
					<div class="{{$key == 0?'first-side' : ''}} productCarousel-slide product-layout product-grid">
						<article class="product-item-container ">
							<div class="left-block d-flex align-items-center justify-content-center">
								<div class="product-card__gallery product-card__left d-none d-sm-block">
									@foreach($product->images as $image_key => $image)
									<div class="item-img {{$image_key == 0?'thumb-active':''}} " data-src="{{asset($image->image)}}">
										<img class="card-image lazyload" data-sizes="auto" width="41px" height="41px" src="{{asset($image->image)}}" 
										data-src="{{asset($image->image)}}" alt="{{$product->name.' '.$image_key }}" title="{{$product->name.' '.$image_key }}">
									</div>
									@endforeach
								</div>
								<a href="{{route('product.show',$product->uuid)}}" class="product-item-photo">
									<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($product->images->first()->image)}}" data-src="{{asset($product->images->first()->image)}}" alt="{{$product->name.' 0' }}" title="{{$product->name.' 0' }}">
								</a>
								{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
							</div>
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('product.show',$product->uuid)}}">{{$product->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">$ {{$product->price}}</span>
								</div>
								<div class="description"> {!! substr( $product->name, 0, 50) !!}... </div>
								<div class="product-colors" data-product-id="130"></div>
								<div class="button-group">
									<div class="action-item addToCart">
										<a href="{{route('product.show',$product->uuid)}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">Purchase</a>
									</div>
								</div>
							</div>
						</article>
					</div>
					@endforeach
				</section>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="module sb-banner sb-banner--blockBanner1 ">
		<div class="block-content clearfix d-flex flex-row">
			<div class="banners">
				<div class="banner-figure">
					<a href="#"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/4.jpg')}}" alt=" " /></a>
				</div>
			</div>
			<div class="banners">
				<div class="banner-figure">
					<a href="#"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/5.jpg')}}" alt=" " /></a>
				</div>
			</div>
		</div>
	</div>
	<div class="module clearfix ">
		<div id="sb-listing-tabs19" class="sb-listing-tabs">
			<div class="ltabs-heading d-flex">
				<h3 class="block-title"><a href="{{route('product.index')}}" >Products</a></h3>
				<div class="ltabs-tabs-wrap align-self-end">
					<span class='ltabs-tab-selected'></span>
					<span class="ltabs-tab-arrow">▼</span>
					<ul class="tabs ltabs-tabs" data-tab data-tab-sblisting role="tablist">
						{{-- @foreach($product_category->brands->take(4) as $key => $product_category_brand)
						<li class="tab {{$key==0?'is-active':''}}" role="presentation"><a class="tab-title" href="#tab-{{$product_category_brand->id}}" role="tab" tabindex="0" aria-selected="true" aria-controls="tab-{{$product_category_brand->id}}">{{$product_category_brand->name}}</a></li>
						@endforeach
					</ul> --}}
				</div>
			</div>
			<div class="ltabs-container d-flex">
				<div class="ltabs-items-image">
					<div class="banners">
						<div class="banner-figure">
							<a href="#" title="Fashion"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/6.jpg')}}" alt="Fashion" /></a>
						</div>
					</div>
				</div>
				<div class="ltabs-items-container ltabs-items-container--image">
					<section role="tabpanel" aria-hidden="false" class="tab-content is-active " id="tab-1" >
						<div class="products-list row" >
							@foreach($new_products as $product)
							<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
								<article class="product-item-container ">
									<div class="left-block d-flex align-items-center justify-content-center">
										<div class="product-card__gallery product-card__left d-none d-sm-block">
											@foreach($product->images as $image_key => $image)
											<div class="item-img {{$image_key == 0?'thumb-active':''}} " data-src="{{asset($image->image)}}">
												<img class="card-image lazyload" data-sizes="auto" width="41px" height="41px" src="{{asset($image->image)}}" 
												data-src="{{asset($image->image)}}" alt="{{$product->name.' '.$image_key }}" title="{{$product->name.' '.$image_key }}">
											</div>
											@endforeach
										</div>
										<a href="{{route('product.show',$product->uuid)}}" class="product-item-photo">
											<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($product->images->first()->image)}}" data-src="{{asset($product->images->first()->image)}}" alt="{{$product->name.' 0' }}" title="{{$product->name.' 0' }}">
										</a>
										{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
									</div>
									<div class="right-block">
										<h4 class="card-title">
											<a href="{{route('product.show',$product->uuid)}}">{{$product->name}}</a>
										</h4>
										<div class="price-section price-section--withoutTax ">
											<span data-product-price-without-tax class="price price--withoutTax">$ {{$product->price}}</span>
										</div>
										<div class="description"> {!! substr( $product->name, 0, 50) !!}... </div>
										<div class="product-colors" data-product-id="130"></div>
										<div class="button-group">
											<div class="action-item addToCart">
												<a href="{{route('product.show',$product->uuid)}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">Purchase</a>
											</div>
										</div>
									</div>
								</article>
							</div>
							@endforeach
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	@if(App\Models\Setting::enableServiceSection() == '1')
	<div class="module clearfix alignBanner--right">
		<div id="sb-listing-tabs20" class="sb-listing-tabs">
			<div class="ltabs-heading d-flex">
				<h3 class="block-title"><a href="{{route('services.index')}}">Services</a></h3>
				<div class="ltabs-tabs-wrap align-self-end">
					<span class='ltabs-tab-selected'></span>
					<span class="ltabs-tab-arrow">▼</span>
					<ul class="tabs ltabs-tabs" data-tab data-tab-sblisting role="tablist">
					</ul>
				</div>
			</div>
			<div class="ltabs-container d-flex">
				<div class="ltabs-items-container ltabs-items-container--image">
					
					<section role="tabpanel" aria-hidden="false" class="tab-content is-active" id="tab-service-1" >
						<div class="products-list row" >
							@foreach($serviceTypeUsers as $user)
							<div class="product-layout product-grid product-grid-4 col-lg-3 col-md-4 col-6">
								<article class="product-item-container ">
									<div class="left-block d-flex align-items-center justify-content-center">
										{{-- <div class="product-card__gallery product-card__left d-none d-sm-block">
											@foreach($product->images as $image_key => $image)
											<div class="item-img {{$image_key == 0?'thumb-active':''}} " data-src="{{asset($image->image)}}">
												<img class="card-image lazyload" data-sizes="auto" width="41px" height="41px" src="{{asset($image->image)}}" 
												data-src="{{asset($image->image)}}" alt="{{$product->name.' '.$image_key }}" title="{{$product->name.' '.$image_key }}">
											</div>
											@endforeach
										</div> --}}
										<a href="{{route('service.show',str_replace(' ', '_',$user->id))}}" class="product-item-photo">
											<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($user->image)}}" data-src="{{asset($user->image)}}" alt="{{$user->name.' 0' }}" title="{{$user->name.' 0' }}">
										</a>
										{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
									</div>
									<div class="right-block">
										<h4 class="card-title">
											<a href="{{route('service.show',str_replace(' ', '_',$user->id))}}">{!! substr( $user->name, 0, 15) !!}</a>
										</h4>
										<div class="price-section price-section--withoutTax ">
											<span data-product-price-without-tax class="price price--withoutTax">{{@$user->serviceType->name}}</span>
										</div>
										<div class="description"> {{@$user->service->name}} </div>
										<div class="product-colors" data-product-id="130"></div>
										<div class="button-group">
											<div class="action-item addToCart">
												<a href="{{route('service.show',str_replace(' ', '_',$user->id))}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">View Profile (<span style="color:green;"><i class="fa fa-eye"></i>{{$user->view}}</span>)</a>
											</div>
										</div>
									</div>
								</article>
							</div>
							@endforeach
						</div>
					</section>
				</div>
				<div class="ltabs-items-image">
					<div class="banners">
						<div class="banner-figure">
							<a href="#" title="Electronics"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/7.jpg')}}" alt="Electronics" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
	@if(App\Models\Setting::enablePostSection() == '1')
	<div class="module clearfix ">
		<div id="sb-listing-tabs21" class="sb-listing-tabs">
			<div class="ltabs-heading d-flex">
				<h3 class="block-title"><a href="#" title="Sports">Posts</a></h3>
				<div class="ltabs-tabs-wrap align-self-end">
					<span class='ltabs-tab-selected'></span>
					<span class="ltabs-tab-arrow">▼</span>
					<ul class="tabs ltabs-tabs" data-tab data-tab-sblisting role="tablist">
					</ul>
				</div>
			</div>
			<div class="ltabs-container d-flex">
				<div class="ltabs-items-image">
					<div class="banners">
						<div class="banner-figure">
							<a href="#" title="Sports"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/8.jpg')}}" alt="Sports" /></a>
						</div>
					</div>
				</div>
				<div class="ltabs-items-container ltabs-items-container--image">
					
					<section role="tabpanel" aria-hidden="false" class="tab-content is-active" id="tab-post-1" >
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
										<a href="{{route('product.show',str_replace(' ', '_',$post->name))}}" class="product-item-photo">
											<img class="img-responsive lazyload" data-sizes="auto" src="{{asset($post->images->first()->image)}}" data-src="{{asset($post->images->first()->image)}}" alt="{{$post->name.' 0' }}" title="{{$post->name.' 0' }}">
										</a>
										{{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
									</div>
									<div class="right-block">
										<h4 class="card-title">
											<a href="{{route('product.show',str_replace(' ', '_',$post->name))}}">{{$post->name}}</a>
										</h4>
										<div class="price-section price-section--withoutTax ">
											{{-- <span data-product-price-without-tax class="price price--withoutTax">{{$product->price}}</span> --}}
										</div>
										<div class="description"> {!! substr( $product->description, 0, 50) !!}... </div>
										<div class="product-colors" data-product-id="130"></div>
										<div class="button-group">
											<div class="action-item addToCart">
												<a href="{{route('product.show',str_replace(' ', '_',$post->name))}}"  data-wait-message="Add to Cart" class="action-link  button--cart" title="Add to Cart">View</a>
											</div>
										</div>
									</div>
								</article>
							</div>
							@endforeach
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="module sb-banner sb-banner--blockBanner2 ">
		<div class="block-content clearfix ">
			<div class="banners">
				<div class="banner-figure">
					<a href="#"><img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home2/4.jpg')}}" alt=" " /></a>
				</div>
			</div>
		</div>
	</div>
	@if(App\Models\Setting::enableCountryCityOnHome() == '1')
	<div class="module extraslider--home1 extraslider--banner_left  extraslider--new">
		<h5 class="block-title"> Countries </h5>
		<div class="block-content row no-gutters">
			<div class="sb-extraslider-image col-sm-6 d-none d-sm-block">
				<div class="banners">
					<div class="banner-figure">
						<a href="#">
							<img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/countries.jpg')}}" alt="banner" />
						</a>
					</div>
				</div>
			</div>
			<div class="sb-extraslider-container col-sm-6 col-12">
				<section class="productCarousel products-list " 
						data-slick='{
							"dots": false,
							"infinite": true,
							"mobileFirst": true,
							"slidesToShow": 1,
							"slidesToScroll": 1,
							"responsive": [
								{
									"breakpoint": 1260,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 1
									}
								},
								{
									"breakpoint": 800,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 1
									}
								},
								{
									"breakpoint": 550,
									"settings": {
										"slidesToScroll": 1,
										"slidesToShow": 1
									}
								}
							]
						}'>
					<div class="first-side productCarousel-slide product-layout product-list">
						@foreach($countries->take(3) as $country)
						<article class="product-item-container ">
							<div class="left-block">
								<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($country->image)}}" data-src="{{asset($country->image)}}" alt="{{$country->name}}" width="85" height="85">
								</a>
							</div>
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}">{{$country->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$country->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
					<div class="productCarousel-slide product-layout product-list">
						@foreach($countries->take(6)->skip(3) as $country)
						<article class="product-item-container ">
							<div class="left-block">
								<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($country->image)}}" data-src="{{asset($country->image)}}" alt="{{$country->name}}" width="85" height="85">
								</a>
							</div>
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}">{{$country->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$country->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
					<div class="productCarousel-slide product-layout product-list">
						@foreach($countries->take(9)->skip(6) as $country)
						<article class="product-item-container ">
							<div class="left-block">
								<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($country->image)}}" data-src="{{asset($country->image)}}" alt="{{$country->name}}" width="85" height="85">
								</a>
							</div>
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('country.show',str_replace(' ', '_',$country->name))}}">{{$country->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$country->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="module extraslider--home1 extraslider--banner_left extraslider--featured">
		<h5 class="block-title"> Cities </h5>
		<div class="block-content row no-gutters">
			<div class="sb-extraslider-image col-sm-6 d-none d-sm-block">
				<div class="banners">
					<div class="banner-figure">
						<a href="#">
							<img class="img-fluid" src="{{asset('revo_template/s-3zqjz60dg3/content/site/banner/home1/cities.jpg')}}" alt="banner" />
						</a>
					</div>
				</div>
			</div>
			<div class="sb-extraslider-container col-sm-6 col-12">
				<section class="productCarousel products-list " data-slick='{
						"dots": false,
						"infinite": true,
						"mobileFirst": true,
						"slidesToShow": 1,
						"slidesToScroll": 1,
						"responsive": [
							{
								"breakpoint": 1260,
								"settings": {
									"slidesToScroll": 1,
									"slidesToShow": 1
								}
							},
							{
								"breakpoint": 800,
								"settings": {
									"slidesToScroll": 1,
									"slidesToShow": 1
								}
							},
							{
								"breakpoint": 550,
								"settings": {
									"slidesToScroll": 1,
									"slidesToShow": 1
								}
							}
						]
					}'>
					<div class="first-side productCarousel-slide product-layout product-list">
						@foreach($cities->take(3) as $city)
						<article class="product-item-container ">
							{{-- <div class="left-block">
								<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($city->image)}}" data-src="{{asset($city->image)}}" alt="{{$city->name}}" width="85" height="85">
								</a>
							</div> --}}
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}">{{$city->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$city->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
					<div class="productCarousel-slide product-layout product-list">         
						@foreach($cities->take(6)->skip(3) as $city)
						<article class="product-item-container ">
							{{-- <div class="left-block">
								<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($city->image)}}" data-src="{{asset($city->image)}}" alt="{{$city->name}}" width="85" height="85">
								</a>
							</div> --}}
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}">{{$city->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$city->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
					<div class="productCarousel-slide product-layout product-list">
						@foreach($cities->take(9)->skip(6) as $city)
						<article class="product-item-container ">
							{{-- <div class="left-block">
								<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}" class="product-item-photo">
									<img class="card-image lazyload" data-sizes="auto" src="{{asset($city->image)}}" data-src="{{asset($city->image)}}" alt="{{$city->name}}" width="85" height="85">
								</a>
							</div> --}}
							<div class="right-block">
								<h4 class="card-title">
									<a href="{{route('city.show',str_replace(' ', '_',$city->name))}}">{{$city->name}}</a>
								</h4>
								<div class="price-section price-section--withoutTax ">
									<span data-product-price-without-tax class="price price--withoutTax">{{$city->users->count()}}</span>
								</div>
							</div>
						</article>
						@endforeach
					</div>
				</section>
			</div>
		</div>
	</div>
	@endif
	<div class="module sb-latestblog">
		<h5 class="block-title"> From our blog </h5>
		<div class="block-content">
			<div class="latest-blog--carousel " data-slick='{
					"dots": false,
					"infinite": false,
					"mobileFirst": true,
					"slidesToShow": 1,
					"slidesToScroll": 2,
					"responsive": [
						{
							"breakpoint": 1200,
							"settings": {
								"slidesToScroll": 1,
								"slidesToShow": 3
							}
						},
						{
						"breakpoint": 991,
							"settings": {
								"slidesToScroll": 1,
								"slidesToShow": 2
							}
						},
						{
							"breakpoint": 400,
							"settings": {
								"slidesToScroll": 1,
								"slidesToShow": 2
								
							}
						},
						{
							"breakpoint": 0,
							"settings": {
								"slidesToScroll": 1,
								"slidesToShow": 1,
								"arrows": false
							}
						}
					]
				}'>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/at-vero-eos-et-accusam/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/9.jpg?t=1517842614" alt="At vero eos et accusam" title="At vero eos et accusam">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/at-vero-eos-et-accusam/index.html">At vero eos et accusam</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 5th Feb 2018 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/at-vero-eos-et-accusam/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/mauros-dan-cosmo-iriure-dolor/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/8.jpg?t=1517842522" alt="Mauros dan cosmo iriure dolor" title="Mauros dan cosmo iriure dolor">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/mauros-dan-cosmo-iriure-dolor/index.html">Mauros dan cosmo iriure dolor</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 5th Feb 2018 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/mauros-dan-cosmo-iriure-dolor/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/duis-autem-vel-eum-iriure-dolor-ac001c/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/6.jpg?t=1517842344" alt="Duis autem vel eum iriure dolor" title="Duis autem vel eum iriure dolor">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/duis-autem-vel-eum-iriure-dolor-ac001c/index.html">Duis autem vel eum iriure dolor</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 5th Feb 2018 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/duis-autem-vel-eum-iriure-dolor-ac001c/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/consetetur-sadipscing-elitr-52d34d/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/7.jpg?t=1517842387" alt="Consetetur sadipscing elitr" title="Consetetur sadipscing elitr">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/consetetur-sadipscing-elitr-52d34d/index.html">Consetetur sadipscing elitr</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 5th Feb 2018 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/consetetur-sadipscing-elitr-52d34d/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/stet-clita-kasd-gubergren/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/5.jpg?t=1517842332" alt="Stet clita kasd gubergren" title="Stet clita kasd gubergren">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/stet-clita-kasd-gubergren/index.html">Stet clita kasd gubergren</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 16th Sep 2017 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/stet-clita-kasd-gubergren/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
				<div class="productCarousel-slide">
					<article class="blog-post product-grid">
						<div class="blog-post-figure">
							<figure class="blog-thumbnail">
								<a href="blog/duis-autem-vel-eum-iriure/index.html">
									<img data-sizes="auto" class="img-fluid lazyload " src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-3zqjz60dg3/images/stencil/464x320/uploaded_images/4.jpg?t=1517842320" alt="Duis autem vel eum iriure" title="Duis autem vel eum iriure">
								</a>
							</figure>
						</div>
						<div class="blog-header">
							<h2 class="blog-title">
								<a href="blog/duis-autem-vel-eum-iriure/index.html">Duis autem vel eum iriure</a>
							</h2>
							<div class="blog-meta">
								<span class="blog-author"><i class="fa fa-user"></i>bigecommerce </span>
								<span class="blog-date"><i class="fa fa-clock-o"></i> 16th Jun 2017 </span>
							</div>
						</div>
						<div class="blog-post-body">
							<div class="clear"></div>
							<a href="blog/duis-autem-vel-eum-iriure/index.html" class="btn--readmore"> <i class="fa fa-caret-right"></i> Read More</a>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	
	function search_user()
	{
		user = $('#search_user').val();
		$('#user_text').html("");	
		event.preventDefault();
		$.ajax({
			url: '{{url("search_user")}}',
			type: 'POST',
			headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			dataType: 'JSON',
			data: {
				'user': user,
			},
		})
		.done(function (response) {
			$('#user_text').html(response.html);
		});
	}
</script>
@endsection