@extends('layouts.frontend')
@section('title', 'Candidate All Exambooking')
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
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Booking ID</th>
                                                <th>Payment Status</th>
                                                <th>Manage</th>
                                                
                                            </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>{{ $data->booking_id }}</td>
                                                  <td>{{ $data->child_first_name }}  {{ $data->child_last_name }}</td>
                                                  <td>{{ $data->email }}</td>
                                                  <td>{{ $data->phone_number }}</td>
                                                  <td>@if($data->is_paid==0) <span class="debl_status">Unpaid</span> @else <span class="debl_status">Paid</span>  @endif</td>
                                                  
                                              </tr>
                                                
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="table_design_default">
                                        <table>
                                            <thead>
                                              <tr>
                                                <th>Address</th>
                                                <th>City </th>
                                                <th>Post Code </th>
                                                <th>Total Amount </th>
                                                <th>Paid Amount</th>
                                          </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>{{ $data->address_line_1 }}</td>
                                                <td>{{ $data->city }}</td> 
                                                <td>{{ $data->post_code }}</td>
                                                <td>£ {{ $data->total_amount }}</td>
                                                <td>£ {{ $data->paid_amount }}</td>
                                            </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table_design_default">
                                      <table>
                                          <thead>
                                            <tr>
                                              <th>Exam Details</th>
                                              <th>Fees </th>
                                              
                                        </tr>
                                          </thead>
                                          <tbody>
                                            @if($data->subject_details ==null)

                                            @else
                                            @foreach(json_decode($data->subject_details) as $smainsub)
                                            <tr>
                                              
                                              <td>{{$smainsub->subject ?? ''}}</td>
                                              
                                              <td>£ {{ $smainsub->fees ?? '' }} </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            
                                          </tbody>
                                      </table>
                                  </div>

                                    </div>
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
