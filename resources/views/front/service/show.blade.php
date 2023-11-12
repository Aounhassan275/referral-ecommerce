@extends('front.layout.service_index')
@section('meta')
    
<title>{{$user->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<div class="col-sm-9 padding-right">
    
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{asset($user->image)}}" alt="" />
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>{{$user->name}}                                
                    <a href="{{route('user.chat.user',$user->id)}}" class="btn btn-success">Chat</a>

                </h2>
                @if($user->address)
                <div style="margin-top:5px;">
                    <a href="https://www.google.com.sa/maps/search/{{@$user->address}}?hl=en" target="_blank">
                        <img src="{{asset('map.jpeg')}}" alt="">
                    </a>
                </div>
                @endif
                @if($user->description)
                <p style="margin-top:5px;">{!! @$user->description !!}</p>
                @endif
                @if($user->phone)
                <p><b>Phone :</b> {{@$user->phone}}</p>
                @endif
                @if($user->country)
                <p><b>Country :</b> {{@$user->country->name}}</p>
                @endif
                @if($user->city)
                <p><b>City :</b> {{@$user->city->name}}</p>
                @endif
                @if($user->address)
                <p><b>Address :</b> {{@$user->address}}</p>
                @endif
                @if($user->service)
                <p><b>Service :</b> {{@$user->service->name}}</p>
                @endif
                @if($user->serviceType)
                <p><b>Service Type :</b> {{@$user->serviceType->name}}</p>
                @endif
                @if($user->martial_status)
                <p><b>Martial Status :</b> {{@$user->martial_status}}</p>
                @endif
                @if($user->religion)
                <p><b>Religion :</b> {{@$user->religion}}</p>
                @endif
                @if($user->blood_group)
                <p><b>Blood Group :</b> {{@$user->blood_group}}</p>
                @endif
                @if($user->education)
                <p><b>Education :</b> {{@$user->education}}</p>
                @endif
                @if($user->profession)
                <p><b>Profession :</b> {{@$user->profession}}</p>
                @endif
                <p><b>Views :</b> {{@$user->view}}</p>
                <div class="col-sm-12">
                    <div class="social-icons">
                        <ul class="nav navbar-nav">
                            @if($user->facebook)
                            <li><a href="{{@$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($user->twitter)
                            <li><a href="{{@$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($user->linkedin)
                            <li><a href="{{@$user->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($user->youtube)
                            <li><a href="{{@$user->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($user->instagram)
                            <li><a href="{{@$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="social-icons">
                        <ul class="nav navbar-nav">
                            @if($user->whatsapp)
                            <li><a href="https://api.whatsapp.com/send?phone={{$user->whatsapp}}" target="_blank"><img src="{{asset('whatsapp.png')}}" width="30" height="30"></a></li>
                            @endif
                            @if($user->tiktok)
                            <li><a href="{{@$user->tiktok}}" target="_blank"><img src="{{asset('tiktok.png')}}" width="30" height="30"></a></li>
                            @endif
                            @if($user->snack_video)
                            <li><a href="{{@$user->snack_video}}" target="_blank"><img src="{{asset('snack_video.png')}}" width="30" height="30"></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if($user->checkstatus() == true)
                <div class="col-sm-12" style="margin-top:5px;">
                    <input type="text" class="form-control" id="link_area"  value="{{url('user/register',$user->code)}}"  readonly>
                </div>
                <div class="col-sm-12" style="margin-top:5px;">
                    <div class="col-sm-6">
                        <button type="button" class="copy-button btn btn-dark  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Refferral Link</button>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{url('user/register',$user->code)}}" target="_blank"><button type="button" class="btn btn-dark btn-sm">Visit Refferral Page</button> </a>
                    </div>
                </div>
                @endif
            </div><!--/product-information-->
            
        </div>
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{$user->name}} Products</h2>
            @foreach($user->products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset(@$product->images->first()->image)}}" alt="" />
                                <h2>$ {{@$product->price}}</h2>
                                <p>{!! substr( $product->name, 0, 30) !!}</p>
                                <a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$ {{@$product->price}}</h2>
                                    <p>{!! substr( $product->name, 0, 30) !!}</p>
                                    <a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div><!--features_items-->
    </div><!--/product-details-->
</div>
@endsection
@section('scripts')
@endsection