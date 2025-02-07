@extends('adminty-user.layout.index')
@section('title')
Sale
@endsection
@section('styles')

@endsection
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="alert bg-info text-white alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Alert! </span> If cash wallet amount is less than amount to charge then cash wallet will be in minus.
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">Post Purchase</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form id="transcationsForm" action="{{route('user.post_purchase.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Amount</label>
                            <input type="number"    name="amount"  id="amount" class="form-control"  readonly required value="{{$post->price}}">                        
                            <input type="hidden"  name="user_id" id="user_id" class="form-control" value="{{Auth::user()->id}}">                        
                            <input type="hidden"  name="owner_id" id="owner_id" class="form-control" value="{{$post->user_id}}">                        
                            <input type="hidden"  name="post_id" id="post_id" class="form-control" value="{{$post->id}}">                        
                        </div>
                        @if($post->is_installment_allowed && $post->installements->count() > 0)
                        <div class="form-group col-md-4">
                            <label class="form-label">Installment Plans</label>
                            <select  name="post_installement_id" id="post_installement_id" class="form-control" >
                                <option value="">Select Installement Plan</option>
                                @foreach($post->installements as $installement)
                                <option monthly_amount="{{round($installement->monthly_amount,2)}}" value="{{$installement->id}}">{{$installement->duration}} Months ({{round($installement->monthly_amount,2)}})</option>
                                @endforeach
                            </select>
              
                        </div>    
                        @endif
                        <div class="form-group col-md-4">
                            <label class="form-label">Amount To Charge</label>
                            <input type="text" id="amount_charged" name="amount_charged" class="form-control" value="{{$post->price}}" readonly>                        
                        </div>
                    </div>
                    <div class="row float-right" >
                        <button type="submit" class="btn btn-primary">Purchase Now 
                            <i class="icon-plus22 ml-2"></i>
                        </button>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
@endsection
@section('scripts')
<script>
    
    $('#post_installement_id').on('change',function(){
        if($(this).val())
        {
            var monthlyAmount = $(this).find('option:selected').attr('monthly_amount');
            $('#amount_charged').val(monthlyAmount);
        }else{
            $('#amount_charged').val($("#amount").val());
        }
    });
</script>
@endsection