@extends('layouts.frontend')
@section('title', ' Exam Booking Procedure | Step-by-Step Guide at Exam Centre London')
@section('meta_description', 'Follow our simple 4-step process to book your exam at Exam Centre London: Create an account, submit your form, make secure payment, and receive confirmation. Book now!')
@section('content')
        <!--================  Start (Ucas Application) Section  ================-->
        <section class="a_lavel_exams_main ucas_application_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="a_level_exams">
                            <div class="section_title high_standard_title">
                                <b>Exam Booking Procedure</b>
                                <h2>Welcome to Exam Centre London: <span>Exam Booking Procedure</span></h2>
                                <p>At Exam Centre London, we make exam booking simple and hassle-free. Our step-by-step procedure ensures a smooth experience from start to finish. Choose your desired exam, register on our platform for free, and complete the application with ease. Once you’ve submitted your form and payment, focus on your preparation while we handle the rest. Our dedicated team will confirm your booking promptly, giving you peace of mind. Whether you need guidance or have questions, our friendly support team is always here to help. Trust Exam Centre London for a seamless exam booking process tailored to your needs.</p>
                                <a href="{{ url('/exam-list') }}" class="btn_style">Exam List <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
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
                                <b>EXAM CENTRE LONDON | Exam Booking Procedure</b>
                                {{-- <h2>EXAM CENTRE LONDON | ECL</h2> --}}
                                {{-- <p>Our educators provide precise predicted grades, mock exams to simulate UCAS conditions, and personalized feedback to enhance performance. With a streamlined four-step application process, we make exam preparation efficient and effective.</p> --}}
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
                                    <p>Fill out the necessary information to register for the Series Exam. Be sure to provide accurate details to ensure a smooth experience.</p>
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
                                    <p>Once your payment is processed, you'll receive a confirmation email with all the details you need to prepare for your exam, including the date, time, and venue.</p>
                                </div>
                            </div>
                            <div class="exam_center_london_btn">
                                <a href="{{ url('/exam-list') }}" class="btn_style">Exam List <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================  End (EXAM CENTRE LONDON | ECL) Section  ================-->
@endsection