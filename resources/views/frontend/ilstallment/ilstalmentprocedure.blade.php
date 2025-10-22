@extends('layouts.frontend')
@section('title', 'Privacy Policy | Exam Centre London – Data Protection & Your Rights')
@section('meta_description', 'Learn how Exam Centre London collects, uses, and safeguards your personal information. Understand your rights and our commitment to data protection. Read our full privacy policy here.')
@section('content')
<section class="a_lavel_exams_main ucas_application_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="a_level_exams">
                    <div class="section_title high_standard_title">
                        <b>Instalment Payment Policy</b>
                        <h2>Instalment  <span>Policy</span></h2>
                        <p>At Exam Centre London, we understand that paying exam fees in full may not always be convenient. To support our candidates, we offer an instalment payment option, available only for the June exam series. </p>
                        <div class="a_level_exam_booking_header_btns">
                            <a href="tel:0208 616 2526"><i class="fa-solid fa-phone"></i>0208 616 2526</a>
                            <a href="mailto:info@examcentrelondon.co.uk"><i class="fa-solid fa-envelope"></i>info@examcentrelondon.co.uk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================  End (Blogs Title) Section  ================-->

<!--================  Start (Refund Policy) Section  ================-->
<section class="refund_policy_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="refund_policy">
                    <div class="refund_policy_single">
                        <div class="refund_policy_title">
                            {{-- <h2>Refund Policy for GCSE, IGCSE, and A-Level Exams</h2> --}}
                        </div>
                        <div class="refund_policy_table">
                            <div class="table_design_default">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Contents</th>
                                            <th>Details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1. Eligibility</td>
                                            <td>The instalment option is only available for the June exam series.

This option must be chosen at the time of registration.</b></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>2. Payment Schedule </td><br>
                                            <td>First Instalment: 50% of the total exam fee must be paid at the time of registration.

Second Instalment: The remaining 50% must be paid within the specified instalment period.
                                            
                                        </tr>
                                        <tr>
                                            <td>3.Instalment Charge </td>
                                            <td>A 5% instalment fee will be added to the total exam fee when selecting the instalment plan.</td>
                                        </tr>
                                        <tr>
                                            <td>4.Important Conditions  </td>
                                            <td>If full payment is not completed within the specified timeframe, your exam registration will be automatically cancelled.

No refunds will be issued for missed or incomplete payments.

We will not issue your Statement of Entry or Centre Statement until full payment has been received and confirmed.</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="refund_policy_border"></div>

                    <div class="refund_policy_no_refund">
                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/refund-policy/no-refund.png" alt="">
                        <p><b>No Refund after First Deadline</b></p>
                        <p>Once the exam booking is confirmed and the candidate receives an email confirmation, the booking is final and non-refundable.</p>
                    </div>

                    <div class="our_refund_policy_btn"><a href="{{ url('/exam-list') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================  End (Refund Policy) Section  ================-->

<!--================  Start Footer Section  ================-->
        
@endsection