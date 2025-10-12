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
								
									<div class="col-xl-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-xxl-8" id="subject_list_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">ISEB Subject & Paper Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Subject Name</th>
								                                  
								                                  <th>Date </th>
								                                  <th>Time </th>
								                             
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                 
								                                  @foreach(json_decode($data->subject_details) as $exam)
								                                  
								                                  <tr>
								                                      <td>{{ $exam->subject }} </td>
								                                      <td> {{ $exam->exam_date }} </td>
								                                      <td> {{ $exam->time }} </td>
								                                  
								                                     
								                                  </tr>
								                                  @endforeach
								                               
								                              	
								                              </tbody>
								                            </table>
									                      </div>
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
										<div class="card mb-5 mb-xxl-8" id="subjectupdate_section">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
												<form  class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{url('admin/iseb-test/confirmation/submit')}}" method="post" enctype='multipart/form-data'>
												    @csrf
													<!--begin::Heading-->
													<div class=" text-center">
													
														<div class="text-gray-400 fw-bold fs-5">
														<a href="#" class="fw-bolder link-primary">Confirm Exam Booking</a>.</div>
													
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
												
													<div class="fv-plugins-message-container invalid-feedback"></div></div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row g-9 mb-8">
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Type</label>
															<input type="text" class="form-control form-control-solid" name="exam_type" required value="ISEB Exam">
															<input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
															<input type="hidden" name="exam_id" value="{{ $data->id }}">
															<input type="hidden" name="email" value="{{ $data->email }}">
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Centre</label>
													            <select class="form-select form-select-solid" name="exam_branch">
																<option value="Forest Gate Branch 54 Upton Lane London E7 9LN">Forest Gate</option>
																<option value="Ilford Branch 269 Ilford Lane, Ilford IG1 2SD">Ilford Lane</option>
															</select>
														</div>
														</div>
													<div class="row g-9 mb-8">
													    <div class="col-md-12">
    														<div class="col-md-4 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Subject and Paper</label>
    															<!--begin::Input-->
    												                <input type="text" class="form-control form-control-solid" name="subject" required>
    															<!--end::Input-->
    														</div>
    														<div class="col-md-4 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Exam Date</label>
    															<!--begin::Input-->
    													        <input type="text" class="form-control form-control-solid" name="exam_date" id="date_of_birth" required>
    															<!--end::Input-->
    														</div>
    														<div class="col-md-4 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Exam Time</label>
    															<!--begin::Input-->
    													        <input type="text" class="form-control form-control-solid" name="exam_time" required value="10 am">
    															<!--end::Input-->
    														</div>
    													</div>
													
													</div>
													
													<div class="row g-9 mb-8" id="add_more">
													
													</div>
													<!--<div class="row g-9 mb-8">-->
													<!--	<div class="col-md-12 fv-row text-right">-->
													<!--		<button onclick="add_more_click()" type="button" class="btn-sm btn-success">Add More</button>-->
													<!--	</div>-->
													<!--</div>-->
													
													
													
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Details</label>
														<textarea class="form-control form-control-solid" rows="3" name="details" placeholder=" Details" required>Thank you for booking your ISEB  Exam with ECL.Please find below your confirmation.
										
														</textarea>
													</div>
													
														<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Requirments</label>
														<textarea class="form-control form-control-solid" rows="3" name="requirments" placeholder=" Details" required>You must bring your ID (that was submitted with the registration form) and arrive 15 minutes before the exam start time.</textarea>
													</div>
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Rescheduling</label>
														<textarea class="form-control form-control-solid" rows="3" name="rescheduling" placeholder=" Details" required>Minimum of 2 working days notice, rescheduling fee: £30</textarea>
													</div>
													
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">File/Image</label>
														<input type="file" name="fileUpload" class="form-control form-control-solid" accept="application/pdf,image/jpeg,image/png"> 
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-15 fv-row">
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack">
															<!--begin::Label-->
															<div class="fw-bold me-5">
																<label class="fs-6">Notifications</label>
																<div class="fs-7 text-gray-400">Allow Notifications by Phone or Email</div>
															</div>
															<!--end::Label-->
															<!--begin::Checkboxes-->
															<div class="d-flex align-items-center">
																<!--begin::Checkbox-->
																<label class="form-check form-check-custom form-check-solid me-10">
																	<input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="email" checked="checked">
																	<span class="form-check-label fw-bold">Email</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="phone">
																	<span class="form-check-label fw-bold">Phone</span>
																</label>
																<!--end::Checkbox-->
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
									                      <div class="col-md-12 grid-margin stretch-card">
        								                            
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Branch</th>
								                                  <th>Subject</th>
								                                  <th>Date Time </th>
								                                  <th>Booking ID</th>
								                                  <th>Exam Type</th>
								                          
								                                  <th>Confirmation</th>
								                                    <th>Files</th>
								                                </tr>
								                              </thead>
								                              <tbody>
								                                  @php
								                                  $maindata =App\Models\CandidateConfirmation::where('exam_id',$data->id)->get();
								                                  @endphp
								                                @foreach($maindata as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_branch}}</td>
								                                  <td>{{$exam->subject}}</td>
								                                  <td>{{$exam->exam_date}}, {{$exam->exam_time}}</td>
								                                    <td>{{$exam->booking_id}}</td>
								                                 
								                                  <td class="text-danger">{{$exam->exam_type}}</td>
								                                  
								                                  <td><label class="badge badge-danger">{{ $exam->created_at }}</label></td>
								                                  
								                                  
								                                 
								                                  @if($exam->files !=NULL)
								                                  
								                                  
								                                  @php
											                      $myfiles=pathinfo($exam->files, PATHINFO_EXTENSION);
								                                  @endphp
								                                  
								                                   @if($myfiles !='pdf')
								                                  <td><a href="{{ url('/'.$exam->files) }}"  target="_blank"><label class="btn-sm btn-success" style="color:#fff">File</label></a></td>
								                                   @else
								                                     <td><a href="{{ url('/updatecore/public/'.$exam->files) }}"  target="_blank"><label class="btn-sm btn-success" style="color:#fff">File</label></a></td>
								                                   @endif
								                                   
								                                   @else
								                                   <td>Not Uploaded</td>
								                                   @endif
								                                   
								                                   
								                                   
								                                   
								                                   
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
						<!--end::Post-->
					</div>
<script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
<script>


    function add_more_click(){
        $("#add_more").append('<div class="col-md-12"><div class="col-md-4 fv-row"><label class="required fs-6 fw-bold mb-2">Subject and Paper</label><input type="text" class="form-control form-control-solid" name="subject[]"></div><div class="col-md-4 fv-row"><label class="required fs-6 fw-bold mb-2">Exam Date</label><input type="date" class="form-control form-control-solid" name="exam_date[]"></div><div class="col-md-4 fv-row"><label class="required fs-6 fw-bold mb-2">Exam Time</label><input type="text" class="form-control form-control-solid" name="exam_time[]" value="11 am"></div></div>')
    }
    
    
    
    
    
    
    
    
    
</script>
@endsection