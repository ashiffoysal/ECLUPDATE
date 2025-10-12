@extends('layouts.frontend')
@section('title', 'GCSE & A-Level Intensive Courses | Exam Centre London – Expert Tuition & Exam Preparation')
@section('meta_description', 'Enroll in Exam Centre Londons intensive GCSE and A-Level courses to enhance your academic performance. Our expert-led programs in Maths, English, Science, and more are designed for private candidates seeking personalized tuition and comprehensive exam preparation.')
@section('content')
<div class="sub_menu_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sub_menu">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><i class="fas fa-angle-right"></i></li>
						<li><a href="{{ url('/courses') }}">All Courses</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="explore_courses_main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="explore_courses">
					<div class="section_title high_standard_title content_structure_title">
						<h2>You can learn anything, <span>Explore All courses</span></h2>
						{{-- <p>The entire A-level Mathematics syllabus is covered thoroughly, ensuring you are well-prepared for the exams. Learn from experienced, specialized mathematics teachers who are dedicated to your success.</p> --}}
					</div>
					<div class="explore_courses_contents">
						@foreach($allCourse as $course)
						<div class="explore_courses_single">
							<img src="{{ asset('/'.$course->thumbnail_image) }}" alt="">
							<p>{{ $course->course_title }}</p>
							<h4>£{{ $course->fees }}</h4>
							<strike>
								£{{ $course->old_fees }}
							</strike>
							<ul>
								<li>{{ $course->duration }}</li>
								<li><span>|</span></li>
								<li>{{ $course->exam_type }}</li>
							</ul>
							<a href="{{ url('/courses/details/'.$course->slug.'/'.$course->id) }}" class="btn_style">Read More <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></a>
							<div class="explore_courses_discount">
								<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-courses/discount.png" alt="">
								{{-- <p>15% OFF</p> --}}
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection