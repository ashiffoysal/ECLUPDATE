@extends('layouts.frontend')
@section('title', 'Contact Exam Centre London | Book Exams & Get Support')
@section('meta_description', 'Reach out to Exam Centre London at 54 Upton Lane, E7 9LN. Call 0208 616 2526 or email info@examcentrelondon.co.uk. We are here to assist with exam bookings and inquiries.')
@section('content')
    <div class="sub_menu_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub_menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="{{ url('/contact')  }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <section class="get_in_touch_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_us get_in_touch">
                        <div class="contact_us_left get_in_touch_left">
                            <div class="contact_us_left_items get_in_touch_right_items">
                                <ul>
                                    <li><a href="#" class="contact_us_items_bg contact_a1">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/map.png" alt="">
                                        54 Upton Lane, London E7 9LN
                                    </a></li>
                                    <li><a href="tel:0208-616-2526" class="contact_us_items_bg getin_touch2">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/call2.png" alt="">
                                        0208 616 2526
                                    </a></li>
                                    <li><a href="mailto:info@examcentrelondon.co.uk" class="contact_us_items_bg getin_touch3">
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/home/mail.png" alt="">
                                        info@examcentrelondon.co.uk
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="contact_us_right get_in_touch_right">
                            <form action="{{ url('contact') }}" method="POST">
                                <div class="get_in_touch_right_title">
                                    <h2>Get in Touch</h2>
                                    <p>Have questions or need support? <br>Let us help make your exam process stress-free.</p>
                                </div>
                                <div class="get_in_touch_right_contents">
                                    <div class="contact_us_right_single_input">
                                        @csrf
                                        <input type="text" placeholder="Enter Your Name" name="name" required>
                                    </div>
                                    <div class="contact_us_right_single_input">
                                        <input type="email" placeholder="Enter Your E-mail" name="email" required>
                                    </div>
                                    <div class="phone-input">
                                        <div class="flag-select">
                                        <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon" />
                                            <select id="country-code" class="country-code">
                                                <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected>+44 (UK)</option>
                                                {{-- <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option> --}}
                                            <!-- Add more countries here -->
                                            </select>
                                        </div>
                                        <input type="text" placeholder="Your Number" name="phone" class="phone-number" required/>
                                        <span class="optional-text">(Optional)</span>
                                    </div>
                                    <div class="contact_us_right_single_input">
                                        <input type="email" placeholder="Enter Your Subject" name="subject" required>
                                    </div>
                                    <div class="contact_us_right_single_input">
                                        <textarea placeholder="Message" name="message" required></textarea>
                                    </div>
                                    <button type="submit" class="btn_style">Send Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Contact Section -->
    <section class="map-contact-section">
        <div class="auto-container">
            <!-- Map Boxed -->
            <div class="map-boxed">
                <!-- Map Outer -->
                <div class="map-outer">
                   {!! $companyInformation->google_map !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Map Contact Section -->
@endsection