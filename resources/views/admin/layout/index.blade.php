<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,">
    <meta name="description" content="{{App\Models\Setting::siteName()}} | BEST ONLINE EARNING SITE | No. 1 Marketing Forum to Earn Online.">
	<meta name="author" content="Bootlab">
    <title>ADMIN PANEL | {{App\Models\Setting::siteName()}}</title> 
	<link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">	

	<link rel="preconnect" href="{{asset('//fonts.gstatic.com/')}}" crossorigin="">

	<!-- PICK ONE OF THE STYLES BELOW -->
    <link href="{{asset('css/classic.css')}}" rel="stylesheet"> 
	<!-- <link href="{{asset('css/corporate.css')}}" rel="stylesheet"> -->
	<!-- <link href="{{asset('css/modern.css')}}" rel="stylesheet"> -->
	{{-- <script src="{{asset('js/settings.js')}}"></script> --}}

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
	@toastr_css
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="{{url('/')}}">
          			<i class="align-middle" data-feather="box"></i>
          			<span class="align-middle"> {{App\Models\Setting::siteName()}}</span>
        		</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Admin Panel
                    </li>
                    <li class="sidebar-item {{Request::is('admin.dashboard.index')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.dashboard.index')}}">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a href="{{url('#configuration')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Configuration</span>
						</a>
						<ul id="configuration" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.messages.index')}}">Message</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.email.index')}}">Emails</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.ticker.index')}}">Ticker Message</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.source.index')}}">Source</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.setting.index')}}">Setting</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.slider.index')}}">Slider</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.note.index')}}">Note</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.review.index')}}">Review</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.admin.index')}}">Add Employee</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.payment.index')}}">Payment</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.profile.index')}}">Profile</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.balance_transfer.index')}}">Balance Transfer</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/company_account/*') ?'active':''}}">
						<a href="{{url('#company_account')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Company Account</span>
						</a>
						<ul id="company_account" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/company_account')?'active':''}}"><a class="sidebar-link" href="{{route('admin.company_account.index')}}">Add</a></li>
							<li class="sidebar-item {{Request::is('admin/company_account/manage')?'active':''}}"><a class="sidebar-link" href="{{route('admin.company_account.manage')}}">Manage</a></li>
							<li class="sidebar-item {{Request::is('admin/company_account/transfer_income_to_user')?'active':''}}"><a class="sidebar-link" href="{{route('admin.company_account.transfer_income_to_user')}}">Trasnfer Income To User</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin.chat.index')?'active':''}}">
						<a class="sidebar-link" href="{{route('admin.chat.index')}}">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Chat</span>
						</a>
					</li>	
					<li class="sidebar-item">
						<a href="{{url('#layouts')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Packages</span>
						</a>
						<ul id="layouts" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.package.create')}}">Create Package</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.package.index')}}">View Package</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="{{url('#users')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">User</span>
						</a>
						<ul id="users" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.index')}}">All User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.actives')}}">Active User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.pendings')}}">Pending User</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.user.email_verification')}}">Pending Email Verification</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="{{url('#deposit')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Packages Deposit</span>
						</a>
						<ul id="deposit" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.deposit.index')}}">Deposit Request</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.deposit.show')}}">Deposit History</a></li>
						</ul>
					</li>
					
					<li class="sidebar-item">
						<a href="{{url('#withdraw')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Withdraw</span>
						</a>
						<ul id="withdraw" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.withdraw.index')}}">In Process</a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.withdraw.holds')}}">On Hold</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.withdraw.complete')}}">Withdraw History</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a href="{{url('#transcation')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Trancations</span>
						</a>
						<ul id="transcation" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.transcation.index')}}">Your Transcations</a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.transcation.all')}}">All User Trancations</a></li>
							<li class="sidebar-item "><a class="sidebar-link" href="{{route('admin.transcation.pin_history')}}">All Pin History</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/brand/*') || Request::is('admin/category') || Request::is('admin/country') || Request::is('admin/city') || Request::is('admin/product')  ?'active':''}}">
						<a href="{{url('#social')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">E-commerce Section</span>
						</a>
						<ul id="social" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/category')?'active':''}}"><a class="sidebar-link" href="{{route('admin.category.index')}}">Manage Category</a></li>
							<li class="sidebar-item {{Request::is('admin/brand')?'active':''}}"><a class="sidebar-link" href="{{route('admin.brand.index')}}">Manage Brand</a></li>
							<li class="sidebar-item {{Request::is('admin/country')?'active':''}}"><a class="sidebar-link" href="{{route('admin.country.index')}}">Manage Country</a></li>
							<li class="sidebar-item {{Request::is('admin/city')?'active':''}}"><a class="sidebar-link" href="{{route('admin.city.index')}}">Manage City</a></li>
							<li class="sidebar-item {{Request::is('admin/product/create')?'active':''}}"><a class="sidebar-link" href="{{route('admin.product.create')}}">Create Products</a></li>
							<li class="sidebar-item {{Request::is('admin/product')?'active':''}}"><a class="sidebar-link" href="{{route('admin.product.index')}}">Manage Product</a></li>
						</ul>
					</li>	
					<li class="sidebar-item">
						<a href="{{url('#profileSetting')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">User Profile Section</span>
						</a>
						<ul id="profileSetting" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.martial_status.index')}}">Martial Status</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.religion.index')}}">Religion</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.blood_group.index')}}">Blood Group</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.education.index')}}">Education</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.profession.index')}}">Profession</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.service.index')}}">Service</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.type.index')}}">Type</a></li>
						</ul>
					</li>
					<li class="sidebar-item {{Request::is('admin/post_brand/*') || Request::is('admin/post_category') || Request::is('admin/post') ?'active':''}}">
						<a href="{{url('#post_section')}}" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Post Section</span>
						</a>
						<ul id="post_section" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item {{Request::is('admin/post_category')?'active':''}}"><a class="sidebar-link" href="{{route('admin.post_category.index')}}">Manage Category</a></li>
							<li class="sidebar-item {{Request::is('admin/post_brand')?'active':''}}"><a class="sidebar-link" href="{{route('admin.post_brand.index')}}">Manage Brand</a></li>
							<li class="sidebar-item {{Request::is('admin/post/create')?'active':''}}"><a class="sidebar-link" href="{{route('admin.post.create')}}">Create Posts</a></li>
							<li class="sidebar-item {{Request::is('admin/post')?'active':''}}"><a class="sidebar-link" href="{{route('admin.post.index')}}">Manage Posts</a></li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="{{asset('img\avatars\avatar.jpg')}}" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1"> {{App\Models\Setting::siteName()}}</h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
				<a class="sidebar-toggle d-flex mr-2">
          			<i class="hamburger align-self-center"></i>
       			</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
					
						<li class="nav-item dropdown">
						

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="{{url('#')}}" data-toggle="dropdown">
                <img src="{{asset('img\avatars\avatar.jpg')}}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood"> <span class="text-dark">Admin</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{route('admin.logout')}}">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					@yield('contents')
				
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="{{url('#')}}">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2020 - <a href="{{url('/')}}" class="text-muted">{{App\Models\Setting::siteName()}}</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{asset('js\app.js')}}"></script>
	@toastr_js
	@toastr_render
	@yield('scripts')
</body>

</html>