
@extends('adminty-user.layout.index')
@section('title')
SUPER POOL
@endsection
@section('styles')
@include('user.super_pool.partials.tree_css')
<style>
    @media only screen and (max-width: 768px) {
        .desktop-content {
            display: none;
        }
    }

/* Hide mobile content on desktop */
@media only screen and (min-width: 769px) {
    .mobile-content {
        display: none;
    }
}
</style>
@endsection
@section('contents')
            <div id="user-tree"></div>
@endsection
@section('scripts')
<script>
    var user_id = 1;
    getTree(user_id);
    function getTree(user_id)
    {  
        var super_pool_id = "{{$super_pool->id}}";
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
@endsection