@extends('user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Purchases</h5>
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
                <th>User Name</th>
                <th>Is Payment Installement</th>
                <th>Pay Amount</th>
                <th>Pending Amount</th>
                <th>Created At</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($post->purchases as $key => $post_purchase)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{$post_purchase->post->name}}</td>
                <td>$ {{$post_purchase->amount}}</td>
                <td><a href="{{route('product.user',$post_purchase->owner_id)}}"> {{@$post_purchase->owner->name}}</a></td>
                <td>
                    @if($post_purchase->post_installement_id)
                    <span class="badge badge-success">Yes</span>
                    @else 
                    <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td>{{@$post_purchase->payments->sum('amount')}}</td>
                <td>
                    @if($post_purchase->pendingAmount() > 0)
                    {{@$post_purchase->pendingAmount()}}
                    @endif
                </td>
                <td>{{@$post_purchase->created_at}}</td>
                <td>
                    <a href="{{route('user.post_payment.show',$post_purchase->id)}}" class="btn btn-info">
                        View Payments
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
@endsection