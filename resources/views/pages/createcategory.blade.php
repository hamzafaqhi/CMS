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

      <div class="alert alert-danger print-error-msg" style="display:none">
        <ul>

        </ul>
    </div>

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
</div>
      <!-- /.content -->
    </div>

<script src="/https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<!--<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>-->
<script type="text/javascript">

    $(document).ready(function() {
    $(".btn-submit").click(function(e){
    e.preventDefault();
    console.log('agaya')
    var _token = $("input[name='_token']").val();
    var category_name = $('input[name="quantity"]').val();
    console.log(category_name);

        $.ajax({
            url: "/category/add",
            type:'POST',
            data: {_token:_token,category_name:category_name},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    alert(data.success);
                }else{
                    printErrorMsg(data.error);
                }
            }
        });
    }); 


    function printErrorMsg (msg) {
      console.log(hhhh);
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
});


</script>

@endsection