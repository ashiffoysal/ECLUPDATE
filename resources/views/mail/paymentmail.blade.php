<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <title>Exam Centre London Invoice</title>
        <link rel="icon" href="assets/images/favicon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!-- CSS -->
        <style>
            html{
                font-size: 62.5%;
            }
            body{   
                font-size: 1.6rem;
                font-family: "Inter", sans-serif;
                font-weight: 400;
            }
            h1,h2,h3,h4,h5,h6,p{
                margin: 0;
                padding: 0;
            }
            ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            ul li a,a{
                text-decoration: none;
            }
            .full_page{
                max-width: 600px;
                width: 100%;
                margin: auto;
                box-shadow: 0px 10px 20px 0px #25314C26;
                padding: 30px 0px 0px 0px;
            }
            .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                padding-right: 30px;
                padding-left: 30px;
            }
            .header{
                display: flex;
                align-items: center;
                padding: 15px 20px;
                background: #247E3D;
                border-radius: 10px;
                gap: 22px;
                position: relative;
                z-index: 2;
                overflow: hidden;
            }
            .header::before {
                position: absolute;
                content: "";
                bottom: -127%;
                left: 0;
                width: 175px;
                height: 175px;
                border-radius: 50%;
                background: #2E8D48;
                z-index: -1;
            }
            .header::after {
                position: absolute;
                content: "";
                bottom: 20px;
                left: inherit;
                right: 50px;
                width: 175px;
                height: 175px;
                border-radius: 50%;
                background: #2E8D48;
                z-index: -1;
            }
            .logo a{
                padding: 16px 12px;
                background: #FFF;
                border-radius: 8px;
                display: inline-block;
            }
            .logo a img{
                width: 88px;
                height: auto;
            }
            .header_contents_left h4{
                font-size: 12px;
                line-height: 16px;
                font-weight: 600;
                color: #FFFFFF;
            }
            .header_contents_left ul li{
                line-height: 0;
            }
            .header_contents_left ul li a{
                display: inline-block;
                margin-top: 4px;
                color: #FFFFFF;
                font-size: 8px;
                line-height: 12px;
            }
            .header_contents{
                display: flex;
                gap: 20px;
            }
            .header_contents_right ul li a {
                font-size: 9px;
                line-height: 13px;
                max-width: 105px;
            }
            .header_contents_right{
                margin-top: 16px;
            }

            .bill_and_invoice{
                margin: 20px 0px;
                padding: 15px 20px;
                border: 1px solid #EBEFF6;
                border-radius: 10px;
                display: flex;
            }
            .bill_and_invoice_single {
                flex: 0 0 50%;
                padding: 0px 5px;
            }
            .bill_and_invoice_single h3{
                font-size: 12px;
                line-height: 16px;
                font-weight: 600;
                color: #19213D;
                margin-bottom: 10px;
            }
            .bill_and_invoice_single h4{
                font-size: 10px;
                line-height: 14px;
                font-weight: 600;
                color: #19213D;
                margin-bottom: 6px;
            }
            .bill_and_invoice_single ul{
                display: flex;
                flex-direction: column;
                gap: 5px;
            }
            .bill_and_invoice_single ul li{
                font-size: 8px;
                line-height: 12px;
                color: #5D6481;
            }
            .bill_and_invoice_single ul li b{
                font-weight: 600;
                color: #19213D;
            }
            .bill_and_invoice_single2{
                padding-left: 22px;
                border-left: 1px solid #EBEFF6;
            }
            .invoice_status{
                display: inline-block;
                padding: 5px 9px 5px 24px;
                font-size: 9px;
                line-height: 14px;
                font-weight: 600;
                color: #247E3D;
                background: #247E3D0D;
                border: 1px solid #247E3D;
                margin-top: 15px;
                border-radius: 25px;
                position: relative;
                z-index: 2;
            }
            .invoice_status::before{
                position: absolute;
                content: "";
                top: 50%;
                transform: translateY(-50%);
                left: 9px;
                width: 8px;
                height: 8px;
                background: #247E3D;
                border-radius: 50%;
                z-index: -1;
            }

            .examtype_table {
                border-radius: 10px;
                overflow: hidden;
                border: 1px solid #EBEFF6;
            }
            .examtype_table table {
                width: 100%;
                border-collapse: collapse;
            }
            .examtype_table thead {
                border-radius: 10px 10px 0 0;
                overflow: hidden;
            }
            .examtype_table tbody {
                border-radius: 0 0 10px 10px;
                overflow: hidden;
                border-top: none;
            }
            .examtype_table th {
                padding: 14px 20px;
                color: #FFF;
                background: #247E3D;
                font-size: 9px;
                line-height: 12px;
                font-weight: 500;
                text-transform: uppercase;
            }
            .examtype_table td {
                padding: 12px 20px;
                color: #19213D;
                font-size: 9px;
                line-height: 14px;
                font-weight: 500;
            }
            .examtype_table tr td:nth-child(3) {
                font-weight: 400;
                color: #5D6481;
            }
            .examtype_table tr td:nth-child(4) {
                font-weight: 600;
                text-align: right;
            }
            .examtype_table tr th:nth-child(4) {
                text-align: right;
            }
            .examtype_table tr:nth-child(even) {
                background: #FBFBFB;
                border-top: 1px solid #EBEFF6;
                border-bottom: 1px solid #EBEFF6;
            }
            .examtype_table_total_main{
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
            }
            .examtype_table_total{
                width: 265px;
                border-radius: 10px;
                padding: 8px 20px;
                background: #247E3D;
            }
            .examtype_table_total ul li {
                padding: 8px 0px;
                border-bottom: 1px solid #FFFFFF80;
                font-size: 9px;
                line-height: 14px;
                font-weight: 600;
                color: #FFFFFF;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .examtype_table_total ul li:last-child{
                border-bottom: none;
            }
            .examtype_table_total ul li span{
                display: inline-block;
                font-size: 10px;
                line-height: 14px;
                font-weight: 400;
            }
            .examtype_table_total ul li b{
                display: inline-block;
                font-size: 14px;
                line-height: 22px;
                font-weight: 600;
            }

            .payment_method{
                margin: 20px 0px;
                padding: 15px 20px;
                border: 1px solid #EBEFF6;
                border-radius: 10px;
            }
            .payment_method h4{
                font-size: 12px;
                line-height: 16px;
                font-weight: 600;
                color: #19213D;
                margin-bottom: 10px;
            }
            .payment_method p{
                display: flex;
                align-items: center;
                gap: 20px;
                font-size: 8px;
                line-height: 12px;
                color: #5D6481;
            }
            .payment_method p span{
                display: inline-block;
                font-size: 10px;
                line-height: 14px;
                color: #19213D;
            }
            .payment_method p span img{
                width: 12px;
                height: auto;
                margin-right: 3px;
            }

            .footer{
                padding: 15px 40px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                background: #FBFBFB;
                border-top: 1px solid #EBEFF6;
            }
            .footer_contents ul li a{
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 8px;
                line-height: 12px;
                color: #5D6481;
                margin-bottom: 2px;
            }
            .footer_logo a img{
                width: 88px;
                height: auto;
            }
            .footer_logo {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            /*Responsive*/
            @media all and (max-width: 450px){
                .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                    padding-right: 20px;
                    padding-left: 20px;
                }
                .footer {
                    padding: 15px 25px;
                }
                .bill_and_invoice {
                    padding: 15px 15px;
                }
                .header {
                    justify-content: space-between;
                }
                .header_contents {
                    gap: 10px;
                    flex-direction: column;
                }
                .header_contents_right {
                    margin-top: 0px;
                }
                .header_contents_right ul li a {
                    max-width: 100%;
                }
            }
        </style>    
    </head>
    <body>

		@php
    $mockprice = $maindata['mock_test'] == 'mock_test_yes' ? $maindata->mock_amount : 0;
    $mainprice = 0;

    if (!empty($maindata->exam_information)) {
        $examInfo = json_decode($maindata->exam_information, true);
        $subjectIds = array_column($examInfo, 'subject');

        $subjects = App\Models\Subject::whereIn('id', $subjectIds)->get()->keyBy('id');

        $mainprice = array_sum(array_map(function ($mainsub) use ($subjects) {
            return optional($subjects[$mainsub['subject']])->fees ?? 0;
        }, $examInfo));
    }
@endphp
        <div class="full_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all_contents">
                            <!-- Start (Header) Part -->
                            <div class="header">
                                <div class="logo"><a href="#"><img src="https://i.postimg.cc/VvNGPV4r/logo.png" alt=""></a></div>
                                <div class="header_contents">
                                    <div class="header_contents_left">
                                        <h4>Exam Centre London</h4>
                                        <ul>
                                            <li><a href="#">www.examcentrelondon.co.uk</a></li>
                                            <li><a href="mailto: info@merittutors.co.uk">info@merittutors.co.uk</a></li>
                                            <li><a href="tel: 0208 616 2526">0208 616 2526</a></li>
                                        </ul>
                                    </div>
                                    <div class="header_contents_left header_contents_right">
                                        <ul>
                                            <li><a href="#">54 Upton Lane London E7 9LN</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End (Header) Part -->

                            <!-- Start (Bill & Invoice) Part -->
                            <div class="bill_and_invoice">
                                <div class="bill_and_invoice_single">
                                    <h3>Bill To:</h3>
                                    <h4>{{ $maindata['first_name'] }} {{ $maindata['middle_name'] }} {{ $maindata['last_name'] }}</h4>
                                    <ul>
                                       
                                        <li>{{ $maindata['address_line_1'] }} {{ $maindata['postcode'] }}</li>
                                        <li>{{ $maindata['email'] }}</li>
                                    </ul>
                                </div>
                                <div class="bill_and_invoice_single bill_and_invoice_single2">
                                    <h3>Invoice:</h3>
                                    <ul>
                                        <li>Booking ID: <b>{{ $maindata['booking_id'] }}</b></li>
                                        <li>Booking Date: <b>{{ \Carbon\Carbon::parse($maindata['created_at'])->format('d/m/Y') }}
										</b></li>
                                    </ul>
                                    <div class="invoice_status">PAID</div>
                                </div>
                            </div>
                            <!-- End (Bill & Invoice) Part -->

                            <!-- Start (Exam Type Table) Part -->
                            <div class="examtype_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Type</th>
                                            <th>Subject</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										@php
											$examInfo = json_decode($maindata['exam_information'], true);
										@endphp
										@if(!empty($examInfo))
											@php
												$subjectIds = array_column($examInfo, 'subject');
												$subjects = App\Models\Subject::whereIn('id', $subjectIds)->pluck('subject_name', 'id');
											@endphp
										@endif

										@foreach($examInfo as $keys => $smainsub)
                                        <tr>
                                            <td>{{ ++$keys }}</td>
                                            <td>{{ $maindata['main_exam_type'] }}</td>
                                            <td>{{ $subjects[$smainsub['subject']] ?? 'Unknown Subject' }}</td>
                                            <td>£ {{ $smainsub['fees'] ?? '0' }}</td>
                                        </tr>

										@endforeach
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Mock Fees</td>
                                            <td>£{{ $mockprice }}</td>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td>Ucas Reference Fee</td>
                                            <td>£ {{$maindata['ucas_reference_fee']}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Special Access Document Checking Fee</td>
                                            <td>£ {{ $maindata['special_access_initial_fees'] }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Special Access Fee</td>
                                            <td>£ {{$maindata['admin_specialaccess_amount']}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>Instalment Fee</td>
                                            <td>£ {{ $maindata['Installment_fee'] }}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="examtype_table_total_main">
                                <div class="examtype_table_total">
                                    <ul>
                                        {{-- <li>Grand Total <b>£ {{ $mainprice + $mockprice + $maindata['Installment_fee'] + $maindata['admin_specialaccess_amount'] + $maindata['special_access_initial_fees'] }}</b></li> --}}
										<li>Discount <span>- £ {{$maindata['discount_amount']}}</span></li>
										<li>Paid Total <b>£ {{ $maindata['paid_amount'] }}</b></li>
										<li>Due<b>£ {{  $maindata['due_amount'] }}</b></li>

                                    </ul>
                                </div>
                            </div>
                            <!-- End (Exam Type Table) Part -->

                            <!-- Start (Payment Method) Part -->
                            <div class="payment_method">
                                <h4>Payment Method:</h4>
                                <p><span>
                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.00001C1 3.87752 1 2.81627 1.63168 2.10775C1.73271 1.99443 1.84407 1.88962 1.96448 1.79453C2.71728 1.20001 3.84485 1.20001 6.1 1.20001H7.9C10.1552 1.20001 11.2827 1.20001 12.0355 1.79453C12.1559 1.88962 12.2673 1.99443 12.3683 2.10775C13 2.81627 13 3.87752 13 6.00001C13 8.12251 13 9.18373 12.3683 9.89227C12.2673 10.0056 12.1559 10.1104 12.0355 10.2055C11.2827 10.8 10.1552 10.8 7.9 10.8H6.1C3.84485 10.8 2.71728 10.8 1.96448 10.2055C1.84407 10.1104 1.73271 10.0056 1.63168 9.89227C1 9.18373 1 8.12251 1 6.00001Z" stroke="#19213D" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.79999 8.40002H6.69999" stroke="#19213D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 8.40002H10.6" stroke="#19213D" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 4.20001H13" stroke="#19213D" stroke-linejoin="round"/>
                                    </svg>
									{{ $maindata['payment_option'] }} Payment
                                </span> 
                                Transaction ID: {{$maindata['transection_id']}}</p>
                            </div>
                            <!-- End (Payment Method) Part -->
                        </div>  
                    </div>
                </div>
            </div>

            <!-- Start (Footer) Part -->
            <div class="footer">
                <div class="footer_contents">
                    <ul>
                        <li><a href="mailto: info@merittutors.co.uk">
                            <svg width="7" height="6" viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.44116L2.79607 2.45883C3.45822 2.834 3.73798 2.834 4.40013 2.45883L6.1962 1.44116" stroke="#5D6481" stroke-width="0.510284" stroke-linejoin="round"/>
                                <path d="M1.0041 3.38339C1.02108 4.17986 1.02957 4.57807 1.32345 4.87308C1.61733 5.16807 2.02634 5.17833 2.84435 5.19889C3.3485 5.21156 3.8477 5.21156 4.35186 5.19889C5.16987 5.17833 5.57886 5.16807 5.87276 4.87308C6.16663 4.57807 6.17513 4.17986 6.19209 3.38339C6.19758 3.12729 6.19758 2.87273 6.19209 2.61663C6.17513 1.82018 6.16663 1.42195 5.87276 1.12695C5.57886 0.831957 5.16987 0.821681 4.35186 0.801128C3.8477 0.788459 3.3485 0.788459 2.84434 0.801125C2.02633 0.821676 1.61733 0.831951 1.32345 1.12695C1.02957 1.42195 1.02108 1.82017 1.00409 2.61663C0.998633 2.87273 0.998636 3.12729 1.0041 3.38339Z" stroke="#5D6481" stroke-width="0.510284" stroke-linejoin="round"/>
                            </svg>
                            info@merittutors.co.uk
                        </a></li>
                        <li><a href="#">
                            <svg width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.25779 6.87407C4.12475 6.99864 3.94688 7.06829 3.76177 7.06829C3.57667 7.06829 3.39883 6.99864 3.26576 6.87407C2.0472 5.72623 0.414195 4.44397 1.21057 2.58238C1.64115 1.57584 2.67476 0.931763 3.76177 0.931763C4.8488 0.931763 5.8824 1.57584 6.313 2.58238C7.10836 4.44164 5.47936 5.73019 4.25779 6.87407Z" stroke="#5D6481" stroke-width="0.510284"/>
                                <path d="M4.83528 3.69322C4.83528 4.28631 4.35449 4.76711 3.76139 4.76711C3.1683 4.76711 2.6875 4.28631 2.6875 3.69322C2.6875 3.10012 3.1683 2.61932 3.76139 2.61932C4.35449 2.61932 4.83528 3.10012 4.83528 3.69322Z" stroke="#5D6481" stroke-width="0.510284"/>
                            </svg>
                            54 Upton Lane London E7 9LN
                        </a></li>
                        <li><a href="tel: 0208 616 2526">
                            <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 2.20622C1 1.33308 1 0.896505 1.29289 0.625256C1.58579 0.354004 2.05719 0.354004 3 0.354004C3.9428 0.354004 4.4142 0.354004 4.70711 0.625256C5 0.896505 5 1.33308 5 2.20622V3.79383C5 4.66697 5 5.10354 4.70711 5.37481C4.4142 5.64605 3.9428 5.64605 3 5.64605C2.05719 5.64605 1.58579 5.64605 1.29289 5.37481C1 5.10354 1 4.66697 1 3.79383V2.20622Z" stroke="#5D6481" stroke-width="0.510284" stroke-linecap="round"/>
                                <path d="M2.71429 4.85223H3.28572" stroke="#5D6481" stroke-width="0.510284" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.14288 0.354004L2.16831 0.495307C2.22342 0.801523 2.25097 0.954633 2.36437 1.0478C2.48265 1.14499 2.65034 1.14781 3.00003 1.14781C3.34971 1.14781 3.5174 1.14499 3.63568 1.0478C3.74908 0.954633 3.77663 0.801523 3.83174 0.495307L3.85717 0.354004" stroke="#5D6481" stroke-width="0.510284" stroke-linejoin="round"/>
                            </svg>
                            0208 616 2526
                        </a></li>
                    </ul>
                </div>
                <div class="footer_logo">
                    <a href="#"><img src="https://i.postimg.cc/QCMKGSg3/merit-tutors-logo.png" alt=""></a>
                    <a href="#"><img src="https://i.postimg.cc/VvNGPV4r/logo.png" alt=""></a>
                </div>
            </div>
            <!-- End (Footer) Part -->
        </div>






        <!-- ~~~~~~~~~~ JS Files ~~~~~~~~~~-->
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>