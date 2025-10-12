	
@extends('layouts.frontend')
@section('title', 'Exam Courses')
@section('content')
<style>

.course-detail-section .info-column .inner-column {
    margin-top: -220px !important;

}


.modal-content {

    border-radius: 20px;
}
</style>
<!-- Cource Detail Banner Section -->
    <section class="cource-detail-banner-section">
		<div class="pattern-layer-one" style="background-image: url(images/icons/icon-5.png)"></div>
		<div class="pattern-layer-two" style="background-image: url(images/icons/icon-6.png)"></div>
		<div class="pattern-layer-three" style="background-image: url(images/icons/icon-4.png)"></div>
		<div class="pattern-layer-four" style="background-image: url(images/icons/icon-8.png)"></div>
		<div class="auto-container">
			<!-- Page Breadcrumb -->
			<ul class="page-breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Courses</li>
			</ul>
			<div class="content-box">
				<!--<div class="title">5 day left at this price!</div>-->
				<h2>{{ $data->course_title }}</h2>
				<ul class="course-info">
					<li><span class="icon fa fa-clock-o"></span>Start Date : {{ $data->start_date }}</li>
					<li><span class="icon fa fa-language"></span>{{ $data->subject }}</li>
					<li><span class="icon fa fa-user"></span>{{ $data->class_size }} students</li>
				</ul>
				<!--<div class="development">Development courses</div>-->
				<!--<div class="rating">-->
				<!--	<span class="fa fa-star"></span>-->
				<!--	<span class="fa fa-star"></span>-->
				<!--	<span class="fa fa-star"></span>-->
				<!--	<span class="fa fa-star"></span>-->
				<!--	<span class="fa fa-star-o"></span>-->
				<!--	<strong>4.9</strong>-->
				<!--	<i>(70 Review)</i>-->
				<!--</div>-->
				<div class="hovers">{{ $data->duration }} . {{ $data->exam_type }} </div>
				
				<!-- Social Box -->
				<!--<ul class="social-box">-->
				<!--	<span class="fa fa-share-alt"></span>-->
				<!--	<li class="twitter"><a target="_blank" href="http://twitter.com/" class="fa fa-twitter"></a></li>-->
				<!--	<li class="pinterest"><a target="_blank" href="http://pinterest.com/" class="fa fa-pinterest-p"></a></li>-->
				<!--	<li class="facebook"><a target="_blank" href="http://facebook.com/" class="fa fa-facebook-f"></a></li>-->
				<!--	<li class="dribbble"><a target="_blank" href="http://dribbble.com/" class="fa fa-dribbble"></a></li>-->
				<!--</ul>-->
				
			</div>
		</div>
	</section>
	<!-- End Cource Detail Banner Section -->
	
	<!-- Course Detail Section -->
	<section class="course-detail-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="learn-box">
								<h5>Courses Description</h5>
							<ul class="learn-list">
							{!! $data->course_overview  !!}
							</ul>
						</div>
						<h5>Why Choose Us</h5>
						<ul class="learn-list-two">
						{{ $data->why_choose }}
						</ul>
						<!--<h5>Requirements</h5>-->
						<!--<ul class="learn-list-two">-->
						<!--{{ $data->requirements }}-->
						</ul>
						<h5>Course content</h5>
					
						
						<!-- Accordion Box Two -->
						<ul class="accordion-box-two">
						
						@foreach(json_decode($data->course_structure) as $key => $structure)
						<li class="accordion block">
							<div class="acc-btn">{{ $structure->weeks }} {{ $structure->description }}<span class="side-text"> </span></div>
							<!--<div class="acc-content">-->
							<!--	<div class="content">-->
							<!--		<ul class="accordion-list">-->
							<!--			<li><a href="#"><span class="list-icon fa fa-file-o"></span>{{ $structure->description }}</a></li>-->
									
							<!--		</ul>-->
							<!--	</div>-->
							<!--</div>-->
						</li>
						@endforeach
						
							
						</ul>
					
						
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-12 col-sm-12 mt-5">
					<div class="inner-column">
						<div class="price">£ {{ $data->fees }} <i>{{ $data->old_fees }}</i> </div>
						<h5>This course includes:</h5>
						<!--<div class="text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered </div>-->
						<ul class="level-list">
							<li>Start Date :<span>{{ $data->start_date }}</span></li>
							<li>End Date :<span>{{ $data->end_date }}</span></li>
							<li>Duration :<span>{{ $data->duration }}</span></li>
							<li>Class Size :<span>{{ $data->class_size }}</span></li>
						</ul>
						<h5>Other includes:</h5>
						<ul class="level-list-two">
							{{ $data->other_include }}
							
						</ul>
					
						<div class="btns-box">
							<a data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}" class="theme-btn enrol-btn">Enrol Now</a>

						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    
  


    
      <div class="modal-body">
        <p style="font-size: 21px;color:#08895d;font-weight: 400;">  Before proceeding with your purchase, please confirm that you wish to acquire this course. Please note that all purchase attempts are recorded for your security.</p>
        
        <br>
        <span style="color:red">To continue, you must log in.<a target="_blank" style="color:#1700ff;" href="{{ url('/login') }}">click here to login</a></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="{{url('course-purchase/'.$data->id)}}">Next Steps</a>
      </div>
    </div>
  </div>
</div>
@endsection
	<!-- End Course Detail Section -->