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
										<li class="breadcrumb-item text-muted">FS Booking</li>
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
														<h2 class="fw-bolder">FS Tuition Booking Details</h2>
													</div>
													<!--begin::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
													  
														<a href="{{url('admin/functional-skill-tuition/export/'.$data->id)}}" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Export PDF</a>
														
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
								                                  <th>Payment</th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  
								                                  <tr>
								                                      <td>{{ $data->booking_id }}</td>
								                                      <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
								                                      <td>{{ $data->email }}</td>
								                                      <td>{{ $data->phone }}</td>
								                                      <td>@if($data->is_paid==0) <span class="badge badge-danger">Unpaid</span> @else <span class="badge badge-success">Paid</span>  @endif</td>
								                                      
								                                  </tr>
								                              	
								                              </tbody>
								                            </table>
								                            
								                              <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  
								                                  <th>Address</th>
								                                  <th>City </th>
								                                  <th>Post Code </th>
								                                  <th>Total Amount </th>
								                                  <th>Paid Amount</th>
								                                
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  
								                                  <tr>
								                                      <td>{{ $data->address_line_1 }}</td>
								                                      <td>{{ $data->city }}</td> 
								                                      <td>{{ $data->post_code }}</td>
								                                      <td>£ {{ $data->total_amount }}</td>
								                                      <td>£ {{ $data->paid_amount }}</td>
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
									                          
									                       
								                            <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Subject name</th>
								                                  <th>Hours</th>
								                                  <th>Fees</th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                 @foreach(json_decode($data->subject_details) as $subject)
								                                  <tr>
								                                      <td>{{ $subject->subject }}</td>
								                                      <td>{{ $subject->hour }} Hours</td>
								                                      <td>£ {{ $subject->fees }}</td>
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
								                                  <th>Amount</th>
								                                  <th>Transection ID</th>
								                                  
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  @php
								                                    $alltransection=App\Models\Wallet::where('amount_type','Dabit')->where('user_id',$data->user_id)->where('order_id',$data->booking_id)->get();
								                                  @endphp
								                                  @foreach($alltransection as $transection)
								                                  <tr>
								                                      <td>{{ $transection->order_id }}</td>
								                                      <td>{{ $transection->amount }}</td>
								                                      <td>{{ $transection->transection_id }}</td>
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
             url: "{{  url('admin/get/fs-booking-notes/') }}",
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