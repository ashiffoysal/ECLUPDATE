@extends('layouts.frontend')
@section('title', 'A Level Courses')
@section('content')
		<div class="sub_menu_main">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="sub_menu">
							<ul>
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><i class="fas fa-angle-right"></i></li>
								<li><a href="#">A Level Courses</a></li>
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
                                <b>A Level Courses</b>
                                <h2>A-Level Mathematics, Physics, Chemistry, and Biology Intensive One-Year Course</h2>
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
                            		<li><a href="#">Physics</a></li>
                            		<li><a href="#">Chemistry</a></li>
                            		<li><a href="#">Biology</a></li>
                            	</ul>
                            	<p>Our A-level Mathematics Intensive One-Year Course is designed for students who are committed to achieving top grades in a condensed timeframe. Whether you’re retaking A-levels or pursuing them for the first time, our program offers comprehensive support and a structured environment to help you succeed.</p>
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
                            		<p>From 1st Oct - Mid-May Approximately 7.5 months</p>
                            	</div>
                            	<div class="course_overview_single">
                            		<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/icon3.png" alt="">
                            		<h4>Total Fees</h4>
                            		<p>£2000<br>per subject</p>
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
                                <p>Comprehensive coverage of both AS and A2 content. Focus on key areas: Pure Mathematics, Mechanics, and Statistics. Intensive weekly sessions: Thursday, 10:00 AM - 4:00 PM.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1-2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Introduction to Algebra and Functions, Quadratics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3-4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Coordinate Geometry in the (x, y) plane, The Binomial Theorem</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5-6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Trigonometry, Exponentials and Logarithms.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7-8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Differentiation and its applications.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9-10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Integration and its applications.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 11-12</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Vectors and Mathematical Modelling in Mechanics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 13-14</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Forces and Newton's laws in Mechanics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 15-16</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Probability and Statistics – Descriptive Statistics, Probability Distributions.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 17-18</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Hypothesis Testing and Further Applications in Statistics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 19-20</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Revision and Practice Exam Papers.</p>
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
                                <h2>Weekly Content Structure : <span>(A-Level Physics)</span></h2>
                                <p>- Covers core topics: Mechanics, Electricity, Waves, and Quantum Physics. - Includes practical sessions and experiments integrated into the weekly schedule.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1-2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Measurements and their errors, Scalars and Vectors.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3-4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Kinematics and Dynamics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5-6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Work, Energy, and Power.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7-8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Momentum and Circular Motion.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9-10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Gravitational Fields, Electrical Fields.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 11-12</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Capacitance and Electromagnetism.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 13-14</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Waves, Optics, and Refraction.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 15-16</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Quantum Mechanics and Wave-Particle Duality.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 17-18</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Nuclear Physics and Radioactivity.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 19-20</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Astrophysics and Cosmology (optional topic).</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 21-22</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Revision and Practice Exam Papers.</p>
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
                                <h2>Weekly Content Structure  <span>(A-Level Chemistry)</span></h2>
                                <p>Focus on Physical Chemistry, Inorganic Chemistry, and Organic Chemistry. - Practical experiments are included to reinforce theoretical knowledge.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1-2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Atomic Structure and the Periodic Table.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3-4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Bonding and Structure.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5-6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Redox Reactions, Energetics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7-8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Kinetics and Equilibrium.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9-10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Thermodynamics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 11-12</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Periodicity and Group Chemistry.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 13-14</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Organic Chemistry: Alkanes, Alkenes.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 15-16</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Organic Chemistry: Alcohols, Haloalkanes.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 17-18</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Aromatic Chemistry and Amines.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 19-20</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Organic Synthesis and Analytical Techniques.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 21-22</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Revision and Practice Exam Papers.</p>
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
                                <h2>Weekly Content Structure<span>(A-Level Biology)</span></h2>
                                <p>- Extensive coverage of cell biology, genetics, ecology, and human physiology. - Practical sessions to apply theoretical concepts in real-life contexts.</p>
                            </div>
                            <div class="content_structure_contents">
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 1-2</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Biological Molecules, Enzymes.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 3-4</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Cells and Transport Mechanisms.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 5-6</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Cell Division, DNA, and Genetics.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 7-8</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Exchange Surfaces and Transport in Animals and Plants.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 9-10</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Biodiversity, Evolution, and Classification</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 11-12</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>P Energy Transfers in and Between Organisms.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 13-14</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Genetics, Populations, Evolution, and Ecosystems.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 15-16</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Control of Gene Expression.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 17-18</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Nervous Coordination and Homeostasis.</p>
                                    </div>
                                </div>
                                <div class="content_structure_single">
                                    <div class="a_lavel_exam_bodies_calender_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exams/calender.png" alt="">
                                        <div class="a_lavel_exam_bodies_calender_date">
                                            <h4>Week 19-20</h4>
                                        </div>
                                    </div>
                                    <div class="csc_contents">
                                        <p>Photosynthesis and Respiration.</p>
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
                                            <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">The entire A-level Mathematics syllabus is covered thoroughly, ensuring you are well-prepared for the exams.</li>
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