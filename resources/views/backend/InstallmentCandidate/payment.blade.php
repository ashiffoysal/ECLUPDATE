@extends('layouts.backend')
@section('title','Candidate Payments')
@section('content')

<style>
    .form-select {
     padding: 6px 10px;
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
													  
														<a href="" class="btn btn-light-primary" style="margin-left:5px;margin-right:5px;">Export PDF</a>

													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
										
									<div class="col-md-12 grid-margin stretch-card">
										<!--begin::Feeds Widget 1-->
										<div class="card mb-5 mb-xxl-8">
											<!--begin::Body-->
											<div class="card-body pb-0">
											
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
								                                  
								                                  <tr>
								                                      <td>{{ $data->booking_id }}</td>
								                                      <td>{{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</td>
								                                      <td>{{ $data->email }}</td>
								                                      <td>{{ $data->phone }}</td>
								                                      <td>@if($data->is_paid==0) <span class="badge badge-danger">Unpaid</span> @else <span class="badge badge-success">Paid</span><br> @if($data->is_paid_verify==1)<span class="text-success">Payment Verified</span>@else<span class="text-danger">Payment is Not Verified</span> @endif  @endif</td>
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
									
									<div class="col-md-12 grid-margin stretch-card">
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
								                                  <th>Total Amount</th>
								                                  <th>Paid Amount</th>
								                                  <th>Due Amount</th>
								                                  <th>First Ilstallments Date</th>
								                                  <th>Second Ilstallments Date</th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                <tr>
								                                   
								                                    <td>£{{ $data->total_amount - $data->discount_amount + $data->Installment_fee + $data->admin_specialaccess_amount }}</td>
								                                    <td>£ {{ $data->paid_amount }} <br>
								                                    @if($data->is_paid_verify==1)<span class="text-success">Payment Verified</span>@else<span class="text-danger">Payment is Not Verified</span> @endif
								                                    </td>
								                                    <td>£{{ $data->due_amount }}</td>
								                                    <td>{{ $data->first_installment_date }}</td>
								                                    <td>{{ $data->second_installment_date }}</td>
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
								                                  <th>Status</th>
								                                  <th>More</th>
								                                </tr>
								                              </thead>
								                              @php
								                              	$allwallets=App\Models\Wallet::where('order_id',$data->booking_id)->where('is_deleted',0)->get();
								                              @endphp
								                              <tbody>
								                              	@foreach($allwallets as $mainwallets)
									                                <tr>
									                                	<td>{{ $mainwallets->order_id }}</td>
									                                    <td>£{{ $mainwallets->amount }}</td>
									                                    <td>{{ $mainwallets->date }}</td>
									                                    <td>{{ Str::limit($mainwallets->transection_id,15) }}</td>
									                                    <td>{{ $mainwallets->paid_by }}</td>
									                                    <td>
									                                       @if($mainwallets->is_verified==0)
									                                       <span class="badge badge-danger">Not Verified</span>
									                                       @else
									                                       <span class="badge badge-success">Verified</span>
									                                       @endif
									                                        
									                                   </td>
									                                   <td>
									                                       @if($mainwallets->is_verified==0)
									                                       <a href="{{url('admin/Installments-candidate/verified/'.$mainwallets->id)}}" class="btn-sm btn-danger" ><i class="fa fa-thumbs-down" style="color:white !important"></i></a>
									                                       @else
									                                       <a href="{{url('admin/Installments-candidate/unverified/'.$mainwallets->id)}}" class="btn-sm btn-success" ><i class="fa fa-thumbs-up" style="color:white !important"></i></a>
									                                       @endif
									                                       <a href="{{url('admin/Installments-candidate/delete/'.$mainwallets->id)}}" class="btn-sm btn-danger" ><i class="fa fa-trash" style="color:white !important"></i></a>
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
									                    	<form action="{{ url('admin/Installments-candidate/payment/'.$data->id) }}" method="post">
									                    	    @csrf
									                    	    <div class="col-md-12">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Is Ilstallment</label>
																    <select class="form-control form-select" name="is_Installment">
																        <option value="1" @if($data->is_Installment==1) selected @endif>True</option>
																        <option value="0" @if($data->is_Installment==0) selected @endif>False</option>
																    </select>
																   
																  </div>
																</div>
									                    	    <div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Total Amount</label>
																   	<textarea class="form-control" name="total_amount" placeholder="Notes">{{ $data->total_amount - $data->discount_amount + $data->admin_specialaccess_amount + $data->Installment_fee }}</textarea>
																   	<input type="hidden" name="id" id="id" value="{{ $data->id }}">
																  </div>
																</div>
										                   	    
																<div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Paid Amount</label>
																   	<textarea class="form-control" name="paid_amount" id="notes" placeholder="Notes">{{ $data->paid_amount }}</textarea>
																   
																  </div>
																</div>
															
																<div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Discount Amount</label>
																   	<textarea class="form-control" name="discount_amount" id="notes" placeholder="Discount Amount">{{ $data->discount_amount }}</textarea>
																  </div>
																</div>
																
																<div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Special Access Amount</label>
																   	<textarea class="form-control" name="admin_specialaccess_amount" id="notes" placeholder="Special Access Amount">{{ $data->admin_specialaccess_amount }}</textarea>
																  </div>
																</div>
																<div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Installment Fee</label>
																   	<textarea class="form-control" name="Installment_fee" id="notes" placeholder="Installment Fee">{{ $data->Installment_fee }}</textarea>
																  </div>
																</div>
																<div class="col-md-6">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Due Amount</label>
																   	<textarea class="form-control" name="due_amount" id="notes" placeholder="Due Amount">{{ $data->due_amount + $data->admin_specialaccess_amount - $data->discount_amount }}</textarea>
																  </div>
																</div>
																<div class="col-md-12">
																  <div class="form-group">
																    <label for="exampleInputEmail1">First Ilstallment Date</label>
																   	<input class="form-control" type="test" name="first_installment_date" placeholder="First Ilstallment Date" value="{{ $data->first_installment_date }}">
																  </div>
																</div>
																<div class="col-md-12">
																  <div class="form-group">
																    <label for="exampleInputEmail1">Second Ilstallment Date</label>
																   	<input class="form-control" type="test" name="second_installment_date" placeholder="Second Ilstallment Date" value="{{ $data->second_installment_date }}">
																  </div>
																</div>
																
																
																
																<div class="col-md-8 mt-5">
																  <button  type="submit" class="btn btn-primary">update</button>
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
															                      <div class="col-md-12">
																					  <div class="form-group">
																					    <label for="exampleInputEmail1">Payment Status</label>
																					   	<select id="paid_status" class="form-control form-select" style="padding: 6px !important;">
																					   		<option value="0" @if($data->is_paid_verify==0) selected @endif>Pending</option>
																					   		<option value="1" @if($data->is_paid_verify==1) selected @endif>Approve</option>
																					   		<option value="2" @if($data->is_paid_verify==2) selected @endif>Reject</option>
																					   		<option value="3" @if($data->is_paid_verify==3) selected @endif>Refund</option>
																					   	</select>
																					   	
																					  </div>
																					</div>
																					<div class="col-md-12">
																					  <div class="form-group">
																					    <label for="exampleInputEmail1">Notes</label>
																					   	<textarea class="form-control" name="notes" id="notes" placeholder="Notes">{{ $data->notes }}</textarea>
																					   	<input type="hidden"  name="id" id="id" value="{{$data->id}}">
																					   	<span style="color:green;" id="paid_status_success"></span>
																					  </div>
																					</div>
																					<div class="col-md-8 mt-5">
																					  <button onclick="paidstatusupdate()" type="button" class="btn btn-primary">update</button>
															                       </div>
														                      </form>
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
  <script>
  	function paidstatusupdate(){
  		var id=$("#id").val();
  		var paid_status = $("#paid_status").val();
  		var notes = $("#notes").val();
  		$("#paid_status_success").empty();
		$.ajax({
             url: "{{  url('admin/get/exmabooking/updateapaymentstatus/') }}",
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
