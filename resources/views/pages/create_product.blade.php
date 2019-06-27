@extends('layouts.backend')
@section('title','SHF | Add new Product')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Categories
          <small>Add Product</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('category.index') }}">Products</a></li>
          <li class="active">Add Product</li>
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
      <form method="POST" >
        @csrf        
          <div class="box-header">
            <h3 class="box-title">Name</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="product_name" id="product_name" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('product_name'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('product_name') }}</strong>
              </span> 
              @endif           
            </div>
            
            <div class="box-header">
            <h3 class="box-title">Name</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="price" id="price" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('price'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('price') }}</strong>
              </span> 
              @endif           
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
            <h3 class="box-title">Quantity</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="quantity" id="quantity" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('quantity'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('quantity') }}</strong>
              </span> 
              @endif           
            </div>
            
            <div class="box-header">
            <h3 class="box-title">Status</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="status" id="status" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>      
            </div>
            <div class="box-header">
            <h3 class="box-title">Image</h3>
            </div>
            <div class="box-body pad">
                    <input type="file" name="image" class="form-control">
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
            <h3 class="box-title">Length</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="length" id="length" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('length'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('length') }}</strong>
              </span> 
              @endif           
            </div>
            <div class="box-header">
            <h3 class="box-title">Width</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="width" id="width" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('width'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('width') }}</strong>
              </span> 
              @endif           
            </div>
            <div class="box-header">
            <h3 class="box-title">Height</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="height" id="height" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('height'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('height') }}</strong>
              </span> 
              @endif           
            </div>
            <div class="box-header">
            <h3 class="box-title">Weight</h3>
            </div>
            <div class="box-body pad">
              <input type="text" class="form-control" name="weight" id="weight" style="line-height: 18px; border: 1px solid #dddddd; padding: 10px;"/>
              @if ($errors->has('weight'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('weight') }}</strong>
              </span> 
              @endif           
            </div>
            <div class="box-header">
            <h3 class="box-title">Sort Order</h3>
            </div>
            <input type="radio" name="sort_order" value="1"> Top<br>
            </div>
      </div>   
      </div>        
            <button type="submit" class="btn btn-primary">Save</button>
          <a id="can-button" title="Cancel" class="btn btn-default" href="{{route('dashboard')}}">Cancel</a> 
          </form> 
            <!-- /.content -->
            </section>
          </div>
          

@endsection