@extends('layouts.backend')
@section('title','SHF | Add new Voucher')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Vouchers
          <small>Add Voucher</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('vouchers') }}">Voucher</a></li>
          <li class="active">Add Voucher</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
	        <button type="button" class="close" data-dismiss="alert">×</button>	
          </div>
      @endif
      <div class="box">     
      <form method="POST" action="{{ action('VoucherController@store') }}" >
        @csrf        
          <div class="box-header">
            <h3 class="box-title">Voucher Code:</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="name" id="name" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('name'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('name') }}</strong>
              </span> 
              @endif           
            </div>
            <div class="box-header">
                <h3 class="box-title">Amount Type:</h3>
            </div>
            <div class="box-body pad">
                <div class="form-group">
                
                    <select name="amount_type" class="form-control select2" style="width: 100%;">
                        <option value="null" selected="selected"></option>
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed</option>
                    </select>
                </div>
                @if ($errors->has('amount_type'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('amount_type') }}</strong>
              </span> 
              @endif     
            </div>
            
            <div class="box-header">
                <h3 class="box-title">Amount:</h3>
            </div>
            <div class="box-body pad">
              <input type="number" class="form-control" name="amount" id="price" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('amount'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('amount') }}</strong>
              </span> 
              @endif           
            </div>
               
                <div class="box-header">
                    <h3 class="box-title">Expiry Date:</h3>
                </div>
                <div class="box-body pad">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="expiry_date" class="form-control pull-right" id="datepicker">
                    </div>
                @if ($errors->has('expiry_date'))
                <span class="help-block">
                <strong style="color:red">{{ $errors->first('expiry_date') }}</strong>
                </span> 
                @endif     
                </div>

            <div class="box-body pad">
               
                <label class="form-control" style="border:none !important" >
                Enable &nbsp;
                <input type="checkbox" name="status" class="minimal" value="1" >
                </label>
            </div>
                    
                  
          
                <!-- /.input group -->
    </div>
    
        
           
            <button type="submit" class="btn btn-primary">Save</button>
            <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('vouchers')}}">Cancel</a> 
          </form> 
            <!-- /.content -->
            </section>
          </div>

@endsection
@section('scripts')
<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  
//Date picker
$('#datepicker').datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
})

</script>
@endsection