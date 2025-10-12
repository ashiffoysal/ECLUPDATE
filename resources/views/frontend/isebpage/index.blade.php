@extends('layouts.frontend')
@section('title', 'ISEB Exams | Book Common Entrance & Pre-Tests in East London | Exam Centre London')
@section('meta_description', 'Register and book ISEB Common Entrance (11+ & 13+) and Pre-Tests at Exam Centre London. Convenient locations in Ilford and Forest Gate. Secure your child s exam today!')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Exams</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/iseb-details') }}">ISEB Exam</a></li>
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
						<b>ISEB Exam</b>
						<h2>ISEB Exams at Exam  <span>Centre London</span><span>Your Guide to Booking</span></h2>
						<p>Exam Centre London is proud to be a registered centre for the Independent Schools Examinations Board (ISEB). We offer a range of ISEB exams, including the Common Entrance (CE) exams at 11+ and 13+, as well as the Common Pre-Tests. Our aim is to provide a smooth booking experience and a professional, supportive environment for your child’s assessment.
                        </p>
                        <p>Located in the heart of East London, close to transport hubs, Exam Centre London offers accessible and affordable assessment opportunities tailored to our learners’ needs. Our Ilford and Forest Gate Exam Centres provide Assessment solutions for candidates across London and the South-East. We’re proud to have been part of the qualification journey for thousands of candidates from the Centre and Greater London and Essex areas.</p>
						<a href="{{ url('/iseb-booking') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="exam_center_london_main exam_center_london_main_ucas_application">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="exam_center_london">
                    <div class="section_title exam_center_london_title">
                        <b>EXAM CENTRE LONDON | ECL</b>
                        <h2>How to Book ISEB Exams at Exam Centre London</h2>
                        <p>Booking ISEB exams with us is a straightforward process involving two key steps: registering with ISEB and booking the exam at Exam Centre London. Here’s everything you need to know to get started.</p>
                    </div>
                    <div class="ucas_exam_center_london_contents">
                        <div class="ucas_exam_center_london_item" style="max-width: 49% !important;">
                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl1.png" alt="">
                            <span>Step 1: </span>
                            <h3>Register with ISEB</h3>
                            <p>Before booking an exam at our centre, parents must first register their child with the Independent Schools Examinations Board (ISEB). This registration is essential as it provides a Unique Candidate Number (UCN), which is needed to book the exam. Follow these simple steps:
                                1. Visit the ISEB Website: Go to the official ISEB website at [www.iseb.co.uk](https://www.iseb.co.uk).
                                2. Complete the Registration Form: Fill in all required details, including your child’s name, date of birth, current school, and the type of exam they will be taking (11+, 13+ Common Entrance, or Common Pre-Tests).
                                3. Obtain the Unique Candidate Number (UCN): After registration, you will receive a Unique Candidate Number (UCN) for your child. Keep this number safe, as you will need it to book the exam with us.</p>
                        </div>
                        <div class="ucas_exam_center_london_item" style="max-width: 49% !important;">
                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl2.png" alt="">
                            <span>Step 2:</span>
                            <h3>Step 2: Book the Exam with Exam Centre London</h3>
                            <p>Once you have registered with ISEB and obtained the UCN, you can book your child’s exam with Exam Centre London. Here’s how:
                                1. Visit Our ISEB Exam Booking Page: Go to the [ISEB Exams section](https://www.examcentrelondon.co.uk) on our website to access the booking form.
                                2. Complete the Booking Form: Provide your child’s details, including their full name, date of birth, school, and the Unique Candidate Number (UCN). Choose the type of exam (11+, 13+ Common Entrance, or Common Pre-Tests) and your preferred exam date and time.
                                3. Select Your Payment Method: Choose from our secure payment options to complete the booking.
                                4. Submit the Form: Once you’ve completed all the required fields, submit the form to finalise your booking. You will receive a confirmation email from us with all the necessary details, including the exam date, time, and location.</p>
                        </div>
                       
                    </div>
                    <div class="exam_center_london_btn">
                        <a href="{{ url('/iseb-booking') }}" class="btn_style">Book Your Exam Now<span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="a_lavel_exam_booking_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_booking">
					<div class="a_lavel_exam_booking_title">
						<h3>Preparing for the Exam Day</h3>
						<p>After booking, we will provide you with all the necessary information to ensure a smooth experience on exam day. Please follow these guidelines:
                            - Check the Confirmation Email: Review the confirmation email to ensure all details are correct. Contact us immediately if any discrepancies are found.
                            - Bring Required Documents: On the exam day, ensure your child brings the confirmation email, a valid ID (such as a passport or school ID), and any materials specified in the email.
                            - Arrive Early: Plan to arrive at least 30 minutes before the scheduled start time to allow for check-in and any last-minute preparations.</p>
						<a href="{{ url('/iseb-booking') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A-Level Exam Booking) Section  ================-->
@endsection