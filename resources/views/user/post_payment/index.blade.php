@extends('user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Payments</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic table-responsive">
        <thead>
            <tr>
                <th>Sr#</th>
                <th>Post Name</th>
                <th>Post Price</th>
                <th>Is Payment Installement</th>
                <th>User Name</th>
                <th>Amount</th>
                <th>Created At</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($postPayments as $key => $payment)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{$payment->post->name}}</td>
                <td>{{$payment->post->price}}</td>
                <td>
                    @if($payment->post_purchase->post_installement_id)
                    <span class="badge badge-success">Yes</span>
                    @else 
                    <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td><a href="{{route('product.user',$payment->user_id)}}"> {{@$payment->user->name}}</a></td>
                <td>$ {{$payment->amount}}</td>
                <td>{{@$payment->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
@endsection