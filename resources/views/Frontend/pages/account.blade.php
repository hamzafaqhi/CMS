@extends('Frontend.layouts.main')
@section('title','My Account')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('boighor/css/passtrength.css') }}">
<link rel="stylesheet" href="{{ asset('boighor/css/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop
@section('content')	 
<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
		@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
					<button type="button" class="close" data-dismiss="alert">×</button>	
				</div>
		@endif
		<div id="cancelresponse">	
		</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Reset Password</h3>
							<form action="{{route('password-reset')}}" name="reset_password" method="POST">
							@csrf
								<div class="account__form">
                                    <div class="input__box">
										<label>Old Password<span>*</span></label>
										<input type="password" name="old_password" required>
                                    </div>
                                    @if ($message = Session::get('failure'))
                                        <span class="help-block">
										    <strong style="color:red">{{ $message }}</strong>
										</span> 
                                    @endif
                                        <div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" class="password" name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('password') }}</strong>
										</span> 
									@endif
									<div class="input__box">
										<label>Confirm Password<span>*</span></label>
										<input type="password" class="password" name="confirm_password" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('confirm_password') }}</strong>
										</span> 
									@endif
									<div class="form__btn">
										<button>Reset Password</button>
									</div>
								</div>
							</form>
						</div>
                    </div>
                    <div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Update Details</h3>
							<form action="{{route('update_user')}}" name="update_form" method="post">
							@csrf
								<div class="account__form">
                                    <div class="input__box">
                                            <label>Name <span>*</span></label>
                                            <input type="text" name="name" value="{{$user->name}}" required>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('name') }}</strong>
                                            </span> 
                                            @endif   
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
									<div class="input__box">
										<label>Phone <span>*</span></label>
										<input type="tel" name="phone" maxlength="11" value="{{$user->phone}}"  required>
										@if ($errors->has('phone'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('phone') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Address <span>*</span></label>
										<input type="text" name="address" value="{{$user->address}}" required>
										@if ($errors->has('address'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('address') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>City <span>*</span></label>
										<input type="text" name="city" value="{{$user->city}}" required>
										@if ($errors->has('city'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('city') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Province <span>*</span></label>
										<input type="text" name="province" value="{{$user->province}}" required>
										@if ($errors->has('province'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('province') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Country <span>*</span></label>
										<input type="text" name="country" value="{{$user->country}}" required>
										@if ($errors->has('country'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('country') }}</strong>
										</span> 
										@endif
									</div>
									<div class="form__btn">
										<button type="submit">Update</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					@if(!empty($order))
					<div class=" col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Your Orders</h3>
							<div class="table-content wnro__table table-responsive">
								<table id="cart">
                                    <thead>
                                        <tr class="title-top">
											<th class="product-quantity">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
											<th class="product-subtotal">Total</th>											
                                        </tr>
									</thead>
										@foreach($order as $o)
										<h5>Order Code : {{$o->order_code}}</h5>
										@foreach($cart as $c)
                                    <tbody>
										
										
										<td>{{$c->product_name}}</td>
										<td>{{$c->price}}</td>
										<td>{{$c->quantity}}</td>
										<td>{{$c->total_price}}</td>										
									</tbody>
									@endforeach
								</table>
								<div class="cartbox__total__area mt-0">
									<div class="cartbox-total d-flex justify-content-between">
										
										<ul class="cart__total__list">
											<li>Order total</li>
										</ul>
										<ul class="cart__total__tk">
											<li>$ &nbsp;100</li>
										</ul>
										
									</div> 
									<div class="cartbox-total d-flex justify-content-between">
										<ul class="cart__total__tk">
											@if($o->status == "processing")
											<li><a href="#" onclick="cancel('{{$o->id}}',event)">Cancel</a></li>
											@endif
										</ul>
										<ul class="cart__total__tk">
										@if($o->status == "delivered")
											<li><a href="#" onclick="orderReturn('{{$o->id}}',event)">Return</a></li>
										@endif
										</ul>
									</div>
								</div>									
								@endforeach                               
                                
                            </div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</section>
		<!-- End My Account Area -->		
	</div>
    <!-- //Main wrapper -->
@endsection
@section('scripts')

<script src="{{ asset ('boighor/js/passtrength.js')}}"></script>
<script>
$('.password').passtrength({
  tooltip: true,
  textWeak: "Weak",
  textMedium: "Medium",
  textStrong: "Strong",
  textVeryStrong: "Very Strong",
  passwordToggle:true,
  eyeImg :"boighor/images/eye.svg"
  
});
	function cancel(id,e){
		$.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            $.ajax({
                url: "/order/"+id+"/cancel",
                type : 'get',
                dataType:'JSON',
                success: function(result)
                {
					if(result  == false)
					{
						
						$("#cancelresponse").append('<div class="alert alert-danger alert-dismissible"><i class="fa fa-times-circle">Sorry! You cannot cancel your order maximum days limit exceeded </i><button type="button" class="close" data-dismiss="alert">×</button></div>');
						
					}
					else
					{
						$("#cancelresponse").append('<div  class="alert alert-success alert-dismissible"><i class="fa fa-check-circle">Success! Order cancelled Successfully </i><button type="button" class="close" data-dismiss="alert">×</button></div>');
					}
					window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
                },
                error: function(){
                    console.log("error");
                }
            });        
		e.preventDefault();
	}

	function orderReturn(id,e){
		$.ajaxSetup
            ({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            });
            $.ajax({
                url: "/order/"+id+"/return",
                type : 'get',
                dataType:'JSON',
                success: function(result)
                {
					if(result  == false)
					{
						$("#cancelresponse").append('<div class="alert alert-danger alert-dismissible"><i class="fa fa-times-circle">Sorry! You cannot return your order maximum days limit exceeded </i><button type="button" class="close" data-dismiss="alert">×</button></div>');
						
					}
					else
					{
						$("#cancelresponse").append('<div  class="alert alert-success alert-dismissible"><i class="fa fa-check-circle">Success! return request submitted Successfully </i><button type="button" class="close" data-dismiss="alert">×</button></div>');
					}
					window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
                },
                error: function(){
                    console.log("error");
                }
            });        
		e.preventDefault();
	}
</script>
@stop