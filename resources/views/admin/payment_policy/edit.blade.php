@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Update {{$paymentPolicy->type}} Information | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update {{$paymentPolicy->type}} Information</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.payment_policy.update',$paymentPolicy->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                     <div class="form-group col-3">
                         <label class="form-label">Payment Type</label>
                         <select name="type" id="type" class="form-control select2" required>
                             <option selected disabled>Select</option>
                             <option {{$paymentPolicy->type == 'Balance Transfer' ? 'selected' : ''}} value="Balance Transfer">Balance Transfer</option>
                             <option {{$paymentPolicy->type == 'Withdraw' ? 'selected' : ''}} value="Withdraw">Withdraw</option>
                             <option {{$paymentPolicy->type == 'Post Sale' ? 'selected' : ''}} value="Post Sale">Post Sale</option>
                             <option {{$paymentPolicy->type == 'Stock Purchase' ? 'selected' : ''}} value="Stock Purchase">Stock Purchase</option>
                         </select>                        
                     </div>
                         <div class="form-group col-3">
                             <label class="form-label">Sender Twenty Team Level</label>
                             <input type="text" value="{{$paymentPolicy->sender_twenty_team_level}}" name="sender_twenty_team_level" class="form-control" placeholder="Sender Twenty Team Level">
                         </div>
                         <div class="form-group col-3">
                             <label class="form-label">Receiver Twenty Team Level</label>
                             <input type="text" value="{{$paymentPolicy->receiver_twenty_team_level}}" name="receiver_twenty_team_level" class="form-control" required placeholder="Receiver Twenty Team Level">
                         </div>
                         <div class="form-group col-3">
                             <label class="form-label">Company Trade Income</label>
                             <input type="text" value="{{$paymentPolicy->company_trade_income}}" name="company_trade_income" class="form-control" required placeholder="Company Trade Income">
                         </div>
                         <div class="form-group col-3">
                             <label class="form-label">Company Products</label>
                             <input type="text" value="{{$paymentPolicy->company_products}}" name="company_products" class="form-control" required placeholder="Company Products">
                         </div>
                         <div class="form-group col-3">
                             <label class="form-label">Purchase Reward</label>
                             <input type="text" value="{{$paymentPolicy->purchase_reward}}" name="purchase_reward" class="form-control" required placeholder="Purchase Reward">
                         </div>
                         <div class="form-group col-3">
                             <label class="form-label">Draw Monthly</label>
                             <input type="text" value="{{$paymentPolicy->draw_monthly}}" name="draw_monthly" class="form-control" required placeholder="Draw Monthly">
                         </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
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
                    placeholder: "Select Category",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
@endsection