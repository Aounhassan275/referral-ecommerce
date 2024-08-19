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
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (App\Models\PostPurchase::where('user_id',Auth::user()->id)->get() as $key => $post_purchase)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{$post_purchase->post->name}}</td>
                <td>{{App\Models\Setting::currency()}} {{$post_purchase->amount}}</td>
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
                    <a href="{{route('user.post_payment.show',$post_purchase->id)}}" class="btn btn-info btn-sm">
                        View Payments
                    </a>
                </td>
                <td>
                    @if($post_purchase->pendingAmount() > 0)
                    <button data-toggle="modal" data-target="#edit_modal"
                            post_id="{{$post_purchase->post_id}}"  
                            post_purchase_id="{{$post_purchase->id}}" amount="{{$post_purchase->payments->first()->amount}}" 
                           class="edit-btn btn btn-primary">Pay More Amount</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('user.post_payment.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Pay Second Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" id="post_id">
                        <input type="hidden" name="post_purchase_id" id="post_purchase_id">
                        <input type="text" readonly id="amount" name="amount" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Pay Amount</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let post_purchase_id = $(this).attr('post_purchase_id');
            let post_id = $(this).attr('post_id');
            let amount = $(this).attr('amount');
            $('#amount').val(amount);
            $('#post_purchase_id').val(post_purchase_id);
            $('#post_id').val(post_id);
        });
    });
</script>
@endsection