<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>USER PANEL</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<script src="{{asset('global_assets/js/plugins/ui/ripple.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/dashboard.js')}}"></script>
	<!-- /theme JS files -->
	@toastr_css
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
		<div class="navbar-brand">
			<a href="{{url('')}}" style="color:white;" class="d-inline-block">
				<h2 class="mb-0 text-white text-shadow-dark">LEGO TRADERS GLOBAL</h2>
				{{-- <img src="{{asset('user_asset/global_assets/images/logo_light.png')}}" alt=""> --}}
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				 <strong>Cash Wallet : </strong> $ {{Auth::user()->cash_wallet}}
				</span>
				<span style="margin-left:10px;" class="badge badge-mark border-teal-300 mr-2"></span>
				 <strong>Reward Account : </strong> $ {{Auth::user()->roi_account}}
				</span>

			<ul class="navbar-nav ml-md-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<i class="icon-make-group mr-2"></i>
						Earning
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-body p-2">
							<div class="row no-gutters">
								<div class="col-12 col-sm-4">
									<a href="{{route('user.earning.direct_income')}}" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-credit-card2 text-pink-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Direct Earning</div>
									</a>
								</div>
								<div class="col-12 col-sm-4">
									<a href="{{route('user.earning.indirect_income')}}" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-credit-card2 text-teal-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Indirect Earning</div>
									</a>
								</div>
								<div class="col-12 col-sm-4">
									<a href="{{route('user.earning.roi_income')}}" class="d-block text-default text-center ripple-dark rounded p-3">
										<i class="icon-credit-card2 text-success-400 icon-2x"></i>
										<div class="font-size-sm font-weight-semibold text-uppercase mt-2">Reward Earning</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a href="{{route('user.logout')}}" class="navbar-nav-link">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body" style="background-image:url({{asset('user_asset/global_assets/images/backgrounds/user_bg3.jpg')}})!important;">
						<div class="card-body text-center">
							<a href="#">
								<img src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">{{Auth::user()->name}}</h6>
							<span class="font-size-sm text-white text-shadow-dark">Lego Traders Global</span>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">USER PANEL FOR USER</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{route('user.dashboard.index')}}" class="nav-link {{Request::is('user/dashboard')?'active':''}}">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/package*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-store"></i> <span>Package</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/package*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.package.index')}}" class="nav-link {{Request::is('user/package')?'active':''}}">Buy New Package</a></li>
								<li class="nav-item"><a href="{{route('user.package.history')}}" class="nav-link {{Request::is('user/package/history')?'active':''}}">Package History</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/withdraw*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-cart-remove"></i> <span>Withdraw</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/withdraw*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.withdraw.create')}}" class="nav-link {{Request::is('user/withdraw/create')?'active':''}}">Create</a></li>
								<li class="nav-item"><a href="{{route('user.withdraw.index')}}" class="nav-link {{Request::is('user/withdraw')?'active':''}}">History</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('user/refer*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-users4"></i> <span>Referral</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('user/refer*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('user.refer.index')}}" class="nav-link {{Request::is('user/refer')?'active':''}}">Direct Referral Link</a></li>
								<li class="nav-item"><a href="{{route('user.tree.show')}}" class="nav-link {{Request::is('user/refer/tree')?'active':''}}">Your Tree</a></li>
							</ul>
						</li>
						<!-- /page kits -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{url('user/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">@yield('title')</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="{{url('contact_us')}}" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item  p-0">
								<a href="{{route('user.user.index')}}" class="breadcrumb-elements-item" >
									<i class="icon-gear mr-2"></i>
									Settings
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				@yield('contents')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2022 <a href="#">Lego Trader Global</a> by <a href="tel:03030672683" target="_blank">AS</a>
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	@yield('scripts')
	<!-- /page content -->
	@toastr_js
	@toastr_render
</body>
</html>
