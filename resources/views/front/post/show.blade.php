@extends('front.layout.post_index')
@section('meta')
    
<title>{{$post->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="{!! $post->description !!}">

<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{!! $post->name !!} | {{@$post->category->name}} | {{@$post->brand->name}} | {{@$post->city->name}}" />
<meta property="og:description" content="{!! $post->description !!}" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:site_name" content="BUYEBAZAR.COM" />
<meta property="article:publisher" content="{{url(App\Models\Setting::facebook())}}" />
<meta property="og:image" content="{{asset($post->images->first()->image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{!! $post->name !!} | {{@$post->category->name}} | {{@$post->brand->name}} | {{@$post->city->name}}" />
<meta name="twitter:description" content="{!! $post->description !!}" />
<meta name="twitter:image" content="{{asset($post->images->first()->image)}}" />
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
		  <a href="{{url('posts')}}" class="breadcrumb-label">Post</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('posts')}}" class="breadcrumb-label">{{$post->name}}</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar-posts')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	      <div class="productView">
                        <section class="productView-images" data-image-gallery>
                           <figure class="productView-image"
                              data-image-gallery-main
                              data-zoom-image="{{asset($post->images->first()->image)}}"
                              >
                              <a class="productView-image-main " target="_blank" href="{{asset($post->images->first()->image)}}">
                              <img class="productView-image--default lazyload" 
                                 data-sizes="auto" 
                                 src="{{asset($post->images->first()->image)}}" 
                                 data-src="{{asset($post->images->first()->image)}}"
                                 alt="{{$post->name}}" title="{{$post->name}}" data-main-image>
                              </a>
                           </figure>
                           <div class="btn-productViewzoom text-center">
                              <button class="btn btn-outline-secondary" id="btn-productViewzoom" type="submit"><i class="fa fa-search"></i>  Click to zoom in</button>
                           </div>
                           <ul class="productView-thumbnails">
							 @foreach($post->images as $image_key => $image)
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
                        <section class="productView-details">
                           <div class="productView-product">
                              <p class="productView-brand" itemprop="brand" itemscope itemtype="http://schema.org/Brand">
                                 <a href="{{route('post.show',str_replace(' ', '_',$post->name))}}" itemprop="url"><span itemprop="name">{{@$post->category->name}}</span></a>
                              </p>
                              <h1 class="productView-title" itemprop="name">{{$post->name}}</h1>
                              <div class="productView-price">
                                 <div class="price-section price-section--withoutTax "  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock">
                                    <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition">
                                    <div itemprop="priceSpecification" itemscope itemtype="http://schema.org/PriceSpecification">
                                       <meta itemprop="price" content="300">
                                       <meta itemprop="priceCurrency" content="USD">
                                       <meta itemprop="valueAddedTaxIncluded" content="false">
                                    </div>
                                    <span data-product-price-without-tax class="price price--withoutTax">{{$post->brand->name}}</span>
                                    {{-- <span data-product-price-without-tax class="price price--noSaleWithoutTax">$340.00</span> --}}
                                 </div>
                              </div>
                              <div class="productView-info">
                                 @if($post->user_id)
                                    @if(!$post->user->hide_profile)
                                    <a class="image-popup-sizechart" href="{{route('user.chat.user',$post->user_id)}}">
                                       <i class="fa fa-photo" aria-hidden="true"></i>
                                       Chat 
                                    </a>
                                    @endif
                                    @if($post->user->address)
                                    <div style="margin-top:5px;">
                                       <a href="https://www.google.com.sa/maps/search/{{@$post->user->address}}?hl=en" target="_blank">
                                             <img src="{{asset('map.jpeg')}}" alt="">
                                       </a>
                                    </div>
                                    @endif
                                    @if($post->user->description)
                                    <p style="margin-top:5px;">{!! @$post->user->description !!}</p>
                                    @endif
                                    @if($post->user->phone)
                                    <p><b>Phone :</b> {{@$post->user->phone}}</p>
                                    @endif
                                    @if($post->user->address)
                                    <p><b>Address :</b> {{@$post->user->address}}</p>
                                    @endif
                                    @if($post->user->martial_status)
                                    <p><b>Martial Status :</b> {{@$post->user->martial_status}}</p>
                                    @endif
                                    @if($post->user->religion)
                                    <p><b>Religion :</b> {{@$post->user->religion}}</p>
                                    @endif
                                    @if($post->user->blood_group)
                                    <p><b>Blood Group :</b> {{@$post->user->blood_group}}</p>
                                    @endif
                                    @if($post->user->education)
                                    <p><b>Education :</b> {{@$post->user->education}}</p>
                                    @endif
                                    @if($post->user->profession)
                                    <p><b>Profession :</b> {{@$post->user->profession}}</p>
                                    @endif
                                 @else 
                                    <a class="image-popup-sizechart" href="{{route('user.chat.admin')}}">
                                       <i class="fa fa-photo" aria-hidden="true"></i>
                                       Chat 
                                    </a>
                                 @endif
                                 
                              </div>
                           </div>
                        </section>
                        <section class="productView-details ">
                        </section>
                        <section class="productView-details productView-details--bottom">
                           <div class="module sb-banner sb-banner--buyFromus ">
                              <h5 class="block-title"> Share To :</h5>
                              <div class="block-content clearfix d-flex flex-row">
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://www.facebook.com/sharer.php?u={{Request::url()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/f.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://twitter.com/intent/tweet?text={{$post->name}}&url={{Request::url()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://www.linkedin.com/sharing/share-offsite/?url={{Request::url()}}&via=BUYEBAZAR.COM" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/in.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://wa.me/?text=={{Request::url()}}&via=BUYEBAZAR.COM" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/w.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                              </div>
                           </div> 
                        </section>
                        <article class="productView-description horizontal-tabs"  itemprop="description">
                           <ul class="tabs " data-tab>
                              <li class="tab is-active">
                                 <a class="tab-title" href="#tab-description">Description</a>
                              </li>
                           </ul>
                           <div class="tabs-contents ">
                              <div class="tab-content is-active" id="tab-description">
                                 {{-- <p><span style="font-family: helvetica, geneva, arial; font-size: small;"><span style="font-family: Helvetica; font-size: small;">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there's no limit to what you can achieve. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Offering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple's ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Housed in a new aluminum design, the display has a very thin bezel that enhances visual accuracy. Each display features two FireWire 400 ports and two USB 2.0 ports, making attachment of desktop peripherals, such as iSight, iPod, digital and still cameras, hard drives, printers and scanners, even more accessible and convenient. Taking advantage of the much thinner and lighter footprint of an LCD, the new displays support the VESA (Video Electronics Standards Association) mounting interface standard. Customers with the optional Cinema Display VESA Mount Adapter kit gain the flexibility to mount their display in locations most appropriate for their work environment. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features a single cable design with elegant breakout for the USB 2.0, FireWire 400 and a pure digital connection using the industry standard Digital Video Interface (DVI) interface. The DVI connection allows for a direct pure-digital connection.<br /> </span></span></p> --}}
                                 <p>{!! $post->description !!}</p>                              
                              </div>
                           </div>
                        </article>
                     </div>
	</main>
 </div>
@endsection