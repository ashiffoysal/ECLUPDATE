@extends('layouts.frontend')
@section('title', 'Proctoring Services | External Exam Venue in London | Exam Centre London')
@section('meta_description', 'Secure a reliable venue for your external exams with Exam Centre London. We offer professional proctoring services for exams like CAT4, scheduled by other institutions. Convenient locations in East London. Book now!')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Exams</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('proctor-exam-details') }}">Proctor Exam</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Sub Menu -->

<!--================  Start (A Level Exams) Section  ================-->
<section class="a_lavel_exams_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_level_exams">
					<div class="section_title high_standard_title">
						<b>Proctor Exam</b>
						<h2>Exam  <span>Centre London</span><span> Proctoring Services:</span></h2>
						<p>For students requiring a venue to take proctored exams, including the CAT4 exam, scheduled by other centres, schools, colleges, or universities, Exam Centre London provides a highly convenient and dependable environment.

							Please take a look at the following details before you book the exam:</p>
						<a href="{{ url('/proctor-exam') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
					<div class="contact_us a_level_exams_subjects">
						<div class="contact_us_left get_in_touch_left">
							<div class="contact_us_left_items get_in_touch_right_items a_level_exams_left">
								<ul>
									<li><a href="#" class="contact_us_items_bg contact_a1">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon5.png" alt="">
										Proctoring Fee: £70 per hour
									</a></li>
									<li><a href="tel:0208-616-2526" class="contact_us_items_bg alevel_exams2">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon4.png" alt="">
										Administrative Fee: £30
									</a></li>
									
								</ul>
							</div>
						</div>
						<div class="contact_us_right a_level_exams_right">
							<div class="a_level_exams_right_title">
								<h3>Service Fees:</h3>
							</div>
							<div class="a_level_exams_right_contents">
								<ul>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Proctoring Fee: £70 per hour</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Administrative Fee: £30</li>
								</ul>
							</div>
							<div class="a_level_exams_right_title">
								<h3>Postal Service for Results:</h3>
							</div>
							<div class="a_level_exams_right_contents">
								<ul>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Within the UK: £20</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Outside the UK: £30</li>
								</ul>
							</div>
							<div class="a_level_exams_right_title">
								<h3>Result Upload:</h3>
								<p>No charge for uploading results to web platforms.</p>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A Level Exams) Section  ================-->
<!--================  Start (A Level Exam Bodies) Section  ================-->
<section class="a_lavel_exam_bodies_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_bodies">

					<div class="exam_board_title a_lavel_exam_bodies_title">
						<h3>University</h3>
						<p>We are accepting candidates from various universities for the proctor exam</p>
					</div>
					<div class="exam_board_items a_lavel_exam_bodies_items">
						<ul class="owl-carousel owl-theme">
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/3.PNG') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/4.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/5.PNG') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/6.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/7.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/8.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/7.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/1.png') }}" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/universityProctor/2.png') }}" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A Level Exam Bodies) Section  ================-->
<!--================  Start (A-Level Exam Booking) Section  ================-->
<section class="a_lavel_exam_booking_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_booking">
					<div class="a_lavel_exam_booking_title">
						<h3>Ready to Book?</h3>
						<p>Please click the link below, fill out the required fields, and submit your form.</p>
						<a href="{{ url('/proctor-exam') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A-Level Exam Booking) Section  ================-->
@endsection
