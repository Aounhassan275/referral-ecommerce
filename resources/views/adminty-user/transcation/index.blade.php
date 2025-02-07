@extends('adminty-user.layout.index')
@section('title')
VIEW TRANSCATIONS 
@endsection
@section('contents')

<div class="card">
    <div class="card-header table-card-header">
        <h5>View Transcations History</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
    
            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sender Name</th>
                        <th>Receiver Name</th>
                        <th>Amount</th>
                        <th>Detail</th>
                        <th></th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($transcations as $key => $transcation)
                        <tr>
                            <td>{{$key+1}}</td>
                            @if($transcation->sender)
                            <td>{{$transcation->sender->name}}</td>
                            @else 
                            <td>Admin</td>
                            @endif
                            <td>{{$transcation->receiver->name}}</td>
                            <td>{{$transcation->amount}}</td>
                            <td>{{$transcation->detail}}</td>
                            <td></td>
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