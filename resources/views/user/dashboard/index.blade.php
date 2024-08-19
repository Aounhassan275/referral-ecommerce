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
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->cash_wallet}}</h3>
                    <span class="text-uppercase font-size-xs">Cash Wallet</span>
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
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->directIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Direct Reward</span>
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
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->getCompanyReward()}}</h3>
                    <span class="text-uppercase font-size-xs">In-direct Reward</span>
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
                    <h3 class="mb-0">{{Auth::user()->products->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Products</span>
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
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{App\Models\PostSale::where('receiver_id',Auth::user()->id)->sum('amount')}}</h3>
                    <span class="text-uppercase font-size-xs">Total Purchase</span>
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
                    <h3 class="mb-0">{{App\Models\Setting::currency()}} {{Auth::user()->rewardIncome->sum('price')}}</h3>
                    <span class="text-uppercase font-size-xs">Purchase Reward</span>
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
                        0
                    </h3>
                    <span class="text-uppercase font-size-xs">Total Installement</span>
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
                        
                    </h3>
                    <span class="text-uppercase font-size-xs">Installment Dues</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>
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

                            <a href="{{route('product.show',$product->uuid)}}" target="_blank"  class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
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
        <p><b>My Products :</b></p>
        <div class="row">
            @foreach(App\Models\Product::where('user_id',Auth::user()->id)->latest()->get()->take(4) as $product)
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-img-actions m-1">
                        <img class="card-img img-fluid" src="{{asset(@$product->images->first()->image)}}" alt="">
                        <div class="card-img-actions-overlay card-img">

                            <a href="{{route('product.show',$product->uuid)}}" target="_blank"  class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <p><b>New Members :</b></p>
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
        </div> --}}
        {{-- <p><b>New Members :</b></p> --}}
        {{-- <div class="row">
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
        </div> --}}
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
                                <td>{{App\Models\Setting::currency()}} {{$income->price}}</td>
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
