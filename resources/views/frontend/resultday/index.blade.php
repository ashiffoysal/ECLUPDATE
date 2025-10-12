@extends('layouts.frontend')
@section('title', ' Results Day | Exam Centre London – Key Dates & Next Steps')
@section('meta_description', 'Find out when GCSE Results Day (date + time), what to expect, and how to prepare. Perfect for London students & private candidates. If you sat your exams with us, results will be emailed to you by 9:00 AM. If you prefer to collect a physical copy, our office will be open from 8:30 AM. We are here to help you plan next steps, whether thats a resit, further education, or a course change.')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="#">Home</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/result-day') }}">Exam Results</a></li>
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
						<b>Exam Results</b>
						<h2>Exam  <span>Results </span> Release  <span>Dates</span></h2>
						<p>Congratulations on your result day! Celebrate your achievements with us on Result Day! As soon as your exam results are published, we'll send you a congratulatory email along with an attached detailed result report. Your hard work deserves recognition, and we're excited to share in your success. Our commitment to providing a seamless and efficient experience means you can quickly access and review your results directly from your inbox.</p>
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
			      <th scope="col">EXAM BOARD</th>
			      <th scope="col">DATE</th>
			    </tr>
			  </thead>
			  <tbody>
			      @php
			        $allresult=DB::table('result_day')->where('is_deleted',0)->get();
			      @endphp
			      @foreach($allresult as $result)
			  	<tr>
			  	  <td scope="row">{{ $result->exam_series }}</td>
			  	  <td scope="row">{{ $result->exam_type }}</td>
			      <td scope="row">{{ $result->exam_board }}</td>
			      <td scope="row">{{ $result->date }}</td>
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