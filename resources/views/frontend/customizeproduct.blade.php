@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>

@endif
<form action="{{route('customize.cart.add',$all_products->id)}}" method="post" role="form">
@csrf
<div class="wrap cat_wrap">

	<div class="single_prod">
		    <img src="{{url('/product_image/'.$all_products->product_image)}}">
            <h4>Name:{{$all_products->product_name}}</h4>
    </div>
    
	<div class="prod_custom">
		<h3>Custom Product</h3>
		<section>
			<label for="category">Shape: </label>
            <select class="form-control" id="category"  name="details[shape]">
				<option value="round"> Round </option>
				<option value="rectangle"> Rectangle </option>
				<option value="suqaer"> Suqaer </option>
				<option value="love"> Love </option>
			</select>
		</section>
		
		<section>
		<label for="category">Size: </label>
            <select class="form-control" id="category"  name="details[size]">
				
				<option value="10"> 10 inch </option>
				<option value="12"> 12 inch </option>
				<option value="24"> 24 inch </option>
				<option value="36"> 36 inch </option>
				<option value="48"> 48 inch </option>
			</select>
		</section>
		
		<section>
			<label for="category">Level: </label>
            <select class="form-control" id="category"  name="details[level]">
				<option value="1"> 1 </option>
				<option value="2"> 2 </option>
				<option value="3"> 3 </option>
				<option value="4"> 4 </option>
			</select>
		</section>
		
		<section>
			<label for="category">Quantity: </label>
            <select class="form-control" id="category"  name="details[qty]">
				<option value="1kg"> 1kg </option>
				<option value="2kg"> 2kg </option>
				<option value="3k"> 3kg </option>
				<option value="4kg"> 4kg </option>
				
			</select>

			<!--  -->

		 <section>
			<label for="category">Condition: </label>
            <select class="form-control" id="category"  name="details[condition]">
				<option value="suger free"> Sugar Free </option>
				<option value="eggless"> Eggless </option>
				<option value="butter free"> Butter Free </option>
				<option value="butter free">No Condition </option>
			</select>
          </section>
		
		<section>
			
				<label for="category">Ingredients: </label>
            <select class="form-control" id="category"  name="details[ingredients]">
		        <option> chocolates</option>       
		        <option> Vanilla </option>      
		        <option> Pineapple </option>      
		        <option> ButterScotch</option>       
		        <option> Bluberry</option>
		    </select>       
		</section>
		<div class="biseller-name">
					
					<button type="submit" class="add2cart"><span>| Add to Cart</span></button>
						
					 <a href="{{route('orders')}}"><button class="add2cart">
						    <span> Buy</span>
					</button></a>
			    </div>
						
	        </div>


	</div><!-- .prod_custom -->
</div>

</form>






@include('frontend.partial.footer')