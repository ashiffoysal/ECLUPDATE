@extends('layouts.backend')
@section('title', 'Seat Plan')
@section('content')
 
<style>
    .file_upload {
        border: 3px dashed #7eabf3 !important;
        height: 300px !important;
    }
    p {
        color: #5FAAE1 !important;
        display: inline !important;
        width: auto !important;
    }
    .badge-info {
        color: #fff;
        background-color: #98969c;
        margin-left: 8px;
    }
    p {
        color: #5FAAE1 !important;
        display: inline !important;
        width: auto !important;
    }
    .form-control {
        padding:-0.25rem 1rem;
    }
    input[type="text"] {
    border: 1px solid #f7f7f7;
    padding: 10px 10px;
    /* background: #f5f5f5; */
    background-color: #f5f8fa;
    border-color: #f5f8fa;
    color: #5e6278;
    }
    .form-control.form-control-solid {
    background-color: #f5f8fa;
    border-color: #f5f8fa;
    color: #5e6278;
    transition: color .2s ease,background-color .2s ease;
    padding: 7px 10px;
    }
    .bootstrap-tagsinput {
        background-color: #f5f8fa;
        border-color: #f5f8fa;
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
        display: inline-block;
        padding: 4px 6px;
        color: #b9b9b9;
        vertical-align: middle;
        border-radius: 4px;
        max-width: 100%;
        line-height: 25px;
        cursor: text;
        width: 100%;
        background: aliceblue;
    }
    select.form-control {
    padding: 4px !important;
}

.form-control  .form-select.form-select-solid:active, .form-select.form-select-solid:focus  {
background-color: #ffffff !important;
    border-color: #000000 !important;
    color: #000000 !important;
    
}
.form-control{
    background-color: #ffffff !important;
    border-color: #393c3e !important;
    color: #000104 !important;
    padding: 20px 10px !important;
    
}
.form-control .form-control.form-control-solid:active, .form-control.form-control-solid:focus {
    background-color: #ffffff !important;
    border-color: #393c3e !important;
    color: #000104 !important;
    padding: 20px 10px !important;
    
}


.form-select.form-select-solid {
    background-color: #ffffff !important;
    border-color: #000000 !important;
    color: #5e6278 !important;
    transition: color .2s ease,background-color .2s ease;
}
.col-form-label {
 
    font-weight: 800 !important;
    
}
.block-design {
    padding: 10px 10px;
    background: #009ef7;
    color: #ffff;
    border: 1px solid #000000;
    border-radius: 10px;
    width: 100%;
    margin: 10px;
}

.block-design-Ilford {
    padding: 10px 10px;
    background: #ba00f7 !important;
    color: #ffff;
    border: 1px solid #000000;
    border-radius: 10px;
    width: 100%;
    margin: 10px;
}

.block-design-null{
    padding: 10px 10px;
    background: #000 !important;
    color: #ffff;
    border: 1px solid #000000;
    border-radius: 10px;
    width: 100%;
    margin: 10px;
}
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">AAT,ACCA,Functional Skills [Seating Plan]</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>
  
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
           
           <div class="card">
                                        <div class="row mb-10 mt-5">
                                            <form action="{{ url('admin/skill-exam/seating-plan/index') }}" method="post">
                                                @csrf
                                                <label class="col-lg-2 col-form-label text-lg-end">Branch:<span class="required"></span></label>
                                                <div class="col-lg-3 col-xl-3">
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                       <select name="exam_board" class="form-select form-select-solid" >
                                                           <option value="Forest Gate Branch 54 Upton Lane London E7 9LN">Forest Gate</option>
                                                           <option value="Ilford Branch 269 Ilford Lane, Ilford IG1 2SD">Ilford Lane</option>
                                                         
                                                       </select>
                                                    </div>
                                                </div>
                                                <label class="col-lg-1 col-form-label text-lg-end"> Date:<span class="required"></span></label>
                                                <div class="col-lg-3 col-xl-3">
                                                    <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                        <input class="form-control form-control-solid" type="date" name="date" required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-1">
                                                    <button type="submit" class="btn btn-danger">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                   
                                        <div class="row mb-10">
                                           
                                        </div>
                   
                
            </div>
            @if(isset($searcData))
               <div class="card">
                   <div class="row">
                        <div class="col-md-12 col-xl-12" style="padding:20px 30px">
                            <div class="card-body">
                                <h3>Search Result</h3><br>
                                
                                 <h5>{{ $searcData->branch }}</h5><br>
                                <span class="badge badge-danger">{{ $searcData->date }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                        @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_1 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_1)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                     <div class="row">
                                           @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_2 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_2)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                      <div class="row">
                                       
                                              
                                              @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_3 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_3)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                              
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                          @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_4 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_4)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                     <div class="row">
                                          @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_5 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_5)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-5</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-5</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                      <div class="row">
                                       @if($searcData)
                                          <div class="col-md-4 mydesign">
                                                @if($searcData->fg_cpu_6 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$searcData->fg_cpu_6)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-6</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-6</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
               </div>
            @else
            <div class="card">
                    <div class="row">
                        <div class="col-md-12 col-xl-12" style="padding:20px 30px">
                        @php
                            $todayDate=Carbon\Carbon::now()->toDateString();
                            
                            $dateofconvert=date('d-M-Y', strtotime($todayDate));
                            
                            $seatPlan=DB::table('skillexam_seat_plan')->where('date',$dateofconvert)->first();
                           
                            
                        @endphp
                            <div class="card-body">
                                <h3>Today Seating Plan</h3><br>
                                
                                 <h5>Forest Gate</h5><br>
                                <span class="badge badge-danger">{{ date('d-M-Y', strtotime($todayDate)) }} </span>
                            </div>
                        </div>
                       
                        
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                        @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_1 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_1)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                     <div class="row">
                                           @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_2 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_2)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                      <div class="row">
                                       
                                              
                                              @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_3 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_3)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                              
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                          @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_4 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_4)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                     <div class="row">
                                          @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_5 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_5)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-5</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-5</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                      <div class="row">
                                       @if($seatPlan)
                                          <div class="col-md-4 mydesign">
                                                @if($seatPlan->fg_cpu_6 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->fg_cpu_6)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                              <div class="block-design">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-6</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                            <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-6</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                      
                    </div>
                    <!--ilford-->
                      <div class="row">
                        <div class="col-md-12 col-xl-12" style="padding:20px 30px">
                            <div class="card-body">
                                <h5>Ilford Lane</h5><br>
                                <span class="badge badge-danger">Today {{ $dateofconvert }}</span>
                            </div>
                        </div>
                        <!--
                          <div class="col-md-4 mydesignIlford">
                                              <div class="block-design-Ilford">
                        -->
                        
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                         
                                           @if($seatPlan)
                                          <div class="col-md-4 mydesignIlford">
                                                @if($seatPlan->il_cpu_1 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->il_cpu_1)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                               <div class="block-design-Ilford">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                          <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-1</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                         
                                         
                                         
                                    </div>
                                     <div class="row">
                                          @if($seatPlan)
                                          <div class="col-md-4 mydesignIlford">
                                                @if($seatPlan->il_cpu_2 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->il_cpu_2)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                               <div class="block-design-Ilford">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                          <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-2</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mt-10">
                            <div class="card-body">
                               <div class="container">
                                   
                                    <div class="row">
                                         @if($seatPlan)
                                          <div class="col-md-4 mydesignIlford">
                                                @if($seatPlan->il_cpu_3 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->il_cpu_3)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                               <div class="block-design-Ilford">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                          <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-3</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                     <div class="row">
                                          @if($seatPlan)
                                          <div class="col-md-4 mydesignIlford">
                                                @if($seatPlan->il_cpu_4 !=null)
                                                @php
                                                    $data=App\Models\ExamRequest::where('id',$seatPlan->il_cpu_4)->select(['first_name','middle_name','last_name','main_exam_type','email','booking_id','id'])->first();
                                                @endphp
                                               <div class="block-design-Ilford">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">{{ $data->main_exam_type }} Exam </p> <br>
                                                  <span>{{ $data->first_name }} {{ $data->last_name }}</span>
                                                  <br><span>{{ $data->email }}</span>
                                                  <br><span style="font-size:10px;">Booking-ID: {{$data->booking_id }}</span>
                                              </div>
                                              @else
                                          <div class="block-design-null">
                                                  <p style="color:#fff !important;font-size:25px !important">CPU-4</p> <br>
                                                  <p style="color:#fff !important">NONE </p> <br>
                                                  <span>NONE</span><br>
                                                  <span>NONE</span>
                                                  <br><span style="font-size:10px;">NONE</span>
                                              </div>
                                              @endif
                                              
                                         </div>
                                         @endif
                                    </div>
                                  
                                    
                                </div>
                            </div>
                        </div>
                        
                      
                    </div>
                
            </div>
            @endif
        </div>
    </div>
     
</div>

@endsection