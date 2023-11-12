<aside class="col-sm-3 page-sidebar sidebar-offcanvas" id="faceted-search-container">
    <nav>
       <span id="close-sidebar" class=" fa fa-times" ></span>
       <!-- BEGIN Side All Categories -->
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> Services</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                @foreach(App\Models\Service::take(10)->get() as $service)
                <li class="navList-item">
                   <a class="navList-action" href="{{route('services.show',str_replace(' ', '_',$service->name))}}" alt="{{$service->name}}" title="{{$service->name}}">{{$service->name}}</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('services.index')}}" alt="All Services" title="All Services">All Services</a>
                </li>
             </ul>
          </div>
       </div>
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> Service Types</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                @foreach(App\Models\Type::take(10)->get() as $type)
                <li class="navList-item">
                   <a class="navList-action" href="{{route('service_types.show',str_replace(' ', '_',$type->name))}}" alt="{{$type->name}}" title="{{$type->name}}">{{$type->name}} ({{$type->users->count()}})</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('service_types.index')}}" alt="All Service Types" title="All Service Types">All Service Types</a>
                </li>
             </ul>
          </div>
       </div>
    </nav>
</aside>