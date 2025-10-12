@extends('layouts.frontend')
@section('title', 'GCSE Courses in London | Intensive Maths & English Tuition – Exam Centre London')
@section('meta_description', 'Enroll in Exam Centre London intensive GCSE courses in Maths and English. Our 10-week programs offer expert tuition, small class sizes (up to 10 students), and comprehensive coverage of the syllabus. Ideal for private candidates, home educators, and adult learners. Book your spot today!')
@section('content')
		<div class="sub_menu_main">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="sub_menu">
							<ul>
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><i class="fas fa-angle-right"></i></li>
								<li><a href="{{ url('/gcse-courses') }}">GCSE Courses</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--================  Start (A Level Courses) Section  ================-->
        <section class="a_lavel_exams_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="a_level_exams">
                            <div class="section_title high_standard_title a_level_courses_title">
                                <b>GCSE Courses</b>
                                <h2>GCSE Maths and English Intensive Course - 10 Weeks</h2>
                                <a href="{{url('/courses')}}" class="btn_style">Join Us Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (A Level Courses) Section  ================-->

        <!--================  Start (Course Overview) Section  ================-->
        <section class="coursework_fees_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coursework_fees coursework_fees_courses">
                            <div class="coursework_fees_title"><h2>Course Overview</h2></div>
                            <div class="course_overview_title">
                            	<p>Subjects offered by us regarding the course:</p>
                            	<ul>
                            		<li><a href="#">Mathematics</a></li>
                            		<li><a href="#">English Language</a></li>
                     
                            	</ul>
                            	<p>Our GCSE Mathematics Intensive 10 Weeks Course is designed for students who are committed to achieving top grades in a condensed timeframe. Whether you’re retaking GCSE or pursuing them for the first time, our program offers comprehensive support and a structured environment to help you succeed.</p>
                            </div>
                            <div class="course_overview_contents">
                            	<div class="course_overview_single">
                            		<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon1.png" alt="">
                            		<h4>Class Size</h4>
                            		<p>Up to 10 students<br> per group</p>
                            	</div>
                            	<div class="course_overview_single">
                            		<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon2.png" alt="">
                            		<h4>Duration</h4>
                            		<p>From 1st Oct - Mid-May Approximately 10 weeks</p>
                            	</div>
                            	<div class="course_overview_single">
                            		<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon3.png" alt="">
                            		<h4>Total Fees</h4>
                            		<p>£500<br>per subject</p>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Course Overview) Section  ================-->

        <!--================  Start (Weekly Content Structure: (Mathematics) Section  ================-->
        <section class="content_structure_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_structure">
                            <div class="section_title high_standard_title content_structure_title">
                                <h2>Weekly Content Structure: <span>(Mathematics)</span></h2>
                                <p>Comprehensive coverage of GCSE Mathematics. Intensive weekly sessions: Thursday, 10:00 AM - 4:00 PM.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Number Systems and Basic Algebra – Review of key concepts and foundational skills.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Fractions, Decimals, Percentages – Mastery of conversions and calculations.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Equations and Inequalities – Solving linear and quadratic equations, inequalities.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Geometry and Measures – Exploring angles, shapes, area, and volume.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Trigonometry – Sine, cosine, tangent, and their applications in right-angled triangles.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Probability and Statistics – Data handling, probability trees, and interpreting data.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Algebraic Graphs and Functions – Plotting and interpreting linear, quadratic, and other functions.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Advanced Topics – Simultaneous equations, transformations, and circle theorems.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Revision and Practice – Focused revision on identified weak areas and topic reinforcement.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Final Mock Exams – Full-length mock exams under timed conditions to simulate the real exam.</p>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="refund_policy_border"></div>
        </section>

        <section class="content_structure_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_structure">
                            <div class="section_title high_standard_title content_structure_title">
                                <h2>Weekly Content Structure : <span>(GCSE English language)</span></h2>
                                <p>- Covers core topics:GCSE English language.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Reading Comprehension – Analyzing fiction and non-fiction texts, identifying themes and techniques.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Writing Skills – Crafting persuasive and descriptive essays, improving writing structure.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Language Techniques – Exploring literary devices and language techniques used in texts.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Exam Strategies – Developing time management skills and effective exam techniques.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Poetry and Prose – Analyzing and comparing poems and prose, understanding context.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Shakespeare and Drama – Focused study on set texts, character analysis, and themes.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Modern Texts – Critical analysis of modern literature, key themes, and contextual understanding.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Language Paper 1 and Paper 2 Practice – Timed practice papers with feedback.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Revision and Topic Reinforcement – Review of all topics with a focus on weaker areas.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Final Mock Exams – Full-length mock exams to practice under exam conditions.</p>
                                    </div>
                                </div>
                             
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="refund_policy_border"></div>
        </section>
  
        <!--================  End (Weekly Content Structure: (Mathematics) Section  ================-->

        <!--================  Start (Why Choose This Course) Section  ================-->
        <section class="session_details_main why_choose_course_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="session_details why_choose_course">
                            <div class="contact_us">
                                <div class="contact_us_left get_in_touch_left why_choose_course_left">
                                    <div class="contact_us_left_items get_in_touch_right_items session_details_left">
                                        <ul>
                                            <li><a href="#" class="contact_us_items_bg contact_a1">
                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon4.png" alt="">
                                                Expert Guidance
                                            </a></li>
                                            <li><a href="#" class="contact_us_items_bg alevel_exams2">
                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon5.png" alt="">
                                                Comprehensive Coverage
                                            </a></li>
                                            <li><a href="#" class="contact_us_items_bg alevel_exams3">
                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon6.png" alt="">
                                                Small Class Sizes
                                            </a></li>
                                            <li><a href="#" class="contact_us_items_bg alevel_exams4">
                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon7.png" alt="">
                                                Regular Assessments
                                            </a></li>
                                            <li><a href="#" class="contact_us_items_bg alevel_exams5">
                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon8.png" alt="">
                                                Tailored Support
                                            </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="contact_us_right a_level_exams_right why_choose_course_right">
                                    <div class="a_level_exams_right_title">
                                        <h3>Why Choose This Course?</h3>
                                    </div>
                                    <div class="a_level_exams_right_contents a_level_exams_endorsement_contents">
                                        <ul>
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Learn from experienced, specialized mathematics teachers who are dedicated to your success.</li>
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">The entire GCSE Mathematics syllabus is covered thoroughly, ensuring you are well-prepared for the exams.</li>
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Benefit from personalized attention and a focused learning environment with maximum 10 students per group.</li>
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">We conduct regular mock exams and past paper practices to track your progress and identify areas for improvement.</li>
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Individual learning plans and continuous feedback to help you overcome challenges and strengthen your understanding.</li>
                                        </ul>
                                    </div>
                                    <a href="{{url('/courses')}}" class="btn_style">Join Us Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Why Choose This Course) Section  ================-->

        <!--================  Start (Course Structure) Section  ================-->
        <section class="course_structure_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="course_structure">
                           <div class="course_structure_title"><h1>Course Structure</h1></div>
                           <div class="course_structure_contents">
                            <span class="course_structure_contents_border"></span>
                               <div class="course_structure_single">
                                   <div class="course_structure_single_icon">
                                       <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon9.png" alt="">
                                   </div>
                                   <div class="course_structure_single_cnts">
                                       <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/square.png" alt=""></span>
                                       <h4>Intensive Learning</h4>
                                       <p>The course covers both AS and A2 level content, with more emphasis on the challenging A2 topics.</p>
                                   </div>
                               </div>
                               <div class="course_structure_single">
                                   <div class="course_structure_single_icon">
                                       <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon10.png" alt="">
                                   </div>
                                   <div class="course_structure_single_cnts">
                                       <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/square.png" alt=""></span>
                                       <h4>Weekly Schedule</h4>
                                       <p>Classes are held multiple times a week, with additional time allocated for revision and exam practice.</p>
                                   </div>
                               </div>
                               <div class="course_structure_single course_structure_single_border">
                                   <div class="course_structure_single_icon">
                                       <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon11.png" alt="">
                                   </div>
                                   <div class="course_structure_single_cnts">
                                       <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/square.png" alt=""></span>
                                       <h4>Mock Exams</h4>
                                       <p>Timed mock exams and past paper sessions are integrated into the schedule to build exam confidence and technique.</p>
                                   </div>
                               </div>
                               <div class="course_structure_single course_structure_single_border">
                                   <div class="course_structure_single_icon">
                                       <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon12.png" alt="">
                                   </div>
                                   <div class="course_structure_single_cnts">
                                       <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/square.png" alt=""></span>
                                       <h4>Progress Monitoring</h4>
                                       <p>Regular feedback sessions with tutors to discuss your progress and areas that need attention.</p>
                                   </div>
                               </div>
                           </div>
                           <div class="course_structure_btn"><a href="{{url('/courses')}}" class="btn_style">Join Us Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Course Structure) Section  ================-->

        <!--================  Start (Explore A Level courses) Section  ================-->
        <section class="explore_courses_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="explore_courses">
                            <div class="section_title high_standard_title content_structure_title">
                                <h2>You can learn anything, <span>Explore A Level courses</span></h2>
                                <p>The entire A-level Mathematics syllabus is covered thoroughly, ensuring you are well-prepared for the exams. Learn from experienced, specialized mathematics teachers who are dedicated to your success.</p>
                            </div>
                            <div class="explore_courses_contents">
								@foreach($allCourse as $course)
                                <div class="explore_courses_single">
                                    <img src="{{ asset('/'.$course->thumbnail_image) }}" alt="">
                                    <p>{{ $course->course_title }}</p>
                                    <h4>£{{ $course->fees }}</h4>
                                    <strike>
                                        £{{ $course->old_fees }}
                                    </strike>
                                    <ul>
                                        <li>{{ $course->duration }}</li>
                                        <li><span>|</span></li>
                                        <li>{{ $course->exam_type }}</li>
                                    </ul>
                                    <a href="{{ url('/courses/details/'.$course->slug.'/'.$course->id) }}" class="btn_style">Read More <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                                    <div class="explore_courses_discount">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/discount.png" alt="">
                                        {{-- <p>15% OFF</p> --}}
                                    </div>
                                </div>
								@endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Explore A Level courses) Section  ================-->
@endsection