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
        url: "{{ route('category.index')}}",
    },
    columns:[
      {
        data:'name',
        name:'name'
      },
      {
        data:'action',
        name:'action',
        orderable: false
      }
    ]
  });
//Datable reloading end

//Delete table row
 var id;
 $(document).on('click', '.delete', function(){
  id = $(this).attr('id');
  $('#remove_modal').modal('show');
 });

 $.ajaxSetup
 ({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });

 $('#remove_button').click(function(){
  $.ajax({
   type: "DELETE",
   url:"category/"+id+"/delete",
   beforeSend:function(){
    $('#remove_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#remove_modal').modal('hide');
     $('#cat_table').DataTable().ajax.reload();
    }, 2000);
   }
  })
 });
//Deleting end

//Editing datatable
var edit_id
$(document).on('click', '.edit', function(){
  edit_id = $(this).attr('id');
  $('#edit_modal').modal('show');
 });

$(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"category/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#description').val(html.data.description);
    $('#hidden_id').val(html.data.id);
    $('#formModal').modal('show');
   }
  })
 });
//Editing end

$('#editBtn').click(function (e) {
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
  });
e.preventDefault();
$.ajax({
  url: "category/update",
  type: "POST",
  data:{
    name: jQuery('#name').val(),
    description: jQuery('#description').val(),
    id: jQuery('#hidden_id').val(),
    },
  dataType: 'json',
  success: function (data)
  {
      $('#edit_form').trigger("reset");
      $('#edit_modal').modal('hide');
      toastr.success('Category Updated Successfully.', 'Success Alert', {timeOut: 5000});
      $('#cat_table').DataTable().ajax.reload();
  },
  error: function (data)
  {
      console.log('Error:', data);
      alert('Unable to edit');
  }
  });
});
}); 
</script> 
@stop