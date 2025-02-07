@extends('adminty-user.layout.index')

@section('title')

    
DASHBOARD

@endsection
@section('styles')
<style>
    .blink {
        animation: blinker 2s linear infinite;
    }
    @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
  </style>   
@endsection


@section('contents')

<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Dashboard</h4>
              <span>Everything you need</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
              <li class="breadcrumb-item" style="float: left">
                <a href="../index.html">
                  <i class="feather icon-home"></i>
                </a>
              </li>
              <li class="breadcrumb-item" style="float: left">
                <a href="#!">Dashboard</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-body start -->
    <div class="page-body">
      <div class="row">
        <!-- CASH WALLET statustic-card  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card widget-card-1">
            <div class="card-block-small">
              <i
                class="feather icon-home bg-c-pink card1-icon"
              ></i>
              <span class="text-c-pink f-w-600"
                >CASH WALLET</span
              >
              <h4>$589</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-pink f-16 feather icon-calendar m-r-10"
                  ></i
                  >Amount to Use
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-card-1">
            <div class="card-block-small">
              <i
                class="feather icon-pie-chart bg-c-blue card1-icon"
              ></i>
              <span class="text-c-blue f-w-600"
                >DIRECT REWARD</span
              >
              <h4>40</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-blue f-16 feather icon-alert-triangle m-r-10"
                  ></i
                  >Direct Reword on Work</span
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-card-1">
            <div class="card-block-small">
              <i
                class="feather icon-users bg-c-green card1-icon"
              ></i>
              <span class="text-c-green f-w-600"
                >REFERRALS</span
              >
              <h4>45</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-green f-16 feather icon-watch m-r-10"
                  ></i
                  >Referrals of month
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-card-1">
            <div class="card-block-small">
              <i
                class="feather icon-upload-cloud bg-c-yellow card1-icon"
              ></i>
              <span class="text-c-yellow f-w-600"
                >F.M REWARD</span
              >
              <h4>+562</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-yellow f-16 feather icon-credit-card m-r-10"
                  ></i
                  >Reward of Month
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- statustic-card  end -->

        <!-- A.M user card  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card user-widget-card bg-c-blue">
            <div class="card-block">
              <i
                class="feather icon-user bg-simple-c-blue card1-icon"
              ></i>
              <h4>652</h4>
              <p>A.M REWARD</p>
              <a href="#!" class="more-info">1st Level</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card user-widget-card bg-c-pink">
            <div class="card-block">
              <i
                class="feather icon-users bg-simple-c-pink card1-icon"
              ></i>
              <h4>652</h4>
              <p>Z.M REWARD</p>
              <a href="#!" class="more-info">2nd Level</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card user-widget-card bg-c-green">
            <div class="card-block">
              <i
                class="feather icon-users bg-simple-c-green card1-icon"
              ></i>
              <h4>652</h4>
              <p>R.M REWARD</p>
              <a href="#!" class="more-info">3rd Level</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card user-widget-card bg-c-yellow">
            <div class="card-block">
              <i
                class="feather icon-users bg-simple-c-yellow card1-icon"
              ></i>
              <h4>652</h4>
              <p>M.D REWARD</p>
              <a href="#!" class="more-info">4th Level</a>
            </div>
          </div>
        </div>
        <!-- user card  end -->
        <!-- subscribe start -->
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-airplay text-c-lite-green d-block f-40"
              ></i>
              <h4 class="m-t-20">
                <span class="text-c-lite-green">8.62</span>
                IF WORK
              </h4>
              <p class="m-b-20">On Active Member</p>
              <button class="btn btn-primary btn-sm btn-round">
                Till 1st
              </button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-feather text-c-green d-block f-40"
              ></i>
              <h4 class="m-t-20">
                <span class="text-c-blue">40</span>
                ALL MEMBERS
              </h4>
              <p class="m-b-20">My Team</p>
              <button class="btn btn-success btn-sm btn-round">
                Check them out
              </button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-users text-c-pink d-block f-40"
              ></i>
              <h4 class="m-t-20">
                <span class="text-c-blue">40</span> ACTIVE
                MEMBERS
              </h4>
              <p class="m-b-20">Buy Package</p>
              <button class="btn btn-danger btn-sm btn-round">
                Check them out
              </button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-battery-charging text-c-lite-green d-block f-40"
              ></i>
              <h4 class="m-t-20">
                <span class="text-c-lite-green">8</span>
                PENDING MEMBERS
              </h4>
              <p class="m-b-20">Pending Package</p>
              <button class="btn btn-primary btn-sm btn-round">
                Check them out
              </button>
            </div>
          </div>
        </div>
        <!-- subscribe end -->
        <!-- other rewords widget-statstic start -->
        <div class="col-xl-3 col-md-6">
          <div class="card widget-statstic-card">
            <div class="card-header">
              <div class="card-header-left">
                <h5>TEAM REWARD</h5>
                <p class="p-t-10 m-b-0 text-c-pink">
                  From 20 Levels
                </p>
              </div>
            </div>
            <div class="card-block">
              <i
                class="feather icon-users st-icon bg-c-pink txt-lite-color"
              ></i>
              <div class="text-left">
                <h3 class="d-inline-block">3,874</h3>
                <i
                  class="feather icon-arrow-down text-c-pink f-30"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-statstic-card">
            <div class="card-header">
              <div class="card-header-left">
                <h5>PURCHASE REWARD</h5>
                <p class="p-t-10 m-b-0 text-c-blue">
                  From 20 Levels
                </p>
              </div>
            </div>
            <div class="card-block">
              <i
                class="feather icon-shopping-cart st-icon bg-c-blue"
              ></i>
              <div class="text-left">
                <h3 class="d-inline-block">5,456</h3>
                <i
                  class="feather icon-arrow-up text-c-green f-30"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-statstic-card">
            <div class="card-header">
              <div class="card-header-left">
                <h5>COMPANY REWARD</h5>
                <p class="p-t-10 m-b-0 text-c-green">
                  Form Company Sales
                </p>
              </div>
            </div>
            <div class="card-block">
              <i
                class="feather icon-briefcase st-icon bg-c-green"
              ></i>
              <div class="text-left">
                <h3 class="d-inline-block">5,456</h3>
                <i
                  class="feather icon-arrow-up f-30 text-c-green"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card widget-statstic-card">
            <div class="card-header">
              <div class="card-header-left">
                <h5>STAR RANK</h5>
                <p class="p-t-10 m-b-0 text-c-yellow">
                  Extra Company Reword
                </p>
              </div>
            </div>
            <div class="card-block">
              <i
                class="feather icon-sliders st-icon bg-c-yellow"
              ></i>
              <div class="text-left">
                <h3 class="d-inline-block">5,456</h3>
                <i
                  class="feather icon-arrow-up f-30 text-c-green"
                ></i>
                <span class="f-right bg-c-yellow">X 23</span>
              </div>
            </div>
          </div>
        </div>
        <!-- widget-statstic end -->
        <!-- statustic with progressbar  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-progress-card">
            <div class="card-header">
              <h5>STARTER 5000/</h5>
            </div>
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col">
                  <label class="label label-success">
                    35%
                    <i
                      class="m-l-10 feather icon-arrow-down"
                    ></i>
                  </label>
                </div>
                <div class="col text-right">
                  <h5 class="">1000</h5>
                </div>
              </div>
              <div class="progress m-t-15">
                <div
                  class="progress-bar bg-c-green"
                  style="width: 35%"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-progress-card">
            <div class="card-header">
              <h5>SELLER 10000/</h5>
            </div>
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col">
                  <label class="label bg-c-lite-green">
                    35%
                    <i class="m-l-10 feather icon-arrow-up"></i>
                  </label>
                </div>
                <div class="col text-right">
                  <h5 class="">5000</h5>
                </div>
              </div>
              <div class="progress m-t-15">
                <div
                  class="progress-bar bg-c-lite-green"
                  style="width: 28%"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-progress-card">
            <div class="card-header">
              <h5>BRAND 30000/</h5>
            </div>
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col">
                  <label class="label label-danger">
                    35%
                    <i class="m-l-10 feather icon-arrow-up"></i>
                  </label>
                </div>
                <div class="col text-right">
                  <h5 class="">10000</h5>
                </div>
              </div>
              <div class="progress m-t-15">
                <div
                  class="progress-bar bg-c-pink"
                  style="width: 87%"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-progress-card">
            <div class="card-header">
              <h5>PRODUCTS</h5>
            </div>
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col">
                  <label class="label label-warning">
                    35%
                    <i class="m-l-10 feather icon-arrow-up"></i>
                  </label>
                </div>
                <div class="col text-right">
                  <h5 class="">1</h5>
                </div>
              </div>
              <div class="progress m-t-15">
                <div
                  class="progress-bar bg-c-yellow"
                  style="width: 32%"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <!-- statustic with progressbar  end -->

        <!-- user start -->
        <!-- If Purchase start -->
        <div class="col-xl-3 col-md-6">
          <div class="card text-center text-white bg-c-green">
            <div class="card-block">
              <h6 class="m-b-0">PURCHASE 1 to 9999</h6>
              <h4 class="m-t-10 m-b-10">
                <i class="feather icon-arrow-up m-r-15"></i>7652
              </h4>
              <p class="m-b-0">If Shop in this Range.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card text-center text-white bg-c-pink">
            <div class="card-block">
              <h6 class="m-b-0">PURCHASE 10000 to 29999</h6>
              <h4 class="m-t-10 m-b-10">
                <i class="feather icon-arrow-up m-r-15"></i>6325
              </h4>
              <p class="m-b-0">If Shop in this Range.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="card text-center text-white bg-c-lite-green"
          >
            <div class="card-block">
              <h6 class="m-b-0">PURCHASE 30000 to 59999</h6>
              <h4 class="m-t-10 m-b-10">
                <i class="feather icon-arrow-up m-r-15"></i>652
              </h4>
              <p class="m-b-0">If Shop in this Range.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card text-center text-white bg-c-yellow">
            <div class="card-block">
              <h6 class="m-b-0">PURCHASE 60000 to 99999</h6>
              <h4 class="m-t-10 m-b-10">
                <i class="feather icon-arrow-up m-r-15"></i>5963
              </h4>
              <p class="m-b-0">If Shop in this Range.</p>
            </div>
          </div>
        </div>
        <!-- If Purchase end -->
        <!-- Buyer and Seller statustic start -->
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-card">
            <div class="card-header">
              <h5>DRAW 1</h5>
            </div>
            <div class="card-block text-center">
              <span class="d-block text-c-blue f-36">56</span>
              <p class="m-b-0">For Buyer and Seller.</p>
              <div class="progress">
                <div
                  class="progress-bar bg-c-blue"
                  style="width: 56%"
                ></div>
              </div>
            </div>
            <div class="card-footer bg-c-blue">
              <h6 class="text-white m-b-0">Days left: 22</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-card">
            <div class="card-header">
              <h5>DRAW 2</h5>
            </div>
            <div class="card-block text-center">
              <span class="d-block text-c-green f-36">14</span>
              <p class="m-b-0">For Buyer and Seller.</p>
              <div class="progress">
                <div
                  class="progress-bar bg-c-green"
                  style="width: 14%"
                ></div>
              </div>
            </div>
            <div class="card-footer bg-c-green">
              <h6 class="text-white m-b-0">Days left: 22</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-card">
            <div class="card-header">
              <h5>DRAW 3</h5>
            </div>
            <div class="card-block text-center">
              <span class="d-block text-c-pink f-36">85</span>
              <p class="m-b-0">For Buyer and Seller.</p>
              <div class="progress">
                <div
                  class="progress-bar bg-c-pink"
                  style="width: 85%"
                ></div>
              </div>
            </div>
            <div class="card-footer bg-c-pink">
              <h6 class="text-white m-b-0">Days left: 22</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card statustic-card">
            <div class="card-header">
              <h5>DRAW 4</h5>
            </div>
            <div class="card-block text-center">
              <span class="d-block text-c-yellow f-36">42</span>
              <p class="m-b-0">For Buyer and Seller.</p>
              <div class="progress">
                <div
                  class="progress-bar bg-c-yellow"
                  style="width: 42%"
                ></div>
              </div>
            </div>
            <div class="card-footer bg-c-yellow">
              <h6 class="text-white m-b-0">Days left: 22</h6>
            </div>
          </div>
        </div>
        <!-- LOAN LIMIT statustic end -->
        <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-pink text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>1,658</h2>
              <h6>LOAN LIMIT</h6>
              <i class="feather icon-user"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-blue text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>5,678</h2>
              <h6>LOAN BALANCE</h6>
              <i class="feather icon-file-text"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-yellow text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>5,678</h2>
              <h6>PAYED LOAN</h6>
              <i class="feather icon-award"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-pink text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>1,658</h2>
              <h6>PENDING LOAN</h6>
              <i class="feather icon-user"></i>
            </div>
          </div>
        </div>
        <!-- visitors  end -->

        <!-- R O I order  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card bg-c-yellow order-card">
            <div class="card-block">
              <h6>MY STOCK</h6>
              <h2>42,562</h2>
              <p class="m-b-0">
                Purchase from the Company
                <i class="feather icon-arrow-up m-l-10"></i>
              </p>
              <i class="card-icon feather icon-filter"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-c-blue order-card">
            <div class="card-block">
              <h6>STOCK R.O.I</h6>
              <h2>486</h2>
              <p class="m-b-0">
                Reward on Purchase in R.O.I
                <i
                  class="feather icon-arrow-up m-l-10 m-r-10"
                ></i>
              </p>
              <i class="card-icon feather icon-users"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-c-green order-card">
            <div class="card-block">
              <h6>GET R.O.I</h6>
              <h2>1641</h2>
              <p class="m-b-0">
                Get Total R.O.I
                <i
                  class="feather icon-arrow-up m-l-10 m-r-10"
                ></i>
              </p>
              <i class="card-icon feather icon-radio"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-c-yellow order-card">
            <div class="card-block">
              <h6>STOCK REWORD</h6>
              <h2>42,562</h2>
              <p class="m-b-0">
                EXTRA % ON DELIVERY
                <i class="feather icon-arrow-up m-l-10"></i>
              </p>
              <i class="card-icon feather icon-filter"></i>
            </div>
          </div>
        </div>
        <!-- order  end -->
        <!-- social download  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card social-card bg-simple-c-blue">
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col-auto">
                  <i
                    class="feather icon-shopping-cart f-34 text-c-blue social-icon"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">TOTAL PURCHASE</h6>
                  <p>2000</p>
                  <p class="m-b-0"></p>
                </div>
              </div>
            </div>
            <a href="#!" class="download-icon"
              ><i class="feather icon-arrow-down"></i
            ></a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card social-card bg-simple-c-pink">
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col-auto">
                  <i
                    class="feather icon-check-circle f-34 text-c-pink social-icon"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">TOTAL SALES</h6>
                  <p>231</p>
                  <p class="m-b-0"></p>
                </div>
              </div>
            </div>
            <a href="#!" class="download-icon"
              ><i class="feather icon-arrow-down"></i
            ></a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card social-card bg-simple-c-green">
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col-auto">
                  <i
                    class="feather icon-award f-34 text-c-green social-icon"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">TOTAL TRANSFER</h6>
                  <p>2211</p>
                  <p class="m-b-0"></p>
                </div>
              </div>
            </div>
            <a href="#!" class="download-icon"
              ><i class="feather icon-arrow-down"></i
            ></a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card social-card bg-simple-c-blue">
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col-auto">
                  <i
                    class="feather icon-download f-34 text-c-blue social-icon"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">TOTAL WITHDRAWAL</h6>
                  <p>23166</p>
                  <p class="m-b-0"></p>
                </div>
              </div>
            </div>
            <a href="#!" class="download-icon"
              ><i class="feather icon-arrow-down"></i
            ></a>
          </div>
        </div>
        <!-- social download  end -->
        <!-- customar project  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center m-l-0">
                <div class="col-auto">
                  <i
                    class="feather icon-file-plus f-30 text-c-lite-green"
                  ></i>
                </div>
                <div class="col-auto">
                  <h6 class="text-muted m-b-10">
                    TOTAL ORDERS
                  </h6>
                  <h2 class="m-b-0">379</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center m-l-0">
                <div class="col-auto">
                  <i
                    class="feather icon-pie-chart f-30 text-c-green"
                  ></i>
                </div>
                <div class="col-auto">
                  <h6 class="text-muted m-b-10">
                    PENDING ORDERS
                  </h6>
                  <h2 class="m-b-0">205</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center m-l-0">
                <div class="col-auto">
                  <i
                    class="feather icon-shopping-cart f-30 text-c-pink"
                  ></i>
                </div>
                <div class="col-auto">
                  <h6 class="text-muted m-b-10">
                    COMPLETE ORDERS
                  </h6>
                  <h2 class="m-b-0">84</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block">
              <div class="row align-items-center m-l-0">
                <div class="col-auto">
                  <i
                    class="feather icon-layers f-30 text-c-blue"
                  ></i>
                </div>
                <div class="col-auto">
                  <h6 class="text-muted m-b-10">
                    REJECTED ORDERS
                  </h6>
                  <h2 class="m-b-0">325</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- customar project  end -->

        <!-- user-radial-card  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block user-radial-card">
              <div
                data-label="50%"
                class="radial-bar radial-bar-90 radial-bar-lg radial-bar-danger"
              >
                <img
                  src="{{asset('adminty-assets/assets/images/avatar-2.jpg')}}"
                  alt="User-Image"
                />
              </div>
              <span class="f-36 text-c-pink">3,6</span>
              <p>From 6 GB</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block user-radial-card">
              <div
                data-label="50%"
                class="radial-bar radial-bar-40 radial-bar-lg radial-bar-success"
              >
                <img
                  src="{{asset('adminty-assets/assets/images/avatar-2.jpg')}}"
                  alt="User-Image"
                />
              </div>
              <span class="f-36 text-c-green">85%</span>
              <p>From 6 GB</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block user-radial-card">
              <div
                data-label="50%"
                class="radial-bar radial-bar-60 radial-bar-lg radial-bar-primary"
              >
                <img
                  src="{{asset('adminty-assets/assets/images/avatar-2.jpg')}}"
                  alt="User-Image"
                />
              </div>
              <span class="f-36 text-c-lite-green">73%</span>
              <p>From 6 GB</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block user-radial-card">
              <div
                data-label="50%"
                class="radial-bar radial-bar-35 radial-bar-lg radial-bar-warning"
              >
                <img
                  src="{{asset('adminty-assets/assets/images/avatar-2.jpg')}}"
                  alt="User-Image"
                />
              </div>
              <span class="f-36 text-c-yellow">6</span>
              <p>From 6 GB</p>
            </div>
          </div>
        </div>
        <!-- user-radial-card  end -->
      </div>
    </div>
    <!-- Page-body end -->
  </div>
@endsection
@section('scripts')
    <script src="{{ url('chart/Chart.min.js') }}"></script>
    <script>
        $(document).on('submit', '#tansferForm', function (event) {
            $('#errors').html("Please Wait!!");
            $('.btn').attr("disabled",true);
            event.preventDefault();
            $.ajax({
                url: '{{url("user/transfer_funds")}}',
                type: 'POST',
                data: $('#tansferForm').serialize(),
            })
                .done(function (response) {
                    $('.btn').attr("disabled",false);
                    if(response.status == true)
                    {
                        setTimeout(function() {
                            $('#errors').html(response.message);
                            $('#transfer_modal').modal("hide");
                        }, 3000);
                        location.reload();
                    }else{
                        $('#errors').html(response.message);
                    }
                })
                .fail(function (response) {
                })
                .always(function () {
                    console.log("complete");
                });
        });
        $(document).on('submit', '#tansferPoolIncomeForm', function (event) {
            $('#errors').html("Please Wait!!");
            $('.btn').attr("disabled",true);
            event.preventDefault();
            $.ajax({
                url: '{{url("user/transfer_pool_income_funds")}}',
                type: 'POST',
                data: $('#tansferPoolIncomeForm').serialize(),
            })
                .done(function (response) {
                    $('.btn').attr("disabled",false);
                    if(response.status == true)
                    {
                        setTimeout(function() {
                            $('#errors-pool-income').html(response.message);
                            $('#transfer_pool_income_modal').modal("hide");
                        }, 3000);
                        location.reload();
                    }else{
                        $('#errors-pool-income').html(response.message);
                    }
                })
                .fail(function (response) {
                })
                .always(function () {
                    console.log("complete");
                });
        });
    </script>
@endsection
