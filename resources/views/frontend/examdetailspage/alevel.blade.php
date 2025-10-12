@extends('layouts.frontend')
@section('title', 'A-Level Exams London | Private & Flexible Booking | Exam Centre London')
@section('meta_description', 'Register for private A-Level exams in London with Exam Centre London. Flexible exam dates, expert support, and a wide range of subjects available. Book today!')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Exams</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('a-level-exams') }}">A Level Exam</a></li>
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
						<b>A Level Exam</b>
						<h1>Book Comprehensive  <span>A-Level Exams in London</span></h1>
						<p>Thousands of home learners, distance learners, and independent candidates across London and Essex trust us for their A-Level exams. Our experienced tutors provide tailored tuition, exam preparation, and affordable assessments to meet your needs.</p>
						<a href="{{ url('exam-booking-alevel') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
					<div class="contact_us a_level_exams_subjects">
						<div class="contact_us_left get_in_touch_left">
							<div class="contact_us_left_items get_in_touch_right_items a_level_exams_left">
								<ul>
									<li><a href="#" class="contact_us_items_bg contact_a1">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon5.png" alt="">
										Independent
									</a></li>
									<li><a href="tel:0208-616-2526" class="contact_us_items_bg alevel_exams2">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon4.png" alt="">
										 JCQ approved Assessment Centre
									</a></li>
									<li><a href="mailto:info@examcentrelondon.co.uk" class="contact_us_items_bg alevel_exams3">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/people.png" alt="">
										individual and group tuition
									</a></li>
								</ul>
							</div>
						</div>
						<div class="contact_us_right a_level_exams_right">
							<div class="a_level_exams_right_title">
								<h3>A LEVEL SUBJECTS</h3>
								<p>We offer a wealth of different A-Level options and are always happy to consider offering a subject of your choice if not listed below. Please get in touch to chat through your requirements and we’ll be happy to help.</p>
							</div>
							<div class="a_level_exams_right_contents">
								<ul>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Accounting</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Chemistry</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Geography</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Biology</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Religious studies</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Maths</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Bengali</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Statistics</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Law</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Art & design</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Further Maths</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Statistics</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Business studies</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Economics</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Phycology</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Arabic</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">English</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Physics</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Computer Science</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">History</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Sociology</li>
								</ul>
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
						<h3>A Level Exam Bodies</h3>
						<p>We work in partnership with a range of Awarding Bodies (often referred to as Exam Bodies). We offer A-Levels with the following Awarding Bodies:</p>
					</div>
					<div class="exam_board_items a_lavel_exam_bodies_items">
						<ul class="owl-carousel owl-theme">
							<li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board1.png" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board2.png" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board4.png" alt=""></a></li>
							<li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board5.png" alt=""></a></li>
						</ul>
					</div>

					<div class="a_lavel_exam_bodies_calender">
						<div class="a_lavel_exam_bodies_calender_img">
							<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
							<div class="a_lavel_exam_bodies_calender_date">
								<h4>November</h4>
							</div>
						</div>
						<div class="a_lavel_exam_bodies_calender_contents">
							<h4>November Re-Sit</h4>
							<p>We offer A-Level(Only CIE) Re-Sit Examinations in November. This is a popular option for School and College Leavers who wish to improve their grade(s). <br>Please contact us on 0208 616 25 26 for more information.</p>
							<div class="alebcc_btns">
								<a href="{{ url('/exam-booking-alevel') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
								<a href="{{ url('/exam-fees') }}" class="btn_style btn_style2">Our Exam Fee Details <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
							</div>
						</div>
					</div>

					<div class="a_level_exams_practical">
						<div class="a_level_exams_practical_contents">
							<h3>A-Level Practical Assessments</h3>
							<p>Exam Centre London partners with Merit Tutors to provide A-Level practical exams in Biology, Chemistry, and Physics. Held in equipped labs within Newham, sessions are supervised by qualified tutors. Spring half-term practice sessions prepare candidates to confidently and safely conduct experiments, with labs risk-assessed for safety.</p>
						</div>
						<div class="a_level_exams_practical_contents">
							<h3>Hands-On Practical Experience</h3>
							<p>Each session, led by a tutor with up to five candidates, allows learners to familiarize themselves with lab equipment and techniques. Tutors demonstrate core skills, answer questions, and provide feedback. The five-day course ends with an assessed session. Fee details for the course are available here.</p>
						</div>
						<div class="a_level_exams_practical_pos">
							<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/square.png" alt="">
						</div>
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
						<h3>A-Level Exam Booking</h3>
						<p>We work with a distance learning providers to offer assessments that fit their requirements. If you are studying a distance learning course and interested in sitting your assessment in one of our centres, contact us to see how we can help.</p>
						<a href="{{ url('exam-booking-alevel') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A-Level Exam Booking) Section  ================-->
@endsection
