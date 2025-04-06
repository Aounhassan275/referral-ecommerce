@extends('adminty-user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Loans</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    @if(Auth::user()->isLoanAllowed())
    <div class="row" style="margin-top:10px">
        <div class="col-md-12">
            <button data-toggle="modal" data-target="#create-loan-modal"
                class="btn btn-primary float-right">Get Loan</button>
            
        </div>
    </div>
    @endif
    <div class="table-responsive" style="margin-top:10px">
        <table class="table  datatable-basic datatable-row-basic">
            <thead>
                <tr>
                    <th >Sr#</th>
                    <th >Amount</th>
                    <th >Issue Date</th>
                    <th >Due Date</th>
                    <th >Status</th>
                    <th >Action</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($loans as $key => $loan)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>PKR {{$loan->amount}}</td>
                    <td>{{\Carbon\Carbon::parse($loan->created_at)->format('d M,Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($loan->return_date)->format('d M,Y')}}</td>
                    <td>
                        @if($loan->status)
                            <span class="badge badge-success">Paid</span>
                        @else 
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if(!$loan->status)
                            <a href="{{route('user.loan.pay',$loan->id)}}" class="btn btn-success">Pay Loan</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('adminty-user.loan.partials.loan-modal')
@endsection
@section('scripts')
@endsection