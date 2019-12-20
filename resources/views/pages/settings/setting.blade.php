@extends('layouts.backend')
@section('title','SHF | Settings')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small>All Setting</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Setting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Store name</th>
                  <th>Store Owner</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Store name</th>
                  <th>Store Owner</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
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

@endsection
@section('scripts')

<script type="text/javascript">


//loading datatable
$(document).ready(function()
{
  $('#cat_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
        url: "{{ route('setting')}}",
    },
    columns:[
   {
    data: 'store_name',
    name: 'store_name'
   },
   {
    data: 'store_owner',
    name: 'store_owner'
   },
   {
    data: 'address',
    name: 'address'
   },
   {
    data: 'email',
    name: 'email'
   },
   {
    data: 'phone',
    name: 'phone'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
  });

});
</script> 
@stop
