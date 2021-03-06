@extends('layouts.backend')
@section('title','SHF | Returns')
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/all.css')}}">
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
        Orders
        <small>All Return Orders</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="active">Return Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Return Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="cat_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order Code</th>
                  <th>First Name</th>
                  <th>Phone</th>
                  <th>Payment Type</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Post Code</th>
                  <th>Email</th>
                  <!-- <th>Total Amount</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                <th>Order Code</th>
                  <th>First Name</th>
                  <th>Phone</th>
                  <th>Payment Type</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Province</th>
                  <th>Post Code</th>
                  <th>Email</th>
                  <!-- <th>Total Amount</th> -->
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
        <h4 class="modal-title font-weight-bold" style="font-color=white;" >Edit Tag</h4>
      </div>
      <!--Body-->
      <div class="modal-body">

      <span id="form_result"></span>
         <form  id="edit_form" class="form-horizontal" method="post" >
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
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Amount:</label>
          <input type="text" id="amount" name="amount" class="form-control validate">
          <br>
          </div>
          @if ($errors->has('amount'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('amount') }}</strong>
              </span> 
          @endif  
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Amount Type:</label>
                <select name="amount_type" id="amount_type" class="form-control select2" style="width: 100%;">
                    <option value="null" selected="selected"></option>
                    <option value="percentage">Percentage</option>
                    <option value="fixed">Fixed</option>
                </select>
          <br>
          </div>
          @if ($errors->has('amount_type'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('amount_type') }}</strong>
              </span> 
          @endif  
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" class="form-control pull-right" id="datepicker">
          <br>
          </div>
          @if ($errors->has('expiry_date'))
              <span class="help-block">
              <strong style="color:red">{{ $errors->first('expiry_date') }}</strong>
              </span> 
          @endif  
          <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="name">Enable:
            <input type="checkbox" id="status" name="status" class="minimal" value="1" >
          </label>
          <br>
          </div>
          
          <hr>
          <input type="hidden" name="id" id="hidden_id" />
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
<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript">


//loading datatable
$(document).ready(function()
{
  $('#cat_table').DataTable({
    processing: true,
    serverSide: true,
    ajax:{
        url: "{{ route('returns')}}",
    },
    columns:[
   {
    data: 'order_code',
    name: 'order_code'
   },
   {
    data: 'first_name',
    name: 'first_name'
   },
   {
    data: 'phone',
    name: 'phone'
   },
   {
    data: 'payment_type',
    name: 'payment_type'
   },
   {
    data: 'address',
    name: 'address'
   },
   {
    data: 'city',
    name: 'city'
   },
   {
    data: 'province',
    name: 'province'
   },
   {
    data: 'post_code',
    name: 'post_code'
   },
   {
    data: 'email',
    name: 'email'
   },
//    {
//     data: 'total_amount',
//     name: 'total_amount'
//    },
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
   url:"voucher/"+id+"/delete",
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
   url:"voucher/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#amount').val(html.data.amount);
    $('#amount_type').val(html.data.amount_type);
    $('#expiry_date').val(html.data.expiry_date);
    console.log(html.data.status)
    if(html.data.status == 1 )
    {
      $('#status').attr('checked', true);
    }
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
var data = $('#edit_form').serialize();
$.ajax({
    url:"voucher/update",
    method:"POST",
    data: data,
    dataType:"json",
    success:function(data)
  {
      $('#edit_form').trigger("reset");
      $('#edit_modal').modal('hide');
      $('#cat_table').DataTable().ajax.reload();
  },
  error: function (data)
  {
      alert('Unable to edit');
  }
  });
});
}); 

$('#datepicker').datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
})
</script> 
@stop
