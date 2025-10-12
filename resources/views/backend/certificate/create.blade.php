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
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="toolbar" id="kt_toolbar">

        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
     
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
   
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Certificate</h1>
            
            </div>

        </div>
   
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
      
        <div id="kt_content_container" class="container-fluid">
     
            <div class="card mb-10">
                <div class="card-body d-flex align-items-center p-5 p-lg-8">
                   
                    <div class="d-flex h-50px w-50px h-lg-80px w-lg-80px flex-shrink-0 flex-center position-relative align-self-start align-self-lg-center mt-3 mt-lg-0">
                   
                        <span class="svg-icon svg-icon-primary position-absolute opacity-15">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="h-50px w-50px h-lg-80px w-lg-80px">
                                <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000"></path>
                            </svg>
                        </span>
                       
                        <span class="svg-icon svg-icon-2x svg-icon-lg-3x svg-icon-primary position-absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"></path>
                                    <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Icon-->
                    <!--begin::Description-->
                    <div class="ms-6">
                        <p class="list-unstyled text-gray-600 fw-bold fs-6 p-0 m-0">Certificate Manage</p>
                    </div>
                    <!--end::Description-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Certificate Collection </span>
                                <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 orders</span> -->
                            </h3>
                            <div class="card-toolbar">
                                <!--<a href="{{ url('admin/candidate-certificate/index') }}" class="btn btn-sm btn-primary">All Candidate List</a>-->
                            </div>
                        </div>
                          <div class="card-body py-3">
                          
                            <form action="{{ url('admin/certificate-collection/update/'.$data->booking_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- radio ends -->
                    <div class="row">
                        <div class="col-md-10 col-xl-10">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Candidate ID:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <input name="exam_type" type="text" class="form-control form-control-solid" value="{{ $data->Candidate_number }}">
                                                   <input name="id" type="hidden" class="form-control form-control-solid" value="{{ $data->id }}">
                                                   <input name="user_id" type="hidden" class="form-control form-control-solid" value="{{ $data->user_id }}">
                                                </div>
                                             </div>
                                          </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Candidate Name:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <input name="exam_type" type="text" class="form-control form-control-solid" value="{{ $data->first_name  }}">
                                                </div>
                                             </div>
                                          </div>
                                            <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Exam Type:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <input name="exam_type" type="text" class="form-control form-control-solid" value="{{ $data->main_exam_type  }}">
                                                </div>
                                             </div>
                                          </div>
                                            <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Exam Series:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <input name="exam_series" type="text" class="form-control form-control-solid" value="{{ $data->mainseries->exam_name  }}">
                                                </div>
                                             </div>
                                          </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Collection By:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="collection_by" placeholder="Enter Collection By Name" required>
                                                </div>
                                                @error('subject_name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Notes:<span class="required"></span></label>
                                            <div class="col-lg-9 col-xl-7">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <textarea class="form-control form-control-solid" name="notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Subjects:<span class="required"></span></label>
                                            <div class="col-xl-9">
                                                
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                         @if($data->exam_information !=null)
    						                                @foreach(json_decode($data->exam_information) as $exam)
    						                                  @php
    						                                    $subject=App\Models\Subject::where('id',$exam->subject)->first();
    						                                  @endphp
    						                                  @if( $subject)
    						                                  <div class="form-check form-check-custom form-check-solid me-9">
                                                                <input class="form-check-input" name="subjects[]" type="checkbox" value="{{$subject->subject_name}} " >
                                                                <label class="form-check-label ms-3" for="january_availability">{{$subject->subject_name}} {{ $exam->unit_code }}</label>
                                                            </div>
    						                                  
    						                                  
    						                                  
    						                                  @endif
    						                                 
    						                              
    						                                @endforeach
    					                                @endif
                                                  
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer py-6">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <button type="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xl-5">
                            <div class="card-body" data-select2-id="select2-data-90-elj6">
                                <!-- image -->
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z" id="image_upload_sec">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                 
                                       
                                    </div>
                                </div>
                                  <!-- image end-->
                            </div>
                        </div>
                        <div class="col-md-7 col-xl-">

                        </div>
                    </div>
                </form>

                        </div>
                        <div class="card-body py-3">
                          
                             <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:14px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px">Booking Id</th>
                                            <th class="min-w-140px">Subject Details</th>
                                                 <th class="min-w-120px">Collection</th>
                                            <th class="min-w-120px">Notes</th>
                                       
                                            <th class="min-w-120px">Date</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php
                                            $mycertificate=DB::table('certificate_collect')->where('booking_id',$data->booking_id)->get();
                                        @endphp
                                        @foreach($mycertificate as $key => $certificate)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $certificate->booking_id }}</td>
                                            <td>{{ $certificate->subject_details }}</td>
                                            <td>{{ $certificate->collection_by }}</td>
                                            <td>{{ $certificate->notes }}</td>
                                            @php
                                            $myDate=Carbon\Carbon::parse($certificate->created_at)->format('d M-Y');
                                            @endphp
                                            <td>{{ $myDate }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                   
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection