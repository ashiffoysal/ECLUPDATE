@extends('layouts.backend')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend') }}/datepicker/mc-calendar.min.css" />
<script src="{{ asset('frontend') }}/datepicker/mc-calendar.min.js"></script>
<style>
	img.mainimg {
    height: 300px;
    width: 100%;
}
.form-control {
    padding: 5px 5px;
   
}
.form-control {
    
    margin-bottom: 9px !important;
}
.form-select {
   
    line-height: 1 !important;
}
</style>
                   <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Overview</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">exam booking</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">details</li>
										<!--end::Item-->
										<!--begin::Item-->
										
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
								<!--begin::Navbar-->
							
								<!--end::Navbar-->
								<!--begin::Row-->
								<div class="row g-5 g-xxl-8">
									<!--begin::Col-->
									<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body pb-0">
											
												<div class="mb-7">
														<div class="card">
														<div class="card-body">
															<div class="col-md-6 d-flex flex-grow-1" style="margin-bottom: 10px;">
																<div class="d-flex flex-column">
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder" style="font-weight: 700 !important;">Exam Type: {{ $data->main_exam_type }}</a>
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder" style="font-weight: 700 !important;">Booking ID: <span class="badge badge-success">{{ $data->booking_id }}</span></a>
																	<span class="text-gray-400 fw-bold" style="color:black !important;" style="font-weight: 700 !important;">Candidate ID: {{ $data->Candidate_number }}</span>
																</div>
															</div>
															<div class="col-md-6 d-flex flex-grow-1" style="margin-bottom: 10px;">
																<div class="d-flex flex-column">
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder" style="font-weight: 700 !important;">Name: {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</a>
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder" style="font-weight: 700 !important;">Eamil: <span class="badge badge-success">{{ $data->email }}</span></a>
																	<span class="text-gray-400 fw-bold" style="color:black !important;" style="font-weight: 700 !important;">Phone: {{ $data->phone }}</span>
																				
																</div>
															</div>
															<br>
													
														


													
														
													
														
														<!--end::Card footer-->
													</div>
													<!--begin::Text-->
												</div>
												<!--end::Post-->
												<!--begin::Separator-->
												<div class="separator mb-4"></div>
												
											</div>
											<!--end::Body-->
										</div>
									</div>
								
									<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Subject Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                  <th>Exam Branch</th>
								                                  <th>Exam Level</th>
								                                  <th>Subject</th>
								                                  <th>Exam Type</th>
								                                  <th>Fees</th>
								                                  <th>Date </th>
								                                  <th>Time</th>
								                                </tr>
								                              </thead>
								                              <tbody>
								                                @foreach(json_decode($data->exam_information) as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_board}}</td>
								                                  <td>{{$exam->exam_series}}</td> 
								                                  <td>{{$exam->type}}</td> 
								                                  @php
								                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
								                                  @endphp
								                                  <td class="text-danger">@if( $subject){{$subject->subject_name}} @endif</td>
								                                  <td class="text-danger">{{ $exam->option_code }}</td>
								                                 
								                                   <td>£ {{ $exam->fees }}</td>
								                                     <td>  {{ \Carbon\Carbon::parse($exam->exam_date)->format('d-m-Y')}}</td>
								                                   <td>{{ $exam->start_exam_time }}</td>
								                                   
								                                </tr>
								                                @endforeach
								                                
								                              </tbody>
								                            </table>
									                      </div>
									                    </div>
									                  </div>
									                </div>
									              </div>
												<div class="separator mb-4"></div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													
												</div>
												
											</div>
											<!--end::Body-->
										</div>
										<div class="card mb-5 mb-xxl-8" id="subjectupdate_section"  @if (Session::has('success')) @else  style="display:none"  @endif>
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
											</div>
										</div>
									</div>
								
					
									
									
								<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
										<div class="card mb-5 mb-xxl-8" id="subjectupdate_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
												<form  class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ url('admin/functionalskills-candidate-result-uploads/index/'.$data->id) }}" method="post" enctype="multipart/form-data">
												    @csrf
												    
												       <input type="hidden" name="user_id" value="{{ $data->user_id }}">
												       <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
												       <input type="hidden" name="email" value="{{ $data->email }}">
												       <input type="hidden" name="first_name" value="{{ $data->first_name }}">
												       <input type="hidden" name="middle_name" value="{{ $data->middle_name }}">
												       <input type="hidden" name="last_name" value="{{ $data->last_name }}">
											
													<!--begin::Heading-->
													<div class="mb-13 text-center">
														<!--begin::Title-->
														<h1 class="mb-3">Upload Results(PDF)</h1>
														<!--end::Title-->
														<!--begin::Description-->
													
														<!--end::Description-->
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
												
													<div class="fv-plugins-message-container invalid-feedback"></div></div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="row mb-0">
        													<!--begin::Label-->
        													
        													<div class="col-md-12">
        													   <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
														
        														<div class="col-md-6 col-lg-6 col-xxl-6">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 active" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="radio" onchange="passorfail(this)" name="usage" value="pass" checked="checked">
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">PASS</span>
        																
        																</span>
        															</label>
        														</div>
        														<!--end::Col-->
        														<!--begin::Col-->
        														<div class="col-md-6 col-lg-6 col-xxl-6">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="radio" onchange="passorfail(this)" name="usage" value="fail">
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">FAIL</span>
        																
        																</span>
        															</label>
        														</div>
														<!--end::Col-->
														<!--begin::Col-->

														<!--end::Col-->
													            </div>
													            
        													</div>
        													
        													
        												    <div class="col-md-12 mt-5" id="main_subject">
        													   <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
														
        														<div class="col-md-6 col-lg-6 col-xxl-6">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 active" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="radio" onchange="englishpaper(this)" name="subject" value="MATHS" checked="checked">
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block"> MATHS</span>
        																
        																</span>
        															</label>
        														</div>
        														<!--end::Col-->
        														<!--begin::Col-->
        														<div class="col-md-6 col-lg-6 col-xxl-6">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="radio" onchange="englishpaper(this)" name="subject" value="ENGLISH" >
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">ENGLISH</span>
        																
        																</span>
        															</label>
        														</div>
														<!--end::Col-->
														<!--begin::Col-->

														<!--end::Col-->
													            </div>
													            
        													</div>
        													 <div class="col-md-12 mt-5" id="ENGLISH_PAPER" style="display:none" >
        													   <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
														
        														<div class="col-md-4 col-lg-4 col-xxl-4">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 active" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="checkbox" name="READING" value="1" checked="checked">
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">READING</span>
        																
        																</span>
        															</label>
        														</div>
        														<!--end::Col-->
        														<!--begin::Col-->
        														<div class="col-md-4 col-lg-4 col-xxl-4">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="checkbox"  name="WRITING" value="1" >
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">WRITING</span>
        																</span>
        															</label>
        														</div>
        															<div class="col-md-4 col-lg-4 col-xxl-4">
        															<label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
        																<!--begin::Radio button-->
        																<span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        																	<input class="form-check-input" type="checkbox" name="SPEAKING" value="1" >
        																</span>
        																<!--end::Radio button-->
        																<span class="ms-5">
        																	<span class="fs-4 fw-bolder mb-1 d-block">SPEAKING</span>
        																</span>
        															</label>
        														</div>
														<!--end::Col-->
														<!--begin::Col-->

														<!--end::Col-->
													            </div>
													            
        													</div>
        													
        													
        													
        													<!--begin::Label-->
        												</div>
												    </div>
													<div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Result Title</label>
														    <input type="text" class="form-control form-select-solid" name="title" required>
														</div>
														
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Uploads file(PDF)</label>
														    <input type="file" class="form-control form-select-solid" name="result_file" required accept="application/pdf">
														</div>
												    </div>
												    
												</div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													<button type="submit"  class="btn btn-success" style="margin:0px 20px">Submit</button>
													
												</div>
											</form>
												
											</div>
											<!--end::Body-->
										</div>
									</div>
							
									
									<!--end::Col-->
									<!--begin::Col-->
								
								
									
								</div>
							
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
						<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">List Of Uploads Results (PDF)</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
        								                          
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Booking ID</th>
								                                  <th>Title</th>
								                                  <th>Subject</th>
								                                  <th>Result</th>
								                                  <th>Uploads Date</th>
								                                  <th>Uploads File</th>
								                                  <th>Manage</th>
								                                  
								                                </tr>
								                              </thead>
								                              <tbody>
							@php	                                  
							 $mystatements=App\Models\CandidateResult::where('booking_id',$data->booking_id)->get();
						    @endphp
						        @foreach($mystatements as $statements)
						            <tr>
						                <td>{{ $statements->booking_id }}</td>
						                <td>{{ $statements->heading_test }}</td>
						                <td>{{ $statements->mathorenglish }}</td>
						                <td>{{ $statements->passorfail }}</td>
						                <td> {{ \Carbon\Carbon::parse($statements->created_at)->format('d/m/Y') ?? ''}}</td>
						                <td><a target="__blank" href="{{ url('/updatecore/public/'.$statements->result_file) }}" class="badge badge-success">View</a>
						                </td>
						                <td>
						                    <a id="delete" href="{{ url('admin/candidate-result-delete/index/'.$statements->id) }}" class="badge badge-danger">Delete</a>
						                </td>
						            </tr>
						        
						        
						        @endforeach
								                               
								                                
								                              </tbody>
								                            </table>
								                        

									                      </div>
									                    </div>
									                  </div>
									                </div>
									              </div>
												<!--end::Post-->
												<!--begin::Separator-->
												<div class="separator mb-4"></div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													
												</div>
												
											</div>
											<!--end::Body-->
										</div>
									
									</div>
									
										<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Confirm Details</h4>
									                    <div class="row">
									                         <div class="col-md-5"></div>
									                        <div class="col-md-3">
									                             <a href="{{ url('admin/exambooking/maindetails/'.$data->id) }}" class="btn-sm btn-danger" style="color:#fff">BACK</a>
									                            <a href="{{ url('admin/functionalskills-candidate-result-send/'.$data->booking_id) }}" class="btn-sm btn-success" style="color:#fff">SEND RESULT</a>
									                            
									                            
									                            
									                        </div>
									                        <div class="col-md-3">
									                            @if($data->is_result_published==1)
									                            <span class="badge badge-success">Result has been send.</span>
									                            @endif
									                            @if($data->is_result_published==0)
									                            <span class="badge badge-danger">Not Yet</span>
									                            @endif
									                            
									                        </div>
									                    </div>
									                    
									                  </div>
									                </div>
									              </div>
												<!--end::Post-->
												<!--begin::Separator-->
												<div class="separator mb-4"></div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													
												</div>
												
											</div>
											<!--end::Body-->
										</div>
									
									</div>

<script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
        <script>
            function addmore(){
                $("#add_more_syllabus").append('<div class="row"><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">Syllabus/Paper No</label><input type="text" name="syllabus[]" class="form-control form-control-solid"></div><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">Paper Title</label><input type="text" class="form-control form-control-solid" name="paper_title[]"></div><div class="col-md-2 fv-row"><label class="required fs-6 fw-bold mb-2">Exam Date</label><input type="date" class="form-control form-control-solid" name="exam_date[]"></div><div class="col-md-2 fv-row"><label class="required fs-6 fw-bold mb-2">Time</label><select class="form-select form-select-solid"  name="exam_time[]"><option value="">Select</option><option value="PM">PM</option><option value="AM">AM</option></select></div><div class="class="col-md-2 fv-row""><a onclick="deleterow(this)" style="cursor:pointer;color:red">Delete</a></div><hr></div>');
            }
          
          
          function deleterow(el){
              $(el).closest(".row").remove();
          }
          
          function passorfail(el){
              var val=el.value;
              if(val=='pass'){
                  $("#main_subject").show();
              }
              else if(val=='fail'){
                  $("#main_subject").show();
              }
          }
          
          
          
        function englishpaper(el){
              var val=el.value;
              if(val=='ENGLISH'){
                  $("#ENGLISH_PAPER").show();
              }
              else if(val=='MATHS'){
                  $("#ENGLISH_PAPER").hide();
              }
          }
        </script>
@endsection