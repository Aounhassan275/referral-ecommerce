@extends('user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Orders</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-top">
            <li class="nav-item"><a href="#top-tab1" class="nav-link active" data-toggle="tab">Your Orders</a></li>
            <li class="nav-item"><a href="#top-tab2" class="nav-link" data-toggle="tab">Order Received</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="top-tab1">
                <table class="table  datatable-basic datatable-row-basic table-responsive">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>User Name</th>
                            <th>User Address</th>
                            <th>Payment Option</th>
                            <th>Product Owner</th>
                            <th>Delivery Status</th>
                            <th>Delivery Screenshot</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach (App\Models\Order::where('user_id',Auth::user()->id)->get() as $key => $order)
                        <tr> 
                            <td>{{$key+1}}</td>
                            <td>{{$order->product->name}}</td>
                            <td>{{App\Models\Setting::currency()}} {{$order->product->price}}</td>
                            <td><a href="{{route('product.user',$order->user_id)}}"> {{@$order->user->name}}</a></td>
                            <td>{{@$order->address}}</td>
                            <td>{{@$order->payment_option}}</td>
                            <td>
                                @if(@$order->owner->name == Auth::user()->id)
                                    Your Product
                                @else 
                                    @if($order->owner_id)
                                        <a href="{{route('product.user',$order->owner->id)}}">  {{@$order->owner->name}}</a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($order->status == "Pending")
                                    <span class="badge badge-danger">Pending</span>
                                @elseif($order->status == "Completed")
                                    <span class="badge badge-success">Completed</span>
                                @elseif($order->status == "Rejected")
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-warning">On Hold</span>
                                @endif
                            </td>
                            <td>
                                @if($order->image)
                                <a href="{{asset($order->image)}}" target="_blank"><i class="icon-eye"></i></a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(@$order->owner_id == Auth::user()->id && $order->status == "Pending")
                                    <a href="{{route('user.order.onHold',$order->id)}}" data-toggle="tooltip" data-placement="top" title="On Hold"><i class="icon-pencil7"></i></a>
                                @elseif($order->status == "onHold" && $order->image)
                                    <a href="{{route('user.order.completed',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Completed"><i class="icon-check"></i></a>
                                @elseif($order->status == 'Pending')
                                    <a href="{{route('user.order.rejected',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Rejected" style="color:red;"><i class="icon-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="top-tab2">
                <table class="table  datatable-basic datatable-row-basic table-responsive">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>User Name</th>
                            <th>User Address</th>
                            <th>Payment Type</th>
                            <th>Product Owner</th>
                            <th>Delivery Status</th>
                            <th>Delivery Screenshot</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach (App\Models\Order::where('owner_id',Auth::user()->id)->get() as $key => $order)
                        <tr> 
                            <td>{{$key+1}}</td>
                            <td>{{$order->product->name}}</td>
                            <td>{{App\Models\Setting::currency()}} {{$order->product->price}}</td>
                            <td><a href="{{route('product.user',$order->user_id)}}"> {{@$order->user->name}}</a></td>
                            <td>{{@$order->address}}</td>
                            <td>{{@$order->payment_option}}</td>
                            <td>
                                @if(@$order->owner->name == Auth::user()->id)
                                    Your Product
                                @else     
                                    @if($order->owner_id)
                                        <a href="{{route('product.user',$order->owner->id)}}">  {{@$order->owner->name}}</a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($order->status == "Pending")
                                    <span class="badge badge-danger">Pending</span>
                                @elseif($order->status == "Completed")
                                    <span class="badge badge-success">Completed</span>
                                @elseif($order->status == "Rejected")
                                    <span class="badge badge-danger">Rejected</span>
                                @else 
                                    <span class="badge badge-warning">On Hold</span>
                                @endif
                            </td>
                            <td>
                                @if($order->image)
                                <a href="{{asset($order->image)}}" target="_blank"><i class="icon-eye"></i></a>
                                @else
                                @if(@$order->owner_id == Auth::user()->id)
                                <button data-toggle="modal" data-target="#edit_modal"
                                       id="{{$order->id}}" class="edit-btn btn btn-primary">Upload</button>
                                @endif
                                @endif
                            </td>
                            <td class="text-center">
                                @if(@$order->owner_id == Auth::user()->id && $order->status == "Pending")
                                    <a href="{{route('user.order.onHold',$order->id)}}" data-toggle="tooltip" data-placement="top" title="On Hold"><i class="icon-pencil7"></i></a>
                                @elseif($order->status == "onHold")
                                    <a href="{{route('user.order.rejected',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Rejected" style="color:red;"><i class="icon-delete"></i></a>
                                    <a href="{{route('user.order.completed',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Completed"><i class="icon-check"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('user.order.update','')}}' +'/'+id);
        });
    });
</script>
@endsection