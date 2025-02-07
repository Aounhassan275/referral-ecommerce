<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wlinkup Profile</title>
  <meta content="wlinkup" name="description">
  <meta content="#earn #Store #job #username" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('adminty-user-assets/img/favicon.png')}}" rel="icon">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Vendor JS Files for single product-->
  <link rel="stylesheet" href="{{asset('adminty-user-assets/css/templatemo.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('adminty-user-assets/css/slick.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('adminty-user-assets/css/slick-theme.css')}}">

  <link rel="stylesheet" href="{{asset('adminty-user-assets/css/templatemo.css')}}">
  <!-- Vendor CSS Files -->
  <link href="{{asset('adminty-user-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('adminty-user-assets/vendor/swiper/swiper-bundle.min.css"')}} rel="stylesheet">
  <!-- product table -->
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th {
      width: 80%;
      padding: 0px;
      text-align: left;
      border-bottom: 1px solid #DDD;
      height: 5px;
    }
    
    td {
      width: 30%;
      padding: 0px;
      text-align: left;
      border-bottom: 1px solid #DDD;
      height: px;
    }

    tr:hover {background-color: #D6EEEE;}
    </style>

  <!-- Template Main CSS File -->
  <link href="{{asset('adminty-user-assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: wlinkup
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="{{asset('adminty-user-assets/img/logo.png')}}" alt="">wlinkup</a>
     
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#Products">Products</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('adminty-user-assets/img/slide/slide-1.jpg')}})">
          <div class="container">
            <h2>Welcome to <span>Wlinkup</span></h2>
            <p>W-Linkup: Your Ultimate Marketing Platform! 🌟

              🚀 Promote Anything, Anytime!
              Looking for the best way to showcase your brand, product, or service? W-Linkup is here for you!
              
              </p>
            <a href="#about" class="btn-get-started scrollto">👉 Visit W-Linkup Now!</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(({{asset('adminty-user-assets/img/slide/slide-2.jpg')}})">
          <div class="container">
            <h2>Lorem Ipsum Dolor</h2>
            <p>Whether youre launching a product, growing your business, or sharing your ideas, W-Linkup is the place to be.
              Start promoting today! Because success is just a click away.</p>
            <a href="#about" class="btn-get-started scrollto">👉 Visit W-Linkup Now!</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(({{asset('adminty-user-assets/img/slide/slide-3.jpg')}})">
          <div class="container">
            <h2>Sequi ea ut et est quaerat</h2>
            <p>Unlimited Opportunities: Promote anything you can think of.
              User-Friendly Tools: Perfect for beginners and pros alike.
              Massive Reach: Get your message in front of the right audience.
              Cost-Effective Solutions: Marketing that fits your budget.
              </p>
            <a href="#about" class="btn-get-started scrollto">👉 Visit W-Linkup Now!</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-thermometer"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>👉 Visit W-Linkup Now!</h3>
          <p> W-Linkup: Your Ultimate Marketing Platform! 🌟 🚀 Promote Anything, Anytime! Looking for the best way to showcase your brand, product, or service? W-Linkup is here for you!</p>
          <a class="cta-btn scrollto" href="#appointment">Share Website</a>
          <a class="cta-btn scrollto" href="#appointment">Join now with us</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>W-Linkup: Your Ultimate Marketing Platform! 🌟 🚀 Promote Anything, Anytime! Looking for the best way to showcase your brand, product, or service? W-Linkup is here for you!</p>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="{{asset('adminty-user-assets/img/about.jpg')}}" class="img-fluid" alt="profile image">
          </div>
          <!-- start table -->
          <div class="col-lg-6 menu-item-4">
            <div class="card">
                <div class="card-body">
                    <!-- table start -->
                    <table>
                      <tr>
                        <td>Email:</td>
                        <th scope="row">sadaathomoeopathic@gmail.com</th>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Blood Group:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Martial Status:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Phone:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Country:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>City:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Profession:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                    </tr><tr>
                      <td>Service:</td>
                      <th scope="row">wlinkup</th>
                    </tr><tr>
                      <td>Service Type:</td>
                      <th scope="row">wlinkup</th>
                    </tr>
                      <tr>
                        <td>Education:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Religion:</td>
                        <th scope="row">wlinkup</th>
                      </tr>
                      <tr>
                        <td>Sect.:</td>
                        <th scope="row">wlinkup</th>
                      </tr><tr>
                        <td>Caste:</td>
                        <th scope="row">wlinkup</th>
                      </tr><tr>
                        <td>Monthly Income:</td>
                        <th scope="row">wlinkup</th>
                      
                    </table>
                </div>
            </div>
        </div>
          <!-- table end -->
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-eye"></i>
              <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Visitors</strong> <br> how many people visit the site</p>
              </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-shopping-cart"></i>
              <span data-purecounter-start="0" data-purecounter-end="26" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Produsts</strong> <br> 
                Total products added</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fa fa-handshake"></i>
              <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Team</strong> <br>
                Who join with us</p>
              </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Reward</strong> <br>
                Earned and won</p>
              </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
            <div class="icon-box mt-5 mt-lg-0">
              <i class="bx bx-receipt"></i>
              <h4>Est labore ad</h4>
              <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-cube-alt"></i>
              <h4>Harum esse qui</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-images"></i>
              <h4>Aut occaecati</h4>
              <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
            </div>
            <div class="icon-box mt-5">
              <i class="bx bx-shield"></i>
              <h4>Beatae veritatis</h4>
              <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/features.jpg");' data-aos="zoom-in"></div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-heartbeat"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-pills"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-hospital-user"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><i class="fas fa-dna"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><i class="fas fa-wheelchair"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><i class="fas fa-notes-medical"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up" >

        <div class="section-header text-center" >
          <h2>Our Menu </h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
              <h4>Starters</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
              <h4>Breakfast</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
              <h4>Lunch</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
              <h4>Dinner</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-starters">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Starters</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div><!-- Menu Item -->

              

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-5.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-5.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Eos Luibusdam</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $12.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-6.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-6.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Laboriosam Direva</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $9.95
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Starter Menu Content -->

          <div class="tab-pane fade" id="menu-breakfast">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Breakfast</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Aut Luia</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $14.95
                </p>
              </div><!-- Menu Item -->


            </div>
          </div><!-- End Breakfast Menu Content -->

          <div class="tab-pane fade" id="menu-lunch">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Lunch</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-1.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-2.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-2.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Aut Luia</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $14.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets/img/menu/menu-item-3.png')}}" class="glightbox"><img src="{{asset('adminty-user-assets/img/menu/menu-item-3.png')}}" class="menu-img img-fluid" alt=""></a>
                <h4>Est Eligendi</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $8.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets')}}/img/menu/menu-item-4.png" class="glightbox"><img src="{{asset('adminty-user-assets')}}/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                <h4>Eos Luibusdam</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $12.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets')}}/img/menu/menu-item-5.png" class="glightbox"><img src="{{asset('adminty-user-assets')}}/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                <h4>Eos Luibusdam</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $12.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets')}}/img/menu/menu-item-6.png" class="glightbox"><img src="{{asset('adminty-user-assets')}}/img/menu/menu-item-6.png" class="menu-img img-fluid" alt=""></a>
                <h4>Laboriosam Direva</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $9.95
                </p>
              </div><!-- Menu Item -->

            </div>
          </div><!-- End Lunch Menu Content -->

          <div class="tab-pane fade" id="menu-dinner">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Dinner</h3>
            </div>

            <div class="row gy-5">

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets')}}/img/menu/menu-item-1.png" class="glightbox"><img src="{{asset('adminty-user-assets')}}/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>Magnam Tiste</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $5.95
                </p>
              </div><!-- Menu Item -->

              <div class="col-lg-4 menu-item">
                <a href="{{asset('adminty-user-assets')}}/img/menu/menu-item-2.png" class="glightbox"><img src="{{asset('adminty-user-assets')}}/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                <h4>Aut Luia</h4>
                <p class="ingredients">
                  Lorem, deren, trataro, filede, nerada
                </p>
                <p class="price">
                  $14.95
                </p>
              </div><!-- Menu Item -->


            </div>
          </div><!-- End Dinner Menu Content -->

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
  <section class="bg-light">
      <div class="container pb-5">
        <div class="section-header text-center" >
          <h2>Our Products </h2>
          <p>Check Our <span>Single Product</span></p>
        </div>
          <div class="row">
              <div class="col-lg-5 mt-5">
                  <div class="card mb-3">
                      <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_10.jpg" alt="Card image cap" id="product-detail">
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
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_01.jpg" alt="Product Image 1">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_02.jpg" alt="Product Image 2">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_03.jpg" alt="Product Image 3">
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <!--/.First slide-->

                              <!--Second slide-->
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_04.jpg" alt="Product Image 4">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_05.jpg" alt="Product Image 5">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_06.jpg" alt="Product Image 6">
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <!--/.Second slide-->

                              <!--Third slide-->
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_07.jpg" alt="Product Image 7">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_08.jpg" alt="Product Image 8">
                                          </a>
                                      </div>
                                      <div class="col-4">
                                          <a href="#">
                                              <img class="card-img img-fluid" src="{{asset('adminty-user-assets')}}/img/product_single_09.jpg" alt="Product Image 9">
                                          </a>
                                      </div>
                                  </div>
                              </div>
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
                          <h1 class="h2">Active Wear</h1>
                          <p class="h3 py-2">$25.00</p>
                          <!-- table start -->
                          <table>
                            <tr>
                              <td>Category:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Brand:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Country:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>City:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>View:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Product of:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Stock:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Address:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Phone:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>Like:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                            <tr>
                              <td>dislike:</td>
                              <th scope="row">wlinkup</th>
                            </tr>
                           
                          </table>
                          <p class="py-2">
                          </p>
                          <div class="section-header text-center" >
                            <h5>Description:</h5>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                                                    
                          <form action="" method="GET">
                              <input type="hidden" name="product-title" value="Activewear">
                              <div class="row">
                                  
                                  <div class="col-auto">
                                      <ul class="list-inline pb-3">
                                          <li class="list-inline-item text-right">
                                              Quantity
                                              <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                          </li>
                                          <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                          <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                          <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="row pb-3">
                                  <div class="col d-grid">
                                      <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                  </div>
                                  <div class="col d-grid">
                                      <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Share</button>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Close Content -->


    </section><!-- End Product Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Related Products</h2>
          </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-1.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-2.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-3.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-4.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-5.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-6.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-7.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="{{asset('adminty-user-assets')}}/img/gallery/gallery-8.jpg"><img src="{{asset('adminty-user-assets')}}/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Leaders Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Leaders</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Team <strong>100</strong> :
                  Reword <strong>2889</strong> <br>
                  Products <strong>121</strong> :
                  Visitors <strong>1332</strong>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              
                
              </div>
            </div><!-- End Leaders item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Team <strong>100</strong> :
                  Reword <strong>2889</strong> <br>
                  Products <strong>121</strong> :
                  Visitors <strong>1332</strong>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End Leaders item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Team <strong>100</strong> :
                  Reword <strong>2889</strong> <br>
                  Products <strong>121</strong> :
                  Visitors <strong>1332</strong>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End Leaders item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Team <strong>100</strong> :
                  Reword <strong>2889</strong> <br>
                  Products <strong>121</strong> :
                  Visitors <strong>1332</strong>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End Leaders item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Team <strong>100</strong> :
                  Reword <strong>2889</strong> <br>
                  Products <strong>121</strong> :
                  Visitors <strong>1332</strong>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End Leaders item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Leaders Section -->

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
              <li class="nav-item">
                <a
                  class="nav-link active show"
                  data-bs-toggle="tab"
                  href="#tab-1"
                  >Modi sit est</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2"
                  >Unde praesentium sed</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3"
                  >Pariatur explicabo vel</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4"
                  >Nostrum qui quasi</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5"
                  >Iusto ut expedita aut</a
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Architecto ut aperiam autem id</h3>
                    <p class="fst-italic">
                      Qui laudantium consequatur laborum sit qui ad sapiente
                      dila parde sonata raqer a videna mareta paulona marka
                    </p>
                    <p>
                      Et nobis maiores eius. Voluptatibus ut enim blanditiis
                      atque harum sint. Laborum eos ipsum ipsa odit magni.
                      Incidunt hic ut molestiae aut qui. Est repellat minima
                      eveniet eius et quis magni nihil. Consequatur dolorem
                      quaerat quos qui similique accusamus nostrum rem vero
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img
                      src="{{asset('adminty-user-assets')}}/img/departments-5.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">
                      Qui laudantium consequatur laborum sit qui ad sapiente
                      dila parde sonata raqer a videna mareta paulona marka
                    </p>
                    <p>
                      Ea ipsum voluptatem consequatur quis est. Illum error
                      ullam omnis quia et reiciendis sunt sunt est. Non
                      aliquid repellendus itaque accusamus eius et velit ipsa
                      voluptates. Optio nesciunt eaque beatae accusamus lerode
                      pakto madirna desera vafle de nideran pal
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img
                      src="{{asset('adminty-user-assets')}}/img/departments-4.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">
                      Eos voluptatibus quo. Odio similique illum id quidem non
                      enim fuga. Qui natus non sunt dicta dolor et. In
                      asperiores velit quaerat perferendis aut
                    </p>
                    <p>
                      Iure officiis odit rerum. Harum sequi eum illum corrupti
                      culpa veritatis quisquam. Neque necessitatibus illo
                      rerum eum ut. Commodi ipsam minima molestiae sed
                      laboriosam a iste odio. Earum odit nesciunt fugiat sit
                      ullam. Soluta et harum voluptatem optio quae
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img
                      src="{{asset('adminty-user-assets')}}/img/departments-3.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>
                      Fuga dolores inventore laboriosam ut est accusamus
                      laboriosam dolore
                    </h3>
                    <p class="fst-italic">
                      Totam aperiam accusamus. Repellat consequuntur iure
                      voluptas iure porro quis delectus
                    </p>
                    <p>
                      Eaque consequuntur consequuntur libero expedita in
                      voluptas. Nostrum ipsam necessitatibus aliquam fugiat
                      debitis quis velit. Eum ex maxime error in consequatur
                      corporis atque. Eligendi asperiores sed qui veritatis
                      aperiam quia a laborum inventore
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img
                      src="{{asset('adminty-user-assets')}}/img/departments-2.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>
                      Est eveniet ipsam sindera pad rone matrelat sando reda
                    </h3>
                    <p class="fst-italic">
                      Omnis blanditiis saepe eos autem qui sunt debitis porro
                      quia.
                    </p>
                    <p>
                      Exercitationem nostrum omnis. Ut reiciendis repudiandae
                      minus. Omnis recusandae ut non quam ut quod eius qui.
                      Ipsum quia odit vero atque qui quibusdam amet. Occaecati
                      sed est sint aut vitae molestiae voluptate vel
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img
                      src="{{asset('adminty-user-assets')}}/img/departments-1.jpg"
                      alt=""
                      class="img-fluid"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Events</h2>
          <p><h5>Join Us for an Unforgettable Experience</h5>
          </p>
        </div>

        <div
          class="events-slider swiper"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img
                    src="{{asset('adminty-user-assets')}}/img/departments-3.jpg"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>$189</span></p>
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
                    src="{{asset('adminty-user-assets')}}/img/departments-2.jpg"
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
                    src="{{asset('adminty-user-assets')}}/img/departments-1.jpg"
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
            </div>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Events Section -->

    <!-- ======= Frequently Asked Questioins Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questioins</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End Frequently Asked Questioins Section -->

    <!-- ======= Testimonials and Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
          </div>
      </div>
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <!-- ======= Testimonials Section ======= -->
                  <section id="testimonials" class="testimonials">
                    <div class="container" data-aos="fade-up">
                      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">

                  <div class="swiper-slide">
                            <div class="testimonial-item">
                             <p>
                              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                             </p><br><br>
                            <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                          </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p><br><br>
                      <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                      <h3>Sara Wilsson</h3>
                      <h4>Designer</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                      </p><br><br>
                      <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                      <h3>Jena Karlis</h3>
                      <h4>Store Owner</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p><br><br>
                        <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p><br><br>
                        <img src="{{asset('adminty-user-assets')}}/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                    </div>
                  </div><!-- End testimonial item -->

                </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          </section><!-- End Testimonials Section -->
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-4">
            <div class="section-title">
              <h2>Leave A Massage</h2>
              </div>
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>My Social Links</h3>
              <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="tiktok"><i class="bi bi-tiktok"></i></a>
              <a href="#" class="snack video"><i class="bi bi-camera-reels"></i></a>  
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h3>Wlinkup</h3>
              <p>
                Sargodha <br>
                Punjab, Pakistan
              </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +9 2300 00400 08<br>
              <strong>Email:</strong> wlinkup.com@gmail.com
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-newsletter">
              <h4>Opening Hours</h4>
              <p>
                <strong>Mon-Sat: 11AM</strong> - 20PM<br>
                Sunday: Closed
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>wlinkup</span></strong>. All Rights Reserved
        Designed by <a href="https://buyebazar.com/">buyebazar</a>
      </div>
    </div>

    
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files for single product-->
  <script src="{{asset('adminty-user-assets/js/jquery-1.11.0.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/js/templatemo.js')}}"></script>
  <!-- Vendor JS Files -->
  <script src="{{asset('adminty-user-assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('adminty-user-assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('adminty-user-assets/js/main.js')}}"></script>


  <!-- Vendor JS Files for single product-->
   
  <!-- Start Slider Script -->
  <script src="{{asset('adminty-user-assets/js/slick.min.js')}}"></script>
  <script>
      $('#carousel-related-product').slick({
          infinite: true,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 3,
          dots: true,
          responsive: [{
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 3
                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 3
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 3
                  }
              }
          ]
      });
  </script>
  <!-- End Slider Script -->

</body>

</html>