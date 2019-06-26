@extends('master')
@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif
<!-- main-menu -->
<div class="container">
  <div class="row">
    <div  id="divToPrint" class="col-md-12 order_wrap">
      <div class="head-nav">
        <div class="logo"><a href="#"><img src="{{url('/images/logo-2.png')}}" alt="Logo"
          style="width: 150px;" title="Sweet Cake" /></a></div>
        </div>
        <div class="herader"> 
          <h3>Cakes, Cookies & Confections Shop </h3>
          <p>House 99, Road 4, Block A, Dhaka 1213</p>
        </div><hr>
        <div class="row">
          <div class="col-md-8">
            <div class="author_info">
              <h3>Customer Info:</h3>
              <p>Name:{{$all_details->user->name}}</p>
              <p>Email:{{$all_details->user->email}}</p>
              <p>District:{{$all_details->user->district}}</p>
              <p>Number:{{$all_details->user->number}}</p>
               <p>{{$all_details->order_no}}</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="">
              <h3>Delivery Info:</h3>
              
              <p>Address:{{$all_details->user->address}}</p>
              <p>District:{{$all_details->user->district}}</p>
              <p>Date:{{$all_details->date}}</p>
              <p>Time:{{$all_details->time}}</p>
            </div>
          </div>
        </div><!-- .row -->

        <div class="row">
          <div class="col-md-8">
            <div class="">
              <table class="table table-striped table-bordered">
                <thead>
                 <tr>
                  <th>Product_Name</th>
                  <th>Product_Type</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Sub Total</th>
                </tr>                                                 
              </thead>
              
              @php
              $total=0;
              @endphp

              <tbody>
               @foreach($all_details->orderDetails as $data)
               <tr>
                <td>{{$data->product_relation->product_name}}</td>
                <td>
                  @if(($data->type)=="customize")
                  <a href="{{route('customize',$data->id)}}"><button class="btn btn-primary" style="margin-top:9px; "><span>customize</span></button></a>
                  @else
                  {{$data->type}}
                  @endif 
                </td> 
                <td> {{$data->unit_price}}</td>
                
                <td>{{$data->qunt}}</td> 
                <td>{{$data->sub_total}}</td>  
              </tr>

              @php
              $total=$total+$data->sub_total;
              @endphp
              @endforeach

              <tr>
                <td colspan="4">Total:</td>
                <td >{{$total}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="">
          <h3>Payment Method:</h3>
          
          <p>Payment:{{$all_details->payment}}</p>

        </div> 
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
     <div>
       <form class="complete_order" action="{{route('complete.order',$all_details->id)}}" method="post" role='form'>
        @csrf
        @if($all_details->is_completed)
        <input type="submit" value="Cancel Order" class="btn btn-danger">
        @else
        <input type="submit" value="Completed Order" class="btn btn-success">
        @endif
      </form>
      <form class="complete_order" action="{{route('paid',$all_details->id)}}" method="post" role='form'>
        @csrf
        @if($all_details->paid)
        <input type="submit" value="paid Order" class="btn btn-danger">
        @else
        <input type="submit" value="unpaid" class="btn btn-success">
        @endif
      </form>
      <form class="print_order">
        <input class="btn btn-primary" type="button" onClick="PrintDiv();" value="Print This Order">
      </form>
            
       </div>            
    @stop

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script language="javascript">
      function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=1100,height=700');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="http://localhost/OBS/public/css/app.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
      }
    </script>