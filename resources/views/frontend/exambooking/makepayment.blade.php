@extends('layouts.frontend')
@section('title', 'Make Payment')
@section('content')
    @php
        $mockprice = $data->mock_test == 'mock_test_yes' ? $data->mock_amount : 0;
        $mainprice = 0;

        if (!empty($data->exam_information)) {
            $examInfo = json_decode($data->exam_information, true);
            $subjectIds = array_column($examInfo, 'subject');

            $subjects = App\Models\Subject::whereIn('id', $subjectIds)->get()->keyBy('id');

            $mainprice = array_sum(
                array_map(function ($mainsub) use ($subjects) {
                    return optional($subjects[$mainsub['subject']])->fees ?? 0;
                }, $examInfo),
            );
        }
    @endphp
    @php
        $allowedExamTypes = ['GCSE', 'A Level', 'AS Level', 'IGCSE'];
        $todayDate = Carbon\Carbon::now()->addDays(30);
        $entryDate = null;

        if (in_array($data->main_exam_type, $allowedExamTypes)) {
            $series = App\Models\Examessuedate::find($data->exam_series);
            $entryDate = optional($series)->entry_dateline ? Carbon\Carbon::parse($series->entry_dateline) : null;
        }
    @endphp


    @php
        $examInfo = json_decode($data->exam_information, true);
        $mainprice = 0;
    @endphp

    @if (!empty($examInfo))
        @php
            $subjectIds = array_column($examInfo, 'subject');
            $subjects = App\Models\Subject::whereIn('id', $subjectIds)->pluck('id')->toArray();

            $mainprice = array_sum(
                array_map(fn($mainsub) => in_array($mainsub['subject'], $subjects) ? $mainsub['fees'] : 0, $examInfo),
            );
        @endphp
    @endif

    <!-- Start Sub Menu -->
    <div class="sub_menu_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub_menu">
                        <ul>
                            <li><a href="{{ url('/exam-list') }}">Exams</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="{{ url('/exam-list') }}">{{ $data->main_exam_type ?? '' }} Exam</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="{{ url('/exam-list') }}">{{ $data->main_exam_type ?? '' }} Exam Booking</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="#">Make Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sub Menu -->
    <!--================  Start (Payment) Section  ================-->
    <section class="payment_page_main">
        @if (
            $data->main_exam_type == 'GCSE' ||
                $data->main_exam_type == 'A Level' ||
                $data->main_exam_type == 'AS Level' ||
                $data->main_exam_type == 'IGCSE')
            @php

                $examSeriesId = $data->exam_series;
                $series = App\Models\Examessuedate::find($examSeriesId);

                // Check if the series is found in the database
                if ($series) {
                    $entryDate = Carbon\Carbon::parse($series->entry_dateline);
                    $todayDate = Carbon\Carbon::now()->addDays(30);
                }
            @endphp

            @if (isset($series) && $todayDate <= $entryDate)
                @if ($series->id == 18)
                    @if($data->coupon_used==0)
                     @if($data->is_mock_fees_paid==0)
                                <div class="payment_page_tabs_menu">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                                aria-selected="true">I want to make full Payment </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">I want to pay in
                                                Instalments</button>
                                        </li>
                                    </ul>
                                </div>
                              @endif
                    @endif
                @endif
            @endif

               
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="payment_page">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Start Tab-1 Contents -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                {{-- <form> --}}
                                <div class="payment_tabs_contents_main">
                                    <div class="payment_tab_left_main">
                                        <div class="payment_tab_left">
                                            <div class="payment_tabs_alert">
                                                <p>Please complete your payment to confirm your exam booking.</p>
                                                <div class="payment_tabs_alert_title">
                                                    <p>Payment Alert</p>
                                                </div>
                                            </div>
                                            @if (
                                                $data->main_exam_type == 'A Level' ||
                                                    $data->main_exam_type == 'AS Level' ||
                                                    $data->main_exam_type == 'GCSE' ||
                                                    $data->main_exam_type == 'IGCSE')
                                                <div class="payment_tabs_promo_code">
                                                    <form>
                                                        <div class="payment_tabs_promo_code_input">
                                                            <input type="text" name="cupon" id="cupon_code"
                                                                placeholder="Use Promo Code">
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/promo-code.png"
                                                                alt="">
                                                        </div>
                                                        <button onclick="addcupon()" type="button" class="btn_style">Apply
                                                            <span><img
                                                                    src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                    alt=""></span></button>
                                                        <br>

                                                    </form>
                                                    <br>

                                                </div>
                                            @endif
                                            @php
                                                $examInfo = json_decode($data->exam_information, true);
                                            @endphp

                                            @if (!empty($examInfo))
                                                @php
                                                    $subjectIds = array_column($examInfo, 'subject');
                                                    $subjects = App\Models\Subject::whereIn('id', $subjectIds)->pluck(
                                                        'subject_name',
                                                        'id',
                                                    );
                                                @endphp
                                            @endif
                                            <div class="payment_tabs_table_main">

                                                <div class="payment_tabs_table">
                                                    <span id="error_coupon" style="color:red;display:none">Please enter
                                                        promo code</span>
                                                    <span id="wrong_coupon" style="color:red;display:none">Promo Code is
                                                        Worng</span>
                                                    <span id="success_coupon" style="color:green;display:none">Promo add
                                                        success</span>
                                                    <span id="warning_coupon" style="color:red;display:none">Already used
                                                        this Promo code</span>
                                                    <div class="table_design_default">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Details</th>
                                                                    <th>Fees</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($examInfo as $smainsub)
                                                                    <tr>
                                                                        <td>{{ $subjects[$smainsub['subject']] ?? 'Unknown Subject' }}
                                                                        </td>
                                                                        <td>£ {{ $smainsub['fees'] ?? '0' }}</td>
                                                                    </tr>
                                                                @endforeach

                                                                @if ($data->mock_test == 'mock_test_yes')
                                                                    <tr>
                                                                        <td>Mock Test Fee <span style="color: #74093e;font-size: 11px"> (Coupon not applicable):</span></td>
                                                                        <td>£ {{ $mockprice ?? 0 }} @if($data->is_mock_fees_paid==1) <span class="badge badge-success">Paid</span> @endif</td>
                                                                    </tr>
                                                                @endif
                                                                @if ($data->is_ucas_reference == 1)
                                                                    <tr>
                                                                        <td>Ucas Reference Fee <span style="color: #74093e;font-size: 11px">(Coupon not applicable):</span></td>
                                                                        <td>£ {{ $data->ucas_reference_fee ?? 0 }} </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td>Document Checking Fee <span style="color: #74093e;font-size: 11px">(Coupon not applicable):</span></td>
                                                                    <td>£ {{ $data->special_access_initial_fees }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Special Access Fees <span style="color: #74093e;font-size: 11px">(Coupon not applicable):</span></td>
                                                                    <td>£ {{ $data->admin_specialaccess_amount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span>Discount Amount</span></td>
                                                                    <td><span>- £ {{ $data->discount_amount }}</span> @if( $data->discount_amount >0) <a href="{{ url('/get/cancel-coupon/'.$data->id) }}" class="btn btn-danger">Cancel Coupon</a>@endif</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p>
                                                            Total
                                                            <span>£
                                                                {{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees - $data->paid_amount }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment_tab_right_main">
                                        <div class="payment_tab_right">
                                            <div class="payment-section">
                                                <div class="payment-section-title">
                                                    <p>Payment Section</p>
                                                </div>
                                                <div class="radio-buttons">
                                                    <label>
                                                        <input type="radio" name="payment-method1" value="card"
                                                            checked />
                                                        <span class="radio-label">
                                                            <span class="radio-circle"></span>
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card.png"
                                                                alt="Card Icon" class="radio-icon inactive" />
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card-active.png"
                                                                alt="Active Card Icon" class="radio-icon active" />
                                                            <span class="radio-text">Card Payment</span>
                                                        </span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="payment-method1" value="bank" />
                                                        <span class="radio-label">
                                                            <span class="radio-circle"></span>
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/bank.png"
                                                                alt="Bank Icon" class="radio-icon inactive" />
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/bank-active.png"
                                                                alt="Active Bank Icon" class="radio-icon active" />
                                                            <span class="radio-text">Bank Payment</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="payment-content card-content">
                                                    <form action="{{ route('myonlinepayment.session') }}" method="POST">
                                                        <div class="payment_card_contents">
                                                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/alert.png"
                                                                    alt="">Accepted Card types</p>
                                                            <div class="payment_content_card_imgs">
                                                                <a href="#"><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/payment/visa.png"
                                                                        alt=""></a>
                                                                <a href="#"><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/payment/master-card.png"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="payment_card_contents_target"><img
                                                                    src="{{ asset('frontend/updatedesign') }}/assets/images/payment/target.png"
                                                                    alt=""></div>
                                                        </div>
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}">
                                                        <input type="hidden" name="amount" id="main_amount"
                                                            value="{{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees }}">
                                                        <input type="hidden" name="myamount" id="myamount"
                                                            value="{{ $mainprice + $mockprice }}">
                                                        <input type="hidden" name="cu_booking_id" id="cu_booking_id"
                                                            value="{{ $data->booking_id }}">
                                                        <input type="hidden" name="booking_id"
                                                            value="{{ $data->booking_id }}">
                                                        <input type="hidden" name="main_id" id="cu_main_id"
                                                            value="{{ $data->id }}">
                                                        <input type="hidden" name="user_id" id="cu_user_id"
                                                            value="{{ $data->user_id }}">
                                                            
                                                        <div class="payment_content_btn">

                                                            <button name="payment_type" value="full" type="submit" class="btn_style"><b>£
                                                                    {{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees - $data->paid_amount }}</b>
                                                                Pay All with Card Now <span><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                        alt=""></span></button>
                                                        </div>

                                                        @if($mockprice > 0)
                                                            @if($data->is_mock_fees_paid==0)
                                                            <div class="payment_content_btn">
                                                                <button name="payment_type" value="mock" type="submit" class="btn_style" style="background: rgb(247, 124, 0);padding: 8px 10px 8px 35px;"><b>£
                                                                        {{  $mockprice  }}</b>
                                                                    Pay only Mock Fees Now <span><img
                                                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                            alt=""></span></button>
                                                            </div>
                                                            @endif
                                                        @endif
                                                    </form>
                                                </div>

                                                <div class="payment-content bank-content">
                                                    <form action="{{ url('bank/payment') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        <div class="payment_bank_contents">
                                                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/ecl.png"
                                                                    alt="">ECL Account Details</p>
                                                            <ul>
                                                                <li><span>Account Name</span> EDU SERVICE LIMITED</li>
                                                                <li><span>Account No.</span> 1890 1601</li>
                                                                <li><span>Sort Code</span> 04 06 05</li>
                                                            </ul>
                                                            <div
                                                                class="payment_tabs_promo_code payment_tabs_promo_code_input">
                                                                <input type="text" name="transection_id"
                                                                    placeholder="Enter Reference No. here" required>
                                                                <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/reference.png"
                                                                    alt="">
                                                            </div>
                                                            @csrf
                                                            <input type="hidden" name="amount"
                                                                value="    {{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees - $data->paid_amount }}">
                                                            <input type="hidden" name="booking_id"
                                                                value="{{ $data->booking_id }}">

                                                            <div class="form_file_upload_design">
                                                                <input type="file" name="file" accept="image/*">

                                                            </div>
                                                        </div>
                                                        <div class="payment_content_btn">
                                                            <button type="submit" class="btn_style"><b>£
                                                                        {{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $data->admin_specialaccess_amount + $data->special_access_initial_fees - $data->paid_amount }}</b>
                                                                Upload Now <span><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                        alt=""></span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </form>	 --}}
                            </div>
                            <!-- End Tab-1 Contents -->

                            <!-- Start Tab-2 Contents -->
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                {{-- <form> --}}
                                <div class="payment_tabs_contents_main">
                                    <div class="payment_tab_left_main">
                                        <div class="payment_tab_left">
                                            <div class="payment_tabs_alert payment_tabs_alert2">
                                                <p>The total amount will be divided into two Instalments. Please ensure that
                                                    the next payment is made on the due date.</p>
                                                <p><span>Please note that Instalment payments incur an additional 5%
                                                        fee.</span></p>
                                                <div class="payment_tabs_alert_title">
                                                    <p>Payment Alert on Instalment</p>
                                                </div>
                                            </div>
                                            <div class="payment_tabs_promo_code">
                                                {{-- <form>
									    					<div class="payment_tabs_promo_code_input">
									    						<input type="text" placeholder="Use Promo Code">
									    						<img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/promo-code.png" alt="">
									    					</div>
									    					<button class="btn_style">Apply <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
									    				</form> --}}
                                            </div>
                                            <div class="payment_tabs_table_main">
                                                <div class="payment_tabs_table">
                                                    <div class="table_design_default">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Details</th>
                                                                    <th>Fees</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (!empty($data->exam_information))
                                                                    @foreach (json_decode($data->exam_information) as $smainsub)
                                                                        @php
                                                                            $subject = App\Models\Subject::find(
                                                                                $smainsub->subject,
                                                                            );
                                                                        @endphp
                                                                        @if ($subject)
                                                                            <tr>
                                                                                <td>{{ $subject->subject_name }}</td>
                                                                                <td>£
                                                                                    {{ number_format($smainsub->fees, 2) }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                <tr>
                                                                    <td>Special Access Document Checking Fee</td>
                                                                    <td>£ {{ $data->special_access_initial_fees }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Special Access Fees</td>
                                                                    <td>£ {{ $data->admin_specialaccess_amount }}</td>
                                                                </tr>
                                                                @php
                                                                    $ilstallment_fees =
                                                                        ($data->ucas_reference_fee +
                                                                            $data->admin_specialaccess_amount +
                                                                            $data->total_amount -
                                                                            $data->discount_amount +
                                                                            $data->special_access_initial_fees) *
                                                                        0.05;
                                                                @endphp
                                                                <tr>
                                                                    <td>Instalment Fees</td>
                                                                    <td>£ {{ $ilstallment_fees }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mock Test Fees</td>
                                                                    <td>£ {{ $mockprice ?? 0 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span>Discount Amount</span></td>
                                                                    <td><span>- £ {{ $data->discount_amount }}</span> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <p>
                                                            Total
                                                            <span>£
                                                                {{ $data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount + $data->special_access_initial_fees }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="table_design_default table_design_default_payment2">
                                                        @php
                                                            $price =
                                                                $data->ucas_reference_fee +
                                                                $mainprice +
                                                                $mockprice -
                                                                $data->discount_amount +
                                                                $ilstallment_fees +
                                                                $data->admin_specialaccess_amount +
                                                                $data->special_access_initial_fees;
                                                            $ilstrumentamount = $price / 2;
                                                        @endphp
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Instalment Details</th>
                                                                    <th>Date</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>First Instalment Date</td>
                                                                    <td>{{ Carbon\Carbon::now()->format('d-m-Y') }}</td>
                                                                    <td>£ {{ $ilstrumentamount }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Second Instalment Date</td>
                                                                    <td>{{ Carbon\Carbon::now()->addDays(30)->format('d-m-Y') }}
                                                                    </td>
                                                                    <td>£ {{ $ilstrumentamount }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="payment_tab_right_main">
                                        <div class="payment_tab_right">
                                            <div class="payment-section">
                                                <div class="payment-section-title">
                                                    <p>Payment Section</p>
                                                </div>
                                                <div class="radio-buttons">
                                                    <label>
                                                        <input type="radio" name="payment-method2" value="card"
                                                            checked />
                                                        <span class="radio-label">
                                                            <span class="radio-circle"></span>
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card.png"
                                                                alt="Card Icon" class="radio-icon inactive" />
                                                            <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card-active.png"
                                                                alt="Active Card Icon" class="radio-icon active" />
                                                            <span class="radio-text">Card Payment</span>
                                                        </span>
                                                    </label>
                                                    {{-- <label>
													      		<input type="radio" name="payment-method2" value="bank" />
													      		<span class="radio-label">
														        	<span class="radio-circle"></span>
														        	<img
														          		src="{{ asset('frontend/updatedesign') }}/assets/images/payment/bank.png"
														          		alt="Bank Icon"
														          		class="radio-icon inactive"
														        	/>
														        	<img
														          		src="{{ asset('frontend/updatedesign') }}/assets/images/payment/bank-active.png"
														          		alt="Active Bank Icon"
														          		class="radio-icon active"
														        	/>
															        <span class="radio-text">Bank Payment</span>
															    </span>
													    	</label> --}}
                                                </div>
                                                <div class="payment-content card-content card-content2">
                                                    <form action="{{ url('cardpayment-installment/session') }}"
                                                        method="post">

                                                        <div class="payment_card_contents">
                                                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/alert.png"
                                                                    alt="">Accepted Card types</p>
                                                            <div class="payment_content_card_imgs">
                                                                <a href="#"><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/payment/visa.png"
                                                                        alt=""></a>
                                                                <a href="#"><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/payment/master-card.png"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="payment_card_contents_target"><img
                                                                    src="{{ asset('frontend/updatedesign') }}/assets/images/payment/target.png"
                                                                    alt=""></div>
                                                        </div>
                                                        <div class="pay_1st_Instalment">
                                                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card-active.png"
                                                                    alt="">You’ll have to pay £
                                                                {{ round($ilstrumentamount) }} Now for 1st Instalment</p>
                                                        </div>

                                                        @csrf

                                                        <input type="hidden" name="amount" id="main_amount"
                                                            value="{{ $ilstrumentamount }}">
                                                        <input type="hidden" name="myamount" id="myamount"
                                                            value="{{ $mainprice + $mockprice }}">
                                                        <input type="hidden" name="cu_booking_id" id="cu_booking_id"
                                                            value="{{ $data->booking_id }}">
                                                        <input type="hidden" name="booking_id"
                                                            value="{{ $data->booking_id }}">
                                                        <input type="hidden" name="main_id" id="cu_main_id"
                                                            value="{{ $data->id }}">
                                                        <input type="hidden" name="user_id" id="cu_user_id"
                                                            value="{{ $data->user_id }}">
                                                        <input type="hidden" name="Installment_fee"
                                                            value="{{ $ilstallment_fees }}">
                                                        <div class="payment_content_btn">
                                                            <button type="submit" class="btn_style"><b>£
                                                                    {{ $ilstrumentamount }}</b> Pay with Card Now
                                                                <span><img
                                                                        src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                        alt=""></span></button>
                                                        </div>
                                                    </form>
                                                </div>

                                                {{-- <div class="payment-content bank-content">
														  	<div class="payment_bank_contents">
														  		<p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/ecl.png" alt="">ECL Account Details</p>
														  		<ul>
														  			<li><span>Account Name</span> EDU SERVICE LIMITED</li>
														  			<li><span>Account No.</span> 1890 1601</li>
														  			<li><span>Sort Code</span> 04 06 05</li>
														  		</ul>
														  		<div class="payment_tabs_promo_code payment_tabs_promo_code_input">
										    						<input type="text" placeholder="Enter Reference No. here">
										    						<img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/reference.png" alt="">
										    					</div>
										    					<div class="form_file_upload_design">
				                                                    <input type="file" id="real-file-1" class="real-file" hidden="hidden" required="">
				                                                    <button type="button" class="custom-button">
				                                                        <p class="custom-text">Transaction Screenshot<br>
				                                                            <span>Allowed file types: png, jpg, jpeg.</span>
				                                                            <a>Choose File</a>
				                                                        </p>
				                                                    </button>
				                                                </div>
														  	</div>
														    <div class="pay_1st_Instalment">
														    	<p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/bank-active.png" alt="">You’ll have to pay £ 375.00 Now for 1st Instalment</p>
														    </div>
														    <div class="payment_content_btn">
														    	<button type="submit" class="btn_style"><b>£ 750.00</b> Upload Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
														    </div>
													  	</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                            <!-- End Tab-2 Contents -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================  End (A Level Endorsement) Section  ================-->
    {{-- <script>
        function addcupon() {
            var cupon_code = $("#cupon_code").val();
            var booking_id = $("#cu_booking_id").val();
            var main_id = $("#cu_main_id").val();
            var user_id = $("#cu_user_id").val();
            var myamount = $("#myamount").val();

            if (cupon_code == '') {
                $("#error_coupon").show();
                $("#success_coupon").hide();
                $("#warning_coupon").hide();
                $("#wrong_coupon").hide();
            } else {


                $.ajax({
                    url: "{{ url('/add/coupon/insert') }}",
                    type: "GET",
                    data: {
                        "cupon_code": cupon_code,
                        "booking_id": booking_id,
                        "main_id": main_id,
                        "user_id": user_id,
                    },
                    success: function(data) {

                        //  console.log(data);

                        if (data == "already_used") {
                            $("#error_coupon").hide();
                            $("#success_coupon").hide();
                            $("#wrong_coupon").hide();
                            $("#warning_coupon").show();

                        } else if (data == "success") {
                            $("#error_coupon").hide();
                            $("#success_coupon").show();
                            $("#warning_coupon").hide();
                            $("#wrong_coupon").hide();

                            location.reload();

                        } else if (data == "cupon_not_found") {

                            $("#error_coupon").hide();
                            $("#success_coupon").hide();
                            $("#warning_coupon").hide();
                            $("#wrong_coupon").show();


                        }
                    }
                });
            }



        }
    </script> --}}
    <!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function addcupon() {
        var cupon_code = $("#cupon_code").val();
        var booking_id = $("#cu_booking_id").val();
        var main_id = $("#cu_main_id").val();
        var user_id = $("#cu_user_id").val();
        var myamount = $("#myamount").val();

        if (cupon_code == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Coupon Required',
                text: 'Please enter your coupon code before applying.',
                confirmButtonColor: '#3085d6'
            });
        } else {
            $.ajax({
                url: "{{ url('/add/coupon/insert') }}",
                type: "GET",
                data: {
                    "cupon_code": cupon_code,
                    "booking_id": booking_id,
                    "main_id": main_id,
                    "user_id": user_id,
                },
                success: function(data) {

                    if (data == "already_used") {
                        Swal.fire({
                            icon: 'info',
                            title: 'Coupon Already Used',
                            text: 'You have already used this coupon.',
                            confirmButtonColor: '#3085d6'
                        });

                    } else if (data == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Coupon Applied Successfully!',
                            text: 'Your discount has been added.',
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            location.reload();
                        });

                    } else if (data == "cupon_not_found") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Coupon',
                            text: 'Coupon code not found or expired.',
                            confirmButtonColor: '#d33'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again later.',
                            confirmButtonColor: '#d33'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Could not connect to the server. Try again later.',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        }
    }
</script>

    <script>
        document.querySelectorAll('.payment-section').forEach((section) => {
            const radios = section.querySelectorAll('input[type="radio"]');
            const contents = section.querySelectorAll('.payment-content');

            radios.forEach((radio) => {
                radio.addEventListener('change', () => {
                    contents.forEach((content) => content.classList.remove('active'));
                    const value = radio.value;
                    section.querySelector(`.${value}-content`).classList.add('active');
                });
            });

            // Initial state
            const checkedRadio = section.querySelector('input[type="radio"]:checked');
            if (checkedRadio) {
                section.querySelector(`.${checkedRadio.value}-content`).classList.add('active');
            }
        });
    </script>
@endsection
