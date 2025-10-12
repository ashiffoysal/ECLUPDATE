	
@extends('layouts.frontend')
@section('title', 'Exam Courses')
@section('content')
        <!--================  End Header Section  ================-->
        <!-- Start Sub Menu -->
        <div class="sub_menu_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub_menu">
                            <ul>
                                <li><a href="{{ url('/courses') }}">Course</a></li>
                                <li><i class="fas fa-angle-right"></i></li>
                                <li><a href="{{ url('/courses') }}">Course Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sub Menu -->

        <!--================  Start (Blog Details) Section  ================-->
        <div class="blog_details_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog_details">
                            <!-- Start Blog Details Left -->
                            <div class="blog_details_left">
                            	<div class="blog_details_left_contents_main">
                            		<div class="bdlcm_img">
                            			<img src="{{ asset('/'.$data->thumbnail_image) }}" alt="">
                            			<a data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}"  class="btn_style"><span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/arrow-left.png" alt=""></span> Back</a>
                            		</div>
                        			<div class="blog_details_left_title course_overview_title">
                        				<ul>
		                            		
		                            		<li><a data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}" >{{ $data->exam_type }}</a></li>
		                            	</ul>
		                            	<h3>{!! $data->course_title!!}</h3>
		                            	
                        			</div>
                        			<div class="blog_details_left_contents">
                        				<p>{!! $data->course_overview  !!}</p>
                        				
                        			</div>
									<div class="blog_details_left_contents">
                        				<p>{{ $data->why_choose }}</p>
                        				
                        			</div>
									
                            	</div>
								<section class="important_deadlines_main">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="important_deadlines">
													<div class="important_deadlines_title">
														<h2>Important Deadlines</h2>
													</div>
													<div class="important_deadlines_contents">
														@foreach(json_decode($data->course_structure) as $key => $structure)
														<div class="a_lavel_exam_bodies_calender important_deadlines_single">
															<div class="a_lavel_exam_bodies_calender_img important_deadlines_single_img">
																<img src="{{ asset('frontend/updatedesign') }}/assets/images/ucas-application/calender.png" alt="">
																<div class="important_deadlines_single_date">
																	<p><b>{{ $structure->weeks }} </b></p>
																	{{-- <h3>05</h3>
																	<p>Tue</p> --}}
																</div>
															</div>
															<div class="a_lavel_exam_bodies_calender_contents important_deadlines_single_text">
																{{-- <h4>Mock Exam Submission Deadline</h4> --}}
																<p>{{ $structure->description }}</p>
															</div>
														</div>
														@endforeach
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
                            
                            </div>
                            <!-- End Blog Details Left -->

                            <!-- Start Blog Details Right -->
                            <div class="blog_details_right">
                            	<div class="blog_details_right_contents">
									<div class="blog_details_right_single ">
                            			<div class="blog_details_right_single_title"><p>Fees</p></div>
                            			<div class="blog_details_right_single_contents">
                            				<ul class="bdrs_tags">
                            					<li><a data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}" >£ {{ $data->fees }}</a></li>
                            				</ul>
                            			</div>
                            		</div>
                            		<div class="blog_details_right_single ">
                            			<div class="blog_details_right_single_contents">
                            				<ul class="bdrs_categories">
                            					<li>Start Date :<span>{{ $data->start_date }}</span></li>
												<li>End Date :<span>{{ $data->end_date }}</span></li>
												<li>Duration :<span>{{ $data->duration }}</span></li>
												<li>Class Size :<span>{{ $data->class_size }}</span></li>
                            				</ul>
                            			</div>
                            		</div>
									<div class="blog_details_right_single blog_details_right_single_mt">
                            			<div class="blog_details_right_single_title"><p>Other includes:</p></div>
                            			<div class="blog_details_right_single_contents">
                            				<ul class="bdrs_tags">
                            					<li><a data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}" >{{ $data->other_include }}</a></li>
                            					
                            				</ul>
                            			</div>
										
                            		</div>
									<div class="blog_details_right_single blog_details_right_single_mt">
                            			
                            			<div class="blog_details_right_single_contents">
											<button class="btn_style" data-toggle="modal" data-target="#exampleModalCenter" href="{{url('course-purchase/'.$data->id)}}" >Purchase <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                            			</div>
										
                            		</div>
                            	</div>
								
                            </div>
                            <!-- End Blog Details Right -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================  End (Blog Details) Section  ================-->


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