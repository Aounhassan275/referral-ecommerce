@extends('adminty-user.layout.index')
@section('title')
  WITHDRAW HISTORY  
@endsection
@section('contents')

<div class="card">
    <div class="card-header table-card-header">
        <h5>View Withdraw History</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
    
            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Balance</th>
                        <th>Amount Withdraw</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach (Auth::user()->withdraws as $key => $withdraw)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$withdraw->user->name}}</td>
                        <td>{{$withdraw->user->email}}</td>
                        <td>{{$withdraw->user->balance}}</td>
                        <td>{{$withdraw->payment}}</td>
                        <td>{{$withdraw->name}}</td>
                        <td>{{$withdraw->account}}</td>
                        <td>{{$withdraw->method}}</td>
                        <td> @if($withdraw->status=="Completed")
                            <span class="badge badge-success">{{$withdraw->status}}</span>
                            @elseif($withdraw->status=="in process")
                            <span class="badge badge-danger">{{$withdraw->status}}</span>
                            @else
                            <span class="badge badge-primary">{{$withdraw->status}}</span>
                            @endif
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
@endsection