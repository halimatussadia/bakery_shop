@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')


<div class="biseller-info">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Products</h2>
			</div>
		</div>
		<div class="row prod_slides">
			   @foreach($all_products as $key=>$data)
			   @if(($data->status)=='active')
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div class="prod_bx clearfix">
				<a href="{{route('details',$data->id)}}">	
                  <img src="{{url('/product_image/'.$data->product_image)}}" style="width: 300px; height: 300px;">
				</a>
				 
				<div class="biseller-name">
					<h4>{{$data->product_name}}</h4>
					<p>{{$data->price}}</p>

				    @if(($data->type)=="customize") 

				    	<a href="{{route('productcustomize',$data->id)}}"><button class="add2cart">
				      <span>| customize</span>
			           </button></a>

				    	@else
				    	<a href="{{route('cart.add',[$data->id,'general'])}}"><button class="add2cart">
					<span>| Add to Cart</span>
				</button></a>
				    	@endif
				   
				</div>
				
			</div>
			</div>
			@else
			@endif
			@endforeach
			
		</div>
	</div>
</div>


@include('frontend.partial.footer')