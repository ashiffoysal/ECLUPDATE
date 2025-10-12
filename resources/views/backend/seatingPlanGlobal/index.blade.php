@extends('layouts.backend')
@section('content')


<style>

div.dataTables_wrapper div.dataTables_length select {

  height: 33px;
}
div.dataTables_wrapper div.dataTables_filter input {

    height: 25px;
}

</style>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Rooms</span>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
                               
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3"  style="width:100%">
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-150px">#</th>
                                            <th class="min-w-140px">Room Number</th>
                                            <th class="min-w-140px">Branch</th>
                                            <th class="min-w-140px">Capacity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $allroom=DB::table('branch_room')->get();
                                        @endphp
                                        @foreach($allroom as $key => $room)
                                        <tr>
                                            <td>{{ ++$key}}</td>
                                            <td>{{ $room->room_number }}</td>
                                            <td>{{ $room->branch_name }}</td>
                                            <td>{{ $room->capacity }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
                  
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Rooms</span>
                               
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3"  style="width:100%">
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-150px">#</th>
                                            <th class="min-w-140px">Room Number</th>
                                            <th class="min-w-140px">Branch</th>
                                            <th class="min-w-140px">Capacity</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                       
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
                  
            </div>
             
            

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">Cand Number</th>
                                            <th class="min-w-100px">Candidate</th>
                                            <th class="min-w-140px"> Exam Type </th>
                                            <th class="min-w-100px"> Exam Subject </th>
                                            <th class="min-w-140px"> Exam Date </th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   	@php
                                   	$alldata=App\Models\GcseExamConfirmation::where('is_deleted',0)->get();
                                   	@endphp
                                    @foreach($alldata as $key => $data)
                                        @php
                                            $mainexam=App\Models\ExamRequest::where('id',$data->exam_id)->select(['first_name','middle_name','last_name','email','phone','main_exam_type','Candidate_number','exam_board'])->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $mainexam->Candidate_number }} </td>
                                            <td style="text-transform: capitalize !important;"> {{ $mainexam->first_name }} {{ $mainexam->middle_name }} {{ $mainexam->last_name }}</td>
                                            <td> {{ $mainexam->main_exam_type }} <br> </td>
                                            <td> {{ $data->exam_board }} - {{ $data->exam_subject }}</td>
                                            <td>  
                                            
								                                 <table style="border:none">
								                                    
								                                              @foreach(json_decode($data->exam_details) as $details)
							                                        <tr>
							                                           
							                                           <td>{{ $details->syllabus }}-{{ $details->paper_title }}</td>
							                                           <td>
							                                         @if($details->exam_date =='')
							                                         @else
							                                               {{ \Carbon\Carbon::parse($details->exam_date)->format('d/m/Y') ?? ''}}-{{ $details->exam_time }}
							                                               @endif</td>
							                                          
							                                          
							                                        
							                                        </tr> 
							                                        @endforeach
							                                         </table>
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                	
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
            </div>
  
          
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection