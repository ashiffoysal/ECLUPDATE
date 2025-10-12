@extends('layouts.frontend')
@section('title', 'UCAS Application Support | Exam Centre London – Expert Guidance & Services')
@section('meta_description', 'Navigate your UCAS application with confidence at Exam Centre London. As a registered UCAS centre, we offer mock exams, predicted grades, personal statement reviews, and comprehensive application support to enhance your university prospects.')
@section('content')
<style>
    .high_standard_title h1 {
    color: #000;
    margin-top: 15px;
    text-transform: capitalize;
}
</style>
        <!--================  Start (Ucas Application) Section  ================-->
        <section class="a_lavel_exams_main ucas_application_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="a_level_exams">
                            <div class="section_title high_standard_title">
                                <b>Ucas Application</b>
                                <h1>Welcome to Exam Centre London: <span>Your UCAS Application With Ease</span></h1>
                                <p>At Exam Centre London, we understand the importance of your academic journey, and we're here to help you excel in your UCAS application. Our dedicated team is committed to providing you with the best preparation and guidance to ensure your success. With our UCAS Mock Exam and Predicted Grade service, you're one step closer to achieving your educational goals.</p>
                                <a href="{{ url('ucas-application') }}" class="btn_style">Application form <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Ucas Application) Section  ================-->

        <!--================  Start (EXAM CENTRE LONDON | ECL) Section  ================-->
        <section class="exam_center_london_main exam_center_london_main_ucas_application">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="exam_center_london">
                            <div class="section_title exam_center_london_title">
                                <b>EXAM CENTRE LONDON | ECL</b>
                                <h2>Why Choose Exam Centre London?</h2>
                                <p>Our educators provide precise predicted grades, mock exams to simulate UCAS conditions, and personalized feedback to enhance performance. With a streamlined four-step application process, we make exam preparation efficient and effective.</p>
                            </div>
                            <div class="ucas_exam_center_london_contents">
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl1.png" alt="">
                                    <span>Step 1</span>
                                    <h3>Login</h3>
                                    <p>Create an account on our platform to access our services. Your login details will allow you to track your progress and receive updates.</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl2.png" alt="">
                                    <span>Step 2</span>
                                    <h3>Form Submission</h3>
                                    <p>Fill out the necessary information to register for the UCAS Mock Exam. Be sure to provide accurate details to ensure a smooth experience.</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl3.png" alt="">
                                    <span>Step 3</span>
                                    <h3>Make Payment</h3>
                                    <p>Pay securely for your selected exam package. We offer competitive pricing to make our services accessible to all students.</p>
                                </div>
                                <div class="ucas_exam_center_london_item">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ecl4.png" alt="">
                                    <span>Step 4</span>
                                    <h3>Confirmation</h3>
                                    <p>Once your payment is processed, you'll receive a confirmation email with all the details you need to prepare for your mock exam, including the date, time, and venue.</p>
                                </div>
                            </div>
                            <div class="exam_center_london_btn">
                                <a href="{{ url('ucas-application') }}" class="btn_style">Application form <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (EXAM CENTRE LONDON | ECL) Section  ================-->

        <!--================  Start (Important Deadlines) Section  ================-->
        <section class="important_deadlines_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="important_deadlines">
                            <div class="important_deadlines_title">
                                <h2>Important Deadlines</h2>
                            </div>
                            <div class="important_deadlines_contents">
                                <div class="a_lavel_exam_bodies_calender important_deadlines_single">
                                    <div class="a_lavel_exam_bodies_calender_img important_deadlines_single_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/calender.png" alt="">
                                        <div class="important_deadlines_single_date">
                                            <p><b>January</b></p>
                                            <h3>05</h3>
                                            <p>Tue</p>
                                        </div>
                                    </div>
                                    <div class="a_lavel_exam_bodies_calender_contents important_deadlines_single_text">
                                        <h4>Mock Exam Submission Deadline</h4>
                                        <p>As the designated exam centre in London, we would like to remind all students that the deadline for submitting UCAS mock exam forms at our centre is January 5th. This is a crucial step in your UCAS application process, allowing universities to assess your academic capabilities and potential.</p>
                                    </div>
                                </div>
                                <div class="a_lavel_exam_bodies_calender important_deadlines_single">
                                    <div class="a_lavel_exam_bodies_calender_img important_deadlines_single_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/calender.png" alt="">
                                        <div class="important_deadlines_single_date">
                                            <p><b>January</b></p>
                                            <h3>12</h3>
                                            <p>Mon</p>
                                        </div>
                                    </div>
                                    <div class="a_lavel_exam_bodies_calender_contents important_deadlines_single_text">
                                        <h4>Mock Exam Result Deadline</h4>
                                        <p>We understand that you need your predicted grades promptly to finalize your UCAS application. Our team is committed to providing you with your mock exam results within a week after you've taken the exam. The mock exam deadline is the 12 th January 2026. This ensures that you have ample time to include them in your UCAS application before the deadline.</p>
                                    </div>
                                </div>
                                <div class="a_lavel_exam_bodies_calender important_deadlines_single">
                                    <div class="a_lavel_exam_bodies_calender_img important_deadlines_single_img">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/calender.png" alt="">
                                        <div class="important_deadlines_single_date">
                                            <p><b>January</b></p>
                                            <h3>25</h3>
                                            <p>Sat</p>
                                        </div>
                                    </div>
                                    <div class="a_lavel_exam_bodies_calender_contents important_deadlines_single_text">
                                        <h4>UCAS Application Deadline</h4>
                                        <p>Make sure to submit your UCAS application by the specified deadline. This deadline can vary depending on your course and university choices, so please check the <a href="#">UCAS</a> website for the most up-to-date information.<br>Buzzcode: <span>MeritTutors2026</span>, UCAS Centre Name: <span>Merit Tutors Ltd</span>,     UCAS Centre Number: <span>21034</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Important Deadlines) Section  ================-->

        <!--================  Start (UCAS Registered Centre) Section  ================-->
        <section class="ucas_registered_centre_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="contact_us">
                            <div class="contact_us_left">
                                <div class="contact_us_left_items ucas_register_left_items">
                                    <ul>
                                        <li><a href="#" class="contact_us_items_bg contact_a1">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ucas-register1.png" alt="">
                                            Expert UCAS Application Support
                                        </a></li>
                                        <li><a href="#" class="contact_us_items_bg ucas_register_a2">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ucas-register2.png" alt="">
                                            Application Tracking
                                        </a></li>
                                        <li><a href="#">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/people.png" alt="">
                                            Personal Statement Enhancement
                                        </a></li>
                                        <li><a href="#">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon4.png" alt="">
                                            Tailored University Recommendations
                                        </a></li>
                                        <li><a href="#" class="contact_us_items_bg contact_a5">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/ucas-register5.png" alt="">
                                            Partner with us
                                        </a></li>
                                        <li><a href="#">
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/contact-icon6.png" alt="">
                                            Secure Fee Payments
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="contact_us_right">
                                <div class="section_title contact_us_title ucas_register_title">
                                    <h2><span>UCAS Registered Centre:</span><br>Your Gateway to Higher Education</h2>
                                </div>
                                <div class="contact_us_right_contents ucas_register_right_items">
                                    <ul>
                                        <li>
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">
                                            We guide you through the entire UCAS process, offering expert advice and application reviews.
                                        </li>
                                        <li>
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">
                                            Get feedback and edits to make your personal statement stand out.
                                        </li>
                                        <li>
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">
                                            Track your application progress with timely updates.
                                        </li>
                                        <li>
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">
                                            Our advisors help you select the best universities for your goals.
                                        </li>
                                        <li>
                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square2.png" alt="">
                                            We handle fee payments securely for your peace of mind.
                                        </li>
                                    </ul>
                                    <a href="{{ url('ucas-application') }}" class="btn_style">Application form <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================  End (UCAS Registered Centre) Section  ================-->

        <!--================  Start (Ucas Application Process) Section  ================-->
        <section class="ucas_application_process_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ucas_application_process">
                            <div class="ucas_application_process_title">
                                <h2>Ucas Application Process: Simplified Steps to Success</h2>
                                <p>Follow these streamlined steps with Exam Centre London to ensure your UCAS application stands out and opens doors to your academic future.</p>
                            </div>
                            <div class="ucas_application_process_contents">
                                <div class="ucas_application_process_single">
                                    <div class="ucas_application_process_single_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap1.png" alt=""></div>
                                    <h4>1<br>Submit Your UCAS Application</h4>
                                    <p>Link your application to us using Buzzcode: <b>MeritTutors2026</b> UCAS Centre Name: <b>Merit Tutors Ltd</b> Centre Number: <b>21034</b></p>
                                    <div class="ucas_application_process_single_arrow"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap-arrow.png" alt=""></div>
                                </div>
                                <div class="ucas_application_process_single">
                                    <div class="ucas_application_process_single_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap2.png" alt=""></div>
                                    <h4>2<br>Document Verification</h4>
                                    <p>We’ll verify your submitted documents thoroughly to ensure everything is accurate and ready for review.</p>
                                    <div class="ucas_application_process_single_arrow uapsa2"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap-arrow2.png" alt=""></div>
                                </div>
                                <div class="ucas_application_process_single">
                                    <div class="ucas_application_process_single_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap3.png" alt=""></div>
                                    <h4>3<br>Tailored Mock Exams</h4>
                                    <p>Practice with detailed mock exams based on past papers and receive precise predicted grades.</p>
                                    <div class="ucas_application_process_single_arrow"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap-arrow.png" alt=""></div>
                                </div>
                                <div class="ucas_application_process_single">
                                    <div class="ucas_application_process_single_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/uap4.png" alt=""></div>
                                    <h4>4<br>Personalized Consultation</h4>
                                    <p>Meet us to refine your profile, highlight achievements, and gain key insights to boost your chances</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Ucas Application Process) Section  ================-->

        <!--================  Start (Our Pricing) Section  ================-->
        <section class="our_pricing_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="our_pricing">
                            <div class="section_title high_standard_title our_pricing_title">
                                <b>Our Pricing</b>
                                <h2>Invest in Your Future with <span>Expert UCAS Support</span></h2>
                                <p>Our expert guidance can significantly enhance your chances of securing a place at one of the UK’s top universities.</p>
                            </div>
                            <div class="our_pricing_contents">
                                <div class="our_pricing_single">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/our-pricing1.png" alt="">
                                    <h3>UCAS Application Support</h3>
                                    <p>Comprehensive service including document verification and reference preparation</p>
                                    <b>£100</b>
                                </div>
                                <div class="our_pricing_single our_pricing_single2">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/our-pricing2.png" alt="">
                                    <h3>Mock Exams for Predicted Grades</h3>
                                    <p>Ensure accurate predicted grades with mock exams tailored to your level</p>
                                    <div class="our_pricing_single_text_parent">
                                        <div class="our_pricing_single_text">
                                            <h3>£70</h3>
                                            <p>GCSE per Paper</p>
                                        </div>
                                        <div class="our_pricing_single_text">
                                            <h3>£80</h3>
                                            <p>A Level per Paper</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="our_pricing_single our_pricing_single3">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/our-pricing3.png" alt="">
                                    <h3>Personal Statement Review</h3>
                                    <p>Receive detailed feedback and improvements on your personal statement</p>
                                    <div class="our_pricing_single_text_parent our_pricing_single_text_parent2">
                                        <div class="our_pricing_single_text">
                                            <h3>£50</h3>
                                            <p>For 2 hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="our_pricing_btn"><a href="{{ url('ucas-application') }}" class="btn_style">Application form <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Our Pricing) Section  ================-->

        <!--================  Start (Frequently Asked Questions) Section  ================-->
        <section class="faqs_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="faqs">
                            <div class="section_title high_standard_title">
                                <h2>Frequently Asked <span>Questions</span></h2>
                                <p>Your Questions Answered: Find everything you need to know about our exam center, services, and policies.</p>
                            </div>
                            <div class="faqs_contents">
                                <div class="panel-group custom_accordion custom_accordion_ucas accordion-flush" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    What is Exam Centre London, and how can  Exam Centre London help with my UCAS application?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body custom_accordion_body">Exam Centre London is a registered UCAS center offering comprehensive support for students applying to universities in the UK. We provide services such as mock exams, predicted grades, personal statement assistance, and application tracking to help you strengthen your UCAS application and increase your chances of securing a place at your desired university.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                                    Can Exam Centre London help me choose the right universities to apply to?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                            <div class="panel-body custom_accordion_body">Yes, we provide tailored university recommendations based on your academic goals, qualifications, and preferences. Our advisors will help you select the best five universities that align with your aspirations and strengths.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    How do I pay for the services at Exam Centre London?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body custom_accordion_body">You can make secure payments online through our platform. We accept various payment methods to ensure a smooth and hassle-free process.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading4">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                                    Is Exam Centre London only for students applying to UK universities?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                            <div class="panel-body custom_accordion_body">While our primary focus is supporting students applying through UCAS to UK universities, our services, such as personal statement assistance and mock exams, can also benefit students applying to international universities.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading5">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                    What happens if I miss a deadline?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                                            <div class="panel-body custom_accordion_body">Meeting deadlines is crucial in the UCAS application process. If you miss a deadline, it could impact your ability to include important elements, such as predicted grades, in your application. We encourage you to stay on top of all deadlines and reach out to us if you need assistance in managing your application timeline.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading6">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                                    What are the key deadlines I need to be aware of?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                                            <div class="panel-body custom_accordion_body">Predicted grades are an estimate of the grades you are expected to achieve in your upcoming exams. These grades are crucial in the UCAS application process as universities use them to assess your academic potential and make conditional offers. At Exam Centre London, we ensure your predicted grades are precise and reflect your capabilities.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-group custom_accordion custom_accordion_ucas" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading7">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                                    How do mock exams at Exam Centre London work?
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                                            <div class="panel-body custom_accordion_body">Our mock exams are designed to replicate the actual UCAS exam environment, allowing you to practice under similar conditions. After you complete the mock exams, our educators will assess your performance and provide accurate predicted grades that you can include in your UCAS application.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading8">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                                    How can Exam Centre London assist with my personal statement?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                                            <div class="panel-body custom_accordion_body">We offer personalized guidance to help you craft a compelling personal statement that highlights your strengths, achievements, and aspirations. Our team of experts, including graduates from top universities, will review your statement and provide feedback to ensure it stands out to admissions officers.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading9">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                                    What are predicted grades, and why are they important?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                                            <div class="panel-body custom_accordion_body">Predicted grades are an estimate of the grades you are expected to achieve in your upcoming exams. These grades are crucial in the UCAS application process as universities use them to assess your academic potential and make conditional offers. At Exam Centre London, we ensure your predicted grades are precise and reflect your capabilities.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading10">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                                    How do I register for the UCAS Mock Exams at Exam Centre London?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                                            <div class="panel-body custom_accordion_body">Registration is simple and can be completed online. Create an account on our platform, fill in the required details, make a secure payment, and receive a confirmation email with all the necessary information about your mock exams.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading11">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                                    What are the key deadlines I need to be aware of?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                            <div class="panel-body custom_accordion_body">Predicted grades are an estimate of the grades you are expected to achieve in your upcoming exams. These grades are crucial in the UCAS application process as universities use them to assess your academic potential and make conditional offers. At Exam Centre London, we ensure your predicted grades are precise and reflect your capabilities.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading12">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                                    How can I contact Exam Centre London if I have more questions?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                                            <div class="panel-body custom_accordion_body">You can reach us via our website’s contact form, email, or phone. Our friendly and knowledgeable staff are here to answer any questions and guide you through the UCAS application process.</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default custom_accordion_single">
                                        <div class="panel-heading" role="tab" id="heading13">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                                    What makes Exam Centre London different from other UCAS support services?
                                                </a>
                                            </h4>

                                        </div>
                                        <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                                            <div class="panel-body custom_accordion_body">Exam Centre London offers a personalized and comprehensive approach to the UCAS application process. From accurate predicted grades and realistic mock exams to expert personal statement feedback and tailored university recommendations, our services are designed to maximize your chances of success. We also provide ongoing support and application tracking to ensure you stay on course throughout the process. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (Frequently Asked Questions) Section  ================-->
@endsection