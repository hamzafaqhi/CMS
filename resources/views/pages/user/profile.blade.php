@extends('layouts.backend')
@section('title','SHF | Profile')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('boighor/css/passtrength.css') }}">

@stop
@section('content')
@if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
                <button type="button" class="close" data-dismiss="alert">×</button>	
            </div>
@endif
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Profile
          <small>Edit Profile</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active">Edit Profile</li>
        </ol>
      </section>
      <section class="content">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
                <button type="button" class="close" data-dismiss="alert">×</button>	
            </div>
        @endif
            <div class="box">     
                <form method="POST" action="{{ action('UserController@update') }}" enctype="multipart/form-data">
                    @csrf        
                    <div class="box-header">
                        <h3 class="box-title">Name</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('name') }}</strong>
                        </span> 
                        @endif           
                    </div>
                    
                    <div class="box-header">
                        <h3 class="box-title">Email</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('email') }}</strong>
                        </span> 
                        @endif           
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Phone</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="number" class="form-control" name="phone" id="phone" value="{{$user->phone}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('phone') }}</strong>
                        </span> 
                        @endif           
                    </div>

                    <div class="box-header">
                        <h3 class="box-title">Address</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('address') }}</strong>
                        </span> 
                        @endif           
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">City</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="text" id="city" name="city" value="{{$user->city}}" class="form-control" />
                        </div>  
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('city') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                
                    <div class="box-header">
                        <h3 class="box-title">Province</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="text" id="province" name="province" value="{{$user->province}}" class="form-control" />
                        </div>  
                        @if ($errors->has('province'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('province') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Country</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="text" id="country" name="country" value="{{$user->country}}" class="form-control" />
                        </div>  
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('country') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Old password</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="password" id="oldpassword" name="old_password" class="form-control" />
                        </div>  
                        @if ($errors->has('old_password'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('old_password') }}</strong>
                            </span> 
                        @endif
                        @if ($message = Session::get('failure'))
                            <span class="help-block">
                                <strong style="color:red">{{$message}}</strong>
                            </span> 
                        @endif   
                                        
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Password</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control password" />
                        </div>  
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('password') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Confirm Password</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                        </div>  
                        @if ($errors->has('confirm_password'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('confirm_password') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                  
                </div>  
            <button type="submit" class="btn btn-primary">Edit</button>
            <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('dashboard')}}">Cancel</a> 
            </form> 
            <!-- /.content -->
    </section>
</div>
      <!-- Main content -->

@endsection
@section('script')
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
  
</script>
@endsection