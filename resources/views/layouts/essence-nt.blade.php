<!doctype html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="shortcut icon" href="{{URL::asset('images/favicon.png')}}"/>
		@yield('header')
		@include('includes.styles')	
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="noo-spinner">
			<div class="spinner">
				<div class="cube1"></div>
				<div class="cube2"></div>
			</div>
		</div>
		<div class="site">
		<header class="header header-1 header-desktop">
				<div class="container">
					<div class="row">
						<div class="col-10 col-md-10 col-lg-10 col-xl-10 pl-0">
							<div class="row">
								<div class="site-branding">
									<a class="normal_logo" href="{{ route('home') }}" rel="home">
										<img src="{{asset('images/elogo.png')}}" alt="essence" />
									</a>
								</div>
								<nav class="main-navigation d-none d-lg-block">
									<div class="primary-menu">
										<ul class="main-menu">
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('home') }}">Home</a>

											</li>
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('services')}}">Services</a>

											</li>
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('portofolio')}}">Portfolio</a>

											</li>
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('about')}}">About us</a>

											</li>
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('blog')}}">Blog</a>

											</li>
											<li class="menu-item-has-children mega-menu">
												<a href="{{ route('contact')}}">Contact</a>

											</li>
										</ul>
									</div>
								</nav>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-2 header-column-icon-container">

							<div id="page-open-mobile-menu" class="page-open-mobile-menu dark d-lg-none">
								<div><i></i></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div id="page-mobile-main-menu" class="page-mobile-main-menu">
				<div class="page-mobile-menu-header">
					<div class="page-mobile-menu-logo">
						<a href="{{ route('home') }}">
							<img src="{{asset('images/elogo.png')}}" alt=""/>
						</a>
					</div>
					<div id="page-close-mobile-menu" class="page-close-mobile-menu">
						<div><i></i></div>
					</div>
				</div>
				<ul class="mobile-menu">
					<li>
						<a href="{{ route('home') }}">
							<span class="menu-item-title">Home</span>

						</a>
					</li>
					<li>
						<a href="{{ route('services')}}">
							<span class="menu-item-title">Services</span>

						</a>
					</li>
					<li>
						<a href="{{ route('portofolio')}}">
							<span class="menu-item-title">Portfolio</span>

						</a>
					</li>
					<li>
						<a href="{{ route('about')}}">
							<span class="menu-item-title">About us</span>

						</a>
					</li>
					<li>
						<a href="{{ route('about')}}">
							<span class="menu-item-title">Blog</span>

						</a>
					</li>
					<li>
						<a href="{{ route('contact')}}">
							<span class="menu-item-title">Contact</span>

						</a>
					</li>

				</ul>
			</div>
		<div id="main">
		@yield('content')		

		@include('includes.footer')	
		</div>

		<a id="backtotop" class="fa fa-angle-up circle" href="javascript:void(0)"></a>

		<!-- LOAD JQUERY LIBRARY -->
		@include('includes.scripts')
	</body>
</html>
