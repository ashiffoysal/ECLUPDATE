@extends('layouts.frontend')
@section('title', 'Special Access Arrangements | Exam Centre London – Support for Candidates with Additional Needs')
@section('meta_description', 'Explore the special access arrangements offered by Exam Centre London for candidates with additional needs. We provide tailored support including extra time, use of a laptop, separate rooms, and more. Ensure equal opportunities for all candidates. Learn more about our services and application process.')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/ripon/ripon.css') }}">
    <!-- Content by Ripon -->
    <div class="sub_menu_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub_menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="{{ url('/result-day') }}">Specail Access</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #247E3D;
            color: #fff;
            text-align: center;
        }

        table,
        td {
            border: 1px solid #ddd;
            color: #000;
            text-align: center;
        }
    </style>
    <!--/ top logo content -->
    <section class="zh_center_content section_padding">
        <div class="container">
            <div class="text-center">
                <h2 class="zh_heading">Special Access Options and Fees</h2>
                <div class="p_wrapper">

                    <table class="text-center">
                        <tr>
                            <th>Special Access Option</th>
                            <th>Fees Details</th>
                        </tr>
                        <tr>
                            <td>Laptop/Computer</td>
                            <td>£30 Per Paper + Special Access Application Fees:£100</td>
                        </tr>
                        <tr>
                            <td>Own Room</td>
                            <td>£100 Per Paper + Special Access Application Fees: Minimum £100, Maximum £300 (based on
                                services required. One Time)</td>
                        </tr>
                        <tr>
                            <td>Reader</td>
                            <td>£45 Per Hour + Special Access Application Fees: Minimum £100, Maximum £300 (based on
                                services required. One Time)</td>
                        </tr>
                        <tr>
                            <td>25% Extra Time</td>
                            <td>25% more than the total fees + Special Access Application Fees: Minimum £100, Maximum £300
                                (based on services required. One Time)</td>
                        </tr>
                        <tr>
                            <td>50% Extra Time</td>
                            <td>50% more than the total fees + Special Access Application Fees: Minimum £100, Maximum £300
                                (based on services required. One Time)</td>
                        </tr>
                    </table>
                </div>
                <h2 class="zh_heading">Home Invigilation</h2>
                <div class="p_wrapper">

                    <table class="text-center">
                        <tr>
                            <th>Special Access Option</th>
                            <th>Fees Details</th>
                        </tr>
                        <tr>
                            <td>Special Access Application Fees</td>
                            <td>Minimum £100, Maximum £300 (based on services required. One Time)</td>
                        </tr>
                        <tr>
                            <td>Alternative Site Application</td>
                            <td>£25 Per Paper </td>
                        </tr>
                        <tr>
                            <td>Transportation</td>
                            <td> Minimum £100, Maximum £300 (based on Location) Per Paper</td>
                        </tr>
                        <tr>
                            <td>Invigilators(2)</td>
                            <td> £200 Per Invigilator (Per Paper)</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </section>



    <section class="zh_detail_2 section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="zh_heading">Your Guide to Exam Access Arrangements: Ensuring Fairness and Compliance</h2>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table border="1" cellpadding="10" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Access Arrangement</th>
                                    <th>Route</th>
                                    <th>What Parents Need to Provide</th>
                                    <th>What the Centre Needs to Do</th>
                                    <th>Fees</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="4"><strong>25% Extra Time</strong></td>
                                    <td><strong>Route 1: Learning Difficulty (e.g., Dyslexia, ADHD)</strong></td>
                                    <td>- Diagnostic assessment, including <strong>Form 8</strong>, showing evidence of
                                        substantial impairment.<br>- Evidence of normal way of working (e.g., classwork,
                                        teacher reports).</td>
                                    <td>- Submit JCQ application via <strong>Access Arrangements Online</strong>.<br>-
                                        Ensure extra time benefits the candidate and is part of their normal way of
                                        working.<br>- Keep evidence for inspection.</td>
                                    <td>Varies depending on documents and assessments.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 2: Medical Condition (e.g., Anxiety, Illness)</strong></td>
                                    <td>- Medical evidence outlining the condition and its impact on speed of working.<br>-
                                        History of need (past accommodations).</td>
                                    <td>- Process JCQ application with medical evidence.<br>- Allow the candidate to
                                        practice using extra time.<br>- Retain evidence.</td>
                                    <td>Varies depending on documents and assessments.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 3: EHCP/IDP</strong></td>
                                    <td>- Copy of the <strong>EHCP</strong> (Education, Health and Care Plan) or
                                        <strong>IDP</strong> (Individual Development Plan).</td>
                                    <td>- Submit EHCP/IDP to support JCQ application.<br>- Ensure extra time is used
                                        consistently in classwork and assessments.<br>- Retain documentation for inspection.
                                    </td>
                                    <td>Varies depending on documents.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 4: Temporary Injury</strong></td>
                                    <td>- Medical evidence of a temporary injury affecting speed of working.</td>
                                    <td>- Urgently submit a JCQ application for temporary conditions.<br>- Ensure
                                        appropriate accommodations are in place promptly.<br>- Allow practice with extra
                                        time if possible.</td>
                                    <td>Varies depending on case and documentation.</td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Laptop Use</strong></td>
                                    <td><strong>Route 1: Learning Difficulty</strong></td>
                                    <td>- Evidence of learning difficulty requiring a laptop (e.g., slow handwriting
                                        speed).<br>- Demonstration that laptop use is the candidate’s normal way of working.
                                    </td>
                                    <td>- No JCQ application needed if it reflects normal practice.<br>- Ensure compliance
                                        with JCQ regulations (disable spell check, predictive text).<br>- Retain evidence of
                                        need for inspection.</td>
                                    <td>£30 per exam (may vary by centre).</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 2: Medical Condition or Physical Disability</strong></td>
                                    <td>- Medical evidence showing the need for assistance in writing tasks (e.g.,
                                        arthritis).</td>
                                    <td>- Ensure laptop use reflects the candidate’s normal way of working.<br>- Comply with
                                        JCQ regulations for secure laptop use during exams.<br>- Retain evidence.</td>
                                    <td>£30 per exam (may vary by centre).</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 3: Temporary Injury</strong></td>
                                    <td>- Medical evidence supporting temporary need for a laptop (e.g., wrist injury).</td>
                                    <td>- Arrange laptop use without formal JCQ application for temporary conditions.<br>-
                                        Ensure laptop use aligns with JCQ rules and retain evidence.</td>
                                    <td>£30 per exam (may vary by centre).</td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Own Room (Separate Invigilation)</strong></td>
                                    <td><strong>Route 1: Medical Condition (e.g., Anxiety, Health Issues)</strong></td>
                                    <td>- Medical evidence supporting the need for separate rooming.<br>- Evidence that this
                                        is the normal way of working.</td>
                                    <td>- Arrange separate invigilation.<br>- No JCQ application needed if this reflects the
                                        candidate’s normal way of working.<br>- Ensure JCQ exam conditions are met.<br>-
                                        Retain documentation.</td>
                                    <td>Varies depending on resources.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 2: Social, Emotional, or Mental Health Needs</strong></td>
                                    <td>- Professional assessment indicating the need for separate invigilation.<br>-
                                        History of support (e.g., support plans, teacher reports).</td>
                                    <td>- Provide separate invigilation in line with the candidate's needs.<br>- Retain
                                        supporting documents for JCQ inspection.</td>
                                    <td>Varies depending on resources.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 3: Sensory or Physical Disabilities</strong></td>
                                    <td>- Medical evidence showing the need for separate room or adapted environment.</td>
                                    <td>- Arrange suitable invigilation and environment.<br>- Ensure compliance with JCQ
                                        regulations.<br>- Retain documentation.</td>
                                    <td>Varies depending on resources.</td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Home Invigilation (Alternative Site Arrangement)</strong>
                                    </td>
                                    <td><strong>Route 1: Medical Condition</strong></td>
                                    <td>- Medical documentation confirming the candidate’s inability to attend the centre.
                                    </td>
                                    <td>- Submit a JCQ application for home invigilation.<br>- Appoint a trained
                                        invigilator.<br>- Maintain the security of the exam.<br>- Keep documentation for JCQ
                                        inspection.</td>
                                    <td>Costs may include invigilator fees and travel expenses.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 2: Psychological/Mental Health Condition</strong></td>
                                    <td>- Psychological report from a qualified professional.</td>
                                    <td>- Submit a JCQ application with supporting evidence.<br>- Arrange home invigilation
                                        if approved.<br>- Ensure exam conditions are met.<br>- Retain documentation.</td>
                                    <td>Costs may include invigilator fees and travel expenses.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 3: Physical Disabilities</strong></td>
                                    <td>- Specialist report confirming the need for home invigilation (e.g., mobility
                                        issues).</td>
                                    <td>- Ensure home exam conditions are in line with JCQ standards.<br>- Provide necessary
                                        equipment (e.g., secure storage for papers).<br>- Retain evidence for inspection.
                                    </td>
                                    <td>Costs may include invigilator fees, equipment rental.</td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Practical Assistant</strong></td>
                                    <td><strong>Route 1: Physical Disabilities</strong></td>
                                    <td>- Medical evidence showing the need for practical assistance (e.g., limited hand
                                        function).</td>
                                    <td>- Submit a JCQ application detailing the tasks.<br>- Ensure the assistant follows
                                        JCQ regulations.<br>- The assistant must not influence the outcome.<br>- Retain
                                        evidence for inspection.</td>
                                    <td>Varies depending on arrangement (e.g., assistant fees).</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 2: Visual or Hearing Impairments</strong></td>
                                    <td>- Medical evidence and school records supporting the need for a practical assistant.
                                    </td>
                                    <td>- Submit a JCQ application.<br>- Ensure the assistant follows the candidate’s
                                        instructions accurately.<br>- Retain all supporting documentation for JCQ
                                        inspection.</td>
                                    <td>Varies depending on arrangement.</td>
                                </tr>
                                <tr>
                                    <td><strong>Route 3: Temporary Injury</strong></td>
                                    <td>- Medical evidence confirming temporary need for a practical assistant (e.g., broken
                                        arm).</td>
                                    <td>- Submit the JCQ application promptly.<br>- Ensure the assistant is properly
                                        trained.<br>- Retain supporting documents.</td>
                                    <td>Varies depending on arrangement.</td>
                                </tr>
                                <tr>
                                    <td><strong>Access Arrangements for Anxiety</strong></td>
                                    <td>N/A</td>
                                    <td>- Medical documentation from a professional (e.g., psychologist) demonstrating
                                        anxiety-related impairments affecting exam performance.</td>
                                    <td>- Submit JCQ application for appropriate arrangements (e.g., supervised rest breaks,
                                        separate invigilation, or extra time).<br>- Allow candidate to practice with
                                        arrangements.<br>- Retain evidence.</td>
                                    <td>Varies depending on resources and documentation.</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- 
    			        <table border="1" cellpadding="10" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Access Arrangement</th>
                              <th>Route</th>
                              <th>What Parents Need to Provide</th>
                              <th>What the Centre Needs to Do</th>
                              <th>Fees</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>25% Extra Time</td>
                              <td>Route 1: Learning Difficulty (Dyslexia, ADHD)</td>
                              <td>Diagnostic Assessment and Form 8</td>
                              <td>Submit JCQ application, confirm extra time helps in assessments, keep evidence.</td>
                              <td>Varies depending on documents.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 2: Medical Condition (Anxiety, Illness)</td>
                              <td>Medical Evidence and History of Need</td>
                              <td>Submit JCQ application, review medical evidence, allow candidate to practise using extra time.</td>
                              <td>Varies depending on documents.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 3: EHCP/IDP</td>
                              <td>EHCP/IDP document</td>
                              <td>Submit EHCP/IDP as evidence, ensure extra time is used in assessments.</td>
                              <td>Varies depending on documents.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 4: Temporary Injury or Diagnosis</td>
                              <td>Medical Evidence and Supporting School Evidence</td>
                              <td>Submit late JCQ application with urgency, ensure extra time arrangements.</td>
                              <td>Varies depending on documents.</td>
                            </tr>
                            <tr>
                              <td>Laptop Use</td>
                              <td>Route 1: Learning Difficulty (Dyslexia, ADHD)</td>
                              <td>Diagnostic Assessment</td>
                              <td>Confirm laptop is normal way of working, ensure spelling/grammar check is disabled, no JCQ application needed.</td>
                              <td>£30 per exam.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 2: Medical Condition or Physical Disability</td>
                              <td>Medical Evidence</td>
                              <td>Document medical evidence, ensure laptop use complies with JCQ regulations (disable spelling/grammar check).</td>
                              <td>£30 per exam.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 3: Temporary Injury (e.g., Broken Arm)</td>
                              <td>Medical Evidence</td>
                              <td>Arrange laptop use based on evidence, no JCQ application required.</td>
                              <td>£30 per exam.</td>
                            </tr>
                            <tr>
                              <td>Own Room</td>
                              <td>Route 1: Medical Conditions (Anxiety, Health)</td>
                              <td>Medical Evidence and Supporting Documentation</td>
                              <td>Arrange separate invigilation, ensure normal way of working, no JCQ application required.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 2: Social, Emotional, or Mental Health Needs</td>
                              <td>Professional Assessment and History of Support</td>
                              <td>Arrange separate invigilation, ensure this reflects normal way of working.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 3: Sensory Impairments/Physical Disabilities</td>
                              <td>Medical Documentation</td>
                              <td>Arrange separate invigilation in appropriate environment, provide necessary adaptations.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td>Home Invigilation</td>
                              <td>Route 1: Medical Condition</td>
                              <td>Medical Evidence</td>
                              <td>Submit application for home invigilation via JCQ, appoint trained invigilator, provide necessary documentation for inspection.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 2: Psychological/Mental Health Condition</td>
                              <td>Psychological Evidence</td>
                              <td>Submit application with supporting evidence, assign a trained invigilator.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 3: Physical Disabilities</td>
                              <td>Specialist Report</td>
                              <td>Ensure home environment meets exam standards, provide necessary equipment.</td>
                              <td>Varies depending on resources.</td>
                            </tr>
                            <tr>
                              <td>Practical Assistant</td>
                              <td>Route 1: Physical Disabilities</td>
                              <td>Medical Evidence and Supporting Evidence</td>
                              <td>Submit JCQ application, ensure assistant knows the tasks, accommodate candidate and assistant in a separate room if needed.</td>
                              <td>Varies depending on arrangement.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 2: Visual or Hearing Impairments</td>
                              <td>Medical Documentation and School Records</td>
                              <td>Submit JCQ application, ensure assistant follows candidate’s instructions without influencing outcomes.</td>
                              <td>Varies depending on arrangement.</td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>Route 3: Temporary Injury</td>
                              <td>Medical Evidence and School Documentation</td>
                              <td>Submit application as soon as possible, detail the assistant’s tasks, accommodate candidate and assistant in suitable environment if needed.</td>
                              <td>Varies depending on arrangement.</td>
                            </tr>
                            <tr>
                              <td>Access Arrangements for Anxiety</td>
                              <td>N/A</td>
                              <td>Medical Evidence and History of Need</td>
                              <td>Submit JCQ application for extra time or separate invigilation, allow practice with the arrangements, ensure comfortable environment.</td>
                              <td>Varies depending on documents.</td>
                            </tr>
                          </tbody>
                        </table>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="zh_detail_2 section_padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="zh_heading">Your Affordable and Accessible Exam Centre in the Heart of London</h2>
                </div>
                <div class="col-md-12">
                    <div class="p_wrapper">

                        <p>At Exam Centre London, we pride ourselves on being an affordable and accessible exam centre,
                            dedicated to meeting the diverse assessment needs of all candidates. Whether you are a home
                            educator, distance learner, excluded or local authority learner, or an independent learner, we
                            are here to support your qualification journey with a variety of examination and assessment
                            options.GCSEs (General Certificate of Secondary Education),IGCSEs (International General
                            Certificate of Secondary Education),A Levels (Advanced Level),AS Levels (Advanced Subsidiary
                            Level)</p>
                    </div>

                    <div class="p_wrapper">
                        <h2 class="zh_heading"> Convenient Locations Across East London</h2>
                        <p>Our exam centres are conveniently located in Ilford and Forest Gate, making us easily accessible
                            from all parts of London and the South-East. Situated close to major transport hubs, Exam Centre
                            London is dedicated to providing accessible and affordable assessment opportunities tailored to
                            the unique needs of our learners.

                            We are proud to have supported thousands of candidates from Central and Greater London and
                            Essex, helping them achieve their qualifications and reach their educational goals. </p>

                        <h2 class="zh_heading">Special Access for Candidates with Additional Needs</h2>
                        <p>At Exam Centre London, we are committed to ensuring that all candidates have an equal opportunity
                            to succeed. We offer special access arrangements for candidates with additional needs. To
                            qualify, candidates must provide valid documentation, after which a special access fee will be
                            applied. </p>

                    </div>
                </div>

            </div>
        </div>
    </section>




    <section class="zh_detail_2 section_padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="zh_heading">Why Choose Exam Centre London?</h2>
                </div>
                <div class="col-md-12">
                    <div class="p_wrapper">

                        <p>Accessible Locations: Centrally located in East London, close to major transport routes.</p>
                        <p>Affordable Rates: Competitive pricing to accommodate all candidates.</p>
                        <p>Wide Range of Exam Options: From GCSEs to professional qualifications, we offer a range of
                            examinations.</p>
                        <p>Special Access Arrangements: Tailored support for candidates with special needs.</p>
                    </div>

                    <div class="p_wrapper with_space">
                        <div class="exam_center_london_btn">
                            <a href="{{ url('/exam-list') }}" class="btn_style">Book Your Exam Now <span><img
                                        src="{{ asset('/frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                        alt=""></span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
