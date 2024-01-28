@extends('front.layout.index')
@section('meta')
    
<title>{{$product->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="{!! $product->description !!}">

<meta property="og:locale" content="en_GB" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{!! $product->name !!} | {{@$product->category->name}} | {{@$product->brand->name}} | {{@$product->city->name}}" />
<meta property="og:description" content="{!! $product->description !!}" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:site_name" content="BUYEBAZAR.COM" />
<meta property="article:publisher" content="{{url(App\Models\Setting::facebook())}}" />
<meta property="og:image" content="{{asset($product->images->first()->image)}}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{!! $product->name !!} | {{@$product->category->name}} | {{@$product->brand->name}} | {{@$product->city->name}}" />
<meta name="twitter:description" content="{!! $product->description !!}" />
<meta name="twitter:image" content="{{asset($product->images->first()->image)}}" />
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
		  <a href="{{url('products')}}" class="breadcrumb-label">Product</a>
	   </li>
	   <li class="breadcrumb-item is-active">
		  <a href="{{url('products')}}" class="breadcrumb-label">{{$product->name}}</a>
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
                              data-zoom-image="{{asset($product->images->first()->image)}}"
                              >
                              <a class="productView-image-main " target="_blank" href="{{asset($product->images->first()->image)}}">
                              <img class="productView-image--default lazyload" 
                                 data-sizes="auto" 
                                 src="{{asset($product->images->first()->image)}}" 
                                 data-src="{{asset($product->images->first()->image)}}"
                                 alt="{{$product->name}}" title="{{$product->name}}" data-main-image>
                              </a>
                           </figure>
                           <div class="btn-productViewzoom text-center">
                              <button class="btn btn-outline-secondary" id="btn-productViewzoom" type="submit"><i class="fa fa-search"></i>  Click to zoom in</button>
                           </div> 
                           <ul class="productView-thumbnails">
							 @foreach($product->images as $image_key => $image)
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
                                 <a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" itemprop="url"><span itemprop="name">{{@$product->category->name}}</span></a>
                              </p>
                              <h1 class="productView-title" itemprop="name">{{$product->name}}</h1>
                              <div class="productView-price">
                                 <div class="price-section price-section--withoutTax "  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock">
                                    <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition">
                                    <div itemprop="priceSpecification" itemscope itemtype="http://schema.org/PriceSpecification">
                                       <meta itemprop="price" content="300">
                                       <meta itemprop="priceCurrency" content="USD">
                                       <meta itemprop="valueAddedTaxIncluded" content="false">
                                    </div>
                                    <span data-product-price-without-tax class="price price--withoutTax">$ {{$product->price}}</span>
                                    {{-- <span data-product-price-without-tax class="price price--noSaleWithoutTax">$340.00</span> --}}
                                 </div>
                              </div>
                              <div class="productView-info">
								@if($product->user_id)
									@if(!$product->user->hide_profile)
									<a class="image-popup-sizechart" href="{{route('user.chat.user',$product->user_id)}}">
										<i class="fa fa-photo" aria-hidden="true"></i>
										Chat 
									</a>
									@endif
								 @else 
									<a class="image-popup-sizechart" href="{{route('user.chat.admin')}}">
										<i class="fa fa-photo" aria-hidden="true"></i>
										Chat 
									</a>
								 @endif
								 <a class="image-popup-sizechart" href="{{route('user.product.create')}}">
									 <i class="fa fa-photo" aria-hidden="true"></i>
									 Product 
								 </a>
                                 <dl class="productView-info-dl">
                                    <dt class="productView-info-name">Category</dt>
                                    <dd class="productView-info-value"><a href="{{route('category.show',str_replace(' ', '_',@$product->category->name))}}" itemprop="url"><span itemprop="name">{{@$product->category->name}}</span></a></dd>
                                    <dt class="productView-info-name">Brand</dt>
                                    <dd class="productView-info-value"><a href="{{route('brand.show',str_replace(' ', '_',@$product->brand->name))}}" itemprop="url"><span itemprop="name">{{@$product->brand->name}}</span></a></dd>
                                    <dt class="productView-info-name">Country</dt>
                                    <dd class="productView-info-value"><a href="{{route('country.show',str_replace(' ', '_',@$product->country->name))}}" itemprop="url"><span itemprop="name">{{@$product->country->name}}</span></a></dd>
                                    <dt class="productView-info-name">City</dt>
                                    <dd class="productView-info-value"><a href="{{route('city.show',str_replace(' ', '_',@$product->city->name))}}" itemprop="url"><span itemprop="name">{{@$product->city->name}}</span></a></dd>
									         <dt class="productView-info-name">View:</dt>
                                    <dd class="productView-info-value">{{$product->view}}</dd>
                                    @if($product->stock > 0)
                                    <dt class="productView-info-name">Stock For Sale</dt>
                                    <dd class="productView-info-value"><a href="{{route('city.show',str_replace(' ', '_',@$product->city->name))}}" itemprop="url"><span itemprop="name">{{@$product->stock}}</span></a></dd>
                                    @endif
                                    @if($product->user_id  && !@$product->user->hide_profile)
                                       <dt class="productView-info-name">Product Of</dt>
                                       <dd class="productView-info-value"><a href="{{route('product.user',$product->user_id)}}" itemprop="url" style="color:blue;"><span itemprop="name">{{@$product->user->name}}</span></a></dd>
                                       @if($product->user->address)
                                          <dt class="productView-info-name">Address :</dt>
                                          <dd class="productView-info-value"><a href="https://www.google.com.sa/maps/search/{{@$product->user->address}}?hl=en"  style="color:green;" target="_blank" itemprop="url"><span itemprop="name">{{@$product->user->address}}</span></a></dd>
                                       @endif
                                       @if($product->user->phone)
                                          <dt class="productView-info-name">Phone :</dt>
                                          <dd class="productView-info-value"><a href="tel:{{@$product->user->phone}}"  style="color:green;"  itemprop="url"><span itemprop="name">{{@$product->user->phone}}</span></a></dd>
                                       @endif
                                    @endif
                                 </dl>
                              </div>
                              
                              <div class="col-sm-12" style="margin-top:5px;">
                                 <input type="text" class="form-control" id="link_area"  value="{{route('product.show',str_replace(' ', '_',$product->name))}}"  readonly>
                                 <br>
                                 <button type="button" class="copy-button btn btn-dark  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Share</button>
                              </div>
                           </div>
                        </section>
                        <section class="productView-details ">
                           <div class="productView-options">
								@if($product->stock > 0 && App\Models\Setting::enablepurchase() == 1)
									<a href="{{route('user.product.order',$product->id)}}" class="button button--primary button--addtocart">Purchase</a>
								@else 
								{{-- <a href="#" class="button button--primary button--addtocart">Out Of Stock</a> --}}
								@endif
							</div>
                        </section>
                        <section class="productView-details productView-details--bottom">
							<div class="module sb-banner sb-banner--buyFromus ">
							   <div class="block-content clearfix d-flex flex-row">
								  <div class="banners"  >
									 <div class="banner-figure">
										 <form action="{{route('product.like',$product->id)}}" method="GET">
											 @csrf
											 <button class="btn btn-success" >Like ({{$product->like}})</button>
										 </form>
									 </div>
								  </div>
								  <div class="banners"  >
									 <div class="banner-figure">
										 <form action="{{route('product.dislike',$product->id)}}" method="GET">
											 @csrf
											 <button class="btn btn-danger" >Disike ({{$product->dislike}})</button>
										 </form>
									 </div>
								  </div>
							   </div>
							</div>
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
                                       <a href="https://twitter.com/intent/tweet?text={{$product->name}}&url={{Request::url()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
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
                        
                        <section class="productView-details productView-details--bottom">
                           <div class="module sb-banner sb-banner--buyFromus ">
                              <h5 class="block-title"> Social Links To :</h5>
                              <div class="block-content clearfix d-flex flex-row">
                                 @if($product->facebook)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->facebook}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/f.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->twitter)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->twitter}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->linkedin)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->linkedin}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/in.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->whatsapp)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="https://api.whatsapp.com/send?phone={{@$product->whatsapp}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/w.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                              </div>
                              <div class="block-content clearfix d-flex flex-row">
                                 @if($product->youtube)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->youtube}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/y.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->instagram)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->instagram}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/i.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->tiktok)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->tiktok}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/tt.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                                 @if($product->snack_video)
                                 <div class="banners"  >
                                    <div class="banner-figure">
                                       <a href="{{@$product->snack_video}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/s.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                 </div>
                                 @endif
                              </div>
                           </div> 
                        </section>
                        <article class="productView-description horizontal-tabs"  itemprop="description">
                           <ul class="tabs " data-tab>
                              <li class="tab is-active">
                                 <a class="tab-title" href="#tab-description">Description</a>
                              </li>
                              <li class="tab">
                                 <a class="tab-title" href="#tab-comments">View Comments</a>
                              </li>
                              <li class="tab">
                                 <a class="tab-title" href="#tab-review">Add Comments</a>
                              </li>
                           </ul>
                           <div class="tabs-contents ">
                              <div class="tab-content is-active" id="tab-description">
                                 {{-- <p><span style="font-family: helvetica, geneva, arial; font-size: small;"><span style="font-family: Helvetica; font-size: small;">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the tools and palettes needed to edit, format and composite your work. Combine this display with a Mac Pro, MacBook Pro, or PowerMac G5 and there's no limit to what you can achieve. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features an active-matrix liquid crystal display that produces flicker-free images that deliver twice the brightness, twice the sharpness and twice the contrast ratio of a typical CRT display. Unlike other flat panels, it's designed with a pure digital interface to deliver distortion-free images that never need adjusting. With over 4 million digital pixels, the display is uniquely suited for scientific and technical applications such as visualizing molecular structures or analyzing geological data. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Offering accurate, brilliant color performance, the Cinema HD delivers up to 16.7 million colors across a wide gamut allowing you to see subtle nuances between colors from soft pastels to rich jewel tones. A wide viewing angle ensures uniform color from edge to edge. Apple's ColorSync technology allows you to create custom profiles to maintain consistent color onscreen and in print. The result: You can confidently use this display in all your color-critical applications. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">Housed in a new aluminum design, the display has a very thin bezel that enhances visual accuracy. Each display features two FireWire 400 ports and two USB 2.0 ports, making attachment of desktop peripherals, such as iSight, iPod, digital and still cameras, hard drives, printers and scanners, even more accessible and convenient. Taking advantage of the much thinner and lighter footprint of an LCD, the new displays support the VESA (Video Electronics Standards Association) mounting interface standard. Customers with the optional Cinema Display VESA Mount Adapter kit gain the flexibility to mount their display in locations most appropriate for their work environment. <br /> <br /> </span><span style="font-family: Helvetica; font-size: small;">The Cinema HD features a single cable design with elegant breakout for the USB 2.0, FireWire 400 and a pure digital connection using the industry standard Digital Video Interface (DVI) interface. The DVI connection allows for a direct pure-digital connection.<br /> </span></span></p> --}}
                                 <p>{!! $product->description !!}</p>                              
                              </div>
                              <div class="tab-content" id="tab-comments">
                                 <ul class="yt-clearfix yt-accordion">
                                    @foreach($product->comments as $key => $comment)
                                    <li class="yt-accordion-group">
                                       <h3 class="accordion-heading enable"><img src="{{asset($comment->image)}}" height="30" width="30" alt=""> {{$comment->name}}</h3>
                                       <div class="yt-accordion-inner ">
                                          <p>{!! $comment->message !!}</p>
                                       </div>
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                              <div class="tab-content" id="tab-review">
                                 <section class="toggle productReviews" id="product-reviews" data-product-reviews>
                                    @if (Auth::guard('user')->check())
                                       <form  class="form" enctype="multipart/form-data" action="{{route('user.product_comment.store')}}" method="post">
                                          @csrf
                                          <input type="hidden" name="product_id" value="{{$product->id}}">      
                                          <input type="hidden" name="email" value="{{request()->session()->get('email')}}">      
                                          <input type="hidden" name="name"  value="{{request()->session()->get('name')}}">      
                                          <div class="form-field">
                                             <label class="form-label" for="contact_question">Image
                                                <small>Required</small>
                                             </label>
                                             <input name="image" type="file" class="form-input">
                                          </div> 
                                          <div class="form-field">
                                             <label class="form-label" for="contact_question">Comments
                                                <small>Required</small>
                                             </label>
                                             <textarea name="message" id="contact_question" rows="5" cols="50" class="form-input"></textarea>
                                          </div>
                                          <div class="form-actions text-left">
                                             <input class="button button--primary" type="submit" value="Submit Form">
                                          </div>
                                        </form>
                                        @endif
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
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection