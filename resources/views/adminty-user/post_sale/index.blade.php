@extends('adminty-user.layout.index')
@section('title')
VIEW Own Sale 
@endsection
@section('contents')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Own Sale</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Amount</th>
                <th>Detail</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($sales as $key => $sale)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{@$sale->user->name}}</td>
                    <td>{{$sale->receiver->name}}</td>
                    <td>{{$sale->amount}}</td>
                    <td>{{$sale->detail}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection