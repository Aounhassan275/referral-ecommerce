
<div class="brands_products"><!--brands_products-->
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($brands as $brand)
            <li><a target="_blank" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}"><span class="pull-right">({{$brand->products->count()}})</span>{{@$brand->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>