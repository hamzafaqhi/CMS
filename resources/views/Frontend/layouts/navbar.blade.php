<header id="wn__header" class="header__area header__absolute sticky__header" >
			<div class="container-fluid" >
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="{{route('homepage')}}">
							<a href="index.html"  >
								<img src="{{ asset('boighor/images/logo/logo.png')}}" alt="logo images">
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block" >
						<nav class="mainmenu__nav" >
							<ul class="meninmenu  d-flex justify-content-start">

							</a>
								<li class="drop with--one--item"><a href="{{route('homepage')}}">Home</a></li>
								<li class="drop"><a href="{{route('shoppage')}}">Shop</a>
							
								</li>
								
								<li class="drop"><a href="{{route('aboutuspage')}}">About us</a>
								</li>
								<li><a href="{{route('contactuspage')}}">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2" id="nav">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li id="search" class="shop_search" style="padding:15px; display:none"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"></a>
							<!-- <span class="product_qun">3</span> -->
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span>{{ Session::get('cart_items')}}</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>${{ Session::get('total_price')}}</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="{{route('checkoutpage')}}">Go to Checkout</a>
										</div>
										<!-- <div class="single__items">
											<div class="miniproduct">
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="product-details.html"><img src="{{ asset('boighor/images/product/sm-img/1.jpg')}}" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.html">Voyage Yoga Bag</a></h6>
														<span class="prize">$30.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 01</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="item01 d-flex mt--20">
													<div class="thumb">
														<a href="product-details.html"><img src="images/product/sm-img/3.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.html">Impulse Duffle</a></h6>
														<span class="prize">$40.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 03</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
												<div class="item01 d-flex mt--20">
													<div class="thumb">
														<a href="product-details.html"><img src="images/product/sm-img/2.jpg" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="product-details.html">Compete Track Tote</a></h6>
														<span class="prize">$40.00</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Qty: 03</span>
															<ul class="d-flex justify-content-end">
																<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										<div class="mini_action cart">
											<a class="cart__btn" href="{{route('cartpage')}}">View and edit cart</a>
										</div>
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Your Store</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger">{{ config('app.name') }}</span>
												</div>
												<div class="switcher-currency-trigger">
													<span class="currency-trigger"><a href="{{route('dashboard')}}">Dashboard</a></span>
												</div>
											</div>
										</div>
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														@if(empty(\Auth::check()))
														<span><a href="{{route('myaccountpage')}}">Sign In</a></span>
														<span><a href="{{route('myaccountpage')}}">Create An Account</a></span>
														@else
														<span><a href="{{route('wishlistpage')}}">My Wishlist</a></span>
														<span><a href="{{route('useraccount')}}">Account</a></span>
														<span><a href="{{route('logout_user')}}">Logout</a></span>
														@endif
													</div>
				
												</div>
										</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.html">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about.html">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop-grid.html">Shop</a>
									<ul>
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
<script>
	var url      = window.location.href;
	var uri = url.split('/');
	var path = uri[3];
	if(path == "search" || path == "shop")
	{
		document.getElementById("search").style.display="block"
	}
</script>
        