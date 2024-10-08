<!-- snippet location SlideShow -->
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @yield('meta')
    <link rel="dns-prefetch preconnect" href="https://cdn11.bigcommerce.com/s-3zqjz60dg3" crossorigin>
    <link rel="dns-prefetch preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="dns-prefetch preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel='canonical' href='index.html' />
    <meta name='platform' content='bigcommerce.stencil' />
    <link href="https://cdn11.bigcommerce.com/r-ea82ab40c433b009c2e020b5efe5adcd1724dd34/img/bc_favicon.ico" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset("revo_template/bootstrap/4.0.0/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("revo_template/font-awesome/4.7.0/css/font-awesome.min.css")}}" rel="stylesheet">
    <link data-stencil-stylesheet href="{{asset('revo_template/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/css/theme-390fd390-44b2-0138-9bab-0242ac11000c.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600&amp;display=swap" rel="stylesheet">
    <script>
        // Change document class from no-js to js so we can detect this in css
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    </script>
    <script type="text/javascript" src="{{asset('revo_template/v1/loader.js')}}" defer></script>
    <script type="text/javascript">
        var BCData = {
            "csrf_token": "7ad3f2efebfc93e089c70f6aec1537967fc622710b30f42552901e66ebde9330"
        };
    </script> @toastr_css
</head>

<body class="banners-effect2 default--style">
    <header class="header logo-content--left">
        <div class="header-m-container">
            <div class="mheader-top " data-sticky-mheader>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-2 megamenu-container">
                            <div id="menumobile--verticalCategories" class="navPages-container navPages-verticalCategories">
                                <a href="#" class="navPages-action megamenuToogle-wrapper hidden-sm hidden-xs" data-collapsible="mobile--verticalCategories" data-collapsible-disabled-breakpoint="medium" data-collapsible-disabled-state="open" data-collapsible-enabled-state="open">
                                    <svg class="icon-alignleft" width="18" height="18">
                                        <use xlink:href="#icon-alignleft"></use>
                                    </svg>
                                    <span class="title-mega">All Services </span>
                                    <svg class="icon-caret-circle" width="16" height="16">
                                        <use xlink:href="#icon-caret-circle-down"></use>
                                    </svg>
                                </a>
                                <div class="mobile-verticalCategories is-open" id="mobile--verticalCategories" aria-hidden="true" tabindex="-1">
                                    <span class="mobileMenu-close fa fa-times"></span>
                                    <ul class="navPages-list navPages-list--categories">  
                                        @foreach(App\Models\Service::take(10)->get() as $service)
                                        <li class="navPages-item navPages-item--default ">
                                            <a class="navPages-action" href="{{route('services.show',str_replace(' ', '_',$service->name))}}">
                                                <i class="fa fa-mobile"></i> {{$service->name}} </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="mobileMenu-toggle mobileMenu--vertical" data-mobile-menu-toggle="menumobile--verticalCategories" aria-controls="menumobile--verticalCategories">
                                <span class="mobileMenu-toggleIcon"> Vertical Services</span>
                            </a>
                        </div>
                        <div class="col-3 logo-container">
                            <a href="{{url('home')}}" class="header-logo">
                                <div class="header-logo-image-container">
                                    <img class="header-logo-image" src="{{asset('user_asset/'.App\Models\Setting::logo().'.png')}}" alt="SB Revo" title="SB Revo">
                                </div>
                            </a>
                        </div>
                        <div class="col-7 search-info-content" aria-hidden="true" tabindex="-1" data-prevent-quick-search-close>
                            <!-- snippet location forms_search -->
                            <form class="sb-searchpro" action="https://sb-revo.mybigcommerce.com/search.php">
                                <fieldset class="form-fieldset">
                                    <div class="input-group">
                                        <input class="form-control form-input" data-search-quick name="search_query" id="search_query" data-error-message="Search field cannot be empty." placeholder="Search the store" autocomplete="off">
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
                </div>
            </div>
            <div class="mheader-bottom ">
                <div class="container">
                    <div class="row">
                        <nav class="bar bar-tab">
							@if (Auth::guard('user')->check())
								<div class="bar-tab__item">
									<a class="cart-button cart-button--primary" href="{{url('user/dashboard')}}">
										<i class="fa fa-home bar-icon"></i>
										<span class="tab-label">Dashboard </span>
									</a>
								</div>
								<div class="bar-tab__item">
									<a href="{{url('user/logout')}}">
										<i class="fa fa-user bar-icon"></i>
										<span class="tab-label">Logout</span>
									</a>
								</div>
							@else 
								<div class="bar-tab__item">
									<a class="cart-button cart-button--primary" href="{{url('/')}}">
										<i class="fa fa-home bar-icon"></i>
										<span class="tab-label">Home </span>
									</a>
								</div>
								<div class="bar-tab__item">
									<a href="{{App\Models\Setting::companyReferralLink()}}">
										<i class="fa fa-user bar-icon"></i>
										<span class="tab-label">Sign Up</span>
									</a>
								</div>
								<div class="bar-tab__item">
									<a href="{{url('user/login')}}">
										<i class="fa fa-user bar-icon"></i>
										<span class="tab-label">Sign In</span>
									</a>
								</div>
							@endif
                            <div class="bar-tab__item tab-item--more tooltip-popovers">
                                <nav class="navPages-horizontal navPages-container" id="menumobile-horizontal">
                                    <span class="mobileMenu-close fa fa-times"></span>
                                    <ul class="navPages-list">
                                        <li class="navPages-item navPages-item-page">
                                            <a class="navPages-action" href="{{url('services')}}"> Services</a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('categories')}}"> Category </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('service_types')}}"> Service Types </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('service_countries')}}"> Countries </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('service_cities')}}"> Cities </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('our_service')}}"> Service Provider </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('products')}}"> Product </a>
                                        </li>
                                    </ul>
                                </nav>
                                <a href="#" class="mobileMenu-togglehori" data-mobile-menu-toggle="menumobile-horizontal">
                                    <i class="fa fa-ellipsis-h bar-icon"></i>
                                    <span class="tab-label">More </span>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top ">
            <div class="container">
                <div class="header-top-inner">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 d-none d-lg-block">
                            {{-- <div class="module sb-promotion sb-promotion--promotion ">
                                <div class="block-content clearfix">
                                    <div class="sb-promotion--carousel" data-slick='{
												"dots": false,
												"arrows": false,
												"mobileFirst": true,
												"slidesToShow": 1,
												"slidesToScroll": 1,
												"vertical": true,
												"verticalSwiping": true,
												"autoplay": true,
												"autoplaySpeed": 5000
											}'>
                                        <div class="sb-brand--item">
                                            <a href="#"><strong>Free Shipping</strong> on all Orders. No Minimum Purchases Required*</a>
                                        </div>
                                        <div class="sb-brand--item">
                                            <a href="#">Free 3 day delirery and free returns within the US</a>
                                        </div>
                                        <div class="sb-brand--item">
                                            <a href="#"><strong>20% Discount</strong> on Selected Items</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-6 col-sm-12 text-right">
                            <nav class="navUser">
                                <ul class="navUser-section">
									@if (Auth::guard('user')->check())
										<li class="navUser-item d-none d-sm-block">
											<a class="navUser-action" href="{{url('user/dashboard')}}"><i class="fa fa-home"></i> Dashboard</a>
										</li>
										<li class="navUser-item d-none d-sm-block">
											<a class="navUser-action" href="{{url('user/logout')}}"><i class="fa fa-lock"></i> Logout</a>
										</li>
									@else
										<li class="navUser-item d-none d-sm-block">
											<a class="navUser-action" href="{{url('user/login')}}"><i class="fa fa-lock"></i> Sign In</a>
										</li>
										<li class="navUser-item d-none d-sm-block">
											<a class="navUser-action" href="{{App\Models\Setting::companyReferralLink()}}"><i class="fa fa-user"></i> Sign Up</a>
										</li>

									@endif
                                    @if(App\Models\Setting::enablePostSection() == '1')
                                    <li class="navUser-item">
                                        <a class="navUser-action " href="{{url('posts')}}" >
                                            <i class="fa fa-user"></i> Posts 
                                        </a>
                                    </li>
                                    @endif
                                    <li class="navUser-item">
                                        <a class="navUser-action " href="{{url('products')}}" >
                                            <i class="fa fa-user"></i> Products 
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-center" data-sticky-header>
            <div class="container ">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-3 col-8 logo-container">
                        <a href="{{url('home')}}" class="header-logo">
                            <div class="header-logo-image-container">
                                <img class="header-logo-image" src="{{asset('user_asset/'.App\Models\Setting::logo().'.png')}}" alt="{{App\Models\Setting::siteName()}}" title="{{App\Models\Setting::siteName()}}">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-2 col-4 ">
                        <nav class="navPages-horizontal navPages-container" id="menu">
                            <span class="mobileMenu-close fa fa-times"></span>
                            <ul class="navPages-list">
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('services')}}"> Services </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('service_types')}}"> Service Types </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('service_countries')}}"> Countries </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('service_cities')}}"> Cities </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('our_service')}}"> Service Provider </a>
                                </li>
                            </ul>
                        </nav>
                        <a href="#" class="mobileMenu-toggle" data-mobile-menu-toggle="menu">
                            <span class="mobileMenu-toggleIcon">Toggle menu</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-7 navbar-container">
                        <div class="navbar-phone d-none d-sm-block">
                            <svg class="icon-headset_mic" width="40" height="40">
                                <use xlink:href="#icon-headset_mic"></use>
                            </svg>
                            <div class="navbar-phone__inner">
                                <strong>Call us now : </strong> <span class="phone">{{App\Models\Setting::phone()}}</span>
                                <br> <span> Email : </span>
                                <a href="mailto:{{App\Models\Setting::phone()}}"> {{App\Models\Setting::email()}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('search-tab')
    </header>
    @yield('slider')
    <div id="modal" class="modal" data-reveal data-prevent-quick-search-close>
        <a href="#" class="modal-close" aria-label="Close" role="button">
            <span aria-hidden="true">&#215;</span>
        </a>
        <div class="modal-content"></div>
        <div class="loadingOverlay"></div>
    </div>
    <div class="main-body clearfix sidebar--left">
        <div class="container">
                @yield('content')
        </div>
    </div>
    <!-- snippet location Footer -->
    @include('front.layout.partials.footer')
    <div id="previewModal" class="modal modal--large" data-reveal>
        <a href="#" class="modal-close" aria-label="Close" role="button">
            <span aria-hidden="true">&#215;</span>
        </a>
        <div class="modal-content"></div>
        <div class="loadingOverlay"></div>
    </div>
    <div class="icons-svg-sprite"><svg xmlns="http://www.w3.org/2000/svg">
            <defs>
                <path id="stumbleupon-path-1" d="M0,0.0749333333 L31.9250667,0.0749333333 L31.9250667,31.984 L0,31.984"></path>
            </defs>
            <symbol viewBox="0 0 24 24" id="icon-add">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
            </symbol>
            <symbol viewBox="0 0 36 36" id="icon-arrow-down">
                <path d="M16.5 6v18.26l-8.38-8.38-2.12 2.12 12 12 12-12-2.12-2.12-8.38 8.38v-18.26h-3z"></path>
            </symbol>
            <symbol viewBox="0 0 12 8" id="icon-chevron-down">
                <path d="M6 6.174l5.313-4.96.23-.214.457.427-.23.214-5.51 5.146L6.03 7 6 6.972 5.97 7l-.23-.214L.23 1.64 0 1.428.458 1l.23.214L6 6.174z" stroke-linecap="square" fill-rule="evenodd"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-chevron-left">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-chevron-right">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-close">
                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
            </symbol>
            <symbol viewBox="0 0 28 28" id="icon-envelope">
                <path d="M0 23.5v-12.406q0.688 0.766 1.578 1.359 5.656 3.844 7.766 5.391 0.891 0.656 1.445 1.023t1.477 0.75 1.719 0.383h0.031q0.797 0 1.719-0.383t1.477-0.75 1.445-1.023q2.656-1.922 7.781-5.391 0.891-0.609 1.563-1.359v12.406q0 1.031-0.734 1.766t-1.766 0.734h-23q-1.031 0-1.766-0.734t-0.734-1.766zM0 6.844q0-1.219 0.648-2.031t1.852-0.812h23q1.016 0 1.758 0.734t0.742 1.766q0 1.234-0.766 2.359t-1.906 1.922q-5.875 4.078-7.313 5.078-0.156 0.109-0.664 0.477t-0.844 0.594-0.812 0.508-0.898 0.422-0.781 0.141h-0.031q-0.359 0-0.781-0.141t-0.898-0.422-0.812-0.508-0.844-0.594-0.664-0.477q-1.422-1-4.094-2.852t-3.203-2.227q-0.969-0.656-1.828-1.805t-0.859-2.133z"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-facebook">
                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
            </symbol>
            <symbol viewBox="0 0 20 28" id="icon-google">
                <path d="M1.734 21.156q0-1.266 0.695-2.344t1.852-1.797q2.047-1.281 6.312-1.563-0.5-0.641-0.742-1.148t-0.242-1.148q0-0.625 0.328-1.328-0.719 0.063-1.062 0.063-2.312 0-3.898-1.508t-1.586-3.82q0-1.281 0.562-2.484t1.547-2.047q1.188-1.031 2.844-1.531t3.406-0.5h6.516l-2.141 1.375h-2.063q1.172 0.984 1.766 2.078t0.594 2.5q0 1.125-0.383 2.023t-0.93 1.453-1.086 1.016-0.922 0.961-0.383 1.031q0 0.562 0.5 1.102t1.203 1.062 1.414 1.148 1.211 1.625 0.5 2.219q0 1.422-0.766 2.703-1.109 1.906-3.273 2.805t-4.664 0.898q-2.063 0-3.852-0.648t-2.695-2.148q-0.562-0.922-0.562-2.047zM4.641 20.438q0 0.875 0.367 1.594t0.953 1.18 1.359 0.781 1.563 0.453 1.586 0.133q0.906 0 1.742-0.203t1.547-0.609 1.141-1.141 0.43-1.703q0-0.391-0.109-0.766t-0.227-0.656-0.422-0.648-0.461-0.547-0.602-0.539-0.57-0.453-0.648-0.469-0.57-0.406q-0.25-0.031-0.766-0.031-0.828 0-1.633 0.109t-1.672 0.391-1.516 0.719-1.070 1.164-0.422 1.648zM6.297 4.906q0 0.719 0.156 1.523t0.492 1.609 0.812 1.445 1.172 1.047 1.508 0.406q0.578 0 1.211-0.258t1.023-0.68q0.828-0.875 0.828-2.484 0-0.922-0.266-1.961t-0.75-2.016-1.313-1.617-1.828-0.641q-0.656 0-1.289 0.305t-1.039 0.82q-0.719 0.922-0.719 2.5z"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-instagram">
                <path d="M25.522709,13.5369502 C25.7256898,14.3248434 25.8455558,15.1480745 25.8455558,15.9992932 C25.8455558,21.4379334 21.4376507,25.8455558 15.9998586,25.8455558 C10.5623493,25.8455558 6.15416148,21.4379334 6.15416148,15.9992932 C6.15416148,15.1480745 6.27459295,14.3248434 6.4775737,13.5369502 L3.6915357,13.5369502 L3.6915357,27.0764447 C3.6915357,27.7552145 4.24280653,28.3062027 4.92355534,28.3062027 L27.0764447,28.3062027 C27.7571935,28.3062027 28.3084643,27.7552145 28.3084643,27.0764447 L28.3084643,13.5369502 L25.522709,13.5369502 Z M27.0764447,3.6915357 L23.384909,3.6915357 C22.7050083,3.6915357 22.1543028,4.24280653 22.1543028,4.92214183 L22.1543028,8.61509104 C22.1543028,9.29442633 22.7050083,9.84569717 23.384909,9.84569717 L27.0764447,9.84569717 C27.7571935,9.84569717 28.3084643,9.29442633 28.3084643,8.61509104 L28.3084643,4.92214183 C28.3084643,4.24280653 27.7571935,3.6915357 27.0764447,3.6915357 Z M9.84597988,15.9992932 C9.84597988,19.3976659 12.6009206,22.1537374 15.9998586,22.1537374 C19.3987967,22.1537374 22.1543028,19.3976659 22.1543028,15.9992932 C22.1543028,12.6003551 19.3987967,9.84569717 15.9998586,9.84569717 C12.6009206,9.84569717 9.84597988,12.6003551 9.84597988,15.9992932 Z M3.6915357,31.9997173 C1.65296441,31.9997173 0,30.3461875 0,28.3062027 L0,3.6915357 C0,1.6526817 1.65296441,0 3.6915357,0 L28.3084643,0 C30.3473183,0 32,1.6526817 32,3.6915357 L32,28.3062027 C32,30.3461875 30.3473183,31.9997173 28.3084643,31.9997173 L3.6915357,31.9997173 Z" id="instagram-Imported-Layers"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-keyboard-arrow-down">
                <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-keyboard-arrow-up">
                <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-linkedin">
                <path d="M27.2684444,27.2675556 L22.5226667,27.2675556 L22.5226667,19.8408889 C22.5226667,18.0702222 22.4924444,15.792 20.0568889,15.792 C17.5866667,15.792 17.2097778,17.7217778 17.2097778,19.7146667 L17.2097778,27.2675556 L12.4693333,27.2675556 L12.4693333,11.9964444 L17.0186667,11.9964444 L17.0186667,14.0844444 L17.0844444,14.0844444 C17.7173333,12.8835556 19.2657778,11.6177778 21.5742222,11.6177778 C26.3804444,11.6177778 27.2684444,14.7795556 27.2684444,18.8924444 L27.2684444,27.2675556 L27.2684444,27.2675556 Z M7.11822222,9.91022222 C5.59377778,9.91022222 4.36444444,8.67733333 4.36444444,7.15733333 C4.36444444,5.63822222 5.59377778,4.40533333 7.11822222,4.40533333 C8.63644444,4.40533333 9.86844444,5.63822222 9.86844444,7.15733333 C9.86844444,8.67733333 8.63644444,9.91022222 7.11822222,9.91022222 L7.11822222,9.91022222 Z M4.74133333,11.9964444 L9.49244444,11.9964444 L9.49244444,27.2675556 L4.74133333,27.2675556 L4.74133333,11.9964444 Z M29.632,0 L2.36,0 C1.05777778,0 0,1.03288889 0,2.30755556 L0,29.6906667 C0,30.9653333 1.05777778,32 2.36,32 L29.632,32 C30.9368889,32 31.9991111,30.9653333 31.9991111,29.6906667 L31.9991111,2.30755556 C31.9991111,1.03288889 30.9368889,0 29.632,0 L29.632,0 Z" id="linkedin-Fill-4"></path>
            </symbol>
            <symbol viewBox="0 0 70 32" id="icon-logo-american-express">
                <path d="M69.102 17.219l0.399 9.094c-0.688 0.313-3.285 1.688-4.26 1.688h-4.788v-0.656c-0.546 0.438-1.549 0.656-2.467 0.656h-15.053v-2.466c0-0.344-0.057-0.344-0.345-0.344h-0.257v2.81h-4.961v-2.924c-0.832 0.402-1.749 0.402-2.581 0.402h-0.544v2.523h-6.050l-1.434-1.656-1.577 1.656h-9.72v-10.781h9.892l1.405 1.663 1.548-1.663h6.652c0.775 0 2.037 0.115 2.581 0.66v-0.66h5.936c0.602 0 1.749 0.115 2.523 0.66v-0.66h8.946v0.66c0.516-0.43 1.433-0.66 2.265-0.66h4.988v0.66c0.546-0.372 1.32-0.66 2.323-0.66h4.578zM34.905 23.871c1.577 0 3.183-0.43 3.183-2.581 0-2.093-1.635-2.523-3.069-2.523h-5.878l-2.38 2.523-2.236-2.523h-7.427v7.67h7.312l2.351-2.509 2.266 2.509h3.556v-2.566h2.322zM46.001 23.556c-0.172-0.23-0.487-0.516-0.946-0.66 0.516-0.172 1.318-0.832 1.318-2.036 0-0.889-0.315-1.377-0.917-1.721-0.602-0.315-1.319-0.372-2.266-0.372h-4.215v7.67h1.864v-2.796h1.978c0.66 0 1.032 0.058 1.319 0.344 0.316 0.373 0.316 1.032 0.316 1.548v0.903h1.836v-1.477c0-0.688-0.058-1.032-0.288-1.405zM53.571 20.373v-1.605h-6.136v7.67h6.136v-1.563h-4.33v-1.549h4.244v-1.548h-4.244v-1.405h4.33zM58.245 26.438c1.864 0 2.926-0.759 2.926-2.393 0-0.774-0.23-1.262-0.545-1.664-0.459-0.372-1.119-0.602-2.151-0.602h-1.004c-0.258 0-0.487-0.057-0.717-0.115-0.201-0.086-0.373-0.258-0.373-0.545 0-0.258 0.058-0.43 0.287-0.602 0.143-0.115 0.373-0.115 0.717-0.115h3.383v-1.634h-3.671c-1.978 0-2.638 1.204-2.638 2.294 0 2.438 2.151 2.322 3.842 2.38 0.344 0 0.544 0.058 0.66 0.173 0.115 0.086 0.23 0.315 0.23 0.544 0 0.201-0.115 0.373-0.23 0.488-0.173 0.115-0.373 0.172-0.717 0.172h-3.555v1.62h3.555zM65.442 26.439c1.864 0 2.924-0.76 2.924-2.394 0-0.774-0.229-1.262-0.544-1.664-0.459-0.372-1.119-0.602-2.151-0.602h-1.003c-0.258 0-0.488-0.057-0.718-0.115-0.201-0.086-0.373-0.258-0.373-0.545 0-0.258 0.115-0.43 0.287-0.602 0.144-0.115 0.373-0.115 0.717-0.115h3.383v-1.634h-3.671c-1.921 0-2.638 1.204-2.638 2.294 0 2.438 2.151 2.322 3.842 2.38 0.344 0 0.544 0.058 0.66 0.174 0.115 0.086 0.229 0.315 0.229 0.544 0 0.201-0.114 0.373-0.229 0.488s-0.373 0.172-0.717 0.172h-3.556v1.62h3.556zM43.966 20.518c0.23 0.115 0.373 0.344 0.373 0.659 0 0.344-0.143 0.602-0.373 0.774-0.287 0.115-0.545 0.115-0.889 0.115l-2.237 0.058v-1.749h2.237c0.344 0 0.659 0 0.889 0.143zM36.108 8.646c-0.287 0.172-0.544 0.172-0.918 0.172h-2.265v-1.692h2.265c0.316 0 0.688 0 0.918 0.114 0.23 0.144 0.344 0.374 0.344 0.718 0 0.315-0.114 0.602-0.344 0.689zM50.789 6.839l1.262 3.039h-2.523zM30.775 25.792l-2.838-3.183 2.838-3.011v6.193zM35.019 20.373c0.66 0 1.090 0.258 1.090 0.918s-0.43 1.032-1.090 1.032h-2.437v-1.95h2.437zM5.773 9.878l1.291-3.039 1.262 3.039h-2.552zM18.905 20.372l4.616 0 2.036 2.237-2.093 2.265h-4.559v-1.549h4.071v-1.548h-4.071v-1.405zM19.077 13.376l-0.545 1.377h-3.24l-0.546-1.319v1.319h-6.222l-0.66-1.749h-1.577l-0.717 1.749h-5.572l2.389-5.649 2.237-5.104h4.789l0.659 1.262v-1.262h5.591l1.262 2.724 1.233-2.724h17.835c0.832 0 1.548 0.143 2.093 0.602v-0.602h4.903v0.602c0.803-0.459 1.864-0.602 3.068-0.602h7.082l0.66 1.262v-1.262h5.218l0.775 1.262v-1.262h5.103v10.753h-5.161l-1.003-1.635v1.635h-6.423l-0.717-1.749h-1.577l-0.717 1.749h-3.355c-1.318 0-2.294-0.316-2.954-0.659v0.659h-7.971v-2.466c0-0.344-0.057-0.402-0.286-0.402h-0.258v2.867h-15.398v-1.377zM43.363 6.409c-0.832 0.831-0.975 1.864-1.004 3.011 0 1.377 0.344 2.266 0.947 2.925 0.659 0.66 1.806 0.86 2.695 0.86h2.151l0.716-1.692h3.843l0.717 1.692h3.727v-5.763l3.47 5.763h2.638v-7.684h-1.892v5.333l-3.24-5.333h-2.839v7.254l-3.096-7.254h-2.724l-2.638 6.050h-0.832c-0.487 0-1.003-0.115-1.262-0.373-0.344-0.402-0.488-1.004-0.488-1.836 0-0.803 0.144-1.405 0.488-1.748 0.373-0.316 0.774-0.431 1.434-0.431h1.749v-1.663h-1.749c-1.262 0-2.265 0.286-2.81 0.889zM39.579 5.52v7.684h1.863v-7.684h-1.863zM31.12 5.52l-0 7.685h1.806v-2.781h1.979c0.66 0 1.090 0.057 1.376 0.315 0.316 0.401 0.258 1.061 0.258 1.491v0.975h1.892v-1.519c0-0.66-0.057-1.004-0.344-1.377-0.172-0.229-0.487-0.488-0.889-0.659 0.516-0.23 1.319-0.832 1.319-2.036 0-0.889-0.373-1.377-0.976-1.75-0.602-0.344-1.262-0.344-2.208-0.344h-4.215zM23.636 5.521v7.685h6.165v-1.577h-4.301v-1.549h4.244v-1.577h-4.244v-1.377h4.301v-1.606h-6.165zM16.124 13.205h1.577l2.695-6.021v6.021h1.864v-7.684h-3.011l-2.265 5.219-2.409-5.219h-2.953v7.254l-3.154-7.254h-2.724l-3.297 7.684h1.978l0.688-1.692h3.871l0.688 1.692h3.756v-6.021z"></path>
            </symbol>
            <symbol viewBox="0 0 95 32" id="icon-logo-discover">
                <path d="M50.431 8.059c4.546 0 8.092 3.49 8.092 7.936 0 4.471-3.571 7.961-8.093 7.961-4.638 0-8.115-3.444-8.115-8.051 0-4.334 3.635-7.845 8.115-7.845zM4.362 8.345c4.811 0 8.168 3.133 8.168 7.64 0 2.247-1.028 4.422-2.761 5.864-1.461 1.214-3.126 1.761-5.429 1.761h-4.339v-15.265h4.362zM7.832 19.81c1.027-0.912 1.639-2.379 1.639-3.847 0-1.464-0.612-2.882-1.639-3.798-0.984-0.892-2.146-1.235-4.065-1.235h-0.797v10.096h0.797c1.919 0 3.127-0.367 4.065-1.216zM13.9 23.611v-15.265h2.965v15.265h-2.965zM24.123 14.201c3.378 1.238 4.379 2.338 4.379 4.764 0 2.952-2.166 5.015-5.247 5.015-2.261 0-3.904-0.896-5.271-2.907l1.914-1.856c0.685 1.328 1.825 2.036 3.24 2.036 1.325 0 2.308-0.915 2.308-2.152 0-0.641-0.298-1.189-0.891-1.578-0.297-0.187-0.889-0.46-2.054-0.87-2.784-1.010-3.742-2.085-3.742-4.192 0-2.493 2.055-4.371 4.745-4.371 1.667 0 3.196 0.571 4.473 1.696l-1.549 2.033c-0.778-0.867-1.508-1.233-2.398-1.233-1.28 0-2.213 0.732-2.213 1.694 0 0.821 0.525 1.258 2.307 1.921zM29.438 15.986c0-4.436 3.605-7.985 8.101-7.985 1.278 0 2.352 0.273 3.653 0.935v3.504c-1.233-1.213-2.308-1.717-3.72-1.717-2.787 0-4.976 2.313-4.976 5.241 0 3.092 2.123 5.267 5.112 5.267 1.347 0 2.397-0.48 3.585-1.671v3.504c-1.347 0.638-2.443 0.892-3.72 0.892-4.519 0-8.034-3.478-8.034-7.97zM65.239 18.601l4.11-10.254h3.216l-6.573 15.655h-1.596l-6.46-15.655h3.24zM73.914 23.612v-15.265h8.418v2.585h-5.453v3.388h5.244v2.585h-5.244v4.123h5.453v2.584h-8.418zM94.081 12.852c0 2.336-1.23 3.87-3.469 4.329l4.794 6.43h-3.651l-4.105-6.135h-0.388v6.135h-2.969v-15.265h4.404c3.425 0 5.384 1.645 5.384 4.506zM88.125 15.372c1.9 0 2.903-0.827 2.903-2.359 0-1.486-1.004-2.266-2.856-2.266h-0.911v4.626h0.863z"></path>
            </symbol>
            <symbol viewBox="0 0 54 32" id="icon-logo-mastercard">
                <path d="M48.366 15.193c0.6 0 0.9 0.437 0.9 1.282 0 1.281-0.546 2.209-1.337 2.209-0.6 0-0.9-0.436-0.9-1.31 0-1.281 0.573-2.182 1.337-2.182zM38.276 18.275c0-0.655 0.491-1.009 1.472-1.009 0.109 0 0.191 0.027 0.382 0.027-0.027 0.982-0.545 1.636-1.227 1.636-0.382 0-0.628-0.245-0.628-0.655zM26.278 15.848c0 0.082-0 0.192-0 0.327h-1.909c0.164-0.763 0.545-1.173 1.091-1.173 0.518 0 0.818 0.3 0.818 0.845zM38.060 0.002c8.838 0 16.003 7.165 16.003 16.002s-7.165 15.999-16.003 15.999c-3.834 0-7.324-1.344-10.080-3.594 2.102-2.031 3.707-4.567 4.568-7.44h-1.33c-0.833 2.553-2.297 4.807-4.199 6.627-1.892-1.816-3.342-4.078-4.172-6.62h-1.33c0.858 2.856 2.435 5.401 4.521 7.432-2.749 2.219-6.223 3.594-10.036 3.594-8.837 0-16.002-7.163-16.002-15.999s7.164-16.001 16.002-16.001c3.814 0 7.287 1.377 10.036 3.603-2.087 2.023-3.664 4.568-4.521 7.424h1.33c0.83-2.542 2.28-4.804 4.172-6.607 1.903 1.808 3.367 4.060 4.199 6.614h1.33c-0.861-2.872-2.466-5.413-4.568-7.443 2.757-2.249 6.246-3.592 10.080-3.592zM7.217 20.213h1.691l1.336-8.044h-2.672l-1.637 4.99-0.082-4.99h-2.454l-1.336 8.044h1.582l1.037-6.135 0.136 6.135h1.173l2.209-6.189zM14.47 19.477l0.054-0.408 0.382-2.318c0.109-0.736 0.136-0.982 0.136-1.309 0-1.254-0.791-1.909-2.263-1.909-0.627 0-1.2 0.082-2.045 0.327l-0.246 1.473 0.163-0.028 0.246-0.081c0.382-0.109 0.928-0.164 1.418-0.164 0.79 0 1.091 0.164 1.091 0.6 0 0.109 0 0.191-0.055 0.409-0.273-0.027-0.518-0.054-0.709-0.054-1.909 0-2.999 0.927-2.999 2.536 0 1.064 0.627 1.773 1.554 1.773 0.791 0 1.364-0.246 1.8-0.791l-0.027 0.682h1.418l0.027-0.164 0.027-0.246zM17.988 16.314c-0.736-0.327-0.819-0.409-0.819-0.709 0-0.355 0.3-0.519 0.845-0.519 0.328 0 0.791 0.028 1.227 0.082l0.246-1.5c-0.436-0.082-1.118-0.137-1.5-0.137-1.909 0-2.59 1.009-2.563 2.208 0 0.818 0.382 1.391 1.282 1.828 0.709 0.327 0.818 0.436 0.818 0.709 0 0.409-0.3 0.6-0.982 0.6-0.518 0-0.982-0.082-1.527-0.245l-0.246 1.5 0.082 0.027 0.3 0.054c0.109 0.027 0.246 0.055 0.464 0.055 0.382 0.054 0.709 0.054 0.928 0.054 1.8 0 2.645-0.682 2.645-2.181 0-0.9-0.354-1.418-1.2-1.828zM21.75 18.741c-0.409 0-0.573-0.136-0.573-0.464 0-0.082 0-0.164 0.027-0.273l0.463-2.726h0.873l0.218-1.609h-0.873l0.191-0.982h-1.691l-0.737 4.472-0.082 0.518-0.109 0.654c-0.027 0.191-0.055 0.409-0.055 0.573 0 0.954 0.491 1.445 1.364 1.445 0.382 0 0.764-0.055 1.227-0.218l0.218-1.445c-0.109 0.054-0.273 0.054-0.464 0.054zM25.732 18.851c-0.982 0-1.5-0.381-1.5-1.145 0-0.055 0-0.109 0.027-0.191h3.382c0.163-0.682 0.218-1.145 0.218-1.636 0-1.446-0.9-2.373-2.318-2.373-1.718 0-2.973 1.663-2.973 3.899 0 1.936 0.982 2.945 2.89 2.945 0.628 0 1.173-0.082 1.773-0.273l0.273-1.636c-0.6 0.3-1.145 0.409-1.773 0.409zM31.158 15.524h0.109c0.164-0.79 0.382-1.363 0.655-1.881l-0.055-0.027h-0.164c-0.573 0-0.9 0.273-1.418 1.064l0.164-1.009h-1.554l-1.064 6.544h1.718c0.627-4.008 0.791-4.69 1.609-4.69zM36.122 20.133l0.3-1.827c-0.545 0.273-1.036 0.409-1.445 0.409-1.009 0-1.609-0.737-1.609-1.963 0-1.773 0.9-3.027 2.182-3.027 0.491 0 0.928 0.136 1.528 0.436l0.3-1.745c-0.163-0.054-0.218-0.082-0.436-0.163l-0.682-0.164c-0.218-0.054-0.491-0.082-0.791-0.082-2.263 0-3.845 2.018-3.845 4.88 0 2.155 1.146 3.491 3 3.491 0.463 0 0.872-0.082 1.5-0.246zM41.521 19.069l0.355-2.318c0.136-0.736 0.136-0.982 0.136-1.309 0-1.254-0.763-1.909-2.236-1.909-0.627 0-1.2 0.082-2.045 0.327l-0.246 1.473 0.164-0.028 0.218-0.081c0.382-0.109 0.955-0.164 1.446-0.164 0.791 0 1.091 0.164 1.091 0.6 0 0.109-0.027 0.191-0.082 0.409-0.246-0.027-0.491-0.054-0.682-0.054-1.909 0-3 0.927-3 2.536 0 1.064 0.627 1.773 1.555 1.773 0.791 0 1.363-0.246 1.8-0.791l-0.028 0.682h1.418v-0.164l0.027-0.246 0.054-0.327zM43.648 20.214c0.627-4.008 0.791-4.69 1.608-4.69h0.109c0.164-0.79 0.382-1.363 0.655-1.881l-0.055-0.027h-0.164c-0.572 0-0.9 0.273-1.418 1.064l0.164-1.009h-1.554l-1.037 6.544h1.691zM48.829 20.214l1.608 0 1.309-8.044h-1.691l-0.382 2.291c-0.464-0.6-0.955-0.9-1.637-0.9-1.5 0-2.782 1.854-2.782 4.035 0 1.636 0.818 2.7 2.073 2.7 0.627 0 1.118-0.218 1.582-0.709zM11.306 18.279c0-0.655 0.492-1.009 1.447-1.009 0.136 0 0.218 0.027 0.382 0.027-0.027 0.982-0.518 1.636-1.228 1.636-0.382 0-0.6-0.245-0.6-0.655z"></path>
            </symbol>
            <symbol viewBox="0 0 57 32" id="icon-logo-paypal">
                <path d="M47.11 10.477c2.211-0.037 4.633 0.618 4.072 3.276l-1.369 6.263h-3.159l0.211-0.947c-1.72 1.712-6.038 1.821-5.335-2.111 0.491-2.294 2.878-3.023 6.423-3.023 0.246-1.020-0.457-1.274-1.65-1.238s-2.633 0.437-3.089 0.655l0.281-2.293c0.913-0.182 2.106-0.583 3.615-0.583zM47.32 16.885c0.069-0.291 0.106-0.547 0.176-0.838h-0.773c-0.596 0-1.579 0.146-1.931 0.765-0.456 0.728 0.177 1.348 0.878 1.311 0.807-0.037 1.474-0.401 1.65-1.238zM53.883 8h3.242l-2.646 12.016h-3.209zM39.142 8.037c1.689 0 3.729 1.274 3.131 4.077-0.528 2.476-2.498 3.933-4.89 3.933h-2.428l-0.879 3.969h-3.412l2.603-11.979h5.874zM39.037 12.114c0.211-0.911-0.317-1.638-1.197-1.638h-1.689l-0.704 3.277h1.583c0.88 0 1.795-0.728 2.006-1.638zM16.346 10.476c2.184-0.037 4.611 0.618 4.056 3.276l-1.352 6.262h-3.155l0.208-0.947c-1.664 1.712-5.929 1.821-5.235-2.111 0.486-2.294 2.844-3.023 6.345-3.023 0.208-1.020-0.485-1.274-1.664-1.238s-2.601 0.437-3.017 0.655l0.277-2.293c0.867-0.182 2.046-0.583 3.537-0.583zM16.589 16.885c0.035-0.291 0.104-0.547 0.173-0.838h-0.797c-0.555 0-1.525 0.146-1.872 0.765-0.451 0.728 0.138 1.348 0.832 1.311 0.797-0.037 1.491-0.401 1.664-1.238zM28.528 10.648l3.255-0-7.496 13.351h-3.528l2.306-3.925-1.289-9.426h3.156l0.508 5.579zM8.499 8.036c1.728 0 3.738 1.274 3.139 4.077-0.529 2.476-2.504 3.933-4.867 3.933h-2.468l-0.847 3.969h-3.456l2.609-11.979h5.89zM8.393 12.114c0.247-0.911-0.317-1.638-1.164-1.638h-1.693l-0.741 3.277h1.623c0.882 0 1.763-0.728 1.975-1.638z"></path>
            </symbol>
            <symbol viewBox="0 0 49 32" id="icon-logo-visa">
                <path d="M14.059 10.283l4.24-0-6.302 15.472-4.236 0.003-3.259-12.329c2.318 0.952 4.379 3.022 5.219 5.275l0.42 2.148zM17.416 25.771l2.503-15.501h4.001l-2.503 15.501h-4.002zM31.992 16.494c2.31 1.106 3.375 2.444 3.362 4.211-0.032 3.217-2.765 5.295-6.97 5.295-1.796-0.020-3.526-0.394-4.459-0.826l0.56-3.469 0.515 0.246c1.316 0.579 2.167 0.814 3.769 0.814 1.151 0 2.385-0.476 2.396-1.514 0.007-0.679-0.517-1.165-2.077-1.924-1.518-0.74-3.53-1.983-3.505-4.211 0.024-3.012 2.809-5.116 6.765-5.116 1.55 0 2.795 0.339 3.586 0.651l-0.542 3.36-0.359-0.178c-0.74-0.314-1.687-0.617-2.995-0.595-1.568 0-2.293 0.689-2.293 1.333-0.010 0.728 0.848 1.204 2.246 1.923zM46.199 10.285l3.239 15.49h-3.714s-0.368-1.782-0.488-2.322c-0.583 0-4.667-0.008-5.125-0.008-0.156 0.42-0.841 2.331-0.841 2.331h-4.205l5.944-14.205c0.419-1.011 1.138-1.285 2.097-1.285h3.093zM41.263 20.274c0.781 0 2.698 0 3.322 0-0.159-0.775-0.927-4.474-0.927-4.474l-0.27-1.337c-0.202 0.581-0.554 1.52-0.531 1.479 0 0-1.262 3.441-1.594 4.332zM9.723 18.702c-1.648-4.573-5.284-6.991-9.723-8.109l0.053-0.322h6.453c0.87 0.034 1.573 0.326 1.815 1.308z"></path>
            </symbol>
            <symbol viewBox="0 0 34 32" id="icon-pinterest">
                <path d="M1.356 15.647c0 6.24 3.781 11.6 9.192 13.957-0.043-1.064-0.008-2.341 0.267-3.499 0.295-1.237 1.976-8.303 1.976-8.303s-0.491-0.973-0.491-2.411c0-2.258 1.319-3.945 2.962-3.945 1.397 0 2.071 1.041 2.071 2.288 0 1.393-0.895 3.477-1.356 5.408-0.385 1.616 0.817 2.935 2.424 2.935 2.909 0 4.869-3.708 4.869-8.101 0-3.34-2.267-5.839-6.39-5.839-4.658 0-7.56 3.447-7.56 7.297 0 1.328 0.394 2.264 1.012 2.989 0.284 0.333 0.324 0.467 0.221 0.849-0.074 0.28-0.243 0.955-0.313 1.223-0.102 0.386-0.417 0.524-0.769 0.381-2.145-0.869-3.145-3.201-3.145-5.822 0-4.329 3.679-9.519 10.975-9.519 5.863 0 9.721 4.21 9.721 8.729 0 5.978-3.349 10.443-8.285 10.443-1.658 0-3.217-0.889-3.751-1.899 0 0-0.892 3.511-1.080 4.189-0.325 1.175-0.963 2.349-1.546 3.264 1.381 0.405 2.84 0.625 4.352 0.625 8.48 0 15.355-6.822 15.355-15.238s-6.876-15.238-15.355-15.238c-8.48 0-15.356 6.822-15.356 15.238z"></path>
            </symbol>
            <symbol viewBox="0 0 26 28" id="icon-print">
                <path d="M0 21.5v-6.5q0-1.234 0.883-2.117t2.117-0.883h1v-8.5q0-0.625 0.438-1.062t1.062-0.438h10.5q0.625 0 1.375 0.313t1.188 0.75l2.375 2.375q0.438 0.438 0.75 1.188t0.313 1.375v4h1q1.234 0 2.117 0.883t0.883 2.117v6.5q0 0.203-0.148 0.352t-0.352 0.148h-3.5v2.5q0 0.625-0.438 1.062t-1.062 0.438h-15q-0.625 0-1.062-0.438t-0.438-1.062v-2.5h-3.5q-0.203 0-0.352-0.148t-0.148-0.352zM6 24h14v-4h-14v4zM6 14h14v-6h-2.5q-0.625 0-1.062-0.438t-0.438-1.062v-2.5h-10v10zM22 15q0 0.406 0.297 0.703t0.703 0.297 0.703-0.297 0.297-0.703-0.297-0.703-0.703-0.297-0.703 0.297-0.297 0.703z"></path>
            </symbol>
            <symbol viewBox="0 0 24 24" id="icon-remove">
                <path d="M19 13H5v-2h14v2z"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-rss">
                <path d="M-0.465347858,2.01048219 C-0.465347858,2.01048219 28.7009958,0.574406533 31,31.3201126 L25.1092027,31.3201126 C25.1092027,31.3201126 26.2597741,8.90749482 -0.465347858,6.89506416 L-0.465347858,2.01048219 L-0.465347858,2.01048219 Z M-0.465347858,12.2127144 C-0.465347858,12.2127144 16.6328276,11.6363594 19.9369779,31.3201126 L14.0472499,31.3201126 C14.0472499,31.3201126 13.3297467,19.6839434 -0.465347858,17.0940884 L-0.465347858,12.2127144 L-0.465347858,12.2127144 Z M2.73614917,25.0304648 C4.79776783,25.0304648 6.47229834,26.7007181 6.47229834,28.766614 C6.47229834,30.8282326 4.79776783,32.5016938 2.73614917,32.5016938 C0.6723919,32.5016938 -1,30.8293019 -1,28.766614 C-1,26.7017874 0.6723919,25.0304648 2.73614917,25.0304648 Z" id="rss-Shape"></path>
            </symbol>
            <symbol viewBox="0 0 26 28" id="icon-star">
                <path d="M0 10.109q0-0.578 0.875-0.719l7.844-1.141 3.516-7.109q0.297-0.641 0.766-0.641t0.766 0.641l3.516 7.109 7.844 1.141q0.875 0.141 0.875 0.719 0 0.344-0.406 0.75l-5.672 5.531 1.344 7.812q0.016 0.109 0.016 0.313 0 0.328-0.164 0.555t-0.477 0.227q-0.297 0-0.625-0.187l-7.016-3.687-7.016 3.687q-0.344 0.187-0.625 0.187-0.328 0-0.492-0.227t-0.164-0.555q0-0.094 0.031-0.313l1.344-7.812-5.688-5.531q-0.391-0.422-0.391-0.75z"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-stumbleupon">
                <mask id="stumbleupon-mask-2">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stumbleupon-path-1">
                    </use>
                </mask>
                <path d="M31.9250667,16.0373333 C31.9250667,24.8533333 24.7784,32 15.9624,32 C7.14666667,32 0,24.8533333 0,16.0373333 C0,7.2216 7.14666667,0.0749333333 15.9624,0.0749333333 C24.7784,0.0749333333 31.9250667,7.2216 31.9250667,16.0373333 Z M21.9205547,16.3600826 L21.9205547,18.9857015 C21.9205547,19.5214765 21.494073,19.9558236 20.968,19.9558236 C20.441927,19.9558236 20.0154453,19.5214765 20.0154453,18.9857015 L20.0154453,16.4101275 L18.1823358,16.9675798 L16.9525547,16.3839008 L16.9525547,18.9383327 C16.9717372,21.1844666 18.7659562,23 20.976146,23 C23.1984234,23 25,21.1651979 25,18.9019364 L25,16.3600826 L21.9205547,16.3600826 Z M16.9525547,14.2429415 L18.1823358,14.8266205 L20.0154453,14.2691683 L20.0154453,12.9736203 C19.9505401,10.7684323 18.1810219,9 16,9 C13.8268613,9 12.0618102,10.7555866 11.9845547,12.9492669 L11.9845547,18.8684839 C11.9845547,19.404259 11.558073,19.8386061 11.032,19.8386061 C10.505927,19.8386061 10.0794453,19.404259 10.0794453,18.8684839 L10.0794453,16.3600826 L7,16.3600826 L7,18.9019364 C7,21.1651979 8.80131387,23 11.0235912,23 C13.2264234,23 15.0119708,21.1965095 15.0429781,18.9608128 L15.0474453,13.114656 C15.0474453,12.578881 15.473927,12.1445339 16,12.1445339 C16.526073,12.1445339 16.9525547,12.578881 16.9525547,13.114656 L16.9525547,14.2429415 Z" id="stumbleupon-Fill-1" mask="url(#stumbleupon-mask-2)"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-tumblr">
                <path d="M23.852762,25.5589268 C23.2579209,25.8427189 22.1195458,26.089634 21.2697728,26.1120809 C18.7092304,26.1810247 18.2121934,24.3131275 18.1897466,22.9566974 L18.1897466,12.9951133 L24.6159544,12.9951133 L24.6159544,8.15140729 L18.2137967,8.15140729 L18.2137967,0 L13.5256152,0 C13.4486546,0 13.3139736,0.0673405008 13.2963368,0.238898443 C13.0221648,2.73370367 11.8533261,7.11243957 7,8.86168924 L7,12.9951133 L10.2387574,12.9951133 L10.2387574,23.4521311 C10.2387574,27.0307977 12.8794671,32.1166089 19.8508122,31.9979613 C22.2013164,31.9578777 24.8131658,30.9718204 25.3919735,30.1236507 L23.852762,25.5589268"></path>
            </symbol>
            <symbol viewBox="0 0 43 32" id="icon-twitter">
                <path d="M36.575 5.229c1.756-0.952 3.105-2.46 3.74-4.257-1.644 0.882-3.464 1.522-5.402 1.867-1.551-1.495-3.762-2.429-6.209-2.429-4.697 0-8.506 3.445-8.506 7.694 0 0.603 0.075 1.19 0.22 1.753-7.069-0.321-13.337-3.384-17.532-8.039-0.732 1.136-1.152 2.458-1.152 3.868 0 2.669 1.502 5.024 3.784 6.404-1.394-0.040-2.706-0.386-3.853-0.962-0.001 0.032-0.001 0.064-0.001 0.097 0 3.728 2.932 6.837 6.823 7.544-0.714 0.176-1.465 0.27-2.241 0.27-0.548 0-1.081-0.048-1.6-0.138 1.083 3.057 4.224 5.281 7.946 5.343-2.911 2.064-6.579 3.294-10.564 3.294-0.687 0-1.364-0.036-2.029-0.108 3.764 2.183 8.235 3.457 13.039 3.457 15.646 0 24.202-11.724 24.202-21.891 0-0.334-0.008-0.665-0.025-0.995 1.662-1.085 3.104-2.439 4.244-3.982-1.525 0.612-3.165 1.025-4.885 1.211z"></path>
            </symbol>
            <symbol viewBox="0 0 32 32" id="icon-youtube">
                <path d="M31.6634051,8.8527593 C31.6634051,8.8527593 31.3509198,6.64879843 30.3919217,5.67824658 C29.1757339,4.40441487 27.8125088,4.39809002 27.1873503,4.32353816 C22.7118278,4 15.9983092,4 15.9983092,4 L15.984407,4 C15.984407,4 9.27104501,4 4.79536595,4.32353816 C4.17017613,4.39809002 2.80745205,4.40441487 1.59082583,5.67824658 C0.631890411,6.64879843 0.319843444,8.8527593 0.319843444,8.8527593 C0.319843444,8.8527593 0,11.4409393 0,14.0290881 L0,16.4554834 C0,19.0436008 0.319843444,21.6317495 0.319843444,21.6317495 C0.319843444,21.6317495 0.631890411,23.8357417 1.59082583,24.8062935 C2.80745205,26.0801566 4.40557339,26.0398591 5.11736986,26.1733699 C7.67602348,26.4187241 15.9913894,26.4946536 15.9913894,26.4946536 C15.9913894,26.4946536 22.7118278,26.4845401 27.1873503,26.1610333 C27.8125088,26.0864501 29.1757339,26.0801566 30.3919217,24.8062935 C31.3509198,23.8357417 31.6634051,21.6317495 31.6634051,21.6317495 C31.6634051,21.6317495 31.9827789,19.0436008 31.9827789,16.4554834 L31.9827789,14.0290881 C31.9827789,11.4409393 31.6634051,8.8527593 31.6634051,8.8527593 Z M12.6895342,19.39582 L12.6880626,10.4095186 L21.3299413,14.9183249 L12.6895342,19.39582 Z" id="youtube-Imported-Layers"></path>
            </symbol>
            <symbol viewBox="0 0 26 26" id="logo-small">
                <path d="M17.647 12.125h-3.323c-.11 0-.197.087-.197.194v2.327c0 .107.087.193.197.193h3.323c.95 0 1.542-.524 1.542-1.357 0-.795-.594-1.358-1.543-1.358zm-2.62-2.423h3.233c2.51 0 3.988 1.57 3.988 3.296 0 1.35-.915 2.345-1.885 2.78-.155.07-.15.283.01.346 1.128.443 1.94 1.623 1.94 3 0 1.96-1.305 3.512-3.837 3.512h-6.96c-.11 0-.197-.087-.197-.194v-9.03L.237 24.49c-.51.508-.148 1.378.57 1.378h24.254c.446 0 .808-.362.808-.808V.81c0-.72-.87-1.08-1.38-.572L15.03 9.702zm-.703 7.562c-.11 0-.197.087-.197.194v2.56c0 .106.087.193.197.193h3.44c1.05 0 1.682-.542 1.682-1.472 0-.815-.593-1.474-1.68-1.474h-3.442z" fill="#FFF" fill-rule="evenodd"></path>
            </symbol>
            <symbol id="icon-alignleft" viewBox="0 0 448 512" class="svg-inline--fa fa-align-left fa-w-14">
                <path fill="currentColor" d="M288 48v32c0 6.627-5.373 12-12 12H12C5.373 92 0 86.627 0 80V48c0-6.627 5.373-12 12-12h264c6.627 0 12 5.373 12 12zM12 220h424c6.627 0 12-5.373 12-12v-32c0-6.627-5.373-12-12-12H12c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12zm0 256h424c6.627 0 12-5.373 12-12v-32c0-6.627-5.373-12-12-12H12c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12zm264-184H12c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h264c6.627 0 12-5.373 12-12v-32c0-6.627-5.373-12-12-12z" class=""></path>
            </symbol>
            <symbol id="icon-caret-circle-down" data-icon="caret-circle-down" viewBox="0 0 512 512" class="svg-inline--fa fa-caret-circle-down fa-w-16 fa-3x">
                <path fill="currentColor" d="M157.1 216h197.8c10.7 0 16.1 13 8.5 20.5l-98.9 98.3c-4.7 4.7-12.2 4.7-16.9 0l-98.9-98.3c-7.7-7.5-2.3-20.5 8.4-20.5zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z" class=""></path>
            </symbol>
            <symbol id="icon-shopping-cart" viewBox="0 0 24 24">
                <path d="M20.756 5.345c-0.191-0.219-0.466-0.345-0.756-0.345h-13.819l-0.195-1.164c-0.080-0.482-0.497-0.836-0.986-0.836h-2.25c-0.553 0-1 0.447-1 1s0.447 1 1 1h1.403l1.86 11.164c0.008 0.045 0.031 0.082 0.045 0.124 0.016 0.053 0.029 0.103 0.054 0.151 0.032 0.066 0.075 0.122 0.12 0.179 0.031 0.039 0.059 0.078 0.095 0.112 0.058 0.054 0.125 0.092 0.193 0.13 0.038 0.021 0.071 0.049 0.112 0.065 0.116 0.047 0.238 0.075 0.367 0.075 0.001 0 11.001 0 11.001 0 0.553 0 1-0.447 1-1s-0.447-1-1-1h-10.153l-0.166-1h11.319c0.498 0 0.92-0.366 0.99-0.858l1-7c0.041-0.288-0.045-0.579-0.234-0.797zM18.847 7l-0.285 2h-3.562v-2h3.847zM14 7v2h-3v-2h3zM14 10v2h-3v-2h3zM10 7v2h-3c-0.053 0-0.101 0.015-0.148 0.030l-0.338-2.030h3.486zM7.014 10h2.986v2h-2.653l-0.333-2zM15 12v-2h3.418l-0.285 2h-3.133z"></path>
                <path d="M10 19.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
                <path d="M19 19.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
            </symbol>
            <symbol id="icon-heart-o" viewBox="0 0 28 28">
                <path d="M26 9.312c0-4.391-2.969-5.313-5.469-5.313-2.328 0-4.953 2.516-5.766 3.484-0.375 0.453-1.156 0.453-1.531 0-0.812-0.969-3.437-3.484-5.766-3.484-2.5 0-5.469 0.922-5.469 5.313 0 2.859 2.891 5.516 2.922 5.547l9.078 8.75 9.063-8.734c0.047-0.047 2.938-2.703 2.938-5.563zM28 9.312c0 3.75-3.437 6.891-3.578 7.031l-9.734 9.375c-0.187 0.187-0.438 0.281-0.688 0.281s-0.5-0.094-0.688-0.281l-9.75-9.406c-0.125-0.109-3.563-3.25-3.563-7 0-4.578 2.797-7.313 7.469-7.313 2.734 0 5.297 2.156 6.531 3.375 1.234-1.219 3.797-3.375 6.531-3.375 4.672 0 7.469 2.734 7.469 7.313z"></path>
            </symbol>
            <symbol id="icon-loop" viewBox="0 0 32 32">
                <path d="M4 10h20v6l8-8-8-8v6h-24v12h4zM28 22h-20v-6l-8 8 8 8v-6h24v-12h-4z"></path>
            </symbol>
            <symbol id="icon-headset_mic" viewBox="0 0 24 24">
                <path d="M12 0.984c4.969 0 9 4.031 9 9v10.031c0 1.641-1.359 3-3 3h-6v-2.016h6.984v-0.984h-3.984v-8.016h3.984v-2.016c0-3.891-3.094-6.984-6.984-6.984s-6.984 3.094-6.984 6.984v2.016h3.984v8.016h-3c-1.641 0-3-1.359-3-3v-7.031c0-4.969 4.031-9 9-9z"></path>
            </symbol>
            <symbol id="icon-stats-bars" viewBox="0 0 32 32">
                <path d="M0 26h32v4h-32zM4 18h4v6h-4zM10 10h4v14h-4zM16 16h4v8h-4zM22 4h4v20h-4z"></path>
            </symbol>
        </svg></div>
    <div class="cookieMessage" data-effectin="bounceInRight" data-effectout="bounceInLeft">
        <div class="container">
            <div class="cookieMessage-text">
                <p>The cookie settings on this website are set to &#x27;allow all cookies&#x27; to give you the very best experience. Please click Accept Cookies to continue to use the site.</p>
            </div>
            <button class="button button--action" data-privacy-accept>Accept Cookies</button>
        </div>
    </div>
    <script>
        window.__webpack_public_path__ = "https://cdn11.bigcommerce.com/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/dist/";
    </script>
    <script src="{{asset('revo_template/s-3zqjz60dg3/stencil/671eab80-1ec6-0137-c53b-0242ac11000a/e/80359d40-88bb-013b-10b2-66c6c8fc1ce5/dist/theme-bundle.main.js')}}"></script>
    <script>
        // Exported in app.js
        window.stencilBootstrap("product", "{\"themeSettings\":{\"optimizedCheckout-formChecklist-color\":\"#333333\",\"homepage_new_products_column_count\":4,\"optimizedCheckout-buttonPrimary-backgroundColorActive\":\"#000000\",\"card--alternate-color--hover\":\"#ffffff\",\"optimizedCheckout-colorFocus\":\"#4496f6\",\"fontSize-root\":13,\"show_accept_amex\":true,\"blogdetail_style\":\"default\",\"optimizedCheckout-buttonPrimary-borderColorDisabled\":\"transparent\",\"homepage_top_products_count\":9,\"brandpage_products_per_page\":12,\"color-secondaryDarker\":\"#e8e8e8\",\"navUser-color\":\"#333333\",\"color-textBase--active\":\"#a5a5a5\",\"social_icon_placement_bottom\":\"bottom_none\",\"show_powered_by\":true,\"fontSize-h4\":20,\"checkRadio-borderColor\":\"#cccccc\",\"color-primaryDarker\":\"#747474\",\"optimizedCheckout-buttonPrimary-colorHover\":\"#ffffff\",\"brand_size\":\"190x250\",\"optimizedCheckout-logo-position\":\"left\",\"optimizedCheckout-discountBanner-backgroundColor\":\"#e5e5e5\",\"color-textLink--hover\":\"#ff5c00\",\"optimizedCheckout-buttonSecondary-backgroundColorHover\":\"#f5f5f5\",\"optimizedCheckout-headingPrimary-font\":\"Google_Raleway_400,600\",\"logo_size\":\"original\",\"optimizedCheckout-formField-backgroundColor\":\"#ffffff\",\"footer-backgroundColor\":\"#ffffff\",\"navPages-color\":\"#333333\",\"productpage_reviews_count\":6,\"optimizedCheckout-step-borderColor\":\"#dddddd\",\"show_accept_paypal\":true,\"homepage_extraslider_count\":9,\"logo-font\":\"Google_Raleway_400,600\",\"fbMessage_status\":false,\"settings_subcategory_col\":\"5\",\"optimizedCheckout-discountBanner-textColor\":\"#333333\",\"optimizedCheckout-backgroundImage-size\":\"1000x400\",\"optimizedCheckout-buttonPrimary-font\":\"Google_Raleway_400,600\",\"carousel-dot-color\":\"#747474\",\"button--disabled-backgroundColor\":\"#dadada\",\"settings_productgallery\":\"bottom\",\"blockquote-cite-font-color\":\"#999999\",\"homepage_categoryslider_row\":3,\"cardGallery_size\":\"41x41\",\"optimizedCheckout-formField-shadowColor\":\"#e5e5e5\",\"categorypage_products_per_page\":12,\"container-fill-base\":\"#ffffff\",\"homepage_featured_products_column_count\":4,\"button--default-color\":\"#454545\",\"pace-progress-backgroundColor\":\"#989898\",\"color-textLink--active\":\"#a5a5a5\",\"home_section6\":\"section6\",\"optimizedCheckout-loadingToaster-backgroundColor\":\"#333333\",\"color-textHeading\":\"#222222\",\"show_accept_discover\":true,\"optimizedCheckout-formField-errorColor\":\"#d14343\",\"spinner-borderColor-dark\":\"#989898\",\"restrict_to_login\":false,\"input-font-color\":\"#454545\",\"carousel-title-color\":\"#747474\",\"select-bg-color\":\"#ffffff\",\"show_accept_mastercard\":true,\"color_text_product_sale_badges\":\"#ffffff\",\"optimizedCheckout-link-font\":\"Google_Raleway_400,600\",\"homepage_show_carousel_arrows\":true,\"carousel-arrow-bgColor\":\"#ffffff\",\"color_hover_product_sale_badges\":\"#000000\",\"card--alternate-borderColor\":\"#ffffff\",\"homepage_new_products_count\":9,\"button--disabled-color\":\"#ffffff\",\"color-primaryDark\":\"#454545\",\"show_footer_info_3\":true,\"color-grey\":\"#4f4f4f\",\"optimizedCheckout-step-textColor\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-borderColorActive\":\"transparent\",\"navPages-subMenu-backgroundColor\":\"#e5e5e5\",\"body-font\":\"Google_Raleway_400,600\",\"home_section3\":\"section3\",\"button--primary-backgroundColor\":\"#454545\",\"optimizedCheckout-formField-borderColor\":\"#cccccc\",\"checkRadio-color\":\"#4f4f4f\",\"show_product_dimensions\":false,\"optimizedCheckout-link-color\":\"#476bef\",\"icon-color-hover\":\"#a5a5a5\",\"button--default-borderColor\":\"#dfdfdf\",\"optimizedCheckout-headingSecondary-font\":\"Google_Raleway_400,600\",\"headings-font\":\"Google_Raleway_400,600\",\"label-backgroundColor\":\"#bfbfbf\",\"button--primary-backgroundColorHover\":\"#666666\",\"card-figcaption-button-background\":\"#ffffff\",\"home_section4\":\"section4\",\"button--disabled-borderColor\":\"#dadada\",\"label-color\":\"#ffffff\",\"optimizedCheckout-headingSecondary-color\":\"#333333\",\"select-arrow-color\":\"#828282\",\"logo_fontSize\":28,\"alert-backgroundColor\":\"#ffffff\",\"homepage_deals_row\":2,\"optimizedCheckout-logo-size\":\"250x100\",\"default_image_brand\":\"/assets/img/ProductDefault.gif\",\"blogdetail_size\":\"870x320\",\"card-title-color\":\"#333333\",\"product_list_display_mode\":\"list\",\"optimizedCheckout-link-hoverColor\":\"#002fe1\",\"home_section8\":\"section8\",\"fontSize-h5\":15,\"homepage_deals_col\":3,\"product_size\":\"500x659\",\"homepage_show_carousel\":true,\"optimizedCheckout-body-backgroundColor\":\"#ffffff\",\"carousel-arrow-borderColor\":\"#ffffff\",\"button--default-borderColorActive\":\"#454545\",\"header-backgroundColor\":\"#ffffff\",\"color-greyDarkest\":\"#747474\",\"color_badge_product_sale_badges\":\"#ff5c00\",\"price_ranges\":true,\"productpage_videos_count\":4,\"color-greyDark\":\"#666666\",\"homepage_listingtabs_activetab\":\"bestselling\",\"optimizedCheckout-buttonSecondary-borderColorHover\":\"#999999\",\"optimizedCheckout-discountBanner-iconColor\":\"#333333\",\"optimizedCheckout-buttonSecondary-borderColor\":\"#cccccc\",\"optimizedCheckout-loadingToaster-textColor\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-colorDisabled\":\"#ffffff\",\"optimizedCheckout-formField-placeholderColor\":\"#999999\",\"navUser-color-hover\":\"#757575\",\"icon-ratingFull\":\"#454545\",\"default_image_gift_certificate\":\"/assets/img/GiftCertificate.png\",\"homepage_listingtabs_count\":16,\"settings_sidebar\":\"left\",\"color-textBase--hover\":\"#a5a5a5\",\"color-errorLight\":\"#ffdddd\",\"social_icon_placement_top\":true,\"blog_size\":\"464x320\",\"productLabel_size\":\"60x60\",\"shop_by_price_visibility\":true,\"optimizedCheckout-buttonSecondary-colorActive\":\"#000000\",\"optimizedCheckout-orderSummary-backgroundColor\":\"#ffffff\",\"color-warningLight\":\"#fffdea\",\"show_product_weight\":true,\"button--default-colorActive\":\"#454545\",\"fbMessage_pos\":\"right-bottom\",\"color-info\":\"#666666\",\"show_product_quick_view\":true,\"button--default-borderColorHover\":\"#989898\",\"card--alternate-backgroundColor\":\"#ffffff\",\"hide_content_navigation\":false,\"general_bannereffect\":\"effect2\",\"optimizedCheckout-formChecklist-backgroundColorSelected\":\"#f5f5f5\",\"show_copyright_footer\":true,\"swatch_option_size\":\"22x22\",\"optimizedCheckout-orderSummary-borderColor\":\"#dddddd\",\"optimizedCheckout-show-logo\":\"none\",\"carousel-description-color\":\"#747474\",\"settings_sizechart\":true,\"optimizedCheckout-formChecklist-backgroundColor\":\"#ffffff\",\"fontSize-h2\":25,\"optimizedCheckout-step-backgroundColor\":\"#757575\",\"optimizedCheckout-headingPrimary-color\":\"#333333\",\"color-textBase\":\"#495057\",\"color-warning\":\"#d4cb49\",\"productgallery_size\":\"180x180\",\"home_section1\":\"section1\",\"alert-color\":\"#333333\",\"shop_by_brand_show_footer\":true,\"card-figcaption-button-color\":\"#747474\",\"searchpage_products_per_page\":12,\"color-textSecondary--active\":\"#4f4f4f\",\"optimizedCheckout-formField-inputControlColor\":\"#476bef\",\"optimizedCheckout-contentPrimary-color\":\"#333333\",\"optimizedCheckout-buttonSecondary-font\":\"Google_Raleway_400,600\",\"storeName-color\":\"#333333\",\"optimizedCheckout-backgroundImage\":\"\",\"form-label-font-color\":\"#666666\",\"color-greyLightest\":\"#e8e8e8\",\"optimizedCheckout-header-backgroundColor\":\"#f5f5f5\",\"productpage_related_products_count\":6,\"optimizedCheckout-buttonSecondary-backgroundColorActive\":\"#e5e5e5\",\"color-greyLighter\":\"#dfdfdf\",\"home_section5\":\"section5\",\"color-secondaryDark\":\"#e8e8e8\",\"fontSize-h6\":13,\"color-textLink\":\"#4f4f4f\",\"show_product_wishlist\":true,\"carousel-arrow-color\":\"#989898\",\"productpage_similar_by_views_count\":6,\"homepage_newletterpopup\":true,\"home_section9\":\"section9\",\"loadingOverlay-backgroundColor\":\"#ffffff\",\"default_image_banner\":\"/assets/img/ProductDefault.gif\",\"optimizedCheckout-buttonPrimary-color\":\"#ffffff\",\"input-bg-color\":\"#ffffff\",\"navPages-subMenu-separatorColor\":\"#cccccc\",\"navPages-color-hover\":\"#757575\",\"color-infoLight\":\"#dfdfdf\",\"product_sale_badges\":\"discount\",\"default_image_product\":\"/assets/img/ProductDefault.gif\",\"settings_producttab\":\"horizontal\",\"color-greyMedium\":\"#989898\",\"show_product_rating\":true,\"optimizedCheckout-formChecklist-borderColor\":\"#cccccc\",\"fontSize-h1\":28,\"homepage_featured_products_count\":9,\"navUser-dropdown-borderColor\":\"#cccccc\",\"show_address_email\":true,\"image_product_loading\":\"/assets/img/product-loading.gif\",\"optimizedCheckout-buttonPrimary-colorActive\":\"#ffffff\",\"show_footer_info_1\":true,\"color-greyLight\":\"#a5a5a5\",\"optimizedCheckout-logo\":\"\",\"icon-ratingEmpty\":\"#dfdfdf\",\"homepage_listingtabs_column\":5,\"show_product_details_tabs\":true,\"icon-color\":\"#4f4f4f\",\"overlay-backgroundColor\":\"#747474\",\"input-border-color-active\":\"#989898\",\"container-fill-dark\":\"#f2f2f2\",\"optimizedCheckout-buttonPrimary-backgroundColorDisabled\":\"#cccccc\",\"button--primary-color\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-borderColorHover\":\"transparent\",\"color-successLight\":\"#d5ffd8\",\"color-greyDarker\":\"#454545\",\"show_product_quantity_box\":true,\"color-success\":\"#69d66f\",\"optimizedCheckout-header-borderColor\":\"#dddddd\",\"zoom_size\":\"1280x1280\",\"color-white\":\"#ffffff\",\"homepage_deal_sort\":\"bestselling\",\"optimizedCheckout-buttonSecondary-backgroundColor\":\"#ffffff\",\"productview_thumb_size\":\"100x100\",\"fontSize-h3\":22,\"spinner-borderColor-light\":\"#ffffff\",\"geotrust_ssl_common_name\":\"../index.html\",\"show_product_brand\":false,\"carousel-bgColor\":\"#ffffff\",\"carousel-dot-color-active\":\"#666666\",\"input-border-color\":\"#dfdfdf\",\"optimizedCheckout-buttonPrimary-backgroundColor\":\"#333333\",\"color-secondary\":\"#ffffff\",\"extraslider_size\":\"85x85\",\"button--primary-backgroundColorActive\":\"#989898\",\"color-textSecondary--hover\":\"#4f4f4f\",\"color-whitesBase\":\"#f8f8f8\",\"body-bg\":\"#ffffff\",\"dropdown--quickSearch-backgroundColor\":\"#e5e5e5\",\"optimizedCheckout-contentSecondary-font\":\"Google_Raleway_400,600\",\"navUser-dropdown-backgroundColor\":\"#ffffff\",\"color-primary\":\"#ff5c00\",\"optimizedCheckout-contentPrimary-font\":\"Google_Raleway_400,600\",\"fbMessage_url\":\"https://www.facebook.com/MagenTech\",\"navigation_design\":\"alternate\",\"optimizedCheckout-formField-textColor\":\"#333333\",\"color-black\":\"#000000\",\"general_rtl\":\"ltr\",\"homepage_top_products_column_count\":4,\"theme_style\":\"default\",\"show_product_compare\":false,\"product_list_display_gallery\":\"left\",\"show_on_topheader\":true,\"optimizedCheckout-buttonSecondary-colorHover\":\"#333333\",\"button--primary-colorActive\":\"#ffffff\",\"homepage_stretch_carousel_images\":false,\"optimizedCheckout-contentSecondary-color\":\"#757575\",\"card-title-color-hover\":\"#757575\",\"applePay-button\":\"black\",\"thumb_size\":\"100x100\",\"optimizedCheckout-buttonPrimary-borderColor\":\"#cccccc\",\"navUser-indicator-backgroundColor\":\"#333333\",\"optimizedCheckout-buttonSecondary-borderColorActive\":\"#757575\",\"settings_subcategory\":true,\"optimizedCheckout-header-textColor\":\"#333333\",\"general_backtotop\":true,\"optimizedCheckout-show-backgroundImage\":false,\"color-primaryLight\":\"#a5a5a5\",\"hide_mega_navigation\":true,\"show_accept_visa\":true,\"logo-position\":\"left\",\"show_product_reviews_tabs\":true,\"carousel-dot-bgColor\":\"#ffffff\",\"optimizedCheckout-form-textColor\":\"#666666\",\"geotrust_ssl_seal_size\":\"M\",\"optimizedCheckout-buttonSecondary-color\":\"#333333\",\"home_section7\":\"section7\",\"button--default-colorHover\":\"#666666\",\"checkRadio-backgroundColor\":\"#ffffff\",\"deals_size\":\"300x300\",\"optimizedCheckout-buttonPrimary-backgroundColorHover\":\"#666666\",\"settings_countdown\":true,\"input-disabled-bg\":\"#ffffff\",\"address_email\":\"contact@revo.com\",\"settings_productlabel\":true,\"button--icon-svg-color\":\"#4f4f4f\",\"show_footer_info_2\":true,\"alert-color-alt\":\"#ffffff\",\"dropdown--wishList-backgroundColor\":\"#ffffff\",\"container-border-global-color-base\":\"#e5e5e5\",\"productthumb_size\":\"100x100\",\"home_section2\":\"section2\",\"button--primary-colorHover\":\"#ffffff\",\"color-error\":\"#ff7d7d\",\"home_section10\":\"section10\",\"homepage_blog_posts_count\":6,\"color-textSecondary\":\"#989898\",\"gallery_size\":\"181x181\"},\"genericError\":\"Oops! Something went wrong.\",\"maintenanceMode\":[],\"urls\":{\"home\":\"../index.html\",\"account\":{\"index\":\"/account.php\",\"orders\":{\"all\":\"../logind1fa.html?action=order_status\",\"completed\":\"../login91d7.html?action=view_orders\",\"save_new_return\":\"/account.php?action=save_new_return\"},\"update_action\":\"../login83b1.html?action=update_account\",\"returns\":\"../logine921.html?action=view_returns\",\"addresses\":\"../login479d.html?action=address_book\",\"inbox\":\"../login5df3.html?action=inbox\",\"send_message\":\"../login1273.html?action=send_message\",\"add_address\":\"../logindda8.html?action=add_shipping_address\",\"wishlists\":{\"all\":\"/wishlist.php\",\"add\":\"../login5946.html?action=addwishlist\",\"edit\":\"../login1c39.html?action=editwishlist\",\"delete\":\"/wishlist.php?action=deletewishlist\"},\"details\":\"../login8e0b.html?action=account_details\",\"recent_items\":\"/account.php?action=recent_items\"},\"brands\":\"../brands/index.html\",\"gift_certificate\":{\"purchase\":\"/giftcertificates.php\",\"redeem\":\"../giftcertificatese8f7.html?action=redeem\",\"balance\":\"/giftcertificates.php?action=balance\"},\"auth\":{\"login\":\"/login.php\",\"check_login\":\"../loginb320.html?action=check_login\",\"create_account\":\"../logind85d.html?action=create_account\",\"save_new_account\":\"../login5485.html?action=save_new_account\",\"forgot_password\":\"../login8311.html?action=reset_password\",\"send_password_email\":\"../login4104.html?action=send_password_email\",\"save_new_password\":\"../logina61b.html?action=save_new_password\",\"logout\":\"/login.php?action=logout\"},\"product\":{\"post_review\":\"/postreview.php\"},\"cart\":\"/cart.php\",\"checkout\":{\"single_address\":\"/checkout\",\"multiple_address\":\"/checkout.php?action=multiple\"},\"rss\":{\"products\":{\"new\":\"../rssdcab.php?type=rss\",\"new_atom\":\"../rssb550.php?type=atom\",\"popular\":\"../rssbb4d.php?action=popularproducts&amp;type=rss\",\"popular_atom\":\"../rss6d6b.php?action=popularproducts&amp;type=atom\",\"featured\":\"../rss032e.php?action=featuredproducts&amp;type=rss\",\"featured_atom\":\"../rss98e7.php?action=featuredproducts&amp;type=atom\",\"search\":\"../rss17d7.php?action=searchproducts&amp;type=rss\",\"search_atom\":\"/rss.php?action=searchproducts&type=atom\"},\"blog\":\"../rssdce9.php?action=newblogs&amp;type=rss\",\"blog_atom\":\"/rss.php?action=newblogs&type=atom\"},\"contact_us_submit\":\"../pages187d.html?action=sendContactForm\",\"search\":\"/search.php\",\"compare\":\"/compare\",\"sitemap\":\"/sitemap.php\",\"subscribe\":{\"action\":\"/subscribe.php\"}},\"reviewRating\":\"The 'Rating' field cannot be blank.\",\"reviewSubject\":\"The 'Review Subject' field cannot be blank.\",\"reviewComment\":\"The 'Comments' field cannot be blank.\",\"reviewEmail\":\"Please use a valid email address, such as user@example.com.\"}").load();
        // window.stencilBootstrap("default", "{\"themeSettings\":{\"optimizedCheckout-formChecklist-color\":\"#333333\",\"homepage_new_products_column_count\":4,\"optimizedCheckout-buttonPrimary-backgroundColorActive\":\"#000000\",\"card--alternate-color--hover\":\"#ffffff\",\"optimizedCheckout-colorFocus\":\"#4496f6\",\"fontSize-root\":13,\"show_accept_amex\":true,\"blogdetail_style\":\"default\",\"optimizedCheckout-buttonPrimary-borderColorDisabled\":\"transparent\",\"homepage_top_products_count\":9,\"brandpage_products_per_page\":12,\"color-secondaryDarker\":\"#e8e8e8\",\"navUser-color\":\"#333333\",\"color-textBase--active\":\"#a5a5a5\",\"social_icon_placement_bottom\":\"bottom_none\",\"show_powered_by\":true,\"fontSize-h4\":20,\"checkRadio-borderColor\":\"#cccccc\",\"color-primaryDarker\":\"#747474\",\"optimizedCheckout-buttonPrimary-colorHover\":\"#ffffff\",\"brand_size\":\"190x250\",\"optimizedCheckout-logo-position\":\"left\",\"optimizedCheckout-discountBanner-backgroundColor\":\"#e5e5e5\",\"color-textLink--hover\":\"#ff5c00\",\"optimizedCheckout-buttonSecondary-backgroundColorHover\":\"#f5f5f5\",\"optimizedCheckout-headingPrimary-font\":\"Google_Raleway_400,600\",\"logo_size\":\"original\",\"optimizedCheckout-formField-backgroundColor\":\"#ffffff\",\"footer-backgroundColor\":\"#ffffff\",\"navPages-color\":\"#333333\",\"productpage_reviews_count\":6,\"optimizedCheckout-step-borderColor\":\"#dddddd\",\"show_accept_paypal\":true,\"homepage_extraslider_count\":9,\"logo-font\":\"Google_Raleway_400,600\",\"fbMessage_status\":false,\"settings_subcategory_col\":\"5\",\"optimizedCheckout-discountBanner-textColor\":\"#333333\",\"optimizedCheckout-backgroundImage-size\":\"1000x400\",\"optimizedCheckout-buttonPrimary-font\":\"Google_Raleway_400,600\",\"carousel-dot-color\":\"#747474\",\"button--disabled-backgroundColor\":\"#dadada\",\"settings_productgallery\":\"bottom\",\"blockquote-cite-font-color\":\"#999999\",\"homepage_categoryslider_row\":3,\"cardGallery_size\":\"41x41\",\"optimizedCheckout-formField-shadowColor\":\"#e5e5e5\",\"categorypage_products_per_page\":12,\"container-fill-base\":\"#ffffff\",\"homepage_featured_products_column_count\":4,\"button--default-color\":\"#454545\",\"pace-progress-backgroundColor\":\"#989898\",\"color-textLink--active\":\"#a5a5a5\",\"home_section6\":\"section6\",\"optimizedCheckout-loadingToaster-backgroundColor\":\"#333333\",\"color-textHeading\":\"#222222\",\"show_accept_discover\":true,\"optimizedCheckout-formField-errorColor\":\"#d14343\",\"spinner-borderColor-dark\":\"#989898\",\"restrict_to_login\":false,\"input-font-color\":\"#454545\",\"carousel-title-color\":\"#747474\",\"select-bg-color\":\"#ffffff\",\"show_accept_mastercard\":true,\"color_text_product_sale_badges\":\"#ffffff\",\"optimizedCheckout-link-font\":\"Google_Raleway_400,600\",\"homepage_show_carousel_arrows\":true,\"carousel-arrow-bgColor\":\"#ffffff\",\"color_hover_product_sale_badges\":\"#000000\",\"card--alternate-borderColor\":\"#ffffff\",\"homepage_new_products_count\":9,\"button--disabled-color\":\"#ffffff\",\"color-primaryDark\":\"#454545\",\"show_footer_info_3\":true,\"color-grey\":\"#4f4f4f\",\"optimizedCheckout-step-textColor\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-borderColorActive\":\"transparent\",\"navPages-subMenu-backgroundColor\":\"#e5e5e5\",\"body-font\":\"Google_Raleway_400,600\",\"home_section3\":\"section3\",\"button--primary-backgroundColor\":\"#454545\",\"optimizedCheckout-formField-borderColor\":\"#cccccc\",\"checkRadio-color\":\"#4f4f4f\",\"show_product_dimensions\":false,\"optimizedCheckout-link-color\":\"#476bef\",\"icon-color-hover\":\"#a5a5a5\",\"button--default-borderColor\":\"#dfdfdf\",\"optimizedCheckout-headingSecondary-font\":\"Google_Raleway_400,600\",\"headings-font\":\"Google_Raleway_400,600\",\"label-backgroundColor\":\"#bfbfbf\",\"button--primary-backgroundColorHover\":\"#666666\",\"card-figcaption-button-background\":\"#ffffff\",\"home_section4\":\"section4\",\"button--disabled-borderColor\":\"#dadada\",\"label-color\":\"#ffffff\",\"optimizedCheckout-headingSecondary-color\":\"#333333\",\"select-arrow-color\":\"#828282\",\"logo_fontSize\":28,\"alert-backgroundColor\":\"#ffffff\",\"homepage_deals_row\":2,\"optimizedCheckout-logo-size\":\"250x100\",\"default_image_brand\":\"/assets/img/ProductDefault.gif\",\"blogdetail_size\":\"870x320\",\"card-title-color\":\"#333333\",\"product_list_display_mode\":\"list\",\"optimizedCheckout-link-hoverColor\":\"#002fe1\",\"home_section8\":\"section8\",\"fontSize-h5\":15,\"homepage_deals_col\":3,\"product_size\":\"500x659\",\"homepage_show_carousel\":true,\"optimizedCheckout-body-backgroundColor\":\"#ffffff\",\"carousel-arrow-borderColor\":\"#ffffff\",\"button--default-borderColorActive\":\"#454545\",\"header-backgroundColor\":\"#ffffff\",\"color-greyDarkest\":\"#747474\",\"color_badge_product_sale_badges\":\"#ff5c00\",\"price_ranges\":true,\"productpage_videos_count\":4,\"color-greyDark\":\"#666666\",\"homepage_listingtabs_activetab\":\"bestselling\",\"optimizedCheckout-buttonSecondary-borderColorHover\":\"#999999\",\"optimizedCheckout-discountBanner-iconColor\":\"#333333\",\"optimizedCheckout-buttonSecondary-borderColor\":\"#cccccc\",\"optimizedCheckout-loadingToaster-textColor\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-colorDisabled\":\"#ffffff\",\"optimizedCheckout-formField-placeholderColor\":\"#999999\",\"navUser-color-hover\":\"#757575\",\"icon-ratingFull\":\"#454545\",\"default_image_gift_certificate\":\"/assets/img/GiftCertificate.png\",\"homepage_listingtabs_count\":16,\"settings_sidebar\":\"left\",\"color-textBase--hover\":\"#a5a5a5\",\"color-errorLight\":\"#ffdddd\",\"social_icon_placement_top\":true,\"blog_size\":\"464x320\",\"productLabel_size\":\"60x60\",\"shop_by_price_visibility\":true,\"optimizedCheckout-buttonSecondary-colorActive\":\"#000000\",\"optimizedCheckout-orderSummary-backgroundColor\":\"#ffffff\",\"color-warningLight\":\"#fffdea\",\"show_product_weight\":true,\"button--default-colorActive\":\"#454545\",\"fbMessage_pos\":\"right-bottom\",\"color-info\":\"#666666\",\"show_product_quick_view\":true,\"button--default-borderColorHover\":\"#989898\",\"card--alternate-backgroundColor\":\"#ffffff\",\"hide_content_navigation\":false,\"general_bannereffect\":\"effect2\",\"optimizedCheckout-formChecklist-backgroundColorSelected\":\"#f5f5f5\",\"show_copyright_footer\":true,\"swatch_option_size\":\"22x22\",\"optimizedCheckout-orderSummary-borderColor\":\"#dddddd\",\"optimizedCheckout-show-logo\":\"none\",\"carousel-description-color\":\"#747474\",\"settings_sizechart\":true,\"optimizedCheckout-formChecklist-backgroundColor\":\"#ffffff\",\"fontSize-h2\":25,\"optimizedCheckout-step-backgroundColor\":\"#757575\",\"optimizedCheckout-headingPrimary-color\":\"#333333\",\"color-textBase\":\"#495057\",\"color-warning\":\"#d4cb49\",\"productgallery_size\":\"180x180\",\"home_section1\":\"section1\",\"alert-color\":\"#333333\",\"shop_by_brand_show_footer\":true,\"card-figcaption-button-color\":\"#747474\",\"searchpage_products_per_page\":12,\"color-textSecondary--active\":\"#4f4f4f\",\"optimizedCheckout-formField-inputControlColor\":\"#476bef\",\"optimizedCheckout-contentPrimary-color\":\"#333333\",\"optimizedCheckout-buttonSecondary-font\":\"Google_Raleway_400,600\",\"storeName-color\":\"#333333\",\"optimizedCheckout-backgroundImage\":\"\",\"form-label-font-color\":\"#666666\",\"color-greyLightest\":\"#e8e8e8\",\"optimizedCheckout-header-backgroundColor\":\"#f5f5f5\",\"productpage_related_products_count\":6,\"optimizedCheckout-buttonSecondary-backgroundColorActive\":\"#e5e5e5\",\"color-greyLighter\":\"#dfdfdf\",\"home_section5\":\"section5\",\"color-secondaryDark\":\"#e8e8e8\",\"fontSize-h6\":13,\"color-textLink\":\"#4f4f4f\",\"show_product_wishlist\":true,\"carousel-arrow-color\":\"#989898\",\"productpage_similar_by_views_count\":6,\"homepage_newletterpopup\":true,\"home_section9\":\"section9\",\"loadingOverlay-backgroundColor\":\"#ffffff\",\"default_image_banner\":\"/assets/img/ProductDefault.gif\",\"optimizedCheckout-buttonPrimary-color\":\"#ffffff\",\"input-bg-color\":\"#ffffff\",\"navPages-subMenu-separatorColor\":\"#cccccc\",\"navPages-color-hover\":\"#757575\",\"color-infoLight\":\"#dfdfdf\",\"product_sale_badges\":\"discount\",\"default_image_product\":\"/assets/img/ProductDefault.gif\",\"settings_producttab\":\"horizontal\",\"color-greyMedium\":\"#989898\",\"show_product_rating\":true,\"optimizedCheckout-formChecklist-borderColor\":\"#cccccc\",\"fontSize-h1\":28,\"homepage_featured_products_count\":9,\"navUser-dropdown-borderColor\":\"#cccccc\",\"show_address_email\":true,\"image_product_loading\":\"/assets/img/product-loading.gif\",\"optimizedCheckout-buttonPrimary-colorActive\":\"#ffffff\",\"show_footer_info_1\":true,\"color-greyLight\":\"#a5a5a5\",\"optimizedCheckout-logo\":\"\",\"icon-ratingEmpty\":\"#dfdfdf\",\"homepage_listingtabs_column\":5,\"show_product_details_tabs\":true,\"icon-color\":\"#4f4f4f\",\"overlay-backgroundColor\":\"#747474\",\"input-border-color-active\":\"#989898\",\"container-fill-dark\":\"#f2f2f2\",\"optimizedCheckout-buttonPrimary-backgroundColorDisabled\":\"#cccccc\",\"button--primary-color\":\"#ffffff\",\"optimizedCheckout-buttonPrimary-borderColorHover\":\"transparent\",\"color-successLight\":\"#d5ffd8\",\"color-greyDarker\":\"#454545\",\"show_product_quantity_box\":true,\"color-success\":\"#69d66f\",\"optimizedCheckout-header-borderColor\":\"#dddddd\",\"zoom_size\":\"1280x1280\",\"color-white\":\"#ffffff\",\"homepage_deal_sort\":\"bestselling\",\"optimizedCheckout-buttonSecondary-backgroundColor\":\"#ffffff\",\"productview_thumb_size\":\"100x100\",\"fontSize-h3\":22,\"spinner-borderColor-light\":\"#ffffff\",\"geotrust_ssl_common_name\":\"index.html\",\"show_product_brand\":false,\"carousel-bgColor\":\"#ffffff\",\"carousel-dot-color-active\":\"#666666\",\"input-border-color\":\"#dfdfdf\",\"optimizedCheckout-buttonPrimary-backgroundColor\":\"#333333\",\"color-secondary\":\"#ffffff\",\"extraslider_size\":\"85x85\",\"button--primary-backgroundColorActive\":\"#989898\",\"color-textSecondary--hover\":\"#4f4f4f\",\"color-whitesBase\":\"#f8f8f8\",\"body-bg\":\"#ffffff\",\"dropdown--quickSearch-backgroundColor\":\"#e5e5e5\",\"optimizedCheckout-contentSecondary-font\":\"Google_Raleway_400,600\",\"navUser-dropdown-backgroundColor\":\"#ffffff\",\"color-primary\":\"#ff5c00\",\"optimizedCheckout-contentPrimary-font\":\"Google_Raleway_400,600\",\"fbMessage_url\":\"https://www.facebook.com/MagenTech\",\"navigation_design\":\"alternate\",\"optimizedCheckout-formField-textColor\":\"#333333\",\"color-black\":\"#000000\",\"general_rtl\":\"ltr\",\"homepage_top_products_column_count\":4,\"theme_style\":\"default\",\"show_product_compare\":false,\"product_list_display_gallery\":\"left\",\"show_on_topheader\":true,\"optimizedCheckout-buttonSecondary-colorHover\":\"#333333\",\"button--primary-colorActive\":\"#ffffff\",\"homepage_stretch_carousel_images\":false,\"optimizedCheckout-contentSecondary-color\":\"#757575\",\"card-title-color-hover\":\"#757575\",\"applePay-button\":\"black\",\"thumb_size\":\"100x100\",\"optimizedCheckout-buttonPrimary-borderColor\":\"#cccccc\",\"navUser-indicator-backgroundColor\":\"#333333\",\"optimizedCheckout-buttonSecondary-borderColorActive\":\"#757575\",\"settings_subcategory\":true,\"optimizedCheckout-header-textColor\":\"#333333\",\"general_backtotop\":true,\"optimizedCheckout-show-backgroundImage\":false,\"color-primaryLight\":\"#a5a5a5\",\"hide_mega_navigation\":true,\"show_accept_visa\":true,\"logo-position\":\"left\",\"show_product_reviews_tabs\":true,\"carousel-dot-bgColor\":\"#ffffff\",\"optimizedCheckout-form-textColor\":\"#666666\",\"geotrust_ssl_seal_size\":\"M\",\"optimizedCheckout-buttonSecondary-color\":\"#333333\",\"home_section7\":\"section7\",\"button--default-colorHover\":\"#666666\",\"checkRadio-backgroundColor\":\"#ffffff\",\"deals_size\":\"300x300\",\"optimizedCheckout-buttonPrimary-backgroundColorHover\":\"#666666\",\"settings_countdown\":true,\"input-disabled-bg\":\"#ffffff\",\"address_email\":\"contact@revo.com\",\"settings_productlabel\":true,\"button--icon-svg-color\":\"#4f4f4f\",\"show_footer_info_2\":true,\"alert-color-alt\":\"#ffffff\",\"dropdown--wishList-backgroundColor\":\"#ffffff\",\"container-border-global-color-base\":\"#e5e5e5\",\"productthumb_size\":\"100x100\",\"home_section2\":\"section2\",\"button--primary-colorHover\":\"#ffffff\",\"color-error\":\"#ff7d7d\",\"home_section10\":\"section10\",\"homepage_blog_posts_count\":6,\"color-textSecondary\":\"#989898\",\"gallery_size\":\"181x181\"},\"genericError\":\"Oops! Something went wrong.\",\"maintenanceMode\":[],\"urls\":{\"home\":\"index.html\",\"account\":{\"index\":\"/account.php\",\"orders\":{\"all\":\"logind1fa.html?action=order_status\",\"completed\":\"login91d7.html?action=view_orders\",\"save_new_return\":\"/account.php?action=save_new_return\"},\"update_action\":\"login83b1.html?action=update_account\",\"returns\":\"logine921.html?action=view_returns\",\"addresses\":\"login479d.html?action=address_book\",\"inbox\":\"login5df3.html?action=inbox\",\"send_message\":\"login1273.html?action=send_message\",\"add_address\":\"logindda8.html?action=add_shipping_address\",\"wishlists\":{\"all\":\"/wishlist.php\",\"add\":\"login5946.html?action=addwishlist\",\"edit\":\"login1c39.html?action=editwishlist\",\"delete\":\"/wishlist.php?action=deletewishlist\"},\"details\":\"login8e0b.html?action=account_details\",\"recent_items\":\"/account.php?action=recent_items\"},\"brands\":\"brands/index.html\",\"gift_certificate\":{\"purchase\":\"/giftcertificates.php\",\"redeem\":\"giftcertificatese8f7.html?action=redeem\",\"balance\":\"/giftcertificates.php?action=balance\"},\"auth\":{\"login\":\"/login.php\",\"check_login\":\"loginb320.html?action=check_login\",\"create_account\":\"logind85d.html?action=create_account\",\"save_new_account\":\"login5485.html?action=save_new_account\",\"forgot_password\":\"login8311.html?action=reset_password\",\"send_password_email\":\"login4104.html?action=send_password_email\",\"save_new_password\":\"logina61b.html?action=save_new_password\",\"logout\":\"/login.php?action=logout\"},\"product\":{\"post_review\":\"/postreview.php\"},\"cart\":\"/cart.php\",\"checkout\":{\"single_address\":\"/checkout\",\"multiple_address\":\"/checkout.php?action=multiple\"},\"rss\":{\"products\":{\"new\":\"rssdcab.php?type=rss\",\"new_atom\":\"rssb550.php?type=atom\",\"popular\":\"rssbb4d.php?action=popularproducts&amp;type=rss\",\"popular_atom\":\"rss6d6b.php?action=popularproducts&amp;type=atom\",\"featured\":\"rss032e.php?action=featuredproducts&amp;type=rss\",\"featured_atom\":\"rss98e7.php?action=featuredproducts&amp;type=atom\",\"search\":\"rss17d7.php?action=searchproducts&amp;type=rss\",\"search_atom\":\"/rss.php?action=searchproducts&type=atom\"},\"blog\":\"rssdce9.php?action=newblogs&amp;type=rss\",\"blog_atom\":\"/rss.php?action=newblogs&type=atom\"},\"contact_us_submit\":\"pages187d.html?action=sendContactForm\",\"search\":\"/search.php\",\"compare\":\"/compare\",\"sitemap\":\"/sitemap.php\",\"subscribe\":{\"action\":\"/subscribe.php\"}}}").load();
    </script>
    <script type="text/javascript" src="{{asset('revo_template/shared/js/csrf-protection-header-b572e5526f6854c73a5e080ef15a771f963740ae.js')}}"></script>
    <script>
        // Check is commerce analytics installed
        var BKCommerceAnalyticsEnable = 0;
        var bkRawUrl = function() {
            return window.location.href
        }();
        (function(doc, scriptPath, apiKey) {
            if (doc.getElementById(apiKey)) {
                return;
            }
            var sc, node, today = new Date(),
                dd = today.getDate(),
                mm = today.getMonth() + 1,
                yyyy = today.getFullYear();
            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;
            today = yyyy + mm + dd;
            window.BKShopApiKey = apiKey;
            sc = doc.createElement("script");
            sc.type = "text/javascript";
            sc.async = !0;
            sc.src = scriptPath + '?' + today;
            sc.id = apiKey;
            node = doc.getElementsByTagName("script")[0];
            node.parentNode.insertBefore(sc, node);
        })(document, 'revo_template/js/beeketing.js', 'aa31df95cbb414dba006588152ee49b3');
    </script>
    <!-- snippet location footer -->
</body>
<!-- Mirrored from sb-revo.mybigcommerce.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 17:06:33 GMT -->

</html>