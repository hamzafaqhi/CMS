@extends('layouts.backend')
@section('title','SHF | Update Settings')
@section('stylesheets')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
<style>
.wizard {
    margin: -30px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 25px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
    .next-step 
    {
      margin: 20px 0 10px !important;
    }
}

</style>
@stop
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Update Settings</li>
      </ol>
    </section>
  <section class="content">
    <div class="box">
      <div class="wizard">
          <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist">

                  <li role="presentation" class="active">
                      <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Store">
                          <span class="round-tab">
                              <i class="glyphicon glyphicon-shopping-cart"></i>
                          </span>
                      </a>
                  </li>

                  <li role="presentation" class="disabled">
                      <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Local">
                          <span class="round-tab">
                              <i class="glyphicon glyphicon-home"></i>
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="disabled">
                      <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Mail">
                          <span class="round-tab">
                              <i class="glyphicon glyphicon-envelope"></i>
                          </span>
                      </a>
                  </li>

                  <li role="presentation" class="disabled">
                      <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Image">
                          <span class="round-tab">
                              <i class="glyphicon glyphicon-picture"></i>
                          </span>
                      </a>
                  </li>
              </ul>
          </div>

          <form role="form" method="post" autocomplete="off"  action="{{ action ('SettingsController@update') }}"  enctype="multipart/form-data">
          @csrf    
          <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="step1">
                    <input type="hidden" name="id" value="{{$setting->id}}">
                      <div class="box-header">
                        <h3 class="box-title">Store Name: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control" name="store_name" id="store_name" value="{{$setting->store_name}}"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('store_name'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('store_name') }}</strong>
                          </span> 
                          @endif           
                        </div>
                      <div class="box-header">
                        <h3 class="box-title">Store Owner: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control" name="store_owner" id="store_owner" value="{{$setting->store_owner}}"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('store_owner'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('store_owner') }}</strong>
                          </span> 
                          @endif           
                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Address: </h3>
                      </div>
                        <div class="box-body pad">
                          <textarea type="text" class="form-control" name="address" id="address"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$setting->address}}</textarea>
                          @if ($errors->has('address'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('address') }}</strong>
                          </span> 
                          @endif           
                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Email: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="email" class="form-control" name="email" id="email" value="{{$setting->email}}"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('email'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('email') }}</strong>
                          </span> 
                          @endif           
                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Telephone: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="number" class="form-control" name="phone" id="phone" value="{{$setting->phone}}"  min="0" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('phone'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('phone') }}</strong>
                          </span> 
                          @endif           
                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Opening Timing: </h3>
                      </div>
                        <div class="box-body pad">
                       
                          <input type="text" class="form-control reservation" name="opening_time" value="{{$setting->opening_time}}" id="reservationtime">

                          @if ($errors->has('opening_time'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('opening_time') }}</strong>
                          </span> 
                          @endif           
                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Closing Timing: </h3>
                      </div>
                        <div class="box-body pad">
                       
                          <input type="text" class="form-control reservation" name="closing_time" value="{{$setting->closing_time}}" id="closing_time">

                          @if ($errors->has('closing_time'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('closing_time') }}</strong>
                          </span> 
                          @endif           
                      </div>
                     
                      <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-primary next-step">Continue</button></li>
                      </ul>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step2">
                      <div class="box-header">
                        <h3 class="box-title">Country: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control" name="country" id="country" value="{{$setting->country}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('country'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('country') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                        <h3 class="box-title">Province: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control" name="province" id="province" value="{{$setting->province}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('province'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('province') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                          <h3 class="box-title">City: </h3>
                        </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control" name="city" id="city" value="{{$setting->city}}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('city'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('city') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                          <h3 class="box-title">Currency: </h3>
                        </div>
                        <div class="box-body pad">
                        <select class="form-control select2" name="currency" style="width: 100%;">
                          <option value="$"  {{$setting->currency == "$"  ? 'selected' : ''}}>Dollar</option>
                          <option value="€" {{$setting->currency == "€"  ? 'selected' : ''}}>Euro</option>
                          <option value="Rs" {{$setting->currency == "Rs"  ? 'selected' : ''}}>Rupee</option>
                        </select>
                          @if ($errors->has('currency'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('currency') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                          <h3 class="box-title">Payment Type: </h3>
                        </div>                     
                        <div class="box-body pad">
                          <input type="hidden"  id="codval" value="{{$setting->cod}}">
                          <label class="form-group" style="border:none !important" >
                              Cash On Delivery &nbsp;
                              <input type="checkbox" name="cod" id="cod" class="minimal" value="1" >
                          </label>
                          <div id="delivery" style="display:none">
                            <h5 class="box-title">Delivery Fee: </h5>
                            <input type="number" class="form-control" name="deliveryfee" id="deliveryfee" value="{{$setting->deliveryfee}}" min="0"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          </div>
                        </div>
                        <div class="box-body pad">
                        <input type="hidden"  id="onlineval" value="{{$setting->online_payment}}">
                          <label class="form-group" style="border:none !important" >
                              Online Payment &nbsp;
                              <input type="checkbox" name="online" id="online" class="minimal" value="1" >
                          </label>
                          <div id="online_pay" style="display: none">
                            <h5 class="box-title">Stripe Key: </h5>
                            <input type="text" class="form-control" name="stripe" id="stripe" value="{{ env('STRIPE_KEY') }}" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          </div>
                          <div id="online_sec" style="display: none">
                            <h5 class="box-title">Stripe Secret: </h5>
                            <input type="text" class="form-control" name="stripe_secret" id="stripe" value="{{ env('STRIPE_SECRET') }}"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          </div>
                        </div>
                        
                      <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                          <li><button type="button" class="btn btn-primary next-step">Continue</button></li>
                      </ul>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step3">
                      <div class="box-header">
                        <h3 class="box-title">Mail Engine: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="hidden" id="mailsetting" name="mailsetting">
                          <input type="text" class="form-control mail" name="mailengine" id="mailengine"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('mailengine'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('mailengine') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                        <h3 class="box-title">Mail Host: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control mail" name="mailhost" id="mailhost"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('mailhost'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('mailhost') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                        <h3 class="box-title">Mail Port: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control mail" name="mailport" id="mailport"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('mailport'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('mailport') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                        <h3 class="box-title">Username: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="text" class="form-control mail" name="username" id="username"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('username'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('username') }}</strong>
                          </span> 
                          @endif           
                        </div>
                        <div class="box-header">
                        <h3 class="box-title">Password: </h3>
                      </div>
                        <div class="box-body pad">
                          <input type="password" class="form-control mail" name="password" id="password"  style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                          @if ($errors->has('password'))
                          <span class="help-block">
                          <strong style="color:red">{{ $errors->first('password') }}</strong>
                          </span> 
                          @endif           
                        </div>
                      <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                          <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                          <li><button type="button" class="btn btn-primary btn-info-full next-step">Continue</button></li>
                      </ul>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="complete">
                  <div class="box-header">
                        <h3 class="box-title">Logo image</h3>
                      </div>
                      <div class="box-body pad">
                        <div class="form-group">
                            <input type="hidden" name="logo_path" id="logo_path" value="{{$setting->logo}}">
                            <input type="file" id="logo" name="logo" class="form-control" />
                        </div>  
                        @if ($errors->has('logo'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('logo') }}</strong>
                            </span> 
                        @endif
                      <img src="{{ URL::to('/') }}/storage/logo/{{$setting->logo}}"  id="logo_path_show"  height="240" width="200px" />

                      </div>
                      <div class="box-header">
                        <h3 class="box-title">Icon image</h3>
                      </div>
                      <div class="box-body pad">
                        <div class="form-group">
                            <input type="hidden" name="icon_path" id="icon_path" value="{{$setting->icon}}">
                            <input type="file" id="icon" name="icon" class="form-control" />
                        </div>  
                        @if ($errors->has('icon'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('icon') }}</strong>
                            </span> 
                        @endif    
                      <img src="{{ URL::to('/') }}/storage/icon/{{$setting->icon}}"  id="icon_path_show"  height="240" width="200px" />

                      </div>
                      <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                          <li><button type="submit" class="btn btn-primary btn-info-full next-step">Save</button></li>
                      </ul>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </form>
      </div>
    </div>
  </section>
  
</div>
@endsection
@section('scripts')
<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>

  $('.mail').change(function()
  {
    $('#mailsetting').remove();
  })
  $('.reservation').timepicker({ 
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '11:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true})

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
    })

    $('#cod').on('ifToggled', function(){
      $('#delivery').toggle();
    });

    $('#online').on('ifToggled', function(){
      $('#online_pay').toggle();
      $('#online_sec').toggle();
    });

    
  $(document).ready(function () {

    $("#logo").change(function(e){
        $('#logo_path').remove();
        $('#logo_path_show').remove();
    });

    $("#icon").change(function(e){
        $('#icon_path').remove();
        $('#icon_path_show').remove();
    });

    var cod = $('#codval').val()
    if(cod == '1')
    {
      $('#cod').iCheck('check');
    }
    else
    {
      $('#cod').iCheck('uncheck');
    }
    
    var online = $('#onlineval').val()
    if(online == '1')
    {
      $('#online').iCheck('check');
    }
    else
    {
      $('#online').iCheck('uncheck');
    }

    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
@stop
