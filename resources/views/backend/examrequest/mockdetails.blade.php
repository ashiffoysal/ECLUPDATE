@extends('layouts.backend')
@section('content')

<style>
    .form-select {
    padding: 0px 10px;
    box-shadow: none!important;
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
								
							
								
								<div class="card card-flush pt-3 mb-5 mb-lg-10" data-kt-subscriptions-form="pricing">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2 class="fw-bolder">Mock Exam Booking Details</h2>
													</div>
													<!--begin::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
													  
														<a href="{{url('admin/mock-test/export/'.$data->id)}}" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Export PDF</a>
														<a href="{{url('admin/mock-test/confirmation/'.$data->id)}}" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Exam Confirmation</a>
													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
										
									<div class="col-md-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
												</div>
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Candidate Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Booking ID</th>
								                                  <th>Candidate Name </th>
								                                  <th>Email</th>
								                                  <th>Phone</th>
								                                  <th>Payment Status</th>
								                                  <th>Booking Date</th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  @php
								                                    $paidStatus=App\Models\ExamRequest::where('booking_id',$data->booking_id)->select(['is_mock_fees_paid'])->first();
								                                  @endphp
								                                  <tr>
								                                      <td>{{ $data->booking_id }}</td>
								                                      <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
								                                      <td>{{ $data->email }}</td>
								                                      <td>{{ $data->phone }}</td>
								                                      <td>@if($paidStatus->is_mock_fees_paid==0) <span class="badge badge-danger">Unpaid</span> @else <span class="badge badge-success">Paid</span>  @endif</td>
								                                      <td>{{ $data->created_at }}</td>
								                                  </tr>
								                              	
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
												
											</div>
											<!--end::Body-->
										</div>
									</div>
									<!--end::Col-->
									
										<div class="col-md-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
												</div>
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning">Subject & Paper Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
									                          
									                         @if($data->is_apps_booking==0)
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Subject name</th>
								                                  
								                                  <th>Paper 1</th>
								                                  <th>Paper 2</th>
								                                  <th>Paper 3</th>
								                                  <th>Paper 4</th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  @foreach(json_decode($data->exam_information) as $exam)
								                                    @php
								                                        $subjectdetails=App\Models\Subject::where('id',$exam->mock_subject_id)->select(['unit_code'])->first();
								                                    @endphp
								                                  <tr>
								                                      <td>
								                                          {{ $exam->mock_subject_name }} ({{ $subjectdetails->unit_code }})
								                                      
								                                      
								                                      </td>
								                                      <td>
								                                          @if($exam->mock_test_paper_1=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_test_paper_1 ?? 'Not yet' }} @endif
								                                    <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_1=='')  @else {{ $exam->mock_exam_date_1 ?? 'Not yet' }} @endif
								                                    
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_2=='')  @else {{ $exam->mock_test_paper_2 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_2=='')  @else {{ $exam->mock_exam_date_2 ?? 'Not yet' }} @endif
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_3=='')  @else {{ $exam->mock_test_paper_3 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_3=='')  @else {{ $exam->mock_exam_date_3 ?? 'Not yet' }} @endif
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_4=='')  @else {{ $exam->mock_test_paper_4 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_4=='')  @else {{ $exam->mock_exam_date_4 ?? 'Not yet' }} @endif
								                                      </td>
								                                      <td></td>
								                                     
								                                  </tr>
								                                  @endforeach
								                              	
								                              </tbody>
								                            </table>
									                        @elseif($data->is_apps_booking==1)
									                         <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Subject name</th>
								                                  
								                                  <th>Unit Code</th>
								                                  <th>Paper </th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  @foreach(json_decode($data->exam_information) as $exam)
								                                    @php
								                                        $subjectdetails=App\Models\Subject::where('id',$exam->mock_subject_id)->select(['unit_code','subject_name'])->first();
								                                    @endphp
								                                  <tr>
								                                      <td>{{ $subjectdetails->subject_name }} </td>
								                                      <td>{{ $subjectdetails->unit_code }} </td>
								                                      <td>{{ $exam->mock_test_paper }}</td>
								                                     
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
												
											</div>
											<!--end::Body-->
										</div>
									</div>
									
									
									<div class="col-md-12">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body pb-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center mb-5">
													
												</div>
												   <div class="col-md-12 grid-margin stretch-card">
									                <div class="card">
									                  <div class="card-body">
									                    <h4 class="card-title text-warning"></h4>
									                    <span id="success_message_paid_status_update"></span>
									                    <div class="row">
									                    	<form>
										                   
																<div class="col-md-8">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Notes</label>
																   	<textarea class="form-control" name="notes" id="notes" placeholder="Notes">{{ $data->notes }}</textarea>
																   	<span style="color:green;" id="paid_status_success"></span>
																   	<input type="hidden" name="id" id="id" value="{{ $data->id }}">
																  </div>
																</div>
																<div class="col-md-8 mt-5">
																  <button onclick="updatenotes()" type="button" class="btn btn-primary">update</button>
										                       </div>
									                      </form>
									                    </div>
									                  </div>
									                </div>
									              </div>
												<!--end::Post-->
												<!--begin::Separator-->
												<div class="separator mb-4"></div>
												
											</div>
											<!--end::Body-->
										</div>
									</div>
								</div>
							
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>


  <script>
  	function updatenotes(){
  		var id=$("#id").val();
  	
  		var notes = $("#notes").val();
  		$("#paid_status_success").empty();
		$.ajax({
             url: "{{  url('admin/get/mock-exam-notes/') }}",
             type:"GET",
             data:{
             	'id':id,
             	'notes':notes,
             },
             success:function(data){
                	 $("#paid_status_success").html("update success");
                }
        });

  	}
  	
  </script>

@endsection