@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW POST | {{App\Models\Setting::siteName()}}</h3>
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
                        <th style="width:auto;">Post Name</th>
                        <th style="width:auto;">Post Category</th>
                        <th style="width:auto;">Post Brand</th>
                        <th style="width:auto;">Post Country</th>
                        <th style="width:auto;">Post City</th>
                        <th style="width:auto;">Post Owner</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Post::all() as $key => $post)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{@$post->category->name}}</td>
                        <td>{{@$post->brand->name}}</td>
                        <td>{{@$post->country->name}}</td>
                        <td>{{@$post->city->name}}</td>
                        <td>
                            @if(@$post->user)
                                <a href="{{route('admin.user.detail',$post->user->id)}}">
                                    {{$post->user->name}}
                                </a>
                                @if ($post->user->checkstatus() == true)
                                    <span class="badge badge-success">Active</span>      
                                @else
                                    <span class="badge badge-danger">Pending</span>                                                      
                                @endif
                            @else 
                                Admin
                            @endif
                        </td>
                        <td class="table-action">
                            <a href="{{route('admin.post.edit',$post->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            <form action="{{route('admin.post.destroy',$post->id)}}" method="POST">
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