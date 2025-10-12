@extends('layouts.frontend')
@section('title', 'STEP Exam London | OCR STEP Mathematics Booking – Exam Centre London')
@section('meta_description', 'Register for your STEP Mathematics exam at Exam CentreLondon, an approved OCR test centre. Explore key dates, fees, and expert support to secure your place today.')
@section('content')
<style>
    .a_lavel_endorsement_fees p:first-child {
    margin-bottom: 1px;
}
</style>
<!-- Sub Menu -->
<div class="sub_menu_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sub_menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{ url('step-exam') }}">STEP Mathematics Exam</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STEP Exam Page -->
<section class="a_lavel_endorsement_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="a_lavel_endorsement">
                    <div class="a_lavel_endorsement_title">
                        <h1>STEP Mathematics Exams at <span>Exam Centre London</span></h1>
                        <p>Secure Your Future at Top UK Universities</p>
                    </div>

                    <div class="a_lavel_endorsement_contents">
                        <div class="a_lavel_endorsement_contents_img">
                            <img src="{{ asset('frontend/updatedesign/assets/images/a-level-endorsement/a-level-endorsement.png') }}" alt="STEP Exam">
                        </div>
                        <div class="a_lavel_endorsement_contents_right">
                            <h3>Approved OCR Examination Centre</h3>
                            <p>Exam Centre London (ECL) is proud to be an authorised test centre for the Sixth Term Examination Paper (STEP), a highly respected mathematics assessment for students applying to elite UK universities such as the University of Cambridge and University of Warwick.</p>

                            <h4>What is STEP?</h4>
                            <p>STEP is an advanced mathematics examination designed to evaluate a student’s problem-solving and analytical abilities beyond standard A-Level content. It plays a significant role in undergraduate admissions for mathematics and related disciplines.</p>

                            <p>Applicants may take one or more papers depending on university requirements.</p>
                            	<ul>
						    <li>Paper 1: Core Pure Mathematics – Algebra, Geometry, Calculus</li>
						    <li>Paper 2: Advanced Pure Mathematics – complex problem-solving</li>
						    <li>Paper 3: Challenging Pure & Applied Mathematics</li>
						</ul>
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</section>


<section class="a_lavel_exam_booking_main" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_lavel_exam_booking">
					<div class="a_lavel_exam_booking_title" style="max-width: 94%">
						<h3>Why Take the STEP Exam?</h3>
						<p>For students seeking admission to top-tier universities, the STEP exam is a valuable way to demonstrate your mathematical skills and stand out from other applicants. Many UK universities, including Cambridge and Warwick, use STEP results as part of their entry requirements for mathematics and related courses. By taking the STEP exam, you can show universities that you have the ability to tackle difficult problems and excel under pressure.

<br>Not only does the STEP exam enhance your university application, but it also improves your overall mathematical reasoning and problem-solving abilities, providing you with a strong foundation for university-level mathematics.</p>
						<a href="{{ url('/step-maths-exam-application') }}" class="btn_style btn_style3">Book Your Exam Now <span><img src="https://examcentrelondon.co.uk/frontend/updatedesign/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="a_lavel_exams_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_level_exams">
					<div class="section_title high_standard_title">
						<b>Key Dates</b>
						<h2>STEP Exam Key  <span>Dates </span>  for   <span>2026 </span></h2>
						<p>Don’t miss the opportunity to take the STEP exam at ECL (Exam Centre London). Whether you're aiming for a top university or looking to test your mathematical abilities, we provide a professional, supportive environment to help you succeed.</p>
					
						
						<a href="https://examcentrelondon.co.uk/contact" class="btn_style">Contact Us <span><img src="https://examcentrelondon.co.uk/frontend/updatedesign/assets/images/home/arrow-right.png" alt=""></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="zh_center_content section_padding" style="background:#fff !important">
  <div class="container">
    <div class="container table-responsive table_design_default exam_booking_deatline_table"> 
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">EXAM SERIES</th>
            <th scope="col">EXAM TYPE</th>
            <th scope="col">EXAM BOARD</th>
            <th scope="col">DATE</th>
          </tr>
        </thead>
        <tbody>
          <!-- STEP Exam Dates -->
          <tr>
            <td scope="row">MARCH 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">1-March-2026 (Registration Opens)</td>
          </tr>
          <tr>
            <td scope="row">MAY 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">4-May-2026 (Registration Closes)</td>
          </tr>
          <tr>
            <td scope="row">MAY 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">4-May-2026 (Access Arrangements Deadline)</td>
          </tr>
          <tr>
            <td scope="row">MAY 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">4-May-2026 (Alternative Venue Requests Deadline)</td>
          </tr>
          <tr>
            <td scope="row">JUNE 2026</td>
            <td scope="row">STEP Paper 2</td>
            <td scope="row">OCR</td>
            <td scope="row">11-June-2026 (Test Date)</td>
          </tr>
          <tr>
            <td scope="row">JUNE 2026</td>
            <td scope="row">STEP Paper 3</td>
            <td scope="row">OCR</td>
            <td scope="row">16-June-2026 (Test Date)</td>
          </tr>
          <tr>
            <td scope="row">AUGUST 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">13-August-2026 (Results Released to Centres)</td>
          </tr>
          <tr>
            <td scope="row">AUGUST 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">14-August-2026 (Results Released to Candidates)</td>
          </tr>
          <tr>
            <td scope="row">AUGUST 2026</td>
            <td scope="row">STEP Exam</td>
            <td scope="row">OCR</td>
            <td scope="row">21-August-2026 (Results Enquiries Deadline)</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>



        <section class="a_lavel_endorsement_main" style="padding:50px 0px">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="a_lavel_endorsement">
                          
                          <div class="a_lavel_endorsement_fees">
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>For UK students: <b>£350</b></span></p>
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>For international students: <b>£400</b></span></p>
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>Results Enquiries: <b>£150</b></span></p>
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>Appeals: <b>£150</b></span></p>

                            <div class="a_lavel_endorsement_fees_title"><h2>Fees</h2></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
        <section class="exam_center_london_main exam_center_london_main_ucas_application mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="exam_center_london">
                            <div class="section_title exam_center_london_title">
                                <b>Steps Exam Papers Details</b>
                                {{-- <h2>EXAM CENTRE LONDON | ECL</h2> --}}
                                {{-- <p>Our educators provide precise predicted grades, mock exams to simulate UCAS conditions, and personalized feedback to enhance performance. With a streamlined four-step application process, we make exam preparation efficient and effective.</p> --}}
                            </div>
                            <div class="ucas_exam_center_london_contents">
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl1.png" alt="">
                                    <span>STEP 1</span>
                                    <h3>Click the “Book Your Exam Now” Button</h3>
                                    <p>Visit our website and click on the “Book Your Exam Now” button to access the booking page.</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl2.png" alt="">
                                    <span>STEP 2</span>
                                    <h3>Provide Your Candidate Information:</h3>
                                    <p>Fill out the required details, including your name, contact information, and relevant academic background</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl3.png" alt="">
                                    <span>Step 3</span>
                                    <h3>Choose Your Exam Paper(s):</h3>
                                    <p>ou can choose to sit one, two, or all three papers, depending on your university's requirements.</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl4.png" alt="">
                                    <span>Step 4</span>
                                    <h3>Submit Your Payment</h3>
                                    <p>Complete your booking by submitting your payment via our secure online payment system.</p>
                                </div>
                            </div>
                            <div class="exam_center_london_btn">
                                <a href="{{ url('/step-maths-exam-application') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
@endsection
