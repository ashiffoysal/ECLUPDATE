

@extends('layouts.frontend')
@section('title', 'Reset Password | Exam Centre London – Secure Your Account Access')
@section('meta_description', 'Forgot your password? Easily reset it by entering your registered email. Receive instructions to regain access to your Exam Centre London account and manage your exam bookings.')
@section('content')

<section class="login_page_main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="login_page">
          <div class="login_page_left">
            <div class="banner_right login_page_left_design">
                          <div class="banner_right_img">
                              <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-right.png" alt="">
                          </div>
                          <div class="banner_right_content1">
                              <div class="banner_right_content1_left">
                                  <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-text-img.png" alt=""></span>
                                  <div class="banner_right_content1_left_text">
                                      <h2>2.1 K</h2>
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
                                  <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-text-img2.png" alt=""></span>
                                  <div class="banner_right_content1_left_text">
                                      <h2>2 K+</h2>
                                      <p>Exams Completed</p>
                                  </div>
                              </div>
                              <div class="banner_right_border"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-right-border.png" alt=""></div>
                          </div>
                          <div class="banner_right_img_pos"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/banner-satisfaction.png" alt=""></div>
                      </div>
                      <div class="login_page_carousel">
                          <ul class="owl-carousel owl-theme">
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/login/img1.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/login/img2.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/login/img3.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/login/img4.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/login/img5.png" alt=""></a></li>
                          </ul>
                      </div>
          </div>
          
                    <div class="login_page_right">
                      <div class="login_page_form">
                        <form method="POST" action="{{ route('login.forgetpass') }}"> 
                          @csrf
                          <div class="login_page_form_title"><p>Forget password</p></div>
                          <div class="login_page_form_single">
                            <input type="email" name="email" placeholder="Please Enter your Email" id="loginid1" required>
                            <label for="loginid1">Email</label>
                                          <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15.9766 0.758545H1.97656C1.01406 0.758545 0.235312 1.54604 0.235312 2.50854L0.226562 13.0085C0.226562 13.971 1.01406 14.7585 1.97656 14.7585H15.9766C16.9391 14.7585 17.7266 13.971 17.7266 13.0085V2.50854C17.7266 1.54604 16.9391 0.758545 15.9766 0.758545ZM15.6266 4.47729L9.44031 8.34479C9.16031 8.51979 8.79281 8.51979 8.51281 8.34479L2.32656 4.47729C2.23882 4.42804 2.16199 4.3615 2.10071 4.28169C2.03944 4.20189 1.99499 4.11048 1.97007 4.01299C1.94514 3.91551 1.94025 3.81399 1.9557 3.71456C1.97115 3.61514 2.00661 3.51988 2.05993 3.43456C2.11326 3.34923 2.18335 3.27562 2.26595 3.21817C2.34855 3.16071 2.44195 3.12062 2.5405 3.10031C2.63904 3.08 2.74068 3.07989 2.83927 3.1C2.93786 3.12011 3.03134 3.16001 3.11406 3.21729L8.97656 6.88354L14.8391 3.21729C14.9218 3.16001 15.0153 3.12011 15.1139 3.1C15.2124 3.07989 15.3141 3.08 15.4126 3.10031C15.5112 3.12062 15.6046 3.16071 15.6872 3.21817C15.7698 3.27562 15.8399 3.34923 15.8932 3.43456C15.9465 3.51988 15.982 3.61514 15.9974 3.71456C16.0129 3.81399 16.008 3.91551 15.9831 4.01299C15.9581 4.11048 15.9137 4.20189 15.8524 4.28169C15.7911 4.3615 15.7143 4.42804 15.6266 4.47729V4.47729Z" fill="rgba(0,0,0,0.5)"/>
                            </svg>
                            @error('email_login')
                              <div style="color:red">{{ $message }}</div>
                            @enderror
                          </div>
                       
                          <div class="login_page_forgot">
                            
                          </div>
                          <button type="submit" class="btn_style">Submit</button>
                        </form>
                        <div class="login_page_with_google">
                          <p>or</p>
                          <a href="{{ url('auth/google') }}">
                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/login/google.png" alt="">
                            Login with Google
                          </a>
                        </div>
                        <div class="login_page_register"><p>Don’t have an account? <a href="{{ url('student/signup') }}">Register now</a></p></div>
                      </div>
                    </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
