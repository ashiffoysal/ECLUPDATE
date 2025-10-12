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
										<li class="breadcrumb-item text-muted">Pradicted Grades</li>
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
									                    <h4 class="card-title text-warning">Subject & Paper Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                          <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>Branch</th>
								                                  <th>Subject</th>
								                                  <th>Date Time </th>
								                                  <th>Exam Type</th>
								                                  <th>Confirmation</th>
								                            
								                                </tr>
								                              </thead>
								                              <tbody>
								                                  @php
								                                  $maindata =App\Models\CandidateConfirmation::where('exam_id',$data->id)->get();
								                                  @endphp
								                                @foreach($maindata as $exam)
								                                <tr>
								                                  <td>{{$exam->exam_branch}} -{{$exam->id}}</td>
								                                  <td>{{$exam->subject}}</td>
								                                  <td>{{$exam->exam_date}}, {{$exam->exam_time}}</td>
								                                 
								                                  <td class="text-danger">{{$exam->exam_type}}</td>
								                                  
								                                  <td>
								                                      @if($exam->attend_records==0)
								                                      <span class="badge badge-danger">Status Not updated</span>
								                                      @endif
								                                      @if($exam->attend_records==1)
								                                      <span class="badge badge-danger">Absent</span>
								                                      @endif
								                                       @if($exam->attend_records==2)
								                                      <span class="badge badge-success">Attended</span>
								                                      @endif
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
												<form  class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{url('admin/ucas-grades/confirmation')}}" method="post" enctype='multipart/form-data'>
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
														<div class="col-md-12 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Type</label>
															<input type="text" class="form-control form-control-solid" name="exam_type" required value="Ucas Mock Exam">
															<input type="hidden" name="booking_id" value="{{ $data->ucas_booking_id }}">
															<input type="hidden" name="exam_id" value="{{ $data->id }}">
															<input type="hidden" name="email" value="{{ $data->email }}">
														</div>
													
														</div>
													<div class="row g-9 mb-8">
													    <div class="col-md-12">
    														<div class="col-md-6 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Subject and Paper</label>
    															<!--begin::Input-->
    												                <input type="text" class="form-control form-control-solid" name="papers_name" required>
    															<!--end::Input-->
    														</div>
    														<div class="col-md-6 fv-row">
    															<label class="required fs-6 fw-bold mb-2">Grades</label>
    															<!--begin::Input-->
    													        <input type="text" class="form-control form-control-solid" name="grades"required>
    															<!--end::Input-->
    														</div>
    													
    													</div>
													
													</div>
													
												<div>
												    
												</div>
												<div class="card-footer d-flex justify-content-end py-6">
															
													<button type="submit"  class="btn btn-success" style="margin:0px 20px">Uploads</button>
													
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
											      <div class="col-md-2">
									                                
									                                    <a href="{{ url('admin/send/predicted-grades/'.$data->id) }}" class="btn btn-primary">Send Grades</a>
									                            </div>
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Confirm Details</h4>
									                    <div class="row">
									                        <div class="col-md-8">
									                                   
									                            </div>
									                            <div class="col-md-2">
									                                
									                                    
									                            </div>
									                            <div class="col-md-2">
									                               @if($data->is_predicted_send==1)
									                                    <a href="{{ url('admin/send/predicted-grades/'.$data->id) }}" class="badge badge-success">Grades have been sent</a>
									                               @endif
									                                  @if($data->is_predicted_send==0)
									                                    <a href="{{ url('admin/send/predicted-grades/'.$data->id) }}" class="badge badge-danger">Grades have not been sent</a>
									                               @endif
									                            </div>
									                        
									                        
									                      <div class="col-md-12 grid-margin stretch-card">
        								                            
								                            <table class="table table-hover" style="font-size: 16px">
								                              <thead>
								                                <tr>
								                                  <th>#</th>
								                                  <th>Subject/Paper</th>
								                                  <th>Grades</th>
								                                  <th>Created At</th>
								                                  <th>Manage</th>
								                                 
								                                </tr>
								                              </thead>
								                              <tbody>
								                                  @php
								                                  $maingradesdata =DB::table('gradesrecords')->where('ucas_id',$data->id)->where('is_deleted',0)->get();
								                                  @endphp
								                                @foreach($maingradesdata as $keys => $exams)
								                                <tr>
								                                  <td>{{ ++$keys }}</td>
								                                  <td>{{ $exams->papers_name }}</td>
								                                  <td>{{ $exams->grades }}</td>
								                                  <td>{{ \Carbon\Carbon::parse($exams->created_at)->format('d-m-Y') }}
</td>
								                                  
								                                   
								                                   <td>
								                                       <a id="delete" href="{{ url('admin/ucas-grades/delete/'.$exams->id) }}"><i class="fa fa-times"></i></a>
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