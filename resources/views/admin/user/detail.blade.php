@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>USER DETAIL | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-xl-3">
        
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">User Details</h5>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title mb-0">{{$user->name}}</h5>
                <div class="text-muted mb-2">
                @if ($user->checkstatus() =='old')
                        <span class="badge badge-success">Active User</span>                            
                        @elseif($user->checkstatus() =='expired')
                        <span class="badge badge-primary">Expired User</span>  
                        @else
                                                <span class="badge badge-danger">Pending User</span>                                                      
                        @endif</div>
                @if ($user->status == 'block')
                <div>
                    <a class="btn btn-success btn-sm" href="{{route('admin.user.activation',$user->id)}}">Active</a>
                    @if(Auth::user()->type == 1)
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.delete',$user->id)}}">Delete</a>
                    @endif
                </div>
                @else
                <div>
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.block',$user->id)}}">Block</a>
                    @if(Auth::user()->type == 1)
                    <a class="btn btn-danger btn-sm" href="{{route('admin.user.delete',$user->id)}}">Delete</a>
                    @endif
                </div>
                <div>
                    @if(Auth::user()->type == 1)
                    <br>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.login.fake',$user->id) }}">Login</a>
                    @endif
                </div>
                @endif
            </div>
            <hr class="my-0">
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-success" data-feather="dollar-sign"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">$ {{$user->totalEarning()}}</h3>
                                <div class="mb-0">User Total Earning</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-warning" data-feather="dollar-sign"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">$ {{$user->total_income}}</h3>
                                <div class="mb-0">User Temp Income</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-danger" data-feather="dollar-sign"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">$ {{$user->cash_wallet}}</h3>
                                <div class="mb-0">User Cash Wallet</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-primary" data-feather="dollar-sign"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">$ {{$user->community_pool}}</h3>
                                <div class="mb-0">User Community Pool</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Settings</h5>
            </div>
            <div class="list-group list-group-flush" role="tablist">
                <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
                Update Profile
                </a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
                Deposit
                </a>   
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#draw" role="tab">
                Withdraw
                </a>
                <a class="list-group-item list-group-item-action" data-toggle="list" href="#referral" role="tab">
                    User Referral
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xl-9">
        @if ($user->package)
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-primary" data-feather="activity"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->package->name}}</h3>
                                <div class="mb-0">Package Subcription</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-warning" data-feather="calendar"></i>
        
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->a_date->format('d M,Y')}}</h3>
                                <div class="mb-0">Package Date</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-primary" data-feather="activity"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->refer_by_name($user->referral)}}</h3>
                                <div class="mb-0">User Chlid</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl d-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-warning" data-feather="calendar"></i>
        
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->refer_by_name($user->refer_by)}}</h3>
                                <div class="mb-0">Refer By</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl  d-xxl-flex">
                <div class="card flex-fill">
                    <div class="card-body py-4">
                        <div class="media">
                            <div class="d-inline-block mt-2 mr-3">
                                <i class="feather-lg text-info" data-feather="aperture"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="mb-2">{{$user->placement()}}</h3>
                                <div class="mb-0">User Placement</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="account" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <div class="dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Private info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.user.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <label for="inputFirstName">User name</label>
                                    <input type="text" class="form-control" name="name" id="inputFirstName" value="{{$user->name}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Phone#</label>
                                    <input type="number" class="form-control" name="phone"  value="{{$user->phone}}"  >
                                </div>  
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email"  value="{{$user->email}}" >
                                </div>   
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Cash Wallet</label>
                                    <input type="text" class="form-control" name="cash_wallet"  value="{{$user->cash_wallet}}" >
                                </div> 
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Temp Income</label>
                                    <input type="text" class="form-control" name="total_income"  value="{{$user->total_income}}" >
                                </div> 
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Birth Place</label>
                                    <input type="text" class="form-control" name="birth_place"  value="{{@$user->birth_place}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Favourite Place</label>
                                    <input type="text" class="form-control" name="favourite_place"  value="{{@$user->favourite_place}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Favourite Person</label>
                                    <input type="text" class="form-control" name="favourite_uncle"  value="{{@$user->favourite_uncle}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Total Invesment</label>
                                    <input type="text" class="form-control" name="investment_amount"  value="{{$user->investment_amount}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Community Pool</label>
                                    <input type="text" class="form-control" name="community_pool"  value="{{$user->community_pool}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">For Pool</label>
                                    <input type="text" class="form-control" name="for_pool"  value="{{$user->for_pool}}" >
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">User Type</label>
                                    <select name="type" class="form-control select2" required>
                                        <option selected disabled>Select</option>
                                        <option @if($user->type == 'Member') selected @endif value="Member">Member</option>
                                        <option @if($user->type == 'Seller') selected @endif value="Seller">Seller</option>
                                        <option @if($user->type == 'Field Manager') selected @endif value="Field Manager">Field Manager</option>
                                        <option @if($user->type == 'Area Manager') selected @endif value="Area Manager">Area Manager</option>
                                        <option @if($user->type == 'Zonal Manager') selected @endif value="Zonal Manager">Zonal Manager</option>
                                        <option @if($user->type == 'Regional Manager') selected @endif value="Regional Manager">Regional Manager</option>
                                        <option @if($user->type == 'Managing Director') selected @endif value="Managing Director">Managing Director</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Sale Reward</label>
                                    <input type="text" class="form-control" name="sale_reward"  value="{{$user->sale_reward}}" >
                                </div> 
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Salary Type</label>
                                    <select name="salary_type" class="form-control select2" required>
                                        <option selected disabled>Select</option>
                                        <option @if($user->salary_type == 0) selected @endif value="0">0</option>
                                        <option @if($user->salary_type == 1) selected @endif value="1">1</option>
                                        <option @if($user->salary_type == 2) selected @endif value="2">2</option>
                                        <option @if($user->salary_type == 3) selected @endif value="3">3</option>
                                   </select>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Service</label>
                                    <select name="service_id" id="service_id" class="form-control select2">
                                        <option selected disabled>Select Service</option>
                                        @foreach(App\Models\Service::all() as $service)
                                        <option @if($user->service_id == $service->id) selected @endif value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>                        
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Salary Type</label>
                                    <select name="type_id" id="type_id" class="form-control select2">
                                        <option selected disabled>Select Service Type</option>
                                        @foreach(App\Models\Type::all() as $type)
                                        <option @if($user->type_id == $type->id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>      
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Image</label>
                                    <input type="file" class="form-control" name="image"  />
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label ><input type="checkbox" name="email_verified"  {{ isset($user) && $user->email_verified ? 'checked' : '' }}> Email Verification</label>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label ><input type="checkbox" name="fund_fee_deduction"  {{ isset($user) && $user->fund_fee_deduction ? 'checked' : '' }}> Deduct Fund Fee</label>
                                </div> 
                            </div>
                            <div class="text-right">
                                <button type="submit"  class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="password" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Deposit History</h5>
                    </div>
                    <div class="table-responsive">
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Deposit Amount</th>
                                <th style="width:auto;">Deposit Tranc. ID# </th>
                                <th style="width:auto;">Payment Method </th>
                                <th style="width:auto;">For</th>
                                <th style="width:auto;">Deposit Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->deposits as $deposit)
                            <tr> 
                                <td>{{$deposit->amount}}</td>
                                <td>{{$deposit->t_id}}</td>
                                <td>{{$deposit->payment}}</td>
                                @if($deposit->package)
                                <td>{{$deposit->package->name}}</td>
                                @else 
                                <td>Balance</td>
                                @endif
                                <td>{{Carbon\Carbon::parse($deposit->created_at)->format('d/m/Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>   
            <div class="tab-pane fade" id="draw" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Withdraw History</h5>
                    </div>
                    <div class="table-responsive">
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">Withdraw Amount</th>
                                <th style="width:auto;">Account Holder</th>
                                <th style="width:auto;">Account Number</th>
                                <th style="width:auto;">Payment Method</th>
                                <th style="width:auto;">Withdraw Request Date </th>
                                <th style="width:auto;">Withdraw Request Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->withdraws as $withdraw)
                            <tr> 
                                <td>{{$withdraw->payment}}</td>
                                <td>{{$withdraw->name}}</td>
                                <td>{{$withdraw->account}}</td>
                                <td>{{$withdraw->method}}</td>
                                <td>{{Carbon\Carbon::parse($withdraw->created_at)->format('d/m/Y')}}</td>
                                <td> @if($withdraw->status=="Completed")
                                    <span class="badge badge-success">{{$withdraw->status}}</span>
                                    @elseif($withdraw->status=="in process")
                                    <span class="badge badge-danger">{{$withdraw->status}}</span>
                                    @else
                                    <span class="badge badge-primary">{{$withdraw->status}}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
            <div class="tab-pane fade" id="referral" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">View Referral History</h5>
                    </div>
                    <div class="table-responsive">
                    <table id="datatables-buttons" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:auto;">User Name</th>
                                <th style="width:auto;">User Email </th>
                                <th style="width:auto;">User Status </th>
                                <th style="width:auto;">User Earning </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->mrefers() as $key => $referral)
                            <tr> 
                                <td>{{$referral->name}}</td>
                                <td>{{$referral->email}}</td>
                                <td>
                                    @if ($referral->checkstatus())
                                        <span class="badge badge-success">Active</span>      
                                    @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                    @endif
                                </td>
                                <td>{{$referral->cash_wallet}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select Type",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>

<script>
    $(document).ready(function(){
        $('#service_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.service.types')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#type_id').empty();
                    $('#type_id').append('<option disabled>Select Service Tyoe</option>');
                    for (i=0;i<result.length;i++){
                        $('#type_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection


