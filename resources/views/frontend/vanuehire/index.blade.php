@extends('layouts.frontend')
@section('title', 'Hire Vanue')
@section('content')
<section class="banner-section">
		<div class="auto-container">

			<div class="row clearfix">
			
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">

						<div class="image">
							<img src="{{asset('frontend')}}/images/1.webp" alt="">
						</div>
						<!--<div class="image-two">-->
						<!--	<img src="{{asset('frontend')}}/images/2.webp" alt="">-->
						<!--</div>-->
						<div class="image-content" style="background-image: url(frontend/images/main-slider/pattern-6.png)">
							<p>Starting £10 <br> per hour</p>
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="title">Venues Available for Hire - Forest Gate, Plaistow, Ilford</div>
						<h1> Hiring Our Premises <br>for Classes or   <br> Training (Weekdays)</h1>
						<div class="btns-box">
							<a href="{{url('/contact')}}" class="theme-btn btn-style-one"><span class="txt">Contact Us</span></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	
	<section class="benefit-section">
		<!--<div class="background-layer-one" style="background-image:url(frontend/images/background/pattern-5.png)"></div>-->
		<!--<div class="background-layer-two" style="background-image:url(frontend/images/background/pattern-6.png)"></div>-->
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Images Column -->
				<div class="images-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<!--<div class="pattern-layer" style="background-image:url(frontend/images/background/pattern-3.png)"></div>-->
						<!--<div class="pattern-layer-two" style="background-image:url(frontend/images/background/pattern-4.png)"></div>-->
						<div class="color-layer"></div>
						<div class="image">
							<img src="{{asset('frontend')}}/images/2.webp" alt="">
						</div>
						<div class="image-two">
							<img src="{{asset('frontend')}}/images/resource/benefit-3.jpg" alt="">
						</div>
						<div class="image-three">
							<img src="{{asset('frontend')}}/images/resource/benefit-2.jpg" alt="">
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title" style="margin-bottom:10px">
							<div class="title">More Details</div>
							<h2>Why Hire Our Premises?</h2>
						</div>
						<ul class="list-style-one">
							<li><span class="icon flaticon-double-check"></span><strong>Three Convenient Locations:</strong>54 Upton Lane, Forest Gate, E7 9N
2-4 Cumberland Road, Plaistow, E13 8NH
269 Ilford Lane, Ilford, IG1 2SD</li>

							<li><span class="icon flaticon-double-check"></span><strong>Flexible Hiring Terms: </strong>Whether you need space for a single day, weekly sessions, or a long-term arrangement, we offer flexible contracts tailored to your needs.
</li>
							<li><span class="icon flaticon-double-check"></span><strong>Modern Facilities:</strong>All of our branches are equipped with clean, spacious rooms, projectors, whiteboards, Wi-Fi, and more to accommodate a range of activities, from educational classes to corporate training.</li>
							<li><span class="icon flaticon-double-check"></span><strong>Competitive Rates:</strong>As our centers are unoccupied during daytime hours, we offer highly competitive rates to ensure both parties benefit.</li>
					
						</ul>
						<div class="btn-box">
							<a href="{{ url('/') }}" class="theme-btn btn-style-two"><span class="txt">Contact Us</span></a>
						</div>
					</div>
				</div>
				
			</div>
			
	
			
		</div>
	</section>
	
	<section class="feature-section">
		<div class="pattern-layer" style="background-image:url(frontend/images/background/pattern-7.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<div class="title">Contact Us Today!</div>
							<h2>For more information or to book a viewing, please contact us at:</h2>
							<div class="text">Phone:0208 616 2526</div>
							<div class="text">Email: info@examcentrelondon.co.uk</div>
								
						</div>
						<!--<div class="btn-box">-->
						<!--	<a href="about.html" class="theme-btn btn-style-two"><span class="txt">Short courses</span></a>-->
						<!--</div>-->
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-5 col-md-12 col-sm-12">
			
				</div>
				
			</div>
			
		</div>
	</section>
@endsection