@extends('layouts.backend')
@section('title','SHF | Add new Manufacturer')
@section('stylesheets')
<style>

</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manufacturers
      <small>Add Manufacturers</small>
    </h1>
    <ol class="breadcrumb">
      <li>
          <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
        <li><a href="{{ route('manu.index') }}">Manufacturer</a></li>
        <li class="active">Add Manufacturers</li>
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
        <form method="POST" action="{{ action('ManufactureController@store') }}" enctype="multipart/form-data">
          @csrf        
            <div class="box-header">
              <h3 class="box-title">Name</h3>
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
                <h3 class="box-title">Image</h3>
              </div>
              <div class="box-body pad">
                        <div class="form-group">
                            <input type="file" id="profileImage" name="image" class="form-control" />
                        </div>  
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('image') }}</strong>
                            </span> 
                        @endif                     
                    </div>
        </div> 
          
            
              <button type="submit" class="btn btn-primary">Save</button>
            <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('manu.index')}}">Cancel</a> 
            </form> 
              <!-- /.content -->
  </section>
 </div>

@endsection