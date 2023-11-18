
<footer class="footer " role="contentinfo">
    {{-- <section class="footer-top">
        <div class="container">
            <div class="module sb-banner sb-banner--services ">
                <div class="block-content clearfix d-flex flex-row">
                    <div class="banners">
                        <div class="banner-figure">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="banner-figcaption">
                            <div class="banner-figcaption__body">
                                <h5 class="banner-figcaption__title">free delivery</h5>
                                <p class="banner-figcaption__text">From 275 AED</p>
                            </div>
                        </div>
                    </div>
                    <div class="banners">
                        <div class="banner-figure">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="banner-figcaption">
                            <div class="banner-figcaption__body">
                                <h5 class="banner-figcaption__title">cash on delivery</h5>
                                <p class="banner-figcaption__text">From 275 AED</p>
                            </div>
                        </div>
                    </div>
                    <div class="banners">
                        <div class="banner-figure">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="banner-figcaption">
                            <div class="banner-figcaption__body">
                                <h5 class="banner-figcaption__title">free gift box</h5>
                                <p class="banner-figcaption__text">& gift note</p>
                            </div>
                        </div>
                    </div>
                    <div class="banners">
                        <div class="banner-figure">
                            <i class="fa fa-phone-square"></i>
                        </div>
                        <div class="banner-figcaption">
                            <div class="banner-figcaption__body">
                                <h5 class="banner-figcaption__title">contact us</h5>
                                <p class="banner-figcaption__text">123 456 789</p>
                            </div>
                        </div>
                    </div>
                    <div class="banners">
                        <div class="banner-figure">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="banner-figcaption">
                            <div class="banner-figcaption__body">
                                <h5 class="banner-figcaption__title">Loyalty</h5>
                                <p class="banner-figcaption__text">Rewarded</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="footer-center ">
        <div class="footer-center__first">
            <div class="container">
                @if((new \Jenssegers\Agent\Agent())->isDesktop())
                <div class="row "> 
                    <div class="col-md-3"></div>
                    <div class="col-md-8">
                        <div class="module sb-banner sb-banner--buyFromus">
                            <div class="block-content clearfix d-flex flex-row">
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::facebook()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/f.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::twitter()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::linkedin()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/in.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="https://api.whatsapp.com/send?phone={{App\Models\Setting::whatsapp()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/w.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::instagram()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/i.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::youtube()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/y.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::tiktok()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/tt.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::snack()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/s.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
                @else
                <div class="row "> 
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="module sb-banner sb-banner--buyFromus">
                            <div class="block-content clearfix d-flex flex-row">
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::facebook()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/f.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::twitter()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/t.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::linkedin()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/in.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="https://api.whatsapp.com/send?phone={{App\Models\Setting::whatsapp()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/w.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
                <div class="row "> 
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="module sb-banner sb-banner--buyFromus">
                            <div class="block-content clearfix d-flex flex-row">
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::instagram()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/i.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::youtube()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/y.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::tiktok()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/tt.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                                <div class="banners"  >
                                    <div class="banner-figure">
                                        <a href="{{App\Models\Setting::snack()}}" target="_blank"><img class="img-fluid" src="{{asset('revo_template/social/s.png')}}"  alt="reasons 1"  /></a>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
                @endif
                <div class="row">
                    <article class="custom_categories col-xs-12 ">
                        <nav class="navPages-horizontal">
                            <ul class="navPages-list">
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('/')}}">Home</a>
                                </li>
                                @if(App\Models\Setting::enablePostSection() == '1')
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('posts')}}">Post</a>
                                </li>
                                @endif
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('our_service')}}">Services</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('products')}}">Products</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('blogs')}}">Blog</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('contact_us')}}">Contact Us</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('about_us')}}">About Us</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('terms_and_condition')}}">Terms & Condition</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('privacy_policy')}}">Privacy Policy</a>
                                </li>
                                @if (Auth::guard('user')->check())
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('user/dashboard')}}">Dashboard</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('user/logout')}}">Log Out</a>
                                </li>
                                @else 
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{App\Models\Setting::companyReferralLink()}}">Sign Up</a>
                                </li>
                                <li class="navPages-item navPages-item-page">
                                    <a class="navPages-action" href="{{url('user/login')}}">Sign In</a>
                                </li>

                                @endif
                            </ul>
                        </nav>
                    </article>
                </div>
            </div>
        </div>
    </section>
</footer>