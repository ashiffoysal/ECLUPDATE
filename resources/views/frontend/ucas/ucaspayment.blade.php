@extends('layouts.frontend')
@section('title', 'Make Payment')
@section('content')
<div class="sub_menu_main">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="sub_menu">
                  <ul>
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><i class="fas fa-angle-right"></i></li>
                      <li><a href="{{ url('/ucas-registered-centre') }}">UCAS</a></li>
                      <li><i class="fas fa-angle-right"></i></li>
                      <li><a href="{{ url('/ucas-application') }}">UCAS Booking</a></li>
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
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                       
                          <div class="payment_tabs_contents_main">
                            <div class="payment_tab_left_main">
                              <div class="payment_tab_left">
                                <div class="payment_tabs_alert">
                                  <p>Please complete your payment to confirm your UCAS booking.</p>
                                  <div class="payment_tabs_alert_title"><p>Payment Alert</p></div>
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


                                            @if($data->exam_subject_details !=null)
                                              @foreach(json_decode($data->exam_subject_details) as $mysub)
                                              <tr>
                                                <td>{{ $mysub->subject }}- {{ $mysub->paper }}:</td>
                                                <td>£ {{ $mysub->fees ?? '0' }}</td>
                                              </tr>
                                              @endforeach
                                            @endif


                                            
                                            @if($data->review_personal_statement=='yes')
                                              <tr>
                                                <td>Review Personal Statement:</td>
                                                <td>£50</td>
                                              </tr>
                                            @endif

                                            @if($data->application_support=='yes')
                                              <tr>
                                                <td>Application Support and verifying Documents :</td>
                                                <td>£100</td>
                                              </tr>
                                            @endif
                                            @if($data->need_special_access==1)
                                            <tr>
                                              <td>Special Access Document Checking Fee</td>
                                              <td>£ 25.00</td>
                                            </tr>
                                            @endif
                                       
                                            
                                          </tbody>
                                        </table>
                                      <p>
                                        Total
                                        <span>£ {{ $data->total_subject_amount+$data->doucment_check_amount + $data->review_statement_amount + $data->special_access_initial_fees}}</span>
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
                                        <input type="radio" name="payment-method1" value="card" checked />
                                        <span class="radio-label">
                                          <span class="radio-circle"></span>
                                          <img
                                              src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card.png"
                                              alt="Card Icon"
                                              class="radio-icon inactive"
                                          />
                                          <img
                                              src="{{ asset('frontend/updatedesign') }}/assets/images/payment/card-active.png"
                                              alt="Active Card Icon"
                                              class="radio-icon active"
                                          />
                                          <span class="radio-text">Card Payment</span>
                                        </span>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment-method1" value="bank" />
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
                                    </label>
                                  </div>
                                  <div class="payment-content card-content">
                                    <form action="{{url('make-payment/onlinepayment/ucas-booking')}}" method="POST">
                                    <div class="payment_card_contents">
                                      <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/alert.png" alt="">Accepted Card types</p>
                                      <div class="payment_content_card_imgs">
                                        @csrf
                                        <input type="hidden" name="amount" id="myamount" value="{{ $data->total_subject_amount+$data->doucment_check_amount + $data->review_statement_amount + $data->special_access_initial_fees}}">
                                        <input type="hidden" name="cu_booking_id" id="cu_booking_id" value="{{ $data->ucas_booking_id }}">
                                        <input type="hidden" name="booking_id" value="{{ $data->ucas_booking_id }}">
                                        <input type="hidden" name="main_id" id="cu_main_id" value="{{ $data->id }}">
                                        <input type="hidden" name="user_id" id="cu_user_id" value="{{ Auth::user()->id }}">
                                        <a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/visa.png" alt=""></a>
                                        <a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/master-card.png" alt=""></a>
                                      </div>
                                      <div class="payment_card_contents_target"><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/target.png" alt=""></div>
                                    </div>
                                    <div class="payment_content_btn">
                                      <button type="submit" class="btn_style"><b>£ {{ $data->total_subject_amount+$data->doucment_check_amount + $data->review_statement_amount + $data->special_access_initial_fees}}</b> Pay with Card Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                    </div>
                                  </form>
                                  </div>
                                  
                                  <div class="payment-content bank-content">
                                  <form method="post" action="{{ url('make-payment/bankpayment/ucas-booking/') }}" enctype="multipart/form-data">
                                    <div class="payment_bank_contents">
                                      <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/ecl.png" alt="">ECL Account Details</p>
                                      <ul>
                                        <li><span>Account Name</span> EDU SERVICE LIMITED</li>
                                        <li><span>Account No.</span> 1890 1601</li>
                                        <li><span>Sort Code</span> 04 06 05</li>
                                      </ul>
                                      <div class="payment_tabs_promo_code payment_tabs_promo_code_input">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{ $data->ucas_booking_id }}">
                                        <input type="hidden" name="amount" value="{{ $data->total_subject_amount + $data->doucment_check_amount + $data->review_statement_amount + $data->special_access_initial_fees}}">
                                        <input type="text" name="transection_id" placeholder="Enter Reference No. here" required>
                                        <img src="{{ asset('frontend/updatedesign') }}/assets/images/payment/reference.png" alt="">
                                      </div>
                                      <div class="form_file_upload_design">
                                            <input type="file" name="file" id="real-file-2" class="real-file" hidden="hidden">
                                            <button type="button" class="custom-button">
                                                <p class="custom-text">Transaction Screenshot<br>
                                                    <span>Allowed file types: png, jpg, jpeg.</span>
                                                    <a>Choose File</a>
                                                </p>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="payment_content_btn">
                                      <button type="submit" class="btn_style"><b>£ {{ $data->total_subject_amount + $data->doucment_check_amount + $data->review_statement_amount + $data->special_access_initial_fees}}</b> Upload Now <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                    </div>
                                  </form>
                                  </div>
                               
                              </div>
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