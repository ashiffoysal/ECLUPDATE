@extends('layouts.frontend')
@section('title', 'Make Due Payment')
@section('content')
    @php
        $mockprice = 0;
    @endphp
    @if ($data->mock_test == 'mock_test_yes')
        @php
            $mockprice = $data->mock_amount;
        @endphp
    @endif
    @php
        $mainprice = 0;
    @endphp
    @if ($data->exam_information == null)
    @else
        @foreach (json_decode($data->exam_information) as $mainsub)
            @php
                $subject = App\Models\Subject::where('id', $mainsub->subject)->first();
                $mainprice = $mainsub->fees + $mainprice;
            @endphp
        @endforeach
    @endif
    <!-- Start Sub Menu -->
    <div class="sub_menu_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sub_menu">
                        <ul>
                            <li><a href="#">Exams</a></li>
                            <li><i class="fas fa-angle-right"></i></li>
                            <li><a href="#">Payment</a></li>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="payment_page">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Start Tab-1 Contents -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                            
                                    <div class="payment_tabs_contents_main">
                                        <div class="payment_tab_left_main">
                                            <div class="payment_tab_left">
                                                <div class="payment_tabs_alert">
                                                    <p>Please complete your payment to confirm your exam booking.</p>
                                                    <div class="payment_tabs_alert_title">
                                                        <p>Payment Alert</p>
                                                    </div>
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

                                                                    @if ($data->exam_information == null)
                                                                    @else
                                                                        @foreach (json_decode($data->exam_information) as $smainsub)
                                                                            @php

                                                                                $subjects = App\Models\Subject::where(
                                                                                    'id',
                                                                                    $smainsub->subject,
                                                                                )->first();

                                                                            @endphp
                                                                            <tr>
                                                                                <td>{{ $subjects->subject_name ?? '' }}</td>
                                                                                <td>£ {{ $smainsub->fees ?? '' }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif

                                                                    <tr>
                                                                        <td>Mock Test Fees</td>
                                                                        <td>£ {{ $mockprice ?? 0 }}</td>
                                                                    </tr>
                                                                    @if($data->is_ucas_reference==1)
                                                                    <tr>
                                                                        <td>Ucas Reference Fee:</td>
                                                                        <td>£ {{ $data->ucas_reference_fee ?? 0}}</td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <td>Coupon Discount</td>
                                                                        <td>£ {{ $data->discount_amount }}</td>
                                                                    </tr>
                                                                    @php
                                                                        $ilstallment_fees =
                                                                            ($data->ucas_reference_fee + $data->admin_specialaccess_amount +
                                                                                $data->total_amount -
                                                                                $data->discount_amount + $data->special_access_initial_fees ) *
                                                                            0.05;
                                                                    @endphp
                                                                    <tr>
                                                                        <td>Instalment Fee</td>
                                                                        <td>£ {{ $ilstallment_fees }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Special Access Document Checking Fee</td>
                                                                        <td>£ {{ $data->special_access_initial_fees }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Special Access Fee</td>
                                                                        <td>£ {{ $data->admin_specialaccess_amount }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Fee</td>
                                                                        <td>£
                                                                            {{ $data->ucas_reference_fee+$mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount  + $data->special_access_initial_fees  }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Paid Fee</td>
                                                                        <td>£ {{ $data->paid_amount }}</td>
                                                                    </tr>
                                                                    <tr>     @php
                                                            
                                                                        $price=$data->ucas_reference_fee + $mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount + $data->special_access_initial_fees ;
                                                                        $ilstrumentamount=$price/2;
                                                            
                                                                    @endphp
                                                                        <td>Due Fee</td>
                                                                        <td>£
                                                                            {{ $ilstrumentamount }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="table_design_default table_design_default_payment2">
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
                                                                        <td>Second Instalment Date</td>
                                                                        <td>{{ $data->second_installment_date }}</td>
                                                                        <td>£
                                                                            {{ $ilstrumentamount }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment_tab_right_main active">
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

                                                    </div>
                                                    <div class="payment-content card-content active">
                                                        <form action="{{ url('cardpayment-duepayment/session') }}" method="POST">
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
                                                            @csrf
                                        
                                                            <input type="hidden" name="amount" id="main_amount" value="{{  $ilstrumentamount }}">
                                                            <input type="hidden" name="cu_booking_id" id="cu_booking_id" value="{{ $data->booking_id }}">
                                                            <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
                                                            <input type="hidden" name="main_id" id="cu_main_id" value="{{ $data->id }}">
                                                            <input type="hidden" name="user_id" id="cu_user_id" value="{{ $data->user_id }}">
                                                            <div class="payment_content_btn">
                                                                <button type="submit" class="btn_style"><b> £ {{  $ilstrumentamount }} </b> Pay
                                                                    with Card Now <span><img
                                                                            src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png"
                                                                            alt=""></span></button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                            <!-- End Tab-1 Contents -->

                            <!-- Start Tab-2 Contents -->

                            <!-- End Tab-2 Contents -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================  End (A Level Endorsement) Section  ================-->
@endsection
