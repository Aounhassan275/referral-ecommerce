@extends('user.layout.index')
@section('title')
SUPER POOL
@endsection
@section('contents')

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
                    Re-Birth
                </th>
                <th>
                    Pool Income
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
                        {{App\Models\SuperPoolTree::where('user_id',Auth::user()->id)->where('super_pool_id',$super_pool['id'])->count()}}
                    </td>
                    <td>{{array_key_exists($key+1,$super_pools) ? $super_pools[$key+1]['price'] : ''}}</td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="{{route('user.super_pool.detail',$super_pool['id'])}}" class="btn btn-success btn-sm">Go</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
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