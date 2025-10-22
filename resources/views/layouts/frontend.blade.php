<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description') | {{ $seo->meta_description }}" />
    <meta name="keywords" content="{{ $seo->meta_keyword }}" />
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta property="og:title" content="Exam Centre London I Private Exam Centre London | GCSE, A-Level, Functional Skills, AAT, Private candidates are welcome | @yield('title')" />
    <meta property="og:url" content="https://www.examcentrelondon.co.uk" />
    <meta property="og:site_name" content="Exam Centre London I Private Exam Centre London | GCSE, A-Level, Functional Skills, AAT, Private candidates are welcome" />
    <meta name="google-site-verification" content="Xhe7BCdyujybO4PreXFZCam9W05WXqaomr3yxAAPFmo" />
    <title> @yield('title')</title>
    <link rel="icon" href="{{ asset('frontend/updatedesign') }}/assets/images/favicon.png">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/owl.theme.default.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/normalize.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend/updatedesign') }}/assets/css/responsive.css">
    <style>
        .container-fluid {
            width: 95%;
        }
    </style>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SE8F0X0QPQ"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SE8F0X0QPQ');
</script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1055313146174856');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1055313146174856&ev=PageView&noscript=1"
/></noscript>

</head>

<body>

    <div class="fixed_overlay"></div>
    <!--================  Start Header Section  ================-->
    <header class="header_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('sweetalert::alert')
                    <div class="header">
                        <div class="header_top">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset('frontend/updatedesign') }}/assets/images/home/logo.png"
                                        alt=""></a>
                                <div class="menu_icon">
                                    <a href="#"><img
                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/bars.png"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="menu">
                                <ul>
                                    <li><a target="__blank" href="https://merittutors.co.uk">Tuition Centre</a></li>
                                    <li><a href="{{ url('/exam-booking-procedure') }}">Booking Procedure</a></li>
                                    <li><a href="{{ url('/exam-list') }}">Book Your Exam</a></li>
                                     <!--<li><a href="{{ url('/blogs') }}">Blogs</a></li>-->
                                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="header_top_call"><a href="tel:02086162526">Call 0208 616 2526 <span><img
                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/call.png"
                                            alt=""></span></a></div>
                        </div>
                        <div class="dropdown_menu_main">
                            <div class="dropdown_menu_mobile_design">
                                <div class="dropdown_menu_header">
                                    <a href="#"><img
                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/logo.png"
                                            alt=""></a>
                                    <a href="#" class="menu_close_icon"><i class="fas fa-close"></i></a>
                                </div>
                                <div class="dropdown_menu_mobile">

                                </div>
                            </div>
                            <ul class="navbar">
                                <li><a href="{{ url('/') }}"
                                        class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ url('/about-us') }}"
                                        class="{{ Request::is('about-us') ? 'active' : '' }}">About Us</a></li>
                                <li>
                                    <a href="#"
                                        class="{{ Request::is('functional-skills-exams') ||
                                        Request::is('functional-skills-tuition-details') ||
                                        Request::is('a-level-exams') ||
                                        Request::is('as-level-exams') ||
                                        Request::is('gcse-exams') ||
                                        Request::is('igcse-exams') ||
                                        Request::is('aat-exams') ||
                                        Request::is('proctor-exam-details') ||
                                        Request::is('iseb-details') ||
                                        Request::is('acca-exams')
                                            ? 'active'
                                            : '' }} dropdown_toggle">Exams
                                        <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown_menu">
                                       
                                        <li><a href="{{ url('/gcse-exams') }}">GCSE Exams</a></li>
                                        <li><a href="{{ url('/igcse-exams') }}"> IGCSE Exams</a></li>
                                        <li><a href="{{ url('/a-level-exams') }}">A Level Exams</a></li>
                                        <li><a href="{{ url('/as-level-exams') }}">AS Level Exams</a></li>
                                        <li><a href="{{ url('/acca-exams') }}">ACCA Exams</a></li>
                                        <li><a href="{{ url('/aat-exams') }}">AAT Exams</a></li>
                                        <li><a href="{{ url('/functional-skills-exams') }}">Functional Skills Exams</a></li>
                                        <li><a href="{{ url('/proctor-exam-details') }}">Proctor Exams</a></li>
                                        <li><a href="{{ url('/iseb-details') }}">ISEB Exams</a></li>
                                        <li><a href="{{ url('/step-maths-exam-centre') }}">Step Maths Exams (OCR)</a></li>
                                         <li><a href="{{ url('functional-skills-tuition-details') }}">Functional Skills
                                                Tuition</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/invigilation-services') }}"
                                        class="{{ Request::is('invigilation-services') ? 'active' : '' }}">Invigilation
                                        Services</a></li>
                                <li><a href="{{ url('/exam-fees') }}"
                                        class="{{ Request::is('exam-fees') ? 'active' : '' }}">Our Fees</a></li>
                                <li>
                                    <a href="#"
                                        class="{{ Request::is('a-level-endorsment') || Request::is('gcse-endorsment') ? 'active' : '' }} dropdown_toggle">Practical
                                        Endorsement <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown_menu">
                                        <li><a href="{{ url('/a-level-endorsment') }}">A LEVEL ENDORSEMENT</a></li>
                                        <li><a href="{{ url('/gcse-endorsment') }}">GCSE ENDORSEMENT</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"
                                        class="{{ Request::is('alevel-courses') || Request::is('gcse-courses') || Request::is('courses') ? 'active' : '' }} dropdown_toggle">Courses
                                        <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown_menu">
                                        <li><a href="{{ url('/alevel-courses') }}">A LEVEL COURSES</a></li>
                                        <li><a href="{{ url('/gcse-courses') }}">GCSE COURSES</a></li>
                                        <li><a href="{{ url('/courses') }}">ALL COURSES</a></li>
                                    </ul>
                                </li>
                                  <li>
                                    <a href="#"
                                        class="{{ Request::is('special-access') ||
                                        Request::is('refund-policy') ||
                                        Request::is('privacy-policy') ||
                                        Request::is('terms-condition') ||
                                        Request::is('result-day') ||
                                        Request::is('exam-tips') ||
                                        Request::is('exam-booking-date-details') ||
                                        Request::is('exam-timetables') ||
                                        Request::is('non-exam-assesment')
                                            ? 'active'
                                            : '' }} dropdown_toggle">Help & Info
                                        <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown_menu">
                                       
                                        <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                                        <li><a href="{{ url('/special-access') }}">Special Access</a></li>
                                        <li><a href="{{ url('/refund-policy') }}">Refund Policy</a></li>
                                        <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                        <li><a href="{{ url('/terms-condition') }}">Terms & Conditions</a></li>
                                        <li><a href="https://examcentrelondon.co.uk/uploads/Internal-Procedures-Policy-2023.pdf">Complaints & Appeals</a></li>
                                        <li><a href="{{ url('/result-day') }}">Results Day</a></li>
                                        <li><a href="{{ url('/exam-tips') }}">Exam Tips</a></li>
                                        <li><a href="{{ url('/exam-booking-date-details') }}">Exam Entry Deadline</a></li>
                                        <li><a href="{{ url('/exam-timetables') }}">Exam Timetables</a></li>
                                        <li><a href="{{ url('/non-exam-assesment') }}">Non Exam Assessment</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/ucas-registered-centre') }}"
                                        class="{{ Request::is('ucas-registered-centre') ? 'active' : '' }}">Ucas
                                        Application</a></li>
                                @if (Auth::user())
                                    <li><a href="{{ url('student/dashboard') }}"
                                            class="{{ Request::is('student/dashboard') ? 'active' : '' }}">Dashboard</a>
                                    </li>
                                @else
                                    <li><a href="{{ url('/login') }}"
                                            class="{{ Request::is('login') ? 'active' : '' }}">Login</a></li>
                                    <li><a href="{{ url('/student/signup') }}"
                                            class="{{ Request::is('student/signup') ? 'active' : '' }}">Register</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--================  End Header Section  ================-->

    @yield('content')

    <!--================  Start Footer Section  ================-->
    <footer class="footer_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer">
                        <div class="footer_contents">
                            <div class="footer_contents_single">
                                <p>About</p>
                                <ul>
                                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                    <li><a href="{{ url('/exam-fees') }}">Exam Fees</a></li>
                                    <li><a href="{{ url('/exam-tips') }}">Exam Tips</a></li>
                                    <li><a href="{{ url('/exam-booking-date-details') }}">Exam Entry Deadline</a></li>
                                    <li><a href="{{ url('/non-exam-assesment') }}">Non Exam Assessment</a></li>
                                    <li><a href="{{ url('/result-day') }}">Results Day</a></li>
                                </ul>
                                <ul class="footer_social">
                                    <li><a href="{{ $social->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $social->facebook }}"><i class="fab fa-facebook"></i></a></li>
                                    {{-- <li><a href="#"><i class="fab fa-pinterest"></i></a></li> --}}
                                    <li><a href="{{ $social->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $social->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer_contents_single">
                                <p>Pages</p>
                                <ul>
                                    @if (Auth::user())
                                        <li><a href="{{ url('/student/dashboard') }}">Dashboard</a></li>
                                    @else
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                        <li><a href="{{ url('student/signup') }}">Register</a></li>
                                    @endif
                                    <li><a href="{{ url('/faq') }}">FAQs</a></li>
                                    <li><a href="{{ url('/exam-list') }}">Exam List</a></li>
                                    <li><a href="{{ url('/functional-skills-tuition-details') }}">Functional Skills
                                            Tuition</a></li>
                                    <li><a href="{{ url('/proctor-exam-details') }}">Proctor Exam</a></li>
                                   <li><a href="{{ url('step-maths-exam-centre') }}">Step Maths Exam</a></li> 
                                </ul>
                            </div>
                            <div class="footer_contents_single">
                                <p>Need some help?</p>
                                <ul>
                                    <li><a href="{{ url('/exam-timetables') }}">Exam Timetables</a></li>
                                    <li><a href="{{ url('/refund-policy') }}">Refund Policy</a></li>
                                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ url('/terms-condition') }}">Terms & Conditions</a></li>
                                    <li><a
                                            href="https://examcentrelondon.co.uk/uploads/Internal-Procedures-Policy-2025.pdf">Complaints
                                            & Appeals
                                        </a></li>
                                        <li><a href="{{ url('/ilstalment-policy') }}">Ilstalment Policy</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                                </ul>
                            </div>
                            <div class="footer_contents_single footer_contents_single4">
                                <p>Join with us Today</p>
                                {{-- <div class="footer_contents_single_mail">
                                        <form>
                                            <input type="email" placeholder="Enter your email address">
                                            <button>Subscribe</button>
                                        </form>
                                    </div> --}}
                                <ul>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/map2.png"
                                                alt="">54 Upton Lane, London E7 9LN</a></li>
                                    <li><a href="tel:0208-616-2526"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/call.png"
                                                alt="">0208 616 2526</a></li>
                                    <li><a href="mailto:info@examcentrelondon.co.uk"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/mail2.png"
                                                alt="">info@examcentrelondon.co.uk</a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('frontend/updatedesign') }}/assets/images/home/event.png"
                                                alt="">Monday - Friday: 9AM - 5PM</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer_copyright">
                            <a href="#"><img
                                    src="{{ asset('frontend/updatedesign') }}/assets/images/home/logo.png"
                                    alt=""></a>
                            <p>© Copyright {{ Carbon\Carbon::now()->format('Y') }}
                                Exam Centre London All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================  End Footer Section  ================-->

    <!-- ~~~~~~~~~~ JS Files ~~~~~~~~~~-->
    <!-- jQuery -->
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/bootstrap.min.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/bootstrap.min.js"></script> -
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel -->
    <!-- Modernizr -->
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/modernizr-3.11.2.min.js"></script>
    <!-- Custom JS (Handed)-->
 
    <script src="{{ asset('frontend/updatedesign') }}/assets/js/scripts.js"></script>
    @yield('myjs')
</body>

</html>
