@extends('layouts.backend')
@section('title','SHF | Manufacturer')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
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
        Banner
        <small>All Banner</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Banner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Banners</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Active</th>
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
        <h4 class="modal-title font-weight-bold" style="font-color=white;" >Edit Banner</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

      <span id="form_result"></span>
         <form  id="edit_form" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Title:</label>
          <input type="text" id="title" name="title" class="form-control validate">
          <br>
          </div>
          @if ($errors->has('title'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('title') }}</strong>
              </span> 
              @endif  
          <hr>
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Links:</label>
          <input type="text" id="links" name="links" class="form-control validate">
          <br>
          </div>
          @if ($errors->has('links'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('links') }}</strong>
              </span> 
              @endif  
          <hr>
          <input type="hidden" name="id" id="hidden_id" />
          
          <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="Image">Image:</label>
            
            <input type="file" id="imagepath" name="image" class="form-control validate">
            <span id="store_image"></span>
            <br>
          </div>
            @if ($errors->has('image'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('image') }}</strong>
              </span> 
            @endif  
           <br />
           <div class="md-form mb-5">
            <label class="form-control" style="border:none !important" >
                    Enable &nbsp;
                    <input type="checkbox" id="status" name="status" class="minimal" value="1" >
                </label>
           </div>
           
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

<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script scr="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
<script type="text/javascript">

$('input[type="checkbox"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
})
//loading datatable
$(document).ready(function()
{
  $('#cat_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
        url: "{{ route('banner')}}",
    },
    columns:[
   {
    data: 'title',
    name: 'title'
   },
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/storage/banners/" + data + " width='70' class='img-thumbnail' />";
    },
    orderable: false
   },
   {
    data: 'links',
    name: 'links'
   },
   {
    data: 'status',
    name: 'status'
   },
   {
    data: 'action',
    name: 'action',
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
   url:"ban/"+id+"/delete",
   beforeSend:function(){
    $('#remove_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
      $('#remove_button').text('Delete');
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
   url:"ban/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#title').val(html.data.title);
    $('#store_image').html("<img src={{ URL::to('/') }}/storage/banners/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' id='hidden_image' name='hidden_image' value='"+html.data.image+"' />");
    $('#links').val(html.data.links);
    $('#hidden_id').val(html.data.id);
    if(html.data.status == 1) {
        $('#status').prop('checked',true).iCheck('update');
    }
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
var forms = document.forms.namedItem("edit_form");
var formdata = new FormData(forms);
$.ajax({
    url:"ban/update",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
  {
      $('#edit_form').trigger("reset");
      $('#edit_modal').modal('hide');
      $('#cat_table').DataTable().ajax.reload();
      toastr.success("Banner Updated Successfully");
      // toastr.success('Manufacturer Updated Successfully.', 'Success Alert', {timeOut: 5000});
      
  },
  error: function (data)
  {
      console.log('Error:', data);
      alert('Unable to edit');
  }
  });
});
  $('#imagepath').on('change', function(){
     $("#hidden_image").val('');
     $("#store_image").remove();
     
  });
}); 
</script> 
@stop
