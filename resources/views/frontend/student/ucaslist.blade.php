@extends('layouts.frontend')
@section('title', 'UCAS Booking List')
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
                        <div class="dashboard_right_header dashboard_edit_profile_header">
                            @include('frontend.student.include.dasboardheader')
                        </div>

                        <div class="edit_profile_right_contents exam_bookinglist_right_contents">
                          <div class="tab-content" id="pills-tabContent">
              <!-- Start Tab-1 Contents -->
                              <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="exam_booking_list_tab1_contents">
                                  <div class="dashboard_exam_booking_table">
                                      <div class="table_design_default">
                                          <table>
                                              <thead>
                                                <tr>
                                                  <th scope="col">Manage</th>
                                                  <th scope="col">#</th>
                                                  <th scope="col">Date</th>
                                                  <th scope="col">Booking-No</th>
                                                  <th scope="col">Exam Type</th>
                                                 
                                                  <th scope="col">Payment Status</th>
                                                 
                                                 
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($alldata as $key => $data)
                                                  <tr>
                                               
                                                      <td class="debl_table_btn_main">

                                                        @if($data->is_paid_verify==0)
                                                        <a class="debl_table_btn debltb1" href="{{ url('/make-payment/ucas-booking/'.$data->ucas_booking_id) }}">Pay</a> 
                                                        @endif
                                                        <a class="debl_table_btn debltb1" href="{{ url('ucas-exam-booking-details/'.$data->ucas_booking_id) }}">Details</a>
                                                       
                                                         <a class="debl_table_btn debltb2" href="{{ url('ucas-exam-booking/details/invoice-download/'.$data->ucas_booking_id) }}">Invoice Download</a>
            
                                                       
                                                      </td>
                                                      <td>{{ ++$key}}</td>
                                                      <td>{{ $data-> created_at->format('d-M-Y') }}</td>
                                                      <td>{{ $data->ucas_booking_id }}</td>
                                                      <td>UCAS MOCK EXAM</td>
                                                      <td>
                                                      @if($data->is_paid_verify==1)
                                                        <span class="debl_status">Paid</span>  
                                                      @endif
                                                      @if($data->is_paid_verify==0)
                                                      <span class="debl_status debl_status2">Unpaid</span>
                                                      @endif
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="exam_booking_list_page_counting">
                                       
                                        <div class="blog_page_count exam_fees_modal_page_count">
                                         {{ $alldata->links() }}
                                   
                                        </div>
                          <div></div>
                                      </div>
                                  </div>
                  </div>
                </div>
             
            </div>

                        </div>
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
