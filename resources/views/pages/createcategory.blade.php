@extends('layouts.backend')
@section('title','SHF | Add new Category')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> -->
<style>
 
/*start of radio button style*/
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
.radioLeft input{
    text-align: left;
    display:inline;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

/*end of radio button style*/
</style>
@endsection
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
<div class="box">
<div class="box-header">
              <h3 class="box-title">Sort Order:</h3>
            </div>
            <label  style="margin-left:25px;" class="container radioLeft ">Top
            <input type="radio"  name="sort_order" onclick="test(this)" id="radioBtn" value ="1">
            <span class="checkmark"></span>
            </label>
</div>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Parent:</h3>
            </div>
            <div class="box-body pad">
                
                <select name="parent_id" class="form-control select2">
                  <option selected="selected"><option>
                    
                  @foreach($category as $c)
                  <option  value="{{ ($c->id) }}">{{$c->name}}</option>
                  @endforeach
                </select>
              </div>         
          </div>
                
            <button type="submit" class="btn btn-primary">Save</button>
          <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('dashboard')}}">Cancel</a> 
          </form> 
            <!-- /.content -->
            </section>
          </div>

@endsection
@section('scripts')
<script src="{{asset('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $('.select2').select2()
  var radioState = false;
    function test(element){
        if(radioState == false) {
            check();
            radioState = true;
        }else{
            uncheck();
            radioState = false;
        }
    }
    function check() {
        document.getElementById("radioBtn").checked = true;
        
    }
    function uncheck() {
        document.getElementById("radioBtn").checked = false;
    }
</script>
@endsection