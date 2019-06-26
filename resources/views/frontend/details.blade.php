@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')


<div class="wrap cat_wrap">

	<div class="single_prod">
		    <img src="{{url('/product_image/'.$all_products->product_image)}}">

    </div><!-- .single_prod -->
	        <div class="prod_dtls">
		    <div class="descrip">

			     <div><label>Name: </label><span>{{$all_products->product_name}}</span></div>
			
			     <div><label>Flavour: </label><span>{{$all_products->flavour}}</span></div>
			    
			     <div><label>Weight: </label><span>{{$all_products->weight}}</span></div>

			    <div><label>Price: </label><span>{{$all_products->price}}</span>
			     </div>

				<div class="biseller-name">
					
					<a href="{{route('cart.add',[$all_products->id,'general'])}}"><button class="add2cart">
							<span>| Add to Cart</span>
						</button></a>
					 <a href="{{route('orders')}}"><button class="add2cart">
						    <span>| Buy</span>
					</button></a>
					<a href="{{route('products')}}"><button class="add2cart">
						    <span>| Back</span>
					</button></a>
					 
			    </div>
						
	        </div>
		</div>
	</div>

@include('frontend.partial.footer')