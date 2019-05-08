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
      <div class="card uper">
      <form method="POST" action="{{ action('CategoryController@store') }}">
        @csrf
      <div class="form-group">   
      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
          </div>
          @endif       
              <label for="name">Category Name:</label>
              <input type="text" class="form-control input-lg" name="category_name" id="category_name"/>
              @if ($errors->has('category_name'))
              <br>
              <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $errors->first('category_name') }}</strong></div>
              @endif
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('dashboard')}}">Cancel</a>        
      </form>
  </div>
</section>
      <!-- /.content -->
</div>

@endsection