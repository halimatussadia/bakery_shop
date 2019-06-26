@extends('master')
@section('content')

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
            <div class="">
              <table class="table table-striped table-bordered">
                <thead>
                 <tr>
                  <th>Serial</th>
                  <th>Product_Name</th>
                  <th>Product_Type</th>
                  <th>Product_Details</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                  <th>Sub Total</th>
             
                </tr>                                                 
              </thead>
            @php
              $total=0;
              @endphp

              <tbody>
               @foreach($customize as $key=>$data)
               <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->product_relation->product_name}}</td>
                <td>{{$data->type}}</td> 
                <td>
                @if(($data->type)=="customize")
                @foreach(json_decode($data->details) as $key=>$dt)
                  <b>{{$key}}:</b>{{$dt}}
                @endforeach
                @else
                @endif
              </td>
                <td>{{$data->unit_price}}</td>
                <td>{{$data->qunt}}</td> 
                <td>{{$data->sub_total}}</td>
              </tr>
              @php
              $total=$total+$data->sub_total;
              @endphp
              @endforeach
              <tr>
                <td></td>
                <td colspan="5">Total:</td>
                <td >{{$total}}</td>
              
              </tr>
            </tbody>
          </table>
            
        </div>
      </div>
   
    </div>
  </div>
          
    @stop



