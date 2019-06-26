@include('frontend.partial.header')
@include('frontend.partial.head_top')
@include('frontend.partial.main_nav')


<div class="biseller-info">
	<div class="container">
		<h2>Products Category</h2>
		<div class="biseller-column">
			<div class="flexslider carousel">
				<ul class="slides">
					@foreach($all_categories as $key=>$data)
                      @if(($data->status)=='active')
					<li>
						 <a href="{{route('category.products',$data->id)}}"><img src="{{url('/category_image/'.$data->image)}}"style="width: 300px; height: 300px;" </a>
						<div class="biseller-name">
							<h4>{{$data->name}}</h4>
						</div>
											
					</li>
					@else
					@endif
					@endforeach
				</ul>
			</div>
		</div><!-- .biseller-column -->
	</div>
</div>


@include('frontend.partial.footer')