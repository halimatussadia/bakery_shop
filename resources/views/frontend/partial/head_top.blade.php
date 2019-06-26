
<!-- top-header -->
<div class="top-header">
	<div class="container">
		<div class="top-header-left">
			<ul>
				
				@auth()
				<li><a href="{{route('profile')}}">My Profile</a></li>
				@endauth
				<li><a href="checkout.html"></a></li>
				<div class="clearfix"> </div>
			</ul>
		</div>
				<!-- <div class="top-header-center">
					<p><span class="cart"> </span>Cart<label>$5256</label></p>
				</div> -->
				<div class="top-header-right">
					<ul class="log_right">
						@guest()
						<li><a href="{{route('login')}}">Login</a></li>
						<li><a href="{{route('show.form')}}">Register</a></li>
						@endguest


						@auth()
						<li>Welcome {{auth()->user()->name}}</li>
						<li><a href="{{route('logout')}}">Logout</a></li>
						
						@if(auth()->user()->role=='admin')
                           <li><a  href="{{route('dashboard')}}">Dashboard</a></li>
                       @endif
                       @endauth

					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- /top-header -->