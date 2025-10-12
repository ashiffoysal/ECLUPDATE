@extends('layouts.frontend')
@section('title', 'GCSE & A-Level Coursework Support | NEA Services in London | Exam Centre London')
@section('meta_description', 'Get expert assistance with your GCSE & A-Level coursework at Exam Centre London. Our NEA services include professional marking, teacher supervision, and feedback to ensure your success. Book now!')
@section('content')
        <!--================  Start (Exam Fees Details) Section  ================-->
        <section class="a_lavel_exams_main ucas_application_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="a_level_exams">
                            <div class="section_title high_standard_title exam_fees_title">
                                <b>Non Exam Assessment</b>
                                <h2>GCSE and A-Level Coursework: <span>Rules and Regulation</span></h2>
                                <p>At Exam Centre London, we are dedicated to ensuring your success in your GCSE and A-Level subjects. As part of the examination process, you must complete the Non-Exam Assessment (NEA) component associated with some of the subjects you will be undertaking. It is imperative to commence preparation of your coursework at least one month before the deadline set by the boards.</p>
                                <a href="{{ url('exam-list') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Exam Fees Details) Section  ================-->

        <!--================  Start (Coursework Fees and Services) Section  ================-->
        <section class="coursework_fees_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coursework_fees">
                            <div class="coursework_fees_title"><h2>Coursework Fees and Services</h2></div>
                            <div class="coursework_fees_top">
                                <div class="coursework_fees_top_left">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/coursework.png" alt="">
                                    <h4>Coursework Marking Fee</h4>
                                    <p><b>£250</b></p>
                                    <p>This fee covers the professional marking of your coursework in your chosen subject.</p>
                                    <p>Our experienced markers ensure your work meets the required academic standards.</p>
                                    <p>Comprehensive feedback will be provided to highlight strengths and areas for improvement.</p>
                                </div>
                                <div class="coursework_fees_top_left">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/coursework2.png" alt="">
                                    <h4>Teacher Service Fee</h4>
                                    <p><b>£200 </b><span>(minimum of 4 hours)</span></p>
                                    <p>Hourly Rate: £50/hr<br>It is mandatory to avail of our teacher service to ensure the authenticity of your coursework, as required by OFCOM.</p>
                                    <p>Our teachers, who are specialists in your chosen subjects, will monitor your work and provide necessary feedback</p>
                                </div>
                            </div>
                            <div class="refund_policy_border"></div>
                            <div class="coursework_fees_bottom">
                                <p>Total Fee</p>
                                <ul>
                                    <li><span>£250 for marking</span></li>
                                    <li>+</li>
                                    <li><span>£200 for tutor service</span></li>
                                    <li>=</li>
                                    <li><span>£450 for each coursework</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Coursework Fees and Services) Section  ================-->

        <!--================  Start (Feedback Service) Section  ================-->
        <section class="session_details_main feedback_service_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="session_details">
                            <div class="contact_us">
                                <div class="contact_us_left get_in_touch_left">
                                    <div class="contact_us_left_items get_in_touch_right_items feedback_service_left">
                                        <ul>
                                            <!-- <li><a href="#" class="contact_us_items_bg contact_a1">
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
                                            </a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="contact_us_right a_level_exams_right feedback_service_right">
                                    <div class="a_level_exams_right_title">
                                        <h3>Feedback Service</h3>
                                        <p>Before submission, we provide marking and feedback, allowing you to understand your performance and address any issues.</p>
                                    </div>
                                     <div class="a_level_exams_right_title">
                                        <h3>Why Our Teacher Service is Mandatory?</h3>
                                        <p>To comply with OFCOM requirements, our center ensures the authenticity of your coursework by assigning subject-specialist teachers. They'll review your work, give feedback, and ensure you meet standards for top marks.Please review JCQ rules on coursework submission, particularly sections 6.1 to 6.4, for details on the requirement for teacher supervision.</p>
                                    </div>
                                    <p><span>feedback final marking submission Charge:  £150 </span></p>
                                    <a href="https://www.jcq.org.uk/exams-office/coursework/" class="btn_style">JCQ Coursework Submission Rules <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Feedback Service) Section  ================-->
        <div class="refund_policy_border"></div>

        <!--================  Start (Non-Exam Assessment-NEA) Section  ================-->
        <section class="nea_main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nea_section">
                            <div class="section_title high_standard_title exam_fees_title">
                                <h2>Non-Exam Assessment (NEA) <span>Steps to Get Started</span></h2>
                                <p>As part of the examination process, you must complete the Non-Exam Assessment (NEA) component associated with some of the subjects you will be undertaking. Here’re the 5 steps to follow:</p>
                            </div>
                            <div class="nea_section_contents">
                                <div class="nea_section_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/box.png" alt="">
                                    <div class="nea_section_single_contents">
                                        <h3>1</h3>
                                        <h4>Meeting the Tutor</h4>
                                        <p>We will arrange a 10-minute Zoom meeting with your tutor to discuss topics and schedule the required 4-hour sessions. These can be divided into 1-hour slots or customized to your preference, conducted online or face-to-face.</p>
                                    </div>
                                </div>
                                <div class="nea_section_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/box.png" alt="">
                                    <div class="nea_section_single_contents">
                                        <h3>2</h3>
                                        <h4>Follow the Guidance</h4>
                                        <p>Your tutor will provide you with guidance and feedback during each session. It is crucial to follow their instructions to improve your coursework and submit the best version possible.</p>
                                    </div>
                                </div>
                                <div class="nea_section_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/box.png" alt="">
                                    <div class="nea_section_single_contents">
                                        <h3>3</h3>
                                        <h4>Session Completion</h4>
                                        <p>Finish all the scheduled sessions with your tutor and apply their feedback to refine your coursework. Ensure your work is polished and ready for submission before the deadline.</p>
                                    </div>
                                </div>
                                <div class="nea_section_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/box.png" alt="">
                                    <div class="nea_section_single_contents">
                                        <h3>4</h3>
                                        <h4>Fill Out Necessary Documents</h4>
                                        <p>Both you and your tutor must complete and sign documents from the examination board to authenticate your coursework. Some subjects require specific forms. This step is mandatory, as the board will not accept coursework without these documents.</p>
                                    </div>
                                </div>
                                <div class="nea_section_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/box.png" alt="">
                                    <div class="nea_section_single_contents">
                                        <h3>5</h3>
                                        <h4>Wait for the Feedback</h4>
                                        <p>After marking, you will receive your coursework marks and feedback. Use this feedback to understand your performance and ensure your work is ready for submission to the board.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="nea_section_communicate">
                                <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/non-exam-assesment/message.png" alt=""></span>
                                <h4>Always Communicate</h4>
                                <p>Maintain open communication with both your tutor and the centre. If you are not satisfied with your tutor for any reason, please inform us. We will provide alternative options if necessary.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Non-Exam Assessment-NEA) Section  ================-->
@endsection
