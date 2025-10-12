@extends('layouts.backend')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend') }}/datepicker/mc-calendar.min.css" />
<script src="{{ asset('frontend') }}/datepicker/mc-calendar.min.js"></script>
<script>
     const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
    });
    </script>
    
    <style>
        a.btn-sm.btn-primary {
    font-size: 9px !important;
    padding: 6px 6px !important;
},
      .btn-sm.btn-danger {
    font-size: 9px !important;
    padding: 6px 6px !important;
}

.container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 88%;
    }
    </style>
        
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
	
		<div class="modal-content">
		
			<form class="form"  action="{{url('admin/all-confirmation/bydate/fileUploads')}}" method="post" enctype='multipart/form-data'>
				@csrf
			
				<div class="modal-header">
					<h2 class="fw-bolder">File Update</h2>
				</div>
			
				<div class="modal-body py-10 px-lg-17">
				    
				   
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Candidate file Uplods</label>
                        <input type="file" name="fileUpload" class="form-control-file" accept="image/*,.pdf" required >
                        <input type="hidden" name="id" id="my_id">
                        
                      </div>
                    
				
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					
					<button type="submit" class="btn btn-primary"><span class="indicator-label">Update</span>
						
					</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div> 
</div>

<div class="modal fade" id="myexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
	
		<div class="modal-content">
		
			<form class="form"  action="{{ url('admin/custom-candidate-confirm-exam/booking') }}" method="post" enctype='multipart/form-data'>
				@csrf
			
				<div class="modal-header">
					<h2 class="fw-bolder">Create Candidate Confirmation</h2>
				</div>
			
				<div class="modal-body py-10 px-lg-17">
				    
				   
                     
												    
												       <input type="hidden" name="candidate_id" value="">
												       <input type="hidden" name="booking_id" value="">
												       <input type="hidden" name="email" value="">
												       <input type="hidden" name="exam_id" value="">
												    
											
													<!--begin::Heading-->
													<div class="mb-13 text-center">
														<!--begin::Title-->
													
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
														<div class="col-md-12 fv-row">
															<label class="required fs-6 fw-bold mb-2">Candidate Full Name</label>
																<input type="text" class="form-control form-control-solid" name="name" required placeholder="Enter Candidate Full Name">
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Candidate Email</label>
																<input type="text" class="form-control form-control-solid" name="email" required placeholder="Enter Candidate Email">
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Candidate Phone</label>
																<input type="text" class="form-control form-control-solid" name="phone" required placeholder="Enter Candidate Phone">
														</div>
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Institution</label>
																<input type="text" class="form-control form-control-solid" name="exam_type" required placeholder="Enter Institution">
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Date</label>
															<!--begin::Input-->
													     <input type="date" class="form-control form-control-solid" name="exam_date"  required>
															<!--end::Input-->
														</div>
															<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Time</label>
															<!--begin::Input-->
													<input type="text" class="form-control form-control-solid" name="exam_time" required value="11 am">
															<!--end::Input-->
														</div>
															<div class="col-md-6 fv-row">
															<label class="required fs-6 fw-bold mb-2">Exam Centre</label>
															<!--begin::Input-->
													<select class="form-select form-select-solid"  name="exam_branch">
																
																<option value="Forest Gate Branch 54 Upton Lane London E7 9LN">Forest Gate</option>
																<option value="Ilford Branch 269 Ilford Lane, Ilford IG1 2SD">Ilford Lane</option>
															
																
																	
															</select>
															<!--end::Input-->
														</div>
														
															<div class="col-md-12 fv-row">
															<label class="required fs-6 fw-bold mb-2">Subject/Paper Information</label>
															<!--begin::Input-->
													         <input type="text" class="form-control form-control-solid" name="subject" required placeholder="Enter Subject/Paper information">
															<!--end::Input-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Details</label>
														<textarea class="form-control form-control-solid" rows="3" name="details" placeholder=" Details" required>Thank you for booking your  Exam with ECL.Please find below your confirmation.
										
														</textarea>
													</div>
													
														<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Requirments</label>
														<textarea class="form-control form-control-solid" rows="3" name="requirments" placeholder=" Details" required>You must bring your ID (that was submitted with the registration form) and arrive 15
minutes before the exam start time.</textarea>
													</div>
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">Rescheduling</label>
														<textarea class="form-control form-control-solid" rows="3" name="rescheduling" placeholder=" Details" required>Minimum of 2 working days notice, rescheduling fee: £30</textarea>
													</div>
													
													<div class="d-flex flex-column mb-8">
														<label class="fs-6 fw-bold mb-2">File/Image</label>
														<input type="file" name="fileUpload" class="form-control form-control-solid" accept="application/pdf,image/jpeg,image/png"> 
													</div>
												
												<div>
												    
												</div>
											
                    
				
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					
					<button type="submit" class="btn btn-primary"><span class="indicator-label">Update</span>
						
					</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div> 
</div>

<!-- Modal -->

<!-- candidate -->



<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->  <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Student Exam Date(AAT,ACCA,Functional Skills)</h1>
                <!--end::Title-->
            </div>
            
      

        </div>
        <!--end::Container-->
    </div>
					
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container">
						
							
                                                           <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                               
                            </h3>
                        </div>
              
                        <div class="card-body">
                          
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                         <button type="button" data-toggle="modal" data-target="#myexampleModal" class="btn-sm btn-warning" style="color:#fff">New Exam Entry</button>
                                    </div>
                                    <div class="col-md-9 row">
                                         <form action="{{ url('admin/all-confirmation/bydate') }}" method="post">
                                        @csrf
                                            <div class="col-md-4">
                                               
                                            </div>
                                            <div class="col-md-5">
                                                <input type="date" name="search_date" class="form-control" required>
                                            </div>
                                             <div class="col-md-3">
                                                <button type="submit" class="btn-sm btn-danger" style="color:#fff">submit</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                   
                                </div>
                           
                                
                            
                        </div>
                    </div>
                </div>
            </div>
						                <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mb-5 mb-xl-8">
                                                    <div class="card-body py-3">
                                                        <!--begin::Table container-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <!--begin::Table-->
                                                           
                                                            @if(isset($searchdata))
                                                               <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                                                <!--begin::Table head-->
                                                                  <thead>
                            								                                <tr>
                            								                                  <th>Branch</th>
                            								                                  <th>Subject</th>
                            								                                  <th>Date Time </th>
                            								                                  <th>Booking ID</th>
                            								                                  <th>Exam Type</th>
                            								                          
                            								                                  <th>Records</th>
                            								                                   <th> File</th>
                            								                                  <th> Manage</th>
                            								                                    
                            								                                </tr>
                            								                              </thead>
                            								                              <tbody>
                            								                             
                            								                                @foreach($searchdata as $exam)
                            								                                <tr>
                            								                                  <td>{{$exam->exam_branch}}</td>
                            								                                  @if($exam->is_mock==1)
                            								                                  <td>MOCK {{$exam->subject}}</td>
                            								                                  <td>{{$exam->exam_date}}, {{$exam->exam_time}}</td>
                            								                                  @else
                            								                                  <td>{{$exam->subject}}</td>
                            								                                  <td>{{$exam->exam_date}}, {{$exam->exam_time}}<br>
                            								                                
                            								                                   {{$exam->name ?? '' }} <br> {{$exam->email ?? '' }} <br> {{$exam->phone ?? '' }}</td>
                            								                                  @endif
                            								                                  
                            								                                  
                            								                                  <td>{{$exam->booking_id}}<br>
                            								                                    <!--<a href=""><span class="badge badge-danger">view booking</span></a>-->
                            								                                    </td>
                            								                                 
                            								                                  <td class="text-danger">{{$exam->exam_type}}<br><label class="badge badge-danger">{{ $exam->created_at }}</label></td>
                            								                                  
                            								                                  <td>
                            								                                     <select id="{{ $exam->id }}" onchange="recordsChange(this)">
                            								                                           <option value="0" @if($exam->attend_records==0) selected @endif>select</option>
                            								                                          <option value="1" @if($exam->attend_records==1) selected @endif>Absent</option>
                            								                                          <option value="2" @if($exam->attend_records==2) selected @endif>Attended</option>
                            								                                      </select>
                            								                                  </td>
                            								                                  
                            								                                   
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
                            								                                   
                            								                                      <td>
                            								                                       @if($exam->files !=NULL)
                            								                                       
                            								                                       	<a id="{{ $exam->id }}" onclick="myfileUploadsData(this)" href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="color:#fff">Update File</a>
                            								                                
                            								                                     @else
                            								                                      <a id="{{ $exam->id }}" onclick="myfileUploadsData(this)" href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" style="color:#fff;font-size: 9px !important;padding: 6px 6px !important">Upload File</span></a>
                            								                                      @endif
                            								                                   </td>
                            								                                   
                            								                                </tr>
                            								                                @endforeach
                            								                                
                            								                              </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            @else
                                                            <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                                                <!--begin::Table head-->
                                                                  <thead>
                            								                                <tr>
                            								                                  <th>Branch</th>
                            								                                  <th>Subject</th>
                            								                                  <th>Date Time </th>
                            								                                  <th>Booking ID</th>
                            								                                  <th>Exam Type</th>
                            								                          
                            								                                  <th>Confirmation</th>
                            								                                   <th> File</th>
                            								                                    <th>Manage</th>
                            								                                </tr>
                            								                              </thead>
                            								                              <tbody>
                            								                                  @php
                            								                                  $maindata =App\Models\CandidateConfirmation::orderBy('id','DESC')->take(200)->get();
                            								                                  @endphp
                            								                                @foreach($maindata as $exam)
                            								                                 @php
                            								                                  $myexam=App\Models\ExamRequest::where('booking_id',$exam->booking_id)->select(['first_name','middle_name','last_name'])->first();
                            								                                  @endphp
                            								                                
                            								                                <tr>
                            								                                  <td>@if($exam->exam_branch=="Ilford Branch 269 Ilford Lane, Ilford IG1 2SD") Ilford Branch @elseif($exam->exam_branch=="Forest Gate Branch 54 Upton Lane London E7 9LN") Forest Gate Branch @endif</td>
                            								                                
                            								                                  <td>{{$exam->subject}}</td>
                            								                                  <td>{{$exam->exam_date}}, {{$exam->exam_time}}<br>
                            								                                
                            								                                   {{$exam->name ?? '' }} <br> {{$exam->email ?? '' }} <br> {{$exam->phone ?? '' }}
                            								                                 
                            								                                  </td>
                            					
                            								                                
                            								                                  
                            								                                  
                            								                                  
                            								                                  
                            								                                    <td>{{$exam->booking_id}}<br>
                            								                                    <!--<a href="#"><span class="badge badge-danger">view booking</span></a>-->
                            								                                    </td>
                            								                                 
                            								                                  <td class="text-danger">{{$exam->exam_type}}<br><label class="badge badge-danger">{{ $exam->created_at }}</label></td>
                            								                                  
                            								                                  <td>
                            								                                      <select id="{{ $exam->id }}" onchange="recordsChange(this)">
                            								                                          <option value="0" @if($exam->attend_records==0) selected @endif>select</option>
                            								                                          <option value="1" @if($exam->attend_records==1) selected @endif>Absent</option>
                            								                                          <option value="2" @if($exam->attend_records==2) selected @endif>Attended</option>
                            								                                      </select>
                            								                                  </td>
                            								                                  
                            								                                  
                            								                                    
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
                            								                                   <td><span class="badge badge-light-danger">Not Uploaded</span></td>
                            								                                   @endif
                            								                                   
                            								                                   <td>
                            								                                       @if($exam->files !=NULL)
                            								                                       
                            								                                       	<a id="{{ $exam->id }}" onclick="myfileUploadsData(this)" href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal" style="color:#fff">Update File</a>
                            								                                
                            								                                     @else
                            								                                      <a id="{{ $exam->id }}" onclick="myfileUploadsData(this)" href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" style="color:#fff;font-size: 9px !important;padding: 6px 6px !important">Upload File</span></a>
                            								                                      @endif
                            								                                   </td>
                            								                                   
                            								                                </tr>
                            								                                @endforeach
                            								                                
                            								                              </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            @endif
                                                            
                                                            
                                                            
                                                            
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table container-->
                                                    </div>
                                                    <!--begin::Body-->
                                                </div>
                                            </div>
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
							<!--end::Container-->
						</div>
					
					</div>




		<!--end::Page Custom Javascript-->

  <script>
  	function myfileUploadsData(el){
  	     $("#my_id").empty();
  		var id=el.id;
  		 $("#my_id").val(id);
  	  
       

  	}
  	
  	
  	
  	
  	
  </script>
     <script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
        
<script>
function recordsChange(selectElement) {
    var selectedValue = selectElement.value;  // Get the selected value

    // Make the AJAX request
    $.ajax({
        url: "{{ route('get.admin.records') }}",  // Route to your controller
        type: "GET",  // or "POST" if required
        data: {
            exam_id: selectElement.id,  // Send the exam id as part of the data
            status: selectedValue,      // Send the selected value
            _token: "{{ csrf_token() }}"  // Include the CSRF token for security
        },
        success: function(response) {
            // Handle the response and show success SweetAlert
            if(response.success) {
                alert('update success');
                Swal.fire({
                    icon: 'success',
                    title: 'Records Updated!',
                    text: 'The status for exam ID ' + response.exam_id + ' has been updated to ' + (response.status == 1 ? 'Absent' : 'Attended') + '.',
                });
            } else {
                       alert('update failed');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'There was an error updating the record. Please try again.',
                });
            }
        },
        error: function(xhr, status, error) {
            // Show an error SweetAlert if the request fails
            Swal.fire({
                icon: 'error',
                title: 'Request Failed',
                text: 'An error occurred while processing the request.',
            });
        }
    });
}
</script>
@endsection