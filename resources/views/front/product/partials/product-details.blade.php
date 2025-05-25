<section class="bg-light">
    <div class="container pb-5">
        <div class="section-header text-center" >
        <h2>Our Products </h2>
        <p>Check Our <span>Single Product</span></p>
        </div>
        <div class="row">
            
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{asset($singleProduct->images->first()->image)}}" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach($singleProduct->images->take(3) as $productImage)
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset($productImage->image)}}" alt="Product Image 1">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            @if(count($singleProduct->images->skip(3)->take(3)) > 0)
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach($singleProduct->images->skip(3)->take(3) as $nextProductImage)
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset($nextProductImage->image)}}" alt="Product Image 4">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <!--/.Second slide-->

                            <!--Third slide-->
                            @if(count($singleProduct->images->skip(6)->take(3)) > 0)
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach($singleProduct->images->skip(6)->take(3) as $nextProductImage)
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset($nextProductImage->image)}}" alt="Product Image 7">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('product.show',$singleProduct->uuid)}}" target="_blank">
                            <h1 class="h2">{{$singleProduct->name}}</h1>
                        </a>
                        <p class="h3 py-2">{{App\Models\Setting::currency()}} {{$singleProduct->price}}</p>
                        <!-- table start -->
                        <table>
                            <tr>
                            <td>Category:</td>
                            <th scope="row">{{@$singleProduct->category->name}}</th>
                            </tr>
                            <tr>
                            <td>Brand:</td>
                            <th scope="row">{{@$singleProduct->brand->name}}</th>
                            </tr>
                            <tr>
                            <td>Country:</td>
                            <th scope="row">{{@$singleProduct->country->name}}</th>
                            </tr>
                            <tr>
                            <td>City:</td>
                            <th scope="row">{{@$singleProduct->city->name}}</th>
                            </tr>
                            <tr>
                            <td>View:</td>
                            <th scope="row">{{@$singleProduct->view}}</th>
                            </tr>
                            <tr>
                            <td>Product of:</td>
                            <th scope="row">{{@$singleProduct->user->name}}</th>
                            </tr>
                            <tr>
                            <td>Stock:</td>
                            <th scope="row">{{@$singleProduct->stock}}</th>
                            </tr>
                            <tr>
                            <td>Address:</td>
                            <th scope="row">{{@$singleProduct->user->address}}</th>
                            </tr>
                            <tr>
                            <td>Phone:</td>
                            <th scope="row">{{@$singleProduct->user->phone}}</th>
                            </tr>
                            <tr>
                            <td>Like:</td>
                            <th scope="row">{{$singleProduct->like}}</th>
                            </tr>
                            <tr>
                            <td>dislike:</td>
                            <th scope="row">{{$singleProduct->dislike}}</th>
                            </tr>
                        
                        </table>
                        <p class="py-2">
                        </p>
                        <div class="section-header text-center" >
                            <h5>Description:</h5>
                        </div>
                        <p>{!! $singleProduct->description !!}</p>
                                                    
                        <div class="row pb-3">
                            <div class="col d-grid">
                                <form action="{{route('product.like',$singleProduct->id)}}" method="GET">
                                @csrf
                                <button class="btn btn-success" >Like ({{$singleProduct->like}})</button>
                                </form>
                            </div>
                            <div class="col d-grid">

                                <form action="{{route('product.dislike',$singleProduct->id)}}" method="GET">
                                @csrf
                                <button class="btn btn-danger" >Disike ({{$singleProduct->dislike}})</button>
                                </form>                              
                            </div>
                        </div>
                        <div class="row pb-3">
                            @if($singleProduct->stock > 0 && App\Models\Setting::enablepurchase() == 1)
                            <div class="col d-grid">
                                <a href="{{route('user.product.order',$singleProduct->id)}}" class="btn btn-success btn-lg" name="submit" value="buy">Buy</a>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>