
<div class="brands_products"><!--brands_products-->
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($users as $user)
            <li><a href="{{route('product.user',$user->id)}}"> <span class="pull-right">({{$user->products->count()}})</span>{{@$user->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>