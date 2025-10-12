@extends('layouts.frontend')
@section('title', 'Student Dashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    .auto-container {
   
    max-width: 1620px !important;
    
}
.contact-banner-section {
    padding-top: 18px !important;
    padding-bottom: 10px !important;
}
img.upimage {
    height: 260px !important;
}
</style>
  <section class="contact-banner-section">
        <div class="pattern-layer-one" style="background-image: url(frontend/images/icons/icon-5.png)"></div>
        <div class="pattern-layer-two" style="background-image: url(frontend/images/icons/icon-6.png)"></div>
        <div class="pattern-layer-three" style="background-image: url(frontend/images/icons/icon-4.png)"></div>
        <div class="auto-container">
            <!-- Page Breadcrumb -->
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Dashboard</li>
            </ul>
         
        </div>
    </section>
   @include('frontend.student.include.maincss')
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="container-scroller">
                <nav class="navbar default-layout-navbar col-lg-12">
                    @include('frontend.student.include.dasboardheader')
                </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          @include('frontend.student.include.sidebar')
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> All Exam Booking
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Basic Information</h4>
                    <p class="card-description text-danger"> Exam Booking No: <span class="btn-sm btn-success"> {{ $data->booking_id }}</span> </p>
                    <p class="card-description text-danger"> Exam Booking Date: <span class="btn-sm btn-warning"> {{ $data->created_at->format('d-M-Y') }}</span> </p>
                    <div class="row">
                      <div class="col-md-6">
                        
                          <p class="font-weight-bold">NAME: {{ $data->first_name }} {{ $data->middle_name }} {{ $data->last_name }}</p>
                          <p class="font-weight-bold">EMAIL:  {{ $data->email }}</p>
                          <p class="font-weight-bold">PHONE: {{ $data->phone }}</p>
                          <p class="font-weight-bold">CONTACT NUMBER: {{ $data->emergency_contact_number }}</p>
                          <p class="font-weight-bold">ADDRESS LINE 1: {{ $data->address_line_1 }}</p>
                          <p class="font-weight-bold">ADDRESS LINE 2: {{ $data->address_line_2 }}</p>
                       
                        
                      </div>
                      <div class="col-md-6">
                           <p class="font-weight-bold">CITY: {{ $data->city }}</p>
                          <p class="font-weight-bold">POST CODE: {{ $data->postcode }}</p>
                          <p class="font-weight-bold">DATE OF BIRTH: {{ $data->date_of_birth }}</p>
                          <p class="font-weight-bold">GENDER: {{ $data->gender }}</p>
                          <p class="font-weight-bold">Has the candidate sat exams with us previously? ans:  {{ $data->has_a_candidate }} @if($data->has_a_candidate=='yes'){{ $data->has_a_candidate_number }} @endif</p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
               <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Exam Information</h4>
                    <p class="card-description text-danger">Exam Type: <span class="btn-sm btn-success">{{ $data->main_exam_type }}</span> </p>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                          <div class="table-responsive">
                        @if($data->main_exam_type=='GCSE' || $data->main_exam_type=='A Level' || $data->main_exam_type=='AS Level'||  $data->main_exam_type=='IGCSE' )
                            <table class="table table-hover">
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
                                   @if($data->exam_information==null)
								                              
								                              @else
                                @foreach(json_decode($data->exam_information) as $exam)
                                <tr>
                                  <td>{{$exam->exam_board}}</td>
                                  <td>{{ $data->mainseries->exam_name ?? '' }}</td> 
                                  @php
                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                  @endphp
                                  <td class="text-danger">{{$subject->subject_name}}</td>
                                  <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
                                  <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                   <td>£ {{ $exam->fees }}</td>
                                </tr>
                                @endforeach
                                @endif
                                
                              </tbody>
                            </table>
                        @endif
                          @if($data->main_exam_type=='Functional Skills' || $data->main_exam_type=='AAT')
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Exam Board</th>
                                  <th>Subject</th>
                                  <th>Unit Code</th>
                                  <th>Exam Type</th>
                                  <th>Fees</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach(json_decode($data->exam_information) as $exam)
                                <tr>
                                  <td>{{$exam->exam_board}}</td>
                                  @php
                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                  @endphp
                                  <td class="text-danger">{{$subject->subject_name}}</td>
                                  <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
                                  <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                   <td>£ {{ $exam->fees }}</td>
                                   <td>{{ $exam->exam_date }}</td>
                                   <td>{{ $exam->start_exam_time }}</td>
                                </tr>
                                @endforeach
                                
                              </tbody>
                            </table>
                        @endif
                               @if($data->main_exam_type=='ACCA' )
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Exam Board</th>
                                  <th>Subject</th>
                                  <th>Unit Code</th>
                                  <th>Exam Type</th>
                                  <th>Fees</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach(json_decode($data->exam_information) as $exam)
                                <tr>
                                  <td>{{$exam->exam_board}}</td>
                                  @php
                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
                                  @endphp
                                  <td class="text-danger">{{$subject->subject_name}}</td>
                                  <td><label class="badge badge-danger">{{$subject->unit_code}}</label></td>
                                  <td><label class="badge badge-danger">{{ $exam->option_code }}</label></td>
                                   <td>£ {{ $exam->fees }}</td>
                                   <td>{{ $exam->exam_date }}</td>
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
              </div>
               <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Other Information</h4>
                    <p class="card-description text-danger">Payment Status: <span class="btn-sm btn-success">@if($data->is_paid_verify==0) Unpaid @elseif($data->is_paid_verify==1) Paid @endif</span> </p>
                    
                      @php
													  
						  $myimage=pathinfo($data->photo_id, PATHINFO_EXTENSION);
						  $myrecent=pathinfo($data->recent_photo, PATHINFO_EXTENSION);
						
					@endphp
                    <div class="row">
                      <div class="col-md-4 ">
                          
                        <p>Recent Photo</p><br>
                           {{--
                         @if($myrecent=='pdf')
                      
                         <a target="__blank" href="{{ url('updatecore/public/'.$data->recent_photo) }}" class="btn btn-warning">View</a>
                         
                         <iframe src="{{ url('updatecore/public/'.$data->recent_photo) }}" height="200" width="300"></iframe>
                         
                         
							 @else
                        <img class="upimage" src="{{ asset('updatecore/public/'.$data->recent_photo) }}" height="300px" >
                        @endif
                        --}}
                        <br>
                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                          Update Recent Photo
                        </button>
                        
                      </div>
                      <div class="col-md-4 ">
                        <p>Photo ID</p><br>
                            {{--
                         @if($myimage=='pdf')
                     
                          <a target="__blank" href="{{ url('updatecore/public/'.$data->photo_id) }}" class="btn btn-warning">View</a> 
                             <iframe src="{{ url('updatecore/public/'.$data->photo_id) }}" height="200" width="300"></iframe>
						 @else

                        <img class="upimage" src="{{ asset('updatecore/public/'.$data->photo_id) }}" height="300px">
                        
                        @endif
                        --}}
                         <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModals">
                          Update Photo Id
                        </button>
                        
                      </div>
                       <div class="col-md-4 ">
                        <p>Signature</p><br>
                        <img class="upimage" src="{{ asset('/'.$data->signed) }}" height="300px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Others Information</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                           <div class="table-responsive">
                            <table class="table table-hover">
                              <tbody>
                                <tr>
                                  <td>Do you have a UCI Number ( 13 digits )?  </td>
                                  <td><span class="badge badge-danger">{{ $data->uci }}</span> </td> 
                                </tr>
                                @if($data->uci=='yes')
                                <tr>
                                  <td>UCI NUMBER:</td>
                                  <td>{{ $data->uci_number }}</td> 
                                </tr>
                                @endif

                                <tr>
                                  <td>Do you have a ULN number (10 Digits)?</td>
                                  <td><span class="badge badge-danger">{{ $data->uln }}</span></td>
                                </tr>

                                @if($data->uln=='yes')
                                <tr>
                                  <td>ULN NUMBER:</td>
                                  <td>{{ $data->uln_number }}</td> 
                                </tr>
                                @endif

                                <tr>
                                  <td>Are you retaking these exams?</td>
                                  <td><span class="badge badge-danger">{{ $data->retaking_exams }}</span></td> 
                                </tr>
                                @if( $data->retaking_exams == 'yes')
                                <tr>
                                  <td>Please specify which exams you are retaking.</td>
                                  <td>{{ $data->retaking_exams_name }}</td> 
                                </tr>

                                @endif

                                <tr>
                                  <td>Are you caring forward your practical endorsement /course work/ spoken/ or any other assessment?</td>
                                  <td><span class="badge badge-danger">{{ $data->caring_forwad }}</span></td> 
                                </tr>
                                @if($data->caring_forwad=='yes')
                                <tr>
                                  <td>Caring forwad Details</td>
                                  <td>{{$data->caring_forwad_details}}</td> 
                                </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                      </div>
                      <div class="col-md-12 grid-margin stretch-card">
                          
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaluci" data-bs-whatever="@fat">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">TERMS AND CONDITIONS</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                           <div class="table-responsive">
                                <table class="table table-hover">
                           
                              <tbody>
                                <tr>
                                  <td>Name</td>
                                  <td>{{ $data->relation_name }}</td> 
                                </tr>
                                <tr>
                                  <td>If you are not the candidate but the person responsible for the candidate please tell us the relationship.</td>
                                  <td>{{ $data->relationship }}</td> 
                                </tr>
                                 <tr>
                                  <td>Date</td>
                                  <td><span class="badge badge-danger">{{ $data->exam_date }}</span></td> 
                                </tr>
                              </tbody>
                            </table>
                           </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{--
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">SPECIAL ARRANGEMENTS AND NEEDS</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                       <div class="table-responsive">
                           <table class="table table-hover">
                           
                              <tbody>
                                <tr>
                                  <td>Do you require special access requirements during your exam?</td>
                                 
                                </tr>
                               
                                 <tr>
                                  <td>Please select all that apply to the candidates current way of working.</td>
                                </tr>
                             
                                

                                
                              
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              --}}
              
                   <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Special Access</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                      
                       <div class="table-responsive">
                      @if($data->main_exam_type=='AAT' || $data->main_exam_type=='ACCA' || $data->main_exam_type=='Functional Skills')
																    <table class="table table-hover" style="font-size: 16px">
										                              <tbody>
										                                <tr>
										                                  <td>Do you require special access requirements during your exam?</td>
										                                  <td><span class="badge badge-danger">{{ $data->special_acces }}</span></td> 
										                                </tr>
										                                @if($data->special_acces=='yes')
										                                <tr>
										                                  <td>Evidence</td>
										                                  <td><span>{{ $data->special_acces_evidence }}</span></td> 
										                                </tr>
										                                
										                                
										                                   <tr>
										                                  <td>Evidence Documents</td>
										                                  	{{--
                                        									@php
                                        									
                                        									$my_evidence=pathinfo($data->special_evidents_documents, PATHINFO_EXTENSION);
                                        									 @endphp                             
                                        								
                                        									                       
									<td>
									    @if($my_evidence=='pdf')	<a target="__blank" href="{{ url('updatecore/public/'.$data->special_evidents_documents) }}"> <span>Click here</span></a>
									    @else
									    <a target="__blank" href="{{ url('/'.$data->special_evidents_documents) }}"> <span>Click here</span></a>
									    @endif
									    	
									    	</td> 
									     --}}
										                                </tr>
										                                @endif
										                                 <tr>
										                                  <td>Do you suffer from any mental conditions such as high levels of anxiety?</td>
										                                  <td><span class="badge badge-danger">{{ $data->mental_conditions }}</span></td> 
										                                </tr>
										                                @if($data->mental_conditions == 'yes')
										                                <tr>
										                                  <td>Details</td>
										                                  <td><span >{{ $data->mental_condition_details }}</span></td> 
										                                </tr>
										                                @endif

										                                 <tr>
										                                  <td>Do you have any conditions or disability?</td>
										                                  <td><span class="badge badge-danger">{{ $data->condition_disability }} </span></td> 
										                                </tr>
										                                @if($data->condition_disability=='yes')
										                                 <tr>
										                                  <td> conditions or disability details</td>
										                                  <td><span >{{ $data->condition_disability_detail }} </span></td> 
										                                 </tr>
										                               @endif
										                              </tbody>
										                            </table>
																    
																    
																    @else
                              <table  class="table table-hover" style="font-size: 16px !important">
									                              <tbody>
									                            
									                              	
									                              	 <tr>
									                                  <td style="font-weight:700;color:#000">Do you require special access requirements during your exam?*  </td>
									                                  
									                                </tr>
									                                
									                                 <tr>
									                                    
									                                  <td>
									                                     
    									                                     
    									                                      {{ $data->special_access_requirements ?? 'NOT YET' }}
    									                                     
									                                      
									                                   </td> 
									                                   
									                                </tr>
									                                <tr>
									                                  <td style="font-weight:700;color:#000">Please select all that apply to the candidates current way of working.</td>
									                                </tr>
									                            
    									                               
    									                                <tr>
    									                                  <td>{{ $data->update_special_acces ?? 'NOT YET' }}</td>
    									                                </tr>
    									                                
									                                
									                                      
									                               
									                                
									                                
									                                 <tr>
									                                  <td style="font-weight:700;color:#000">Please Provide any further details about the candidates current way of working*</td>
									                                </tr>
									                                 <tr>
									                                  <td>{{ $data->special_acces_evidence ?? 'NOT YET' }}</td>
									                                </tr>
									                                
									                                
									                                 <tr>
									                     
									                                </tr>
									                                
									                                 <tr>
									                                  <td></td>
									                                </tr>
									                                </tbody>
									                            </table>
                                            @endif
                         </div>
                      </div>
                      @if($data->main_exam_type=='AAT' || $data->main_exam_type=='ACCA' || $data->main_exam_type=='Functional Skills')
                      @else
                      <div class="col-md-12 grid-margin stretch-card">
                      
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="font-size: 16px !important">
                                        
                                          <thead >
                                            <!--begin::Table row-->
                                            <tr>
                                                <th>Special Access</th>
                                                <th>Fees</th>
                                                                
                                            </tr>
                                            <!--end::Table row-->
                                          </thead>
                                          <!--end::Table head-->
                                          <!--begin::Table body-->
                                          <tbody>
                                                  @if($data->is_admin_special_acc==1)
                                                      @foreach(json_decode($data->admin_special_details) as $myaccessdetails)
                                                <tr>
                                                  <td>{{ $myaccessdetails->access_name }}</td>
                                                  <td>£ {{ $myaccessdetails->fees }}</td>
                                                 
                                                </tr>
                                                @endforeach
                                            @endif
                                        
                                            
                                          </tbody>
                                          <!--end::Table body-->
                                        </table>
                                    </div>
                        </div>
                      @endif
                        
                        
                        
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Fee Details</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                       <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Total Fee</th>
                                  <th>Discount</th>
                                  <th>Mock Test</th>
                                  <th>Special Access</th>
                                    <th>Document Checking Fee</th>
                                  <th>Ilstallment Fee</th>
                               
                                 
                                </tr>
                              </thead>
                              <tbody>
                                
                                <tr>
                                  <td>£ {{ $data->special_access_initial_fees + $data->total_amount - $data->discount_amount + $data->admin_specialaccess_amount}}</td>
                                  <td>£ {{  $data->discount_amount }}</td>
                                  <td>£ {{  $data->mock_amount }}</td>
                                  <td>£ {{  $data->admin_specialaccess_amount }}</td>
                                  <td>£ {{  $data->special_access_initial_fees }}</td>
                                  <td>£ {{  $data->Installment_fee }}</td>

                              </tbody>
                            </table>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Payment Information</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                       <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Paid Amount</th>
                                  <th>Due Amount</th>
                                  <th>Discount</th>
                                  <th>Booking ID</th>
                                  <th>Exam Type</th>
                                  <th>Paid By</th>
                                  <th>Transection ID</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                                
                                <tr>
                                  <td>£ {{ $data->paid_amount}}</td>
                                  <td>£ {{ $data->special_access_initial_fees + $data->total_amount - $data->discount_amount + $data->Installment_fee + $data->admin_specialaccess_amount - $data->paid_amount}}</td>
                                  <td>£ {{  $data->discount_amount }}</td>
                                  <td>{{ $data->booking_id }}</td> 
                                  <td class="text-danger">{{ $data->main_exam_type }}</td>
                                  <td class="text-danger">{{ $data->payment_option }}</td>
                                  <td>{{ $data->transection_id }}</td>
                                                        </tr>
                              </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
         
              
              
              @php
                $datasmock=App\Models\MockTest::where('booking_id',$data->booking_id)->first();
              @endphp
              @if($datasmock)
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
									                    <h4 class="card-title text-warning">Mock Subject & Paper Details</h4>
									                    <div class="row">
									                      <div class="col-md-12 grid-margin stretch-card">
									                          
									                         @if($datasmock->is_apps_booking==0)
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
								                                  @foreach(json_decode($datasmock->exam_information) as $exam)
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
								                                           @if($exam->mock_exam_date_1=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_exam_date_1 ?? 'Not yet' }} @endif
								                                    
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_2=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_test_paper_2 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_2=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_exam_date_2 ?? 'Not yet' }} @endif
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_3=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_test_paper_3 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_3=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_exam_date_3 ?? 'Not yet' }} @endif
								                                      
								                                      </td>
								                                      <td>@if($exam->mock_test_paper_4=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_test_paper_4 ?? 'Not yet' }} @endif
								                                        <br>
								                                    Date:
								                                           @if($exam->mock_exam_date_4=='') <span class="badge badge-prinmary">Not yet</span> @else {{ $exam->mock_exam_date_4 ?? 'Not yet' }} @endif
								                                      </td>
								                                      <td></td>
								                                     
								                                  </tr>
								                                  @endforeach
								                              	
								                              </tbody>
								                            </table>
									                        @elseif($datasmock->is_apps_booking==1)
									                         <table class="table table-hover">
								                              <thead>
								                                <tr>
								                                  <th>Subject name</th>
								                                  
								                                  <th>Unit Code</th>
								                                  <th>Paper </th>
								                                </tr>
								                              </thead>
								                             
								                              <tbody>
								                                  @foreach(json_decode($datasmock->exam_information) as $exam)
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

              @endif
   <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-warning">Exam Statement Of Entry</h4>
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                      <div class="table-responsive">
                            <table class="data-table table table-hover " id="dataTableExample1" style="width:100%;font-size:14px">
                        <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Booking-No</th>
                                        <th scope="col">Board and Subject</th>
                                        <th scope="col">Uploads Date</th>
                                        <th scope="col">File</th>
                                       
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                            $alldatastatement=App\Models\StatementsOfEntry::where('booking_id',$data->booking_id)->where('exam_id',$data->id)->get();
                            
                                    @endphp
                                    @if($alldatastatement->count() >0 )
                                    @foreach($alldatastatement as $key => $datastatements)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ $datastatements->booking_id }}</td>
                                        <td>{{ $datastatements->exam_board_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($datastatements->uploads_date)->format('d/m/Y') ?? ''}}</td>
						              <td><a download href="{{ url('/'.$data->file) }}" class="badge badge-success">View</a>
						                </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                    @else
                                        <p>Your statement is not ready yet</p>
                                    @endif
                                   
                                </tbody>
                    </table>
                        
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
            </div>
        </div>
        
    </div>
    </div>
</section>

<!--recent photo-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recent Photo Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/student/recentphoto/update') }}" method="post" enctype="multipart/form-data">
          
      <div class="modal-body">
        
          <div class="form-group">
            <label for="exampleFormControlInput1">Recent Photo </label>
            @csrf
            <input type="file" name="thumbnail_img" class="form-control" id="exampleFormControlInput1" accept=".png, .jpg, .jpeg, .pdf">
            <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
            <input type="hidden" name="exam_id" value="{{ $data->id }}">
            <p style="color:red;font-size: 12px;">Allowed file types: png, jpg, jpeg, pdf.</p>
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo Id Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('/student/photoid/update') }}" method="post" enctype="multipart/form-data">
          
      <div class="modal-body">
        
          <div class="form-group">
            <label for="exampleFormControlInput1">Photo Id</label>
            @csrf
            <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
            <input type="hidden" name="exam_id" value="{{ $data->id }}">
            
            <input type="file" name="fileUpload" class="form-control" id="exampleFormControlInput1" accept=".png, .jpg, .jpeg, .pdf" >
             <p style="color:red;font-size: 12px;">Allowed file types: png, jpg, jpeg, pdf.</p>
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!---->


<div class="modal fade" id="exampleModaluci" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Other Information Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ url('student/otheroption/update') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        
        <div class="mb-3">
            @csrf
            <label for="recipient-name" class="col-form-label">Do you have a UCI Number ( 13 digits )?</label><br>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="radio"  value="no" name="uci" id="no" @if($data->uci=='no') checked="checked" @endif> <label class="form-check-label" for="No">No </label> <br>
            <input type="radio" value="yes"  name="uci" id="yes" @if($data->uci=='yes') checked="checked" @endif >  <label class="form-check-label" for="yes">Yes </label>
        </div>
        <div id="uci_section" @if($data) @if($data->uci=='yes') @else style="display:none" @endif @else style="display:none" @endif >
            <label for="message-text" class="col-form-label">UCI Number:</label>
            <input type="text"  name="uci_number" class="form-control form-control-lg uci_number" aria-describedby="passwordHelpBlock" value="@if($data) {{ $data->uci_number }} @endif">
        </div>
        
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Do you have a ULN Number ( 10 digits )*?</label><br>
            <input type="radio"  id="uln_no" type="radio" checked="checked" name="uln"  value="no" @if($data) @if($data->uln=='no') checked="checked" @endif @endif > <label class="form-check-label" for="uln_no">No </label> <br>
            
            
            <input type="radio" id="uln_yes" type="radio" name="uln" value="yes" @if($data) @if($data->uln=='yes') checked="checked" @endif @endif >  <label class="form-check-label" for="uln_yes">Yes </label>
        </div>
        <div id="uln_section" @if($data) @if($data->uln=='yes') @else style="display:none" @endif @else style="display:none" @endif >
            <label for="message-text" class="col-form-label">ULN Number:</label>
                    <input type="text" max="10" name="uln_number" id="uln" class="form-control form-control-lg  uln_number" aria-describedby="passwordHelpBlock" value=" @if($data) {{ $data->uln_number }} @endif">
        </div>
          
          <div class="mb-3">
              	<label for="recipient-name" class="col-form-label">Are you retaking these exams?*</label><br>
						<input id="retaking_exams_no" type="radio" name="retaking_exams" value="no"  @if($data) @if($data->retaking_exams=='no') checked="checked" @endif  @else checked="checked" @endif/>
								<label class="form-check-label" for="Learning_via"> No</label>
								<br>
							<input id="retaking_exams_yes" type="radio" name="retaking_exams" value="yes" @if($data) @if($data->retaking_exams=='yes') checked="checked" @endif @endif/><label class="form-check-label" for="Private_Candidate"> Yes </label>
									                                 
						
          </div>
            <div class="mb-3" id="retaking_section"  @if($data) @if($data->retaking_exams=='yes') @else  style="display:none" @endif @else  style="display:none" @endif>
					 <label for="retaking_exams" class="form-label">Please specify which exams you are retaking?</label>
							<input type="text"  name="retaking_exams_name" id="retaking_exams_name" class="form-control form-control-lg " aria-describedby="passwordHelpBlock" value="@if($data) {{ $data->retaking_exams_name }} @endif"> 
			</div>
			
			
			<div class="mb-3">
				 <label>Are you caring forward your practical endorsement /course work/ spoken/ or any other assessment?</label>
					 
										                                    <input  id="caring_forwad_no" type="radio" checked="checked" name="caring_forwad" value="no" @if($data) @if($data->caring_forwad=='no') checked="checked" @endif @else checked="checked" @endif/>
										                                    <label class="form-check-label" for="caring_forwad_no">
										                                    No
										                                    </label><br>
										                  
										                                      <input  id="caring_forwad_yes" type="radio" name="caring_forwad" value="yes" @if($data) @if($data->caring_forwad=='yes') checked="checked" @endif @endif/>
										                                    <label class="form-check-label" for="caring_forwad_yes">
										                                     Yes
										                                    </label>
			</div>
			<div class="mb-3" id="caring_forwad_section" @if($data) @if($data->caring_forwad=='yes') @else style="display:none" @endif @else style="display:none" @endif >
										                                <label for="UCI">Please Specify the details including exam board & grade*
										                                </label>
										                                <input type="text" name="caring_forwad_details" id="caring_forwad_details" class="form-control form-control-lg " aria-describedby="passwordHelpBlock" value="@if($data) {{ $data->caring_forwad_details }} @endif">
										                                <br>
				<label for="UCI">Documents*</label> <br>                   
										                                
				                    <div class=" row" id="photos">

                                    </div>
				</div>
										                  
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
            $("#yes").click(function(){
		      $("#uci_section").show();
		    });

		    $("#no").click(function(){
		      $("#uci_section").hide();
		    });
		    
		    
		       $("#uln_yes").click(function(){
			      $("#uln_section").show();
			    });

			    $("#uln_no").click(function(){
			      $("#uln_section").hide();
			    });
			    
			    
			     // retaking exam
			      $("#retaking_exams_yes").click(function(){
			        $("#retaking_section").show();
			      });

			      $("#retaking_exams_no").click(function(){
			        $("#retaking_section").hide();
			      });

			       // caring forwad exam
			      $("#caring_forwad_yes").click(function(){
			        $("#caring_forwad_section").show();
			      });

			      $("#caring_forwad_no").click(function(){
			        $("#caring_forwad_section").hide();
			      });

    });

</script>
@include('frontend.student.include.mainjs') 

@endsection
