<!DOCTYPE html>
<html lang="en">
  <head>
    <title>USER PANEL | {{App\Models\Setting::siteName()}}</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta
      name="keywords"
      content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app"
    />
    <meta name="author" content="#" />
    <!-- Favicon icon -->
    <link
      rel="icon"
      href="{{asset('adminty-assets/assets/images/favicon.png')}}"
      type="image/x-icon"
    />
    <!-- Google font-->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600"
      rel="stylesheet"
    />
    <!-- Required Fremwork -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('adminty-assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"
    />
    <!-- feather Awesome -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('adminty-assets/assets/icon/feather/css/feather.css')}}"
    />
    <!-- radial chart -->
    <link
      rel="stylesheet"
      href="{{asset('adminty-assets/assets/pages/chart/radial/css/radial.css')}}"
      type="text/css"
      media="all"
    />
    <link rel="stylesheet" type="text/css"
        href="{{asset('adminty-assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminty-assets/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('adminty-assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css')}}">
    <!-- Style.css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('adminty-assets/assets/css/style.css')}}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('adminty-assets/assets/css/jquery.mCustomScrollbar.css')}}"
    />
    @yield('styles')
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
      <div class="ball-scale">
        <div class="contain">
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header">
          <div class="navbar-wrapper">
            <div class="navbar-logo">
              <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
              </a>
              <a href="index.html">
                <img
                  class="img-fluid"
                  src="{{asset('adminty-assets/assets/images/logo.png')}}"
                  alt="Theme-Logo"
                />
              </a>
              <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
              </a>
            </div>

            <div class="navbar-container">
              <ul class="nav-left">
                <li class="header-search">
                  <div class="main-search morphsearch-search">
                    <div class="input-group">
                      <span class="input-group-addon search-close"
                        ><i class="feather icon-x"></i
                      ></span>
                      <input type="text" class="form-control" />
                      <span class="input-group-addon search-btn"
                        ><i class="feather icon-search"></i
                      ></span>
                    </div>
                  </div>
                </li>
                <li>
                  <a href="#!" onclick="javascript:toggleFullScreen()">
                    <i class="feather icon-maximize full-screen"></i>
                  </a>
                </li>
              </ul>
              <ul class="nav-right">
                <li class="header-notification">
                  <div class="dropdown-primary dropdown">
                    <div
                      class="displayChatbox dropdown-toggle"
                      data-toggle="dropdown"
                    >
                      <i class="feather icon-message-square"></i>
                      <span class="badge bg-c-green">
						@php  
							$chatMessages =  App\Helpers\Message::unreadMessages();
						@endphp
						{{$chatMessages->count()}}
						</span>
                    </div>
                  </div>
                </li>
                <li class="user-profile header-notification">
                  <div class="dropdown-primary dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown">
                      <img
                        src="{{asset(Auth::user()->image ? Auth::user()->image : 'adminty-assets/assets/images/avatar-4.jpg')}}"
                        class="img-radius"
                        alt="User-Profile-Image"
                      />
                      <span>{{Auth::user()->name}}</span>
                      <i class="feather icon-chevron-down"></i>
                    </div>
                    <ul
                      class="show-notification profile-notification dropdown-menu"
                      data-dropdown-in="fadeIn"
                      data-dropdown-out="fadeOut"
                    >
                      <li>
                        <a href="{{route('user.user.index')}}">
                          <i class="feather icon-settings"></i> Settings
                        </a>
                      </li>
                      <li>
                        <a href="{{route('user.user.index')}}">
                          <i class="feather icon-user"></i> Profile
                        </a>
                      </li>
                      <li>
                        <a href="{{route('product.user',Auth::user()->id)}}">
                          <i class="feather icon-user"></i> My web
                        </a>
                      </li>
                      <li>
                        <a href="{{route('user.chat.index')}}">
                          <i class="feather icon-mail"></i> My Messages
                        </a>
                      </li>
                      <li>
                        <a href="{{route('user.logout')}}">
                          <i class="feather icon-log-out"></i> Logout
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- Sidebar chat start -->
        <div id="sidebar" class="users p-chat-user showChat">
          <div class="had-container">
            <div class="card card_main p-fixed users-main">
              <div class="user-box">
                <div class="chat-inner-header">
                  <div class="back_chatBox">
                    <div class="right-icon-control">
                      <input
                        type="text"
                        class="form-control search-text"
                        placeholder="Search Friend"
                        id="search-friends"
                      />
                      <div class="form-icon">
                        <i class="icofont icofont-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="main-friend-list">
					@foreach($chatMessages as $message)
					<div
                    class="media userlist-box"
                    data-id="{{$message->id}}"
                    data-status="online"
                    data-username="{{$message->user->name}}"
                    data-toggle="tooltip"
                    data-placement="left"
                    title="{{$message->user->name}}"
                  >
                    <a class="media-left" href="{{route('user.chat.show',$message->chat_id)}}">
                      <img
                        class="media-object img-radius img-radius"
                        src="{{asset($message->user->image ? $message->user->image : 'adminty-assets/assets/images/avatar-3.jpg')}}"
                        alt="Generic placeholder image "
                      />
                      <div class="live-status bg-success"></div>
                    </a>
                    <div class="media-body">
                      <div class="f-13 chat-header">{{$message->user->name}}</div>
                    </div>
                  </div>
				  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar inner chat start-->
        <div class="showChat_inner">
          <div class="media chat-inner-header">
            <a class="back_chatBox">
              <i class="feather icon-chevron-left"></i> Josephin Doe
            </a>
          </div>
          <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
              <img
                class="media-object img-radius img-radius m-t-5"
                src="{{asset('adminty-assets/assets/images/avatar-3.jpg')}}"
                alt="Generic placeholder image"
              />
            </a>
            <div class="media-body chat-menu-content">
              <div class="">
                <p class="chat-cont">
                  I'm just looking around. Will you tell me something about
                  yourself?
                </p>
                <p class="chat-time">8:20 a.m.</p>
              </div>
            </div>
          </div>
          <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
              <div class="">
                <p class="chat-cont">
                  I'm just looking around. Will you tell me something about
                  yourself?
                </p>
                <p class="chat-time">8:20 a.m.</p>
              </div>
            </div>
            <div class="media-right photo-table">
              <a href="#!">
                <img
                  class="media-object img-radius img-radius m-t-5"
                  src="{{asset('adminty-assets/assets/images/avatar-4.jpg')}}"
                  alt="Generic placeholder image"
                />
              </a>
            </div>
          </div>
          <div class="chat-reply-box p-b-20">
            <div class="right-icon-control">
              <input
                type="text"
                class="form-control search-text"
                placeholder="Share Your Thoughts"
              />
              <div class="form-icon">
                <i class="feather icon-navigation"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar inner chat end-->
        <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
            <!-- nab bar start -->
            <nav class="pcoded-navbar">
              <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                  <li class="pcoded-hasmenu  {{Request::is('user/dashboard')?'active':''}}">
                    <a href="{{route('user.dashboard.index')}}" >
                      <span class="pcoded-micon"
                        ><i class="feather icon-home"></i
                      ></span>
                      <span class="pcoded-mtext">Dashboard</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu  {{Request::is('user/coin')?'active':''}}">
                    <a href="{{route('user.coin.index')}}" >
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Coin Market Place</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu {{Request::is('user/package*')?'active pcoded-trigger':''}}">
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"
                        ><i class="feather icon-sidebar"></i
                      ></span>
                      <span class="pcoded-mtext">Package</span>
                    </a>
                    <ul class="pcoded-submenu">
                      <li class="{{Request::is('user/package')?'active':''}}">
                        <a href="{{route('user.package.index')}}">
                          <span class="pcoded-mtext">Buy New Package</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/package/history')?'active':''}}">
                        <a href="{{route('user.package.history')}}">
                          <span class="pcoded-mtext">Package History</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="{{Request::is('user/deposit')?'active':''}}">
                    <a href="{{route('user.deposit.index')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Deposit</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu {{Request::is('user/withdraw*')?'active pcoded-trigger':''}} ">
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"
                        ><i class="feather icon-layers"></i
                      ></span>
                      <span class="pcoded-mtext">Withdraw</span>
                    </a>
                    <ul class="pcoded-submenu">
                      <li class="{{Request::is('user/withdraw')?'active':''}}">
                        <a href="{{route('user.withdraw.index')}}">
                          <span class="pcoded-mtext">History</span>
                        </a>
                      </li>
					  @if(Auth::user()->checkstatus() == true)
                      <li class="{{Request::is('user/withdraw/create')?'active':''}}">
                        <a href="{{route('user.withdraw.create')}}">
                          <span class="pcoded-mtext">Create</span>
                        </a>
                      </li>
					  @endif
                    </ul>
                  </li> 
				  <li class="{{Request::is('user/balance_transfer')?'active':''}}">
                    <a href="{{route('user.balance_transfer.index')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Balance Transfer</span>
                    </a>
                  </li>
				  <li class="{{Request::is('user/transcation')?'active':''}}">
                    <a href="{{route('user.transcation.index')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Transcations</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu {{Request::is('user/earning*')?'active pcoded-trigger':''}} ">
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"
                        ><i class="feather icon-layers"></i
                      ></span>
                      <span class="pcoded-mtext">Earning</span>
                    </a>
                    <ul class="pcoded-submenu">
                      <li class="{{Request::is('user/earning/direct_income')?'active':''}}">
                        <a href="{{route('user.earning.direct_income')}}">
                          <span class="pcoded-mtext">Direct</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/direct_team_income')?'active':''}}">
                        <a href="{{route('user.earning.direct_team_income')}}">
                          <span class="pcoded-mtext">Direct Team</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/upline_income')?'active':''}}">
                        <a href="{{route('user.earning.upline_income')}}">
                          <span class="pcoded-mtext">Upline</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/down_line_income')?'active':''}}">
                        <a href="{{route('user.earning.down_line_income')}}">
                          <span class="pcoded-mtext">Downline</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/upline_placement_income')?'active':''}}">
                        <a href="{{route('user.earning.upline_placement_income')}}">
                          <span class="pcoded-mtext">Upline Placement</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/down_line_placement_income')?'active':''}}">
                        <a href="{{route('user.earning.down_line_placement_income')}}">
                          <span class="pcoded-mtext">Downline Placement</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/trade_income')?'active':''}}">
                        <a href="{{route('user.earning.trade_income')}}">
                          <span class="pcoded-mtext">Trade</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/pool_income')?'active':''}}">
                        <a href="{{route('user.earning.pool_income')}}">
                          <span class="pcoded-mtext">Pool</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/ranking_income')?'active':''}}">
                        <a href="{{route('user.earning.ranking_income')}}">
                          <span class="pcoded-mtext">Ranking</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/reward_income')?'active':''}}">
                        <a href="{{route('user.earning.reward_income')}}">
                          <span class="pcoded-mtext">Reward</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/earning/associated_income')?'active':''}}">
                        <a href="{{route('user.earning.associated_income')}}">
                          <span class="pcoded-mtext">Associated</span>
                        </a>
                      </li>
                    </ul>
                  </li> 
				  <li class="{{Request::is('user/overall_earning')?'active':''}}">
                    <a href="{{route('user.report.overall_earning')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Overall Earning Report</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu {{Request::is('user/refer*')?'active pcoded-trigger':''}} ">
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"
                        ><i class="feather icon-layers"></i
                      ></span>
                      <span class="pcoded-mtext">Referral</span>
                    </a>
                    <ul class="pcoded-submenu">
                      <li class="{{Request::is('user/refer')?'active':''}}">
                        <a href="{{route('user.refer.index')}}">
                          <span class="pcoded-mtext">Direct Referral</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/refer/super_pool')?'active':''}}">
                        <a href="{{route('user.super_pool.index')}}">
                          <span class="pcoded-mtext">Super Pool</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/refer/tree')?'active':''}}">
                        <a href="{{route('user.tree.show')}}">
                          <span class="pcoded-mtext">Your Tree</span>
                        </a>
                      </li>
                    </ul>
                  </li> 
				  <li class="{{Request::is('user/super_pool')?'active':''}}">
                    <a href="{{route('user.super_pool.index')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Super Pool</span>
                    </a>
                  </li>
                  <li class="pcoded-hasmenu {{Request::is('user/product*') || Request::is('user/orders*') ?'active pcoded-trigger':''}} ">
                    <a href="javascript:void(0)">
                      <span class="pcoded-micon"
                        ><i class="feather icon-layers"></i
                      ></span>
                      <span class="pcoded-mtext">Product</span>
                    </a>
                    <ul class="pcoded-submenu">
                      <li class="{{Request::is('user/product/create')?'active':''}}">
                        <a href="{{route('user.product.create')}}">
                          <span class="pcoded-mtext">Add Products</span>
                        </a>
                      </li>
                      <li class="{{Request::is('user/product')?'active':''}}">
                        <a href="{{route('user.product.index')}}">
                          <span class="pcoded-mtext">Manage Products</span>
                        </a>
                      </li>
					  @if(App\Models\Setting::enablepurchase() == 1)
                      <li class="{{Request::is('user/orders')?'active':''}}">
                        <a href="{{route('user.order.orders')}}">
                          <span class="pcoded-mtext">Your Orders</span>
                        </a>
                      </li>
					  @endif
                    </ul>
                  </li> 
				  <li class="{{Request::is('user/post_purchase')?'active':''}}">
                    <a href="{{route('user.post_purchase.index')}}">
                      <span class="pcoded-micon"
                        ><i class="feather icon-menu"></i
                      ></span>
                      <span class="pcoded-mtext">Post Purchases</span>
                    </a>
                  </li>
				  @if(Auth::user()->type == 'Seller')
					<li class="pcoded-hasmenu {{Request::is('user/post*') || Request::is('user/post_sale*') ?'active pcoded-trigger':''}} ">
						<a href="javascript:void(0)">
						<span class="pcoded-micon"
							><i class="feather icon-layers"></i
						></span>
						<span class="pcoded-mtext">Post</span>
						</a>
						<ul class="pcoded-submenu">
						<li class="{{Request::is('user/post/create')?'active':''}}">
							<a href="{{route('user.post.create')}}">
							<span class="pcoded-mtext">Add Post</span>
							</a>
						</li>
						<li class="{{Request::is('user/post')?'active':''}}">
							<a href="{{route('user.post.index')}}">
							<span class="pcoded-mtext">Manage Post</span>
							</a>
						</li>
						<li class="{{Request::is('user/post_sale/create')?'active':''}}">
							<a href="{{route('user.post_sale.create')}}">
							<span class="pcoded-mtext">Add Sale</span>
							</a>
						</li>
						<li class="{{Request::is('user/post_sale')?'active':''}}">
							<a href="{{route('user.post_sale.index')}}">
							<span class="pcoded-mtext">Own Sale</span>
							</a>
						</li>
						<li class="{{Request::is('user/post_sale/received')?'active':''}}">
							<a href="{{route('user.post_sale.received')}}">
							<span class="pcoded-mtext">Received Sale</span>
							</a>
						</li>
						</ul>
					</li> 
				  @endif
                </ul>
              </div>
            </nav>
            <!-- nav bar end -->
            <div class="pcoded-content">
              <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
					@yield('contents')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- js Section Starts -->
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/jquery/dist/jquery.min.js')}}"
    ></script>
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/jquery-ui/jquery-ui.min.js')}}"
    ></script>
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/popper.js/dist/umd/popper.min.js')}}"
    ></script>
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"
    ></script>
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/assets/pages/widget/excanvas.js')}}"
    ></script>
    <!-- jquery slimscroll js -->
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"
    ></script>
    <!-- modernizr js -->
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/bower_components/modernizr/modernizr.js')}}"
    ></script>
    <script
      type="text/javascript"
      src="{{asset('adminty-assets/assets/js/SmoothScroll.js')}}"
    ></script>
    <script src="{{asset('adminty-assets/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/js/jquery.mousewheel.min.js')}}"></script>
    
    <script src="{{asset('adminty-assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminty-assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/jszip.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('adminty-assets/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminty-assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminty-assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminty-assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty-assets/bower_components/i18next/i18next.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('adminty-assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('adminty-assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty-assets/bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/pages/data-table/extensions/buttons/js/extension-btns-custom.js')}}"></script>

    <!-- Custom js -->
    <script src="{{asset('adminty-assets/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('adminty-assets/assets/js/vartical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminty-assets/assets/js/script.js')}}"></script>
	
	<script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
	@yield('scripts')
</body>

</html>
