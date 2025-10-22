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
                                  <span>{{ $data->postcode }}</span>
                                </p>
                              </div>
                              <!-- single -->
                              <div class="ebdc_basic_information_single">
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon11.png" alt="">
                                    Address Line 1
                                  </span>
                                  <span>{{ $data->address_line_1 }}</span>
                                </p>
                                <p>
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon11.png" alt="">
                                    Address Line 2
                                  </span>
                                  <span>{{ $data->address_line_2 }}</span>
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
                                  <span>{{ $data->main_exam_type }}</span>
                                </p>
                              </div>
                              <!-- table -->
                              <div class="dashboard_exam_booking_table dashboard_exam_booking_details_table">
                                    <div class="table_design_default">
                                      @if($data->main_exam_type=='GCSE' || $data->main_exam_type=='A Level' || $data->main_exam_type=='AS Level'||  $data->main_exam_type=='IGCSE' )
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
                                              @if($data->exam_information==null)
								                              
								                                   @else
                                                  @foreach(json_decode($data->exam_information) as $exam)
                                                  <tr>
                                                    <td>{{$exam->exam_board}}</td>
                                                    <td>{{ $data->mainseries->exam_name ?? '' }}</td> 
                                                    @php
                                                      $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                                    @endphp
                                                    <td class="text-danger">{{$subject->subject_name}}</td>
                                                    <td><span class="debdt_span">{{$subject->unit_code}}</span></td>
                                                    <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                                    <td>£ {{ $exam->fees }}</td>
                                                  </tr>
                                                  @endforeach 
                                                  @endif
                                            </tbody>
                                        </table>
                                      @endif


                                      @if($data->main_exam_type=='AAT' || $data->main_exam_type=='Functional Skills')
                                      <table>
                                          <thead>
                                              <tr>
                                                <th>Exam Board</th>
                                                <th>Subject</th>
                                                <th>Unit Code</th>
                                                <th>Exam Type</th>
                                                <th>Fees</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            @if($data->exam_information==null)
                                            
                                                 @else
                                                 @foreach(json_decode($data->exam_information) as $exam)
                                                 <tr>
                                                   <td>{{$exam->exam_board}}</td>
                                                   @php
                                                     $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                                   @endphp
                                                   <td class="text-danger">{{$subject->subject_name}}</td>
                                                   <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
                                                   <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                                    <td>£ {{ $exam->fees }}</td>
                                                    <td>{{ $exam->exam_date }}</td>
                                                    <td>{{ $exam->start_exam_time }}</td>
                                                 </tr>
                                                 @endforeach
                                                @endif
                                              
                                            
                                          </tbody>
                                      </table>
                                    @endif
                                    @if($data->main_exam_type=='ACCA')
                                    <table>
                                        <thead>
                                            <tr>
                                              <th>Exam Board</th>
                                              <th>Subject</th>
                                              <th>Unit Code</th>
                                              <th>Exam Type</th>
                                              <th>Fees</th>
                                              <th>Date</th>
                                              <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if($data->exam_information==null)
                                               @else
                                               @foreach(json_decode($data->exam_information) as $exam)
                                               <tr>
                                                 <td>{{$exam->exam_board}}</td>
                                                 @php
                                                   $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                                 @endphp
                                                 <td class="text-danger">{{$subject->subject_name}}</td>
                                                 <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
                                                 <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                                  <td>£ {{ $exam->fees }}</td>
                                                  <td>{{ $exam->exam_date }}</td>
                                                  <td>{{ $exam->start_exam_time }}</td>
                                               </tr>
                                               @endforeach
                                              @endif
                                        </tbody>
                                    </table>
                                  @endif
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="exam_booking_details_contents mb-3">
                            <div class="ebdc_basic_information_title"><p>Other Information</p></div>
                            <div class="ebdc_other_information">
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Has the candidate sat exams with us previously?</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->has_a_candidate }} </span><b><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/icon1.png" alt="">Exams Candidate Number</b></p>
                                  <p class="ebdcoisc_copy">
                                    @if($data->has_a_candidate=='yes'){{ $data->has_a_candidate_number }} @endif
                                      <img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/copy.png" alt="Copy" class="copy-btn">
                                      <span class="copy-text">Text is copied</span>
                                  </p>
                                </div>
                              </div>
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Do you have a ULN Number ( 10 digits )?</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->uln }}</span><b><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/icon1.png" alt="">ULN Number</b></p>
                                  <p class="ebdcoisc_copy">
                                    {{ $data->uln_number }}
                                      <img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/copy.png" alt="Copy" class="copy-btn">
                                      <span class="copy-text">Text is copied</span>
                                  </p>
                                </div>
                              </div>
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Do you have a UCI Number ( 13 digits )?</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->uci }}</span><b><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/icon1.png" alt="">UCI Number</b></p>
                                  <p class="ebdcoisc_copy">
                                    {{ $data->uci_number }}
                                  <img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/copy.png" alt="Copy" class="copy-btn">
                                  <span class="copy-text">Text is copied</span>
                              </p>
                                </div>
                              </div>
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Are you retaking these exams?</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->retaking_exams }}</span><b><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/icon1.png" alt="">Exam Names</b></p>
                                  <p class="ebdcoisc_copy">
                                    {{ $data->retaking_exams_name }}
                                  <img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/copy.png" alt="Copy" class="copy-btn">
                                  <span class="copy-text">Text is copied</span>
                              </p>
                                </div>
                              </div>
                              <!-- single -->
                              <div class="ebdc_other_information_single">
                                <div class="ebdc_ois_title"><p>Are you carring forward your practical endorsement /course work/ spoken/ or any other assessment?</p></div>
                                <div class="ebdc_ois_contents">
                                  <p><span>{{ $data->caring_forwad }}</span><b><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/icon1.png" alt="">Exam Board & Grade</b></p>
                                  <p class="ebdcoisc_copy">
                                    {{$data->caring_forwad_details}}
                                    <img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/copy.png" alt="Copy" class="copy-btn">
                                    <span class="copy-text">Text is copied</span>
                                </p>
                                </div>
                              </div>
                            </div>
                            <div class="ebdc_update_btn">
                              {{-- <span class="ebdc_update_btn_img"><img src="{{ asset('frontend/updatedesign') }}/assets/images/exam-booking-details/img3.png" alt=""></span> --}}
                              {{-- <button type="submit" class="btn_style">Update <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button> --}}
                            </div>
                          </div>
                          <div class="exam_booking_details_contents">
                            <div class="ebdc_basic_information">
                              
                              <div class="ebdc_basic_information_single ebdc_bis_active ebdc_bis_2">
                                <p class="ebdc_biss_p">
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon1.png" alt="">
                                    Fee Details
                                  </span>
                                
                                </p>
                              </div>
                              <!-- table -->
                              <div class="dashboard_exam_booking_table dashboard_exam_booking_details_table">
                                    <div class="table_design_default">
                                     
                                        <table>
                                            <thead>
                                                <tr>
                                               
                                                  <th>Discount</th>
                                                  <th>Mock Test</th>
                                                  <th>ucas Reference Fee</th>
                                                  <th>Special Access</th>
                                                    <th>Document Checking Fee</th>
                                                  <th>Ilstalment Fee</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                                <tr>
                                                  {{-- <td>£ {{ $data->Installment_fee + $data->special_access_initial_fees + $data->total_amount - $data->discount_amount + $data->admin_specialaccess_amount}}</td> --}}
                                                  <td>£ {{  $data->discount_amount }}</td>
                                                  <td>£ {{  $data->mock_amount }}</td>
                                                  <td>£ {{  $data->ucas_reference_fee }}</td>
                                                  <td>£ {{  $data->admin_specialaccess_amount }}</td>
                                                  <td>£ {{  $data->special_access_initial_fees }}</td>
                                                  <td>£ {{  $data->Installment_fee }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                 

                                    </div>
                                </div>
                            </div>
                          </div>

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

                          <div class="exam_booking_details_contents">
                            <div class="ebdc_basic_information">
                              
                              <div class="ebdc_basic_information_single ebdc_bis_active ebdc_bis_2">
                                <p class="ebdc_biss_p">
                                  <span>
                                    <img src="assets/images/exam-booking-details/icon1.png" alt="">
                                    Payment Information
                                  </span>
                                  <span>{{ $data->main_exam_type }}</span>
                                </p>
                              </div>
                              <!-- table -->
                              <div class="dashboard_exam_booking_table dashboard_exam_booking_details_table">
                                    <div class="table_design_default">
                                     
                                        <table>
                                            <thead>
                                                <tr>
                                                  
                                                  <th>Total Amount</th>
                                                  <th>Paid Amount</th>
                                                  <th>Due Amount</th>
                                                  <th>Discount</th>
                                                  <th>Booking ID</th>
                                                  <th>Exam Type</th>
                                                  <th>Paid By</th>
                                                  <th>Transection ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  
                                                  <td>£ {{ $data->ucas_reference_fee + $data->special_access_initial_fees + $data->total_amount - $data->discount_amount + $data->Installment_fee + $data->admin_specialaccess_amount }}</td>
                                                  <td>£ {{ $data->paid_amount }}</td>
                                                  <td>£ {{ $data->ucas_reference_fee + $data->special_access_initial_fees + $data->total_amount - $data->discount_amount + $data->Installment_fee + $data->admin_specialaccess_amount - $data->paid_amount}}</td>
                                                  <td>£ {{  $data->discount_amount }}</td>
                                                  <td>{{ $data->booking_id }}</td> 
                                                  <td class="text-danger">{{ $data->main_exam_type }}</td>
                                                  <td class="text-danger">{{ $data->payment_option }}</td>
                                                  <td>{{ Str::limit($data->transection_id,20) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                 

                                    </div>
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
