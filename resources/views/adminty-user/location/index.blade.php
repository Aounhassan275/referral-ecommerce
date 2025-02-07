@extends('adminty-user.layout.index')
@section('title')
    Location
@endsection
@section('contents')
<!-- Basic tabs -->
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a href="#basic-tab1" class="nav-link active" data-toggle="tab">Requested Location</a></li>
                    <li class="nav-item"><a href="#basic-tab2" class="nav-link" data-toggle="tab">Your Location Request</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="basic-tab1">
                        <table class="table  datatable-basic datatable-row-basic">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Sender Image</th>
                                    <th>Sender Name</th>
                                    <th>Location</th>
                                    <th>Requested At</th>
                                    <th>Responded At</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->otherLocationRequest() as $key => $location)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset($location->sender->image)}}" style="width:100px;height:auto;"></td>
                                    <td>{{$location->sender->name}}</td>
                                    <td>   
                                        @if($location->lat)
                                        <a href="https://www.google.com.sa/maps/search/{{@$location->lat}},{{@$location->long}}?hl=en"> <span class="btn btn-success"><i class="icon-location3"></i></span></a>
                                        @endif
                                    </td>
                                    <td>{{App\Helpers\Helper::to_date(@$location->created_at,1)}}</td>
                                    <td>{{App\Helpers\Helper::to_date(@$location->responsed_at,1)}}</td>
                                    <td>
                                        <a style="color:white;" onclick="update_location('{{ @$location->id }}')" class="btn btn-info">Give Location</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="basic-tab2">
                        <table class="table  datatable-basic datatable-row-basic">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Receiver Image</th>
                                    <th>Receiver Name</th>
                                    <th>Location</th>
                                    <th>Requested At</th>
                                    <th>Responded At</th>
                                    <th>Action</th>
                                </tr> 
                            </thead>
                            <tbody>
                                @foreach (Auth::user()->ownLocationRequest() as $key => $location)
                                <tr> 
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset($location->receiver->image)}}" style="width:100px;height:auto;"></td>
                                    <td>{{$location->receiver->name}}</td>
                                    <td>   
                                        <a href="https://www.google.com.sa/maps/search/{{@$location->lat}},{{@$location->long}}?hl=en"> <span class="btn btn-success"><i class="icon-location3"></i></span></a>
                                    </td>
                                    <td>{{App\Helpers\Helper::to_date(@$location->created_at,1)}}</td>
                                    <td>{{App\Helpers\Helper::to_date(@$location->responsed_at,1)}}</td>
                                    <td>
                                        <form action="{{route('user.location.destroy',$location->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn"><i class="icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /basic tabs -->
<input type="hidden" id="location_id">
@endsection
@section('scripts')

<script>
    
    function update_location(location_id) {
        $('#location_id').val(location_id);
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    function showPosition(position) {
        location_id = $('#location_id').val();
        $.ajax({
            url :  'location_update',
            type : 'get',
            data : {
                lat : position.coords.latitude,
                long : position.coords.longitude,
                location_id : location_id,
            },
            success : function(response){
                location.reload();
            }
        });        
    }
</script>
@endsection