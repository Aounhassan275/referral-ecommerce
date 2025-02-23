@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>ADD PAYMENT POLICY | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Payment Policy</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.payment_policy.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                    <div class="form-group col-3">
                        <label class="form-label">Payment Type</label>
                        <select name="type" id="type" class="form-control select2" required>
                            <option selected disabled>Select</option>
                            <option value="Balance Transfer">Balance Transfer</option>
                            <option value="Withdraw">Withdraw</option>
                        </select>                        
                    </div>
                        <div class="form-group col-3">
                            <label class="form-label">Sender Twenty Team Level</label>
                            <input type="text" name="sender_twenty_team_level" class="form-control" placeholder="Sender Twenty Team Level">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Receiver Twenty Team Level</label>
                            <input type="text" name="receiver_twenty_team_level" class="form-control" required placeholder="Receiver Twenty Team Level">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Trade Income</label>
                            <input type="text" name="company_trade_income" class="form-control" required placeholder="Company Trade Income">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Company Products</label>
                            <input type="text" name="company_products" class="form-control" required placeholder="Company Products">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Purchase Reward</label>
                            <input type="text" name="purchase_reward" class="form-control" required placeholder="Purchase Reward">
                        </div>
                        <div class="form-group col-3">
                            <label class="form-label">Draw Monthly</label>
                            <input type="text" name="draw_monthly" class="form-control" required placeholder="Draw Monthly">
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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