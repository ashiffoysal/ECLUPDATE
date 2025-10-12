@extends('layouts.frontend')
@section('title', 'AAT Exams London | Book Now with Exam Centre London')
@section('meta_description', 'Register for AAT exams in London at Exam Centre London. Offering Level 1–4 assessments, flexible scheduling, and expert invigilation. Book your exam today!')
@section('content')
<style>
.a_level_exams_right_contents ul li {
    flex: 0 0 0%;
    font-size: 17px;
    color: #0B0D1E;
    display: contents; 
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}
.ucas_application_process_title p {
    max-width: 100%;
}
</style>
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Exams</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/aat-exams') }}">AAT Exam</a></li>
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
						<b>AAT Exam</b>
						<h1>Book AAT <span> Exams in London – Flexible Dates & Expert Support</span></h1>
						<p>Exam Centre London are proud to partner with AAT to offer assessment options for a suite of Accounting Qualifications. As a licensed AAT Computer-Based-Examination Centre, we follow AAT procedures and protocols.AAT Accounting Qualifications give you practical, internationally recognised finance and accountancy skills that can open doors for you in any industry across the world.AAT short qualifications provide a solid foundation in bookkeeping and accounting software, acting as a good starting point if you’re new to these subjects.</p>
						<p>AAT is open to everyone – you don’t need previous qualifications or experience, and you can work at a pace that fits in with your lifestyle. Whether you’re looking for your first job in accountancy, or simply want to enhance your existing accounting skills, AAT will give you the training you need.AAT offers a range of benefits for student members (including study support, career advice to help find the perfect job and exclusive discounts), as well as a route into chartered accountancy. If you choose to further your studies with one of the leading chartered professional bodies, such as ACCA, CIPFA or CIMA, your AAT qualification will give you generous exemptions.</p>
						<a href="{{ url('exam-booking-aat') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
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
								<h3>AAT EXAM DETAILS</h3>
								<p>The Benefits of AAT Membership.Once you’ve registered as an AAT student member you’ll be able to access a range of AAT support resources to help you succeed in your studies.</p>
							</div>
							<div class="a_level_exams_right_contents">
								<ul>
									<li>Study support: Including practice assessments, interactive e-learning modules,qualification specification, Green Light tests, Real life scenarios and much more.</li><br>
									<li>Dedicated call centre: AAT’s Customer Support team have a helpline especially for student queries.</li><br>
									<li>Boosting your career prospects: From an online CV builder, interviews tips to the latest accountancy vacancies courtesy of our dedicated jobs site aat-jobs.co.uk.</li><br>
									<li>Exclusive discounts: AAT Rewards is your exclusive rewards site that can help you save money on the things you buy every day. Find great offers on everything from cinema tickets to holidays and insurance.</li>
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
<section class="ucas_application_process_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ucas_application_process">
					<div class="ucas_application_process_title">
						<h2>What’s covered and is it right for me?</h2>
						<p>AAT’s Access Award in Bookkeeping and Access Award in Accounting Software provide you the opportunity to gain introductory skills across these the two key accountancy areas. The Access Award in Business Skills is a perfect all-round entry qualification, covering the basic requirements to prepare you for the workplace.</p>
						<p>Foundation qualifications
							Whether you’re considering the Foundation Certificate in Bookkeeping, the Foundation Certificate in Accounting Software, or the Foundation Certificate in Accounting, the qualifications cover a range of basic accounting practices and techniques, from costing and double-entry bookkeeping to using accounting software.
							
							These qualifications are perfect if you’re new to finance or simply looking to brush up on your foundation knowledge and skills.</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A Level Exam Bodies) Section  ================-->
<section class="a_lavel_exam_bodies_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_bodies">
					<div class="a_level_exams_practical">
						<div class="a_level_exams_practical_contents">
							<h3>Advanced qualifications</h3>
							<p>AAT Advanced and Professional Qualifications

								Advanced Certificate in Bookkeeping & Advanced Diploma in Accounting
								These qualifications focus on advanced tasks like maintaining cost accounting records and preparing reports. Ideal for those who have completed foundation qualifications or are at a more advanced level.
								
								Professional Diploma in Accounting
								Covers high-level tasks such as drafting financial statements, managing budgets, and evaluating performance. You can also specialize in areas like tax, auditing, or credit control.
								
								Achieving this diploma, combined with relevant work experience, qualifies you to apply for full AAT membership and use the prestigious letters MAAT after your name.</p>
						</div>
						<div class="a_level_exams_practical_contents">
							<h3>What level shall I start at?</h3>
							<p>Choosing and Advancing with AAT

								Find Your Fit: Use AAT’s Qualifications Navigator to discover the right qualification for you. Take the Skillcheck assessment to determine the best level for your skills.
								Next Steps After Qualifying:
								Apply for AAT Professional Membership and use the letters MAAT.
								Become an AAT Licensed Accountant and work independently.
								Gain 160 UCAS points to progress to university.
								Work globally with AAT’s internationally recognized qualifications.
								Achieve the Advanced Diploma or Certificate to qualify for AATQB associate bookkeeping membership.
								Explore all levels of AAT Accounting Qualifications to shape your career.</p>
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
<!--================  Start (A-Level Exam Booking) Section  ================-->
<section class="a_lavel_exam_booking_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_booking">
					<div class="a_lavel_exam_booking_title">
						<h3>AAT Exam Booking</h3>
						<p>We work with a Distance Learning providers to offer assessments that fit their requirements. If you are studying a Distance Learning Course and interested in sitting your assessment in one of our centres, contact us to see how we can help.

						</p>
						<a href="{{ url('exam-booking-aat') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A-Level Exam Booking) Section  ================-->
@endsection
