<!doctype html >
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title','Home')</title>
	<meta name="description" content="@yield('meta_description')">
	<meta name="keywords" content="@yield('keywords')">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('boighor/images/favicon.ico')}}">
	<link rel="apple-touch-icon" href="{{ asset('boighor/images/icon.png')}}">

	<!-- Google font (font-family: 'Roboto', sans-serif; Popp    ins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('boighor/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('boighor/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('boighor/style.css') }}">
	
	

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('boighor/css/custom.css') }}">
	<!------ Include the above in your HEAD tag ---------->

    <script src="{{ asset('boighor/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    @yield('stylesheets')
</head>
<body>
	
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
	@include('Frontend.layouts.navbar')
		
        @yield('content')
		
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="{{route('homepage')}}">
										<img src="{{asset('/boighor/images/logo/3.png')}}" alt="logo">
									</a>
									<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
								</div>
								<div class="footer__content">
									
									<ul class="mainmenu d-flex justify-content-center">
										<!-- <li><a href="index.html">Trending</a></li>
										<li><a href="index.html">Best Seller</a></li> -->
										<li><a href="{{route('shoppage')}}">All Product</a></li>
										<li><a href="{{route('wishlistpage')}}">Wishlist</a></li>
										<!-- <li><a href="index.html">Blog</a></li> -->
										<li><a href="{{route('contactuspage')}}">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="#">SHF.</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</footer>

	</div>
	<!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="{{ asset ('boighor/js/vendor/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset ('boighor/js/popper.min.js')}}"></script>
	<script src="{{ asset ('boighor/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('boighor/js/plugins.js')}}"></script>
	<script src="{{ asset ('boighor/js/active.js')}}"></script>
	
	@yield('scripts')
</body>
</html>