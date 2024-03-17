@extends('user.layout.index')

@section('title')

    
OVERALL EARNING REPORT

@endsection
@section('styles')
<script src="{{asset('user_asset/global_assets/js/demo_pages/picker_date.js')}}"></script>

@endsection


@section('contents')
@if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager' || Auth::user()->type == 'Zonal Manager' || Auth::user()->type == 'Area Manager')
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">Update User Status</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form  action="{{route('user.user_status.update')}}"  method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{$user->id}}" required>
                        <div class="form-group col-md-4">
                            <label class="form-label">User Type</label>
                            <select name="type"  class="form-control" required>
                                <option selected disabled>Select User Type</option>
                                @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager' || Auth::user()->type == 'Zonal Manager' || Auth::user()->type == 'Area Manager')
                                <option @if($user->type == 'Field Manager') selected @endif value="Field Manager">Field Manager</option>
                                @endif
                                @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager' || Auth::user()->type == 'Zonal Manager')
                                <option @if($user->type == 'Area Manager') selected @endif value="Area Manager">Area Manager</option>
                                @endif
                                @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager')
                                <option @if($user->type == 'Zonal Manager') selected @endif value="Regional Manager">Zonal Manager</option>
                                @endif
                                @if(Auth::user()->type == 'Managing Director')
                                <option @if($user->type == 'Regional Manager') selected @endif value="Regional Manager">Regional Manager</option>
                                @endif
                            </select>
              
                        </div>    
                    </div>
                    <div class="row float-right" >
                            <button type="submit" class="btn btn-primary">Update User Status 
                                <i class="icon-plus22 ml-2"></i>
                            </button>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">{{$user->name}} Overall Earning Report</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="{{ route('user.report.overall_earning') }}" method="get">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>
                                From
                                <input type="text" name="from" class="daterange-single form-control pull-right" style="height: 35px; "
                                    value="{{ request()->get('from',date('m/d/Y', strtotime(@$data['default_from'])))}}">
                            </label>   
                        </div>
                        <div class="form-group col-md-4">
                            <label>
                                To
                                <input type="text" name="to" class="daterange-single form-control pull-right" style="height: 35px; "
                                    value="{{ request()->get('to',date('m/d/Y', strtotime(@$data['default_to'])))}}">
                            </label>
            
                        </div>   
                        <div class="form-group col-md-4">
                            <label for="">&nbsp;</label>
                            <p style="margin-top: -5px; ">
                                <button type="submit" class="btn btn-success" >
                                Apply
                            </button>
                            </p>
            
                        </div>    
                    </div>
                </form>
                <div class="text-center chart-container" style="position: relative; height:80vh; width:100%">
                    <canvas id="report"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">{{$user->name}} Direct Refferral</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
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
                        @foreach (App\Models\User::where('refer_by',$user->id)->where('type','!=',['fake','rebirth'])->orderBy('created_at','DESC')->get() as $key => $direct_user)
                            <tr> 
                                <td>{{$key + 1}}</td>
                                <td><img src="{{asset($direct_user->image)}}" width="50" height="50" alt=""></td>
                                <td>
                                    <a href="{{route('user.report.user_overall_earning',$direct_user->id)}}">
                                        {{$direct_user->name}}
                                    </a>
                                </td><td>
                                @if ($direct_user->checkstatus())
                                    <span class="badge badge-success">Active</span>  
                                    @else
                                    <span class="badge badge-danger">Pending</span>                                                      
                                    @endif</td>
                                <td>{{$direct_user->total_income}}</td>
                                <td>{{$direct_user->cash_wallet}}</td>
                                <td>{{$direct_user->community_pool}}</td>
                                <td>
                                    {{$direct_user->totalEarning()}}
                                </td> </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
   
<script src="{{ url('chart/Chart.min.js') }}"></script>
<script>
    var ctx = document.getElementById("report").getContext('2d');

    var colors = [
        '#FA00A7',
        '#52DDB0',
        '#F0FF1F',
        '#EB6D00',
        '#FF6384',
        '#FF9F40',
        '#FFCD56',
        '#B1169F',
        '#FEBBBA',
        '#BBC5BC',
        '#509C0C',
        '#573CC9',
        '#ED409C',
        '#BE5FCC',
        '#36A2EB',
        '#158003',
        '#22CECE',
        '#4D91C5',
        '#FFEE33',
        '#001CD1',
        '#E3C0E3',
        '#521D00',
        '#CD0422',
        '#CD0422',
        '#33C4D0',
        '#C20006',
        '#557F9B',
        '#00E632',
        '#C95CFF'
    ];
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [{!! $data['labels'] !!}],
            datasets: [
                {
                    label: 'Total Earnings',
                    data: [{!! $data['packages'] !!}],
                    borderWidth: 1,
                    hoverBorderWidth: 60,
                    hoverBorderColor: colors,
                    backgroundColor: colors,
                    hoverBackgroundColor: colors
                }
            ]
        },
        options: {
            title:{
                display:true,
                text:"Overall Earning Report"
            },
            legend: {
                display: true,
                responsive: true,
                position: 'right',
                reverse: true,
                fullWidth: true,
                labels: {
                }
            },
            tooltips: {
                mode: 'point',
                intersect: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    display: false,
                }],
                yAxes: [{
                    display: true,
                    type: 'linear',
                    beginAtZero:true,
                    ticks: {
                        min: 0,
                    }
                }]
            },
            
            percentageInnerCutout : 90,
        }
    });
    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>
@endsection
