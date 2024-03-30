@extends('user.layout.index')
@section('title')
SUPER POOL
@endsection
@section('contents')
<div id="user-tree"></div>
<form >
    <input type="hidden" id="super_pool_id" name="super_pool_id">
</form>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Super Pool</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>
                    Level
                </th>
                <th>
                    Total Accounts
                </th>
                <th>
                    Your Accounts
                </th>
                <th>
                    Next Pool
                </th>
                <th>
                    Next Pool Income
                </th>
                <th>
                    Re-birth
                </th>
                <th>
                    Show Tree
                </th>
            </tr> 
        </thead>
        <tbody>
            @foreach($super_pools as $key => $super_pool)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$super_pool['name']}}</td>
                    <td>{{App\Models\User::where('super_pool_'.$super_pool['id'],1)->count()}}</td>
                    <td>
                        {{App\Models\SuperPoolTree::where('user_id',Auth::user()->id)->where('super_pool_id',$super_pool['id'])->count()}} + {{App\Models\User::where('rebirth_id',Auth::user()->id)->count()}}
                    </td>
                    <td>{{array_key_exists($key+1,$super_pools) ? $super_pools[$key+1]['price'] : ''}}</td>
                    <td>
                        {{App\Models\SuperPoolTree::where('user_id',Auth::user()->id)->where('super_pool_id',$super_pool['id'])->sum('next_pool_income')}}
                    </td>
                    <td>
                        {{App\Models\SuperPoolTree::where('user_id',Auth::user()->id)->where('super_pool_id',$super_pool['id'])->sum('rebirth')}}
                        {{-- @if($super_pool['id'] == 1)
                            <span class="badge badge-success">{{App\Models\User::where('rebirth_id',Auth::user()->id)->count()}}</span>
                        @endif --}}
                    </td>
                    <td>
                        <a href="javascript::void()" onclick="getSuperPool('{{@$super_pool['id']}}')" class="btn btn-success btn-sm">Go</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
<script>
    var user_id = 1;
    function getSuperPool(super_pool_id)
    {  
        $("#super_pool_id").val(super_pool_id);
        getTree(1);
    }
    function getTree(user_id)
    {  
        var super_pool_id = $("#super_pool_id").val();
        $.ajax({
            url: "{{route('user.super_pool.get_tree')}}",
            method: 'post',
            data: {
                id: user_id,
                super_pool_id: super_pool_id,
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response){
                $('#user-tree').html(response.html)
            }
        });
    }
</script>
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection