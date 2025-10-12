@extends('layouts.backend')
@section('title', 'Supports Create')
@section('content')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('frontend') }}/datepicker/mc-calendar.min.css" />
<script src="{{ asset('frontend') }}/datepicker/mc-calendar.min.js"></script>
<script>
     const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
    });
</script>
<style>
    tbody {
    font-size: 12px !important;
}

.form-control.form-control-solid {
    background-color: #ffffff;
    border-color: #afafaf;
    color: #5e6278;
    transition: color .2s ease,background-color .2s ease;
    margin: 1px -5px;
    border-radius: 10px;
}

.form-select.form-select-solid{
    background-color: #ffffff;
    border-color: #272828!important;
    color: #5e6278;
    transition: color .2s ease,background-color .2s ease;
    border-radius: 7px;
}
div#kt_post {
    background: #fff;
}

</style>

<div class="modal fade" id="PhotoIDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Topics</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Search</label>
            <input type="search" class="form-control mydesign" id="searchField" aria-describedby="searchHelp" placeholder="Search...">
          </div>
      </div>
      <div class="modal-footer" id="searchResults">
        
     
      </div>
	  </div>
	</div>
</div>

<!-- candidate -->



	               <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Create Supports</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->

									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="index.html" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Candidate</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Supports</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-1">
									<!--begin::Wrapper-->
									
									<!--end::Wrapper-->
									<!--begin::Button-->
									<a href="{{url('/admin/exam/allbooking')}}" class="btn btn-sm btn-primary">Back</a>
									<!--end::Button-->
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-xl-row">
							
								
								<div class="container" style="padding:30px 0px">
									
                       
                                 <a href="{{url('admin/supports/index')}}" class="badge badge-primary">All Supports</a>
                                 <a href="{{url('admin/supports/draft-index')}}" class="badge badge-danger">All Drafts</a>
                                 <a target="_blank" href="{{url('admin/exam-all-topic/index')}}" class="badge badge-danger">All Topics</a>
                                  <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#PhotoIDModal">
									View Topics</a>
                    				    
										</div>
										<script
										        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
										        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
										        crossorigin="anonymous">
										</script>
										<script
										        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
										        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
										        crossorigin="anonymous">
										</script>
										<script
										        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
										        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
										        crossorigin="anonymous">
										</script>


									<!--end::Content-->
								</div>
								
								 <div class="card">
                <form action="{{ url('admin/supports/create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- radio ends -->
                    <div class="row">
                        <div class="col-md-10 col-xl-10">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                         <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Name:<span class="required"></span></label>
                                            <div class="col-md-9 ">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="name" placeholder="Enter Candidate Name" value="{{ old('name') }}" required>
                                                    
                                                </div>
                                                @error('subject_name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Email Sent ?:<span class="required"></span></label>
                                            <div class="col-md-9 row">
                                                <div class="col-md-2">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="email_sent" id="flexRadioDefault1" value="yes" checked>
                                                      <label class="form-check-label" for="flexRadioDefault1">
                                                        Yes
                                                      </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="email_sent" id="flexRadioDefault2" value="no">
                                                      <label class="form-check-label" for="flexRadioDefault2">
                                                        No
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Email:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="email" name="email" placeholder="Enter Candidate Email" value="{{ old('email') }}" required>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Phone:<span class="required"></span></label>
                                            <div class="col-md-9 ">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="phone" placeholder="Enter Candidate Phone" value="{{ old('phone') }}" required>
                                                </div>
                                              
                                            </div>
                                        </div>
                                          <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Contact Type:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <select name="contact_type" class="form-select form-select-solid" >
                                                       <option value="Phone">Phone</option>
                                                       <option value="Email">Email</option>
                                                   </select>
                                                </div>
                                                @error('exam_type')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Supports Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                  
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="Exams" id="examsBox" type="checkbox" value="exams">
                                                        <label class="form-check-label ms-3" for="">Exams</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="special_access" id="specialAccess" type="checkbox" value="special_access" onchacked="SpecialAccess()">
                                                        <label class="form-check-label ms-3" for="">Special Access</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="tuition" type="checkbox" id="tuitionAccess" value="1" onchacked="courseAccess()">
                                                        <label class="form-check-label ms-3" for="">Tuition</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="ucas" type="checkbox" id="UcasAccess" value="1" >
                                                        <label class="form-check-label ms-3" for="">Ucas Application</label>
                                                    </div><br>
                                                    
                                                      <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="mock" type="checkbox" id="mockAccess" value="1" >
                                                        <label class="form-check-label ms-3" for="">Mock Exam</label>
                                                    </div><br>
                                    
                                                    
                                                      <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="course" type="checkbox" id="courseAccess" value="1" onchacked="courseAccess()">
                                                        <label class="form-check-label ms-3" for="">Course</label>
                                                    </div><br>
                                                 <div class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" name="coupon" type="checkbox" id="coupon" value="1" onchange="couponNew(this)">
                                                    <label class="form-check-label ms-3" for="coupon">Coupon</label>
                                                </div>
                                                    <!--begin::Checkbox-->
                                                  
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        </div>
                                        <div class="row mb-10" id="tuition_section" style="display: none">
                                            
                                            <label class="col-lg-3 col-form-label text-lg-end">Tuition Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                       <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="fsc" name="fscorse" type="checkbox" value="1">
                                                        <label class="form-check-label ms-3" for="fsc">Functional Skills Tuition</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="grouptution" name="grouptuition" type="checkbox" value="1">
                                                        <label class="form-check-label ms-3" for="grouptution">GCSE Tuition</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="aleveltuition" name="inperson" type="checkbox" value="1" onchange="alveltuition(this)">
                                                        <label class="form-check-label ms-3" for="aleveltuition">A Level Tuition</label>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-10" id="courseAccess_Section" style="display: none">
                                            <label class="col-lg-3 col-form-label text-lg-end">Course Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                   
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="" name="asifalevelcourse" type="checkbox" value="1" onchange="asifalevel(this)">
                                                        <label class="form-check-label ms-3" for="">A Level Courses</label>
                                                    </div>
                                                    <br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="gc" name="gcsecourse" type="checkbox" value="1">
                                                        <label class="form-check-label ms-3" for="gc">GCSE Courses For November Series</label>
                                                    </div><br>
                                                    
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="gcj" name="gcsecoursejune" type="checkbox" value="1">
                                                        <label class="form-check-label ms-3" for="gcj">GCSE Courses For June Series</label>
                                                    </div><br>
                                                </div>
                                       
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row mb-10" id="hiddenSection" style="display: none">
                                            <label class="col-lg-3 col-form-label text-lg-end">Special Access Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Anxiety" name="special_access_name[]" type="checkbox" value="Anxiety">
                                                        <label class="form-check-label ms-3" for="Anxiety">Anxiety</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Extra_Time_25" name="special_access_name[]" type="checkbox" value="Extra Time 25%">
                                                        <label class="form-check-label ms-3" for="Extra_Time_25">Extra Time 25%</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Extra_Time_50" name="special_access_name[]" type="checkbox" value="Extra Time 50%">
                                                        <label class="form-check-label ms-3" for="Extra_Time_50">Extra Time 50%</label>
                                                    </div><br>

                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Practical_Assistant" name="special_access_name[]" type="checkbox" value="Practical Assistant">
                                                        <label class="form-check-label ms-3" for="Practical_Assistant">Practical Assistant</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Laptop" name="special_access_name[]" type="checkbox" value="Laptop">
                                                        <label class="form-check-label ms-3" for="Laptop">Laptop</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="OwnRoom" name="special_access_name[]" type="checkbox" value="Own Room">
                                                        <label class="form-check-label ms-3" for="OwnRoom">Own Room</label>
                                                    </div><br>

                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Home_Invigilation" name="special_access_name[]" type="checkbox" value="Home Invigilation">
                                                        <label class="form-check-label ms-3" for="Home_Invigilation">Home Invigilation</label>
                                                    </div><br>
                                                  
                                                    
                                                    
                                                   
                                                    <!--begin::Checkbox-->
                                                  
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            
                                        </div>
                                          
                                          
                                        <div class="row mb-10" id="examsBox_series" style="display: none">
                                            <label class="col-md-3 col-form-label text-lg-end">Exam Series:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                    @php
                                                        $allseries=DB::table('examessuedates')->where('is_deleted',0)->where('is_active',1)->select(['id','exam_name'])->get();
                                                    @endphp
                                                    
                                           
                                                         <select class="form-select form-select-solid" name="series" id="series_main" onchange="SerisDate(this)">
                                                               <option selected disabled>Select</option>
                                                               
                                                             @foreach($allseries as $series)
                                                                <option value="{{ $series->exam_name }}">{{ $series->exam_name }}</option>
                                                            @endforeach
                                                              <!--<option value="None">None</option>-->
                                                              <option value="AAT">AAT</option>
                                                                <option value="Functional Skills">FUNCTIONAL SKILLS</option>
                                                                <option value="ACCA">ACCA</option>
                                                        </select>
                                                   
                                                  
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <div class="row" id="">
                                                <label class="col-md-3 col-form-label text-lg-end">Subject Details:<span class="required"></span></label>
                                                <div class="col-md-2">
                                                    <label class="col-form-label text-lg-end">Exam Type:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_type_change(this)" name="exam_type[]" id="exam_type_0" class="form-select form-select-solid" >
                                                        <option value="">Select</option>
                                                        <option value="GCSE">GCSE</option>
                                                        <option value="A Level" >A Level</option>
                                                        <option value="AS Level">AS Level</option>
                                                        <option value="IGCSE" >IGCSE</option>
                                                        <option value="AAT">AAT</option>
                                                        <option value="Functional Skills">FUNCTIONAL SKILLS</option>
                                                        <option value="ACCA">ACCA</option>
                                                    </select>
                                                        
                                                    </div>
                                                    @error('exam_type')
                                                    <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-form-label text-lg-end">Exam Board:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_board_change(this)" name="exam_board[]"  id="exam_board_0" class="form-select form-select-solid" >
                                                        <option value="">Select</option>
                                                     
                                                
                                                    </select>
                                                    </div>
                                                    @error('exam_board')
                                                    <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-lg-end">Subject:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_subject_change(this)" name="subject[]" id="exam_subject_0" class="form-select form-select-solid" >
                                                        <option value="">Select</option>
                                                   
                                                    </select>
                                                    </div>
                                                    @error('exam_type')
                                                    <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            
                                                <div class="col-md-2">
                                                    <label class=" col-form-label text-lg-end">Fees:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                        <input class="form-control form-control-solid" type="test" name="fees[]" id="fees_0">
                                                    </div>
                                                    @error('exam_type')
                                                    <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" id="add_more_subject_row">



                                            </div>

                                            <div class="row" id="add_more_subject_row">

                                                <div class="col-md-11 text-end">
                                                    <button type="button" class="btn-sm btn-danger" onclick="addmore()" style="color:#fff !important">Add More</button>
                                                </div>

                                            </div>

                                            
                                        </div>
                                      
                                        <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Notes:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                  <textarea class="form-control form-control-solid" id="summernote" name="notes" rows="40" cols="50" required>
                                                       <p>                                                       Dear 
                                                        <br>I hope this email finds you well. Following our recent phone conversation, I am pleased to provide a detailed breakdown of the information you requested.
                                                        </p><p id="booking_procedure"></p><spna id="exam_series_info"></spna><p id="Anxiety_topic"></p> <p id="Extra_Time_25_topic"></p> <p id="Extra_Time_50_topic"></p><p id="Practical_Assistant_topic"></p> <p id="Laptop_topic"></p> <p id="OwnRoom_topic"></p> <p id="Home_Invigilation_topic"></p>
                                                       <p id="Ucas_topic"><br></p> <p id="alevel_tutions"></p><br><p id="gcse_tuition"></p><p id="tution_topic"></p> <p id="alevel_course_topic"></p><br><p id="mock_exam_topic"></p><p id="gcse_course_topic"></p><p id="gcse_course_topic_june"></p><p id="coupon_discount"></p><br><br><p>If you have any questions or need assistance, you can reach our support team at 0208 616 2526 or notify us by selecting the support section from your portal.</p><p>kind regards,<br>Exam Centre London<br>www.examcentrelondon.co.uk<br>info@examcentrelondon.co.uk<br> 0208 616 2526</p>
                                                  </textarea>
                                                   
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        </div>
                                      
                                       
                                       
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer py-6">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-1">
                                        <button type="submit" name="action" value="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <div class="col-lg-1">
                                        <button type="submit" type="submit" name="action" value="draft" id="kt_layout_builder_preview" class="btn btn-danger me-2">
                                            <span class="indicator-label">Save Draft</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xl-5">
                            <div class="card-body" data-select2-id="select2-data-90-elj6">
                                <!-- image -->
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z" id="image_upload_sec">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                 
                                       
                                    </div>
                                </div>
                                  <!-- image end-->
                            </div>
                        </div>
                        <div class="col-md-7 col-xl-">

                        </div>
                    </div>
                </form>
            </div>
								<!--end::Layout-->
								<!--begin::Modals-->
								<!--begin::Modal - Add Payment-->
								<div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder">Add a Payment Record</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<!--begin::Form-->
												<form id="kt_modal_add_payment_form" class="form" action="#">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Invoice Number</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="The invoice number must be unique."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="invoice" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Status</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select class="form-select form-select-solid fw-bolder" name="status" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
															<option></option>
															<option value="0">Approved</option>
															<option value="1">Pending</option>
															<option value="2">Rejected</option>
															<option value="3">In progress</option>
															<option value="4">Completed</option>
														</select>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Invoice Amount</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="amount" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-15">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Additional Information</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Information such as description of invoice or product purchased."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center">
														<button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-white me-3">Discard</button>
														<button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
													</div>
													<!--end::Actions-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - New Card-->
								<!--begin::Modal - Adjust Balance-->
								<div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder">Adjust Balance</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<!--begin::Balance preview-->
												<div class="d-flex text-center mb-9">
													<div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
														<div class="fs-6 fw-bold mb-2 text-gray-400">Current Balance</div>
														<div class="fs-2 fw-bolder" kt-modal-adjust-balance="current_balance">US$ 32,487.57</div>
													</div>
													<div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
														<div class="fs-6 fw-bold mb-2 text-gray-400">New Balance
														<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter an amount to preview the new balance."></i></div>
														<div class="fs-2 fw-bolder" kt-modal-adjust-balance="new_balance">--</div>
													</div>
												</div>
												<!--end::Balance preview-->
												<!--begin::Form-->
												<form id="kt_modal_adjust_balance_form" class="form" action="#">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Adjustment type</label>
														<!--end::Label-->
														<!--begin::Dropdown-->
														<select class="form-select form-select-solid fw-bolder" name="adjustment" aria-label="Select an option" data-control="select2" data-dropdown-parent="#kt_modal_adjust_balance" data-placeholder="Select an option" data-hide-search="true">
															<option></option>
															<option value="1">Credit</option>
															<option value="2">Debit</option>
														</select>
														<!--end::Dropdown-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Amount</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input id="kt_modal_inputmask" type="text" class="form-control form-control-solid" name="amount" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">Add adjustment note</label>
														<!--end::Label-->
														<!--begin::Input-->
														<textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Disclaimer-->
													<div class="fs-7 text-gray-400 mb-15">Please be aware that all manual balance changes will be audited by the financial team every fortnight. Please maintain your invoices and receipts until then. Thank you.</div>
													<!--end::Disclaimer-->
													<!--begin::Actions-->
													<div class="text-center">
														<button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-white me-3">Discard</button>
														<button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
													</div>
													<!--end::Actions-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - New Card-->
								<!--begin::Modal - New Address-->
								<div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Form-->
											<form class="form" action="#" id="kt_modal_update_customer_form">
												<!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_update_customer_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Update Customer</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div id="kt_modal_update_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																	<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																	<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
																</g>
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--end::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body py-10 px-lg-17">
													<!--begin::Scroll-->
													<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header" data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">
														<!--begin::Notice-->
														<!--begin::Notice-->
														<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
															<!--begin::Icon-->
															<!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
															<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--end::Icon-->
															<!--begin::Wrapper-->
															<div class="d-flex flex-stack flex-grow-1">
																<!--begin::Content-->
																<div class="fw-bold">
																	<div class="fs-6 text-gray-600">Updating customer details will receive a privacy audit. For more info, please read our
																	<a href="#">Privacy Policy</a></div>
																</div>
																<!--end::Content-->
															</div>
															<!--end::Wrapper-->
														</div>
														<!--end::Notice-->
														<!--end::Notice-->
														<!--begin::User toggle-->
														<div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_user_info">User Information
														<span class="ms-2 rotate-180">
															<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span></div>
														<!--end::User toggle-->
														<!--begin::User form-->
														<div id="kt_modal_update_customer_user_info" class="collapse show">
															<!--begin::Input group-->
															<div class="mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span>Update Avatar</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
																</label>
																<!--end::Label-->
																<!--begin::Image input wrapper-->
																<div class="mt-1">
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('backend')}}/assets/media/avatars/blank.png)">
																		<!--begin::Preview existing avatar-->
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('backend')}}/assets/media/avatars/150-2.jpg)"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Edit-->
																		<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																			<i class="bi bi-pencil-fill fs-7"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																			<input type="hidden" name="avatar_remove" />
																			<!--end::Inputs-->
																		</label>
																		<!--end::Edit-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
																		<!--end::Remove-->
																	</div>
																	<!--end::Image input-->
																</div>
																<!--end::Image input wrapper-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" placeholder="" name="name" value="Sean Bean" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span>Email</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" placeholder="" name="email" value="sean@dellito.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-15">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">Description</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" placeholder="" name="description" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::User form-->
														<!--begin::Billing toggle-->
														<div class="fw-bolder fs-3 rotate collapsible collapsed mb-7" data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_customer_billing_info">Shipping Information
														<span class="ms-2 rotate-180">
															<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->
														</span></div>
														<!--end::Billing toggle-->
														<!--begin::Billing form-->
														<div id="kt_modal_update_customer_billing_info" class="collapse">
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">Address Line 1</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input class="form-control form-control-solid" placeholder="" name="address1" value="101, Collins Street" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">Address Line 2</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input class="form-control form-control-solid" placeholder="" name="address2" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">Town</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input class="form-control form-control-solid" placeholder="" name="city" value="Melbourne" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="row g-9 mb-7">
																<!--begin::Col-->
																<div class="col-md-6 fv-row">
																	<!--begin::Label-->
																	<label class="fs-6 fw-bold mb-2">State / Province</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input class="form-control form-control-solid" placeholder="" name="state" value="Victoria" />
																	<!--end::Input-->
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-md-6 fv-row">
																	<!--begin::Label-->
																	<label class="fs-6 fw-bold mb-2">Post Code</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input class="form-control form-control-solid" placeholder="" name="postcode" value="3000" />
																	<!--end::Input-->
																</div>
																<!--end::Col-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="d-flex flex-column mb-7 fv-row">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span>Country</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select name="country" aria-label="Select a Country" data-control="select2" data-placeholder="Select a Country..." data-dropdown-parent="#kt_modal_update_customer" class="form-select form-select-solid fw-bolder">
																	<option value="">Select a Country...</option>
																	<option value="AF">Afghanistan</option>
																	<option value="AX">Aland Islands</option>
																	<option value="AL">Albania</option>
																	<option value="DZ">Algeria</option>
																	<option value="AS">American Samoa</option>
																	<option value="AD">Andorra</option>
																	<option value="AO">Angola</option>
																	<option value="AI">Anguilla</option>
																	<option value="AQ">Antarctica</option>
																	<option value="AG">Antigua and Barbuda</option>
																	<option value="AR">Argentina</option>
																	<option value="AM">Armenia</option>
																	<option value="AW">Aruba</option>
																	<option value="AU">Australia</option>
																	<option value="AT">Austria</option>
																	<option value="AZ">Azerbaijan</option>
																	<option value="BS">Bahamas</option>
																	<option value="BH">Bahrain</option>
																	<option value="BD">Bangladesh</option>
																	<option value="BB">Barbados</option>
																	<option value="BY">Belarus</option>
																	<option value="BE">Belgium</option>
																	<option value="BZ">Belize</option>
																	<option value="BJ">Benin</option>
																	<option value="BM">Bermuda</option>
																	<option value="BT">Bhutan</option>
																	<option value="BO">Bolivia, Plurinational State of</option>
																	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
																	<option value="BA">Bosnia and Herzegovina</option>
																	<option value="BW">Botswana</option>
																	<option value="BV">Bouvet Island</option>
																	<option value="BR">Brazil</option>
																	<option value="IO">British Indian Ocean Territory</option>
																	<option value="BN">Brunei Darussalam</option>
																	<option value="BG">Bulgaria</option>
																	<option value="BF">Burkina Faso</option>
																	<option value="BI">Burundi</option>
																	<option value="KH">Cambodia</option>
																	<option value="CM">Cameroon</option>
																	<option value="CA">Canada</option>
																	<option value="CV">Cape Verde</option>
																	<option value="KY">Cayman Islands</option>
																	<option value="CF">Central African Republic</option>
																	<option value="TD">Chad</option>
																	<option value="CL">Chile</option>
																	<option value="CN">China</option>
																	<option value="CX">Christmas Island</option>
																	<option value="CC">Cocos (Keeling) Islands</option>
																	<option value="CO">Colombia</option>
																	<option value="KM">Comoros</option>
																	<option value="CG">Congo</option>
																	<option value="CD">Congo, the Democratic Republic of the</option>
																	<option value="CK">Cook Islands</option>
																	<option value="CR">Costa Rica</option>
																	<option value="CI">Côte d'Ivoire</option>
																	<option value="HR">Croatia</option>
																	<option value="CU">Cuba</option>
																	<option value="CW">Curaçao</option>
																	<option value="CY">Cyprus</option>
																	<option value="CZ">Czech Republic</option>
																	<option value="DK">Denmark</option>
																	<option value="DJ">Djibouti</option>
																	<option value="DM">Dominica</option>
																	<option value="DO">Dominican Republic</option>
																	<option value="EC">Ecuador</option>
																	<option value="EG">Egypt</option>
																	<option value="SV">El Salvador</option>
																	<option value="GQ">Equatorial Guinea</option>
																	<option value="ER">Eritrea</option>
																	<option value="EE">Estonia</option>
																	<option value="ET">Ethiopia</option>
																	<option value="FK">Falkland Islands (Malvinas)</option>
																	<option value="FO">Faroe Islands</option>
																	<option value="FJ">Fiji</option>
																	<option value="FI">Finland</option>
																	<option value="FR">France</option>
																	<option value="GF">French Guiana</option>
																	<option value="PF">French Polynesia</option>
																	<option value="TF">French Southern Territories</option>
																	<option value="GA">Gabon</option>
																	<option value="GM">Gambia</option>
																	<option value="GE">Georgia</option>
																	<option value="DE">Germany</option>
																	<option value="GH">Ghana</option>
																	<option value="GI">Gibraltar</option>
																	<option value="GR">Greece</option>
																	<option value="GL">Greenland</option>
																	<option value="GD">Grenada</option>
																	<option value="GP">Guadeloupe</option>
																	<option value="GU">Guam</option>
																	<option value="GT">Guatemala</option>
																	<option value="GG">Guernsey</option>
																	<option value="GN">Guinea</option>
																	<option value="GW">Guinea-Bissau</option>
																	<option value="GY">Guyana</option>
																	<option value="HT">Haiti</option>
																	<option value="HM">Heard Island and McDonald Islands</option>
																	<option value="VA">Holy See (Vatican City State)</option>
																	<option value="HN">Honduras</option>
																	<option value="HK">Hong Kong</option>
																	<option value="HU">Hungary</option>
																	<option value="IS">Iceland</option>
																	<option value="IN">India</option>
																	<option value="ID">Indonesia</option>
																	<option value="IR">Iran, Islamic Republic of</option>
																	<option value="IQ">Iraq</option>
																	<option value="IE">Ireland</option>
																	<option value="IM">Isle of Man</option>
																	<option value="IL">Israel</option>
																	<option value="IT">Italy</option>
																	<option value="JM">Jamaica</option>
																	<option value="JP">Japan</option>
																	<option value="JE">Jersey</option>
																	<option value="JO">Jordan</option>
																	<option value="KZ">Kazakhstan</option>
																	<option value="KE">Kenya</option>
																	<option value="KI">Kiribati</option>
																	<option value="KP">Korea, Democratic People's Republic of</option>
																	<option value="KW">Kuwait</option>
																	<option value="KG">Kyrgyzstan</option>
																	<option value="LA">Lao People's Democratic Republic</option>
																	<option value="LV">Latvia</option>
																	<option value="LB">Lebanon</option>
																	<option value="LS">Lesotho</option>
																	<option value="LR">Liberia</option>
																	<option value="LY">Libya</option>
																	<option value="LI">Liechtenstein</option>
																	<option value="LT">Lithuania</option>
																	<option value="LU">Luxembourg</option>
																	<option value="MO">Macao</option>
																	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
																	<option value="MG">Madagascar</option>
																	<option value="MW">Malawi</option>
																	<option value="MY">Malaysia</option>
																	<option value="MV">Maldives</option>
																	<option value="ML">Mali</option>
																	<option value="MT">Malta</option>
																	<option value="MH">Marshall Islands</option>
																	<option value="MQ">Martinique</option>
																	<option value="MR">Mauritania</option>
																	<option value="MU">Mauritius</option>
																	<option value="YT">Mayotte</option>
																	<option value="MX">Mexico</option>
																	<option value="FM">Micronesia, Federated States of</option>
																	<option value="MD">Moldova, Republic of</option>
																	<option value="MC">Monaco</option>
																	<option value="MN">Mongolia</option>
																	<option value="ME">Montenegro</option>
																	<option value="MS">Montserrat</option>
																	<option value="MA">Morocco</option>
																	<option value="MZ">Mozambique</option>
																	<option value="MM">Myanmar</option>
																	<option value="NA">Namibia</option>
																	<option value="NR">Nauru</option>
																	<option value="NP">Nepal</option>
																	<option value="NL">Netherlands</option>
																	<option value="NC">New Caledonia</option>
																	<option value="NZ">New Zealand</option>
																	<option value="NI">Nicaragua</option>
																	<option value="NE">Niger</option>
																	<option value="NG">Nigeria</option>
																	<option value="NU">Niue</option>
																	<option value="NF">Norfolk Island</option>
																	<option value="MP">Northern Mariana Islands</option>
																	<option value="NO">Norway</option>
																	<option value="OM">Oman</option>
																	<option value="PK">Pakistan</option>
																	<option value="PW">Palau</option>
																	<option value="PS">Palestinian Territory, Occupied</option>
																	<option value="PA">Panama</option>
																	<option value="PG">Papua New Guinea</option>
																	<option value="PY">Paraguay</option>
																	<option value="PE">Peru</option>
																	<option value="PH">Philippines</option>
																	<option value="PN">Pitcairn</option>
																	<option value="PL">Poland</option>
																	<option value="PT">Portugal</option>
																	<option value="PR">Puerto Rico</option>
																	<option value="QA">Qatar</option>
																	<option value="RE">Réunion</option>
																	<option value="RO">Romania</option>
																	<option value="RU">Russian Federation</option>
																	<option value="RW">Rwanda</option>
																	<option value="BL">Saint Barthélemy</option>
																	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
																	<option value="KN">Saint Kitts and Nevis</option>
																	<option value="LC">Saint Lucia</option>
																	<option value="MF">Saint Martin (French part)</option>
																	<option value="PM">Saint Pierre and Miquelon</option>
																	<option value="VC">Saint Vincent and the Grenadines</option>
																	<option value="WS">Samoa</option>
																	<option value="SM">San Marino</option>
																	<option value="ST">Sao Tome and Principe</option>
																	<option value="SA">Saudi Arabia</option>
																	<option value="SN">Senegal</option>
																	<option value="RS">Serbia</option>
																	<option value="SC">Seychelles</option>
																	<option value="SL">Sierra Leone</option>
																	<option value="SG">Singapore</option>
																	<option value="SX">Sint Maarten (Dutch part)</option>
																	<option value="SK">Slovakia</option>
																	<option value="SI">Slovenia</option>
																	<option value="SB">Solomon Islands</option>
																	<option value="SO">Somalia</option>
																	<option value="ZA">South Africa</option>
																	<option value="GS">South Georgia and the South Sandwich Islands</option>
																	<option value="KR">South Korea</option>
																	<option value="SS">South Sudan</option>
																	<option value="ES">Spain</option>
																	<option value="LK">Sri Lanka</option>
																	<option value="SD">Sudan</option>
																	<option value="SR">Suriname</option>
																	<option value="SJ">Svalbard and Jan Mayen</option>
																	<option value="SZ">Swaziland</option>
																	<option value="SE">Sweden</option>
																	<option value="CH">Switzerland</option>
																	<option value="SY">Syrian Arab Republic</option>
																	<option value="TW">Taiwan, Province of China</option>
																	<option value="TJ">Tajikistan</option>
																	<option value="TZ">Tanzania, United Republic of</option>
																	<option value="TH">Thailand</option>
																	<option value="TL">Timor-Leste</option>
																	<option value="TG">Togo</option>
																	<option value="TK">Tokelau</option>
																	<option value="TO">Tonga</option>
																	<option value="TT">Trinidad and Tobago</option>
																	<option value="TN">Tunisia</option>
																	<option value="TR">Turkey</option>
																	<option value="TM">Turkmenistan</option>
																	<option value="TC">Turks and Caicos Islands</option>
																	<option value="TV">Tuvalu</option>
																	<option value="UG">Uganda</option>
																	<option value="UA">Ukraine</option>
																	<option value="AE">United Arab Emirates</option>
																	<option value="GB">United Kingdom</option>
																	<option value="US">United States</option>
																	<option value="UY">Uruguay</option>
																	<option value="UZ">Uzbekistan</option>
																	<option value="VU">Vanuatu</option>
																	<option value="VE">Venezuela, Bolivarian Republic of</option>
																	<option value="VN">Vietnam</option>
																	<option value="VI">Virgin Islands</option>
																	<option value="WF">Wallis and Futuna</option>
																	<option value="EH">Western Sahara</option>
																	<option value="YE">Yemen</option>
																	<option value="ZM">Zambia</option>
																	<option value="ZW">Zimbabwe</option>
																</select>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Wrapper-->
																<div class="d-flex flex-stack">
																	<!--begin::Label-->
																	<div class="me-5">
																		<!--begin::Label-->
																		<label class="fs-6 fw-bold">Use as a billing adderess?</label>
																		<!--end::Label-->
																		<!--begin::Input-->
																		<div class="fs-7 fw-bold text-gray-400">If you need more info, please check budget planning</div>
																		<!--end::Input-->
																	</div>
																	<!--end::Label-->
																	<!--begin::Switch-->
																	<label class="form-check form-switch form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_update_customer_billing" checked="checked" />
																		<!--end::Input-->
																		<!--begin::Label-->
																		<span class="form-check-label fw-bold text-gray-400" for="kt_modal_update_customer_billing">Yes</span>
																		<!--end::Label-->
																	</label>
																	<!--end::Switch-->
																</div>
																<!--begin::Wrapper-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Billing form-->
													</div>
													<!--end::Scroll-->
												</div>
												<!--end::Modal body-->
												<!--begin::Modal footer-->
												<div class="modal-footer flex-center">
													<!--begin::Button-->
													<button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-white me-3">Discard</button>
													<!--end::Button-->
													<!--begin::Button-->
													<button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
													<!--end::Button-->
												</div>
												<!--end::Modal footer-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								<!--end::Modal - New Address-->
								<!--begin::Modal - New Card-->
								<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2>Add New Card</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<!--begin::Form-->
												<form id="kt_modal_new_card_form" class="form" action="#">
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-7 fv-row">
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
															<span class="required">Name On Card</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
														</label>
														<!--end::Label-->
														<input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-7 fv-row">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
														<!--end::Label-->
														<!--begin::Input wrapper-->
														<div class="position-relative">
															<!--begin::Input-->
															<input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
															<!--end::Input-->
															<!--begin::Card logos-->
															<div class="position-absolute translate-middle-y top-50 end-0 me-5">
																<img src="{{asset('backend')}}/assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
																<img src="{{asset('backend')}}/assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
																<img src="{{asset('backend')}}/assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
															</div>
															<!--end::Card logos-->
														</div>
														<!--end::Input wrapper-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-10">
														<!--begin::Col-->
														<div class="col-md-8 fv-row">
															<!--begin::Label-->
															<label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
															<!--end::Label-->
															<!--begin::Row-->
															<div class="row fv-row">
																<!--begin::Col-->
																<div class="col-6">
																	<select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
																		<option></option>
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																		<option value="7">7</option>
																		<option value="8">8</option>
																		<option value="9">9</option>
																		<option value="10">10</option>
																		<option value="11">11</option>
																		<option value="12">12</option>
																	</select>
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="col-6">
																	<select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
																		<option></option>
																		<option value="2021">2021</option>
																		<option value="2022">2022</option>
																		<option value="2023">2023</option>
																		<option value="2024">2024</option>
																		<option value="2025">2025</option>
																		<option value="2026">2026</option>
																		<option value="2027">2027</option>
																		<option value="2028">2028</option>
																		<option value="2029">2029</option>
																		<option value="2030">2030</option>
																		<option value="2031">2031</option>
																	</select>
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-4 fv-row">
															<!--begin::Label-->
															<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
																<span class="required">CVV</span>
																<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
															</label>
															<!--end::Label-->
															<!--begin::Input wrapper-->
															<div class="position-relative">
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
																<!--end::Input-->
																<!--begin::CVV icon-->
																<div class="position-absolute translate-middle-y top-50 end-0 me-3">
																	<!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
																	<span class="svg-icon svg-icon-2hx">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
																				<rect fill="#000000" x="2" y="8" width="20" height="3" />
																				<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																</div>
																<!--end::CVV icon-->
															</div>
															<!--end::Input wrapper-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-stack">
														<!--begin::Label-->
														<div class="me-5">
															<label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
															<div class="fs-7 fw-bold text-gray-400">If you need more info, please check budget planning</div>
														</div>
														<!--end::Label-->
														<!--begin::Switch-->
														<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="1" checked="checked" />
															<span class="form-check-label fw-bold text-gray-400">Save Card</span>
														</label>
														<!--end::Switch-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3">Discard</button>
														<button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
													</div>
													<!--end::Actions-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								<!--end::Modal - New Card-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
					
					</div>
	<div id="kt_activities" class="bg-white" data-kt-drawer="true" data-kt-drawer-name="activities" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
			<div class="card shadow-none">
				<!--begin::Header-->
				<div class="card-header" id="kt_activities_header">
					<h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close">
							<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
										<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				
				<!--end::Body-->
				<!--begin::Footer-->
				<div class="card-footer py-5 text-center" id="kt_activities_footer">
					<a href="pages/profile/activity.html" class="btn btn-bg-white text-primary">View All Activities
					<!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
					<span class="svg-icon svg-icon-3 svg-icon-primary">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
								<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
							</g>
						</svg>
					</span>
					<!--end::Svg Icon--></a>
				</div>
				<!--end::Footer-->
			</div>
		</div>

		<div id="kt_drawer_chat" class="bg-white" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
			<!--begin::Messenger-->
			<div class="card w-100" id="kt_drawer_chat_messenger">
				<!--begin::Card header-->
				<div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
					<!--begin::Title-->
					<div class="card-title">
						<!--begin::User-->
						<div class="d-flex justify-content-center flex-column me-3">
							<a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>
							<!--begin::Info-->
							<div class="mb-0 lh-1">
								<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
								<span class="fs-7 fw-bold text-gray-400">Active</span>
							</div>
							<!--end::Info-->
						</div>
						<!--end::User-->
					</div>
					<!--end::Title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Menu-->
						<div class="me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
								<i class="bi bi-three-dots fs-3"></i>
							</button>
							<!--begin::Menu 3-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
								<!--begin::Heading-->
								<div class="menu-item px-3">
									<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
								</div>
								<!--end::Heading-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a contact email to send an invitation"></i></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start" data-kt-menu-flip="left, center, top">
									<a href="#" class="menu-link px-3">
										<span class="menu-title">Groups</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Create Group</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Invite Members</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3 my-1">
									<a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">Settings</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu 3-->
						</div>
						<!--end::Menu-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
							<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
										<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
										<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body" id="kt_drawer_chat_messenger_body">
					<!--begin::Messages-->
					<div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer" data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">2 mins</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">How likely are you to recommend our company to your friends and family ?</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">5 mins</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-2.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">1 Hour</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Ok, Understood!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">2 Hours</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-2.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">3 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">You can unwatch this repository immediately by clicking here:
								<a href="https://keenthemes.com">Keenthemes.com</a></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(out)-->
						<div class="d-flex justify-content-end mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">4 Hours</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-2.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">Most purchased Business courses during this sale!</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(out)-->
						<!--begin::Message(in)-->
						<div class="d-flex justify-content-start mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">5 Hours</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(in)-->
						<!--begin::Message(template for out)-->
						<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-end">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Details-->
									<div class="me-3">
										<span class="text-muted fs-7 mb-1">Just now</span>
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
									</div>
									<!--end::Details-->
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-2.jpg" />
									</div>
									<!--end::Avatar-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text"></div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for out)-->
						<!--begin::Message(template for in)-->
						<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column align-items-start">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-2">
									<!--begin::Avatar-->
									<div class="symbol symbol-35px symbol-circle">
										<img alt="Pic" src="{{asset('backend')}}/assets/media/avatars/150-15.jpg" />
									</div>
									<!--end::Avatar-->
									<!--begin::Details-->
									<div class="ms-3">
										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian Cox</a>
										<span class="text-muted fs-7 mb-1">Just now</span>
									</div>
									<!--end::Details-->
								</div>
								<!--end::User-->
								<!--begin::Text-->
								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">Right before vacation season we have the next Big Deal for you.</div>
								<!--end::Text-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Message(template for in)-->
					</div>
					<!--end::Messages-->
				</div>
				<!--end::Card body-->
				<!--begin::Card footer-->
				<div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
					<!--begin::Input-->
					<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
					<!--end::Input-->
					<!--begin:Toolbar-->
					<div class="d-flex flex-stack">
						<!--begin::Actions-->
						<div class="d-flex align-items-center me-2">
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="bi bi-paperclip fs-3"></i>
							</button>
							<button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" data-bs-toggle="tooltip" title="Coming soon">
								<i class="bi bi-upload fs-3"></i>
							</button>
						</div>
						<!--end::Actions-->
						<!--begin::Send-->
						<button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
						<!--end::Send-->
					</div>
					<!--end::Toolbar-->
				</div>
				<!--end::Card footer-->
			</div>
			<!--end::Messenger-->
		</div>


		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>



        <script src="https://code.jquery.com/jquery-migrate-3.4.1.js" integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	    <script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/add-payment.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/adjust-balance.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/invoices.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/payment-method.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/payment-table.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/statement.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/update.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/new-card.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/widgets.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/chat/chat.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/create-app.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->

<script>
    function asifalevel(checkbox) {
        
        if (checkbox.checked) {
            $("#alevel_course_topic").html(` <p><strong><font color="#000000" style="background-color: rgb(255, 255, 0);">A-Level Preparation Course: Ace Your June Exams!</font></strong></p><p>Are you ready to excel in your A-Level exams this June? Our targeted course is here to help!</p><p><strong>Who’s It For?</strong>
Perfect for students preparing for A-Level exams this June who want to boost their understanding and confidence.</p><p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Course Highlights</font></b></p><ul><li><font color="#000000" style="background-color: rgb(255, 255, 0);">In-Person Learning: </font>Six-hour weekly classes per subject.</li><li><strong><font color="#000000" style="background-color: rgb(255, 255, 0);">Subjects Covered:</font></strong> Maths, Physics, Chemistry, and Biology.</li><li><strong><font color="#000000" style="background-color: rgb(255, 255, 0);">Key Focus:</font></strong> Past paper practice and mastering essential concepts.</li></ul><p>All sessions take place at our centre, offering a collaborative group learning environment.</p><p><strong>Interested in joining our course?</strong> Book now at <a rel="noopener" target="_new" href="https://www.examcentrelondon.co.uk/courses">Exam Centre London</a>.</p> `);
        } else {
            $("#alevel_course_topic").html('');
        }
    }
</script>

    

<script>
    function couponNew(checkbox) {
        if (checkbox.checked) {
            $("#coupon_discount").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp; Discount &nbsp;</font></b><br><p> Exclusive 5% Discount on Your Next Exam Booking!<font style="background-color: rgb(255, 0, 0);" color="#000000">&nbsp;</font><font style="background-color: rgb(255, 0, 0);" color="#ffffff">Limited time only.</font></p><p>We’re excited to offer you a 5% discount on your next booking at Exam Centre London!</p><p>Use coupon code:&nbsp; &nbsp;<font style="background-color: rgb(255, 0, 0);" color="#ffffff"><b style="">&nbsp; ECLJUNE25&nbsp;</b>&nbsp;&nbsp;</font>at checkout to save 5% on any exam service—whether it’s for GCSE, A-Level, or any other exam.</p><p>How to Claim:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Visit our website: examcentrelondon.co.uk</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Select your exam and head to the checkout</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre"></span>Enter <font color="#000000" style="background-color: rgb(255, 255, 0);">ECLJUNE25 </font>to apply your discount</span></p>');
        } else {
            $("#coupon_discount").html('');
        }
    }
</script>



<script>
$('#examsBox').click(function() {
  if ($(this).prop('checked')) {
    $('#booking_procedure').html('<div><span style="font-size: 14px; text-align: center; background-color: rgb(255, 0, 0);"><b style=""><font color="#ffffff" style="">Exam Booking Procedure</font></b></span></div><div><br></div><div>1. Register an Account:</div><div>&nbsp; &nbsp;- Visit the <a href="https://www.examcentrelondon.co.uk/student/signup" target="_blank">registration </a>page on the portal.</div><div>&nbsp; &nbsp;- Fill in the required details to create your account.</div><div><br></div><div>2. Log In:</div><div>&nbsp; &nbsp;- <a href="https://www.examcentrelondon.co.uk/login" target="_blank">Use your registered email and password to log into the portal</a>.</div><div><br></div><div>3. Select Exam Type:</div><div>&nbsp; &nbsp;- Browse the list of available exam options (e.g., GCSE, IGCSE, etc.).</div><div>&nbsp; &nbsp;- Click on the "IGCSE" option.</div><div><br></div><div>4. Complete the Booking Form:</div><div>&nbsp; &nbsp;- Fill out the booking form with all necessary details.</div><div>&nbsp; &nbsp;- Select the specific IGCSE exams you wish to book (e.g., Edexcel Chemistry, Edexcel Physics).</div><div><br></div><div>5. Confirm and Submit:</div><div>&nbsp; &nbsp;- Review all the details to ensure they are correct.</div><div>&nbsp; &nbsp;- Submit the form to complete your booking.</div><div><br></div>')
} else {
     $("#booking_procedure").html("");
  }
});
</script>


<script>
$('#specialAccess').click(function() {
  if ($(this).prop('checked')) {
     $("#access_topic").html("");
  } else {
     $("#access_topic").html("");
  }
});
</script>


<script>
$('#aleveltuition').click(function() {
    // alert("ok");
  if ($(this).prop('checked')) {
     $("#alevel_tution").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;A Level Tuition&nbsp;</font></b><br><p><b>Unlock Your Potential with Our A-Level Tuition!</b></p><p>Achieving high grades in your A-Level exams is crucial, and we’re here to help you excel! At our exam centre, we offer flexible, tailored tuition services designed to fit your unique needs and learning style.</p><p>&nbsp;<b>Why Choose Us?</b></p><p>- Diverse Subject Offerings: Whether you’re tackling popular subjects like Maths, Physics, Chemistry, Biology, and English Language, or diving into less common ones like Sociology and Politics, we’ve got you covered.</p><p>- Personalized Learning: Opt for dynamic group sessions or focused one-to-one tuition to maximize your understanding and confidence in each subject.</p><p>- Flexible Learning Formats: Enjoy the convenience of in-person classes at our centre or the comfort of online sessions—whichever works best for you!</p><p>- Expert Guidance: Our experienced teachers employ proven strategies, utilize past papers, and provide personalized feedback to ensure you’re fully prepared for your exams.</p><p><b>&nbsp;Boost Your Grades and Confidence!</b></p><p>We encourage all students booking exams with us to take advantage of our exceptional tuition services. Together, we’ll pave the way for your academic success. Don’t just aim for passing grades—strive for excellence!</p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Ready to elevate your A-Level journey? Contact us today to get started!</font></p>');
  } else {
     $("#alevel_tution").html("");
  }
});
</script>

<script>
$('#grouptution').click(function() {
  if ($(this).prop('checked')) {
     $("#gcse_tuition").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;GCSE Tuition&nbsp;</font></b><br><p>&nbsp;Achieve Excellence with Our Tailored GCSE Tuition!</p><p>At our exam centre, we know how vital it is to excel in your GCSE exams, and we’re dedicated to helping you reach your full potential. Our flexible tuition services are designed to meet your unique learning needs.</p><p><b>Why Choose Our GCSE Tuition?</b></p><p>- Core Subjects: Participate in engaging group sessions for Maths, English, and Science, or choose personalized one-to-one tutoring to focus on your specific challenges.</p><p>- Flexible Learning Formats: Enjoy the convenience of in-person classes at our centre or opt for tailored online sessions—whatever suits your schedule best!</p><p>- Expert Guidance: Benefit from our experienced teachers who utilize proven techniques, past papers, and targeted feedback to elevate your performance.</p><p><b>&nbsp;Boost Your Confidence and Grades!</b></p><p>We encourage all students booking exams with us to take full advantage of our tuition services. Together, we’ll build your confidence and enhance your academic success.</p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Ready to take the next step? Contact us today to secure your spot and start your journey toward outstanding GCSE results!</font><br></p>');
  } else {
     $("#gcse_tuition").html("");
  }
});
</script>
<script>
$('#UcasAccess').click(function() {
  if ($(this).prop('checked')) {
     $("#Ucas_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;UCAS Application Details&nbsp;</font></b><br><p><strong>We are an authorized exam center for all UK exam boards and a registered UCAS center, providing services to private candidates who require support with their university applications via UCAS.</strong></p><h3><strong>Services Overview:</strong></h3><ol><li><p><strong>Mock Exams for Predicted Grades and UCAS References:</strong></p><ul><li>To provide a predicted grade and reference for your UCAS application, candidates must take a minimum of two mock exams.</li><li>The cost is £80 per exam, which includes marking. For two exams, the total is £160.</li><li>Mock exams completed by November will qualify for AS-level consideration by the 15th of November. After this date, full A-level exams will be required.</li><li>We typically predict a grade that is one level higher than the grade achieved in these mock exams.</li><li>Candidates can book mock exams at any time before the deadline.</li></ul></li><li><p><strong>UCAS Application Support:</strong></p><ul><li>A fee of £100 is charged for managing the UCAS application and related administrative tasks.</li><li>Additional support for personal statement writing is available for £50.</li></ul></li></ol><h3><strong>Process Outline:</strong></h3><ul><li>Candidates must create an account on the UCAS website and complete their application using our UCAS center number and buzz code.</li><li>The application will be sent to us for verification, allowing us to provide the necessary references and predicted grades.</li><li>Once verified, we forward the application to the universities, which will then assess it and issue offer letters accordingly.</li></ul><p>Our services are designed to ensure that private candidates receive comprehensive support and guidance throughout the UCAS application process, helping them secure a place at their chosen university.</p><p>For more details or to book your mock exams, please visit <a rel="noopener" target="_new" href="https://www.examcentrelondon.co.uk/ucas-registered-centre">our website</a>.</p> ');
  } else {
     $("#Ucas_topic").html("");
  }
});
</script>


<script>
$('#fsc').click(function() {
  if ($(this).prop('checked')) {
    //   alert("")
     $("#tution_topic").html(`<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Functional Skills Tuition&nbsp;</font></b><br><p>We understand that passing your Functional Skills exams can be challenging, and we’re here to help you succeed on your first attempt. As a professional exam centre, we offer personalised tuition services tailored specifically to your needs, designed to enhance your skills and boost your confidence.</div><div><br></div><div>How Our Tuition Can Help You:</div><div><br></div><div><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Flexible Learning Options: Choose between online sessions or face-to-face tuition at our centre, whichever suits you best.</span></div><div><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Expert Support: Work with our qualified teachers who will focus on the areas you find most challenging, using past papers and exam questions.</span></div><div><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Customised Sessions: Start with a minimum booking of four hours, with each session lasting two hours (£25 per hour).</span></div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Simple Booking: Easily arrange your personalised tuition through our website <a href="https://www.examcentrelondon.co.uk/functional-skills-tuition-details" target="_blank">https://www.examcentrelondon.co.uk/functional-skills-tuition-details</a>.</div><div><br></div><div>With our tuition services, you’ll receive the individual attention and guidance you need to pass your exams with confidence.</p> `);
  } else {
     $("#tution_topic").html("");
  }
});

</script>


<script>
$('#gc').click(function() {
  
  if ($(this).prop('checked')) {
     $("#gcse_course_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;GCSE Maths and English November Retake Course &nbsp;</font></b><br><div><br></div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Who Is It For?: Students retaking their <font color="#ff0000">GCSE Maths and English</font> exams in November.</div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Course Structure: Weekly, in-person sessions lasting six hours for each subject.</div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Focused Preparation: Includes solving extensive past papers to build confidence and improve exam techniques, helping to boost your grades.</div><div><div>All courses are conducted in person at our centre to provide the most effective group learning environment. To book your course, please visit our website <a href="https://www.examcentrelondon.co.uk/courses" target="_blank">https://www.examcentrelondon.co.uk/courses</a> .</div><div><br></div><div>Join us to ensure thorough preparation and boost your chances of achieving the grades you desire.</div></div>')
  } else {
     $("#gcse_course_topic").html("");
  }
});

</script>

<script>
$('#gcj').click(function() {
  
  if ($(this).prop('checked')) {
     $("#gcse_course_topic_june").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;GCSE Course For June Series &nbsp;</font></b><br><div><font style="background-color: rgb(255, 255, 0);" color="#000000">GCSE Course for June Exams</font></div><div><br></div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Who Is It For?: Students preparing for their <font color="#ff0000" style="background-color: rgb(255, 255, 0);">GCSE exams in June.</font></div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Course Structure: Weekly, in-person sessions of six hours for core subjects, including Maths and English.</div><div><span style="white-space: pre;">	</span>•<span style="white-space: pre;">	</span>Comprehensive Support: Focuses on all key topics, intensive past paper practice, and strategic exam preparation to maximise your performance.</div><div><br></div><div>All courses are conducted in person at our centre to provide the most effective group learning environment. To book your course, please visit our website <a href="https://www.examcentrelondon.co.uk/courses" target="_blank">https://www.examcentrelondon.co.uk/courses</a> .</div><div><br></div><div><font color="#000000" style="background-color: rgb(255, 255, 0);">Join us to ensure thorough preparation and boost your chances of achieving the grades you desire.</font></div>')
  } else {
     $("#gcse_course_topic_june").html("");
  }
});

</script>


<script>
$('#mockAccess').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#mock_exam_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp; Mock Exam &nbsp;</font></b><br><p>Our mock exams at Exam Centre London offer students the opportunity to assess their current level of preparation for their GCSE or A-Level exams, identify areas that need improvement, and gain confidence by experiencing real exam conditions. </p><p>To book a mock exam, simply visit our website and complete the booking form by selecting your preferred exam type (GCSE or A-Level), subjects, date, and time. </p><p>The cost for a GCSE mock exam is £70, and for an A-Level mock exam, it is £80, which includes marking. Once the exam is completed, we will mark the papers and provide you with the results within one week. If you wish to review your exam script, we can also send it to you upon request. For those interested in a mock exam specifically for UCAS purposes, please visit our dedicated page using the link provided on our website.<br></p> ')
  } else {
      $("#mock_exam_topic").html("");
  }
});

</script>




<script>
    var i=1;
    function addmore(){
        $("#add_more_subject_row").append('<div class="row asif"><label class="col-md-3 col-form-label text-lg-end">Subject Details:<span class="required"></span></label><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Type:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_type_change(this)" name="exam_type[]"  id="exam_type_'+i+'"  class="form-select form-select-solid" ><option value="">Select</option><option value="GCSE">GCSE</option><option value="A Level" >A Level</option><option value="AS Level">AS Level</option><option value="IGCSE" >IGCSE</option><option value="AAT">AAT</option><option value="Functional Skills">FUNCTIONAL SKILLS</option><option value="ACCA">ACCA</option></select></div></div><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Board:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_board_change(this)" name="exam_board[]" id="exam_board_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-3"><label class="col-form-label text-lg-end">Subject:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_subject_change(this)" name="subject[]" id="exam_subject_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-2"><label class=" col-form-label text-lg-end">Fees:<span class="required"><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)"><i style="color:red" class="fa fa-times"></i></a></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><input class="form-control form-control-solid" type="test" name="fees[]" id="fees_'+i+'"></div></div></div>');
      i++
    }




    function deleterow(em) {
 

 $(em).closest(".asif").remove();
    
  // countamout();

}
    
  </script>
  
<script>
  
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('specialAccess');
      var hiddenSection = document.getElementById('hiddenSection');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('specialAccess').addEventListener('change', toggleSectionVisibility);
  </script>

  
<script>
  

    $(document).ready(function() {
        // Attach change event handler to the checkbox
        $('#tuitionAccess').change(function() {
            // alert("ok");
            if ($(this).is(':checked')) {
                // Show the div if the checkbox is checked
                $('#tuition_section').show();
            } else {
                // Hide the div if the checkbox is unchecked
                $('#tuition_section').hide();
            }
        });
        
       
    });

</script>



  
<script>
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('courseAccess');
      var hiddenSection = document.getElementById('courseAccess_Section');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('courseAccess').addEventListener('change', toggleSectionVisibility);
</script>



<script>
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('examsBox');
      var hiddenSection = document.getElementById('examsBox_series');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('examsBox').addEventListener('change', toggleSectionVisibility);
</script>
<script>

   function exam_type_change(el){

          var type_id=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[2];
        //   var series_id =$("#exam_series_0").val();
        //   alert(series_id);
          if(type_id) {
             $.ajax({
                 url: "{{  url('get/supports/board/all/') }}/"+type_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                   
                    // console.log(data)
                        $('#exam_board_'+mainid).empty();
                        $('#exam_board_'+mainid).append('<option selected disabled>Select</option>');
                        $.each(data,function(index,districtObj){

                         $('#exam_board_'+mainid).append('<option value="' + districtObj.id + '">'+districtObj.name+'</option>');
                         
                       });
                        $('#fees_'+mainid).val('');
                        

                     }
             });
         } else {
             alert('sorry data not found');
         }
        
        
    }

</script>


<script>
    function exam_board_change(el){
           var series_main =$("#series_main").val();
        //   alert(series_main);
           if(series_main){
                   var type_id=el.value;
                   var index_id = el.id; 
                   var arr = index_id.split('_');
                   var mainid=arr[2];
                   var series_id =$("#exam_type_"+mainid).val();
                   if(type_id) {
                      $.ajax({
                          url: "{{  url('get/supports/allsubject/all/') }}/"+type_id+'/'+series_id+'/'+series_main,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                            
                             // console.log(data)
                                 $('#exam_subject_'+mainid).empty();
                                 $('#exam_subject_'+mainid).append('<option selected disabled>Select</option>');
                                 $.each(data,function(index,districtObj){
         
                                  $('#exam_subject_'+mainid).append('<option value="' + districtObj.id + '">'+districtObj.subject_name+'</option>');
                                  
                                });
                                 $('#fees_'+mainid).val('');
                                 
         
                              }
                      });
                  } else {
                      alert('sorry data not found');
                  }
           }else{
                alert('Please Select Exam Series');
           }
          
         
         
     }
 
 </script>



<script>
    function exam_subject_change(el){
           var type_id=el.value;
           var index_id = el.id; 
           var arr = index_id.split('_');
           var mainid=arr[2];
            var series_main = $("#series_main").val();
            // alert(series_main);

           if(type_id) {
              $.ajax({
                  url: "{{  url('get/supports/individual-subject/all/') }}/"+type_id+'/'+series_main,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    
                        //  console.log(data.applicable_fee)
                        
                          $('#fees_'+mainid).val(data.applicable_fee);
                         
 
                      }
              });
          } else {
            //   alert('sorry data not found');
          }
         
         
     }
 
 </script>


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
	$(document).ready(function() {
  $('#summernote').summernote({
	height: 300,  
  });
});
</script>

		<!--end::Page Custom Javascript-->
<script>
$(document).ready(function() {
    $('#searchField').on('input', function() { // Trigger on every input
        let query = $(this).val(); // Get the input value
        // alert(query);
        if (query.length > 2) { // Perform the search only if the input length is greater than 2 characters
            $.ajax({
                url: '{{ url('/admin/supports-topic/search') }}', // URL for the search route
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    // console.log(data);
                  
                     $('#searchResults').html(data); // Display the search results
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#searchResults').html(''); // Clear the search results if input is too short
        }
    });
});
</script>


    <script>
        function copypost(element) {
      	// alert('oik');
            // Get the text content of the clicked paragraph
            var text = $(element).text();
            
            // Create a temporary input element
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(text).select();
            document.execCommand('copy');
            $temp.remove();
            
            // Optionally alert the copied text
            // alert("Copied the text: " + text);
        }
    </script>
    

    <script>
        function alveltuition(checkbox) {
            if (checkbox.checked) {
                $("#alevel_tutions").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;A Level Tuition &nbsp;</font></b><br> <p><b>Unlock Your Potential with Our A-Level Tuition!</b></p><p>Achieving high grades in your A-Level exams is crucial, and we’re here to help you excel! At our exam centre, we offer flexible, tailored tuition services designed to fit your unique needs and learning style.</p><p>&nbsp;<b>Why Choose Us?</b></p><p>- Diverse Subject Offerings: Whether you’re tackling popular subjects like Maths, Physics, Chemistry, Biology, and English Language, or diving into less common ones like Sociology and Politics, we’ve got you covered.</p><p>- Personalized Learning: Opt for dynamic group sessions or focused one-to-one tuition to maximize your understanding and confidence in each subject.</p><p>- Flexible Learning Formats: Enjoy the convenience of in-person classes at our centre or the comfort of online sessions—whichever works best for you!</p><p>- Expert Guidance: Our experienced teachers employ proven strategies, utilize past papers, and provide personalized feedback to ensure you’re fully prepared for your exams.</p><p><b>&nbsp;Boost Your Grades and Confidence!</b></p><p>We encourage all students booking exams with us to take advantage of our exceptional tuition services. Together, we’ll pave the way for your academic success. Don’t just aim for passing grades—strive for excellence!</p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Ready to elevate your A-Level journey? Contact us today to get started!</font></p> ')
            } else {
                $("#alevel_tutions").html("");
            }
        }
    </script>
    
<script>
$('#Anxiety').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Anxiety_topic").html(`<p><font style="background-color: rgb(255, 0, 0);" color="#ffffff">Access Arrangements for Candidates with Anxiety</font></p><p>For students with anxiety, access arrangements can be put in place to ensure they are not at a disadvantage during their exams. The following steps outline the process:</p><p><b>What You Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>1.<span style="white-space:pre">	</span>Medical Evidence: A recent letter or report (within the last 12 months) from a healthcare professional (GP, psychologist, or psychiatrist) explaining the anxiety diagnosis and its impact on exam performance.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>2.<span style="white-space:pre">	</span>History of Need: Evidence showing previous use of support or adjustments at school or college, such as extra time or rest breaks during assessments.</span></p><p><b>What We Do as an Exam Centre:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>1.<span style="white-space:pre">	</span>Processing Applications: We review the documents provided and apply for the necessary access arrangements (e.g., extra time, rest breaks, or separate invigilation) through the JCQ system in line with their regulations.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>2.<span style="white-space:pre">	</span>Supporting Candidates: Candidates will have opportunities to practise their access arrangements, ensuring they are comfortable with them before the exam day.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>3.<span style="white-space:pre">	</span>Separate Invigilation: If needed, we can arrange for the candidate to sit the exam in a separate room to reduce anxiety triggers.</span></p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: The fee will depend on the documents provided and the nature of the work required to arrange and implement the necessary accommodations.</font></p> `)
  } else {
      $("#Anxiety_topic").html("");
  }
});

</script>


<script>
$('#Extra_Time_25').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Extra_Time_25_topic").html(`<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: 25% Extra Time&nbsp;</font></b><br></p><p><b>Route 1: Learning Difficulty (e.g., Dyslexia, ADHD)</b></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Diagnostic Assessment: A report from a qualified assessor (e.g., specialist teacher, psychologist) conducted no earlier than Year 9, showing two below-average standardised scores (84 or less) or one below-average and one low-average score (85-89) related to speed of reading, writing, or cognitive processing.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Form 8: This form, completed by the SENCo or assessor, outlines the learning difficulties and normal way of working at school.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit an application via the JCQ Access Arrangements Online system.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure the candidate uses 25% extra time in mock exams or internal assessments to confirm it benefits their performance.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Gather and store evidence of the candidate’s need for extra time (e.g., Form 8, diagnostic report).</span></p><p>Route 2: Medical Condition (e.g., Anxiety, Chronic Illness)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter or report from a GP, psychologist, or medical professional that details the candidate’s medical condition, explains its long-term impact, and justifies the need for extra time in exams.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>History of Need: Evidence from school records showing previous use of access arrangements like extra time due to the medical condition.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Review medical evidence and determine if the condition causes significant and long-term difficulty in exams.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the application through JCQ Access Arrangements Online, including medical reports.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Allow the candidate to practise using extra time in mock exams or internal assessments to ensure it supports their performance.</span></p><p>Route 3: Education, Health and Care Plan (EHCP) / Individual Development Plan (IDP)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>EHCP/IDP: A current Education, Health and Care Plan (England) or Individual Development Plan (Wales), which confirms the candidate’s need for extra time. The plan should provide evidence that the candidate faces significant difficulties in timed assessments.</span></p><p>What the Centre Needs to Do:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the EHCP/IDP as evidence via Access Arrangements Online (Form 8 is not required).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure that the candidate uses extra time in school assessments and has been receiving it as part of their normal way of working.</span></p><p>Route 4: Temporary Injury or Recent Diagnosis</p><p>What Parents Need to Provide:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter from a medical professional explaining the temporary injury or new diagnosis and its impact on exam performance.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Supporting Evidence: Evidence from the school showing how the injury or diagnosis affects the candidate’s current ability to take exams.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit a late application via Access Arrangements Online, explaining the urgency and providing medical evidence.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Accommodate extra time arrangements on short notice, ensuring staff are aware of the need for adjustments.</span></p><p><b>General Requirements for All Routes:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Parents: Gather and submit the required documentation depending on the route.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Centre: Process applications via the JCQ portal, keep evidence on file for JCQ inspection, and ensure candidates practise using their extra time in assessments.</span></p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: The cost for arranging 25% extra time will depend on the route and the documents provided, as well as the amount of work involved in processing the application.</font></p>`)
  } else {
      $("#Extra_Time_25_topic").html("");
  }
});

</script>

<script>
$('#Extra_Time_50').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Extra_Time_50_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: 50% Extra Time&nbsp;</font></b><br></p> <p><font color="#000000" style="background-color: rgb(255, 255, 0);">Route 1: Learning Difficulty (e.g., Dyslexia, ADHD)</font></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Diagnostic Assessment: A report from a qualified assessor (e.g., specialist teacher or psychologist) showing very low standardised scores (69 or below) in two areas of speed of working (such as reading, writing, or cognitive processing).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Form 8: Completed by the SENCo or assessor, showing that the candidate’s normal way of working includes 50% extra time due to their learning difficulty.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Process the application through Access Arrangements Online (AAO). Applications for more than 25% extra time are automatically referred to the awarding body, requiring a detailed explanation of why 50% extra time is necessary.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Keep detailed evidence on file, including Form 8 and diagnostic reports, for JCQ inspections.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure the candidate has practiced using 50% extra time in mock exams or other internal assessments.</span></p><p>Route 2: Medical Condition (e.g., Severe Anxiety, Chronic Illness)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter from a GP, psychiatrist, or relevant healthcare professional explaining how the medical condition significantly impacts the candidate’s speed of working.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Supporting Documentation: Proof from the school or college showing that the candidate requires 50% extra time during lessons and exams due to the condition.</span></p><p>What the Centre Needs to Do:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the application through AAO and provide the necessary medical evidence.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>For 50% extra time, a substantial case must be made, with supporting documentation demonstrating the significant impact on the candidate’s performance.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Allow the candidate to practise using 50% extra time during mock exams.</span></p><p>Route 3: Sensory or Physical Impairments (e.g., Visual or Hearing Impairment)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Documentation: A report from a specialist, such as an occupational therapist, indicating that the candidate’s sensory or physical impairment significantly affects their ability to complete tasks in a standard time.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Educational Support Evidence: Documents from the school or support services that demonstrate the candidate’s use of 50% extra time as a standard part of their working method.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the case through AAO with detailed medical and school-based evidence, explaining why 50% extra time is necessary for this specific impairment.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure arrangements, such as modified papers or additional technological support, are also considered alongside extra time.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Track the effectiveness of these arrangements in practice exams.</span></p><p>Route 4: Education, Health and Care Plan (EHCP) / Individual Development Plan (IDP)</p><p>What Parents Need to Provide:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>EHCP/IDP: A copy of the candidate’s EHCP or IDP, which clearly indicates that 50% extra time is necessary due to significant learning or medical needs.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre"></span>Submit the EHCP/IDP as part of the application without the need for Form 8.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Document how the candidate’s needs substantially hinder their speed of working and justify the need for 50% extra time.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre"></span>As with other routes, provide opportunities for candidates to practise using their extra time before formal exams.</span></p><p>General Requirements for All Routes:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; •&nbsp;<span style="white-space: pre;">	</span>Parents: Ensure all documentation is up to date and accurately reflects the candidate’s current needs. Submit this evidence to the centre well in advance of exam deadlines.<br></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Centre: Ensure that all applications for more than 25% extra time are fully supported by comprehensive documentation, including test results, medical evidence, and proof of normal working methods. Maintain records for JCQ inspection and monitor the candidate’s use of extra time during internal assessments.</span></p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: The fee will vary depending on the complexity of the application and the documents provided.</font></p> ')
  } else {
      $("#Extra_Time_50_topic").html("");
  }
});

</script>


<script>
$('#Practical_Assistant').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Practical_Assistant_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: Practical Assistant&nbsp;</font></b><br></p> <p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Route 1: Physical Disabilities (e.g., Cerebral Palsy, Limited Motor Skills)</font></b></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter or report from a medical professional detailing the candidate’s physical limitations and how these affect their ability to perform practical tasks independently in an exam setting.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Supporting Evidence: Information from the school/college indicating previous use of practical assistance in class or internal exams, if applicable.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the application via the JCQ Access Arrangements Online system. Include detailed information about the specific tasks the practical assistant will perform (e.g., holding equipment, turning pages).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure the practical assistant is familiar with the candidate’s needs and tasks before the exam.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Accommodate the candidate and practical assistant in a separate room if necessary.</span></p><p>Route 2: Visual or Hearing Impairments</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Documentation: A report from a specialist indicating the candidate’s visual or hearing impairment and how it impacts their ability to perform certain practical tasks during the exam.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Supporting School Evidence: A record showing that the candidate has previously used a practical assistant in class, such as for navigating pages or other materials.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure the practical assistant follows the candidate’s instructions without directing or influencing the outcome of the tasks (e.g., guiding a hand to a specific part of a paper without indicating an answer).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Provide tactile resources or adapted materials (e.g., enlarged papers, tactile graphs) as needed, and arrange for the assistant to help the candidate interact with these resources.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the application with a detailed breakdown of the assistant’s role in exams.</span></p><p>Route 3: Temporary Injury (e.g., Broken Arm, Recent Surgery)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter from a GP or surgeon outlining the nature of the injury and how it prevents the candidate from completing physical tasks in the exam independently.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>School Documentation: Evidence that the candidate’s normal way of working has been disrupted due to the injury.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit the application as soon as possible to ensure that arrangements are in place for upcoming exams.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Detail the specific tasks the assistant will perform, such as holding equipment or turning pages.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Accommodate the candidate and the assistant in a suitable environment if additional equipment or separate seating is required.</span></p><p><b>General Requirements for All Routes:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Parents/Candidates: Gather relevant and up-to-date documentation from healthcare providers, and ensure that the necessary school records are provided.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Centre: Ensure that practical assistants are fully briefed on their responsibilities. They are not allowed to help with the candidate’s decision-making but may assist with physical tasks as specified in the JCQ guidance. This includes adhering to the rules that the assistant must not give factual help or indicate when a task is complete&nbsp; &nbsp;.</span></p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: The cost will vary depending on the complexity of the arrangement and the documentation provided.</font></p> ')
  } else {
      $("#Practical_Assistant_topic").html("");
  }
});

</script>



<script>
$('#Laptop').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Laptop_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: Laptop&nbsp;</font></b><br></p><p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Route 1: Learning Difficulty (e.g., Dyslexia, ADHD)</font></b></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Diagnostic Assessment: A report from a qualified assessor (e.g., specialist teacher or psychologist) outlining how the candidate’s learning difficulty substantially impacts their handwriting or planning/organising skills, and how using a laptop improves their performance.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Confirm that using a laptop is the candidate’s normal way of working within the centre (e.g., using a laptop for classwork or internal assessments).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>No formal application is needed for using a word processor, but the centre must provide a word processor policy outlining the criteria for awarding laptop use. The policy must be available for inspection by JCQ.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure that the laptop has the spelling and grammar check facility disabled during the exam.</span></p><p>Route 2: Medical Condition or Physical Disability (e.g., Arthritis, Motor Skills Issues)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter from a GP, occupational therapist, or relevant healthcare professional detailing the candidate’s physical limitations and how these affect their ability to write by hand.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure that laptop use reflects the candidate’s normal way of working due to their medical condition. No separate application is required through JCQ’s Access Arrangements Online, but the centre must document the medical evidence and be prepared to show this during JCQ inspections.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>The word processor’s spelling and grammar check must be disabled unless additional access arrangements (such as a scribe) are approved.</span></p><p>Route 3: Temporary Injury (e.g., Broken Arm, Hand Injury)</p><p>What Parents Need to Provide:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A temporary medical note from a GP or specialist explaining the injury and the candidate’s inability to write by hand.</span></p><p>What the Centre Needs to Do:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>For temporary injuries, the use of a laptop can be arranged without submitting a formal application, provided that the injury prevents the candidate from writing. The centre must have sufficient evidence on file to support the decision.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre"></span>Ensure that the word processor complies with JCQ regulations (i.e., no access to spelling and grammar checks or predictive text).</span></p><p><b>General Requirements for All Routes:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Parents/Candidates: Gather and submit the necessary medical or educational evidence, demonstrating the need for laptop use.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre"></span>Centre: Create a word processor policy detailing the conditions under which candidates are allowed to use laptops, and ensure compliance with JCQ’s regulations, such as disabling spelling and grammar checks during exams. The policy must be readily available for JCQ inspection.</span></p><div><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: £30 per exam</font><br></div> ')
  } else {
      $("#Laptop_topic").html("");
  }
});
</script>


<script>
$('#OwnRoom').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#OwnRoom_topic").html('<p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: own Room&nbsp;</font></b><br></p> <p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Route 1: Medical Conditions (e.g., Anxiety, Severe Health Issues)</font></b></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A report or letter from a medical professional (e.g., GP, psychologist, or psychiatrist) detailing the candidate’s condition and explaining why they need to be seated separately from other candidates to avoid a substantial disadvantage during exams.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Supporting Documentation: Evidence from the school or college demonstrating that the candidate’s normal way of working includes separate invigilation during internal assessments or mock exams.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>The centre must ensure that separate invigilation is the candidate’s normal way of working due to the condition. No formal application is required through the JCQ Access Arrangements Online system for this, but the centre must have documented evidence of the condition on file for JCQ inspection.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Separate invigilation must be arranged in a quiet, controlled environment, ensuring that the candidate is supervised properly to prevent malpractice.</span></p><p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Route 2: Social, Emotional, or Mental Health Needs (e.g., Autism, Severe ADHD)</font></b></p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Professional Assessment: A letter from a mental health professional (e.g., CAMHS, psychiatrist, or psychologist) outlining how the candidate’s condition makes it challenging to sit exams in a shared environment and justifies the need for separate invigilation.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>History of Support: Documentation from the school showing how separate invigilation has been part of the candidate’s normal way of working due to their social, emotional, or mental health needs.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>The centre should make separate invigilation arrangements based on the candidate’s established needs and normal working methods. The centre does not need to submit an application for separate invigilation, but it must keep evidence of the condition on file for JCQ inspection.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure the candidate has practised using separate invigilation in mock exams to confirm it helps alleviate their difficulties.</span></p><p>Route 3: Sensory Impairments or Physical Disabilities</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Documentation: A letter from a specialist (e.g., audiologist, visual impairment specialist, or occupational therapist) indicating that the candidate’s sensory or physical impairment significantly impacts their ability to take exams in a group setting, thus requiring a separate room.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>The centre must arrange for separate invigilation in an appropriate environment, such as a room equipped with any necessary adaptations (e.g., for visually or hearing-impaired candidates). No formal application is necessary through the JCQ system, but the centre must document the evidence of need.</span></p><p><span style="white-space: normal;"><span style="white-space:pre"></span>•<span style="white-space:pre">	</span>Ensure that any additional adjustments, such as modified papers, are also provided during the exam.</span></p><p>General Requirements for All Routes:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Parents/Candidates: Submit up-to-date and relevant medical or educational evidence showing that the candidate’s condition requires them to be seated separately from other candidates.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Centre: Maintain a record of the candidate’s normal way of working and the need for separate invigilation, with supporting documentation available for JCQ inspections. Separate invigilation must reflect the candidate’s long-term or established needs and not be used as a last-minute arrangement without proper evidence.</span></p><p><b>Fees: Generally, the fee structure for arranging separate invigilation may depend on the resources required, such as the need for additional rooms or invigilators.</b></p> ')
  } else {
      $("#OwnRoom_topic").html("");
  }
});
</script>

<script>
$('#Home_Invigilation').click(function() {
  
  if ($(this).prop('checked')) {
    //   alert("ok")
      $("#Home_Invigilation_topic").html(' <p><b><font style="background-color: rgb(255, 0, 0);" color="#ffffff">&nbsp;Access Arrangements: Home Invigilation&nbsp;</font></b><br></p> <p><b><font color="#000000" style="background-color: rgb(255, 255, 0);">Home Invigilation Overview</font></b></p><p>Home invigilation allows candidates to sit their exams at home due to medical, psychological, or physical conditions that make it impossible to attend the exam centre.</p><p>Route 1: Medical Condition (e.g., Severe Illness, Injury)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Medical Evidence: A letter or report from a qualified medical professional (e.g., GP, hospital consultant) confirming the nature of the condition that prevents the candidate from attending the exam centre. The evidence should outline how the condition affects the candidate’s ability to sit exams in a regular environment.</span></p><p>What the Centre Needs to Do:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Submit an application for home invigilation. This is done through the Access Arrangements Online (AAO) system or by providing written evidence directly to the awarding body if not covered by AAO.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure that the candidate is capable of taking the exam at home. The centre must provide written confirmation of the candidate’s readiness to sit the exam under these conditions.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Appoint a responsible, trained invigilator to oversee the exam at home, ensuring full compliance with exam regulations.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Provide documentation for the JCQ Centre Inspector, including written evidence justifying the home invigilation request and confirmation that the arrangements meet JCQ standards&nbsp; .</span></p><p>Route 2: Psychological or Mental Health Conditions (e.g., Severe Anxiety, Autism)</p><p><b>What Parents Need to Provide:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Psychological Evidence: A report from a psychologist or psychiatrist, clearly stating that the candidate’s mental health condition severely impacts their ability to sit exams in an exam centre. The report should also demonstrate how the condition necessitates home invigilation.</span></p><p><b>What the Centre Needs to Do:</b></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>The application should outline how the candidate’s condition requires them to take exams at home rather than at the centre, along with supporting evidence of the normal way of working (e.g., previous instances of working from home due to similar needs).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Assign a trained invigilator who understands the candidate’s condition and is able to manage the exam session appropriately.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Keep thorough records for JCQ inspections, including the medical or psychological reports and proof of the invigilation plan&nbsp; .</span></p><p><br></p><p><b>Route 3: Physical Disabilities</b></p><p><br></p><p>What Parents Need to Provide:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Specialist Report: A document from a relevant healthcare provider (such as an occupational therapist) outlining how the candidate’s physical disability prevents them from attending the exam centre. The report should justify the need for a home setting based on the candidate’s physical limitations.</span></p><p>What the Centre Needs to Do:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Ensure that the environment at home meets the same standards of security and exam integrity as a standard exam room.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Arrange for any additional equipment or technology needed to accommodate the candidate’s disability (e.g., modified papers, extra time).</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Provide all necessary evidence, including the specialist’s report and a record of normal working arrangements, in preparation for a JCQ inspection&nbsp; .</span></p><p>General Requirements for All Routes:</p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Parents/Candidates: Submit appropriate, up-to-date medical or psychological evidence that clearly demonstrates the candidate’s need for home invigilation.</span></p><p><span style="white-space: normal;"><span style="white-space:pre">	</span>•<span style="white-space:pre">	</span>Centre: Ensure that all arrangements comply with JCQ regulations and that the invigilator is properly trained and follows all guidelines. Keep thorough documentation of the entire process for inspection.</span></p><p><font color="#000000" style="background-color: rgb(255, 255, 0);">Fees: The cost of arranging home invigilation will depend on the resources required, such as hiring invigilators and providing necessary exam materials.</font></p> ')
  } else {
      $("#Home_Invigilation_topic").html("");
  }
});
</script>

<script>
    function SerisDate(el){
             
           var series_id=el.value;
        
           if(series_id) {
              $.ajax({
                  url: "{{  url('get/exam-series/alldate/') }}/"+series_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    
                     console.log(data);
                          $('#exam_series_info').text(
                            `Exam Series: ${data.Exam_series}, ` +
                            `Entry Deadline: ${data.EntryDeadLine}, ` +
                            `Late Entry: ${data.EntryLate}, ` +
                            `High Late Entry: ${data.EntryHighlate}`
                        );
                         
 
                      }
              });
          } else {
              alert('sorry data not found');
          }
         
    }
</script>

    
@endsection