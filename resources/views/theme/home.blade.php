@extends('theme.client')
@section('main-content')
    
	<!-- Hero Section end -->
	<section class="hero-section set-bg" data-setbg="{{asset('assets/mondy/img/hero-bg.jpg')}}">
		<div class="container">
			<div class="hero-warp">
				<form class="main-search-form">
					<div class="search-type">
						<div class="st-item">
							<input type="radio" name="st" id="real-estate" checked>
							<label for="real-estate">Real Estate</label>
						</div>
						<div class="st-item">
							<input type="radio" name="st" id="land">
							<label for="land">Land</label>
						</div>
						<div class="st-item">
							<input type="radio" name="st" id="buy">
							<label for="buy">Room</label>
						</div>
						<div class="st-item">
							<input type="radio" name="st" id="rent">
							<label for="rent">Rent</label>
						</div>
						<div class="st-item">
							<input type="radio" name="st" id="agents">
							<label for="agents">Local Contacts</label>
						</div>
					</div>
					<div class="search-input si-v-2">
						<input type="text" placeholder="Search by location">
						<button class="site-btn" type="submit">Search</button>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
				</form>
			</div>
		</div>
	</section>
	<!-- Hero Section end -->
@endsection