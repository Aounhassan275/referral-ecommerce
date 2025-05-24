@extends('adminty-user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Appointment</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="table-responsive" style="margin-top:10px">
        <table class="table  datatable-basic datatable-row-basic">
            <thead>
                <tr>
                    <th >Sr#</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>
                    <th >Date</th>
                    <th >Department</th>
                    <th >Message</th>
                    <th >Action</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($appointments as $key => $appointment)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>{{$appointment->name}}</td>
                    <td>{{$appointment->email}}</td>
                    <td>{{$appointment->phone}}</td>
                    <td>{{\Carbon\Carbon::parse($appointment->date)->format('d M,Y')}}</td>
                    <td>{{@$appointment->department->title}}</td>
                    <td>{{@$appointment->message}}</td>
                    <td class="text-center">
                        <form action="{{route('user.appointment.destroy',$appointment->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>   
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
@section('scripts')
@endsection