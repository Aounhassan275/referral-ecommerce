@extends('adminty-user.layout.index')
@section('title')
REFERRALS
@endsection
@section('contents')
<div class="row " >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card bg-warning">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Share Your Referral Link</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        {{-- <a href="{{route('user.tree.show')}}" class="btn btn-dark" >See Your Tree</a> --}}
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
                {{-- <div class="text-right">
                </div> --}}
            </div>
            @if(Auth::user()->checkstatus() == true)
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Copy Link For Referral </label>
                        <input type="text" class="form-control" id="link_area"  value="{{url('user/register',$user->code)}}"  readonly>    
                        <br>
                        <button type="button" class="copy-button btn btn-dark  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Copy to clipboard</button>

                    </div> 
                </div>
            </div>
            @endif
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->mrefers()->where('type','Member')->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Member</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager' || Auth::user()->type == 'Zonal Manager' || Auth::user()->type == 'Area Manager')
    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->mrefers()->where('type','Field Manager')->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Field Manager</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-collaboration icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager' || Auth::user()->type == 'Zonal Manager')
    <div class="col-sm-6 col-xl-4">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0">{{Auth::user()->mrefers()->where('type','Area Manager')->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Area Manager</span>
                </div>
                
                <div class="mr-3 align-self-center">
                    <i class="icon-lan icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row">
    @if(Auth::user()->type == 'Managing Director' || Auth::user()->type == 'Regional Manager')
    <div class="col-sm-6 col-xl-6">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->mrefers()->where('type','Zonal Manager')->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Zonal Manager</span>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->type == 'Managing Director')
    <div class="col-sm-6 col-xl-6">
        <div class="card card-body bg-indigo-400 has-bg-image">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-users2 icon-3x opacity-75"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->mrefers()->where('type','Regional Manager')->count()}}</h3>
                    <span class="text-uppercase font-size-xs">Regional Manager</span>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="card">
    <div class="card-header table-card-header">
        <h5>View Your Direct Referral</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
    
            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Refer By</th>
                    <th>Placement</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Temp Income</th>
                    <th>Cash Wallet</th>
                    <th>Community Pool</th>
                    <th>Total Earning</th>
                    <th>Total Referral</th>
                    <th>Active Referral</th>
                    <th>Inactive Referral</th>
                </tr> 
            </thead>
            <tbody>
                @foreach (Auth::user()->mrefers() as $key => $user)
                    <tr> 
                        <td>{{$key + 1}}</td>
                        <td>
                            <a href="{{route('user.report.user_overall_earning',$user->id)}}">
                                {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>
                        
                        <td>
                            @if($user->refer_by)
                            {{$user->refer_by_name($user->refer_by)}}
                            @endif
                        </td>
                        <td>{{$user->placement()}}</td>
                        <td>{{$user->type}}</td>
                        <td>
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
                        </td>
                        <td>{{$user->mrefers()->count()}}</td>
                        <td>{{$user->mrefers()->where('status','active')->count()}}</td>
                        <td>{{$user->mrefers()->where('status','pending')->count()}}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
@endsection