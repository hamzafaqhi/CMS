@extends('Frontend.layouts.main')
@section('title','Shop')
@section('stylesheets')
<style>
.hot__box
{
	display: none !important;
}
.old_prize {
	display: none !important;
}
.rating {
	display: none !important;
}
.price--filter a {
	background: #ebebeb none repeat !important;
}
</style>
@endsection
@section('content')
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
			<!-- Start Single Slide -->
		@if(!empty($banner))
			@foreach($banner as $b)
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <img src="/storage/banners/{{$b->image}}" alt="">
			</div>
			@endforeach
		
		@else

			<div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            
			</div>
		@endif
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <!-- <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
            </div> -->
            <!-- End Single Slide -->
</div>
<!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
			<div class="alert alert-success" style="display:none">
				<strong>Success!</strong>Product added to cart
			</div>
			<div class="alert alert-success wish" style="display:none">
				<strong>Success!</strong>Product added to Wishlist
			</div>
			<div class="alert alert-danger wisherror" style="display:none">
				<strong>Alert!</strong>Product already added in wishlist
			</div>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
								<h3 class="wedget__title">Product Categories </h3>
								<ul class="list-group">
									<!-- <li class="list-group-item">
										<div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
											<div class="col-xs-10">
												Item 1
											</div>
											<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
										</div>
										<div id="detail-1">
											<hr></hr>
											<div class="container">
												<div class="fluid-row">
													<div class="col-xs-1">
														Detail:
													</div>
													<div class="col-xs-5">
														Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													</div>
													<div class="col-xs-1">
														Detail:
													</div>
													<div class="col-xs-5">
														Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													</div>
													<div class="col-xs-1">
														Detail:
													</div>
													<div class="col-xs-5">
														Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													</div>
													<div class="col-xs-1">
														Detail:
													</div>
													<div class="col-xs-5">
														Lorem ipsum dolor sit amet, consectetur adipiscing elit.
													</div>
												</div>
											</div>
										</div>
									</li>	 -->
									{!! $categories !!}
								</ul>
        						<!-- <ul>
									 @foreach($category as $c)
        							<li><a href="#">{{$c->name}} <span>(3)</span></a></li>
									@endforeach
									 

        						</ul> -->
							</aside>
							<div class="box-search-content search_active block-bg close__top">
								<form id="search_mini_form--2" class="minisearch" action="{{route('shoppage')}}" method="POST">
									<div class="field__search">
									@csrf
										<input type="text" name="search" placeholder="Search entire store here...">
										<div class="action">
										<button style="background:none; border:none" type="submit"><a href="#"><i class="zmdi zmdi-search"></i></a></button>
										</div>
									</div>
								</form>
								<div class="close__wrap">
									<span>close</span>
								</div>
							</div>
        					<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Filter by price</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="{{route('shoppage')}}" method="POST">
											@csrf
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
        						                        <span>Price :</span><input type="text" id="amount" name="amount" readonly="">
        						                    </div>
        						                    <div class="price--filter">
        						                        <button type="submit" style=" background:none; border:none;"><a class="price--filter" >Filter</a></button>
        						                    </div>
        						                </div>
        						            </div>
        						        </form>
        						    </div>
        						</div>
							</aside>
							
        					<aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Product Tags</h3>
        						<ul>
									@foreach($tag as $t)
        							<li><a href="{{route('search_cat', ['id' => 0, '$tag' => $t->id ])}}">{{$t->name}}</a></li>
									@endforeach
        						</ul>
							</aside>
							@if(!empty($voucher))
							<aside class="wedget__categories sidebar--banner">
								<img src="{{asset('boighor/images/others/banner_left.jpg')}}" alt="banner images">
								<div class="text">
									<h2>use code</h2>
									@if($voucher->amount_type == "fixed")
									<h6>{{$voucher->name}} <br> <strong>and save {{$voucher->amount}}</strong></h6>
									@else
									<h6>{{$voucher->name}}<br> <strong>save up to {{$voucher->amount}}%</strong>off</h6>
									@endif
								</div>
							</aside>
							@endif
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <!-- <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a> -->
			                        </div>
			                        <p>Showing {{($products->currentPage()-1)* $products->perPage()+1}}–{{ $products->total()}} of {{$products->total()}} results</p>
			                        <div class="orderby__wrapper">
			                        </div>
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
							@if(count($products))

							<div class="row">
								@foreach($products as $p)
								
								@php 
						
								if(count($p->image_products) > 0)
								{
									$images = explode(',' , $p->image_products[0]->image_path)[0];
								
								}
								else
								{
									$images = "";
								}
								@endphp
	        						<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="{{ URL('/single/product/'.$p->id )}}"><img src="/storage/products/{{$images}}" alt="product image"></a>
											<a class="second__img animation1" href="{{ URL('/single/product/'.$p->id )}}"><img src="/storage/products/{{$images}}" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SELLER</span>
											</div>
										</div>
										<div class="product__content content--center">
											<h4><a href="single-product.html">{{$p->name}}</a></h4>
											<ul class="prize d-flex">
												<li>$ {{$p->price}}</li>
												<li class="old_prize">$ {{$p->price}}</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" onclick="addCart('{{$p->id}}')"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" onclick="addWishList('{{$p->id}}')"><i class="bi bi-shopping-cart-full"></i></a></li>
														<li><a onclick="showModal('{{$p->id}}')"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li class="on"><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
													<li><i class="fa fa-star-o"></i></li>
												</ul>
											</div>
										</div>
									</div>
									@endforeach
		        					<!-- End Single Product -->
								</div>
							
							@else
							
								<section class="page_error section-padding--lg bg--white">
									<div class="container">
										<div class="row">
											<div class="col-lg-12">
												<div class="error__inner text-center">
													<div class="error__logo">
														<a href="#"><img src="{{asset('images/no_products_found.png')}}" alt="error images"></a>
													</div>
													<div class="error__content">
														<p>There are no products for this category!</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							
							@endif
	        					<ul style="text-align:center;">
								{{ $products->links( "pagination::bootstrap-4") }}
	        					</ul>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
		<!-- Footer Area -->
	
		<!-- //Footer Area -->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
		                                <img alt="big images" src="images/product/big-img/1.jpg">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1 id="product_name"></h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price" id="new-price">$17.20</span>
		                                    <span class="old-price" id="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc" id="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#" onclick="addCart('modal')" id="idButton" data-id="">Add to cart</a>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- END QUICKVIEW PRODUCT -->
		</div>
		<!-- //Main wrapper -->
        @endsection
		<!-- JS Files -->
		@section('scripts')
		<script>
			function showModal(index)
			{
				$.ajaxSetup
				({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				$.ajax({
					url: "/show/"+index+"/product/",
					type : "get",
					data: {id: index},
					success: function(result)
					{
						document.getElementById("product_name").innerHTML = result.name;
						document.getElementById("quick-desc").innerHTML = result.description;
						document.getElementById("new-price").innerHTML = "$" + result.price;
						document.getElementById("old-price").innerHTML = "$" + result.price;
						var d = document.getElementById("idButton");  //   Javascript
						d.setAttribute('data-id' , result.id);
						$('#productmodal').modal('show');
					},
					error: function(){
						alert("error");
					}
				});
			}
			function addWishList(index)
			{
				$.ajaxSetup
				({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				$.ajax({
					url: "/add/"+index+"/wish/",
					type : "get",
					data: {id: index},
					success: function(result)
					{
						if(result.error)
						{
							$(".wisherror").css("display", "block");
							setTimeout(()=>{
								$(".wisherror").hide();	
							},2000)
						}
						else
						{
							$(".wish").css("display", "block");
							setTimeout(()=>{
								$(".wish").hide();	
							},2000)
						}
					},
					error: function(){
						alert("error");
					}
				});
			}
			function addCart(index)
			{
				if(index == "modal")
				{
					index = $("#idButton").data("id");
				}
				$.ajaxSetup
				({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});
				$.ajax({
					url: "/add/"+index+"/cart/",
					type : "get",
					data: {id: index},
					success: function(result)
					{
						$(".alert-success").show();
						setTimeout(()=>{
							$(".alert-success").hide();	
						},2000)
						console.log(result)
					},
					error: function(){
						alert("error");
					}
				});
			}
			$(document).ready(function() {
			$('[id^=detail-]').hide();
			$('.toggle').click(function() {
				$input = $( this );
				$target = $('#'+$input.attr('data-toggle'));
				$target.slideToggle();
			});
		});
		</script>
		@stop
	