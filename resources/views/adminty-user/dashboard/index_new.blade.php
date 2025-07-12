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
              <h4>{{Auth::user()->type}} Dashboard</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <button type="button" style="width: 100%;" class="btn btn-info ">
              <marquee>
                @foreach (App\Models\Ticker::all() As $ticker )
                  <span style="background-color: {{$ticker->color}};">{{$ticker->message}}</span>
                @endforeach
              </marquee>
          </button>
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
              <h4>PKR {{Auth::user()->cash_wallet}}</h4>
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
                >IF PURCHASE</span
              >
              <h4>PKR {{ Auth::user()->ifPurchaseAmount()}}</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-blue f-16 feather icon-alert-triangle m-r-10"
                  ></i
                  >Purchase Free</span
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
                >IF PROMOTE</span
              >
              <h4>PKR {{ Auth::user()->direct_team_income + Auth::user()->directIncome->sum('price')}}</h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-green f-16 feather icon-watch m-r-10"
                  ></i
                  >For Cash Wallet
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
                ></span
              >
              <h4>PKR </h4>
              <div>
                <span class="f-left m-t-10 text-muted">
                  <i
                    class="text-c-yellow f-16 feather icon-credit-card m-r-10"
                  ></i
                  >
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- statustic-card  end -->

        <!-- subscribe start -->
        <div class="col-xl-3 col-md-6" style="display:none;">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-airplay text-c-lite-green d-block f-40"
              ></i>
              <h6 class="m-t-20">
                <span class="text-c-lite-green">PKR {{Auth::user()->allUplineIncomeReminaindAmount()}}</span>
                IF WORK
              </h6>
              <p class="m-b-20">On Active Member</p>
              <button class="btn btn-primary btn-sm btn-round">
                Till 1st
              </button>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6" >
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-airplay text-c-lite-green d-block f-40"
              ></i>
              <h6 class="m-t-20">
                <span class="text-c-lite-green">{{Auth::user()->products->count()}}</span>
              </h6>
              <p class="m-b-20">Total Products</p>
              <a href="{{route('user.product.index')}}" class="btn btn-primary btn-sm btn-round">
                View Product
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-feather text-c-green d-block f-40"
              ></i>
              <h6 class="m-t-20">
                <span class="text-c-blue">{{count(Auth::user()->mrefers())}}</span>
                ALL TEAM
              </h6>
              <p class="m-b-20">My Team</p>
              <a href="{{url('user/refer')}}" style="color:white;" class="btn btn-success btn-sm btn-round">
                Check them out
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-users text-c-pink d-block f-40"
              ></i>
              <h6 class="m-t-20">
                <span class="text-c-blue">{{Auth::user()->totalDirectReferral()}}</span> ACTIVE
                TEAM
              </h6>
              <p class="m-b-20">Buy Package</p>
              <a href="{{url('user/refer?member_type=active')}}" style="color:white;" class="btn btn-danger btn-sm btn-round">
                Check them out
              </a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card">
            <div class="card-block text-center">
              <i
                class="feather icon-battery-charging text-c-lite-green d-block f-40"
              ></i>
              <h6 class="m-t-20">
                <span class="text-c-lite-green">{{Auth::user()->totalPendingDirectReferral()}}</span>
                PENDING TEAM
              </h6>
              <p class="m-b-20">Pending Package</p>
              <a  href="{{url('user/refer?member_type=pending')}}" style="color:white;" class="btn btn-primary btn-sm btn-round">
                Check them out
              </a>
            </div>
          </div>
        </div>
        <!-- subscribe end -->
        
        <!-- social download  start -->
        <div class="col-xl-3 col-md-6">
          <div class="card social-card bg-simple-c-blue">
            <div class="card-block">
              <div class="row align-items-center">
                <div class="col-auto">
                  <i
                    class="feather icon-shopping-cart f-34 text-c-white"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">PURCHASE</h6>
                  <p>PKR {{Auth::user()->ownerOrders->where('status','Completed')->sum('total_amount')}}</p>
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
                    class="feather icon-check-circle f-34 text-c-white"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">SALES</h6>
                  <p>PKR {{Auth::user()->orders->where('status','Completed')->sum('total_amount')}}</p>
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
                    class="feather icon-award f-34 text-c-white"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">TRANSFER</h6>
                  <p>PKR {{Auth::user()->fundTransfer()}}</p>
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
                    class="feather icon-download f-34 text-c-white"
                  ></i>
                </div>
                <div class="col">
                  <h6 class="m-b-0">WITHDRAW</h6>
                  <p>PKR {{Auth::user()->completedWithdraw()}}</p>
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
                    ALL ORDERS
                  </h6>
                  <h2 class="m-b-0">{{Auth::user()->orders->count()}}</h2>
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
                    PENDING 
                  </h6>
                  <h2 class="m-b-0">{{Auth::user()->orders->where('status','onHold')->count()}}</h2>
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
                    COMPLETE 
                  </h6>
                  <h2 class="m-b-0">{{Auth::user()->orders->where('status','Completed')->count()}}</h2>
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
                    REJECTED 
                  </h6>
                  <h2 class="m-b-0">{{Auth::user()->orders->where('status','Rejected')->count()}}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- customar project  end -->
        <!-- other rewords widget-statstic start -->
      
        {{-- <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-pink text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>PKR {{Auth::user()->loan_limit}}</h2>
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
              <h2>PKR {{Auth::user()->loanBalance()}}</h2>
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
              <h2>PKR {{Auth::user()->loanPaid()}}</h2>
              <h6>PAID LOAN</h6>
              <i class="feather icon-award"></i>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="card bg-c-pink text-white widget-visitor-card"
          >
            <div class="card-block-small text-center">
              <h2>PKR {{Auth::user()->loanPending()}}</h2>
              <h6>PENDING LOAN</h6>
              <i class="feather icon-user"></i>
            </div>
          </div>
        </div> --}}
        <!-- visitors  end -->
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
