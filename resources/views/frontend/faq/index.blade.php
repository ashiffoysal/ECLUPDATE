@extends('layouts.frontend')
@section('title', 'FAQ | Exam Centre London – Exam Booking, Fees, Tuition & More')
@section('meta_description', 'Find answers to common questions about Exam Centre London. Learn about exam booking procedures, fees, tuition support, ID requirements, and more. Get the information you need today.')
@section('content')
<div class="sub_menu_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sub_menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{ url('/faq')  }}">Frequently Asked Questions</a></li>
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
                        <p>Your Questions Answered: Find everything you need to know about our exam centre, services, and policies.</p>
                    </div>
                    <div class="faqs_contents">
                        <div class="panel-group custom_accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What is included in the cost of the exam?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body custom_accordion_body">Exam Centre London has carefully generated the price list in an attempt to make our prices affordable to all candidates. Therefore, our prices only reflect the cost associated with sitting the exam with us without any preparatory sessions. However, we acknowledge that having a tutor to support is highly beneficial, hence we have this option available to all candidates that require it at an additional cost. Speak to a member of our staff today to see if we can help.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading2">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                            I need some help! Have you got any tutors that could support me?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                    <div class="panel-body custom_accordion_body">Exam Centre London takes pride to support our candidates in their academic journey. We
                                        strive to make this experience as simple as we can, lightening the heavy load from the
                                        shoulders of the candidates. Exam Centre London is able to schedule lessons with our
                                        subject experts to support you in this journey!</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Can I do my practical endorsement with Exam Centre London?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body custom_accordion_body">We are delighted to share that our candidates have the opportunity to sit their Science
                                        practical endorsement with Exam Centre London. Our practical endorsements are carried
                                        out during the term holidays under the guidance of our highly qualified and experienced
                                        science teachers.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading4">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            I need predicted grades for my UCAS application? Can I obtain it from Exam Centre
London?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                    <div class="panel-body custom_accordion_body">Exam Centre London is able to provide private candidates predicted grades to submit on
                                        their UCAS applications. Candidates will be required to sit a mock paper under controlled
                                        conditions at our exam centre. Based on the performance on the mock paper, Exam Centre
                                        London can finalise the predicted grades.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading5">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                            Have you got free parking?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                                    <div class="panel-body custom_accordion_body">Whilst we do not have any private parking for our candidates, we are surrounded by many
                                        roads providing free and/or paid parking throughout the day.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading6">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                            Can I pay in instalments?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                                    <div class="panel-body custom_accordion_body">Exam Centre London appreciates that our prices may be costly for some candidates,
                                        therefore we have an interest free instalment plan for candidates wishing for the extra time to
                                        pay for the exam.</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group custom_accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading7">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                            What if I don’t have a valid ID?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                                    <div class="panel-body custom_accordion_body">Photo IDs are a crucial requirement to book any exams. If you do not have a valid photo ID,
                                        then contact our support team who will help to proceed via an alternative route.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading8">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                            What if I don’t have a valid photo ID?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                                    <div class="panel-body custom_accordion_body">If you do not have photo ID, contact us and we will send you more information on how to proceed with your application.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading9">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                            When can I get my results?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                                    <div class="panel-body custom_accordion_body">Functional Skills results are issues between two to four weeks after your assessment,</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading10">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                            Summer GCSE and A-Level exam results are issued in August.November GCSE and A-Level exam results are issued in January. 
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                                    <div class="panel-body custom_accordion_body">We’ll keep you informed of when and how you can access your results and your examination certificates. </div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading11">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                            How can I pay?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                    <div class="panel-body custom_accordion_body">We accept card, bank transfer and cash payment.</div>
                                </div>
                            </div>
                            <div class="panel panel-default custom_accordion_single">
                                <div class="panel-heading" role="tab" id="heading12">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                            How do I book my exam?
                                        </a>
                                    </h4>

                                </div>
                                <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                                    <div class="panel-body custom_accordion_body">-Step 1: Book Your Exam  Click here to exam booking,-Step 2: Make Payment,-Step 3: We’ll Confirm Your Booking</div>
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