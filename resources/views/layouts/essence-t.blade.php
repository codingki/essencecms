<!doctype html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="shortcut icon" href="{{url('images/favicon.png')}}"/>
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
		@include('includes.topnav-transparent')	
		<div id="main">
		@yield('content')		

		@include('includes.footer')	
		</div>

		<a id="backtotop" class="fa fa-angle-up circle" href="javascript:void(0)"></a>

		<!-- LOAD JQUERY LIBRARY -->
		@include('includes.scripts')
	</body>
</html>
