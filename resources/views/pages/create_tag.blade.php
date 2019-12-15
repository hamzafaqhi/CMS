@extends('layouts.backend')
@section('title','SHF | Add new Tag')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{$message}}.
                <button type="button" class="close" data-dismiss="alert">×</button>	
            </div>
@endif
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tags
          <small>Add Tags</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('manu.index') }}">Tags</a></li>
          <li class="active">Add Tags</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
      @if ($errors->any())
          <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"> </i>{{ implode('', $errors->all('<div>:message</div>')) }}
	        <button type="button" class="close" data-dismiss="alert">×</button>	
          </div>
      @endif
      <div class="box">     
      <form method="POST" action="{{ action('TagController@store') }}" >
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
      </div> 
        
           
            <button type="submit" class="btn btn-primary">Save</button>
          <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('tags')}}">Cancel</a> 
          </form> 
            <!-- /.content -->
            </section>
          </div>

@endsection