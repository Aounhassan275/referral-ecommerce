<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$user->name}} | W-LINKUP PROFILE</title>
  <meta content="wlinkup" name="description">
  <meta content="wlinkup" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('profile-theme-assets/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('profile-theme-assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('profile-theme-assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('profile-theme-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('profile-theme-assets/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('profile-theme-assets/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('profile-theme-assets/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('profile-theme-assets/assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css"> 
  @toastr_css
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('profile-theme-assets/assets/img/logo.png')}}" alt=""> -->
        <h1>W-Linkup<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#contact">Reviews</a></li>
          <li><a href="{{route('user.product.index')}}">Products</a></li>
          {{-- <li class="dropdown"><a href="#"><span>info</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Info</a></li>
              <li class="dropdown"><a href="#"><span>Information</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">CV</a></li>
                  <li><a href="#">Personal Profile</a></li>
                  <li><a href="#">Education</a></li>
                  <li><a href="#">Work Experience</a></li>
                  <li><a href="#">Achievements</a></li>
                  <li><a href="#">Skills</a></li>
                  <li><a href="#">Hobbies and Interests</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Information</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">1</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Information</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">2</a></li>
                </ul>
              </li>
            </ul>
          </li>     --}}
        </ul>
      </nav>
      <!-- .navbar -->
      <a class="btn-book-a-table" href="{{route('user.dashboard.index')}}">Dashboard</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">{{$user->business_name}}</h2>
          <p data-aos="fade-up" data-aos-delay="100">{{$user->business_detail}}</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            @if($user->video_link)
            <a href="{{$user->video_link}}" class="glightbox btn-watch-video d-flex align-items-center">
              <i class="bi bi-play-circle"></i>
              <span>Watch Video</span>
            </a>
            @else 
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center">
              <i class="bi bi-play-circle"></i>
              <span>Watch Video</span>
            </a>

            @endif
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          @if($user->mainImage())      
          <img src="{{asset($user->mainImage())}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">   
          @else 
          <img src="{{asset('profile-theme-assets/assets/img/hero-img.png')}}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>{{$user->about_us_detail}}</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            @if($user->image)
            <img src="{{asset($user->image)}}" class="img-fluid" alt="">
            @else 
            <img src="{{asset('profile-theme-assets/assets/img/profile-img.jpg')}}" class="img-fluid" alt="">
            @endif
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>{{$user->full_name}}</h3>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{$user->email}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Date of Birth:</strong> <span>{{$user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M,Y') : '' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span>{{$user->gender }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Blood Group:</strong> <span>{{$user->blood_group }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Martial Status:</strong> <span>{{$user->martial_status}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><a href="tel:{{$user->phone}}">{{$user->phone}}</a></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Country:</strong> <span>{{$user->country ? $user->country->name : '' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{$user->city ? $user->city->name : '' }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong> <span>{{$user->address}}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Profession:</strong> <span>{{$user->profession}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Education:</strong> <span>{{$user->education}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Religion:</strong> <span>{{$user->religion}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Sect.:</strong> <span>{{$user->sect}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Caste:</strong> <span>{{$user->caste}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Monthly Income:</strong> <span>{{$user->monthly_income}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Service:</strong> <span>{{$user->service ? $user->service->name : ''}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Service Type:</strong> <span>{{$user->serviceType ? $user->serviceType->name : ''}}</span></li>
                </ul>
              </div>
            </div>
            
            @if($user->checkstatus() == true)

            <div class="col-sm-6" style="margin-top:5px;">
               <input type="text" class="form-control" id="link_area"  value="{{route('product.user',$user->id)}}"  readonly>
               <br>
               <button type="button" class="copy-button btn btn-danger  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Share Website</button>
               <a href="{{url('user/register',$user->code)}}" class="btn btn-danger btn-sm ml-4" >Join Us With User Link</a>
            </div>
            @endif
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>{{App\Models\Setting::profileMainAbout()->value}}</h3>
              <p>
                {{App\Models\Setting::profileMainAbout()->description}} </p>
              <div class="text-center">
                <a href="{{App\Models\Setting::profileMainAboutUrl()}}" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <!-- End Why Box -->
          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>{{App\Models\Setting::profileAboutContent1()->value}}</h4>
                  <p>{{App\Models\Setting::profileAboutContent1()->description}}</p>
                  <div class="text-center">
                    <a href="{{App\Models\Setting::profileAboutContent1Url()}}" class="btn btn-danger">Learn More </a>
                  </div>
                </div>
              </div>
              <!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>{{App\Models\Setting::profileAboutContent2()->value}}</h4>
                  <p>{{App\Models\Setting::profileAboutContent2()->description}}</p>
                  <div class="text-center">
                    <a href="{{App\Models\Setting::profileAboutContent2Url()}}" class="btn btn-danger">Learn More </a>
                  </div>
                </div>
              </div>
              <!-- End Icon Box -->
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>{{App\Models\Setting::profileAboutContent3()->value}}</h4>
                  <p>{{App\Models\Setting::profileAboutContent3()->description}}</p>
                  <div class="text-center">
                    <a href="{{App\Models\Setting::profileAboutContent3Url()}}" class="btn btn-danger">Learn More</a>
                  </div>
                </div>
              </div>
              <!-- End Icon Box -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$user->view}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>visitors</p>
            </div>
          </div>
          <!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$user->products->count()}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Produsts</p>
            </div>
          </div>
          <!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$user->totalEarning()}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Reward</p>
            </div>
          </div>
          <!-- End Stats Item -->
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{$user->mrefers()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Team</p>
            </div>
          </div>
          <!-- End Stats Item -->
        </div>
      </div>
    </section>
    <!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Our Products</h2>
          <p>Check Our <span>Products Menu</span></p>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#brand-all">
              <h4>All</h4>
            </a>
          </li>
          @foreach($brands as $key =>  $brand)
          <li class="nav-item">
            <a class="nav-link  " data-bs-toggle="tab" data-bs-target="#brand-{{$brand->id}}">
              <h4>{{$brand->name}}</h4>
            </a>
          </li>
          @endforeach
        </ul>
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          <div class="tab-pane fade active show" id="brand-all">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>All</h3>
            </div>
            <div class="row gy-5">
              @foreach($products as $allProduct)
              <div class="col-lg-3 menu-item">
                <a href="{{route('product.show',str_replace(' ', '_',$allProduct->name))}}" class="glightbox">
                  <img src="{{asset($allProduct->images->first()->image)}}" class="menu-img img-fluid" alt="">
                </a>
                <h4>{{$allProduct->name}}</h4>
                <p class="ingredients">
                  {!! substr( $allProduct->description, 0, 50) !!}...
                </p>
                <p class="price">
                  $ {{$allProduct->price}}
                </p>
              </div>
              @endforeach
            </div>
          </div>
          @foreach($brands as $index =>  $brandProduct)

          <div class="tab-pane fade" id="brand-{{$brandProduct->id}}">
            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>{{$brandProduct->name}}</h3>
            </div>
            <div class="row gy-5">
              @foreach(App\Models\Product::where('user_id',$user->id)->where('brand_id',$brandProduct->id)->get() as $product)
              <div class="col-lg-3 menu-item">
                <a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" class="glightbox">
                  <img src="{{asset($product->images->first()->image)}}" class="menu-img img-fluid" alt="">
                </a>
                <h4>{{$product->name}}</h4>
                <p class="ingredients">
                  {!! substr( $product->description, 0, 50) !!}...
                </p>
                <p class="price">
                  $ {{$product->price}}
                </p>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Menu Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Teams</h2>
          <p>Check <span>Our Team Members</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach($user->mrefers() as $refer)
            <div class="swiper-slide">
              <a class="glightbox" data-gallery="images-gallery" href="{{route('product.user',$refer->id)}}">
                @if($refer->image)
                <img src="{{asset($refer->image)}}" class="img-fluid" alt="">
                @else
                <img src="{{asset('profile-theme-assets/assets/img/gallery/gallery-1.jpg')}}" class="img-fluid" alt="">
                @endif
                {{$refer->name}}</a>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Gallery Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @foreach(App\Models\Special::where('user_id',$user->id)->get() as $index => $special)
              <li class="nav-item">
                <a class="nav-link {{$index == 0 ? 'active show'  : ''}}" data-bs-toggle="tab" href="#tab-{{$index}}">{{$special->title}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              @foreach(App\Models\Special::where('user_id',$user->id)->get() as $key => $specialUser)
              <div class="tab-pane {{$key == 0 ? 'active show'  : ''}}" id="tab-{{$key}}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>{{$specialUser->title}}</h3>
                    <p class="fst-italic">{{$specialUser->description}}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    @if($specialUser->image)
                    <img src="{{asset($specialUser->image)}}" alt="" class="img-fluid">
                    @else 
                    <img src="{{asset('profile-theme-assets/assets/img/specials-1.png')}}" alt="" class="img-fluid">
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
     <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach (App\Models\Event::where('user_id',$user->id)->get() as $key => $event)
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  @if($event->image)
                    <img src="{{asset($event->image)}}" class="img-fluid" alt="">
                  @else
                    <img src="{{asset('profile-theme-assets/assets/img/event-birthday.jpg')}}" class="img-fluid" alt="">
                  @endif
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>{{$event->title}}</h3>
                  <div class="price">
                    <p><span>{{$event->price}}</span></p>
                  </div>
                  <p class="fst-italic">
                    {{$event->description}}
                  </p>
                  @if($event->link)
                  <a href="{{$event->link}}" target="_blank" class="btn btn-primary">View</a>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
            
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End Events Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Team</h2>
          <p>Our <span>Proffesional</span> Team</p>
        </div>
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{asset('profile-theme-assets/assets/img/chefs/chefs-1.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Master Chef</span>
                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{asset('profile-theme-assets/assets/img/chefs/chefs-2.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Patissier</span>
                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="chef-member">
              <div class="member-img">
                <img src="{{asset('profile-theme-assets/assets/img/chefs/chefs-3.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cook</span>
                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
        </div>
      </div>
    </section> --}}
    <!-- End Team Section -->

   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Testimonials</h2>
        <p>What Are They <span>Saying About Us</span></p>
      </div>
      <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="info">
            <!-- ======= Testimonials Section ======= -->
              <section id="testimonials" class="testimonials section-bg">
                <div class="container" data-aos="fade-up">
                  <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                      <!-- start testimonial item -->
                      @foreach($user->userReviews as $review)
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <div class="row gy-4 justify-content-center">
                            <div class="col-lg-8">
                              <div class="testimonial-content">
                                <h3>{{$review->subject}}</h3>
                                {{-- <h4>Ceo &amp; Founder</h4> --}}
                                <p>
                                  {{$review->message}}
                                </p>
                              </div>
                            </div>
                            {{-- <div class="col-lg-2 text-center">
                              <img src="{{asset('profile-theme-assets/assets/img/testimonials/testimonials-1.jpg')}}" class="img-fluid testimonial-img" alt="">
                            </div> --}}
                          </div>
                        </div><!-- End testimonial item -->
                      </div><!-- End testimonial item -->
                      @endforeach
                          </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        </div>
                          </section><!-- End Testimonials Section -->   
                      </div>
                    </div>
                    <!-- ======= Contact Part ======= -->
                    <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch">
                      <form action="{{route('store_user_review')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="form-group">
                          <label for="name">Subject</label>
                          <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                          <label for="name">Message</label>
                          <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                      </form>
                    </div>
                  </div>
                </div>
              </section><!-- End Contact Section -->
  
  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              {{$user->business_address}}
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> {{$user->reservation_phone}} <br>
              <strong>Email:</strong> {{$user->reservation_email}}<br>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>{{$user->opening_hour}}</strong>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="{{$user->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{{$user->whatsapp}}" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
            <a href="{{$user->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="{{$user->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
            <a href="{{$user->youtube}}" class="youtube"><i class="bi bi-youtube"></i></a>
            <a href="{{$user->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{$user->tiktok}}" class="tiktok"><i class="bi bi-tiktok"></i></a>
            <a href="{{$user->snack_video}}" class="snack video"><i class="bi bi-camera-reels"></i></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>wlinkup</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
         Designed by <a href="https://buyebazar.com/">buyebazar</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
  @toastr_render
  @toastr_js
  <script src="{{asset('profile-theme-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('profile-theme-assets/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('profile-theme-assets/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('profile-theme-assets/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('profile-theme-assets/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('profile-theme-assets/assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('profile-theme-assets/assets/js/main.js')}}"></script>
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
</body>
</html>