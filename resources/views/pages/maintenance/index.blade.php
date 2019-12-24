@extends('layouts.backend')
@section('title','SHF | Maintenance')
@section('stylesheets')
@stop
<style>
.ques {
    color: darkslateblue;
}
.switch {
  position: relative;
  display: inline-block;
  width: 260px;
  height: 100px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  overflow: hidden;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #f2f2f2;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  z-index: 2;
  content: "";
  height: 96px;
  width: 96px;
  left: 2px;
  bottom: 2px;
  background-color: darkslategrey;
      -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
  -webkit-transition: .4s;
  transition: all 0.4s ease-in-out;
}
.slider:after {
  position: absolute;
  left: 0;
  z-index: 1;
  content: "YES";
    font-size: 45px;
    text-align: left !important;
    line-height: 95px;
  padding-left: 0;
    width: 260px;
    color: #fff;
    height: 100px;
    border-radius: 100px;
    background-color: #3c8dbc;
    -webkit-transform: translateX(-160px);
    -ms-transform: translateX(-160px);
    transform: translateX(-160px);
    transition: all 0.4s ease-in-out;
}

input:checked + .slider:after {
  -webkit-transform: translateX(0px);
  -ms-transform: translateX(0px);
  transform: translateX(0px);
  /*width: 235px;*/
  padding-left: 25px;
}

input:checked + .slider:before {
  background-color: #fff;
}

input:checked + .slider:before {
  -webkit-transform: translateX(160px);
  -ms-transform: translateX(160px);
  transform: translateX(160px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 100px;
}

.slider.round:before {
  border-radius: 50%;
}
.absolute-no {
	position: absolute;
	left: 0;
	color: darkslategrey;
	text-align: right !important;
    font-size: 45px;
    width: calc(100% - 25px);
    height: 100px;
    line-height: 95px;
    cursor: pointer;
}
</style>
@section('content')

<div class="content-wrapper">
    <div id="maintenanceon" class="alert alert-warning" style="display:none">
      <strong>Warning!</strong>Website is in Maintenance Mode now!
    </div>
    <div id="maintenanceoff" class="alert alert-success" style="display:none">
      <strong>Success!</strong>Website is Live now!
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Maintenance
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Maintenance</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12" style="text-align:center">
            <h1 >Put Website on Maintenance Mode</h1>
            <br>
            <label class="switch">
              <input type="checkbox" name="maintenance" id="maintenance" {{($main == 'true' ? 'checked' : '')}}>
              <span class="slider round"></span>
              <span class="absolute-no">NO</span>
            </label>
          </div>
        </div>
      <!-- ./row -->
    </section>
</div>
@endsection
@section('scripts')
<script>
$('input[type="checkbox"]'). click(function(){
  if($(this). prop("checked") == true)
  {
      $.ajax({
      url:"maintenance/on",
      method:"get",
      contentType: false,
      cache: false,
      processData: false,
      dataType:"json",
      success:function(data)
      {
        $('#maintenanceon').show();
        setTimeout(function() {
        $('#maintenanceon').fadeOut('slow');
        }, 1000);
        window.scrollTo({
        top: 0,
        behavior: 'smooth',
        });
      },
      error: function (data)
      {
          console.log('Error:', data);
          alert('Unable to edit');
      }
    });
  }
  else if($(this). prop("checked") == false)
  {
    $.ajax({
      url:"maintenance/off",
      method:"get",
      contentType: false,
      cache: false,
      processData: false,
      dataType:"json",
      success:function(data)
      {
        $('#maintenanceoff').show();
        setTimeout(function() {
        $('#maintenanceoff').fadeOut('slow');
        }, 1000);
        window.scrollTo({
        top: 0,
        behavior: 'smooth',
        });
      },
      error: function (data)
      {
          console.log('Error:', data);
          alert('Unable to edit');
      }
    });
  }
});
</script>
@stop