@extends('layouts.frontend')
@section('title', 'About Exam Centre London | Trusted Private Exam Centre in London')
@section('meta_description', 'Learn about Exam Centre London – your trusted partner for private and independent learners. Offering a wide range of qualifications, flexible scheduling, and expert support. Book your exam today!')
@section('content')
<style>
    .exam_center_london_title h2 {
    font-size: 45px;
    margin: 25px 0px 20px 0px;
    color: #FFFFFF;
    letter-spacing: -2px;
    max-width: 895px;
}
    .exam_center_london_title h1 {
    font-size: 45px;
    margin: 25px 0px 20px 0px;
    color: #FFFFFF;
    letter-spacing: -2px;
    max-width: 895px;
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
                        <li><a href="{{ url('/about-us')  }}">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="exam_center_london_main" style="margin-top: 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="exam_center_london">
                    <div class="section_title exam_center_london_title">
                        <b>EXAM CENTRE LONDON | ECL</b>
                        <h1>The preferred exam centre for learners across London and beyond</h1>
                        <p>Hundreds of learners trust ECL for their assessment needs, whether they are home educators, distance learners, or independent students.</p>
                    </div>
                    <div class="exam_center_london_contents">
                        <div class="exam_center_london_single">
                            <div class="exam_center_london_item">
                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/ecl1.png" alt="">
                                <h4>Accessible for Everyone!</h4>
                                <p>Conveniently located in East London, our exam centres are close to transport hubs, making them easy to reach for candidates from across London and the South-East.</p>
                            </div>
                        </div>
                        <div class="exam_center_london_single">
                            <div class="exam_center_london_item">
                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/ecl2.png" alt="">
                                <h4>Wide Range of Qualifications!</h4>
                                <p>We provide a wealth of examination and assessment options, including:</p>
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        AAT
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        GCSEs
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        ACCA
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        A Level
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        IGCSEs
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        AS Level
                                    </li>
                                </ul>
                                <ul class="exam_center_london_item_ul">
                                    <li>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/square.png" alt="">
                                        Functional Skills
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="exam_center_london_single">
                            <div class="exam_center_london_item">
                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/ecl3.png" alt="">
                                <h4>Affordable and Reliable!</h4>
                                <p>Tailored to suit your needs, ECL offers transparent affordable and reliable pricing and a supportive environment to make exams stress-free.</p>
                            </div>
                        </div>
                    </div>
                    <div class="exam_center_london_btn">
                        <a href="{{ url('/exam-list') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="exam_board_main" style="padding: 40px 0px 100px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="exam_board">
                    <div class="exam_board_title"><p>Officially Accepted Exam Boards</p></div>
                    <div class="exam_board_items exam_board_items_carousel">
                        <ul class="owl-carousel owl-theme">
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board1.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board2.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board3.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board4.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board5.png" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board6.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection