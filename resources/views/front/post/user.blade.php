@extends('front.layout.index')
@section('meta')
    
<title>{{$user->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
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
		  <a href="{{url('our_service')}}" class="breadcrumb-label">Service Provider</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('our_service')}}" class="breadcrumb-label">{{$user->name}}</a>
	   </li>
	</ul>
 </div>
 <div class="row page">
	@include('front.layout.partials.sidebar')
	<main class="col-lg-9 col-md-12 page-content" id="product-listing-container">
	      <div class="productView">
                        <section class="productView-images" data-image-gallery>
                           <figure class="productView-image"
                              data-image-gallery-main
                              data-zoom-image="{{asset($user->image)}}"
                              >
                              <a class="productView-image-main " target="_blank" href="{{asset($user->image)}}">
                              <img class="productView-image--default lazyload" 
                                 data-sizes="auto" 
                                 src="{{asset($user->image)}}" 
                                 data-src="{{asset($user->image)}}"
                                 alt="{{$user->name}}" title="{{$user->name}}" data-main-image>
                              </a>
                           </figure>
                           <div class="btn-productViewzoom text-center">
                              <button class="btn btn-outline-secondary" id="btn-productViewzoom" type="submit"><i class="fa fa-search"></i>  Click to zoom in</button>
                           </div>			
                        </section>
                        <section class="productView-details">
                           <div class="productView-product">
                              <h1 class="productView-title" itemprop="name">{{$user->name}}</h1>
                              <div class="productView-info">
									<a class="image-popup-sizechart" href="{{route('user.chat.user',$user->id)}}">
										<i class="fa fa-photo" aria-hidden="true"></i>
										Chat 
									</a>
                                 <dl class="productView-info-dl">
									@if($user->address)
                                    <dt class="productView-info-name">Address :</dt>
                                    <dd class="productView-info-value"><a href="https://www.google.com.sa/maps/search/{{@$user->address}}?hl=en" target="_blank" itemprop="url"><span itemprop="name">{{@$user->address}}</span></a></dd>
                                    @endif
									@if($user->phone)
                                    <dt class="productView-info-name">Phone :</dt>
                                    <dd class="productView-info-value"><a href="tel:{{@$user->phone}}"  itemprop="url"><span itemprop="name">{{@$user->phone}}</span></a></dd>
                                     @endif
									 @if($user->martial_status)
									 <dt class="productView-info-name">Martial Status :</dt>
                                    <dd class="productView-info-value">{{$user->martial_status}}</dd>
                                 	@endif
									 @if($user->religion)
									 <dt class="productView-info-name">Religion :</dt>
                                    <dd class="productView-info-value">{{$user->religion}}</dd>
                                 	@endif
									 @if($user->blood_group)
									 <dt class="productView-info-name">Blood Group :</dt>
                                    <dd class="productView-info-value">{{$user->blood_group}}</dd>
                                 	@endif
									 @if($user->education)
									 <dt class="productView-info-name">Education :</dt>
                                    <dd class="productView-info-value">{{$user->education}}</dd>
                                 	@endif
									 @if($user->profession)
									 <dt class="productView-info-name">Profession :</dt>
                                    <dd class="productView-info-value">{{$user->profession}}</dd>
                                 	@endif
									 <dt class="productView-info-name">Views :</dt>
                                    <dd class="productView-info-value">{{$user->view}}</dd>
                                 </dl>
                              </div>
                           </div>
                        </section>
                        <section class="productView-details productView-details--bottom">
                           <div class="module sb-banner sb-banner--buyFromus ">
                              <h5 class="block-title"> Social Links To :</h5>
                              <div class="block-content clearfix d-flex flex-row">
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->facebook}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/f.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->twitter}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->linkedin}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/in.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://api.whatsapp.com/send?phone={{@$user->whatsapp}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/w.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                            </div>
                              <div class="block-content clearfix d-flex flex-row">
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->youtube}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/y.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->instagram}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/i.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->tiktok}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/tt.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$user->snack_video}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/s.png')}}"  alt="reasons 1"  /></a>
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
                              <li class="tab">
                                 <a class="tab-title" href="#tab-comments">View User Products</a>
                              </li>
                           </ul>
                           <div class="tabs-contents ">
                              <div class="tab-content is-active" id="tab-description">
                                 <p><span style="font-family: helvetica, geneva, arial; font-size: small;"><span style="font-family: Helvetica; font-size: small;">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there's no limit to what you can achieve. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Offering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple's ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Housed in a new aluminum design, the display has a very thin bezel that enhances visual accuracy. Each display features two FireWire 400 ports and two USB 2.0 ports, making attachment of desktop peripherals, such as iSight, iPod, digital and still cameras, hard drives, printers and scanners, even more accessible and convenient. Taking advantage of the much thinner and lighter footprint of an LCD, the new displays support the VESA (Video Electronics Standards Association) mounting interface standard. Customers with the optional Cinema Display VESA Mount Adapter kit gain the flexibility to mount their display in locations most appropriate for their work environment. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features a single cable design with elegant breakout for the USB 2.0, FireWire 400 and a pure digital connection using the industry standard Digital Video Interface (DVI) interface. The DVI connection allows for a direct pure-digital connection.<br /> </span></span></p>
                                 <p>{!! $user->description !!}</p>                              
                              </div>
                              <div class="tab-content" id="tab-comments">
                                
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
                                    @foreach($user->products as $key => $product)
                                    <div class="{{$key == 0?'first-side' : ''}} productCarousel-slide product-layout product-grid">
                                       <article class="product-item-container ">
                                          <div class="left-block d-flex align-items-center justify-content-center">
                                             <a href="{{route('product.show',$product->uuid)}}" class="product-item-photo">
                                                <img class="img-responsive lazyload" data-sizes="auto" @if($product->images->first()->image) src="{{asset($product->images->first()->image)}}" data-src="{{asset($product->images->first()->image)}}"@endif alt="{{$product->name}}" title="{{$product->name}}">
                                             </a>
                                             {{-- <a href="#" class="quickview btn-button d-none d-md-block" data-animation="false" data-product-id="130" title="Quick view"> <i class="fa fa-search"></i></a> --}}
                                          </div>
                                          <div class="right-block">
                                             <h4 class="card-title">
                                                <a href="{{route('product.show',$product->uuid)}}">{{$product->name}}</a>
                                             </h4>
                                             <p>{!! $product->description !!}</p>
                                          </div>
                                       </article>
                                    </div>
                                    @endforeach
                                 </section>
                                 <!-- snippet location reviews -->
                              </div>
                           </div>
                        </article>
                     </div>
	</main>
 </div>
@endsection
@section('scripts')
@endsection