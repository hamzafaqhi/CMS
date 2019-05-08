@extends('layouts.backend')
@section('title','SHF | Category')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>All Categories</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-left">
                        <a id="add-button" title="Add New" class="btn btn-success" href="{{route('category.create')}}"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                    <div class="pull-right">
                        <form accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
                            <div class="input-group">
                                <input type="hidden" name="search">
                                <input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
              @if(count($category) > 0)
                <table class="table table-bordered table-condesed">
                  <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Category</th>   
                        <th>Author</th>                                            
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        @foreach($category as $i=>$categories)
                        <td>{{$i+1}}</td>
                        <td>{{$categories->name}}</td>
                        <td>{{$categories->author}}</td>                        
                        <td><abbr title="2016/12/04">{{$categories->created_at->format("Y/m/d")}}</abbr></td>
                        <td width="70">
                          <span>
                            <a categories-id="{{ $categories->id }}" title="Edit" class="btn btn-xs btn-default edit-row" data-toggle="modal" data-target="#edit-modal">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a categories-id="{{ $categories->id }}" title="Delete"  class="btn btn-xs btn-danger delete-row" data-toggle="modal" data-target="#remove-modal">
                                <i class="fa fa-trash"></i>
                            </a>
                            </span>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
               
                @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-left">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Category Modal -->
  <div class="modal fade in" id="edit-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Category</h4>
              </div>
              <div class="modal-body">
                  <form method="post" >
                     <!-- id -->
              <div class="form-group">
                <input type="hidden" name="id" class="form-control" id="id">
              </div>
              <!-- /id -->
              <!-- name -->
              <div class="form-group">
                <label class="box-title">Category Name</label>
                <input type="text" name="modal-input-name" class="form-control" id="modal-input-name" required autofocus>
              </div>
              <!-- /name -->
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!--/Edit Category-->

        <!--Remove Category Modal -->
  <div class="modal fade in" id="remove-modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Category</h4>
              </div>
              <div class="modal-body">
                Are You Sure?
                  <form id="deleteForm" method="post">
                     <!-- id -->
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="remove">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<script>

$(document).ready(function() {
  /**
   * for showing edit item popup
   */
  $('#remove').click(function()
  {
    console.log('remove');
  }

}
</script>
@endsection