@extends('user.layout.index')

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

@if(App\Models\Setting::dashboard() == 'simple')
@include('user.dashboard.partials.simple_dashboard')
@else 
@include('user.dashboard.partials.ali_dashboard')
@endif
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
