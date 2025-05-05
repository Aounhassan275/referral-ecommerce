@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Manage Company Account | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Manage Company Account</h5>
                <div class="row">
                    <div class="col-4">
                        <a href="{{url('admin/payment_distrubtion_of_trade_income')}}" class="btn btn-info " data-toggle="tooltip" data-html="true"  data-placement="top" title="Normal user liaty jo active ho or Company Ka Trade Income account ki earning ko 10 hisso mai divide krein aor phr un ko user ka cash wallet mai de diaty hain aor yeh dashboard mai company reward ka title mai show ho gayi." style="margin-top:10px;">Transfer Trade Income To Users</a>
                    </div>
                    <div class="col-5">
                        <a href="{{url('admin/payment_distrubtion_of_product_income')}}" class="btn btn-info " data-toggle="tooltip" data-html="true"  data-placement="top" title="Normal user liaty jo active ho or Company Ka Product Income account ki earning ko 10 hisso mai divide krein aor phr un ko user ka cash wallet mai de diaty hain aor yeh dashboard mai star rank ka title mai show ho gayi." style="margin-top:10px;">Transfer Company Product Income To Users</a>
                    </div>
                    <div class="col-5">
                        <a href="{{url('admin/payment_distrubtion_of_all_renew')}}" class="btn btn-info " data-toggle="tooltip" data-html="true"  data-placement="top" title="Normal user liaty jo active ho or Company Ka all renew account ki earning ko 10 hisso mai divide krein aor phr un ko user ka for renew mai de diaty hain." style="margin-top:10px;">Transfer Company All Renew To Users</a>
                    </div>
                    <div class="col-5">
                        <a href="{{url('admin/payment_distrubtion_for_assoiated_account')}}" class="btn btn-danger " data-toggle="tooltip" data-html="true"  data-placement="top" title="yeh assoicate user le ga jis ka cash wallet mai 1 rupee ho ga or uss ko 2 hisso mai kr ka company flush or company product account mai send kr de ga." style="margin-top:10px;">Payment Distrubtion For Assoiated Account</a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('admin/get_pending_loan')}}" class="btn btn-success" style="margin-top:10px;">Get Pending Loan</a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('admin/create_associate_account')}}" class="btn btn-warning" style="margin-top:10px;">Create Associate Account</a>
                    </div>
                    <div class="col-3">
                        <a href="{{url('admin/renew_account')}}" class="btn btn-primary" style="margin-top:10px;">Renew Account</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.company_account.transfer')}}" enctype="multipart/form-data" >
                   @csrf
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
                            <select name="receiver_account" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach(App\Models\CompanyAccount::all() as $receiver_account)
                                <option value="{{$receiver_account->id}}">{{$receiver_account->name}}({{$receiver_account->balance}})</option>
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
</script>
@endsection