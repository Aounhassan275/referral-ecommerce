@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PRODUCT | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Product Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Product Name</th>
                        <th style="width:auto;">Product Price</th>
                        <th style="width:auto;">Product Category</th>
                        <th style="width:auto;">Product Brand</th>
                        <th style="width:auto;">Product Orders</th>
                        <th style="width:auto;">Product Owner</th>
                        <th style="width:auto;">Total Stock</th>
                        <th style="width:auto;">Show On Home</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Product::all() as $key => $product)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{App\Models\Setting::currency()}} {{$product->price}}</td>
                        <td>{{@$product->category->name}}</td>
                        <td>{{@$product->brand->name}}</td>
                        <td class="text-center">
                            <a href="{{route('admin.product.order',$product->id)}}">
                                {{@$product->orders->count()}}
                            </a>
                        </td>
                        <td>
                            @if(@$product->user)
                                <a href="{{route('admin.user.detail',$product->user->id)}}">
                                    {{$product->user->name}}
                                </a>
                                @if ($product->user->checkstatus() == true)
                                    <span class="badge badge-success">Active</span>      
                                @else
                                    <span class="badge badge-danger">Pending</span>                                                      
                                @endif
                            @else 
                                Admin
                            @endif
                        </td>
                        <td>{{$product->stock}}</td>
                        <td class="table-action">
                            @if($product->show_on_home)
                            <a href="{{route('admin.product.hide_on_home',$product->id)}}" class="btn btn-success" style="color:white;">Yes</a>
                            @else
                            <a href="{{route('admin.product.show_on_home',$product->id)}}" class="btn btn-danger"  style="color:white;">No</a>
                            @endif                        
                        </td>
                        <td class="table-action">
                            <a href="{{route('admin.product.edit',$product->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.product.destroy',$product->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
                            </form>
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
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            // responsive: true,
            // lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection