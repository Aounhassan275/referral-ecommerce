
<div id="create-stock-modal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('user.stock.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" placeholder="Amount" value="{{Auth::user()->stockPendingForAdmin()}}" @if(Auth::user()->stockPendingForAdmin() > 0) readonly @endif class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock For</label><br>
                        @if(Auth::user()->stockPendingForAdmin() > 0)
                        <input type="radio" name="status" value="0" checked> For Admin
                        @else 
                        <input type="radio" name="status" value="1" checked > For Purchase
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>