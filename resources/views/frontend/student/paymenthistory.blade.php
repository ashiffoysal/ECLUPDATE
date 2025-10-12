@extends('layouts.frontend')
@section('title', 'Candidate Payment History')
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
                                                  <th>Order ID</th>
                                                  <th>Total Paid</th>
                                                  <th>Status</th>
                                                  
                                                  </tr>
                                              </thead>
                                              <tbody>
                                               
                                                @foreach($alldata as $key => $data)
                                               

                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $data->created_at->format('F-d-Y') }}</td>
                                                    <td>{{ $data->order_id }}</td>
                                                    <td>£ {{ $data->amount }}</td>
                                                    <td>@if($data->is_verified==1)<span class="btn-sm btn-success">Paid</span> @elseif($data->is_verified==0)<span class="btn-sm btn-warning">Unpaid</span> @else <span class="btn-sm btn-danger">Paid Faild</span> @endif</td>
                                                   
                                                </tr>
                                               
                                                  @endforeach
                                                  
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="exam_booking_list_page_counting">
                                        {{-- <div class="eblpc_text"><p>Showing 1-7 from 21</p></div> --}}
                                        <div class="blog_page_count exam_fees_modal_page_count">
                                          {{ $alldata->links() }}
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

@endsection
