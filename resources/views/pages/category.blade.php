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
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
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


<!-- page script -->

@endsection
@section('scripts')

<script type="text/javascript">
$(document).ready(function()
{
  $('#cat_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
        url: "{{ route('category.index')}}",
    },
    columns:[
      {
        data:'Category name',
        name:'name'
      },
      {
        data:'action',
        name:'action',
        orderable: false
      }
    ]
  });
});
</script> 
@stop