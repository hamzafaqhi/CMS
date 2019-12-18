@extends('Frontend.layouts.main')
@section('title','My Account')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('boighor/css/passtrength.css') }}">
@stop
@section('content')	 
<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
		@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
					<button type="button" class="close" data-dismiss="alert">×</button>	
				</div>
		@endif
		@if ($message = Session::get('failure'))
				<div class="alert alert-danger alert-dismissible"><i class="icon fa fa-ban"> </i>{{$message}}.
					<button type="button" class="close" data-dismiss="alert">×</button>	
				</div>
		@endif
		@if ($message = Session::get('warning'))
				<div class="alert alert-danger alert-dismissible"><i class="icon fa fa-ban"> </i>{{$message}}.
					<button type="button" class="close" data-dismiss="alert">×</button>	
				</div>
		@endif
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="{{route('login_user')}}" name="login_form" method="POST">
							@csrf
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" required>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" required>
									</div>
									<div class="form__btn">
										<button>Login</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
											<span>Remember me</span>
										</label>
									</div>
									<a class="forget_pass" href="{{ route('password.request') }}">Lost your password?</a>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form action="{{route('reg_user')}}" name="reg_form" method="post">
							@csrf
								<div class="account__form">
								<div class="input__box">
										<label>Name <span>*</span></label>
										<input type="text" name="name" required>
										@if ($errors->has('name'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('name') }}</strong>
										</span> 
										@endif   
									</div>
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" name="email" required>
										@if ($errors->has('email'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('email') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Phone <span>*</span></label>
										<input type="tel" name="phone" required>
										@if ($errors->has('phone'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('phone') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Address <span>*</span></label>
										<input type="text" name="address" required>
										@if ($errors->has('address'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('address') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>City <span>*</span></label>
										<input type="text" name="city" required>
										@if ($errors->has('city'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('city') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Province <span>*</span></label>
										<input type="text" name="province" required>
										@if ($errors->has('province'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('province') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Country <span>*</span></label>
										<input type="text" name="country" required>
										@if ($errors->has('country'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('country') }}</strong>
										</span> 
										@endif
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" name="password" id="password" required>
										@if ($errors->has('password'))
										<span class="help-block">
										<strong style="color:red">{{ $errors->first('password') }}</strong>
										</span> 
										@endif
									</div>
									<div class="form__btn">
										<button type="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
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
$('#password').passtrength({
  tooltip: true,
  textWeak: "Weak",
  textMedium: "Medium",
  textStrong: "Strong",
  textVeryStrong: "Very Strong",
  passwordToggle:true,
  eyeImg :"boighor/images/eye.svg"
  
});
</script>
@stop