@extends('layouts.frontend')
@section('title', ' Exam Entry Deadlines | Book Your Exams at Exam Centre London')
@section('meta_description', 'Dont miss out on your exams! View the 2025 entry deadlines for GCSE, IGCSE, A-Level, and more at Exam Centre London. Book early to avoid late fees.')
@section('content')
	<div class="sub_menu_main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="sub_menu">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><i class="fas fa-angle-right"></i></li>
							<li><a href="{{ url('/exam-booking-date-details') }}">Exam Entry Deadline</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="a_lavel_exams_main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="a_level_exams">
						<div class="section_title high_standard_title">
							<b>Exam Entry Deadline</b>
							<h2>Exam  <span>Entry Deadline </span></h2>
							<p>Candidates must submit their exam entry form by the deadlines below to secure a place with Exam Centre London, enabling us with sufficient
								time to issue the statement of entries. Late submissions will incur additional fees.<br>
								Book your exam now with Exam Centre London!</p>
							<a href="{{ url('/contact') }}" class="btn_style">Contact Us <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="zh_center_content section_padding" style="background:#fff !important">
    	<div class="container">
			<div class="container table-responsive table_design_default exam_booking_deatline_table"> 
				<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">EXAM SERIES</th>
						<th scope="col">ENTRY DEADLINE</th>
						<th scope="col">LATE FEES CHARGE FROM</th>
						<th scope="col">HIGH LATE FEES CHARGE FROM</th>
						<th scope="col">AVAILABILITY</th>
					</tr>
				</thead>
					<tbody>
						@php
							$alldata=App\Models\Examessuedate::where('is_deleted',0)->where('is_active',1)->get();
						@endphp
						@foreach($alldata as $data)
						<tr>
							<td scope="row">{{ $data->exam_name }}</td>
							@php
								$time = strtotime($data->entry_dateline);
							$newformat = date('d-m-Y',$time);
							
								$timetwo = strtotime($data->entry_latefees);
							$newformattwo = date('d-m-Y',$timetwo);

							$timethree = strtotime($data->entry_highlatefees);
							$newformatthree = date('d-m-Y',$timethree);
							@endphp
							<td>{{$newformat }}</td>
							<td>{{ $newformattwo }}</td>
							<td>{{ $newformatthree }}</td>
							<!--<td>{{$data->submission_dead_lines }}</td>-->
							<td>{{ $data->availability }}</td>
					
						</tr>
						@endforeach
										
					</tbody>
				</table>
			</div>
    	</div>
    </section>
    <section class="exam_board_main" style="padding-bottom: 100px">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="exam_board">
                      <div class="exam_board_title"><p>Officially Accepted Exam Boards</p></div>
                      <div class="exam_board_items exam_board_items_carousel">
                          <ul class="owl-carousel owl-theme">
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board1.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board2.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board3.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board4.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board5.png" alt=""></a></li>
                              <li><a href="#"><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/board6.png" alt=""></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection