@extends('master')
@section('content') 
<!-- <style>
  h2{
    text-align: center;
  };
  
</style> -->

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

<form >

    <h2 style="text-align: center;">Sales Report</h2><hr>
	<label for="appt">From :</label>
	<input type="date" id="start" name="from_date" style="padding:6px" />

	<label for="appt">To:</label>
	<input type="date" id="start" name="to_date" style="padding:6px"/>

	<button type="submit" class="btn btn-info">submit</button>
</form>
		<div class="table-responsive">
	 <table class="table table-striped display table-bordered">
		       <thead>  
		     <tr>
		      <th>Product Name</th>
		      <th>Product Type</th>
		      <th>Quantity</th>
		      <th>Unit Price</th>
		      <th>Sub_Total</th>
		      <th>Date</th>
		    </tr>                                                   
		  </thead>

		  <tbody>
             @foreach($data as $report)
		    <tr>
		      <td>{{$report->product_relation->product_name}}</td>
		      <td>{{$report->product_relation->type}}</td>
		      <td>{{$report->qunt}}</td>
		      <td>{{$report->unit_price}}</td>
		      <td>{{$report->sub_total}}</td> 
		      <td>{{$report->created_at}}</td> 
		    </tr>
		    @endforeach
		  </tbody>
		</table>

    </div>
  </div>
<div>
	<form class="print_order">
        <input class="btn btn-info" type="button" onClick="PrintDiv();" value="Print This Order">
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