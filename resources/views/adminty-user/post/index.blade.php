@extends('adminty-user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Posts</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table  datatable-basic datatable-row-basic">
            <thead>
                <tr>
                    <th >Sr#</th>
                    <th >Post Name</th>
                    <th >Post Price</th>
                    <th >Post Category</th>
                    <th >Post Brand</th>
                    <th >Post Country</th>
                    <th >Post City</th>
                    <th >Installements</th>
                    <th >Sales</th>
                    <th >Action</th>
                    <th >Action</th>
                </tr> 
            </thead>
            <tbody>
                @foreach (Auth::user()->posts as $key => $post)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->price}}</td>
                    <td>{{@$post->category->name}}</td>
                    <td>{{@$post->brand->name}}</td>
                    <td>{{@$post->country->name}}</td>
                    <td>{{@$post->city->name}}</td>
                    <td class="text-center">
                        @if($post->is_installment_allowed)
                            <a href="{{route('user.post.installement',$post->id)}}"><i class="icon-eye"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('user.post.show',$post->id)}}">
                            {{$post->purchases->count()}}
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{route('user.post.edit',$post->id)}}"><i class="icon-pencil7"></i></a>
                    </td>
                    <td class="text-center">
                        <form action="{{route('user.post.destroy',$post->id)}}" method="POST">
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
@endsection
@section('scripts')
@endsection