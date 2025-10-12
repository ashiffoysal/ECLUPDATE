@extends('layouts.backend')
@section('title', 'Supports Update')
@section('content')

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="{{asset('backend')}}/assets/css/image-uploader.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.form-control.form-control-solid {
    
    border-color: #9f9f9f !important;
  
    border-radius: 4px !important;
    background-color: #ffffff !important;
}
.form-select.form-select-solid .form-select.form-select-solid {
    border-color: #9f9f9f !important;
    border-radius: 4px !important;
    background-color: #ffffff !important;
}
.form-select.form-select-solid:active, .form-select.form-select-solid:focus {
    border-color: #9f9f9f !important;
    border-radius: 4px !important;
    background-color: #ffffff !important;
}

.form-select.form-select-solid {
     border-color: #9f9f9f !important;
    border-radius: 4px !important;
    background-color: #ffffff !important;
}

input.form-control.form-control-solid {
    height: auto !important;
}
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Supports Create</h1>
                <!--end::Title-->
               
            </div>

        </div>
        <!--end::Container-->
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="card mb-10">
                <div class="card-body d-flex align-items-center p-5 p-lg-8">
                    <!--begin::Icon-->
                    <div class="d-flex h-50px w-50px h-lg-80px w-lg-80px flex-shrink-0 flex-center position-relative align-self-start align-self-lg-center mt-3 mt-lg-0">
                        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-polygon.svg-->
                        <span class="svg-icon svg-icon-primary position-absolute opacity-15">
                            <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 70 70" fill="none" class="h-50px w-50px h-lg-80px w-lg-80px">
                                <path d="M28 4.04145C32.3316 1.54059 37.6684 1.54059 42 4.04145L58.3109 13.4585C62.6425 15.9594 65.3109 20.5812 65.3109 25.5829V44.4171C65.3109 49.4188 62.6425 54.0406 58.3109 56.5415L42 65.9585C37.6684 68.4594 32.3316 68.4594 28 65.9585L11.6891 56.5415C7.3575 54.0406 4.68911 49.4188 4.68911 44.4171V25.5829C4.68911 20.5812 7.3575 15.9594 11.6891 13.4585L28 4.04145Z" fill="#000000"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--begin::Svg Icon | path: icons/duotone/Tools/Tools.svg-->
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
                        <p class="list-unstyled text-gray-600 fw-bold fs-6 p-0 m-0">Create Supports </p>
                        
                    </div>
                     <div class="ms-6">
                       
                         <a href="{{url('admin/supports/index')}}" class="badge badge-danger">All Supports</a>
                    </div>
                    <!--end::Description-->
                </div>
            </div>
            <div class="card">
                <form action="{{ url('admin/supports/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- radio ends -->
                    <div class="row">
                        <div class="col-md-10 col-xl-10">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                         <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Name:<span class="required"></span></label>
                                            <div class="col-md-9 ">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="name" placeholder="Enter Candidate Name" value="{{ $data->name }}" required>
                                                
                                                     <input type="hidden" name="id" value="{{ $data->id }}">    
                                                </div>
                                                @error('subject_name')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                       <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Email Sent ?:<span class="required"></span></label>
                                            <div class="col-md-9 row">
                                                <div class="col-md-2">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="email_sent" id="flexRadioDefault1" value="yes" @if($data->email_sent=='yes') checked @endif >
                                                      <label class="form-check-label" for="flexRadioDefault1">
                                                        Yes
                                                      </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="email_sent" id="flexRadioDefault2" value="no" @if($data->email_sent=='no') checked @endif>
                                                      <label class="form-check-label" for="flexRadioDefault2" >
                                                        No
                                                      </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Email:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="email" name="email" placeholder="Enter Candidate Email" value="{{ $data->email }}" required>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Phone:<span class="required"></span></label>
                                            <div class="col-md-9 ">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="phone" placeholder="Enter Candidate Phone" value="{{ $data->phone }}" required>
                                                </div>
                                              
                                            </div>
                                        </div>
                                          <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Contact Type:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                   <select name="contact_type" class="form-select form-select-solid" >
                                                       <option @if(	$data->contact_type=='Phone') selected @endif value="Phone">Phone</option>
                                                       <option @if($data->contact_type=='Email') selected @endif value="Email">Email</option>
                                                   </select>
                                                </div>
                                                @error('exam_type')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">Supports Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                  
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="Exams" id="examsBox" type="checkbox" value="exams" @if($data->inquery_exams==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">Exams</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="special_access" id="specialAccess" type="checkbox" value="special_access" @if($data->inquery_supports==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">Special Access</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="tuition" type="checkbox" id="" value="Tuition" @if($data->tuition==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">Tuition</label>
                                                    </div><br>
                                                    
                                                    
                                                      <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="ucas" type="checkbox" id="" value="ucas" @if($data->ucas==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">Ucas Application</label>
                                                    </div><br>
                                                    
                                                    
                                                      <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="mock" type="checkbox" id="mockAccess" value="1" @if($data->mock==1) checked @endif >
                                                        <label class="form-check-label ms-3" for="">Mock Exam</label>
                                                    </div><br>
                                    
                                                    
                                                      <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="course" type="checkbox" id="courseAccess" value="1" onchacked="courseAccess()"  @if($data->course==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">Course</label>
                                                    </div><br>
                                                 <div class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" name="coupon" type="checkbox" id="coupon" value="1" onchange="couponNew(this)" @if($data->coupon==1) checked @endif >
                                                    <label class="form-check-label ms-3" for="coupon">Coupon</label>
                                                </div>
                                                   
                                                    <!--begin::Checkbox-->
                                                  
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-10" id="hiddenSection" @if($data->inquery_supports==1) @else style="display: none"  @endif >
                                            <label class="col-lg-3 col-form-label text-lg-end">Special Access Type:<span class="required"></span></label>
@php
    
@endphp

                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                    @php
                                                        
                                                        $yourJsonArray=json_decode($data->special_access);
                                                        $item=[
                                                            'Anxiety','Extra Time 25%','Extra Time 50%','Practical Assistant','Laptop','Own Room','Home Invigilation','Alternative Site'
                                                        ]
                                                    @endphp
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Anxiety" name="special_access_name[]" type="checkbox" value="Anxiety" @if(in_array('Anxiety', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="Anxiety">Anxiety</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Extra_Time_25" name="special_access_name[]" type="checkbox" value="Extra Time 25%" @if(in_array('Extra Time 25%', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="Extra_Time_25">Extra Time 25%</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Extra_Time_50" name="special_access_name[]" type="checkbox" value="Extra Time 50%" @if(in_array('Extra Time 50%', $yourJsonArray ?? [])) checked @endif
                                                        <label class="form-check-label ms-3" for="Extra_Time_50">Extra Time 50%</label>
                                                    </div><br>

                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Practical_Assistant" name="special_access_name[]" type="checkbox" value="Practical Assistant"@if(in_array('Practical Assistant', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="Practical_Assistant">Practical Assistant</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Laptop" name="special_access_name[]" type="checkbox" value="Laptop"@if(in_array('Laptop', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="Laptop">Laptop</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="OwnRoom" name="special_access_name[]" type="checkbox" value="Own Room" @if(in_array('Own Room', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="OwnRoom">Own Room</label>
                                                    </div><br>

                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="Home_Invigilation" name="special_access_name[]" type="checkbox" value="Home Invigilation" @if(in_array('Home Invigilation', $yourJsonArray ?? [])) checked @endif>
                                                        <label class="form-check-label ms-3" for="Home_Invigilation">Home Invigilation</label>
                                                    </div><br>
                                                 
                                                    
                                                    
                                                   
                                                    <!--begin::Checkbox-->
                                                  
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            
                                        </div>
                                         <div class="row mb-10" id="tuition_section"  @if($data->tuition==1) @else style="display: none" @endif>
                                            
                                            <label class="col-lg-3 col-form-label text-lg-end">Tuition Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                       <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="fsc" name="fscorse" type="checkbox" value="1" @if($data->fscorse==1) checked @endif >
                                                        <label class="form-check-label ms-3" for="fsc">Functional Skills Tuition</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="grouptution" name="grouptuition" type="checkbox" value="1" @if($data->grouptution==1) checked @endif >
                                                        <label class="form-check-label ms-3" for="grouptution">GCSE Tuition</label>
                                                    </div><br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="aleveltuition" name="inperson" type="checkbox" value="1" onchange="alveltuition(this)" @if($data->inperson==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="aleveltuition">A Level Tuition</label>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-10" id="courseAccess_Section" @if($data->course==1) @else style="display: none" @endif>
                                            <label class="col-lg-3 col-form-label text-lg-end">Course Type:<span class="required"></span></label>
                                            <div class="col-xl-7">
                                                <!--begin::Wrapper-->
                                                <div class=" fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                   
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="" name="asifalevelcourse" type="checkbox" value="1" onchange="asifalevel(this)" @if($data->asifalevelcourse==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="">A Level Courses</label>
                                                    </div>
                                                    <br>
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="gc" name="gcsecourse" type="checkbox" value="1" @if($data->gcsecoursenov==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="gc">GCSE Courses For November Series</label>
                                                    </div><br>
                                                    
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" id="gcj" name="gcsecoursejune" type="checkbox" value="1" @if($data->gcsecoursejune==1) checked @endif>
                                                        <label class="form-check-label ms-3" for="gcj">GCSE Courses For June Series</label>
                                                    </div><br>
                                                </div>
                                       
                                            </div>
                                            
                                        </div>
                                          
                                        <div class="row mb-10" id="examsBox_series" @if($data->inquery_exams==1) @else style="display: none"  @endif >
                                            <label class="col-md-3 col-form-label text-lg-end">Exam Series:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                    <!--begin::Checkbox-->
                                                    @php
                                                        $allseries=DB::table('examessuedates')->where('is_deleted',0)->where('is_active',1)->select(['id','exam_name'])->get();
                                                    @endphp
                                                    @foreach($allseries as $series)
                                                    <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="series" type="radio" value="{{ $series->exam_name }}" @if($data->series==$series->exam_name) checked  @endif>
                                                        <label class="form-check-label ms-3" for="{{ $series->exam_name }}">{{ $series->exam_name }}</label>
                                                    </div><br>
                                                    @endforeach
                                                     <div class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" name="series" type="radio" value="None" @if($data->series=='None') checked  @endif>
                                                        <label class="form-check-label ms-3" for="">None</label>
                                                    </div><br>
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <div class="row" id="">
                                                
                                          @if($data->subject_details !=null)
                                                 @foreach(json_decode($data->subject_details) as $exam)
                                                <label class="col-md-3 col-form-label text-lg-end">Subject Details:<span class="required"></span></label>
                                                <div class="col-md-2">
                                                    <label class="col-form-label text-lg-end">Exam Type:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_type_change(this)" name="exam_type[]" id="exam_type_0" class="form-select form-select-solid" >
                                                        <option value="">Select</option>
                                                        <option value="GCSE" @if($exam->exam_type=='GCSE') selected @endif>GCSE</option>
                                                        <option value="A Level"  @if($exam->exam_type=='A Level') selected @endif>A Level</option>
                                                        <option value="AS Level" @if($exam->exam_type=='AS Level') selected @endif>AS Level</option>
                                                        <option value="IGCSE"  @if($exam->exam_type=='IGCSE') selected @endif>IGCSE</option>
                                                        <option value="AAT"  @if($exam->exam_type=='AAT') selected @endif>AAT</option>
                                                        <option value="Functional Skills"  @if($exam->exam_type=='Functional Skills') selected @endif>FUNCTIONAL SKILLS</option>
                                                        <option value="ACCA" @if($exam->exam_type=='ACCA') selected @endif>ACCA</option>
                                                    </select>
                                                        
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-form-label text-lg-end">Exam Board:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_board_change(this)" name="exam_board[]"  id="exam_board_0" class="form-select form-select-solid" >
                                       <option value="">Select</option>
                                       @if($exam->exam_type=='A Level' || $exam->exam_type=='GCSE'|| $exam->exam_type=='IGCSE' || $exam->exam_type=='AS Level')
                                       <option value="AQA" @if($exam->exam_board=='AQA') selected @endif>AQA</option>
                                       <option value="OCR" @if($exam->exam_board=='OCR') selected @endif>OCR</option>
                                       <option value="Edexcel" @if($exam->exam_board=='Edexcel') selected @endif>Edexcel</option>
                                       <option value="Cambridge CIE" @if($exam->exam_board=='Cambridge CIE') selected @endif>Cambridge CIE</option>
                                       <option value="WJEC" @if($exam->exam_board=='WJEC') selected @endif>WJEC</option>
                                       @elseif($exam->exam_type=='AAT')
                                        <option value="AAT">AAT</option>
                                     
                                        @elseif($exam->exam_type=='ACCA')
                                        <option value="ACCA">ACCA</option>
                                          @elseif($exam->exam_type=='Functional Skills')
                                        <option value="Functional Skills">Functional Skills</option>
                                       @endif
                                 
                                                     
                                                
                                                    </select>
                                                    </div>
                                                    
                                                </div>
                                            
                                                <div class="col-md-2">
                                                    <label class="col-form-label text-lg-end">Subject:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <select onchange="exam_subject_change(this)" name="subject[]" id="exam_subject_0" class="form-select form-select-solid">
                                                        
                                    @if($exam->exam_type=='A Level' || $exam->exam_type=='GCSE'|| $exam->exam_type=='IGCSE' || $exam->exam_type=='AS Level')
                                    
                                    @php
                                         $subjects=App\Models\Subject::where('exam_type',$exam->exam_type)->where('exam_board',$exam->exam_board)->get();
                                    @endphp
                                     
                                            @foreach($subjects as $sub)
                                            <option value="{{  $sub->id }}" @if($sub->id==$exam->subject) selected @endif>{{  $sub->subject_name }}</option>
                                            @endforeach
                                            
                                       
                                      @elseif($exam->exam_type=='GCSE')
                                       
                                       
                                       @elseif($exam->exam_type=='AAT')
                                       
                                       @php
                                        $subjects=App\Models\Subject::where('exam_type','AAT')->get();
                                       @endphp
                                       
                                            @foreach($subjects as $sub)
                                            <option value="{{  $sub->id }}">{{  $sub->subject_name }}</option>
                                            @endforeach
                                            
                                            
                                        @elseif($exam->exam_type=='ACCA')
                                          @php
                                        $subjects=App\Models\Subject::where('exam_type','ACCA')->get();
                                       @endphp
                                            @foreach($subjects as $sub)
                                            <option value="{{  $sub->id }}">{{  $sub->subject_name }}</option>
                                             @endforeach
                                            
                                          @elseif($exam->exam_type=='Functional Skills')
                                         @php
                                        $subjects=App\Models\Subject::where('exam_type','FUNCTIONAL SKILLS')->get();
                                       @endphp
                                            @foreach($subjects as $sub)
                                            <option value="{{  $sub->id }}">{{  $sub->subject_name }}</option>
                                             @endforeach
                                       @endif
                                                   
                                                    </select>
                                                    </div>
                                                   
                                                </div>
                                            
                                                <div class="col-md-2">
                                                    <label class=" col-form-label text-lg-end">Fees:<span class="required"></span></label>
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                        <input class="form-control form-control-solid" type="test" name="fees[]" id="fees_0" value="{{  $exam->fees }}" >
                                                    </div>
                                                  
                                                </div>
                                                
                                                @endforeach
                                                
                                                
                                                
                                                
                                                @endif
                                            </div>
                                            <div class="row" id="add_more_subject_row">



                                            </div>

                                            <div class="row" id="add_more_subject_row">

                                                <div class="col-md-11 text-end">
                                                    <button type="button" class="btn-sm btn-danger" onclick="addmore()" style="color:#fff !important">Add More</button>
                                                </div>

                                            </div>

                                            
                                        </div>
                                     
                                   
                                       
                                       
                                      
                                        <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Notes:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                  <textarea class="form-control form-control-solid" id="summernote" rows="20" cols="50" name="notes" required>{{ $data->notes }} <p id="Anxiety_topic"></p> <p id="Extra_Time_25_topic"></p> <p id="Extra_Time_50_topic"></p><p id="Practical_Assistant_topic"></p> <p id="Laptop_topic"></p> <p id="OwnRoom_topic"></p> <p id="Home_Invigilation_topic"></p>
                                                        <p id="alevel_tutions"></p><br><p id="booking_procedure"></p> <p id="gcse_tuition"></p><p id="alevel_course_topic"></p><br><p id="mock_exam_topic"></p><p id="gcse_course_topic"></p><p id="gcse_course_topic_june"></p><p id="access_topic"></p><p id="Ucas_topic"><br></p><p id="coupon_discount"></p><br><p id="tution_topic"></p><br></textarea>
                                                   
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
        </div>
    </div>
</div>

<script>
    var i=1;
    function addmore(){
        $("#add_more_subject_row").append('<div class="row asif"> <label class="col-md-3 col-form-label text-lg-end">Subject Details:<span class="required"></span></label><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Type:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_type_change(this)" name="exam_type[]"  id="exam_type_'+i+'"  class="form-select form-select-solid" ><option value="">Select</option><option value="GCSE">GCSE</option><option value="A Level" >A Level</option><option value="AS Level">AS Level</option><option value="IGCSE" >IGCSE</option><option value="AAT">AAT</option><option value="Functional Skills">FUNCTIONAL SKILLS</option><option value="ACCA">ACCA</option></select></div></div><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Board:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_board_change(this)" name="exam_board[]" id="exam_board_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-2"><label class="col-form-label text-lg-end">Subject:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_subject_change(this)" name="subject[]" id="exam_subject_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-2"><label class=" col-form-label text-lg-end">Fees:<span class="required"><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)"><i style="color:red" class="fa fa-times"></i></a></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><input class="form-control form-control-solid" type="test" name="fees[]" id="fees_'+i+'"></div></div></div>');
      i++
    }




    function deleterow(em) {
 

 $(em).closest(".asif").remove();
    
  // countamout();

}
    
  </script>
  
<script>
  
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('specialAccess');
      var hiddenSection = document.getElementById('hiddenSection');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('specialAccess').addEventListener('change', toggleSectionVisibility);
  </script>

<script>
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('examsBox');
      var hiddenSection = document.getElementById('examsBox_series');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('examsBox').addEventListener('change', toggleSectionVisibility);
  </script>
<script>

   function exam_type_change(el){

          var type_id=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[2];
        //    var series_id =$("#exam_series_0").val();
          if(type_id) {
             $.ajax({
                 url: "{{  url('get/supports/board/all/') }}/"+type_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                   
                    // console.log(data)
                        $('#exam_board_'+mainid).empty();
                        $('#exam_board_'+mainid).append('<option selected disabled>Select</option>');
                        $.each(data,function(index,districtObj){

                         $('#exam_board_'+mainid).append('<option value="' + districtObj.id + '">'+districtObj.name+'</option>');
                         
                       });
                        $('#fees_'+mainid).val('');
                        

                     }
             });
         } else {
             alert('sorry data not found');
         }
        
        
    }

</script>


<script>
    function exam_board_change(el){
           var type_id=el.value;
           var index_id = el.id; 
           var arr = index_id.split('_');
           var mainid=arr[2];
           var series_id =$("#exam_type_"+mainid).val();
           if(type_id) {
              $.ajax({
                  url: "{{  url('get/supports/allsubject/all/') }}/"+type_id+'/'+series_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    
                     // console.log(data)
                         $('#exam_subject_'+mainid).empty();
                         $('#exam_subject_'+mainid).append('<option selected disabled>Select</option>');
                         $.each(data,function(index,districtObj){
 
                          $('#exam_subject_'+mainid).append('<option value="' + districtObj.id + '">'+districtObj.subject_name+'</option>');
                          
                        });
                         $('#fees_'+mainid).val('');
                         
 
                      }
              });
          } else {
              alert('sorry data not found');
          }
         
         
     }
 
 </script>



<script>
    function exam_subject_change(el){
           var type_id=el.value;
           var index_id = el.id; 
           var arr = index_id.split('_');
           var mainid=arr[2];
        //    var series_id =$("#exam_type_"+mainid).val();
           if(type_id) {
              $.ajax({
                  url: "{{  url('get/supports/individual-subject/all/') }}/"+type_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    
                         console.log(data)
                        
                         $('#fees_'+mainid).val(data.exam_fees);
                         
 
                      }
              });
          } else {
            //   alert('sorry data not found');
          }
         
         
     }
 
 </script>

<script>
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('courseAccess');
      var hiddenSection = document.getElementById('courseAccess_Section');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('courseAccess').addEventListener('change', toggleSectionVisibility);
</script>
<script>
  

    $(document).ready(function() {
        // Attach change event handler to the checkbox
        $('#tuitionAccess').change(function() {
            // alert("ok");
            if ($(this).is(':checked')) {
                // Show the div if the checkbox is checked
                $('#tuition_section').show();
            } else {
                // Hide the div if the checkbox is unchecked
                $('#tuition_section').hide();
            }
        });
        
       
    });

</script>

    
@endsection