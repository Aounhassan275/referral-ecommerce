@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Transfer Income To User Accounts | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <button id="transfer_ranking_income_show" class="btn btn-info " style="margin-top:10px;">Transfer Ranking Income To Users</button>
                    </div>
                    <div class="col-4">
                        <button id="transfer_reward_income_show" class="btn btn-primary " style="margin-top:10px;">Transfer Reward Income Show</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.company_account.transfer_income')}}" enctype="multipart/form-data" id="transfer_ranking_income_form" style="display:none;" >
                   @csrf
                   <h5 class="card-title">Transfer Income To Managers</h5>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Transfer Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">From</label>
                            <select name="sender_account" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\CompanyAccount::all() as $sender_account)
                                <option value="{{$sender_account->id}}">{{$sender_account->name}}({{$sender_account->balance}})</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">To</label>
                            <select name="type" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                <option value="Seller">Seller</option>
                                <option value="Field Manager">Field Manager</option>
                                <option value="Area Manager">Area Manager</option>
                                <option value="Zonal Manager">Zonal Manager</option>
                                <option value="Regional Manager">Regional Manager</option>
                                <option value="Managing Director">Managing Director</option>
                            </select>                    
                        </div>
                    </div>      
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Transfer</button>
                    </div>
                </form>
                <form method="POST" action="{{route('admin.company_account.transfer_income_to_member')}}" enctype="multipart/form-data" id="transfer_reward_income_form" style="display:none;" >
                   @csrf
                   <h5 class="card-title">Transfer Income To User</h5>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Transfer Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">From</label>
                            <select name="sender_account" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\CompanyAccount::all() as $sender_account)
                                <option value="{{$sender_account->id}}">{{$sender_account->name}}({{$sender_account->balance}})</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">To</label>
                            <select name="receiver_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>              
                        </div>
                    </div>      
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach(App\Models\CompanyAccount::all() as $account)
    <div class="col-md-4   d-xxl-flex">

        <div class="card flex-fill">

            <div class="card-body py-4">

                <div class="media">

                    <div class="d-inline-block mt-2 mr-3">

                        <i class="feather-lg text-info" data-feather="dollar-sign"></i>

                    </div>

                    <div class="media-body">
                        <h3 class="mb-2">{{App\Models\Setting::currency()}} {{number_format(@$account->balance, 2)}}</h3>

                        <div class="mb-0">{{$account->name}}</div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    @endforeach
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
                    placeholder: "Select Category",
                    dropdownParent: $(this).parent()
                });
        })
    });
    $('#').on('')
</script>

<script>
    $(document).on('click', '#transfer_ranking_income_show', function () {
        $('#transfer_reward_income_form').hide();
        $('#transfer_ranking_income_form').show();
    });
    $(document).on('click', '#transfer_reward_income_show', function () {
        $('#transfer_ranking_income_form').hide();
        $('#transfer_reward_income_form').show();
    });
</script>
@endsection