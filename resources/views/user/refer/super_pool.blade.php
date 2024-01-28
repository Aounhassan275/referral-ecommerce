@extends('user.layout.index')
@section('title')
    Super Pool
@endsection
@section('contents')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($user->image)}}" width="170" height="170" alt="">
                </div>
                <a href="{{route('user.super_pool.show').'?user_id='.$user->id}}">
                    <h6 class="font-weight-semibold mb-0">{{$user->name}}</h6>
                </a>
                <span class="d-block text-muted">$ {{$user->balance}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$user->whatsapp}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$user->twitter}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$user->facebook}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$user->instagram}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$user->linkedin}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$user->youtube}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-6">  
        @if($users && count($users) >= 1 && $user->for_pool >=6)
        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($users[0]['image'])}}" width="170" height="170" alt="">
                </div>
                <a href="{{route('user.super_pool.show').'?user_id='.$users[0]['id']}}">
                    <h6 class="font-weight-semibold mb-0">{{$users[0]['name']}}</h6>
                </a>
                <span class="d-block text-muted">$ {{$users[0]['balance']}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$users[0]['whatsapp']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$users[0]['twitter']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$users[0]['facebook']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$users[0]['instagram']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$users[0]['linkedin']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$users[0]['youtube']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
        @endif
        @if($users && count($users) >= 3  && $user->for_pool >=18)
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <div class="media">
        
                        <div class="media-body text-center">
                            <a href="{{route('user.super_pool.show').'?user_id='.$users[2]['id']}}">
                                <h6 class="mb-0">{{$users[2]['name']}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($users &&  count($users) >= 4  && $user->for_pool >=24)
            <div class="col-md-6">
                <div class="card card-body">
                    <div class="media">
        
                        <div class="media-body text-center">
                            <a href="{{route('user.super_pool.show').'?user_id='.$users[3]['id']}}">
                                <h6 class="mb-0">{{$users[3]['name']}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
    <div class="col-md-6">     
        @if($users && count($users) >= 2 && $user->for_pool >=12)
        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($users[1]['image'])}}" width="170" height="170" alt="">
                </div>
                <a href="{{route('user.super_pool.show').'?user_id='.$users[1]['id']}}">
                    <h6 class="font-weight-semibold mb-0">{{$users[1]['name']}}</h6>
                </a>
                <span class="d-block text-muted">$ {{$users[1]['balance']}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$users[1]['whatsapp']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$users[1]['twitter']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$users[1]['facebook']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$users[1]['instagram']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$users[1]['linkedin']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$users[1]['youtube']}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
        @endif
        @if($users && count($users) >= 5  && $user->for_pool >=30)
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <div class="media">
        
                        <div class="media-body text-center">
                            <a href="{{route('user.super_pool.show').'?user_id='.$users[4]['id']}}">
                                <h6 class="mb-0">{{$users[4]['name']}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($users && count($users) >= 6 && $user->for_pool >=36)
            <div class="col-md-6">
                <div class="card card-body">
                    <div class="media">
        
                        <div class="media-body text-center">
                            <a href="{{route('user.super_pool.show').'?user_id='.$users[5]['id']}}">
                                <h6 class="mb-0">{{$users[5]['name']}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@endsection