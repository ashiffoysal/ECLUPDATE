@extends('layouts.frontend')
@section('title', 'Student Dashboard')
@section('content')
<section class="dashboard_main">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="dashboard_section">
                  <div class="dashboard_design">
                    <!-- Start Dashboard Left Side -->
                    <div class="dashboard_left_main">
                      @include('frontend.student.include.sidebar')
                    </div>
                    <!-- End Dashboard Left Side -->

                    <!-- Start Dashboard Right Side -->
                    <div class="dashboard_right_main">
                      <div class="dashboard_right">
                        <div class="dashboard_right_header">
                          @include('frontend.student.include.dasboardheader')
                        </div>
                        <form action="" method="" enctype="multipart/form-data">
                          <div class="exam_booking_details_contents">
                            <div class="ebdc_basic_information">
                              <div class="ebdc_basic_information_title"><p>Basic Information</p></div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single ebdc_bis_active">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon1.png" alt="">
                                    Exam Booking No
                                  </span>
                                  <span>{{ $data->booking_id }}</span>
                                </p>
                                <p>
                                  <span>
                                    @csrf
                                    <img src="assets/images/exam-booking-details/icon2.png" alt="">
                                    Booking Date
                                  </span>
                                  <span>{{ $data->created_at->format('d-M-Y') }}</span>
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon3.png" alt="">
                                    Full Name
                                  </span>
                                  <span>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon4.png" alt="">
                                    Payment Status
                                  </span>
                                  @if($data->is_paid_verify==1)
                                  <span class="ebdc_bis_scolor">Paid</span>
                                  @endif
                                  @if($data->is_paid_verify==0)
                                  <span class="ebdc_bis_scolor">Unpaid</span>
                                  @endif
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon5.png" alt="">
                                    Email
                                  </span>
                                  <span>{{ $data->email }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon6.png" alt="">
                                    Phone
                                  </span>
                                  <span>{{ $data->phone }}</span>
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon7.png" alt="">
                                    Gender
                                  </span>
                                  <span>{{ $data->gender }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon8.png" alt="">
                                    Date of Birth
                                  </span>
                                  <span>{{ $data->date_of_birth }}</span>
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon9.png" alt="">
                                    City
                                  </span>
                                  <span>{{ $data->city }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon10.png" alt="">
                                    Post Code
                                  </span>
                                  <span>{{ $data->post_code }}</span>
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon11.png" alt="">
                                    Address Line 1
                                  </span>
                                  <span>{{ $data->address_line_one }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon11.png" alt="">
                                    Address Line 2
                                  </span>
                                  <span>{{ $data->address_line_two }}</span>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="exam_booking_details_contents">
                            <div class="ebdc_basic_information">
                              <div class="ebdc_basic_information_title"><p>Exam Information</p></div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single ebdc_bis_active ebdc_bis_2">
                                <p class="ebdc_biss_p">
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon1.png" alt="">
                                    Exam Type
                                  </span>
                                  <span>Ucas Mock Exam</span>
                                </p>
                              </div>
                              <!-- table -->
                              <div class="dashboard_exam_booking_table dashboard_exam_booking_details_table">
                                    <div class="table_design_default">
                                     
                                        <table>
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Exam Board</th>
                                                      <th>Exam Series</th>
                                                      <th>Subject</th>
                                                      <th>Unit Code</th>
                                                      <th>Option Code</th>
                                                      <th>Fees</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @if($data->exam_subject_details==null)
								                              
								                                   @else
                                                  @foreach(json_decode($data->exam_subject_details) as $exam)
                                                  <tr>
                                                    <td>{{$exam->exam_board}}</td>
                                                    <td>{{$exam->subject}}</td> 
                                                    <td><span class="debdt_span">{{$exam->unit_code}}</span></td>
                                                    
                                                    <td> {{ $exam->paper }}</td>
                                                    <td>{{ $exam->date }}</td>
                                                    <td>£ {{ $exam->fees }}</td>
                                                  </tr>
                                                  @endforeach 
                                                  @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="exam_booking_details_contents mb-3">
                            <div class="ebdc_basic_information_title"><p>Other Information</p></div>
                            <div class="ebdc_other_information">
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Review your personal statement.</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->review_personal_statement }} </span></p>
                                 
                                </div>
                              </div>
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>UCAS application support including documents verifying and referencing.</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->application_support }}</span></p>
                                  
                                </div>
                              </div>
                              <!-- single -->
                            
                              <!-- single -->
                              
                              <!-- single -->
                             
                            </div>
                            <div class="ebdc_update_btn">
                              {{-- <span class="ebdc_update_btn_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/img3.png" alt=""></span> --}}
                              {{-- <button type="submit" class="btn_style">Update <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button> --}}
                            </div>
                            <div class="dashboard_exam_booking_table dashboard_exam_booking_details_table">
                              <div class="table_design_default">
                               
                                  <table>
                                      <thead>
                                          <tr>
                                            <th>Total Amount</th>
                                            <th>Discount</th>
                                            <th>Booking ID</th>
                                            
                                            <th>Paid Option</th>
                                            <th>Transection ID</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>£ {{ $data->total_subject_amount + $data->review_statement_amount + $data->doucment_check_amount - $data->discount_amount}}</td>
                                          <td>£ {{  $data->discount_amount }}</td>
                                          <td>{{ $data->ucas_booking_id }}</td> 
                                       
                                          <td class="text-danger">{{ $data->payment_option }}</td>
                                          <td>{{ $data->transaction_id }}</td>
                                        </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- End Dashboard Right Side -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

@endsection
