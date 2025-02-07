@extends('adminty-user.layout.index')
@section('contents')

<div class="card">
    <div class="card-header table-card-header">
        <h5>View Your Products</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
    
            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Product Orders</th>
                        <th>Total Stocks</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach (Auth::user()->products as $key => $product)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{App\Models\Setting::currency()}} {{$product->price}}</td>
                        <td>{{@$product->category->name}}</td>
                        <td>{{@$product->brand->name}}</td>
                        <td><a href="{{route('user.order.index')}}">{{@$product->orders->count()}}</a></td>
                        <td>{{$product->stock}}</td>
                        <td class="text-center">
                            <a href="{{route('user.product.edit',$product->id)}}"><i class="icon-pencil7"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('user.product.destroy',$product->id)}}" method="POST">
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
@endsection
@section('scripts')
@endsection