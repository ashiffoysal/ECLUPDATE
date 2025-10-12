@extends('layouts.frontend')
@section('title', 'Exam Timetables | GCSE, IGCSE, A-Level & More | Exam Centre London')
@section('meta_description', 'Access the official exam timetables for November 2025 and June 2026 series at Exam Centre London. Includes GCSE, IGCSE, A-Level, AS Level, and more. Plan your study schedule today!')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/exam-booking-date-details') }}">Exam TimeTables</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Sub Menu -->
<!--================  Start (A Level Exams) Section  ================-->
<section class="a_lavel_exams_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="a_level_exams">
					<div class="section_title high_standard_title">
						<b>Exam Time Tables</b>
						<h2>Exam  <span>Time Tables </span></h2>
						<p>Preparing for exams can be a daunting task, but having a clear and organized timetable makes all the difference. Exam timetables are crucial for candidates to plan their study schedules effectively and ensure they are well-prepared for each exam. Below, you will find the exam timetables designed to help you manage your time and maximize your exam preparation.</p>
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
						<th scope="col">EXAM TYPE</th>
					<th scope="col">ENTRY BOARD</th>
					<th scope="col">TIMETABLES</th>
					</tr>
			</thead>
				<tbody>
					@php
					$alldata=DB::table('examtimetables')->where('is_active',1)->get();
					@endphp
					@foreach($alldata as $datas)
					
					@php
						$allseries=DB::table('examessuedates')->where('id',$datas->exam_series)->select(['exam_name'])->first();
					@endphp
					<tr>
						<td>{{ $allseries->exam_name }}</td>
						<td>{{ $datas->exam_type }}</td>
						<td>{{ $datas->exam_board }}</td>
						<td>
							<a href="{{asset('/'.$datas->filepdf)}}" class="btn btn-success" download style="color:white !important;">Download</a>
						</td>
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
