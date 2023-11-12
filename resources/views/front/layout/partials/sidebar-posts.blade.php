<aside class="col-sm-3 page-sidebar sidebar-offcanvas" id="faceted-search-container">
    <nav>
       <span id="close-sidebar" class=" fa fa-times" ></span>
       <!-- BEGIN Side All Categories -->
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> All Categories</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                 @foreach(App\Models\PostCategory::take(10)->get() as $post_category)
                <li class="navList-item">
                   <a class="navList-action" href="{{route('post.category.show',str_replace(' ', '_',$post_category->name))}}" alt="{{$post_category->name}}" title="{{$post_category->name}}">{{$post_category->name}}</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('post.category.index')}}" alt="All Categories" title="All Categories">All Categories</a>
                </li>
             </ul>
          </div>
       </div>
       <div class="module  sidebar--categories" >
          <h5 class="block-title"><i class="fa fa-diamond"></i> All Brands</h5>
          <div class="block-content clearfix">
             <ul class="navList">
                 @foreach(App\Models\PostBrand::take(10)->get() as $post_brand)
                 <li class="navList-item">
                   <a class="navList-action" href="{{route('post.brand.show',str_replace(' ', '_',$post_brand->name))}}" alt="{{$post_brand->name}}" title="{{$post_brand->name}}">{{$post_brand->name}}</a>
                </li>
                @endforeach
                <li class="navList-item">
                   <a class="navList-action is-current" href="{{route('post.brand.index')}}" alt="All Brands" title="All Brands">All Brands</a>
                </li>
             </ul>
          </div>
       </div>
    </nav>
</aside>