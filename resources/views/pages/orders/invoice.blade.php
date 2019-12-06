@extends('layouts.backend')
@section('title','SHF | Invoice')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
        <h1>
          Invoice
          
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="active">Order Invoice</li>
        </ol>
  </section>
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> SHF, Inc.
            <small class="pull-right">Date: {{$data->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ucfirst($user->first_name)}}</strong><br>
            {{$data->address}}<br>
            Email: {{$data->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice {{$data->order_code}}</b><br>
          <br>
          <b>Order ID:</b> {{$data->order_code}}<br>
          <b>Payment Type:</b>&nbsp;{{$data->payment_type}}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $c)
            <tr>      
              <td>{{$c->product_name}}</td>
              <td>{{$c->price}}</td>
              <td>{{$c->quantity}}</td>
              <td>{{$c->total_price}}</td>
             
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Method: &nbsp;{{ucfirst($data->payment_type)}}</p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Status: {{ucfirst($data->status)}}</p>

          <div class="table-responsive">
            <table class="table">
              <!-- <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr> -->
              <!-- <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr> -->
              <!-- <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr> -->
              <tr>
                <th>Total:</th>
                <td>$ {{$total_price}}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        <a href="{{url('/redirect/view/'.$data->status)}}" class="btn btn-default pull-right" >Back</a>
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
  </section>  
</div>

@endsection