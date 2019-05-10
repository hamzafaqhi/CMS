@extends('layouts.backend')
@section('title','SHF | Add new Category')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Categories
          <small>Add category</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('category.index') }}">Categories</a></li>
          <li class="active">Add Category</li>
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
      <form method="POST" action="{{ action('CategoryController@store') }}">
        @csrf        
          <div class="box-header">
            <h3 class="box-title">Name</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="category_name" id="category_name" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('category_name'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('category_name') }}</strong>
              </span> 
              @endif           
            </div>
      </div> 
          <div class="box">
           <!-- /.box -->
           <div class="box-header">
              <h3 class="box-title">Description
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">              
            <textarea class="textarea" placeholder="Place some text here" id="description" name="description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>  
              @if ($errors->has('description'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('description') }}</strong>
              </span> 
              @endif  
            </div>      
            </div>
           
            <button type="submit" class="btn btn-primary">Save</button>
          <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('dashboard')}}">Cancel</a> 
          </form> 
            <!-- /.content -->
            </section>
          </div>

@endsection