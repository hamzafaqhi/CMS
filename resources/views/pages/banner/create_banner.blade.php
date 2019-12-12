@extends('layouts.backend')
@section('title','SHF | Add new Banner')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Banner
        <small>Add Banner</small>
    </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li><a href="{{ route('manu.index') }}">Banner</a></li>
            <li class="active">Add Banner</li>
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
                <form method="POST" action="{{ action('BannerController@store') }}" enctype="multipart/form-data">
                    @csrf        
                    <div class="box-header">
                        <h3 class="box-title">Title</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="title" id="title" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('title') }}</strong>
                        </span> 
                        @endif           
                    </div>

                    <div class="box-header">
                        <h3 class="box-title">Link</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="link" id="link" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('link'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('link') }}</strong>
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
                    <div class="box-body pad">
                        <label class="form-group" style="border:none !important" >
                            Enable &nbsp;
                            <input type="checkbox" name="status" class="minimal" value="1" >
                        </label>
                    </div>
                </div>  
            <button type="submit" class="btn btn-primary">Save</button>
            <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('manu.index')}}">Cancel</a> 
            </form> 
            <!-- /.content -->
    </section>
</div>

@endsection
@section('scripts')
<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>

<script>
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
})
</script>
@endsection