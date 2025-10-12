@extends('layouts.frontend')
@section('title', 'GCSE Practical Endorsement | Biology, Chemistry & Physics | Exam Centre London')
@section('meta_description', 'Prepare for your GCSE practical endorsement in Biology, Chemistry, or Physics with Exam Centre London. Two-day hands-on sessions in Newham schools, led by qualified tutors. Book now!')
@section('content')
    <!--================  End Header Section  ================-->
        <!-- Start Sub Menu -->
        <div class="sub_menu_main">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="sub_menu">
                          <ul>
                              <li><a href="{{url('/')}}">Practical Endorsement</a></li>
                              <li><i class="fas fa-angle-right"></i></li>
                              <li><a href="{{ url('gcse-endorsment') }}">GCSE Practical Endorsement</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Sub Menu -->

      <!--================  Start (A Level Endorsement) Section  ================-->
      <section class="a_lavel_endorsement_main">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="a_lavel_endorsement">
                          <div class="a_lavel_endorsement_title"><h2>GCSE Practical <span>Endorsement</span></h2></div>
                          <div class="a_lavel_endorsement_contents">
                            <div class="a_lavel_endorsement_contents_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/a-level-endorsement.png" alt=""></div>
                            <div class="a_lavel_endorsement_contents_right">
                              <h3>Endorsement Details</h3>
                              <p>Exam Centre London offers the opportunity for candidates to sit GCSE practical exams for biology, chemistry and physics. We will be holding these sessions in nearby secondary schools, all within the borough of Newham. To ensure that you receive the best experience, Exam Centre London will provide highly qualified and competent science tutors to carry out these practical lessons. There will be practice lessons where candidates will be taught how to accurately and confidently manage equipment and tutors will also provide clear and concise instructions on how to conduct experiments.</p>
                              <p>Sessions will be held in local state schools during the spring half term to ensure that candidates can maximise the use of the labs and equipment. This will also ensure there are no disturbances and candidates are able to participate during sessions in a comfortable manner.</p>
                              <p>Practice practical sessions will be led by one member of staff and five candidates with the opportunity for candidates to familiarise themselves with the lab and equipment and present any queries. During practice sessions, tutors will also allow candidates the opportunity to conduct these experiments individually and provide feedback on improvements. Tutors will also provide tips and tricks on how to conduct these practical assessments and how to efficiently manage time.</p>
                            </div>
                          </div>
                          <div class="a_lavel_endorsement_btn"><a href="{{ url('exam-booking-gcse ') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                          <div class="a_lavel_endorsement_fees">
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>Exam Centre London offers private GCSE candidates with a two day course per subject at the cost of  <b>£250</b>.</span></p>
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt="">These sessions will be detailed and provide a clear and thorough understanding of practical assessments with the opportunity for candidates to individually conduct practice assessments.</p>
                            <div class="a_lavel_endorsement_fees_title"><h2>Fees</h2></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--================  End (A Level Endorsement) Section  ================-->

      <!--================  Start (Session Details) Section  ================-->
      <section class="session_details_main">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="session_details">
                <div class="contact_us">
                              <div class="contact_us_left get_in_touch_left">
                                  <div class="contact_us_left_items get_in_touch_right_items session_details_left">
                                      <ul>
                                          <li><a href="#" class="contact_us_items_bg contact_a1">
                                              <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/icon1.png" alt="">
                                              Health and Safety Awareness
                                          </a></li>
                                          <li><a href="tel:0208-616-2526" class="contact_us_items_bg alevel_exams2">
                                              <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/icon2.png" alt="">
                                              Practical Experiment Demonstrations
                                          </a></li>
                                          <li><a href="mailto:info@examcentrelondon.co.uk" class="contact_us_items_bg alevel_exams3">
                                              <img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/icon3.png" alt="">
                                              Final Feedback and Assessment
                                          </a></li>
                                      </ul>
                                  </div>
                              </div>
                              <div class="contact_us_right a_level_exams_right">
                                  <div class="a_level_exams_right_title">
                                      <h3>Session Details</h3>
                                  </div>
                                  <div class="a_level_exams_right_contents a_level_exams_endorsement_contents">
                                      <ul>
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">Prior to the sessions, the centre will conduct risk assessments to ensure that the labs and equipment are safe to use.</li>
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">During the practical sessions, tutors will make candidates aware of health and safety hazards and ensure that candidates are made aware of how to correctly handle lab equipment. Tutors will then provide clear demonstrations of the experiments required to understand for practical assessments. Then, tutors will give candidates the opportunity to ask questions regarding the assessment to ensure that they are aware of the various steps required to safely and carefully conduct experiments.</li>
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">This will follow with the opportunity for candidates to conduct both simple and complex experiments with the supervision of the tutors and also provide the opportunity to practice experiments for the practical assessments. Throughout the sessions, tutors will be conversing with students and ensure that there are no errors in the process of conducting experiments.</li>
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">The final session will allow candidates to demonstrate their learning and give tutors an opportunity to observe candidates and provide feedback on how well they have conducted the practical.</li>
                                      </ul>
                                  </div>
                                  <a href="{{ url('exam-booking-gcse') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                              </div>
                          </div>
              </div>
            </div>
          </div>
        </div>
      </section>  
	@endsection