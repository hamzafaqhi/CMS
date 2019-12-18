@extends('layouts.backend')
@section('title','SHF | Add new Page')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        Page
        <small>Add Page</small>
    </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li><a href="{{ route('pages') }}">Page</a></li>
            <li class="active">Add Page</li>
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
                <form method="POST" action="{{ action('CMSPagesController@store') }}" >
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
                        <h3 class="box-title">URL</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="url" id="url" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('url'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('url') }}</strong>
                        </span> 
                        @endif           
                    </div>

                    <div class="box-header">
                        <h3 class="box-title">Description</h3>
                    </div>
                    <div class="box-body pad">
                        <div class="form-group">
                            <textarea name="description" class="form-control" id="" cols="20" rows="10"></textarea>
                        </div>  
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('description') }}</strong>
                            </span> 
                        @endif                     
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Meta Title</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="meta_title" id="meta_title" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('meta_title'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('meta_title') }}</strong>
                        </span> 
                        @endif           
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Meta Description</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="meta_description" id="meta_description" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('meta_description'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('meta_description') }}</strong>
                        </span> 
                        @endif           
                    </div>
                    <div class="box-header">
                        <h3 class="box-title">Meta Keywords</h3>
                    </div>
                    <div class="box-body pad">
                        <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
                        @if ($errors->has('meta_keywords'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('meta_keywords') }}</strong>
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