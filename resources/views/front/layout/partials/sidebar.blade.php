<aside class="col-sm-3 page-sidebar sidebar-offcanvas" id="faceted-search-container">
    <nav>
       <span id="close-sidebar" class=" fa fa-times" ></span>
       <!-- BEGIN Side All Categories -->
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> All Categories</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                 @foreach(App\Models\Category::take(10)->get() as $category)
                <li class="navList-item">
                   <a class="navList-action" href="{{route('category.show',str_replace(' ', '_',$category->name))}}" alt="{{$category->name}}" title="{{$category->name}}">{{$category->name}}</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('category.index')}}" alt="All Categories" title="All Categories">All Categories</a>
                </li>
             </ul>
          </div>
       </div>
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> All Brands</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                 @foreach(App\Models\Brand::take(10)->get() as $brand)
                 <li class="navList-item">
                   <a class="navList-action" href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}" alt="{{$brand->name}}" title="{{$brand->name}}">{{$brand->name}}</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('brand.index')}}" alt="All Brands" title="All Brands">All Brands</a>
                </li>
             </ul>
          </div>
       </div>
    </nav>
</aside>