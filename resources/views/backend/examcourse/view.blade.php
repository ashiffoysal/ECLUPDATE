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
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Course</h1>
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
										<li class="breadcrumb-item text-muted">Course Purchase</li>
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
														<h2 class="fw-bolder">Course Booking Details</h2>
													</div>
													<!--begin::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
													  
														<!--<a href="{{ url('admin/ucasbooking/confirmexam/'.$data->id) }}" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Confirm Exam booking</a>-->
														
														
														
														
														
														<!--<a href="{{ url('admin/ucasbooking/export/'.$data->id) }}" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Export PDF</a>-->
												
													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Options-->
													<div id="kt_create_new_payment_method">
														<!--begin::Option-->
														<div class="py-1">
															<!--begin::Header-->
															<div class="py-3 d-flex flex-stack flex-wrap">
																<!--begin::Toggle-->
																<div class="d-flex align-items-center collapsible toggle" data-bs-toggle="collapse" data-bs-target="#">
																	<!--begin::Arrow-->
																	<!--end::Arrow-->
																	<!--begin::Icon-->
																	<div class="symbol symbol-40px me-3">
																		<div class="symbol-label bg-light">
																			<img src="assets/media/svg/card-logos/mastercard.svg" class="w-35px" alt="">
																		</div>
																	</div>
																	<!--end::Icon-->
																	<!--begin::Summary-->
																	<div class="me-3">
																		<div class="d-flex align-items-center fw-bolder" style="font-size: 14px">Exam Type:
																		<div class="badge badge-light-primary ms-5">Course Purchase</div>
																		</div>
																			<div class="d-flex align-items-center fw-bolder" style="margin:5px 0px !important;font-size: 14px;
">Booking ID: {{ $data->booking_id }}
																		<div class="badge badge-light-primary ms-5"></div>
																		</div>
																		<div class="text-gray-400"></div>
																	</div>
																	<!--end::Summary-->
																</div>
																<!--end::Toggle-->
																<!--begin::Input-->
																<div class="d-flex my-3 ms-9">
																	<!--begin::Radio-->
																	
																	<!--end::Radio-->
																</div>
																<!--end::Input-->
															</div>
															<!--end::Header-->
															<!--begin::Body-->
															<div id="kt_create_new_payment_method_1" class="collapse show fs-6 ps-10">
																<!--begin::Row-->
																<div class="row py-5">
																
																		<div class="card-body" style="padding-left:0px !important;">
														    
														
														<div class="col-md-6 row" id="confimexambooking_date_section" style="display:none">
															<div class="col-md-6 mt-5 ">
																<label>Course Booking Date</label>
																<input type="date" id="bookingsubmitdate" class="form-control" name="date" placeholder="Exam Booking Date" value="">

																<span style="color: green;" id="bookingsubmitdate_success"></span>
																<span  style="color: red;" id="bookingsubmitdate_error"></span>
															</div>
															<div class="col-md-2 mt-5">
																<button style="margin-top:20px;color: white; border-radius: 12px;" type="button" onclick="bookingsubmitcandidatenumber()" class="btn-sm btn-success" style="color:#fff">Update</button>
															</div>
															<div class="col-md-2 mt-5">
																<button style="margin-top:20px;color: white; border-radius: 12px;" type="button" onclick="canclesubmitcandidatenumber()" class="btn-sm btn-warning" style="color:#fff">Cancel</button>
															</div>
														</div>
									
																	<div class="col-md-6">
																	
																	<div class="d-flex mb-3">
																			<!--begin::Label-->
																		
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold"></div>
																			<!--end::Value-->
																		</div>
																		
																	<div class="d-flex mb-3">
																			<!--begin::Label-->
																		
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold"></div>
																			<!--end::Value-->
																		</div>
																	
																		
																		
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">First Name</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">{{ $data->first_name }}</div>
																			<!--end::Value-->
																		</div>
															
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold"></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Last Name</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">{{ $data->last_name }}</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Eamil</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">{{ $data->email }}</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Phone</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">{{ $data->phone }}</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
									
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Contact Number</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">{{ $data->phone }}</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																	
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">
																				<a href="#" class="text-gray-900 text-hover-primary"></a>
																			</div>
																			<!--end::Value-->
																		</div>
																		
																			<div class="d-flex mb-3">
																			<!--begin::Label-->
														
																			<!--end::Label-->
									
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
														
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">
																			<div class="symbol symbol-20px symbol-circle ms-2">
																				
																			</div></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																
									
									
																			<!--end::Svg Icon--></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																
																	<!--end::Row-->
																</div>
																<!--end::Row-->
															</div>
															<!--end::Body-->
														</div>
													
													
													</div>
													<!--end::Options-->
												</div>
												<!--end::Card body-->
											</div>
								<!--begin::Row-->
									<div class="row g-5 g-xxl-8">
								
								</div>
								<div class="row g-5 g-xxl-8">
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
									                    <h4 class="card-title text-warning">Subject Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover">
								                    <thead>
							                                <tr>
							                                  <th>#</th>
							                                  <th>Course Title</th>
							                                  <th>Fees</th>
							                                </tr>
								                    </thead>
								                           
								                          
								                    <tbody>
								                        <tr>
								                            <td>1</td>
								                            <td>{{ $data->course_name }}</td>
								                            <td>£ {{ $data->total_amount }}</td>
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
									
									<!--begin::Col-->
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
									                    <h4 class="card-title text-warning">Payment Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Paid Status</th>
								                                  <th>Total Amount</th>
								                                  <th>Paid Amount</th>
								                   
								                                  <th>Booking ID</th>
								                   
								                                  <th>Paid By</th>
								                                  <th>Transection ID</th>
								                                
								                                 
								                                </tr>
								                              </thead>
								                              @php
								                              	$allwallet=App\Models\Wallet::where('order_id',$data->booking_id)->first();
								                              	$total_amount=0;
								                              @endphp
								                          
								                              <tbody>
								                                <tr>
								                                <td>
								                                	@if( $data->is_paid==0 ) 
								                                	<span class="badge badge-warning">Unpaid</span> 
								                                	@elseif( $data->is_paid==1 ) 
								                                	<span class="badge badge-success">Paid</span>  
								                                    @endif
								                            </td>
								                                  <td>
								                                  	£ {{ $data->total_amount }} 
								                                  </td>
								                                  <td>
								                                  	@if($allwallet ) £ {{ $allwallet->amount }} @else
								                                  	<span class="badge badge-danger"> Not Yet </span>  
								                                  	 @endif
								                                  </td>
								                                  
								                                  <td>{{ $data->booking_id }}</td> 
								                      
								                                  <td class="text-danger">@if($data->payment_option !=null) {{ $data->payment_option }} @else  <span class="badge badge-danger"> Not Yet </span>   @endif</td>
								                                  <td></td>
								                                  </tr>
								                              </tbody>
								                              <tfoot class="mt-5">
								                              	<tr class="mt-5">
								                              	
								                              		<td></td>
								                              		<td></td>
								                              		<td></td>
								                              		<td></td>
								                              		<td></td>
								                              	
								                              		<td><a style="cursor: pointer;" onclick="addpayment()"><span class="badge badge-success">Add Payment</span></a></td>
								                              	</tr>
								                              </tfoot>
								                            </table>
									                      </div>
									                    </div>
									                  </div>
									                </div>
									              </div>


									            <div class="col-md-8 grid-margin stretch-card" id="main_payment" style="display: none">
									                <div class="card">
									              
									                	  <form action="{{ url('/admin/ucas/payment-update') }}" method="post">
									                	  	@csrf
															  <div class="form-group">
														
															    <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
															    <input type="hidden" name="id" value="{{ $data->id }}">
															    <input type="hidden" name="total_amount" value="{{ $data->total_amount }}">
															  </div>
															  <div class="form-group">
															    <label for="exampleInputPassword1">Paid Amount</label>
															    <input type="text" class="form-control" name="paid_amount" placeholder="Paid Amount">
															    @error('paid_amount')
																<div style="color: red">{{ $message }}</div>
																@enderror
															  </div>
															  <div class="form-group">
															    <label for="exampleInputPassword1">Paid By</label>
															    <select class="form-select form-select-lg form-select-solid" name="paid_by">
															    	<option value="Cash">Cash Payment</option>
															    	<option value="Bank">Bank Transfer</option>
															    	<option value="Card">Stripe Payment</option>
															    </select>
															  </div>
															   <div class="form-group">
															    <label for="exampleInputPassword1">Transection Id</label>
															    <input type="text" class="form-control" name="transaction_id" placeholder="Transection Id">
															  </div>
															  <button type="submit" class="btn btn-primary">Submit</button>
															</form>
														
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
									                    <h4 class="card-title text-warning">Transection History</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Booking ID</th>
								                                  <th>Paid Amount</th>
								                                  <th>Date & Time</th>
								                                  <th>Transection ID</th>
								                                  <th>Paid By</th>
								                                </tr>
								                              </thead>
								                              @php
								                              	$allwallets=App\Models\Wallet::where('order_id',$data->booking_id)->get();
								                              @endphp
								                              <tbody>
								                              	@foreach($allwallets as $mainwallets)
									                                <tr>
									                                	<td>{{ $mainwallets->order_id }}</td>
									                                    <td>£{{ $mainwallets->amount }}</td>
									                                    <td>{{ $mainwallets->date }}</td>
									                                    <td>{{ $mainwallets->transection_id }}</td>
									                                    <td>{{ $mainwallets->paid_by }}</td>
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
									                    <h4 class="card-title text-warning"></h4>
									                    <span id="success_message_paid_status_update"></span>
									                    <div class="row">
									                    	<form>
										                      <div class="col-md-8">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Payment Status</label>
																   	<select id="paid_status" class="form-control form-select">
																   		<option value="0" @if($data->is_paid_verify==0) selected @endif>Pending</option>
																   		<option value="1" @if($data->is_paid_verify==1) selected @endif>Approve</option>
																   		<option value="2" @if($data->is_paid_verify==2) selected @endif>Reject</option>
																   	</select>
																   	
																  </div>
																</div>
																<div class="col-md-8">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Notes</label>
																   	<textarea class="form-control" name="notes" id="notes" placeholder="Notes">{{ $data->notes }}</textarea>
																   	<span style="color:green;" id="paid_status_success"></span>
																  </div>
																</div>
																<div class="col-md-8 mt-5">
																  <button onclick="paidstatusupdate()" type="button" class="btn btn-primary">update</button>
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
		function onladbasicoption() {

			$("#basic_option_contents").hide();
			$("#basic_edit_option").show();

			
		}

		function cancelbasicoption() {

			$("#basic_option_contents").show();
			$("#basic_edit_option").hide();

			
		}
</script>
  <script>
  	function basicinformation_update(){
          
		$("#success_message_basic_information").empty();
  		var id=$("#id").val();
  		var first_name=$("#first_name").val();
  		var middle_name=$("#middle_name").val();
  		var last_name=$("#last_name").val();
  		var city=$("#city").val();
  		var phone=$("#phone").val();
  		var gender=$("#gender").val();
  		var email=$("#email").val();
  		var address_line_one=$("#address_line_one").val();
  		var address_line_two=$("#address_line_two").val();
  		var date_of_birth=$("#date_of_birth").val();
  		var post_code=$("#post_code").val();
  		var emergency_contact_number=$("#emergency_contact_number").val();

  		$.ajax({
	             url: "{{  url('/admin/ucas/basicinformation-update/') }}",
	             type:"GET",
	             data:{
	             	'id':id,
	             	'first_name':first_name,
	             	'middle_name':middle_name,
	             	'last_name':last_name,
	             	'city':city,
	             	'phone':phone,
	             	'email':email,
	             	'address_line_one':address_line_one,
	             	'address_line_two':address_line_two,
	             	'date_of_birth':date_of_birth,
	             	'gender':gender,
	             	'post_code':post_code,
	             	'emergency_contact_number':emergency_contact_number,
	             },
	             success:function(data) {
	                	
	                	 $("#success_message_basic_information").html(data +'<br>')
	                	console.log(data);
	                    
	                }
	        });
  	
  	}
  </script>
  
  	<script>
		function addpayment(){
		   
			$("#main_payment").show();
			$("#payment_details_option").hide();
		}
	</script>
<script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
        
          <script>
  	function paidstatusupdate(){
  	    
  	    
  		var id=$("#id").val();
  		var paid_status = $("#paid_status").val();
  		var notes = $("#notes").val();
  		$("#paid_status_success").empty();
		$.ajax({
             url: "{{  url('admin/get/course-purchase/updateapaymentstatus/') }}",
             type:"GET",
             data:{
             	'id':id,
             	'paid_status':paid_status,
             	'notes':notes,
             },
             success:function(data){
                	 $("#paid_status_success").html("update success");
                }
        });

  	}
  	
  </script>
@endsection