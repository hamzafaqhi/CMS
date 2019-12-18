@extends('layouts.backend')
@section('title','SHF | Category')
@section('stylesheets')
<style>
.modal-header-primary {
	color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #428bca;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}

</style>
@stop
@section('content')

<div class="content-wrapper">
<div id="vouch" class="alert alert-success admin" style="display:none">
    <strong>Success!</strong>User is now admin!
</div>
<div class="alert alert-danger deactivated" style="display:none" role="alert">
<strong>Success!</strong>User Deactivated
</div>
<div class="alert alert-success activated" style="display:none" role="alert">
<strong>Success!</strong>User Activated!
</div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>All Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Country</th>
                  <th>Disable</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Country</th>
                  <th>Disable</th>
                  <th>Actions</th>
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

<!-- Central Modal Medium Info -->
<!-- Button trigger modal-->

<!-- Modal: modalCart -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="Edit Modal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 12px; ">
      <!--Header-->
      <div class="modal-header modal-header-primary" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title font-weight-bold" style="font-color=white;" >Edit Category</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

      <span id="form_result"></span>
         <form  id="edit_form" class="form-horizontal" method="post">
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Name:</label>
          <input type="text" id="name" name="name" class="form-control validate">
          <br>
          </div>
          @if ($errors->has('name'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('name') }}</strong>
              </span> 
              @endif  
          <hr>
          <input type="hidden" name="id" id="hidden_id" />
          <div class="md-form">
          <label data-error="wrong" data-success="right" for="description">Description:</label>
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
           <br />
         </form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="editBtn">Edit</button>
      </div>
    </div>
  </div>
</div>
  <!--/Edit Category-->
        <!--Remove Category Modal -->
    <div id="remove_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 style="margin:0; align=center;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="remove_button"  class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- page script -->

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
        url: "{{ route('users')}}",
    },
    columns:[
      {
        data:'name',
        name:'name'
      },
      {
        data:'email',
        name:'email'
      },
      {
        data:'phone',
        name:'phone'
      },
      {
        data:'address',
        name:'address'
      },
      {
        data:'city',
        name:'city'
      },
      {
        data:'province',
        name:'province'
      },
      {
        data:'country',
        name:'country'
      },
      {
        data:'disable',
        name:'disable'
      },
      {
        data:'action',
        name:'action',
        orderable: false
      }
    ]
  });
//Datable reloading end

$(document).on('click', '.deactivate', function(e){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
    });
    var id = $(this).attr('id');
    e.preventDefault();
    $.ajax({
    url: "user/deactivate",
    type: "POST",
    data:{user_id: id},
    dataType: 'json',
    success: function (data)
    {
        $('.deactivated').show();
        $('#cat_table').DataTable().ajax.reload();
            setTimeout(()=>{
            $(".deactivated").hide();	
            },2000);
    },
    error: function (data)
    {
        console.log('Error:', data);
        console.log('Unable to edit');
    }
    });
});


$(document).on('click', '.activate', function(e){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
    });
    var id = $(this).attr('id');
    e.preventDefault();
    $.ajax({
    url: "user/activate",
    type: "POST",
    data:{user_id: id},
    dataType: 'json',
    success: function (data)
    {
        $('.activated').show();
        $('#cat_table').DataTable().ajax.reload();
            setTimeout(()=>{
            $(".activated").hide();	
            },2000);
    },
    error: function (data)
    {
        console.log('Error:', data);
        console.log('Unable to edit');
    }
    });
});



$(document).on('click', '.edit', function(e){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
    });
    var id = $(this).attr('id');
    e.preventDefault();
    $.ajax({
    url: "user/update",
    type: "POST",
    data:{user_id: id},
    dataType: 'json',
    success: function (data)
    {
        $('.admin').show();
        $('#cat_table').DataTable().ajax.reload();
            setTimeout(()=>{
            $(".admin").hide();	
            },2000);
    },
    error: function (data)
    {
        console.log('Error:', data);
        console.log('Unable to edit');
    }
    });
});

}); 
</script> 
@stop