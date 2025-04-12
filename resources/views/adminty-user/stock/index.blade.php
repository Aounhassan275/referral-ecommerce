@extends('adminty-user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Stock</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-md-12">
            <button data-toggle="modal" data-target="#create-stock-modal"
                class="btn btn-primary float-right">Get Stock</button>
            
        </div>
    </div>
    <div class="table-responsive" style="margin-top:10px">
        <table class="table  datatable-basic datatable-row-basic">
            <thead>
                <tr>
                    <th >Sr#</th>
                    <th >Amount</th>
                    <th >Issue Date</th>
                    <th >Return Date</th>
                    <th >Status</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($stocks as $key => $stock)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>PKR {{$stock->amount}}</td>
                    <td>{{\Carbon\Carbon::parse($stock->created_at)->format('d M,Y')}}</td>
                    <td>{{$stock->return_date ? \Carbon\Carbon::parse($stock->return_date)->format('d M,Y') : ''}}</td>
                    <td>
                        @if($stock->status)
                            <span class="badge badge-success">For Purchase</span>
                        @else 
                            <span class="badge badge-info">For Admin</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('adminty-user.stock.partials.stock-modal')
@endsection
@section('scripts')
@endsection