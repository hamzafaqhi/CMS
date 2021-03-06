@extends('Frontend.layouts.main')
@section('title','Home')
@section('stylesheets')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
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
.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
</style>
@stop
@section('content')
 <!-- Start Slider area -->
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
        <!-- End Slider area -->
<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
			<div class="alert alert-success" style="display:none">
				<strong>Success!</strong>Product added to cart
			</div>
			<div class="alert alert-success wish" style="display:none">
				<strong>Success!</strong>Product added to Wishlist
			</div>
			<div class="alert alert-danger wisherror" style="display:none">
				<strong>Alert!</strong>Product already added in wishlist
			</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					<!-- Start Single Product -->
					@if(!empty($latest))
					@foreach($latest as $l)
					@php 
					
					if(count($l->image_products) > 0)
					{
						$image = explode(',' , $l->image_products[0]->image_path)[0];
					
					}
					else
					{
						$image = "";
					}
					@endphp
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">

								<a class="first__img" href="{{ URL('/single/product/'.$l->id )}}"><img src="/storage/products/{{$image}}" alt="product image"></a>
								<!-- <a class="second__img animation1" href="{{ URL('/single/product/'.$l->id )}}"><img src="/storage/products/{{$image}}" alt="product image"></a> -->
								<!-- <div class="hot__box">
									<span class="hot-label">Best Seller</span>
								</div> -->
							</div>
							<div class="product__content content--center">
								<h4><a href="{{ URL('/single/product/'.$l->id )}}">{{$l->name}}</a></h4>
								<ul class="prize d-flex">
									<li>{{$setting->currency}}{{$l->price}}</li>
									<!-- <li class="old_prize">$35.00</li> -->
								</ul>
								
								<div class="action">
									<div class="actions_inner">
										<ul class="add_to_links">
											<li><a class="cart" href="#" onclick="addCart('{{$l->id}}')"><i class="bi bi-shopping-bag4"></i></a></li>
											<li><a class="wishlist" href="#"  onclick="addWishList('{{$l->id}}')"><i class="bi bi-shopping-cart-full"></i></a></li>
											<!-- <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li> -->
											<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#" onclick="showModal('{{$l->id}}')"><i class="bi bi-search"></i></a></li>
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
					</div>
					@endforeach
					@endif
					<!-- Start Single Product -->
					<!-- Start Single Product -->

				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section >
			<div class="container"  >
				<div class="row" >

					<div class="col-lg-7 offset-lg-2 col-md-12 col-12 ptb--150" margin-left: 20%>
						<div class="section__title text-center">
							<h2>Stay With Us</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections and exclusive offers.</p>
							<form action="javascript:void(0)">
								<div class="newsletter__box">
									<input id="mail" name="mail" type="email" placeholder="Enter your e-mail" onfocusout="checkSubscriber()">
									<span id="status_news" style="display: none"></span>
									<button type="button">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Best Seller Area -->
		<section class="wn__bestseller__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
							<a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">ALL</a>
							@if(!empty($cat))
							@foreach($cat as $c)
                            <a class="nav-item nav-link" data-toggle="tab" href="{{route('search_pro_cat', ['id' => $c->id ])}}"  role="tab">{{$c->name}}</a>
							@endforeach
							@endif
                        </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							@if(!empty($products))
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
							<div class="single__product">
								<!-- Start Single Product -->
								<div class="col-lg-3 col-md-4 col-sm-6 col-12">
									<div class="product product__style--3">
										<div class="product__thumb">
											<a class="first__img" href="{{ URL('/single/product/'.$p->id )}}"><img src="/storage/products/{{$images}}" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">BEST SALER</span>
											</div>
										</div>
										<div class="product__content content--center content--center">
											<h4 id="name"><a href="{{ URL('/single/product/'.$p->id )}}">{{$p->name}}</a></h4>
											<ul class="prize d-flex">
												<li>{{$setting->currency}}{{$p->price}}</li>
												<!-- <li class="old_prize">$35.00</li> -->
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
													<li><a class="cart" href="#" onclick="addCart('{{$p->id}}')"><i class="bi bi-shopping-bag4"></i></a></li>
													<li><a class="wishlist" href="#"  onclick="addWishList('{{$p->id}}')"><i class="bi bi-shopping-cart-full"></i></a></li>
													<!-- <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li> -->
													<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#" onclick="showModal('{{$p->id}}')"><i class="bi bi-search"></i></a></li>
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
								</div>
								<!-- Start Single Product -->
								<!-- Start Single Product -->
								
								<!-- Start Single Product -->
							</div>
							@endforeach
							@endif
						</div>
					</div>
					<!-- End Single Tab Content -->
					<!-- Start Single Tab Content -->
				
					<!-- End Single Tab Content -->
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start Recent Post Area -->
		<section class="best-seel-area pt--80 pb--60">

		</section>

			<div class="container" >

				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center pb--50">
							<h2 class="title__be--2">Manufac<span class="color--theme">turers </span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
			</div>
			
		
	@if(!empty($man))
	<section class="customer-logos slider">		
		@foreach($man as $m)
		  <div class="slide"><img src="/storage/manufacturers/{{$m->image}}"></div>
		  <div class="col-lg-1"></div>
		@endforeach
   </section>
   @endif
   <section class="">
		</section>
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
		                                    <span class="new-price">{{$setting->currency}}17.20</span>
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
		</div>

@endsection
@section('scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
<script>
$(document).ready(function(){
	$('.customer-logos').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });

$('[id^=detail-]').hide();
$('.toggle').click(function() {
	$input = $( this );
	$target = $('#'+$input.attr('data-toggle'));
	$target.slideToggle();
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
			$('.pro_image').prepend('<img alt="big images" src="/storage/products/' +result.image+ ' "/>')
			$('.new-price').text(result.data.price);
			$('.quick-desc').html(result.data.description);
			$('.addCart').append('<a href="#" onclick="addCart('+result.data.id+')">Add to Cart</a>')
			
			
			$('#productmodal').modal('show');
		},
		error: function(){
			alert("error");
		}
	});
}
function closeModal()
{
	$('.modal-body').html('');
	$('#productmodal').modal('hide');
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

// function getPro(id)
// {
// 	$.ajaxSetup
// 	({
// 		headers: {
// 			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
// 		}
// 	});
// 	$.ajax({
// 		url: "/cat/"+id+"/products/",
// 		type : "get",
// 		success: function(result)
// 		{
			
// 			// $(".alert-success").show();
// 			// setTimeout(()=>{
// 			// 	$(".alert-success").hide();	
// 			// },2000)
// 			// console.log(result)
// 		},
// 		error: function(){
// 			alert("error");
// 		}
// 	});
// }
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
 function checkSubscriber()
 {
	var email =  $('#mail').val();
	$.ajax({
		url: "subscribe/newsletter",
		type : "post",
		data: {_token:"{{ csrf_token() }}",email: email},
		success: function(result)
		{
			if(result == "success")
			{
				$('#mail').val('');
				$('#status_news').html('<font color="green">Success! Successfully subscribed for newsletters</font>');
				$('#status_news').show();
				setTimeout(()=>{
				$("#status_news").hide();	
				},2000);

				
			}
			else
			{
				$('#status_news').html('<font color="red">Error! Email already subscribed for newsletter!</font>');
				$('#status_news').show()
				setTimeout(()=>{
				$("#status_news").hide();	
				},2000);

			}
		},
		error: function(){
			console("error");
		}
	});
 }
</script>
@stop
