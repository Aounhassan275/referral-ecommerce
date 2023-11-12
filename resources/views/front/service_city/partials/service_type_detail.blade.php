<div class="brands_products"><!--brands_products-->
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($types as $services_type)
            <li><a target="_blank" href="{{route('service_types.show',str_replace(' ', '_',$services_type->name))}}"><span class="pull-right">({{$services_type->users->count()}})</span>{{@$services_type->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>