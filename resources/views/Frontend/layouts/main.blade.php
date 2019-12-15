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
	
	
	<!-- themes Stylesheets -->


<?php // $contents = File::get(storage_path('app/file.txt'));
       
$stylesheet = File::get(storage_path('app/file.txt'));


switch($stylesheet) {
    case '1':
        $style = './boighor/1.css';
        break;
    case '2':
        $style = './boighor/2.css';
        break;
         case '3':
        $style = './boighor/3.css';
        break;
         case '4':
        $style = './boighor/4.css';
        break;
         case '5':
        $style = './boighor/5.css';
        break;
         case '6':
        $style = './boighor/6.css';
        break; 
         case '7':
        $style = './boighor/7.css';
        break; 
    default:
          $style = './boighor/1.css';
        break;
}
echo '<link rel="stylesheet" type="text/css" href="'.$style.'">';  

 ?>
	
	
	<!-- <link rel="stylesheet" href="{{ asset('boighor/3.css') }}"> -->
	 <!-- <link rel="stylesheet" href="{{ asset('boighor/4.css') }}">    -->
	<!-- <link rel="stylesheet" href="{{ asset('boighor/5.css') }}">  -->
	<!-- <link rel="stylesheet" href="{{ asset('boighor/6.css') }}">  -->
	<!-- <link rel="stylesheet" href="{{ asset('boighor/7.css') }}"> -->


	<!-- Cusom css 
   <link rel="stylesheet" href="{{ asset('boighor/css/custom.css') }}">
	<!------ Include the above in your HEAD tag ---------->

	<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
	<!-- Modernizer js -->
    <script src="{{ asset('boighor/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    @yield('stylesheets')
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
	@include('Frontend.layouts.navbar')
		<!-- //Header -->
		<!-- Start Search Popup -->
		<!-- <div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="{{route('search_products')}}" method="POST">
				<div class="field__search">
					<input type="text" name="search" placeholder="Search entire store here...">
					<div class="action">
						<button style="background:none; border:none" type="submit"><a href="#"><i class="zmdi zmdi-search"></i></a></button>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div> -->
		<!-- End Search Popup -->
        <!-- Start Slider area -->
<<<<<<< HEAD
       
=======
        <div class="banner slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	      
	            
           
            <div class="slide animation__style10 bg-image--ts1 fullscreen align__center--left">
	            
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--ts2 fullscreen align__center--left">
            </div>

             <div class="slide animation__style10 bg-image--ts3 fullscreen align__center--left">
            </div>
            <!-- End Single Slide -->
        </div>
>>>>>>> cf489f2f1eab820149410203f5ff38370176286e
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
        @yield('content')
		<!-- End Recent Post Area -->
		<!-- Best Sale Area -->
		
		<!-- Best Sale Area Area -->
		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color ">
			<div class="footer-static-top  ">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
<<<<<<< HEAD
									<a href="{{route('homepage')}}">
										<img src="{{asset('/boighor/images/logo/3.png')}}" alt="logo">
=======
									<a href="index.html">
										<img src="http://localhost:8000/boighor/images/logo/3.png" alt="logo">
>>>>>>> cf489f2f1eab820149410203f5ff38370176286e
									</a>
									<p class="foot_for_home">There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
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
						<!-- <div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="{{asset('boighor/images/icons/payment.png')}}" alt="" />
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		
		<!-- END QUICKVIEW PRODUCT -->
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