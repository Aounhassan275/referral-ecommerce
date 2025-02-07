@extends('adminty-user.layout.index')
@section('title')
VIEW PACKAGE HISTORY 
@endsection
@section('contents')

<div class="card">
    <div class="card-header table-card-header">
        <h5>View Package History</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
    
            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package Name</th>
                        <th>Package Price</th>
                        <th>Package Max</th>
                        <th>Package Min</th>
                        <th>Created At</th>
                        <th>Status</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach (Auth::user()->packagehistory as $key => $history)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$history->package->name}}</td>
                            <td>{{$history->package->price}}</td>
                            <td>{{$history->package->max_limit}}</td>
                            <td>{{$history->package->min_limit}}</td>
                            <td>{{$history->created_at->format('d M,Y')}}</td>
                            <td>
                                @if(Auth::user()->package->id == $history->package->id)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Expire</span>
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