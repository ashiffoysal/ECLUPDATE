@extends('layouts.frontend')
@section('title', 'Student Proctor Exam Booking List ')
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
                                                  <th scope="col">#</th>
                                                  <th scope="col">Manage</th>
                                                  <th scope="col">Date</th>
                                                  <th scope="col">Booking-No</th>
                                                  <th scope="col">Child Name</th>
                                                  <th scope="col">Payment Status</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($allData as $key => $data)
                                                  <tr>
                                                    <td>{{ ++$key }}</td>
                                                      <td class="debl_table_btn_main">


                                                        <a class="debl_table_btn debltb2" href="{{ url('proctor-exam-booking-details/'.$data->booking_id) }}">Details</a> 
                                           
                                                        @if($data->is_paid_verify==0)
                                                            <a class="debl_table_btn debltb1" href="{{ url('proctor-exam/make-payment/'.$data->booking_id) }}">Pay</a> 
                                                        @endif
                                                       
                                                      </td>
                                                      <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-M-Y') }}
                                                      </td>
                                                      <td>{{ $data->booking_id }}</td>
                                                      <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                                      <td>
                                                      @if($data->is_paid_verify==1)
                                                        <span class="debl_status">Paid</span>  
                                                      @endif
                                                      @if($data->is_paid_verify==0)
                                                      <span class="debl_status debl_status2">Unpaid</span>
                                                      @endif
                                                  </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="exam_booking_list_page_counting">
                                        {{-- <div class="eblpc_text"><p>Showing 1-7 from 21</p></div> --}}
                                        <div class="blog_page_count exam_fees_modal_page_count">
                                         
                                    {{-- <ul>
                                        <li><a href="#" class="blogs_page_count_prev"><span><i class="fas fa-arrow-left"></i></span></a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><span><i class="fas fa-arrow-right"></i></span></a></li>
                                    </ul> --}}
                                        </div>
                          <div></div>
                                      </div>
                                  </div>
                  </div>
                </div>
                <!-- End Tab-1 Contents -->

                <!-- Start Tab-2 Contents -->
                <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  2
                </div> -->
                <!-- End Tab-2 Contents -->
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
