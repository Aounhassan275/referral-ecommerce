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
    <link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css"> 
    <script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
    <script>
        // Change document class from no-js to js so we can detect this in css
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    </script>
    <script type="text/javascript" src="{{asset('revo_template/v1/loader.js')}}" defer></script>
    <script type="text/javascript">
        var BCData = {
            "csrf_token": "7ad3f2efebfc93e089c70f6aec1537967fc622710b30f42552901e66ebde9330"
        };
    </script>
    @toastr_css
    @yield('css')
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
                                    <span class="title-mega">All Categories </span>
                                    <svg class="icon-caret-circle" width="16" height="16">
                                        <use xlink:href="#icon-caret-circle-down"></use>
                                    </svg>
                                </a>
                                <div class="mobile-verticalCategories is-open" id="mobile--verticalCategories" aria-hidden="true" tabindex="-1">
                                    <span class="mobileMenu-close fa fa-times"></span>
                                    <ul class="navPages-list navPages-list--categories">  
                                        @foreach(App\Models\Category::take(10)->get() as $category)
                                        <li class="navPages-item navPages-item--default ">
                                            <a class="navPages-action" href="{{route('category.show',str_replace(' ', '_',$category->name))}}">
                                                <i class="fa fa-mobile"></i> {{$category->name}} </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="mobileMenu-toggle mobileMenu--vertical" data-mobile-menu-toggle="menumobile--verticalCategories" aria-controls="menumobile--verticalCategories">
                                <span class="mobileMenu-toggleIcon"> Vertical Categories</span>
                            </a>
                        </div>
                        <div class="col-3 logo-container">
                            <a href="{{url('home')}}" class="header-logo">
                                <div class="header-logo-image-container">
                                    <img class="header-logo-image" 
                                    src="{{asset('user_asset/'.App\Models\Setting::logo().'.png')}}" alt="SB Revo" title="SB Revo">
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
                                            <a class="navPages-action" href="{{url('/')}}"> Home</a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('categories')}}"> Category </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('brands')}}"> Brands </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('countries')}}"> Countries </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('cities')}}"> Cities </a>
                                        </li>
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('products')}}"> Products </a>
                                        </li>
                                        @if(App\Models\Setting::enableServiceSection() == '1')
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('our_service')}}"> Services </a>
                                        </li>
                                        @endif
                                        @if(App\Models\Setting::enablePostSection() == '1')
                                        <li class="navPages-item ">
                                            <a class="navPages-action" href="{{url('posts')}}"> Posts </a>
                                        </li>
                                        @endif
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
                                    @if(App\Models\Setting::enableServiceSection() == '1')
                                    <li class="navUser-item">
                                        <a class="navUser-action " href="{{url('our_service')}}" >
                                            <i class="fa fa-user"></i> Services 
                                        </a>
                                    </li>
                                    @endif
                                    @if(App\Models\Setting::enablePostSection() == '1')
                                    <li class="navUser-item">
                                        <a class="navUser-action " href="{{url('posts')}}" >
                                            <i class="fa fa-user"></i> Posts 
                                        </a>
                                    </li>
                                    @endif
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
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('/')}}"> Home</a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('categories')}}"> Category </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('brands')}}"> Brands </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('countries')}}"> Countries </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('cities')}}"> Cities </a>
                                </li>
                                <li class="navPages-item ">
                                    <a class="navPages-action" href="{{url('products')}}"> Products </a>
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
    
    <script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
	@toastr_js
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
    <!-- snippet location footer -->
    @yield('scripts')
</body>
<!-- Mirrored from sb-revo.mybigcommerce.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Apr 2023 17:06:33 GMT -->

</html>