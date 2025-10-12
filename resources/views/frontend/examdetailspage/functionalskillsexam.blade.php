@extends('layouts.frontend')
@section('title', 'Functional Skills Exams | Maths & English | Exam Centre London')
@section('meta_description', 'Book your Functional Skills exams at Exam Centre London. We offer Level 1 & Level 2 assessments in Maths and English, both online and paper-based. Ideal for career advancement or further education.')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/functional-skills-exams') }}">Functional Skills Exam</a></li>
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
						<b>Functional Skills Exam</b>
						<h2>Exam Centre London are a<span> JCQ approved Assessment Centre</span> <span>for Functional Skills</span></h2>
						<p>Functional Skills Qualifications in Maths, English are Nationally Recognised Awards providing reliable evidence of a learner’s achievements relevant to the workplace and real-world settings. Functional Skills Examinations are popular for learners of all ages looking to progress into employment or further technical education and are valued qualifications by employers and Higher Education Establishments alike. Here at Exam Centre London, we support you in your goal to obtain Functional Skills Qualifications.

							Many Colleges and Universities stipulate Functional Skills Level 2 (or GCSE equivalent) Maths and English qualification as an entry requirement. Functional Skills qualifications are also a critical way for prospective employers to screen for abilities and skills.
							
							Many of our learners begin with Entry Level Functional Skills Qualifications to help tackle the challenge of Functional Skills qualifications to build confidence. With a focus on practical skills that can be applied to real-life contents, Functional Skills Qualifications are a popular examination choice for a wide range of learners</p>
						<a href="{{ url('/exam-booking-functional-skills') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
					<div class="contact_us a_level_exams_subjects">
						<div class="contact_us_left get_in_touch_left">
							<div class="contact_us_left_items get_in_touch_right_items a_level_exams_left">
								<ul>
									<li><a href="#" class="contact_us_items_bg contact_a1">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon5.png" alt="">
										
									</a></li>
									<li><a href="tel:0208-616-2526" class="contact_us_items_bg alevel_exams2">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon4.png" alt="">
										
									</a></li>
									<li><a href="mailto:info@examcentrelondon.co.uk" class="contact_us_items_bg alevel_exams3">
										<img src="{{ asset('frontend/updatedesign') }}/assets/images/home/people.png" alt="">
									
									</a></li>
								</ul>
							</div>
						</div>
						<div class="contact_us_right a_level_exams_right">
							<div class="a_level_exams_right_title">
								<h3>FUNCTIONAL SKILLS ENGLISH</h3>
								<p>(Online or Paper-Based Assessment) Functional Skills English Qualifications evidence skills in Reading, Writing and Speaking.Please get in touch to chat through your requirements and we’ll be happy to help.</p>
							</div>
							<div class="a_level_exams_right_contents">
								<ul style="display: ">
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Level 1 Functional Skills English</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Level 2 Functional Skills English</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="contact_us a_level_exams_subjects">
						<div class="contact_us_right a_level_exams_right">
							<div class="a_level_exams_right_title">
								<h3>FUNCTIONAL SKILLS MATHS</h3>
								<p>(Online or Paper-Based Assessment) 
									Functional Skills Mathematics Qualifications evidence skills; a sound grasp of mathematical knowledge and skills and confidence in solving mathematical problems.Please get in touch to chat through your requirements and we’ll be happy to help.</p>
							</div>
							<div class="a_level_exams_right_contents">
								<ul style="display: ">
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt=""> Level 1 Functional Skills Maths</li>
									<li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt=""> Level 2 Functional Skills Maths</li>
								</ul>
							</div>
						</div>
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
										Individual and group tuition
									</a></li>
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
<section class="a_lavel_exam_bodies_main" style="margin-bottom: 50px">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_bodies">

					<div class="exam_board_title a_lavel_exam_bodies_title">
						<h3>Functional Skills Exam Board</h3>
						<p> We offer Functional Skills with the following Awarding Bodies:</p>
					</div>
					<div class="exam_board_items a_lavel_exam_bodies_items">
						<ul class="owl-carousel owl-theme">
							<li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board5.png" alt=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="faqs_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="faqs">
					<div class="section_title high_standard_title">
						<h2>Frequently Asked <span>Questions</span></h2>
						<p>Your Questions Answered: Find everything you need to know about our exam centre, services, and policies.</p>
					</div>
					<div class="faqs_contents">
						<div class="panel-group custom_accordion" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											What is the duration of the Functional Skills exams?
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body custom_accordion_body">Examination length varies according to subject and Assessing Body. The shortest Functional Skills exam is the Pearson Edexcel Speaking and Listening Assessment which lasts for 30 minutes. The longest exams are the Pearson Edexcel Maths Assessment which last for two hours. If you are worried about exam nerves or performing under assessment conditions, speak to us about the options available to you.</div>
								</div>
							</div>
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading2">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
											When will I receive my Functional Skills results?
										</a>
									</h4>

								</div>
								<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
									<div class="panel-body custom_accordion_body">Online assessments results are available in 2 to 4 weeks. Paper based assessment results typically are available in 3 to 5 weeks. We’ll keep you informed of your results progress following any examination with Exam Centre London.</div>
								</div>
							</div>
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											What do Functional Skills speaking and listening tests involve?
										</a>
									</h4>

								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body custom_accordion_body">English Functional Skills Qualifications include a Speaking and Listening element, designed to assess your confidence and fluency in expressing yourself when speaking English and your skills in understanding others speaking English.

										Exam Centre London offers Functional Skills English Qualifications with Pearson Edexcel Awarding Bodies.The Speaking and Listening element of the qualification includes a 5 minute presentation task and a discussion task.
										
										The presentation can be about a topic of your choice. You can use notes during the presentation and will submit these as part of the assessment. It’s wise to choose a topic that you’re passionate about and feel confident speaking on.
										
										The discussion task will be on a subject chosen by your assessor. The assessor will be looking for candidates who listen to their peers as well as contribute to the discussion to the best of their ability.
										
										As with any aspect of the Functional Skills Assessments, please get in touch with Exam Centre London to chat through any questions you may have.</div>
								</div>
							</div>
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading7">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
											Functional Skills Examinations Fees.
										</a>
									</h4>
								</div>
								<div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
									<div class="panel-body custom_accordion_body">For detailed information, please visit our Fees page.</div>
								</div>
							</div>
						</div>
						<div class="panel-group custom_accordion" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading4">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
											When can I take my Functional Skills Examination?
										</a>
									</h4>

								</div>
								<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
									<div class="panel-body custom_accordion_body">We cater for examinations 7 days’ a week at our Ilford Exam Centre. Forest Gate Exam Centre offers assessments every Monday, Wednesday & Thursday.Examinations begin at either 11 am or 2 pm. Please contact us if you have requirements outside of these times.</div>
								</div>
							</div>
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading5">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
											Which Exam Boards do you work in partnership with?
										</a>
									</h4>

								</div>
								<div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
									<div class="panel-body custom_accordion_body">When it comes to the Functional Skills English, Maths Qualifications, we work in partnership with Pearson Edexcel(often known as Exam Boards).</div>
								</div>
							</div>
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading6">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
											Ready to book your Test?
										</a>
									</h4>

								</div>
								<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
									<div class="panel-body custom_accordion_body">Complete the form below <a href="{{ url('/exam-booking-functional-skills') }}">Functional Skills Exam</a></div>
								</div>
							</div>
							
							<div class="panel panel-default custom_accordion_single">
								<div class="panel-heading" role="tab" id="heading8">
									<h4 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
											Got a Question?
										</a>
									</h4>

								</div>
								<div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
									<div class="panel-body custom_accordion_body">Feel free to contact us at 0208 616 2526 for any queries. We're always here to assist you!</div>
								</div>
							</div>
							
						</div>
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
						<h3>Functional Skills Exam Booking</h3>
						<p>We work with a Distance Learning providers to offer assessments that fit their requirements. If you are studying a Distance Learning Course and interested in sitting your assessment in one of our centres, contact us to see how we can help.</p>
						<a href="{{ url('/exam-booking-functional-skills') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
