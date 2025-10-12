@extends('layouts.frontend')
@section('title', 'Student Login | Access Your Exam Centre London Account')
@section('meta_description', 'Log in to your Exam Centre London account to book exams, view results, and manage your profile. Secure access for students and candidates. Forgot your password? Reset it here.')
@section('content')
@php
$totalBookingCandidate = App\Models\ExamRequest::query()
->where([
    ['is_completed_from', 1],
    ['is_deleted', 1],
    ['is_paid', 1],
    ['is_withdrawn', 0],
    ['is_refunded', 0],
    ['is_paid_verify', 1],
])
->count('id');


$totalExamCandidate=App\Models\ExamRequest::query()
->where([
    ['is_completed_from', 1],
    ['is_deleted', 1],
    ['is_paid', 1],
    ['is_withdrawn', 0],
    ['is_refunded', 0],
    ['is_paid_verify', 1],
    ['is_confirm_booking',1]
])
->count('id');
@endphp

    <section class="login_page_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login_page">
                        <div class="login_page_left">
                            <div class="banner_right login_page_left_design">
                                <div class="banner_right_img">
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-right.png"
                                        alt="">
                                </div>
                                <div class="banner_right_content1">
                                    <div class="banner_right_content1_left">
                                        <span><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-text-img.png"
                                                alt=""></span>
                                        <div class="banner_right_content1_left_text">
                                            <h2>{{ $totalBookingCandidate + 1300 }} </h2>
                                            <p>Students</p>
                                        </div>
                                    </div>
                                    <div class="banner_right_content1_left_text banner_right_content1_left_text2">
                                        <h2>64+</h2>
                                        <p>Teachers</p>
                                    </div>
                                </div>
                                <div class="banner_right_content1 banner_right_content2">
                                    <div class="banner_right_content1_left">
                                        <span><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-text-img2.png"
                                                alt=""></span>
                                        <div class="banner_right_content1_left_text">
                                            <h2>{{ $totalExamCandidate + 1300 }} +</h2>
                                            <p>Exams Completed</p>
                                        </div>
                                    </div>
                                    <div class="banner_right_border"><img
                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-right-border.png"
                                            alt=""></div>
                                </div>
                                <div class="banner_right_img_pos"><img
                                        src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-satisfaction.png"
                                        alt=""></div>
                            </div>
                            <div class="login_page_carousel">
                                <ul class="owl-carousel owl-theme">
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/login/img1.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/login/img2.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/login/img3.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/login/img4.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/login/img5.png"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="login_page_right">
                            <div class="login_page_form">
                                <form method="POST" action="{{ route('login.custom') }}">
                                    @csrf
                                    <div class="login_page_form_title">
                                        <p>Login</p>
                                    </div>
                                    <div class="login_page_form_single">
                                        <input type="email" name="email_login" placeholder="Email" id="loginid1"
                                            required>
                                        <label for="loginid1">Email</label>
                                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.9766 0.758545H1.97656C1.01406 0.758545 0.235312 1.54604 0.235312 2.50854L0.226562 13.0085C0.226562 13.971 1.01406 14.7585 1.97656 14.7585H15.9766C16.9391 14.7585 17.7266 13.971 17.7266 13.0085V2.50854C17.7266 1.54604 16.9391 0.758545 15.9766 0.758545ZM15.6266 4.47729L9.44031 8.34479C9.16031 8.51979 8.79281 8.51979 8.51281 8.34479L2.32656 4.47729C2.23882 4.42804 2.16199 4.3615 2.10071 4.28169C2.03944 4.20189 1.99499 4.11048 1.97007 4.01299C1.94514 3.91551 1.94025 3.81399 1.9557 3.71456C1.97115 3.61514 2.00661 3.51988 2.05993 3.43456C2.11326 3.34923 2.18335 3.27562 2.26595 3.21817C2.34855 3.16071 2.44195 3.12062 2.5405 3.10031C2.63904 3.08 2.74068 3.07989 2.83927 3.1C2.93786 3.12011 3.03134 3.16001 3.11406 3.21729L8.97656 6.88354L14.8391 3.21729C14.9218 3.16001 15.0153 3.12011 15.1139 3.1C15.2124 3.07989 15.3141 3.08 15.4126 3.10031C15.5112 3.12062 15.6046 3.16071 15.6872 3.21817C15.7698 3.27562 15.8399 3.34923 15.8932 3.43456C15.9465 3.51988 15.982 3.61514 15.9974 3.71456C16.0129 3.81399 16.008 3.91551 15.9831 4.01299C15.9581 4.11048 15.9137 4.20189 15.8524 4.28169C15.7911 4.3615 15.7143 4.42804 15.6266 4.47729V4.47729Z"
                                                fill="rgba(0,0,0,0.5)" />
                                        </svg>
                                        @error('email_login')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="login_page_form_single input-group">
                                        <label for="password">Password</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <!--<i class="fas fa-eye-slash" id="eye"></i>-->
                                            </div>
                                        </div>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password"  required>
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <g opacity="1">
                                                <path
                                                    d="M10.9766 14.2332C11.4598 14.2332 11.8516 13.8414 11.8516 13.3582C11.8516 12.8749 11.4598 12.4832 10.9766 12.4832C10.4933 12.4832 10.1016 12.8749 10.1016 13.3582C10.1016 13.8414 10.4933 14.2332 10.9766 14.2332Z"
                                                    fill="rgba(0,0,0,0.5)" />
                                                <path
                                                    d="M15.3516 7.2331H14.4766V5.57935C14.4766 4.65109 14.1078 3.76085 13.4514 3.10447C12.7951 2.44809 11.9048 2.07935 10.9766 2.07935C10.0483 2.07935 9.15807 2.44809 8.50169 3.10447C7.84531 3.76085 7.47656 4.65109 7.47656 5.57935V7.2331H6.60156C5.90537 7.2331 5.23769 7.50966 4.74541 8.00194C4.25312 8.49422 3.97656 9.1619 3.97656 9.8581V16.8581C3.97656 17.5543 4.25312 18.222 4.74541 18.7143C5.23769 19.2065 5.90537 19.4831 6.60156 19.4831H15.3516C16.0478 19.4831 16.7154 19.2065 17.2077 18.7143C17.7 18.222 17.9766 17.5543 17.9766 16.8581V9.8581C17.9766 9.1619 17.7 8.49422 17.2077 8.00194C16.7154 7.50966 16.0478 7.2331 15.3516 7.2331ZM9.22656 5.57935C9.21479 5.10273 9.39233 4.64086 9.72031 4.29484C10.0483 3.94882 10.5 3.74684 10.9766 3.7331C11.4531 3.74684 11.9048 3.94882 12.2328 4.29484C12.5608 4.64086 12.7383 5.10273 12.7266 5.57935V7.2331H9.22656V5.57935ZM10.9766 15.9831C10.4574 15.9831 9.94987 15.8291 9.51819 15.5407C9.08651 15.2523 8.75006 14.8423 8.55138 14.3626C8.3527 13.883 8.30071 13.3552 8.402 12.846C8.50329 12.3368 8.75329 11.8691 9.12041 11.5019C9.48752 11.1348 9.95525 10.8848 10.4645 10.7835C10.9737 10.6822 11.5015 10.7342 11.9811 10.9329C12.4608 11.1316 12.8707 11.468 13.1592 11.8997C13.4476 12.3314 13.6016 12.8389 13.6016 13.3581C13.6016 14.0543 13.325 14.722 12.8327 15.2143C12.3404 15.7065 11.6728 15.9831 10.9766 15.9831Z"
                                                    fill="rgba(0,0,0,0.5)" />
                                            </g>
                                        </svg>
                                        @error('password')
                                            <div style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="login_page_forgot">
                                        <div class="lpf_left">
                                            <div class="single_form_step2_check">
                                                <input type="checkbox" id="id76">
                                                <label for="id76">Save password</label>
                                            </div>
                                        </div>
                                        <a href="{{ url('/forget-password') }}">Forgot password?</a>
                                    </div>
                                    <button type="submit" class="btn_style">Login</button>
                                </form>
                                <div class="login_page_with_google">
                                    <p>or</p>
                                    <a href="{{ url('auth/google') }}">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/login/google.png"
                                            alt="">
                                        Login with Google
                                    </a>
                                </div>
                                <div class="login_page_register">
                                    <p>Don’t have an account? <a href="{{ url('student/signup') }}">Register now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
