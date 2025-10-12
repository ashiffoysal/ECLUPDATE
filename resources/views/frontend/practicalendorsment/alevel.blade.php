@extends('layouts.frontend')
@section('title', 'A-Level Practical Endorsement London | Affordable Science Assessment')
@section('meta_description', 'Book your A-Level Practical Endorsement in London today. Flexible dates, low fees, and expert supervision for AQA, Edexcel, and OCR science assessments.')
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
                              <li><a href="{{ url('a-level-endorsment') }}">A Level Practical Endorsement</a></li>
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
                          <div class="a_lavel_endorsement_title"><h1>Book Comprehensive A-Level<span>Exams & Tuition in London</span></h1></div>
                          <div class="a_lavel_endorsement_contents">
                            <div class="a_lavel_endorsement_contents_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/a-level-endorsement.png" alt=""></div>
                            <div class="a_lavel_endorsement_contents_right">
                              <h3>Endorsement Details</h3>
                              <p>Exam Centre London offers A-Level practical exams in biology, chemistry, and physics, held in secondary schools within Newham. Qualified tutors ensure candidates learn to confidently handle equipment and conduct experiments with clear guidance.</p>
                              <p>Sessions are held during the spring half term to maximize lab use and provide a comfortable, undisturbed environment. Each session includes one tutor and five candidates, allowing participants to familiarize themselves with equipment and ask questions.</p>
                              <p>Candidates will practice experiments individually, receive feedback for improvement, and learn tips for managing time effectively during assessments.</p>
                            </div>
                          </div>
                          <div class="a_lavel_endorsement_btn"><a href="{{ url('exam-booking-alevel') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                          <div class="a_lavel_endorsement_fees">
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-endorsement/square.png" alt=""><span>Exam Centre London offers private A-Level candidates with a five day course per subject at the cost of <b>£900</b>.</span></p>
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
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">During practical sessions, tutors will highlight health and safety guidelines, demonstrate required experiments, and address candidate inquiries. Candidates will then practice experiments under close supervision, receiving feedback to enhance their skills.</li>
                                          <li><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">The final session lets candidates showcase their learning and receive final feedback from tutors.</li>
                                      </ul>
                                  </div>
                                  <a href="{{ url('exam-booking-alevel') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                              </div>
                          </div>
              </div>
            </div>
          </div>
        </div>
      </section>  
	
@endsection