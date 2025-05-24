<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('adminty-user-assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('adminty-user-assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('adminty-user-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('adminty-user-assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fade-up">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="{{asset('adminty-user-assets/img/logo.png')}}" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->

   <!-- ======= Events Section ======= -->
    

  <main id="main">
    @if($events->count() > 0)
    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
       

        <div
          class="events-slider swiper"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="swiper-wrapper">
            @foreach($events as $event)
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img
                    src="{{asset($event->image)}}"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>{{$event->title}}</h3>
                  {{-- <div class="price">
                    <p><span>$189</span></p>
                  </div> --}}
                  <p class="fst-italic">
                    {{$event->description}}
                  </p>
                  {{-- <ul>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Duis aute irure
                      dolor in reprehenderit in voluptate velit.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur
                  </p> --}}
                </div>
              </div>
            </div>
            @endforeach
            <!-- End testimonial item -->
            {{-- <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img
                    src="{{asset('adminty-user-assets/img/departments-2.jpg')}}"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>$290</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.
                  </p>
                  <ul>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Duis aute irure
                      dolor in reprehenderit in voluptate velit.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div>

            <!-- End testimonial item -->
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img
                    src="{{asset('adminty-user-assets/img/departments-1.jpg')}}"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>$99</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.
                  </p>
                  <ul>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Duis aute irure
                      dolor in reprehenderit in voluptate velit.
                    </li>
                    <li>
                      <i class="bi bi-check-circled"></i> Ullamco laboris nisi
                      ut aliquip ex ea commodo consequat.
                    </li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div> --}}
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Events Section -->
    @endif
      @if($userSpecials->count() > 0)
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
        </div>

        <div class="row">
          @foreach($userSpecials as $userSpecial)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><img src="{{asset($userSpecial->image)}}" height="200" width="200"></div>
              <h4 class="title"><a href="#">{{$userSpecial->name}}</a></h4>
              <p class="description">{{$userSpecial->description}}</p>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Featured Services Section -->
    @endif
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>{{App\Models\Setting::visitTitle()}}</h3>
          <p>{{App\Models\Setting::visitContent()}}</p>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">
              <input type="text" style="background-color: #3fbbc0;color:white;" class="form-control text-center" id="link_area"  value="{{route('product.user',str_replace(' ', '_',$user->name))}}"  readonly>

            </div>
          </div>
          <button class=" copy-button cta-btn scrollto" type="button" data-clipboard-action="copy" data-clipboard-target="#link_area">Share Website</button>
          <a class="cta-btn scrollto" href="{{url('user/register',$user->code)}}">Join now with us</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>{{$user->about_us_detail}}</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            @if($user->image)
              <img src="{{asset($user->image)}}" style="height:450px;width:100%;" class="img-fluid" alt="profile image">
            @else
              <img src="{{asset('adminty-user-assets/img/about.jpg')}}" class="img-fluid" alt="profile image">
            @endif
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <div class="card">
                <div class="card-body">
                    <!-- table start -->
                    <table>
                      <tr>
                        <td>Email:</td>
                        <th scope="row">{{$user->email}}</th>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <th scope="row">{{$user->dob ? \Carbon\Carbon::parse($user->dob)->format('d M,Y') : '' }}</th>
                      </tr>
                      <tr>
                        <td>Blood Group:</td>
                        <th scope="row">{{$user->blood_group }}</th>
                      </tr>
                      <tr>
                        <td>Martial Status:</td>
                        <th scope="row">{{$user->martial_status }}</th>
                      </tr>
                      <tr>
                        <td>Phone:</td>
                        <th scope="row"><a href="tel:{{$user->phone}}">{{$user->phone}}</a></th>
                      </tr>
                      <tr>
                        <td>Country:</td>
                        <th scope="row">{{$user->country ? $user->country->name : '' }}</th>
                      </tr>
                      <tr>
                        <td>City:</td>
                        <th scope="row">{{$user->city ? $user->city->name : '' }}</th>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <th scope="row">{{$user->address }}</th>
                      </tr>
                      <tr>
                        <td>Profession:</td>
                        <th scope="row">{{$user->profession }}</th>
                      </tr>
                    </tr><tr>
                      <td>Service:</td>
                      <th scope="row">{{$user->service ? $user->service->name : ''}}</th>
                    </tr><tr>
                      <td>Service Type:</td>
                      <th scope="row">{{$user->serviceType ? $user->serviceType->name : ''}}</th>
                    </tr>
                      <tr>
                        <td>Education:</td>
                        <th scope="row">{{$user->education }}</th>
                      </tr>
                      <tr>
                        <td>Religion:</td>
                        <th scope="row">{{$user->religion }}</th>
                      </tr>
                      <tr>
                        <td>Sect.:</td>
                        <th scope="row">{{$user->sect }}</th>
                      </tr><tr>
                        <td>Caste:</td>
                        <th scope="row">{{$user->caste }}</th>
                      </tr><tr>
                        <td>Monthly Income:</td>
                        <th scope="row">{{$user->monthly_income }}</th>
                      
                    </table>
                </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-eye"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{$user->view}}" data-purecounter-duration="1" class="purecounter"></span>

              <p><strong>Visitors</strong> <br> how many people visit the site</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-shopping-cart"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{$user->products->count()}}" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Products</strong> <br> Total products added</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-handshake"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{$user->mrefers()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Team</strong><br> Who join with us</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Reward</strong> <br> Earned and won</p>
              {{-- <a href="#">Find out more &raquo;</a> --}}
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Main Section</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
            @foreach($userMainSections as $userMainSection)
            <div class="icon-box mt-5 mt-lg-0">
             <img src="{{asset($userMainSection->image)}}" height="48" width="48" alt="">
              <h4>{{$userMainSection->name}}</h4>
              <p>{{$userMainSection->description}}</p>
            </div>
            @endforeach
           
          </div>
          @if($user->mainImage())
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("{{asset($user->mainImage())}}");' data-aos="zoom-in"></div>
          @else
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("{{asset('adminty-user-assets/img/features.jpg')}}");' data-aos="zoom-in"></div>
          @endif
        </div>

      </div>
    </section><!-- End Features Section -->


    <!-- ======= Services Section ======= -->
    @if($specialities->count() > 0)
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Speciality</h2>
          <p>{{$user->speciality_description}}</p>
        </div>

        <div class="row">
          @foreach($specialities as $speciality)
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><img src="{{asset($speciality->image)}}" alt=""></div>
            <h4 class="title"><a href="#">{{$speciality->name}}</a></h4>
            <p class="description">{{$speciality->description}}</p>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->
    @endif
    <!-- ======= Appointment Section ======= -->
    
    @if($specials->count() > 0)
      @if($user->is_appointment)
        <section id="appointment" class="appointment section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Make an Appointment</h2>
              <p>{{$user->appointment_description}}</p>
            </div>

            <form action="{{route('store_appointment')}}" method="post" role="form" class="" data-aos="fade-up" data-aos-delay="100">
              @csrf
              <div class="row">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="col-md-4 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group mt-3">
                  <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
                </div>
                <div class="col-md-4 form-group mt-3">
                  <select name="department_id" id="department" class="form-select">
                    <option value="">Select Department</option>
                    @foreach($specials as $special)
                    <option value="{{$special->id}}">{{$special->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center mt-3"><button type="submit" class="btn btn-primary">Make an Appointment</button></div>
            </form>

          </div>
        </section><!-- End Appointment Section -->
      @endif
      <!-- ======= Departments Section ======= -->
      <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Departments</h2>
            <p>We Have Special For You.</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                @foreach($specials as $key => $special)
                <li class="nav-item">
                  <a
                    class="nav-link {{$key == 0 ? 'active show' : ''}}"
                    data-bs-toggle="tab"
                    href="#special-{{$key}}"
                    >{{$special->title}}</a
                  >
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">
                @foreach($specials as $specialKey => $specialObject)
                <div class="tab-pane {{$specialKey == 0 ? 'active show': ''}}" id="special-{{$specialKey}}">
                  <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                      <h3>{{$specialObject->heading}}</h3>
                      <p>
                        {{$specialObject->description}}
                      </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                      <img
                        src="{{asset($specialObject->image)}}"
                        alt=""
                        class="img-fluid"
                      />
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Departments Section -->
    @endif


    <!-- ======= Doctors Section ======= -->
    {{-- <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{asset('adminty-user-assets/img/doctors/doctors-1.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Medical Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="{{asset('adminty-user-assets/img/doctors/doctors-2.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Anesthesiologist</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="{{asset('adminty-user-assets/img/doctors/doctors-3.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cardiology</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="{{asset('adminty-user-assets/img/doctors/doctors-4.jpg')}}" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Neurosurgeon</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Doctors Section --> --}}

    <!-- ======= Gallery Section ======= -->
    @if($allProducts->count() > 0)
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Company Products</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            @foreach($allProducts as $allProduct)
            <div class="swiper-slide">
              <a class="gallery-lightbox" href="{{route('product.show',$allProduct->uuid)}}">
                <img src="{{asset($allProduct->images->first()->image)}}" class="img-fluid" alt="">
              </a>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->
    @endif
    <!-- ======= Pricing Section ======= -->
    {{-- <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="400">
              <span class="advanced">Advanced</span>
              <h3>Ultimate</h3>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section --> --}}

     <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up" >

        <div class="section-header text-center" >
          <h2>Our Products </h2>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
          @foreach($brands as $brandKey => $brand)
          <li class="nav-item">
            <a class="nav-link {{$brandKey == 0 ? 'active show' : ''}}" data-bs-toggle="tab" data-bs-target="#brand-{{$brandKey}}">
              <h4>{{$brand->name}}</h4>
            </a>
          </li><!-- End tab nav item -->
          @endforeach

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          @foreach($brands as $brandProductKey => $productBrand)

          <div class="tab-pane fade {{$brandProductKey == 0 ? 'active show' : ''}}" id="brand-{{$brandProductKey}}">

            <div class="tab-header text-center">
              <p>{{$productBrand->name}}</p>
              <h3>Products</h3>
            </div>

            <div class="row gy-5">
              @foreach(App\Models\Product::where('user_id',$user->id)->where('brand_id',$productBrand->id)->get() as $product)
              <div class="col-lg-4 menu-item">
                <a href="{{route('product.show',$product->uuid)}}" class="glightbox">
                  <img src="{{asset($product->images->first()->image)}}" class="menu-img img-fluid" alt=""></a>
                <h4>{{$product->name}}</h4>
                <p class="ingredients">
                  {!! substr( $product->description, 0, 50) !!}...
                </p>
                <p class="price">
                  {{App\Models\Setting::currency()}} {{$product->price}}
                </p>
              </div><!-- Menu Item -->
              @endforeach
              
            </div>
          </div><!-- End Starter Menu Content -->
          @endforeach
        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Product Section ======= -->
    <section id="Products" class="Products">
      <!-- Modal -->
          <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
       
        <!-- Open Content -->
  @if($singleProduct)
        <section class="bg-light">
            <div class="container pb-5">
              <div class="section-header text-center" >
                <h2>Our Products </h2>
                <p>Check Our <span>Single Product</span></p>
              </div>
                <div class="row">
                  
                    <div class="col-lg-5 mt-5">
                        <div class="card mb-3">
                            <img class="card-img img-fluid" src="{{asset($singleProduct->images->first()->image)}}" alt="Card image cap" id="product-detail">
                        </div>
                        <div class="row">
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                    <i class="text-dark fas fa-chevron-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <!--End Controls-->
                            <!--Start Carousel Wrapper-->
                            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                                <!--Start Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                          @foreach($singleProduct->images->take(3) as $productImage)
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="{{asset($productImage->image)}}" alt="Product Image 1">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--/.First slide-->

                                    <!--Second slide-->
                                    @if(count($singleProduct->images->skip(3)->take(3)) > 0)
                                    <div class="carousel-item">
                                        <div class="row">
                                          @foreach($singleProduct->images->skip(3)->take(3) as $nextProductImage)
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="{{asset($nextProductImage->image)}}" alt="Product Image 4">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <!--/.Second slide-->

                                    <!--Third slide-->
                                    @if(count($singleProduct->images->skip(6)->take(3)) > 0)
                                    <div class="carousel-item">
                                        <div class="row">
                                          @foreach($singleProduct->images->skip(6)->take(3) as $nextProductImage)
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="{{asset($nextProductImage->image)}}" alt="Product Image 7">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <!--/.Third slide-->
                                </div>
                                <!--End Slides-->
                            </div>
                            <!--End Carousel Wrapper-->
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="next">
                                    <i class="text-dark fas fa-chevron-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--End Controls-->
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="h2">{{$singleProduct->name}}</h1>
                                <p class="h3 py-2">{{App\Models\Setting::currency()}} {{$product->price}}</p>
                                <!-- table start -->
                                <table>
                                  <tr>
                                    <td>Category:</td>
                                    <th scope="row">{{@$singleProduct->category->name}}</th>
                                  </tr>
                                  <tr>
                                    <td>Brand:</td>
                                    <th scope="row">{{@$singleProduct->brand->name}}</th>
                                  </tr>
                                  <tr>
                                    <td>Country:</td>
                                    <th scope="row">{{@$singleProduct->country->name}}</th>
                                  </tr>
                                  <tr>
                                    <td>City:</td>
                                    <th scope="row">{{@$singleProduct->city->name}}</th>
                                  </tr>
                                  <tr>
                                    <td>View:</td>
                                    <th scope="row">{{@$singleProduct->view}}</th>
                                  </tr>
                                  <tr>
                                    <td>Product of:</td>
                                    <th scope="row">{{@$singleProduct->user->name}}</th>
                                  </tr>
                                  <tr>
                                    <td>Stock:</td>
                                    <th scope="row">{{@$singleProduct->stock}}</th>
                                  </tr>
                                  <tr>
                                    <td>Address:</td>
                                    <th scope="row">{{@$singleProduct->user->address}}</th>
                                  </tr>
                                  <tr>
                                    <td>Phone:</td>
                                    <th scope="row">{{@$singleProduct->user->phone}}</th>
                                  </tr>
                                  <tr>
                                    <td>Like:</td>
                                    <th scope="row">{{$singleProduct->like}}</th>
                                  </tr>
                                  <tr>
                                    <td>dislike:</td>
                                    <th scope="row">{{$singleProduct->dislike}}</th>
                                  </tr>
                                
                                </table>
                                <p class="py-2">
                                </p>
                                <div class="section-header text-center" >
                                  <h5>Description:</h5>
                                </div>
                                <p>{!! $singleProduct->description !!}</p>
                                                          
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                      <form action="{{route('product.like',$singleProduct->id)}}" method="GET">
                                        @csrf
                                        <button class="btn btn-success" >Like ({{$singleProduct->like}})</button>
                                      </form>
                                    </div>
                                    <div class="col d-grid">

                                      <form action="{{route('product.dislike',$singleProduct->id)}}" method="GET">
                                        @csrf
                                        <button class="btn btn-danger" >Disike ({{$singleProduct->dislike}})</button>
                                      </form>                              
                                    </div>
                                </div>
                                <div class="row pb-3">
                                  @if($product->stock > 0 && App\Models\Setting::enablepurchase() == 1)
                                    <div class="col d-grid">
                                        <a href="{{route('user.product.order',$product->id)}}" class="btn btn-success btn-lg" name="submit" value="buy">Buy</a>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Close Content -->
  @endif

    </section>
   


    <!-- ======= Frequently Asked Questioins Section ======= -->
    @if($userFaqs->count() > 0)
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <ul class="faq-list">
          @foreach($userFaqs as $userFaq)
          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq-{{$userFaq->id}}">{{$userFaq->question}} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq-{{$userFaq->id}}" class="collapse" data-bs-parent=".faq-list">
              <p>
                {{$userFaq->answer}}
              </p>
            </div>
          </li>
          @endforeach
        </ul>

      </div>
    </section><!-- End Frequently Asked Questioins Section -->
    @endif
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

      </div>

      <div>
        @php
            $address = urlencode($user->business_address);
            $src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyAOskesXH1m6112vteXkScm3iC0JO5ktII&q={$address}";
        @endphp
        <iframe
            style="border:0; width: 100%; height: 350px;"
            src="{{ $src }}"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>{{$user->business_address}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{$user->reservation_email}}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>{{$user->reservation_phone}}</p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="info-box mt-4">
                  <i class="bx bx-time"></i>
                  <h3>Opening & Closing</h3>
                  <p>{{$user->opening_hour}}</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            @if (Auth::guard('user')->check())
                        <h3>Add Review</h3>
              <form action="{{route('store_user_review')}}" method="post" role="form" class="">
                @csrf
                <input type="hidden" name="reviewer_id" value="{{request()->session()->get('user_id')}}">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{request()->session()->get('name')}}" readonly required="">
                  </div>
                  <div class="col-md-6  form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
                </div>
                <div class="text-center  mt-3"><button class="btn btn-primary" type="submit">Send Message</button></div>
              </form>
            @endif
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach($user->userReviews as $review)
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$review->message}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                  @if($review->reviewer)
                    <img src="{{asset($review->reviewer->image)}}" class="testimonial-img" alt="">
                    <h3>{{$review->reviewer->name}}</h3>
                  @else
                    <img src="{{asset('adminty-user-assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                  @endif
                <h4>{{$review->subject}}</h4>
              </div>
            </div><!-- End testimonial item -->
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
              <div class="footer-info">
                <h3>My Social Links</h3>
                <div class="social-links mt-3">
                  @if($user->facebook)
                <a href="{{$user->facebook}}" class="facebook"><i class="bi bi-facebook"></i></a>
                @endif
                @if($user->whatsapp)
                <a href="https://api.whatsapp.com/send?phone={{@$user->whatsapp}}" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                @endif
                @if($user->twitter)
                <a href="{{$user->twitter}}" class="twitter"><i class="bi bi-twitter"></i></a>
                @endif
                @if($user->linkedin)
                <a href="{{$user->linkedin}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                @endif
                @if($user->youtube)
                <a href="{{$user->youtube}}" class="youtube"><i class="bi bi-youtube"></i></a>
                @endif
                @if($user->instagram)
                <a href="{{$user->instagram}}" class="instagram"><i class="bi bi-instagram"></i></a>
                @endif
                @if($user->tiktok)
                <a href="{{$user->tiktok}}" class="tiktok"><i class="bi bi-tiktok"></i></a>
                @endif
                @if($user->snack_video)
                <a href="{{$user->snack_video}}" class="snack video"><i class="bi bi-camera-reels"></i></a>  
                  @endif
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{App\Models\Setting::siteName()}}</span></strong>. All Rights Reserved
        Designed by <a href="{{url('/')}}">{{App\Models\Setting::siteName()}}</a>
      </div>
    </div>

    
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('adminty-user-assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('adminty-user-assets/js/main.js')}}"></script>
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