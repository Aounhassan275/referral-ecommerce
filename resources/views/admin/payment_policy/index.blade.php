@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PAYMENT TYPES | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Payment Type Table</h5>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.payment_policy.create')}}" class="btn btn-primary float-right">Create Payment Type</a>

            </div>
        </div>
        <div class="table-responsive mt-4">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Type</th>
                        <th style="width:auto;">Sender 20 Team Level</th>
                        <th style="width:auto;">Receiver 20 Team Level</th>
                        <th style="width:auto;">Company Trade Income</th>
                        {{-- <th style="width:auto;">Company Products</th> --}}
                        <th style="width:auto;">Purchase Reward</th>
                        {{-- <th style="width:auto;">Draw Monthly</th> --}}
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\PaymentPolicy::all() as $key => $payment_policy)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$payment_policy->type}}</td>
                        <td>{{$payment_policy->sender_twenty_team_level}}</td>
                        <td>{{$payment_policy->receiver_twenty_team_level}}</td>
                        <td>{{$payment_policy->company_trade_income}}</td>
                        {{-- <td>{{$payment_policy->company_products}}</td> --}}
                        {{-- <td>{{$payment_policy->purchase_reward}}</td> --}}
                        {{-- <td>{{$payment_policy->draw_monthly}}</td> --}}
                        <td class="table-action">
                            <a href="{{route('admin.payment_policy.edit',$payment_policy->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.payment_policy.destroy',$payment_policy->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
                        </td>
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