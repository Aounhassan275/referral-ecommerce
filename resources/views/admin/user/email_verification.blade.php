@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW USER With Unverified Mail | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View User Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">#</th>
                        <th style="width:auto;">Name</th>
                        <th style="width:auto;">Email </th>
                        <th style="width:auto;">Cash Wallet </th>
                        <th style="width:auto;">Temp Income </th>
                        <th style="width:auto;">Community Pool </th>
                        <th style="width:auto;">Investment Amount </th>
                        <th style="width:auto;">Total Earning </th>
                        <th style="width:auto;">Refer By </th>
                        <th style="width:auto;">Placement </th>
                        <th style="width:auto;">Package </th>
                        <th style="width:auto;">Package Price</th>
                        <th style="width:auto;">Package Date</th>
                        <th style="width:auto;">Status</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\User::where('email_verified',0)->where('associated_with',null)->where('type','!=','fake')->get() as $key => $user)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>$ {{$user->cash_wallet}}</td>
                        <td>$ {{$user->total_income}}</td>
                        <td>$ {{$user->community_pool}}</td>
                        <td>$ {{$user->investment_amount}}</td>
                        <td>$ {{$user->totalEarning()}}</td>
                        <td>{{$user->refer_by_name($user->refer_by)}}</td>
                        <td>{{$user->refer_by_name($user->referral)}}</td>
                        @if ($user->package)
                        <td>{{$user->package->name}}</td>    
                        <td>{{$user->package->price}}</td>    
                        <td>{{$user->a_date->format('d M,Y')}}</td>
                        @else
                        <td></td>
                        <td></td>
                        @endif
                        <td>
                            @if ($user->checkstatus() == true)
                                <span class="badge badge-success">Active</span>      
                            @else
                                <span class="badge badge-danger">Pending</span>                                                      
                            @endif
                        </td>
                    

                            <td> <a href="{{route('admin.user.detail',$user->id)}}" class="button"><button class="btn btn-primary"> Detail</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            // responsive: true,
            // lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection