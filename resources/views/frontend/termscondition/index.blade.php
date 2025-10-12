@extends('layouts.frontend')
@section('title', 'Terms & Conditions | Exam Centre London – Exam Booking Policies')
@section('meta_description', 'Review Exam Centre London Terms & Conditions for exam bookings, cancellations, payments, and more. Understand our policies to ensure a smooth and informed examination experience.')
@section('content')
<section class="a_lavel_exams_main ucas_application_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="a_level_exams">
                    <div class="section_title high_standard_title">
                        <b>Terms and Condition</b>
                        <h2>Terms and <span>Condition</span></h2>
                        <p>By booking examinations with Exam Centre London, you are bind to the following Terms and Conditions. Please read these carefully and ensure that you understand them before registering with us. We reserve the right to modify this statement at any time without any notice by making changes to this page. You are advised to visit our website frequently.</p>
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
                                            <td>1. REGISTRATION AND PAYMENT </td>
                                            <td>The candidate will be expected to complete the full payment by the due date for the exam to be booked and confirmed. If the first deadline has passed, late fees may be added to the original cost for the submission to be processed. Payments can be made on our website or via bank transfer. Without the payment, Exam Centre London will not confirm any bookings. </b></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>2. OPTION CODES </td>
                                            <td>It is the candidate’s responsibility to ensure that the correct option codes have been provided from the relevant examination board sites. Exam Centre London cannot be held responsible for any errors made on the application form. The tier must be clearly stated (Higher or Foundation) if applicable. </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>3. DEADLINES </td>
                                            <td>All exam bookings must be submitted prior to our first deadline to enable Exam Centre London to issue the statements of entry on time. However, Exam Centre London will continue to process submissions received after the deadline with the additional late fees. There might be a small delay in receiving the statement of entries. </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>4. STATEMENT OF ENTRY </td>
                                            <td>A personalised statement of entry would be provided for each candidate once the registration has been processed. It is the candidate’s responsibility to carefully check for any errors and notify our exam officer within two working days to make any changes. Exam Centre London will be unable to make any changes after the two working days. </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>5. CANCELLATION/ WITHDRAWAL</td>
                                            <td>AAT, ACCA, Functional Skills: Once the exam has been booked, Exam Centre London does not offer the option to cancel exams. Exam Centre London has the right to charge the full price for exam booked and will not refund the cost for any cancellation from the candidate. IGCSEs, GCSEs and A-Levels: For GCSEs and A-Level exams, candidate can withdraw their entry before our first deadline. In which case, the payment will be refunded after a £30 admin fee charge for each exam (For example, GCSE maths has three exams so cancelling GCSE maths exam before the first deadline will incur total fees of £90). Any cancellations after the first deadline will not be eligible to receive a refund.</td>
                                            
                                        </tr>

                                        <tr>
                                            <td>6. RESCHEDULING </td>
                                            <td>AAT, ACCA, Functional Skills: To reschedule a booked exam, candidate must pay a £30 rescheduling fee and provide us with a notice of at least two working days. An updated booking confirmation will be sent to confirm the changes. Please note that, we can only reschedule ACCA exams only one time.  </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>7. DEFERRAL </td>
                                            <td>Candidate may request to defer their exam for the next exam series (IGCSEs, GCSEs, A-levels) only if request has been made before the first deadline. Additional costs may be involved. </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>8. LATE ARRIVAL/ ABSENCES </td>
                                            <td>No adjustment shall be made for time lost because of late arrival by the candidate. All candidates are encouraged to arrive 15 minutes prior the exam start time. Likewise candidate will not receive a refund for any absences. </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>9. ACCESS ARRANGEMENTS</td>
                                            <td>Exam Centre London can make adjustments approved by the awarding bodies to enable candidates with disabilities, special education needs, medical illnesses or injuries to undertake the assessments without being disadvantaged. Additional costs will be involved to make the required arrangements. Candidates may be required to submit evidence before the arrangements can be approved. </td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td><span>10. COMPLAINTS</span></td>
                                            <td><span>It is important that candidates are pleased with the service that they are receiving. In the unlikely event of displeasure with our service, please email info@examcentrelondon.co.uk or speak to a member of staff as soon as an issue arises. We always welcome feedback and attempt to make all reasonable adjustments to ensure that your experience with us is positive. </span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="refund_policy_border"></div>

                    {{-- <div class="refund_policy_no_refund">
                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/refund-policy/no-refund.png" alt="">
                        <p><b>No Refund after First Deadline</b></p>
                        <p>Once the exam booking is confirmed and the candidate receives an email confirmation, the booking is final and non-refundable.</p>
                    </div> --}}

                    <div class="our_refund_policy_btn"><a href="{{ url('/exam-list') }}" class="btn_style">Book Your Exam Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================  End (Refund Policy) Section  ================-->
<!--================  Start Footer Section  ================-->
@endsection        
