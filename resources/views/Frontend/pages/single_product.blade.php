@extends('Frontend.layouts.main')
@section('title','Shop | Single Product')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('boighor/easyzoom.css') }}">
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
@stop
@section('content')	
	<!-- Main wrapper -->
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
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
			<div class="alert alert-success pro" style="display:none">
				<strong>Success!</strong>Product added to cart
			</div>
			<div class="alert alert-success wish" style="display:none">
				<strong>Success!</strong>Product added to Wishlist
			</div>
			<div class="alert alert-success rev" style="display:none">
				<strong>Success!</strong>Product reviewed
			</div>
			<div class="alert alert-danger wisherror" style="display:none">
				<strong>Alert!</strong>Product already added in wishlist
			</div>
			<div class="alert alert-danger reverror" style="display:none">
				<strong>Alert!</strong>Product already added reviewed
			</div>
			<div class="alert alert-danger revinfo" style="display:none">
				<strong>Alert!</strong>You must Login/Signup to review this product!<a href="{{route('myaccountpage')}}">Click here for Login/Signup</a> 
			</div>

        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
                                    
	        							<div class="fotorama wn__fotorama__action " data-nav="thumbs">
											@foreach($products->image_products as $p)
												@php 
												if(!empty($p))
												{
													$image = explode(',' , $p->image_path);
												}
												else
												{
													$image = "";
												}
												@endphp
											@endforeach
											@if(!empty($image))
											@foreach($image as $i)
											  <a href="1.jpg"><img src="/storage/products/{{$i}}" class="thumbnails" alt=""></a>
											
		        							  <!-- <a href="2.jpg"><img src="images/product/2.jpg" alt=""></a>
		        							  <a href="3.jpg"><img src="images/product/3.jpg" alt=""></a>
		        							  <a href="4.jpg"><img src="images/product/4.jpg" alt=""></a>
		        							  <a href="5.jpg"><img src="images/product/5.jpg" alt=""></a>
		        							  <a href="6.jpg"><img src="images/product/6.jpg" alt=""></a>
		        							  <a href="7.jpg"><img src="images/product/7.jpg" alt=""></a>
											  <a href="8.jpg"><img src="images/product/8.jpg" alt=""></a> -->
											  
											  @endforeach
											  @endif
	        							</div>
        							</div>
                                </div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
										<h1>{{$products->name}}</h1>
        								<div class="product-reviews-summary d-flex">
        									<ul class="rating-summary d-flex">
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
        									</ul>
        								</div>
        								<div class="price-box">
        									<span>{{$products->price}}</span>
        								</div>
										<div class="product__overview">
        									{!! $products->description !!}
        								</div>
        								<div class="box-tocart d-flex">

        									<div class="addtocart__actions">
        										<button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
        									</div>
											<div class="product-addto-links clearfix">
												<a class="wishlist" href="#" onclick="addWishList('{{$products->id}}')"></a>
												<!-- <a class="compare" href="#"></a> -->
											</div>
        								</div>
										<div class="product_meta">
										@if(!empty($category))
											<span class="posted_in">Categories: 
												 
												<a href="#">{{$category->name}}</a>
										@endif
											</span>
										</div>
										<!-- <div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div> -->
        							</div>
                                </div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
	                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
									{!! $products->description !!}
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
									<div class="review-fieldset">
										<h2>You're reviewing:</h2>
										<h3>{{$products->name}}</h3>
										<input type="hidden" id="id" name="product_id" value="{{$products->id}}">
										<div class="review-field-ratings">
											<div class="product-review-table">
											
												<div class="review-field-rating d-flex">
													<span>Rate</span>
													<fieldset class="rating" id="stars">
														<input type="radio" id="star5" class="star" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
														<input type="radio" id="star4half" class="star" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
														<input type="radio" id="star4" class="star" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
														<input type="radio" id="star3half" class="star" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
														<input type="radio" id="star3" class="star" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
														<input type="radio" id="star2half" class="star" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
														<input type="radio" id="star2" class="star" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
														<input type="radio" id="star1half" class="star" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
														<input type="radio" id="star1" class="star" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
														<input type="radio" id="starhalf" class="star" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
													</fieldset>
													<!-- <div class='starrr'></div> -->
												</div>
											</div>
										</div>
										<div class="review_form_field">
											<div class="input__box">
												<span>Review</span>
												<textarea id="review" name="review"></textarea>
											</div>
											<div class="review-form-actions">
												<button id="reviewbtn">Submit Review</button>
											</div>
										</div>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
						</div>
						@if(!empty($related_products))
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Related Products	</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
								@foreach($related_products as $r)
									<!-- Start Single Product -->
									@php 
									if(count($r->image_products) > 0)
									{
										$image = explode(',' , $r->image_products[0]->image_path)[0];
									
									}
									else
									{
										$image = "";
									}
									@endphp
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="{{ URL('/single/product/'.$r->id )}}"><img src="/storage/products/{{$image}}" alt="no image found"></a>
											<!-- <a class="second__img animation1" href="{{ URL('/single/product/'.$r->id )}}"><img src="{{asset('boighor/images/books/9.jpg')}}" alt="product image"></a> -->
										
										</div>
										<div class="product__content content--center">
											<h4><a href="{{ URL('/single/product/'.$r->id )}}">{{$r->name}}</a></h4>
											<ul class="prize d-flex">
												<li>{{$r->price}}</li>
												<!-- <li class="old_prize">{{$r->price}}</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="#" onclick="addCart('{{$r->id}}')"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="#" onclick="addWishList('{{$r->id}}')"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li> -->
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#" onclick="showModal('{{$r->id}}')"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
						</div>
						@endif
						@if(!empty($upsell))
						<div class="wn__related__product">
							<div class="section__title text-center">
								<h2 class="title__be--2">upsell products</h2>
							</div>
							<div class="row mt--60">
								<div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
									<!-- Start Single Product -->
									@foreach($upsell as $u)
									<!-- Start Single Product -->
									@php 
									if(count($u->image_products) > 0)
									{
										$image = explode(',' , $u->image_products[0]->image_path)[0];
									
									}
									else
									{
										$image = "";
									}
									@endphp
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
											<a class="first__img" href="{{ URL('/single/product/'.$r->id )}}"><img src="'/storage/products/{{$image}}" alt="product image"></a>
											<a class="second__img animation1" href="{{ URL('/single/product/'.$r->id )}}"><img src="/storage/products/{{$image}}" alt="product image"></a>
										</div>
										<div class="product__content content--center">
											<h4><a href="{{ URL('/single/product/'.$r->id )}}">{{$u->name}}</a></h4>
											<ul class="prize d-flex">
												<li>${{$u->price}}</li>
												
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li><a class="cart" href="#" onclick="addCart('{{$u->id}}')"><i class="bi bi-shopping-bag4"></i></a></li>
														<li><a class="wishlist" href="#" onclick="addWishList('{{$u->id}}')"><i class="bi bi-shopping-cart-full"></i></a></li>
														<!-- <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li> -->
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#" onclick="showModal('{{$u->id}}')"><i class="bi bi-search"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						@endif
						
					</div>
					<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<!-- <aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Product Categories</h3>
        						<ul>
        							<li><a href="#">Biography <span>(3)</span></a></li>
        							<li><a href="#">Business <span>(4)</span></a></li>
        							<li><a href="#">Cookbooks <span>(6)</span></a></li>
        							<li><a href="#">Health & Fitness <span>(7)</span></a></li>
        							<li><a href="#">History <span>(8)</span></a></li>
        							<li><a href="#">Mystery <span>(9)</span></a></li>
        							<li><a href="#">Inspiration <span>(13)</span></a></li>
        							<li><a href="#">Romance <span>(20)</span></a></li>
        							<li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
        							<li><a href="#">Self-Improvement <span>(13)</span></a></li>
        							<li><a href="#">Humor Books <span>(17)</span></a></li>
        							<li><a href="#">Harry Potter <span>(20)</span></a></li>
        							<li><a href="#">Land of Stories <span>(34)</span></a></li>
        							<li><a href="#">Kids' Music <span>(60)</span></a></li>
        							<li><a href="#">Toys & Games <span>(3)</span></a></li>
        							<li><a href="#">hoodies <span>(3)</span></a></li>
        						</ul>
        					</aside>
        					<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Filter by price</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="#" method="GET">
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
        						                        <span>Price :</span><input type="text" id="amount" readonly="">
        						                    </div>
        						                    <div class="price--filter">
        						                        <a href="#">Filter</a>
        						                    </div>
        						                </div>
        						            </div>
        						        </form>
        						    </div>
        						</div>
        					</aside>
        					<aside class="wedget__categories poroduct--compare">
        						<h3 class="wedget__title">Compare</h3>
        						<ul>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Condimentum posuere</a></li>
        							<li><a href="#">x</a><a href="#">Dignissim venenatis</a></li>
        						</ul>
        					</aside> -->
        					<!-- <aside class="wedget__categories poroduct--tag">
        						<h3 class="wedget__title">Product Tags</h3>
        						<ul>
        							<li><a href="#">Biography</a></li>
        							<li><a href="#">Business</a></li>
        							<li><a href="#">Cookbooks</a></li>
        							<li><a href="#">Health & Fitness</a></li>
        							<li><a href="#">History</a></li>
        							<li><a href="#">Mystery</a></li>
        							<li><a href="#">Inspiration</a></li>
        							<li><a href="#">Religion</a></li>
        							<li><a href="#">Fiction</a></li>
        							<li><a href="#">Fantasy</a></li>
        							<li><a href="#">Music</a></li>
        							<li><a href="#">Toys</a></li>
        							<li><a href="#">Hoodies</a></li>
        						</ul>
							</aside> -->
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
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<!-- <div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div> -->
		<!-- End Search Popup -->
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
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
		                            <div class="main-image images pro_image">
		                               
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1 id="name"></h1>
		                            <!-- <div class="rating__and__review">
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
		                            </div> -->
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="addtocart-btn addCart">
		                               
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
	
		    <!-- END Modal -->
		</div>
		<!-- END QUICKVIEW PRODUCT -->


    <!-- //Main wrapper -->
@endsection
@section('scripts')
<script src="{{ asset ('boighor/js/easyzoom.js')}}"></script>
<script>

var $easyzoom = $('.easyzoom').easyZoom();

// Setup thumbnails example
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.thumbnails').on('click', 'a', function(e) {
	var $this = $(this);

	e.preventDefault();

	// Use EasyZoom's `swap` method
	api1.swap($this.data('standard'), $this.attr('href'));
});

// Setup toggles example
var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

$('.toggle').on('click', function() {
	var $this = $(this);

	if ($this.data("active") === true) {
		$this.text("Switch on").data("active", false);
		api2.teardown();
	} else {
		$this.text("Switch off").data("active", true);
		api2._init();
	}
});
	// $('.starrr').starrr();
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
				$(".pro").show();
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
	$('#reviewbtn').on('click', function()
	{
		var id = $('#id').val();
		var review = $('#review').val();
		var rating  = $('#stars .star:checked').val();
		
		$.ajax({
			url: "/review",
			type : "post",
			data: { _token: "{{ csrf_token() }}", id: id, review: review , rating: rating},
			success: function(result)
			{
				console.log(result.info);
				if(result.info)
				{
					$(".revinfo").css("display", "block");
					setTimeout(()=>{
						$(".revinfo").hide();	
					},15000)

					window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
				}
				else if(result.error)
				{
					$(".reverror").css("display", "block");
					setTimeout(()=>{
						$(".reverror").hide();	
					},2000)

					window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
				}
				else
				{
					$(".rev").show();
					setTimeout(()=>{
						$(".alert-success").hide();	
					},2000)

					window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
				
				}
			},
			error: function(){
				alert("error");
			}
		});

	});

});
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
		dataType:'json',
		success: function(result)
		{	
		
			$('#name').text(result.data.name);
			$('.pro_image').prepend('<img alt="big images" src="/storage/products/' +result.image+ ' "/>');
			$('.new-price').text(result.data.price);
			$('.quick-desc').append('result.data.description');
			$('.addCart').append('<a href="#" onclick="addCart('+result.data.id+')">Add to Cart</a>');
			$('#productmodal').modal('show');
		},
		error: function(){
			alert("error");
		}
	});
}
</script>
@stop
	