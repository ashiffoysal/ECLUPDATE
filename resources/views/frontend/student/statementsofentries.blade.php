@extends('layouts.frontend')
@section('title', 'Candidate Statement Of Entry List')
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
                                                    <th>Booking-No</th>
                                                    <th>Exam Board and Subject</th>
                                                    <th>Uploads Date</th>
                                                    <th>File</th>
                                                     
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @if($alldata->count() >0 )
                                                @foreach($alldata as $key => $data)
                                                  <tr>
                                                      <td class="debl_table_btn_main">
                                                        <td>{{ ++$key}}</td>
                                                        <td>{{ $data->booking_id }}</td>
                                                        <td>{{ $data->exam_board_name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->uploads_date)->format('d/m/Y') ?? ''}}</td>
                                                        <a download href="{{ url('/'.$data->file) }}" class="debl_table_btn debltb2"><img src="{{ asset('frontend/updatedesign') }}/assets/images/dashboard/invoice.png" alt="">Invoice Download</a>
                                                      </td>
                                                  </tr>
                                                  @endforeach
                                                  @else
                                                      <p>Your statement is not ready at the moment</p>
                                                  @endif
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="exam_booking_list_page_counting">
                                        {{-- <div class="eblpc_text"><p>Showing 1-7 from 21</p></div> --}}
                                        <div class="blog_page_count exam_fees_modal_page_count">
                                          {{-- {{ $alldata->links() }} --}}
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
