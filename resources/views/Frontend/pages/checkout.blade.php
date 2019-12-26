@extends('Frontend.layouts.main')
@section('title','Checkout')
@section('stylesheets')
<style>
.btn span.glyphicon {    			
	opacity: 0;				
}
.btn.active span.glyphicon {				
	opacity: 1;				
}

.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
  width: 100%;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
@stop
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
        <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
			<form action="" id="order-form">
        		<div class="row">
				<div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
				</div>
								<!-- <div class="col-lg-12">
        				<div class="wn_checkout_wrap">
        					<div class="checkout_info">
        						<span>Returning customer ?</span>
        						<a class="showlogin" href="#">Click here to login</a>
        					</div>
        					<div class="checkout_login">
        						<form class="wn__checkout__form" action="#">
        							<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>

        							<div class="input__box">
        								<label>Username or email <span>*</span></label>
        								<input type="text">
        							</div>

        							<div class="input__box">
        								<label>password <span>*</span></label>
        								<input type="password" >
        							</div>
        							<div class="form__btn">
        								<button>Login</button>
        								<label class="label-for-checkbox">
        									<input id="rememberme" name="rememberme" value="forever" type="checkbox" >
        									<span>Remember me</span>
        								</label>
        								<a href="#">Lost your password?</a>
        							</div>
        						</form>
        					</div>
        					<div class="checkout_info">
        						<span>Have a coupon? </span>
        						<a class="showcoupon" href="#">Click here to enter your code</a>
        					</div>
        					<div class="checkout_coupon">
        						<form action="#">
        							<div class="form__coupon">
        								<input type="text" placeholder="Coupon code">
        								<button>Apply coupon</button>
        							</div>
        						</form>
        					</div>
        				</div>
        			</div> -->
        		</div>
        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Billing details</h3>
        					<div class="customar__field">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<label>First name <span>*</span></label>
	        							<input type="text" name="first_name" value="{{$user->first_name}}" required>
									</div>
									<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									<input type="hidden" name="user_id" value="{{$user->id}}" required>
	        						<div class="input_box space_between">
	        							<label>last name <span>*</span></label>
	        							<input type="text" name="last_name" value="{{$user->last_name}}" required>
	        						</div>
        						</div>
        						<div class="input_box">
        							<label>Address <span>*</span></label>
        							<input type="text" value="{{$user->address}}" name="address" placeholder="Street address" required>
								</div>
								<div class="input_box">
        							<label>City <span>*</span></label>
        							<input type="text" name="city" value="{{$user->city}}" required>
        						</div>
        						<div class="input_box">
        							<label>District<span>*</span></label>
        							<input type="text" name="province" value="{{$user->province}}" required>
								</div>
								<div class="input_box">
        							<label>Country<span>*</span></label>
        							<input type="text" name="country" value="{{$user->country}}" required>
        						</div>
								<div class="input_box">
									<label>Postcode / ZIP <span>*</span></label>
									<input type="text" name="postcode" value="{{$user->postcode}}" required>
								</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone <span>*</span></label>
										<input type="text" name="phone" value="{{$user->phone}}" required>
									</div>

									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" value="{{$user->email}}" required>
									</div>
									<input type="hidden" name="cart_id" value="{{!empty($cart_items[0]->session_id) ? $cart_items[0]->session_id : '' }}">
								</div>
        					</div>
        					<!-- <div class="create__account">
        						<div class="wn__accountbox">
	        						<input class="input-checkbox" name="createaccount" value="1" type="checkbox>
	        						<span>Create an account ?</span>
        						</div>
        						<div class="account__field">
        							<form action="#">
        								<label>Account password <span>*</span></label>
        								<input type="text" 	 placeholder="password">
        							</form>
        						</div>
        					</div> -->
        				</div>
        				<!-- <div class="customer_details mt--20">
        					<div class="differt__address">
	        					<input name="ship_to_different_address" value="1" type="checkbox" 	>
	        					<span>Ship to a different address ?</span>
        					</div>
        					<div class="customar__field differt__form mt--40">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<label>First name <span>*</span></label>
	        							<input type="text" 	>
	        						</div>
	        						<div class="input_box space_between">
	        							<label>last name <span>*</span></label>
	        							<input type="text" 	>
	        						</div>
        						</div>
        						<div class="input_box">
        							<label>Company name <span>*</span></label>
        							<input type="text" 	>
        						</div>
        						<div class="input_box">
        							<label>Country<span>*</span></label>
        							<select class="select__option">
										<option>Select a country…</option>
										<option>Afghanistan</option>
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>American Samoa</option>
										<option>Antarctica</option>
										<option>Antigua and Barbuda</option>
        							</select>
        						</div>
        						<div class="input_box">
        							<label>Address <span>*</span></label>
        							<input type="text" 	 placeholder="Street address">
        						</div>
        						<div class="input_box">
        							<input type="text" 	 placeholder="Apartment, suite, unit etc. (optional)">
        						</div>
        						<div class="input_box">
        							<label>District<span>*</span></label>
        							<select class="select__option"> 
										<option>Select a country…</option>
										<option>Afghanistan</option>
										<option>American Samoa</option>
										<option>Anguilla</option>
										<option>American Samoa</option>
										<option>Antarctica</option>
										<option>Antigua and Barbuda</option>
        							</select>
        						</div>
								<div class="input_box">
									<label>Postcode / ZIP <span>*</span></label>
									<input type="text" 	>
								</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Phone <span>*</span></label>
										<input type="text" 	>
									</div>
									<div class="input_box space_between">
										<label>Email address <span>*</span></label>
										<input type="email" 	>
									</div>
								</div>
        					</div>
						</div> -->
        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Your order</h3>
        					<ul class="order__total">
        						<li>Product</li>
        						<li>Total</li>
							</ul>
							@if(count($cart_items) >= 1)
                            @foreach($cart_items as $c)
        					<ul class="order_product">
        						<li>{{$c->product_name}} × {{$c->quantity}}<span>$ &nbsp;{{$c->total_price}}</span></li>
							</ul>
							@endforeach
							@endif
        					<ul class="shipping__method">
								@if(Session::has('total_amount'))
								<li>Cart Subtotal <span>{{$setting->currency}}{{ Session::get('total_amount')}}</span></li>
								@else
								<li>Cart Subtotal <span>{{$setting->currency}}{{ Session::get('total_price')}}</span></li>
								@endif
								@if($setting->cod == 1)
        						<li>Shipping 
        							<ul>
        								<li>
        									<label>{{$setting->currency}}{{$setting->deliveryfee}}</label>
        								</li>
        								
        							</ul>
        						</li>
								@endif
        					</ul>
        					<ul class="total__amount">
								@if(Session::has('total_amount'))
								<li>Order Total <span>{{$setting->currency}}{{ Session::get('total_amount')}}</span></li>
								@else
								<li>Order Total <span>{{$setting->currency}}{{ Session::get('total_price')}}</span></li>
								@endif
        					</ul>
        				</div>
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						@if($setting->cod == 1)
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span>Cash on Delivery</span>
						          	</a>
						        </div>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
									  <div class="payment-body">
									  <input type="radio" onclick="test(this)" id="radioBtn" name="payment_type" value="cod" >&nbsp; Pay with cash upon delivery.</div>
						        </div>
						    </div>
						@endif
						@if($setting->online_payment == 1)
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingFour">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							            <span>Online Payment  </span>
						          	</a>
						        </div>
						        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
									  
									  <input type="radio" onclick="test(this)" id="radioBtn" name="payment_type" value="online" >&nbsp; Online Payment.
									  <form action="{{route('charge-payment')}}" method="post" id="payment-form">
									  @csrf	
									  <div class="form-row">
											
											<div id="card-element">
												<input type="text" name="payment">
											<!-- A Stripe Element will be inserted here. -->
											</div>
										
											<!-- Used to display form errors. -->
											<div id="card-errors" role="alert"></div>
											<button class="form-control btn btn-primary">Submit Payment</button>
										</div>

										
										</form>
								</div>
						        </div>
							</div>
						@endif
					    </div>
					</div>
				</div>
</br>
				<div class="cartbox__btn">
					<ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between" style="width: 20%;margin: auto;">
						<button class="form-control" style="border:none" onclick="order(event)"><li><a href="#" >Place Order</a></li></button>
					</ul>
				</div>
				</form>
        	</div>
        </section>
        <!-- End Checkout Area -->
		

	</div>
	<!-- //Main wrapper -->    
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
var radioState = false;
function test(element){
	if(radioState == false) {
		check();
		radioState = true;
	}else{
		uncheck();
		radioState = false;
	}
}
function check() {
	document.getElementById("radioBtn").checked = true;
}
function uncheck() {
	document.getElementById("radioBtn").checked = false;
}

function order(e)
{
	var data = $('#order-form').serialize();
	$.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
	$.ajax({
		url: "/create-order",
		type : 'post',
		data: data,
		success: function(result)
		{
			if($.isEmptyObject(result.error))
			{
				e.preventDefault();
				window.location = result;
			}
			else
			{
				printErrorMsg(result.error);
			}
		},
		error: function(error){
			console.log(error);
		}
	});

	function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
}

var stripe = Stripe('pk_test_OFP4VUJQiR5MitcnNrpudcaL00dE9c9tiE');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@stop