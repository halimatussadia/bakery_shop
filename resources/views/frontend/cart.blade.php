@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')



@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif	

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>

@endif

<div class="wrap">
	<div class="cart_wrap">

	<table class="table">
		<tr>
			<th>Serial</th>
			<th>Product_Name</th>
			<th>Product_Type</th>
			<th style="max-width: 200px">Product_details</th>
			<th>Unit_Price</th>
			<th>Quantity</th>
			<th>Sub_Total</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		<!-- For Loop -->

        @foreach($all_carts as $key=>$data)
		<tr>

			<td>{{$key+1}}</td>
			<td>{{$data->hasProducts->product_name}}</td>
			<td>{{$data->type}}</td>
			<td style="max-width: 200px">
				@if(($data->type)=="customize")
				@foreach(json_decode($data->details) as $key=>$dt)
					<b>{{$key}}:</b>{{$dt}}
				@endforeach
				@else
				{{$data->details}}
				@endif
				
			</td>
			<td>{{$data->unit_price}}</td>
			<td>{{$data->qunt}}</td>
			<td>{{$data->sub_total}}</td>
			<td>{{$data->status}}</td>
			<td>
                <a href="{{route('delete.Cart',$data->id)}}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
		<!-- End Loop -->
	
	<div class="biseller-name">
					<a href="{{route('products')}}"><button class="add2cart">
						    <span>| Shop More</span>
						</button></a>
						<a href="{{route('orders')}}"><button class="add2cart">
						    <span>| Continue</span>
						</button></a>	
					</div>
					<!-- .cart_wrap -->
</div>
 <!-- .wrap -->

</body>

</html>				
