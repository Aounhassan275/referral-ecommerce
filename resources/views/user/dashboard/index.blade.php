@extends('user.layout.index')

@section('title')

    
DASHBOARD

@endsection
@section('styles')
<style>
    blink {
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


<div class="row">
    <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0">
                            <marquee class="blink">
                                @foreach (App\Models\Ticker::all() as $ticker)
                                        {!! $ticker->message !!} .
                                @endforeach
                            </marquee>
                        </h6>
                    </div>
                </div>
            </div>
            
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            {{-- <div class="text-center" style="padding: 10px"> --}}
                <canvas id="pie-chart" width="500" height="500"></canvas>
            {{-- </div> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            {{-- <div class="text-center" style="padding: 10px"> --}}
                <canvas id="withdraw-chart" width="500" height="500"></canvas>
            {{-- </div> --}}
        </div>
    </div>
</div>
<div class="row">
    {{-- <div class="col-sm-6 col-xl-3">
        @if(Auth::user()->salary_type == 3)
            <div class="card card-body bg-teal-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-nbsp icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="mb-0">$ {{Auth::user()->total_income}}</h3>
                        <span class="text-uppercase font-size-xs">Amount to Transfer</span>
                    </div>
                </div>
            </div>
        @else 
        <a href="#transfer_modal" data-toggle="modal" data-target="#transfer_modal">
            <div class="card card-body bg-teal-400 has-bg-image">
                <div class="media">
                    
                        <div class="mr-3 align-self-center">
                            <blink> <i class="icon-nbsp icon-3x opacity-75"></i></blink>
                        </div>

                        <div class="media-body">
                            <blink>
                                <h3 class="mb-0">$ {{Auth::user()->total_income}}</h3>
                                <span class="text-uppercase font-size-xs">Amount to Transfer</span>
                            </blink>
                        </div>
                    
                </div>
            </div>
        </a>

        @endif
    </div> --}}
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->cash_wallet}}</h5>
                    <span class="text-muted">Cash Wallet</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-2x text-danger-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->total_income}}</h5>
                    <span class="text-muted">Temp Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-coins icon-2x text-indigo-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->for_pool}}</h5>
                    <span class="text-muted">For Pool</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-coins icon-2x text-indigo-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-sm-6 col-xl-4">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-piggy-bank icon-2x text-blue-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->community_pool}}</h5>
                    <span class="text-muted">Community Pool</span>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="mr-3 align-self-center">
                    <i class="icon-cash3 icon-2x text-success-400 opacity-75"></i>
                </div>

                <div class="media-body">
                    <h6 class="font-weight-semibold mb-0">Today Earning</h6>
                    <span class="text-muted">$ {{Auth::user()->todayEarning()}}</span>
                </div>
            </div>
        </div>
    </div> --}}
    
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{App\Models\PostSale::where('receiver_id',Auth::user()->id)->sum('amount')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Purchase</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->rewardIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Personal Reward</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-lan icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">$ {{Auth::user()->rankingIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Rank Income</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-cart2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->refer_by_name(Auth::user()->refer_by)}}</h3>
                    <span class="text-uppercase font-size-xs">Refer By</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-violet-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->associatedUsers()->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Associated User</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-brown-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">$ {{Auth::user()->associatedIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Associated Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-cash3 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-orange-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">
                        @if(Auth::user()->package)
                        $ {{Auth::user()->package->price + Auth::user()->investment_amount}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-xs">Package Price</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-pink-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->package->name}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-xs">Package Name</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->pool_income}}</h5>
                    <span class="text-muted">Pool Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-2x text-danger-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>   
    <div class="col-sm-6 col-xl-3">
        <a href="#transfer_pool_income_modal" data-toggle="modal" data-target="#transfer_pool_income_modal">
            <div class="card card-body">
                <div class="media mb-3">
                    <div class="media-body">
                        <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->pool_income}}</h5>
                        <span class="text-muted">Transfer</span>
                    </div>

                    <div class="ml-3 align-self-center">
                        <i class="icon-coins icon-2x text-indigo-400 opacity-75"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media mb-3">
                <div class="media-body">
                    <h5 class="font-weight-semibold mb-0">$ {{Auth::user()->pool_income}}</h5>
                    <span class="text-muted">Pool Income</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-2x text-danger-400 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>    
</div>
{{-- <div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-pointer icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        $ {{Auth::user()->package->price + Auth::user()->investment_amount}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Price</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-enter6 icon-3x text-indigo-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->package->name}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Name</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">
                        @if(Auth::user()->package)
                        {{Auth::user()->a_date->format('d M,Y')}}
                        @endif
                    </h3>
                    <span class="text-uppercase font-size-sm text-muted">Package Date</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-calendar52 icon-3x text-blue-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">{{Auth::user()->packagehistory()->count()}}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Purchased Package</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bag icon-3x text-danger-400"></i>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-md-6">
        <p><b>Latest Products :</b></p>
        <div class="row">
            @foreach(App\Models\Product::whereNotNull('user_id')->latest()->get()->take(4) as $product)
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-img-actions m-1">
                        <img class="card-img img-fluid" src="{{asset(@$product->images->first()->image)}}" alt="">
                        <div class="card-img-actions-overlay card-img">

                            <a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" target="_blank"  class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-6">
        <p><b>New Members :</b></p>
        <div class="row">
            @foreach(App\Models\User::whereNotNull('service_id')->whereNotNull('type_id')->latest()->get()->take(4) as $service)
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-img-actions m-1">
                        <img class="card-img img-fluid" src="{{asset(@$service->image)}}" alt="">
                        <div class="card-img-actions-overlay card-img">

                            <a href="{{route('product.user',@$service->id)}}" target="_blank" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="card" style="max-height:500px;">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">View Earnings</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table  datatable-basic datatable-row-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Due To</th>
                            <th>Created At</th>
                            <th>Amount</th>
                            <th></th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach (App\Models\Earning::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get() as $key => $income)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$income->type}}</td>
                                <td>{{$income->user->refer_by_name($income->due_to)}}</td>
                                <td>{{$income->created_at->format('d M,Y')}}</td>
                                <td>$ {{$income->price}}</td>
                                <th></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    <div class="col-md-6">
        <div class="card" style="max-height: 500px;">
            <div class="card-header header-elements-inline bg-primary">
                <h5 class="card-title">View Your Direct Referral</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table datatable-basic datatable-row-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Temp Income</th>
                            <th>Cash Wallet</th>
                            <th>Community Pool</th>
                            <th>Total Earning</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach (App\Models\User::where('refer_by',Auth::user()->id)->whereNotIn('type',['fake','rebirth'])->orderBy('created_at','DESC')->get() as $key => $user)
                            <tr> 
                                <td>{{$key + 1}}</td>
                                <td><img src="{{asset($user->image)}}" width="50" height="50" alt=""></td>
                                <td>
                                    <a href="{{route('user.report.user_overall_earning',$user->id)}}">
                                        {{$user->name}}
                                    </a>
                                </td><td>
                                @if ($user->checkstatus())
                                    <span class="badge badge-success">Active</span>  
                                    @else
                                    <span class="badge badge-danger">Pending</span>                                                      
                                    @endif</td>
                                <td>{{$user->total_income}}</td>
                                <td>{{$user->cash_wallet}}</td>
                                <td>{{$user->community_pool}}</td>
                                <td>
                                    {{$user->totalEarning()}}
                                </td> </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div id="transfer_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="tansferForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title mt-0" id="myModalLabel">Transfer Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">For Cash Wallet</label>
                        <input class="form-control" type="number" readonly name="cash_wallet" value="{{Auth::user()->total_income/2}}">
                    </div>
                    <div class="form-group">
                        <label for="title">For Community Pool</label>
                        <input class="form-control" type="number" readonly name="community_pool" value="{{Auth::user()->total_income/2}}">
                    </div>
                    <p id="errors" style="color:red;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="transfer_pool_income_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="tansferPoolIncomeForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title mt-0" id="myModalLabel">Transfer Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">For Cash Wallet</label>
                        <input class="form-control" type="number" readonly name="cash_wallet" value="{{Auth::user()->pool_income/ 100  * 80}}">
                    </div>                    
                    <div class="form-group">
                        <label for="title">To Direct Referral</label>
                        <input class="form-control" type="number" readonly name="direct_referral" value="{{Auth::user()->pool_income/ 100 * 10}}">
                    </div>               
                    <div class="form-group">
                        <label for="title">Fee</label>
                        <input class="form-control" type="number" readonly name="fee" value="{{Auth::user()->pool_income/ 100 * 10}}">
                    </div>
                    <p id="errors-pool-income" style="color:red;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ url('chart/Chart.min.js') }}"></script>
    <script>

        new Chart(document.getElementById("pie-chart"), {

            type: 'pie',

            data: {

                labels: [
                    "Direct({{Auth::user()->directIncome->sum('price')}})", 
                    "Direct Team({{Auth::user()->directTeamIncome->sum('price')}})", 
                    "Upline({{Auth::user()->uplineIncome->sum('price')}})", 
                    "Downline({{Auth::user()->downlineIncome->sum('price')}})", 
                    "Upline Placement({{Auth::user()->uplinePlacementIncome->sum('price')}})", 
                    "Downline Placement({{Auth::user()->downlinePlacementIncome->sum('price')}})",
                    "Trade({{Auth::user()->tradeIncome->sum('price')}})",
                    "Ranking({{Auth::user()->rankingIncome->sum('price')}})",
                    "Reward({{Auth::user()->rewardIncome->sum('price')}})",
                    "Associated({{Auth::user()->associatedIncome->sum('price')}})",
                    "Pool({{Auth::user()->poolIncome->sum('price')}})"
                    ],
                datasets: [{

                    label: "Earning",
                    backgroundColor: ["#990099","#109618","#ff9900", "#dc3912", "#3366cc","#33C4FF","#0C3343","#EC7063","#49BA98","#EC7063","#49BA98"],

                    data: [
                        '{{Auth::user()->directIncome->sum('price')}}',
                        '{{Auth::user()->directTeamIncome->sum('price')}}',
                        '{{Auth::user()->uplineIncome->sum('price')}}',
                        '{{Auth::user()->downlineIncome->sum('price')}}',
                        '{{Auth::user()->uplinePlacementIncome->sum('price')}}',
                        '{{Auth::user()->downlinePlacementIncome->sum('price')}}',
                        '{{Auth::user()->tradeIncome->sum('price')}}',
                        '{{Auth::user()->rankingIncome->sum('price')}}',
                        '{{Auth::user()->rewardIncome->sum('price')}}',
                        '{{Auth::user()->associatedIncome->sum('price')}}',
                        '{{Auth::user()->poolIncome->sum('price')}}',
                    ],

                }]
            },

            options: {

                responsive: true,
                title: {

                    display: true,

                    text: 'Total Income'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
    <script>

        new Chart(document.getElementById("withdraw-chart"), {

            type: 'pie',

            data: {

                labels: ["Total Withdraw", "Withdraw Completed", "Withdraw Onhold", "Withdraw In Process", "Withdraw Rejected", "Fund Transfer", "Fund Received", "Sale Reward"],

                datasets: [{

                    label: "Packages",

                    backgroundColor: ["#ABB2B9","#7FB3D5","#C39BD3", "#EC7063", "#3366cc","#33C4FF","#0C3343","#49BA98"],

                    data: [
                        '{{Auth::user()->totalWithdraw()}}',
                        '{{Auth::user()->completedWithdraw()}}',
                        '{{Auth::user()->onHoldWithdraw()}}',
                        '{{Auth::user()->inProcessWithdraw()}}',
                        '{{Auth::user()->rejectedWithdraw()}}',
                        '{{Auth::user()->fundTransfer()}}',
                        '{{Auth::user()->fundReceived()}}',
                        '{{Auth::user()->sale_reward}}'
                    ],

                }]
            },

            options: {

                responsive: true,
                title: {

                    display: true,

                    text: 'Withdraw'
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return tooltipItem[0].xLabel;
                        },
                        label: function(dataItems, data) {
                            console.log(dataItems,data);
                            var category = data.labels[dataItems.index];
                            var value = data.datasets[0].data[dataItems.index];


                            return ' ' + category + ': $' +value;
                        }
                    }
                }
            }
        });
    </script>
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
