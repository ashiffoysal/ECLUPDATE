@extends('layouts.frontend')
@section('title', 'ACCA Computer-Based Exams in London | Book Now with Exam Centre London')
@section('meta_description', 'Register for ACCA Computer-Based Exams in London at Exam Centre London. Offering flexible scheduling, expert invigilation, and a range of ACCA qualifications. Book your exam today!')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/ripon/ripon.css') }}">
<style>
.ucas_application_process_title p {
    max-width: 100%;
}

.high_standard_title h1 {
    color: #000;
    margin-top: 15px;
    text-transform: capitalize;
}
</style>
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/acca-exams') }}">ACCA Exam</a></li>
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
						<b>ACCA Exam</b>
						<h1>Book ACCA  <span>Computer-Based Exams in London</span></h1>
						<p>This document must be read and fully understood by each student before sitting any computer-based exam. ACCA offers computer-based exams for the first seven papers within the Foundations in Accountancy suite and for the AB, MA, FA, and LW papers of the ACCA Qualification. Exam Centre London is proud to partner with ACCA to provide assessment options for a range of Chartered Certified Accountant qualifications. As a licensed ACCA Computer-Based Examination Centre, we strictly adhere to ACCA procedures and protocols.</p>
						<a href="{{ url('exam-booking-acca') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
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
								<h3>How does it works?</h3>
								<p>The exams are conducted at centres licensed by ACCA. Centres register students for the computer-based exams through ACCA’s online administration system. Exams are downloaded for each student, conducted offline, and results are uploaded to the ACCA server upon completion.If you intend to sit ACCA’s CBEs, you must first be registered with ACCA. The centre will require the following personal information and proof of your registration and eligibility:</p>
							</div>
							<div class="a_level_exams_right_contents">
								<ul>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">ACCA registration number</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Date of birth</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Full name and address</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">The qualification for which you are studying</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Email address</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Telephone number</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Gender</li>
								
								</ul>
							</div>
							<p>We offer assessment for over 45 subjects and 100+ specifications across all Awarding Organisations, excluding science subjects. For science, we recommend candidates sit alternative IGCSE sciences to avoid the practical components included in GCSE Science specifications.

								Details of the subjects we offer can be found <a href="{{ url('/exam-fees') }}">here.</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A Level Exams) Section  ================-->
<section class="ucas_application_process_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ucas_application_process">
					<div class="ucas_application_process_title">
						<h2>ACCA Information</h2>
						<p >This information will be used exclusively to register you as a student for exams and to inform ACCA of your exam results. Under data protection legislation, the centre is required to inform you of the use and purpose of your personal details.

							Please note that ACCA may provide certain information to the centre when necessary, solely for exam administration purposes. In some cases, this information may be shared with a centre located in a country without data protection legislation.
							
							To confirm your registration and eligibility for CBEs, you must provide your registration number, date of birth, and contact details to the centre. Additionally, a valid and official form of photographic identification, such as a passport, is required. Failure to present this identification will result in your inability to book a CBE session.
							
							The CBE centre will also require payment of a fee to cover administration, invigilation, and exam costs.
							
							For students with long-term or permanent disabilities, visual impairments, indispositions, or specific learning difficulties, special arrangements may be possible during exams. If you need such support, notify the exams department by submitting a request through the Additional Support Portal (accessible via the Disability Support link on the MyACCA page) at least three weeks before your exam session. Supporting medical documentation must be included with your request.
							
							Additionally, contact the CBE centre’s examinations coordinator in advance of the exam session to inform them of any adjustments approved by ACCA.</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>


<section class="a_lavel_exam_bodies_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_bodies">
					<div class="a_level_exams_practical">
						<div class="a_level_exams_practical_contents">
							<h3>What can you expect?</h3>
							<p>Once the centre has registered you for the exam you will be given a time and date for the exam by the centre’s examination co-ordinator. On the day of the exam, you will be provided with a workstation where you will attempt the exam. Workstations have to conform to standards and specifications laid down by ACCA. These have to be quietly situated, with individual PCs separated from other students, free from glare and conform to current health and safety requirements. An invigilator will be on hand to assist you with any queries you may have at the time of sitting the exam.</p>
						</div>
						<div class="a_level_exams_practical_contents">
							<h3>What About The Exam Itself</h3>
							<p>For all exams, you will be provided with the following:

								Paper for rough workings.
								On-screen instructions on how to navigate through the exam screens.
								If you are sitting the FMA/MA (Management Accounting) exam, you will also have access to a formulae sheet, present value table, and annuity table on-screen.
								
								Before the exam begins, the invigilator will read out instructions. You will then launch the exam software, which will prompt you to enter your ACCA registration number and date of birth to access your exam.
								
								The invigilator will verify the information displayed on-screen, check your identity against your photographic ID, and ensure you are assigned the correct exam. Once this process is complete, you will be allowed to start the exam.</p>
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
						<h3>ACCA Exam Booking</h3>
						<p>We work with a Distance Learning providers to offer assessments that fit their requirements. If you are studying a Distance Learning Course and interested in sitting your assessment in one of our centres, contact us to see how we can help.</p>
						<a href="{{ url('/exam-booking-acca') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================  End (A-Level Exam Booking) Section  ================-->
	<section class="content_image" style="background-color:#fff">
		<div class="row">
			<div class="col-md-5 ">
				<div class="content_col">
					<div class="right_left">
						<h2 class="zh_heading" style="color:#247e3d;">EXAM FORMAT</h2>
						<div class="p_wrapper with_space">
							<p class="zh_tagline">Foundations in Accountancy</p>
							<p>Introductory Certificate in Financial and Management Accounting (FA1 and MA1)</p>
							<ul>
								<li>=> Is of two hours’ duration.</li>
								<li>=> Contains 50 questions.</li>
								<li>=> Is out of 100 marks.</li>
								<li>=> Has a pass mark of 50%.</li>
								<li>=> Contains two-mark objective test questions –multiple choice questions only.</li>
							</ul>
							<p>Intermediate Certificate in Financial and Management Accounting (FA2 and MA2)</p>
							<ul>
								<li>=> Is of two hours duration.</li>
								<li>=> Contains 50 questions.</li>
								<li>=> Is out of 100 marks.</li>
								<li>=> Has a pass mark of 50%.</li>
								<li>=> Has a pass mark of 50%.</li>
								</ul>
							<p>Contains the following objective test questions (OTs) -all worth two marks:</p>
							<ul>
								<li>=> Multiple choice questions.</li>
								<li>=> Multiple response questions.</li>
								<li>=> Multiple response matching questions.</li>
								<li>=> Number entry questions.</li>
								
							</ul>
							
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-md-6 ">
				<div class="content_col">
					<div class="right_left">
						<div class="p_wrapper with_space">
							<p>Diploma in Accounting and Business (FAB, FMA and FFA)</p>

							<ul>
								<li>=> Is of two hours duration.</li>
								<li>=> Is out of 100 marks.</li>
								<li>=> Has a pass mark of 50%.</li>
							</ul>
							<p>Contains 2 sections:</p>
							<ul>
								<li>=> Section A contains objective test questions (OTs).</li>
								<li>=> Section B contains multi-task questions (MTQs).</li>
								
							</ul>
							<p>ACCA Qualification (AB, MA, FA and LW)</p>
							<ul>
								<li>=> Is of two hours duration.</li>
								<li>=> Is out of 100 marks.</li>
								<li>=> Has a pass mark of 50%.</li>
								<li>=> Multiple response matching questions.</li>
								<li>=> Number entry questions.</li>
							</ul>
							<p>Contains 2 sections:</p>
							<ul>
								<li>Section A contains objective test questions (OTs).</li>
								<li>Section B contains multi-task questions (MTQs).</li>
							</ul>
							
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
@endsection
