<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a href="#">
                        @if($user->image)
                        <img src="{{asset($user->image)}}" class="rounded-circle" width="42" height="42" alt="">
                        @else
                            <img src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                        @endif
                    </a>
                </div>

                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$user->id}}')" > 
                        <h6 class="mb-0">{{$user->name}}</h6>
                    </a>
                    <span class="text-muted">{{$user->cash_wallet}}</span>
                </div>

                {{-- <div class="ml-3 align-self-center">
                    <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    @if($left)
    <div class="col-md-3"></div>
    <div class="col-md-3">
        
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a href="#">
                        @if($left->image)
                        <img src="{{asset($left->image)}}" class="rounded-circle" width="42" height="42" alt="">
                        @else
                            <img src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                        @endif
                    </a>
                </div>

                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$left->id}}')" > 
                        <h6 class="mb-0">{{$left->name}}</h6>
                    </a>
                    <span class="text-muted">{{$left->cash_wallet}}</span>
                </div>

                {{-- <div class="ml-3 align-self-center">
                    <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @endif
    @if($right)
    <div class="col-md-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3">
                    <a href="#">
                        @if($right->image)
                        <img src="{{asset($right->image)}}" class="rounded-circle" width="42" height="42" alt="">
                        @else
                            <img src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
                        @endif
                    </a>
                </div>

                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$right->id}}')" > 
                        <h6 class="mb-0">{{$right->name}}</h6>
                    </a>
                    <span class="text-muted">{{$right->cash_wallet}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
    @endif
</div>
<div class="row">
    @if($left)
    <div class="col-md-3">
        @if($left->left_refferral)
        
        <div class="card card-body">
            <div class="media">

                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$left->left_refferral}}')" > 
                        <h6 class="mb-0">{{@$left->refer_by_name(@$left->left_refferral)}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-3">
        @if($left->right_refferral) 
        <div class="card card-body">
            <div class="media">

                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$left->right_refferral}}')" > 
                        <h6 class="mb-0">{{@$left->refer_by_name(@$left->right_refferral)}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
    @if($right)
    <div class="col-md-3">
        @if($right->left_refferral)
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$right->left_refferral}}')" > 
                        <h6 class="mb-0">{{@$left->refer_by_name(@$right->left_refferral)}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-3">
        @if($right->right_refferral)
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <a href="javascript::void()" onclick="getTree('{{@$right->right_refferral}}')" > 
                        <h6 class="mb-0">{{@$left->refer_by_name(@$right->right_refferral)}}</h6>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
</div>