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
h1.mb-3 {
    background: aquamarine;
    border-radius: 15px;
    padding: 10px;
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
										<li class="breadcrumb-item text-muted">exam Result</li>
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
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Exam Type: {{ $data->main_exam_type }}</a>
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Booking ID: <span class="badge badge-success">{{ $data->booking_id }}</span></a>
																	<span class="text-gray-400 fw-bold" style="color:black !important;">Exam booking date: {{ $data->created_at->format('d-M-Y') }}</span>
																</div>
															</div>
															<div class="col-md-6 d-flex flex-grow-1" style="margin-bottom: 10px;">
																<div class="d-flex flex-column">
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Name: {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</a>
																	<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Eamil: <span class="badge badge-success">{{ $data->email }}</span></a>
																	<span class="text-gray-400 fw-bold" style="color:black !important;">Phone: {{ $data->phone }}</span>
																				
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
        								                            @if($data->main_exam_type=='GCSE' || $data->main_exam_type=='A Level' ||  $data->main_exam_type=='IGCSE' )
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                  <th>Exam Series</th>
								                                  <th>Subject</th>
								                                  <th>Unit Code</th>
								                                  <th>Option Code</th>
								                                  <th>Fees</th>
								                                </tr>
								                              </thead>
								                              <tbody>
								                                @foreach(json_decode($data->exam_information) as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_board}}</td>
								                                  <td>{{$exam->exam_series}}</td> 
								                                  @php
								                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
								                                  @endphp
								                                  <td class="text-danger">{{$subject->subject_name}}</td>
								                                  <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
								                                  <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
								                                   <td>£ {{ $exam->fees }}</td>
								                                </tr>
								                                @endforeach
								                                
								                              </tbody>
								                            </table>
								                        	@endif

								                        	@if($data->main_exam_type=='AAT')
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                  <th>Branch</th>
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
								                                  <td>{{ $exam->exam_series }}</td>
								                                  <td>{{$exam->type}}</td> 
								                                  @php
								                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
								                                  @endphp
								                                  <td class="text-danger">{{$subject->subject_name}}</td>
								                                  <td class="text-danger">{{ $exam->option_code }}</td>
								                                 
								                                   <td>£ {{ $exam->fees }}</td>
								                                   <td>  {{ \Carbon\Carbon::parse($exam->exam_date)->format('d-m-Y')}}</td>
								                                   <td>{{ $exam->start_exam_time }}</td>
								                                </tr>
								                                @endforeach
								                                
								                              </tbody>
								                            </table>
								                        	@endif

								                        	@if($data->main_exam_type=='ACCA')
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                  <th>Exam Level</th>
								                                  <th>Subject</th>
								                                  <th>Exam Branch</th>
								                                  <th>Fees</th>
								                                  <th>Date </th>
								                                  <th>Time</th>
								                                </tr>
								                              </thead>
								                              <tbody>
								                                @foreach(json_decode($data->exam_information) as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_board}}</td>
								                                  <td>{{$exam->type}}</td> 
								                                  @php
								                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
								                                  @endphp
								                                  <td class="text-danger">{{$subject->subject_name}}</td>
								                                  <td class="text-danger">{{ $exam->option_code }}</td>
								                                 
								                                   <td>£ {{ $exam->fees }}</td>
								                                    <td>  {{ \Carbon\Carbon::parse($exam->exam_date)->format('d-m-Y')}}</td>
								                                   <td>{{ $exam->start_exam_time }}</td>
								                                   
								                                </tr>
								                                @endforeach
								                                
								                              </tbody>
								                            </table>
								                        	@endif

								                        	@if($data->main_exam_type=='Functional Skills')
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
										<div class="card mb-5 mb-xxl-8" id="subjectupdate_section"  @if (Session::has('success')) @else  style="display:none"  @endif>
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
												<form action="{{ url('admin/get/updatesubject/') }}" method="post">
													@csrf

												<!--end::Post-->
												<!--begin::Separator-->
												<div class="separator mb-4"></div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													<button type="submit"  class="btn btn-success" style="margin:0px 20px">Submit</button>
													<button type="button" onclick="openeditsubject_cancel()" class="btn btn-primary">Cancel</button>
												</div>
											</form>
												
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
										<div class="card mb-5 mb-xxl-8" id="subjectupdate_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
												<form  class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ url('admin/centre/result/'.$data->id) }}" method="post">
												    @csrf
												    
												       <input type="hidden" name="main_exam_type" value="{{ $data->main_exam_type }}">
												       <input type="hidden" name="user_id" value="{{ $data->user_id }}">
												       <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
												       <input type="hidden" name="uci_number" value="{{ $data->uci_number }}">
												       <input type="hidden" name="uln_number" value="{{ $data->uln_number }}">
												       <input type="hidden" name="email" value="{{ $data->email }}">
												       <input type="hidden" name="email" value="{{ $data->email }}">
												        <input type="hidden" name="name" value="{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}">
												        <input type="hidden" name="candidate_id" value="{{ $data->Candidate_number }}">
												        <input type="hidden" name="exam_series" value="{{ $data->exam_series }}">
												       <input type="hidden" name="exam_id" value="{{ $data->id }}">
												    
											
													<!--begin::Heading-->
													<div class="mb-13 text-center">
														<!--begin::Title-->
														<h1 class="mb-3">Components Result</h1>
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
														<div class="col-md-3 fv-row">
															<label class="required fs-6 fw-bold mb-2">Board</label>
															<select class="form-select form-select-solid"  name="exam_board">
																
																<option value="EDEXCEL">EDEXCEL</option>
																<option value="OCR">OCR</option>
																<option value="AQA">AQA</option>
																<option value="Cambridge CIE">Cambridge CIE</option>
																<option value="WJEC">WJEC</option>
																
															</select>
														</div>
    														<div class="col-md-3 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Subject/Paper</label>
    													        <input type="text" class="form-control form-control-solid" name="subject"  required>
    														</div>
    														<div class="col-md-2 fv-row">
    															<label class= "fs-6 fw-bold mb-2">SWM</label>
    													        <input type="text" class="form-control form-control-solid" name="mark">
    														</div>
    														<div class="col-md-2 fv-row">
    															<label class= "fs-6 fw-bold mb-2">Grade</label>
    													        <input type="text" class="form-control form-control-solid" name="grade">
    														</div>
    														<div class="col-md-2 fv-row">
    															<label class= "fs-6 fw-bold mb-2">Endrosment</label>
    													        <input type="text" class="form-control form-control-solid" name="endrosment">
    														</div>
    														
														</div>
													<hr>
													<div id="add_more_syllabus">
													    
													    
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-15 fv-row">
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack">
															<!--begin::Label-->
															<div class="fw-bold me-5">
															
															</div>
															<!--end::Label-->
															<!--begin::Checkboxes-->
															<div class="d-flex align-items-center">
																<!--begin::Checkbox-->
																<label class="form-check form-check-custom form-check-solid me-10">
																
																	<!--<span class="form-check-label fw-bold" onclick="addmore()">Add More</span>-->
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																
																<!--end::Checkbox-->
															</div>
															<!--end::Checkboxes-->
														</div>
														<!--end::Wrapper-->
													</div>
													
													
													<!---->
												
													
												
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-15 fv-row">
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack">
															<!--begin::Label-->
															<div class="fw-bold me-5">
															
															</div>
															<!--end::Label-->
															<!--begin::Checkboxes-->
															<div class="d-flex align-items-center">
																<!--begin::Checkbox-->
														
															</div>
															<!--end::Checkboxes-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Input group-->
													
													<!--end::Actions-->
												<div>
												    
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
						
						<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Result Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
        								                           
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                  <th>Exam Type</th>
								                                  <th>Subject</th>
								                                  <th>SWM</th>
								                                  <th>Grade</th>
								                                  <th>More</th>
								                                </tr>
								                              </thead>
								                              <tbody>
								                                  @php
								                                    $allResult=DB::table('exam_centre_results')->where('is_deleted',0)->get();
								                                  @endphp
								                                @foreach($allResult as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_board}}</td>
								                                  <td>{{$exam->main_exam_type}}</td> 
								                                  <td class="text-danger">{{$exam->subject}}</td>
								                                  <td><label class="badge badge-danger">{{$exam->mark}}</label></td>
								                                  <td><label class="badge badge-danger">{{ $exam->grade }}</label></td>
								                                   <td>
								                                       <a id="delete" href="{{url('admin/centre/result-delete/'.$exam->id) }}"><i class="fa fa-times"></i></a>
								                                       
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
									                        <div class="col-md-4"></div>
									                        <div class="col-md-5">
									                             <!--<a href="{{ url('admin/exambooking/maindetails/'.$data->id) }}" class="btn-sm btn-danger" style="color:#fff">Back</a>-->
									                             
									                            <a href="{{ url('admin/centre/result-print/'.$data->id) }}" class="btn btn-primary" style="color:#fff">Print Result</a>
									                            <!--<a href="{{ url('admin/candidate-gcse-alevel-igcse-confirmation/send-exam-entry/'.$data->id) }}" class="btn btn-success" style="color:#fff">Sent Result </a>-->
									                            
									                            
									                            
									                        </div>
									                        <div class="col-md-3">
									                         
									                            
									                        </div>
									                        
									                    </div>
									                    
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card" id="my_details">
        								                            
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Exam Board</th>
								                                 
								                                  <th>Subject </th>
								                                  <th>Details</th>
								                                  <th>Manage</th>
								                          
								                                
								                                </tr>
								                              </thead>
								                              <tbody>
								                                  @php
								                                    $alllist=App\Models\GcseExamConfirmation::where('booking_id',$data->booking_id)->where('is_deleted',0)->get();
								                                  @endphp
								                                  @foreach($alllist as $list)
								                                  <tr>
								                                      <td>{{$list->exam_board}}</td>
								                                      <td>{{$list->exam_subject}}</td>
								                                      
								                                      <td>
								                                          
								                       
								                                 <table class="table table-borderless" style="border:none">
								                                     <tr class="class="table-success"">
								                                         <th>Syllabus</th>
								                                         <th>Paper Title</th>
								                                         <th>Date</th>
								                                         <th>Time</th>
								                                     </tr>
								                                              @foreach(json_decode($list->exam_details) as $details)
							                                        <tr>
							                                           
							                                           <td>{{ $details->syllabus }}</td>
							                                           <td>{{ $details->paper_title }}</td>
							                                           <td>
							                                         @if($details->exam_date =='')
							                                         @else
							                                               {{ \Carbon\Carbon::parse($details->exam_date)->format('d/m/Y') ?? ''}}
							                                               @endif</td>
							                                           <td>{{ $details->exam_time }}</td>
							                                          
							                                        
							                                        </tr> 
							                                        @endforeach
							                                         </table>
								                                          
								                                      </td>
								                                      <td>
								                                          <a id="delete" href="{{ url('admin/candidate-gcse-alevel-igcse-confirmation/delete-one-item/'.$list->id) }}" class="badge badge-danger" style="color:#fff">Delete</a>
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
									
									
							
					

<script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
        <script>
            function addmore(){
                $("#add_more_syllabus").append('<div class="row"><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">Board</label><input type="text" name="syllabus[]" class="form-control form-control-solid"></div><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">Subject</label><input type="text" class="form-control form-control-solid" name="paper_title[]"></div><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">SWM</label><input type="text" class="form-control form-control-solid" name="exam_date[]"></div><div class="col-md-3 fv-row"><label class="required fs-6 fw-bold mb-2">Grade</label><input type="text" name="grade[]"></div>	<div class="col-md-2 fv-row"><label class= "fs-6 fw-bold mb-2">Endrosment</label><input type="text" class="form-control form-control-solid" name="endrosment"></div><div class="class="col-md-2 fv-row""><a onclick="deleterow(this)" style="cursor:pointer;color:red">Delete</a></div><hr></div>');
            }
          
          
          function deleterow(el){
              $(el).closest(".row").remove();
          }
        </script>
@endsection