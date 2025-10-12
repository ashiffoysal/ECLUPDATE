@extends('layouts.backend')
@section('title', 'Supports')
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
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Supports List</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Layout Builder Notice-->
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
                        <p class="list-unstyled text-gray-600 fw-bold fs-6 p-0 m-0">Supports Manage</p>
                    </div>
                     <div class="ms-6">
                        <a href="{{url('admin/supports/create')}}" class="badge badge-danger">Create Supports</a>
                    </div>
                      <div class="ms-6">
                        <a href="{{url('admin/supports-first-booking/alert')}}" class="badge badge-primary">First ALert Mail Send</a>
                    </div>
                      <div class="ms-6">
                        <a href="{{url('admin/supports-second-booking/alert')}}" class="badge badge-warning">Second Alert Mail Send</a>
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
                                <span class="card-label fw-bolder fs-3 mb-1">All Supports</span>
                                <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 orders</span> -->
                            </h3>
                        </div>
              
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:14px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px">Supports ID</th>
                                            <th class="min-w-140px">Name</th>
                                            <th class="min-w-140px">Email</th>
                                            <th class="min-w-140px">Phone</th>
                                            <th class="min-w-140px">Exam Booking</th>
                                            <th class="min-w-140px">Date</th>
                                            <th class="min-w-140px">Notes</th>
                                            <th class="min-w-100px text-end">More</th>
                                         
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($alldata as $key => $data)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td>
                                                 {{ $data->support_id }} <br>
                                                 @if($data->is_contact==1)
                                                 <span class="badge badge-danger">Contact message</span>
                                                 @endif
                                            </td>
                                             <td>
                                                 {{ $data->name }}   <br>
                                                 @if($data->is_reply==0)
                                                 <span class="badge badge-warning">No Reply yet</span>
                                                 @endif
                                                 
                                            </td>
                                            <td>
                                                {{ $data->email }} @if($data->unseen_message_count >0)<br><span class="badge badge-danger">Unseen Message:{{ $data->unseen_message_count }}</span>@endif
                                            </td>
                                            <td>
                                                 {{ $data->phone }}<br>
                                                  @if($data->is_seen==0)
                                                 <span class="badge badge-warning">unseen</span>
                                                 @endif
                                            </td>
                                           <td>
                                                 <span class="badge badge-success">{{ $data->exam_request_count ?? 0 }}</span>
                                            </td>
                                              <td>
                                                  @php
													    $_stockupdate= Carbon\Carbon::parse($data->created_at)->format('d-m-Y'); 
													    
													@endphp
													    
													    {{$_stockupdate}} <br>
													   @if($data->first_payment_alert==1)
													    <span style="color:red">First Payment Alert Send</span>
													    @endif
													    @if($data->second_payment_alert==1)
													    <span style="color:red">Second Payment Alert Send</span>
													    @endif
                                            
                                            </td>
                                            
                                             <td>
                                             <textarea id="{{ $data->id }}" name="mynots" onchange="insertupdate(this)">{{ $data->admin_notes }}</textarea>
                                       
                                            </td>
                                          
                                            <td class="text-end">
                                                 <a href="{{url('/admin/supports/message-reply/'.$data->support_id)}}" data-bs-toggle="tooltip" title="Message!" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                 <i class="fa fa-comment validation" ></i>
                                                </a>
                                                 <a href="{{url('/admin/supports/exam-booking/'.$data->id)}}" data-bs-toggle="tooltip" title="Exam Booking!" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                 <i class="fa fa-bookmark validation"></i>
                                                </a>
                                                
                                                @if($data->is_contact==0)
                                               <a href="{{url('/admin/supports/export/'.$data->id)}}" data-bs-toggle="tooltip" title="Print!"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="fa fa-print validation"></i>
                                                </a>
                                                
                                                  
                                                <a href="{{url('/admin/supports/edit/'.$data->id)}}" data-bs-toggle="tooltip" title="Edit!"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="fa fa-edit blue"></i>
                                                </a>
                                                @endif
                                                <a id="delete" href="{{url('admin/supports/delete/'.$data->id)}}" data-bs-toggle="tooltip" title="Delete!"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                <i class="fa fa-trash validation"></i>
                                                </a>
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
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!-- Button trigger modal -->

<script>
    function insertupdate(el){
        var id=el.id;
        var val=el.value;
       
            $.ajax({
                 url: "{{  url('admin/update/supportsnotes') }}",
                 type:"GET",
                 data: { 
                     "val": val,
                     "id": id,
                     
                 } ,
                 success:function(data) {

                        if(data=='success'){
                            iziToast.success({
            					message: 'Notes add Success',
            					'position': 'topRight'
            				});
                        }else if(data=='faild'){
                            iziToast.warning({
            					message: 'Notes add faild',
            					'position': 'topRight'
            				});
                        }
                            
                        

                    }
             });
    }
</script>

@endsection