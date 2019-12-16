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
        THEMES
        <small>All themes</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Themes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
      
<table class="table" align="center">
  <tr>
    <td>
<img src="boighor/images/themes/1.png" width="150" height="250">
      <a href="http://localhost:8000/dashboard/1" target="_blank"><i class="fa fa-circle-o"></i> THEME 1</a></td>
   <td><img src="boighor/images/themes/2.png" width="150" height="250">
    <a href="http://localhost:8000/dashboard/2" target="_blank"><i class="fa fa-circle-o"></i> THEME 2</a></td>
    <td><img src="boighor/images/themes/3.png" width="150" height="250">
      <a href="http://localhost:8000/dashboard/3" target="_blank"><i class="fa fa-circle-o"></i> THEME 3</a></td>
  </tr>

 <tr>
    <td><img src="boighor/images/themes/4.png" width="150" height="250">
      <a href="http://localhost:8000/dashboard/4" target="_blank"><i class="fa fa-circle-o"></i> THEME 4</a></td>
   <td><img src="boighor/images/themes/5.png" width="150" height="250">
    <a href="http://localhost:8000/dashboard/5" target="_blank"><i class="fa fa-circle-o"></i> THEME 5</a></td><td><img src="boighor/images/themes/6.png" width="150" height="250">
      <a href="http://localhost:8000/dashboard/6" target="_blank"><i class="fa fa-circle-o"></i> THEME 6</a></td>
  </tr>
<tr>
    <td><img src="boighor/images/themes/7.png" width="150" height="250">
      <a href="http://localhost:8000/dashboard/7" target="_blank"><i class="fa fa-circle-o"></i> THEME 7</a></td>
   
  </tr>


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

      <!--Footer-->
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
  <!--/Edit Category-->


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

console.log(jQuery('#name').val());
alert(jQuery('#hidden_id').val());
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