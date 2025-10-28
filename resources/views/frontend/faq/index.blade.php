@extends('layouts.frontend')
@section('title', 'FAQ | Exam Centre London – Exam Booking, Fees, Tuition & More')
@section('meta_description',
    'Find answers to common questions about Exam Centre London. Learn about exam booking
    procedures, fees, tuition support, ID requirements, and more. Get the information you need today.')
@section('content')
    <div class="sub_menu_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub_menu">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="{{ url('/faq') }}">Frequently Asked Questions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="faqs_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faqs">
                        <div class="section_title high_standard_title">
                            <h2>Frequently Asked <span>Questions</span></h2>
                            <p>Your Questions Answered: Find everything you need to know about our exam centre, services,
                                and policies.</p>
                        </div>
                        <div class="faqs_contents">
                            <!-- Accordion Group 1 -->
                            <div class="panel-group custom_accordion" id="accordion1" role="tablist"
                                aria-multiselectable="true">
                                <!-- FAQ 1 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                What is included in the cost of the exam?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="panel-body custom_accordion_body">
                                            Exam Centre London has carefully created the price list to make our exams
                                            affordable for all candidates.
                                            Our prices only reflect the cost of sitting the exam with us and do not include
                                            any preparatory sessions.
                                            However, we understand that having a tutor can be highly beneficial. We
                                            therefore offer tutoring support at an additional cost.
                                            Speak to a member of our team today to see how we can help.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 2 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                I need some help! Have you got any tutors who can support me?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingTwo">
                                        <div class="panel-body custom_accordion_body">
                                            Exam Centre London takes pride in supporting our candidates throughout their
                                            academic journey.
                                            We strive to make this process simple and stress-free.
                                            We can schedule lessons with our subject experts to support you on this journey.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 3 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Can I do my practical endorsement with Exam Centre London?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingThree">
                                        <div class="panel-body custom_accordion_body">
                                            We are delighted to share that our candidates have the opportunity to complete
                                            their science practical endorsement
                                            with Exam Centre London. These sessions take place during term holidays under
                                            the guidance of our highly qualified and experienced science teachers.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 4 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                I need predicted grades for my UCAS application. Can I obtain them from Exam
                                                Centre London?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingFour">
                                        <div class="panel-body custom_accordion_body">
                                            Yes, Exam Centre London provides predicted grades for private candidates
                                            applying through UCAS.
                                            Candidates will be required to sit a mock paper under controlled conditions at
                                            our centre.
                                            Based on the mock performance, Exam Centre London will finalise and issue the
                                            predicted grades.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 5 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Have you got free parking?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingFive">
                                        <div class="panel-body custom_accordion_body">
                                            We do not have private parking for candidates, but there are several surrounding
                                            roads offering both free and paid parking options throughout the day.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 6 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1"
                                                href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Can I pay in instalments?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingSix">
                                        <div class="panel-body custom_accordion_body">
                                            Exam Centre London understands that exam fees can be costly for some candidates.
                                            We therefore offer an interest-free instalment plan to give candidates extra
                                            time to make their payments.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Accordion Group 2 -->
                            <div class="panel-group custom_accordion" id="accordion2" role="tablist"
                                aria-multiselectable="true">
                                <!-- FAQ 7 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingSeven">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2"
                                                href="#collapseSeven" aria-expanded="false"
                                                aria-controls="collapseSeven">
                                                What if I don’t have a valid photo ID?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingSeven">
                                        <div class="panel-body custom_accordion_body">
                                            Photo ID is a crucial requirement to book any exam.
                                            If you do not have a valid photo ID, please contact our support team for
                                            guidance on how to proceed via an alternative verification route.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 8 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingEight">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2"
                                                href="#collapseEight" aria-expanded="false"
                                                aria-controls="collapseEight">
                                                When can I get my results?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingEight">
                                        <div class="panel-body custom_accordion_body">
                                            Functional Skills results are issued between two to four weeks after your
                                            assessment.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 9 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingNine">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2"
                                                href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                When are GCSE and A-Level results released?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingNine">
                                        <div class="panel-body custom_accordion_body">
                                            Summer GCSE and A-Level exam results are released in August.
                                            November GCSE and A-Level exam results are released in January.
                                            We’ll keep you informed of when and how to access your results and certificates.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 10 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingTen">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2"
                                                href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                How can I pay?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTen" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingTen">
                                        <div class="panel-body custom_accordion_body">
                                            We accept payments by card, bank transfer, and cash.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ 11 -->
                                <div class="panel panel-default custom_accordion_single">
                                    <div class="panel-heading" role="tab" id="headingEleven">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion2"
                                                href="#collapseEleven" aria-expanded="false"
                                                aria-controls="collapseEleven">
                                                How do I book my exam?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingEleven">
                                        <div class="panel-body custom_accordion_body">
                                            Step 1: Click here to book your exam.<br>
                                            Step 2: Make payment.<br>
                                            Step 3: We’ll confirm your booking.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
