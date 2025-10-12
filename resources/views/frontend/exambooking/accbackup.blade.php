@extends('layouts.frontend')
@section('title', 'ACCA Exam Booking ')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/datepicker/mc-calendar.min.css" />
<script src="{{ asset('frontend') }}/datepicker/mc-calendar.min.js"></script>

<div id="preloader" style="display: none">
	<div id="status">Processing ! Please wait! &nbsp;</div>
</div>
<style>
#preloader {
	position: fixed;
	top:0;
	left:0;
	right:0;
	bottom:0;
	background-color:#fff;/* change if the mask should be a color other than white */
	z-index:99; /* makes sure it stays on top */
}

#status {
	width:200px;
	height:200px;
	position:absolute;
	left:50%; /* centers the loading animation horizontally on the screen */
	top:50%; /* centers the loading animation vertically on the screen */
	background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvkXciXd_bcjuWYuJTgHML765AeIo5zqaGJEWHkYz0Yq5j0PBB'); /* path to your loading animation */
	background-repeat:no-repeat;
	background-position:center;
	margin:-100px 0 0 -100px; /* is width and height divided by two */
}


</style>



@if($maindata)
  @php
  $booking_id=Auth::user()->id.rand(11111,99999);
  @endphp
@else
  @php
    $booking_id=Auth::user()->id.rand(11111,99999);
  @endphp
@endif
<style>
.form-control .evidence_documentscls{
    display:infline;
    padding: 7px 10px !impo;
    border: 1px solid;
  
}
.row.mybyclicking {
    background: azure;
    justify-content: end;
    border: 1px solid azure;
    border: dotted;
}
  .form-label {
    margin-top: 26px;
    margin-bottom: 0rem;
    font-size: 1.05rem;
    font-weight: 500;
}
.sec-title .text {

    font-size: 16px !important;
}
.news-section.style-two {
padding-top: 46px;
    padding-bottom: 40px;
}
.news-section .pattern-layer {
   
    top: 200px !important;
    
}
.content {
    background-color: #c2c2c20d;
}
.form-control.form-control-solid {
    background-color: #f0f4ff !important;
    border-color: #d2daef !important;
    color: #000000 !important;
    padding: 20px 10px !important;
    border-radius: 5px;
}

select.form-select.form-select-lg.form-select-solid {
     background-color: #f0f4ff !important;
    border-color: #d2daef !important;
    color: #000000 !important;
    padding: 20px 10px !important;
    border-radius: 5px;
}
.form-select form-select-lg form-select-solid{
   background-color: #f0f4ff !important;
    border-color: #d2daef !important;
    color: #000000 !important;
    padding: 20px 10px !important;
    border-radius: 5px;
}
.form-select.form-select-solid {
           background-color: #f0f4ff !important;
    border-color: #d2daef !important;
    color: #000000 !important;
    padding: 20px 10px !important;
    border-radius: 5px;
}
</style>
<style>
.button {
    background: #c7aaed!important;
    border: none;
    border-radius: 20px;
    color: white;
    display: inline-block;
    font-size: 12px;
    font-weight: 400;
    /* letter-spacing: 0.02em; */
    padding: 10px 20px;
    text-align: center;
    /* text-shadow: 0px 1px 2px rgb(0 0 0 / 75%); */
    text-decoration: none;
    text-transform: capitalize;
    transition: all 0.2s;
}

.btn:hover {
  background : #005f95;
}

.btn:active {
  background : #005f95;
}

input[type="file"] {
  display : none;
}

#file-drag {
    background: aliceblue;
    border: 1px dashed #b1aeae;
    border-radius: 7px;
    color: #555;
    cursor: pointer;
    display: block;
    font-weight: bold;
    margin: 1em 0;
    padding: 3em;
    text-align: center;
    transition: background 0.3s, color 0.3s;
}

/*#file-drag:hover {
  background : #ddd;
}*/

/*#file-drag:hover,
#file-drag.hover {
  border-color : #3070A5;
  border-style : solid;
  box-shadow   : inset 0 3px 4px #888;
  color        : #3070A5;
}*/

#file-progress {
  display : none;
  margin  : 1em auto;
  width   : 100%;
}

#file-upload-btn {
  margin : auto;
}

#file-upload-btn:hover {
  background : #5FAAE1;
}

#file-upload-form {
  margin : auto;  
  width  : 40%;
}

progress {
  appearance    : none;
  /*background    : #eee;*/
  border        : none;
  border-radius : 3px;
  /*box-shadow    : 0 2px 5px rgba(0, 0, 0, 0.25) inset;*/
  height        : 10px;
}

progress[value]::-webkit-progress-value {
  background :
    -webkit-linear-gradient(-45deg, 
      transparent 33%,
      rgba(0, 0, 0, .2) 33%, 
      rgba(0,0, 0, .2) 66%,
      transparent 66%),
    -webkit-linear-gradient(right,
      #005f95,
      #07294d);
  background :
    linear-gradient(-45deg, 
      transparent 33%,
      rgba(0, 0, 0, .2) 33%, 
      rgba(0,0, 0, .2) 66%,
      transparent 66%),
    linear-gradient(right,
      #005f95,
      #07294d);
  background-size : 60px 30px, 100% 100%, 100% 100%;
  border-radius   : 3px;
}

progress[value]::-moz-progress-bar {
  background :
  -moz-linear-gradient(-45deg, 
    transparent 33%,
    rgba(0, 0, 0, .2) 33%, 
    rgba(0,0, 0, .2) 66%,
    transparent 66%),
  -moz-linear-gradient(right,
    #005f95,
    #07294d);
  background :
    linear-gradient(-45deg, 
      transparent 33%,
      rgba(0, 0, 0, .2) 33%, 
      rgba(0,0, 0, .2) 66%,
      transparent 66%),
    linear-gradient(right,
      #005f95,
      #07294d);
  background-size : 60px 30px, 100% 100%, 100% 100%;
  border-radius   : 3px;
}

ul {
  list-style-type : none;
  margin          : 0;
  padding         : 0;
}
</style>
<style>
   img.img_ {
    width: 60% !important;
}

  label.file_upload p {
   /*   color: #5FAAE1;
      display: block !important;
      width: auto;*/
      color: #ffffff !important;
      display: block !important;
      width: auto;
      padding: 10px;
      background: #c7aaed;
      border-radius: 20px;
      margin: 10px 0px;
      font-size: 11px;
  }

  .col-lg-12.col-md-12.col-sm-12.col-xs-12.spartan_item_wrapper {
      padding: 0px !important;
  }
  .col-xl-12.col-md-12.col-sm-12.col-xs-12.spartan_item_wrapper {
      padding: 0px;
  }

  label.file_upload{

      background: #f0f4ff !important;
  }

.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {
   
    background: #ebebeb !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
  .form-select-lg {
    
  font-size: 12px !important;
}
.form-control-lg {
    font-size: 12px !important;
}
</style>
   <style>
    h1, h2, h3, h4, h5, h6 {
    color: #102039;
    font-family: "Roboto", sans-serif;
    font-weight: 700;
    text-transform: capitalize;
    line-height: 1.2;
    margin-bottom: 0;
}
    .breadcrumb-section {
  padding: 50px 0;
  background-image: url("frontend/breadcrumb-bg.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover; }
  @media (min-width: 768px) and (max-width: 991.98px) {
    .breadcrumb-section {
      padding: 80px 0; } }
  @media (max-width: 767.98px) {
    .breadcrumb-section {
      padding: 60px 0; } }
  .breadcrumb-section ul {
    margin-top: 10px; }
    .breadcrumb-section ul li {
      display: inline-block;
      text-transform: capitalize;
      font-size: 18px;
      margin: 0 2px; }
      @media (min-width: 768px) and (max-width: 991.98px) {
        .breadcrumb-section ul li {
          font-size: 16px; } }
      @media (max-width: 767.98px) {
        .breadcrumb-section ul li {
          font-size: 16px; } }
      .breadcrumb-section ul li a {
        color: #606060;
        -webkit-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in; }
        .breadcrumb-section ul li a:hover {
          color: #fe630e; }
</style>

<style>
          .content {
    background-color: #fdfdfd !important;
}


.form-control.form-control-solid {
    background-color: #ffffff !important;
    border-color: #07080a !important;
    color: #000000 !important;
    padding: 15px 10px !important;
    border-radius: 3px;
}


.stepper.stepper-links .stepper-nav .stepper-item.completed .stepper-title {
    color: #00ed07 !important;
}

.form-label {
   
    font-weight: 700 !important;
}




select.form-select.form-select-lg.form-select-solid {
    background-color: #ffffff !important;
    border-color: #000000 !important;
    color: #000000 !important;
    padding: 15px 10px !important;
    border-radius: 5px;
}
</style>




    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>ACCA EXAM BOOKING</h2>
                    <ul>
                        <li><a href=""> Please Call or Email us if you need any help with the form
                           <br>

                        Phone: 0208 616 2526 Or
                        <br>
                        <span style="text-transform: none;">E-mail: info@examcentrelondon.co.uk</span></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{asset('backend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />









  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div class="toolbar" id="kt_toolbar">
              <!--begin::Container-->
              <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                  <!--begin::Title-->
                  
                  <!--end::Title-->
                  <!--begin::Separator-->
                  <span class="h-20px border-gray-200 border-start mx-4"></span>
             
               
                  <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-1">
                  <!--begin::Wrapper-->
                  <div class="me-4">
                  
                  </div>
               
                  <!--end::Button-->
                </div>
                <!--end::Actions-->
              </div>
              <!--end::Container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
              <!--begin::Container-->
              <div id="kt_content_container" class="container">
                <!--begin::Card-->
                <div class="card" style="border-radius:55px">
                  <!--begin::Card body-->
                  <div class="card-body">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                      <!--begin::Nav-->
                      <div class="stepper-nav py-5 mt-5">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Student Info</h3>
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Exam Details</h3>
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Special Arrangements</h3>
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Payment Details</h3>
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                          <h3 class="stepper-title">Completed</h3>
                        </div>
                        <!--end::Step 5-->
                      </div>
                 
                 
                      <form class="mx-auto mw-1000px w-100 pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form" action="{{ url('/exam-booking-acca') }}" method="post" enctype="multipart/form-data">

                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <div class="fv-row">
                              <!--begin::Row-->
                              <div class="row">
                                  <div class="col-lg-12">
                                        @csrf
                                </div>
                                 <div class="col-lg-10">
                                  <label class="form-label mb-3">ACCA Registration Number*</label>
                                 
                                  <input type="text" class="form-control form-control-lg form-control-solid acca_registration" name="acca_registration" onchange="insertmybooking()" placeholder="Please Enter ACCA Registration Number" value="{{ Auth::user()->acca_number }}"/>
                                  <!--end::Input-->
                                  <span id="warning-message" style="color: red"></span>
                                </div>
                                <div class="col-lg-10">
                                    <!--begin::Label-->
                                  <label class="form-label mb-3">Legal First Name </label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                  <input type="hidden" id="booking_id"  name="booking_id" value="{{  $booking_id }}" />
                                  <input type="hidden" id="user_id"  name="user_id" value="{{ Auth::user()->id }}" />

                                  <input type="text" onchange="insertmybooking()" class="form-control form-control-lg form-control-solid" id="first_name" name="first_name" placeholder="Please Enter Legal First name" value="@if($maindata){{$maindata->first_name}}@else{{ Auth::user()->name }}@endif" />

                                  <input type="hidden" id="main_exam_type" name="main_exam_type" value="ACCA"/>
                                  <!--end::Input-->
                                </div>
                                <div class="col-lg-10 mt-2">
                                    <label for="middle_name" class="form-label">Middle name(s)</label>
                                    <input type="text" onchange="insertmybooking()" name="middle_name" id="middle_name" class="form-control form-control-lg form-control-solid" placeholder="Please Enter Middle name" value="@if($maindata){{$maindata->middle_name}}@else{{ Auth::user()->middle_name }}@endif" aria-describedby="passwordHelpBlock">
                                </div>
                                <div class="col-lg-10 mt-2">
                                    <label for="last_name" class="form-label">Legal Last Name</label>
                                    <input type="text" onchange="insertmybooking()" name="last_name" id="last_name" class="form-control form-control-lg form-control-solid" placeholder="Please Enter Legal Last Name" value="@if($maindata){{$maindata->last_name}}@else{{ Auth::user()->last_name }}@endif"aria-describedby="passwordHelpBlock">
                                </div>
                                  <div class="col-lg-5 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" onchange="insertmybooking()" name="email" id="email" class="form-control form-control-lg form-control-solid" placeholder="Please Enter Email" value="@if($maindata){{$maindata->email}}@else{{ Auth::user()->email }}@endif" aria-describedby="passwordHelpBlock">
                                </div>
                                 <div class="col-lg-5 mt-2">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" onchange="insertmybooking()" id="phone" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Please Enter Phone Number" value="@if($maindata){{$maindata->phone}}@else{{ Auth::user()->phone }}@endif" aria-describedby="passwordHelpBlock">
                                </div>
                               
                                
                                 <div class="col-lg-5 mt-2">
                                    <label for="inputPassword5" class="form-label">Address Line 1</label>
                                    <textarea type="text" onchange="insertmybooking()" name="address_line_1" id="address_line_1" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" placeholder="Please Enter Address Line 1">@if($maindata){{ $maindata->address_line_1 }}@else{{ Auth::user()->address_line_1 }}@endif</textarea>
                                </div>
                                  <div class="col-lg-5 mt-2">
                                    <label for="inputPassword5" class="form-label">Address Line 2</label>
                                    <textarea onchange="insertmybooking()" type="text" name="address_line_2" id="address_line_2" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" placeholder="Please Enter Address Line 2">@if($maindata){{ $maindata->address_line_2 }}@else{{ Auth::user()->address_line_2 }}@endif</textarea>
                                </div>
                                <div class="col-lg-5 mt-2">
                                    <label for="=" class="form-label">City</label>
                                    <input type="text" onchange="insertmybooking()" id="city" class="form-control form-control-lg form-control-solid city" name="city" value="@if($maindata){{ $maindata->city }}@else{{ Auth::user()->city }}@endif" aria-describedby="passwordHelpBlock" placeholder="Please Enter City">
                                </div>
                                <div class="col-lg-5 mt-2">
                                    <label for="inputPassword5" class="form-label">Post-Code</label>
                                    <input type="text" onchange="insertmybooking()" id="postcode" placeholder="Please Enter Post Code" name="postcode" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="@if($maindata){{ $maindata->postcode }}@else{{ Auth::user()->zip }}@endif">
                                </div>
                                  <div class="col-lg-5 mt-2">
                                    <label for="emergency_contact_number" class="form-label">Emergency Contact Number </label>
                                    <input type="text" onchange="insertmybooking()" id="emergency_contact_number" placeholder="Please Enter Emergency Contact Number" name="emergency_contact_number" class="form-control form-control-lg form-control-solid" value="@if($maindata){{$maindata->emergency_contact_number}}@else{{ Auth::user()->emergency_contact_number }}@endif" aria-describedby="passwordHelpBlock">
                                </div>
                                 <div class="col-lg-5 mt-3">
                                    <label for="inputPassword5" class="form-label">Date of birth</label>
                                    <input type="text" onchange="insertmybooking()" id="date_of_birth" class="form-control form-control-lg form-control-solid"  name="date_of_birth" aria-describedby="passwordHelpBlock" value="@if($maindata){{ $maindata->date_of_birth }}@else{{ Auth::user()-> date_of_birth }}@endif" placeholder="Please Enter Date of Birth">
                                </div>
                                <div class="col-lg-12 mt-2">
                                  <label for="" class="d-flex align-items-center form-label">Gender</label>
                                  <div class="form-check" style="margin:10px 0px">
                                    <input class="form-check-input gender" type="radio"  id="male" onchange="insertmybooking()"  name="gender" value="Male" />
                                    <label class="form-check-label" for="male">
                                     Male
                                    </label>
                                  </div>
                                  <div class="form-check" style="margin:10px 0px">
                                   <input class="form-check-input gender" type="radio" name="gender" id="female" value="Female" onchange="insertmybooking()"/>
                                    <label class="form-check-label" for="female">
                                     Female
                                    </label>
                                  </div>
                                </div>
                                  <div class="row mb-5 mt-5">
                                    
                                      <div class="col-md-5">
                                        <label for="" class="d-flex align-items-center form-label">Photo Id (PDF or image file. max size: 5MB, Passport / Driving license)<span class="required"></span></label>
                                        <input type="file" name="fileUpload" accept="image/jpeg,image/jpg,image/gif,image/png,application/pdf,image/x-eps" class="form-control form-control-lg form-control-solid" style="display: inherit !important;padding:10px 10px 10px 10px!important" >
                                      </div>
                                      <div class="col-md-5">
                                        <label for="" class="d-flex align-items-center form-label">Recent Photo (PDF or image file. max size: 5MB, Own Recent Photo)<span class="required"></span></label>
                                        <input type="file" name="thumbnail_img" accept="image/jpeg,image/jpg,image/gif,image/png,application/pdf,image/x-eps" class="form-control form-control-lg form-control-solid" style="display: inherit !important;padding:10px 10px 10px 10px!important">
                                      </div>
                                    
                                  </div> 
                                <!--end::Col-->
                              </div>
                              <!--end::Row-->
                            </div>
                            <!--end::Input group-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                              <!--begin::Title-->
                              <h2 class="fw-bolder text-dark">Exam Info</h2>
                            </div>
                             <div class="mb-10 fv-row row">
                                <div class="col-md-4" style="margin-bottom:8px">
                                  <label class="form-label mb-3">EXAM BOARD</label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                 <select name="exam_board[]" class="form-select form-select-lg form-select-solid">
                                    <option value="ACCA">ACCA</option>
                                 </select>
                                </div>
                                
                                 <div class="col-md-3 mb-10 fv-row row" style="margin: 0px 5px;">
                                         
                                        <div class="mb-0 fv-row">
                                          <!--begin::Label-->
                                          <label class="form-label mb-3">
                                          Choose the dates*
                                          </label>
                                          <!--end::Label-->
                                          <!--begin::Options-->
                                          <div class="mb-0 row">
                                          
                                          <input id="date0" onchange="mydateChange()" type="text" name="exam_date[]"  class="datepicker form-control form-control-lg form-control-solid">
                                            
                                          </div>
                                          <!--end::Options-->
                                        </div>
                                  </div>
                                  
                                  <div class="col-md-4" style="">
                                    <div class="mb-0 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">What time to start your exam?
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="mb-0 row">
                                    @php
                                        $forestgateTime=DB::table('branch_exam_time')->where('status',1)->where('branch',1)->orderBy('id','DESC')->get();
                                    @endphp
                                    <select class="form-select form-select-lg form-select-solid" id="mytime" name="start_exam_time[]">
                                   
                                      <option value="" disabled selected>Select</option>
                                
                                      
                                     
                                    </select>
                                    </div>
                                    <!--end::Options-->
                                  </div>
                                </div>
                               
                               
                                 <div class="col-md-3">
                                    <!--begin::Label-->
                                  <label class="form-label mb-3">Exam Branch</label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                  <select name="type[]"  id="type_0"  class="form-select form-select-lg form-select-solid type">
                                    
                                    <option value="Forest Gate">Forest Gate</option>
                                    
                                  </select>
                                </div>
                                 <div class="col-md-3 fv-row">
                                    <!--begin::Label-->
                                   <label class="form-label mb-3">SUBJECT</label>
                                   <select name="subject[]" onchange="subjectcheange(this)" id="subject_0"  class="form-select form-select-lg form-select-solid subject">
                                      <option selected value="">--Select--</option>
                                      @foreach($allsub as $sub)
                                      <option value="{{  $sub->id }}">{{  $sub->subject_name }}</option>
                                      @endforeach
                                     
                                  </select>
                                </div>
                                
                                  <div class="col-md-3">
                                    <!--begin::Label-->
                                  <label class="form-label mb-3">Exam Type</label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                 <!--  <input type="text" class="form-control form-control-lg form-control-solid" name="option_code[]" id="option_code_0" /> -->
                                   <select name="option_code[]" id="option_code_0"  class="form-select form-select-lg form-select-solid type">
                                   
                                    <option value="On Screen">On Screen</option>
                                    
                                    
                                  </select>


                                </div>
                                 <div class="col-md-2">
                                    <!--begin::Label-->
                                  <label class="form-label mb-3">FEES</label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                  <input type="text" class="form-control form-control-lg form-control-solid" id="fees_demo_0" disabled/>
                                  <input type="hidden" class="fees" name="fees[]" id="fees_0"/>
                                   <input type="hidden" id="totalmain_amount" class="totalmain_amount" value="0" />
                                  
                                </div>
                              <!--end::Input-->
                            </div>
                            <div class="mb-10 fv-row row" id="add_more">

                            </div>
                            <div class="mb-10 fv-row row">
                              <div class="col-md-12 text-end">
                                <!--<button type="button" onclick="addmore()" class="btn-sm btn-success" style="color:#fff">Add Subjects</button>-->
                              </div>
                            </div>

                              <div class="mb-10 fv-row row">
                                <div class="col-lg-12 mt-2">
                                  <label for="" class="d-flex align-items-center form-label">Type of Learner</label>
                             
                                  <div class="form-check" style="margin:10px 0px">
                                   <input onchange="insertmybooking()" class="form-check-input" id="Private_Candidate" type="radio" name="type_of_learner" value="Private Candidate"  />
                                    <label class="form-check-label" for="Private_Candidate">
                                     Private Candidate
                                    </label>
                                  </div>
                                  
                                       <div class="form-check" style="margin:10px 0px">
                                    <input onchange="insertmybooking()" class="form-check-input" id="Learning_via" type="radio"  name="type_of_learner"  value="Learning via, or registered with, one of our Partners" />

                                    <label class="form-check-label" for="Learning_via">
                                     Learning via, or registered with, one of our Partners
                                    </label>
                                  </div>
                                </div>
                              </div>
                         
                           
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-12">
                              <!--begin::Title-->
                              <h2 class="fw-bolder text-dark">Special Arrangements</h2>
                              <!--end::Title-->
                              <!--begin::Notice-->
                              <div class="text-gray-400 fw-bold fs-6">For any enquiries, please
                               <a target="_blank" href="{{ url('/contact') }}" class="link-primary fw-bolder">Contact Us</a>.
                             </div>
                              <!--end::Notice-->
                            </div>

                           <div class="col-lg-12 mt-2">
                                    <label for="" class="d-flex align-items-center form-label">Do you require special access requirements during your exam?*</label>
                                    <div class="form-check" style="margin:10px 0px">
                                      <input  onchange="insertmybooking()" class="form-check-input" id="special_acces_no" type="radio" checked="checked" name="special_acces" value="no" @if($maindata) @if($maindata->special_acces=='no') checked="checked" @endif @else checked="checked" @endif/>
                                      <label class="form-check-label" for="special_acces_no">
                                      No
                                      </label>
                                    </div>
                                    <div class="form-check" style="margin:10px 0px">
                                        <input onchange="insertmybooking()"  class="form-check-input" id="special_acces_yes" type="radio" name="special_acces" value="yes" @if($maindata) @if($maindata->special_acces=='yes') checked="checked" @endif @endif/>
                                      <label class="form-check-label" for="special_acces_yes">
                                       Yes
                                      </label>
                                    </div>
                                </div>


                            <div class="col-lg-10 mt-2" id="evidence_section" @if($maindata) @if($maindata->special_acces=='yes') @else style="display:none" @endif @else style="display:none" @endif >
                              <label for="UCI" class="form-label">If yes, please provide any evidence to support your need for access arrangements as required by the relevant awarding bodies?</label>
                              <input onchange="insertmybooking()"  type="text" name="special_acces_evidence" id="special_acces_evidence" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="@if($maindata) {{ $maindata->special_acces_evidence }} @endif">
                               <label for="" class="form-label">Documents<span>*</span></label><br>
                            
								<input type="file" name="evidence_documents" class="form-control evidence_documentscls" accept=".png, .jpg, .jpeg, .pdf" style="display: inline !important;">
														
                            </div>


                             <div class="col-lg-10 mt-2">
                                  <label for="" class="d-flex align-items-center form-label">Do you suffer from any mental conditions such as high levels of anxiety?</label>
                                  <div class="form-check" style="margin:10px 0px">
                                    <input onchange="insertmybooking()" class="form-check-input" id="mental_conditions_no" type="radio" checked="checked" name="mental_conditions" value="no" @if($maindata) @if($maindata->mental_conditions=='no') checked="checked" @endif @else checked="checked" @endif/>
                                    <label class="form-check-label" for="mental_conditions_no">
                                    No
                                    </label>
                                  </div>
                                  <div class="form-check" style="margin:10px 0px">
                                      <input onchange="insertmybooking()" class="form-check-input" id="mental_conditions_yes" type="radio" name="mental_conditions" value="yes"  @if($maindata) @if($maindata->mental_conditions=='yes') checked="checked" @endif @endif/>
                                    <label class="form-check-label" for="mental_conditions_yes">
                                     Yes
                                    </label>
                                  </div>
                                </div>
                            <div class="col-lg-10 mt-2" id="mental_conditions_section"@if($maindata) @if($maindata->mental_conditions=='yes') @else style="display:none" @endif @else style="display:none" @endif >
                              <label for="UCI" class="form-label">If yes, please specify</label>
                              <input type="text" onchange="insertmybooking()" name="mental_condition_details" id="mental_condition_details" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="@if($maindata) {{ $maindata->mental_condition_details }} @endif">
                            </div>

                             <div class="col-lg-10 mt-2">
                                <label for="" class="d-flex align-items-center form-label">Do you have any conditions or disability?</label>
                                <div class="form-check" style="margin:10px 0px">
                                  <input class="form-check-input" id="condition_disability_no" type="radio" onchange="insertmybooking()" checked="checked" name="condition_disability" value="no" @if($maindata) @if($maindata->condition_disability=='no') checked="checked" @endif @else checked="checked" @endif/>
                                  <label class="form-check-label" for="condition_disability_no">
                                  No
                                  </label>
                                </div>
                                <div class="form-check" style="margin:10px 0px">
                                    <input onchange="insertmybooking()" class="form-check-input" id="condition_disability_yes" type="radio" name="condition_disability" value="yes" @if($maindata) @if($maindata->condition_disability=='yes') checked="checked" @endif @endif/>
                                  <label class="form-check-label" for="condition_disability_yes">
                                   Yes
                                  </label>
                                </div>
                              </div>
                            <div class="col-lg-10 mt-2" id="condition_disability_section"  @if($maindata) @if($maindata->condition_disability=='yes') @else style="display:none" @endif @else style="display:none" @endif >
                              <label for="condition_disability_details" class="form-label">If yes, please specify</label>
                              <input type="text" onchange="insertmybooking()" name="condition_disability_details" id="condition_disability_details" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="@if($maindata) {{ $maindata->condition_disability_details }} @endif" >
                            </div>
                           

                          
                         
                      


                            <div class="col-lg-12 mt-2">
                              <p></p>
                            </div>
                            
                               <div class="col-lg-10 mt-2">
                                <label for="" class="d-flex align-items-center form-label"> If you are not the candidate but the person responsible for the candidate please tell us the relationship.</label>
                                <div class="form-check" style="margin:10px 0px">
                                  <input class="form-check-input" type="radio" checked="checked" name="relationship_identification" id="I_am_Booking" onchange="whoiam(this)" value="I am booking my exam"/>
                                  <label class="form-check-label" for="I_am_Booking">
                                    I am Booking my Exam
                                  </label>
                                </div>
                                <div class="form-check" style="margin:10px 0px">
                                    <input  class="form-check-input"  type="radio"  id="some_one_else" onchange="whoiam(this)" name="relationship_identification" value="Someone else"/>
                                  <label class="form-check-label" for="some_one_else">
                                   Someone else
                                  </label>
                                </div>
                              </div>
                            
                            <div class="row" id="some_one_else_section" style="display:none; padding-left:10px">
                                 <div class="col-lg-12 mt-2 fv-row">
                                  <label for="" class="form-label">Relation</label>
                                  <input type="text" onchange="insertmybooking()"  name="relationship" id="relationship" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="@if($maindata){{$maindata->relationship}}@endif">
                                  
                                </div>
                            </div>
                                   
                            <div class="row"  style=" padding-left:10px">
                                <div class="col-lg-8 mt-2 fv-row">
                                  <label for="relation_name" class="form-label"> Your Name</label>
                                  <input type="text" onchange="insertmybooking()" name="relation_name" id="relation_name" class="form-control form-control-lg form-control-solid" aria-describedby="passwordHelpBlock" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6 mt-2">
                              <label  class="form-label">Signature</label><br>
                              <div id="sig"></div>
                              <textarea name="signed" id="signature" style="display:none"></textarea>
                              <p style="clear: both;">

                            <button type="button" id="clear">Clear</button> 

                          </p>
                              
                            </div>
                           
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                              <!--begin::Title-->
                              <h2 class="fw-bolder text-dark">Payment Details</h2>
                              <!--end::Title-->
                              <!--begin::Notice-->
                         
                              <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="row" style="margin:10px 0px">
                              <div class="col-md-12">
                                <div class="col-md-12">
                               <p> Our exam fees can be found on the website or you can call us at 02086162526. We cannot make entries until we have received the full payment. We accept payment via cash,card, bank transfer. The centre does not accept cheques as a method of payment.</p>
                                <br>
                                <h5>Refunds</h5>
                               <p> Please note that the centre cannot provide refunds once the exam has been booked. We also cannot provide refunds if the candidate is absent from the exam.<p>
                                <br>

                                    <div class="fv-row">
                                           <input type="checkbox" id="aggre_condition" name="aggre_condition">
                                          I agree to the terms and conditions 
                                        <a style="color:red" target="_blank" href="{{ url('/terms-condition') }}">
                                            Terms and Conditions</a>
                                        <br>
                                    </div>
                              </div>
                                {{-- 
                                <div class="form-check" style="margin:10px 0px">
                                  <input class="form-check-input" name="payment_option" type="radio" id="card_transfer" checked value="Card">
                                  <label class="form-check-label" for="card">
                                    Card
                                  </label>
                                </div>
                                <div class="form-check" style="margin:10px 0px">
                                  <input class="form-check-input" type="radio" name="payment_option" id="bank_transfer" value="Bank Transfer">
                                  <label class="form-check-label" for="bank_transfer">
                                    Bank Transfer
                                  </label>
                                </div>
                                --}}
                              </div>  
                            </div>
                     
                         
                            <!-- card page end -->
                 
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4-->
                        <!--begin::Step 5-->
                        <div data-kt-stepper-element="content">
                          <!--begin::Wrapper-->
                          <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-8 pb-lg-10">
                              <!--begin::Title-->
                              <h2 class="fw-bolder text-dark" style="text-transform: none !important;">Almost done! Submit your application now and
proceed to make the payment</h2>
                              <!--end::Title-->
                              <!--begin::Notice-->
                             <!--  <div class="text-gray-400 fw-bold fs-6">If you need more info, please
                               <a target="_blank" href="{{ url('/contact') }}" class="link-primary fw-bolder">Contact Us</a>.
                             </div> -->

                              <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Body-->
                            <div class="mb-0">
                              <!--begin::Text-->
                              <div class="fs-6 text-gray-600 mb-5"></div>
                              <!--end::Text-->
                              <!--begin::Alert-->
                              <!--begin::Notice-->
                              <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                    <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                                  </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                  <!--begin::Content-->
                                  <div class="fw-bold">
                                     Data Protection Act 1998: The information given on this form will be held electronically for administration purposes within Exam Centre London only and will be destroyed when the student leaves permanently. Data will not be disclosed to any third parties to anyone external without your express written consent.
                                    Private candidates are required to take complete responsibility in being aware of the terms and conditions stated in this form.
                                    Exam Centre London cannot be held liable for any errors upon the completion of the form.
                                  </div>
                                  <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                              </div>
                              
                                  <div class="row mybyclicking" style="margin:20px 0px">
                                      <div class="col-md-12">
                                        <div class="col-md-12 ">
                                       <p style="color:black; padding-top: 22px;
                                        font-weight: 600;">By clicking, you confirm to book your exams with Exam Centre London and agree to make the full payment within 3 working days.</p>
                                        <br>
                                      
                                       
                                      </div>
                                     
                                      </div>  
                                    </div>
                              <!--end::Notice-->
                              <!--end::Alert-->
                            </div>
                            <!--end::Body-->
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Step 5-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                          <!--begin::Wrapper-->
                          <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon points="0 0 24 0 24 24 0 24" />
                                  <rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
                                  <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                                </g>
                              </svg>
                            </span>
                            <!--end::Svg Icon-->Back</button>
                          </div>
                          <!--end::Wrapper-->
                          <!--begin::Wrapper-->
                          <div>
                            <button type="submit" data-kt-stepper-action="submit" class="mainsubmit btn btn-primary btn btn-lg btn-primary me-3">
                              <span class="indicator-label">Go To Payment Page
                              <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                              <span class="svg-icon svg-icon-3 ms-2 me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                  </g>
                                </svg>
                              </span>
                              <!--end::Svg Icon--></span>
                              <span class="indicator-progress">Please wait...
                              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon points="0 0 24 0 24 24 0 24" />
                                  <rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
                                  <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                </g>
                              </svg>
                            </span>
                            <!--end::Svg Icon--></button>
                          </div>
                          <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                      </form>
                      <!--end::Form-->
                    </div>
                    <!--end::Stepper-->
                  </div>
                  <!--end::Card body-->
                </div>
                <!--end::Card-->
              </div>
              <!--end::Container-->
            </div>
            <!--end::Post-->
          </div>
          
        
          
  <script>
    var i=1;
    function addmore(){
        $("#add_more").append('<div class="mb-10 fv-row row"><div class="col-md-4" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="ACCA">ACCA</option></select></div>  <div class="col-md-4" style=""><div class="mb-0 fv-row"><label class="form-label mb-3">What time to start your exam?</label><div class="mb-0 row"><select class="form-select form-select-lg form-select-solid" name="start_exam_time[]"><option value="10 am">10 am</option><option value="12 pm">12 pm</option></select></div></div></div><div class="col-md-3" style="margin: 0px 5px;"><div class="mb-0 fv-row"><label class="form-label mb-3">Choose the dates*</label><div class="mb-0 row"><input type="test" onchange="mydateChange(this)" name="exam_date[]" class="datepicker form-control form-control-lg form-control-solid"></div></div></div><div class="col-md-3"><label class="form-label mb-3">Exam Branch</label><select id="type_'+i+'" name="type[]" data-id="'+i+'" class="form-select form-select-lg form-select-solid type"> <option value="Forest Gate">Forest Gate</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_'+i+'" onchange="subjectcheange(this)" data-id="'+i+'" class="form-select form-select-lg form-select-solid subject"><option disabled selected>--Select--</option>@foreach($allsub as $sub)<option value="{{  $sub->id }}">{{  $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">Exam Type</label> <select name="option_code[]" id="option_code_'+i+'"  class="form-select form-select-lg form-select-solid type"><option value="On Screen">On Screen</option></select></div><div class="col-md-2"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid" id="fees_demo_'+i+'" disabled/><input type="hidden" class="amount_fees" name="fees[]" id="fees_'+i+'"/><a style="color:red;padding:0px 4px" onclick="deleterow(this)" style="cursor:pointer; color:red" >Delete</a></div></div>');
      i++
    }
    
  </script>
  <script>
function deleterow(em) {
 
     
   var okkk=$(em).closest(".row").find('.amount_fees').val();
   var oldamount=$(".total_amount").val();
   var finalamount= oldamount - okkk ;
   $(".total_amount").val(finalamount)
   console.log(finalamount);
  $(em).closest(".row").remove();
    
    // countamout();

}
</script>


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

     // 
      // caring forwad exam
      $(".special_acces_yes").click(function(){
        $("#evidence_section").show();
        
        
        $('#None').prop('checked', false);
      });

      $(".special_acces_no").click(function(){
        $("#evidence_section").hide();
        
        
        $('#Anxiety_or_Mental_Health').prop('checked', false); // Checks it
        $('#Learning_Difficulties').prop('checked', false); // Unchecks it
        $('#Medical_Condition').prop('checked', false); //    Unchecks it

     
      });
     //
      // caring forwad exam
      $("#special_acces_yes").click(function(){
        $("#evidence_section").show();
      });

      $("#special_acces_no").click(function(){
        $("#evidence_section").hide();
      });

     //  mental_conditions_section

     // mental_conditions_section

        $("#mental_conditions_yes").click(function(){
        $("#mental_conditions_section").show();
      });

      $("#mental_conditions_no").click(function(){
        $("#mental_conditions_section").hide();
      });

       // mental_conditions_section

        $("#condition_disability_yes").click(function(){
          $("#condition_disability_section").show();
        });

      $("#condition_disability_no").click(function(){
        $("#condition_disability_section").hide();
      });
       

        $("#card_transfer").click(function(){
          $("#cardsection").show();
          $("#banksection").hide();
        });
        $("#bank_transfer").click(function(){
          $("#cardsection").hide();
          $("#banksection").show();
        });

// before 

    $("#has_a_candidate_yes").click(function(){
          $("#has_a_candidate_section").show();
        });

      $("#has_a_candidate_no").click(function(){
        $("#has_a_candidate_section").hide();
      });



      $("#mock_test_yes").click(function(){
        $("#papers_section").show();
        $("#marked_section").show();
      });

      $("#mock_test_no").click(function(){
         $("#papers_section").hide();
         $("#marked_section").hide();
      });
       



  });
  </script>
  <script>
    function typecheange(el){
          var type_id=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[1];
          if(type_id) {
             $.ajax({
                 url: "{{  url('/get/subject/all/') }}/"+type_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    console.log(data);

                        $('#subject_'+mainid).empty();
                        $('#subject_'+mainid).append('<option selected disabled>Select</option>');
                        $.each(data,function(index,districtObj){
                         $('#subject_'+mainid).append('<option value="' + districtObj.id + '">'+districtObj.subject_name+'</option>');
                       });

                        $('#unit_code_'+mainid).val('');
                        $('#fees_demo_'+mainid).val('');
                        $('#fees_'+mainid).val('');
                        

                     }
             });
         } else {
             alert('sorry data not found');
         }
    }
  
   function subjectcheange(el){
          var s_id=el.value;
         
          var index_id = el.id; 
          var total_amount = $("#total_amount").val();

          var arr = index_id.split('_');
          var mainid=arr[1];
         if(s_id) {
             $.ajax({
                 url: "{{  url('/get/subject/details/') }}/"+s_id,
                 type:"GET",
                 success:function(data) {
                    
                        $('#unit_code_'+mainid).val(data.unit_code);
                        $('#fees_demo_'+mainid).val(data.exam_fees);
                        $('#fees_'+mainid).val(data.exam_fees);
                        var amou=parseInt(data.exam_fees);
                        $("#total_amount").val(Number(total_amount) + Number(amou));
                    
                        
                     }
             });
         } else {
             alert('sorry data not found');
         }
    }
  </script>
    <script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom/modals/create-account-two.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom/widgets.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom/apps/chat/chat.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom/modals/create-app.js"></script>
    <script src="{{asset('backend')}}/assets/js/custom/modals/upgrade-plan.js"></script>



    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Help Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Option code/ Help Text Here or pdf or Docx File ..........................................
        ................
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalLongss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Option Code Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @php
        $alloptioncode=App\Models\Subject::where('exam_type','A Level')->where('has_option_code',1)->orderBy('id','DESC')->get();
        @endphp
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Level</th>
              <th scope="col">Subject</th>
              <th scope="col">Option Code & Details</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($alloptioncode as $yes => $code)
            <tr>
              <th scope="row">{{++ $yes}}</th>
              <th>{{ $code->exam_type }}</th>
              <td>{{$code->subject_name}}</td>
              <td>
                <table class="table">
                  <tbody>
                    @foreach(json_decode($code->option_code_details) as $opcode)
                    <tr>
                      <td>{{$opcode->option_code}}</td>
                      <td>{{$opcode->description}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
              
            </tr>
            @endforeach
           
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModalLongpp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Payment Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Payment Policy text here.................................
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<script>
  (function() {
  function Init() {
    var fileSelect = document.getElementById('file-upload'),
      fileDrag = document.getElementById('file-drag'),
      submitButton = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) 
    {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();
    
    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  function output(msg) {
    var m = document.getElementById('messages');
    m.innerHTML = msg;
  }

  function parseFile(file) {
    output(
      '<ul>'
      + '<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>'
      + '<li>Type: <strong>' + file.type + '</strong></li>'
      + '<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>'
      + '</ul>'
    );
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 1024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 1024 * 1024) {
        // Progress bar
        pBar.style.display = 'block';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
          if (xhr.readyState == 4) {
            // Everything is good!
            
            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-form').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
})();
</script>

<script>
    function editimageremove(em) {
        $("#editimage").hide();
        $("#thumbnail_img").show();
    }
</script>
<script>
 $(function() {
$( "#datepicker" ).datepicker();
});

</script>


<script>
    function whoiam(el){
        
        var mainid=el.id;
       if(mainid=='some_one_else'){
           $("#some_one_else_section").show();
          
       }
        if(mainid=='I_am_Booking'){
           $("#some_one_else_section").hide();
          
       }
        
    }
</script>



<script>
var numberminLength = 4;
var numbermaxLength = 4;
$(document).ready(function(){
    $('#has_a_candidate_number').on('keydown keyup change', function(){
        var char = $(this).val();
        var charLength = $(this).val().length;
        if(charLength < numberminLength){
            $('#candidate_number_new_message').text('Length is short, minimum '+numberminLength+' required.');
        }else if(charLength > numbermaxLength){
            $('#candidate_number_new_message').text('Length is not valid, maximum '+numbermaxLength+' allowed.');
            $(this).val(char.substring(0, numbermaxLength));
        }else{
            $('#candidate_number_new_message').text('');
        }
    });
});
</script>
<script>
            const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
            });
        </script>
        


<script>
var uciminLength = 7;
var ucimaxLength = 7;
$(document).ready(function(){
    $('.acca_registration').on('keydown keyup change', function(){
        var char = $(this).val();
        var charLength = $(this).val().length;
        if(charLength < uciminLength){
            $('#warning-message').text('Length is short, minimum '+uciminLength+' required.');
        }else if(charLength > ucimaxLength){
            $('#warning-message').text('Length is not valid, maximum '+ucimaxLength+' allowed.');
            $(this).val(char.substring(0, ucimaxLength));
        }else{
            $('#warning-message').text('');
        }
    });
});
</script>
   <style>
          .logo{
                margin-left:20px!important;
          }
      ul.list {
    margin-left: -24px !important;
}


.form-control.form-control-solid {

    padding: 24px 10px !important;

}
        </style>
     
        

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap 4 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    @php
        $allforestgatedate=DB::table('branch_day_off')->where('branch',1)->orderBy('id','DESC')->get();
    @endphp
    
    <script type="text/javascript">
    
         var datesForDisable = [ @foreach($allforestgatedate as $fdate) "{{ $fdate->date }}",  @endforeach];
var date = new Date();

        $('.datepicker').datepicker({
            startDate: date,
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            datesDisabled: datesForDisable,
            daysOfWeekDisabled: [0,2,5,6],
           
            
        }).on("change", function() {
            
          var mydate=$(".datepicker").val();
                $.ajax({
                     url: "{{  url('/get/date-day/all/') }}/"+mydate,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        console.log(data);
    
                            $('#mytime').empty();
                            $.each(data,function(index,districtObj){
                             $('#mytime').append('<option value="' + districtObj.time + '">'+districtObj.time+'</option>');
                          });
    
                            
                            
    
                         }
                });
           
          });
    </script>
    
    
      <style>
     .table-condensed {
    border: 1px solid #f7f7f7 !important;
    padding: 10px 10px !important;
    margin: 10px !important;
    cursor: pointer!important;
        }
    td.day {
    padding: 10px !important;
    }
    td.disabled.disabled-date.day {
    background: #df002977!important
   
}
</style>
     <script>
         function mydateChange(){
             alert("ok");
             
         }
     </script>  
       
       
       
       
       
        <script>
	
								function initImageUpload(box) {
									let uploadField = box.querySelector('.image-upload');
								  
									uploadField.addEventListener('change', getFile);
								  
									function getFile(e){
									  let file = e.currentTarget.files[0];
									  checkType(file);
									}
									
									function previewImage(file){
									  let thumb = box.querySelector('.js--image-preview'),
										  reader = new FileReader();
								  
									  reader.onload = function() {
										thumb.style.backgroundImage = 'url(' + reader.result + ')';
									  }
									  reader.readAsDataURL(file);
									  thumb.className += ' js--no-default';
									}
								  
									function checkType(file){
									  let imageType = /image.*/;
									  if (!file.type.match(imageType)) {
										throw 'Datei ist kein Bild';
									  } else if (!file){
										throw 'Kein Bild gewählt';
									  } else {
										previewImage(file);
									  }
									}
									
								  }
								  
								  // initialize box-scope
								  var boxes = document.querySelectorAll('.box');
								  
								  for (let i = 0; i < boxes.length; i++) {
									let box = boxes[i];
									initDropEffect(box);
									initImageUpload(box);
								  }
								  
								  
								  
								  /// drop-effect
								  function initDropEffect(box){
									let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
									
									// get clickable area for drop effect
									area = box.querySelector('.js--image-preview');
									area.addEventListener('click', fireRipple);
									
									function fireRipple(e){
									  area = e.currentTarget
									  // create drop
									  if(!drop){
										drop = document.createElement('span');
										drop.className = 'drop';
										this.appendChild(drop);
									  }
									  // reset animate class
									  drop.className = 'drop';
									  
									  // calculate dimensions of area (longest side)
									  areaWidth = getComputedStyle(this, null).getPropertyValue("width");
									  areaHeight = getComputedStyle(this, null).getPropertyValue("height");
									  maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));
								  
									  // set drop dimensions to fill area
									  drop.style.width = maxDistance + 'px';
									  drop.style.height = maxDistance + 'px';
									  
									  // calculate dimensions of drop
									  dropWidth = getComputedStyle(this, null).getPropertyValue("width");
									  dropHeight = getComputedStyle(this, null).getPropertyValue("height");
									  
									  // calculate relative coordinates of click
									  // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
									  x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
									  y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
									  
									  // position drop and animate
									  drop.style.top = y + 'px';
									  drop.style.left = x + 'px';
									  drop.className += ' animate';
									  e.stopPropagation();
									  
									}
								  }
								  
							</script>
							
					<script>


 $(window).on('load', function() { 
                $('#preloader').fadeIn('slow'); // will fade out the white DIV that covers the website. 
            $('body').css({'overflow':'visible'});
            $('#preloader').delay(50).fadeOut('slow');
            $('body').delay(50).css({'overflow':'visible'});
		})

  
$(document).ready(function(){
  $("#kt_create_account_form").on("submit", function(){
    $("#preloader").fadeIn();
  });
});
</script>

<script>

  function addExamtype(){
    var student_id=$("#user_id").val();
    var main_exam=$("#main_exam_type").val();
  
  
    $.ajax({
            url: "{{  url('get/insert-exam-type/update') }}",
            type:"GET",
            data:{
              'student_id':student_id,
              'main_exam':main_exam,
            },
            success:function(data) {
                console.log(data);
            }
      });
  
  
  }
  addExamtype();
  
  </script>
@endsection
