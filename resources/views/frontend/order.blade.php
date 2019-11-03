@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')

@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

<div class="container order_wrap">
	<div class="row">

	<div class="col-md-8">
      <form action="{{route('orders.post')}}" method="post" role='form'>
		    @csrf
			<div class="">
				<h3>Order Summery:</h3>
				<table class="table order_summery">
				<tr>

					<th>Product Name</th>
					<th>Product_type</th>
			        <th style="max-width: 200px">Product_details</th>
					<th>Unit Price</th>
					<th>Quantityt</th>
					<th>Sub Total</th>
					<th>Status</th>
					<!-- <th>Action</th> -->

				</tr>
				@php
				$total=0;
				@endphp
				<!-- For Loop -->
				@foreach($cart_info as $data)
				<tr>
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
					<!-- <td>
						<a href="" class="btn btn-info">Edit</a>
                <a href="{{route('delete.order',$data->id)}}" class="btn btn-danger">Delete</a>
					</td> -->
				</tr>

				@php
				$total=$total+$data->sub_total;
				@endphp
				@endforeach
				<tr>
					<td></td>
					<td colspan="4">Total:</td>
					<td>{{$total}}</td>
					<td></td>
				</tr>
				<!-- End Loop -->
			</table>

			    <section>
					<button type="submit" class="btn btn-primary">Order Confirm</button>
			    </section>
			</div><!-- .prod_dtls -->
		</div><!-- .col-4 -->


		<div class="col-md-4">
			<div class="delivery_info">

				<h3>Terms&Conditions</h3>
				<section>
					<p>->Inside Dhaka Delivery will be tk.60 </p>
					<p>->Outside Dhaka Delivery will be tk.100</p>
					<p>->Minimum order amount must be equal to or greater than Tk. 500.00</p>
					<p>->Sold food items cannot be changed, returned or refunded.</p>
				</section>
				<h3>Payment Method</h3>
					<label for="payment">How you want to payment:</label>
					<select type="text" name="payment" id="payment" required>
                        <option value="bkash">Bkash - 01711111</option>
                        <option value="rocket">Rocket - 01714545</option>
					    <option value="Cash In Delevery">Cash In Delevery</option>
					</select>
                <div class="reg_frm">
                    <label for="email"><b>Pay Amount</b></label>
                    <input type="number" id="email" placeholder="Enter Amount" name="pay_amount" required/>
                </div>
                <section class="odr_time">
					<label for="appt">Choose a Date for Delevery:</label>
					<input type="date" id="start" name="date" value="{{ date('Y-m-d')}}" min="{{ date('Y-m-d')}}" />

					<label for="appt">Choose a Time for Delevery:</label>
					<input type="time" id="appt" name="time" value="13:30" required />
				</section></br>
					<h3>Delivery Method</h3>
				<section>
					<label for="id">How you want to get this product:</label>
					<select type="text" name="delivery" id="id" required>
					<option value="Pickup">Pickup</option>
					<option value="Delivery">Delivery</option>
					</select>
				</section>
			</div><!-- .prod_custom -->
		</div>
	</form>
	</div>
</div>
@include('frontend.partial.footer')
