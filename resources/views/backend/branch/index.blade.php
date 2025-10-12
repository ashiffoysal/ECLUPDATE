@extends('layouts.backend')
@section('title', 'Branch')
@section('content')


 @php
    $allweekday=DB::table('weekday_name')->orderBy('id','DESC')->get();
@endphp


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
</style>

<div class="modal fade" id="adddsession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
	
		<div class="modal-content">
		
			<form class="form"  action="{{url('admin/branch-exam-time/create')}}" method="post" enctype='multipart/form-data'>
				@csrf
			
				<div class="modal-header">
					<h2 class="fw-bolder">Create-session [Forest Gate / IlfordLane]</h2>
				</div>
			
				<div class="modal-body py-10 px-lg-17">
				    
				   
				    <div class="form-group">
                        <label for="exampleFormControlFile1">Day</label>
                      
                        <select name="weekday" class="form-control">
                            @foreach($allweekday as $myday)
                            <option value="{{$myday->name}}">{{$myday->name}}</option>
                            @endforeach
                        </select>
                        
                      </div>
				    
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Time Session</label>
                        <input type="text" name="time" class="form-control" placeholder="Please Enter Time Session Ex: 2PM " required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Branch</label>
                      
                        <select name="branch" class="form-control">
                            <option value="1">Forest gate</option>
                            <option value="2">Ilford Lane</option>
                        </select>
                        
                      </div>
                    
				
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					
					<button type="submit" class="btn btn-primary"><span class="indicator-label">Update</span>
						
					</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div> 
</div>


<div class="modal fade" id="myexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
	
		<div class="modal-content">
		
			<form class="form"  action="{{url('admin/forest-branch-exam-day-off/create')}}" method="post" enctype='multipart/form-data'>
				@csrf
			
				<div class="modal-header">
					<h2 class="fw-bolder">Create Day Off [Forest Gate]</h2>
				</div>
			
				<div class="modal-body py-10 px-lg-17">
				    
				   
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Date</label>
                        <input type="Date" name="date" class="form-control" required>
                        <input type="hidden" name="branch"  value="1">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Reason</label>
                        <input type="text" name="reason" class="form-control" required >
                        
                      </div>
                    
				
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					
					<button type="submit" class="btn btn-primary"><span class="indicator-label">Update</span>
						
					</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div> 
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
	
		<div class="modal-content">
		
			<form class="form" action="{{url('admin/ilford-branch-exam-day-off/create')}}" method="post" enctype='multipart/form-data'>
				@csrf
				<div class="modal-header">
					<h2 class="fw-bolder">Create Day Off [Ilford Lane]</h2>
				</div>
				<div class="modal-body py-10 px-lg-17">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Date</label>
                        <input type="Date" name="date" class="form-control" required>
                        <input type="hidden" name="branch"  value="2">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Reason</label>
                        <input type="text" name="reason" class="form-control" required >
                      </div>
				</div>
				<!--end::Modal body-->
				<!--begin::Modal footer-->
				<div class="modal-footer flex-center">
					
					<button type="submit" class="btn btn-primary"><span class="indicator-label">Update</span>
						
					</button>
					   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!--end::Button-->
				</div>
				<!--end::Modal footer-->
			</form>
			<!--end::Form-->
		</div>
	</div> 
</div>



<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Branch</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
           
            <div class="card">
                
                        <!-- radio ends -->
                    <div class="row">
                        
                        <div class="col-md-5 col-xl-5">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                        <div class="row mb-10">  
                                            <div class="col-lg-3">
                                              
                                            </div>
                                            <div class="col-lg-8 mt-5" style="margin-bottom: 10px;">
                                                <h4>Forest Gate</h4>
                                            </div>
                                            
                                           
                                        </div>
                                        
                                        <div class="row mb-10"> 
                                        
                                       
                                        @foreach($allweekday as $weekday)
                                            <div class="col-md-12">
                                                <span>{{ $weekday->name }}</span>
                                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 dataTable no-footer text-center">
                                                      @php
                                                    $forestgateTIme=DB::table('branch_exam_time')->where('weekday',$weekday->name)->where('branch',1)->get();
                                                    @endphp
                                                    @foreach($forestgateTIme as $ftime)
                                                    <tr>
                                                        
                                                        <td>{{ $ftime->time }}</td>
                                                        @if($ftime->status==1)
                                                        <td><a href="{{ url('admin/branch-exam-time/deactive/'.$ftime->id) }}" class="badge badge-success">Active</a></td>
                                                        @else
                                                         <td><a href="{{ url('admin/branch-exam-time/active/'.$ftime->id) }}" class="badge badge-danger">Deactive</a></td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('admin/branch-exam-time/delete/'.$ftime->id) }}" class="badge badge-danger">Delete</a>
                                                            
                                                        </td>
                                                    <tr> 
                                                    @endforeach
                                                    
                                                   
                                                    
                                                </table>
                                            </div>
                                        @endforeach
                                            
                                          
                                        </div>
                                        
                                        
                                           <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card mb-5 mb-xl-8">
                                                        <!--begin::Header-->
                                                        <div class="card-header border-0 pt-5">
                                                            <h5 class="card-title align-items-start flex-column"> 
                                                                <span class="card-label fs-3 mb-1">Add Day Off For Forest Gate Branch</span> 
                                                                
                                                                
                                                  <button type="button" data-toggle="modal" data-target="#myexampleModal" class="btn btn-danger" style="color:#fff">Create</button>
                                                                <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 orders</span> -->
                                                            </h5>
                                                        </div>
                                                      
                                              
                                                        <div class="card-body py-3">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 data-table" id="example" style="width:100%;font-size:12px" >
                                                                    <!--begin::Table head-->
                                                                 <thead class="text-center">
                                                                    <tr class="fw-bolder text-muted">
                                                                        <th class="">Date</th>
                                                                        <th class="min-w-140px"> Reason </th>
                                                                       
                                                                        <th class="min-w-100px"> Manage </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                    <tbody class="text-center">
                                                                     @foreach($allforestgatedate as $forestgatedate)
                                                                        <tr>
                                                                            <td>{{ $forestgatedate->date }}</td>
                                                                            <td>{{ $forestgatedate->reason }} </td>
                                                                            <td class="min-w-100px text-end">
                                                                                
                                                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Manage
                                                                                
                                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon--></a>
                                                                                <!--begin::Menu-->
                                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="{{ url('admin/ilford-branch-exam-day-off/delete/'.$forestgatedate->id) }}" class="menu-link px-3">Delete</a>
                                                                                    </div>
                                                                                       
                                                                                    <!--end::Menu item-->
                                                                                </div>
                                                                                <!--end::Menu-->
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
                                        
                                        
                                        
                                        
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                            <!--end::Body-->
                         
                        </div>
                        <div class="col-md-1" style="margin:50px 0px" >
                            
                             <button type="button" data-toggle="modal" data-target="#adddsession" class="btn btn-primary" style="color:#fff">Add Session</button>
                            
                        </div>
                        
                        <div class="col-md-5 col-xl-5">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                        <div class="row mb-10">  
                                                    
                                            <div class="col-lg-3">
                                                
                                            </div>
                                            <div class="col-lg-8 mt-5" style="margin-bottom: 10px;">
                                                <h4>Ilford Lane</h4>
                                            </div>
                                            
                                           
                                        </div>
                                        
                                        <div class="row mb-10"> 
                                        @foreach($allweekday as $weekday)
                                            <div class="col-md-12">
                                                <span>{{ $weekday->name }}</span>
                                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 dataTable no-footer text-center">
                                                      @php
                                                    $ilfordLaneTIme=DB::table('branch_exam_time')->where('weekday',$weekday->name)->where('branch',2)->get();
                                                    @endphp
                                                    @foreach($ilfordLaneTIme as $ltime)
                                                    <tr>
                                                        
                                                        <td>{{ $ltime->time }}</td>
                                                        @if($ltime->status==1)
                                                        <td><a href="{{ url('admin/branch-exam-time/deactive/'.$ltime->id) }}" class="badge badge-success">Active</a></td>
                                                        @else
                                                         <td><a href="{{ url('admin/branch-exam-time/active/'.$ltime->id) }}" class="badge badge-danger">Deactive</a></td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('admin/branch-exam-time/delete/'.$ltime->id) }}" class="badge badge-danger">Delete</a>
                                                            
                                                        </td>
                                                    <tr> 
                                                    @endforeach
                                                    
                                                   
                                                    
                                                </table>
                                            </div>
                                        @endforeach
                                        </div>
                                         <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card mb-5 mb-xl-8">
                                                        <!--begin::Header-->
                                                        <div class="card-header border-0 pt-5">
                                                            <h5 class="card-title align-items-start flex-column">
                                                                <span class="card-label fs-3 mb-1">Add Day Off For Ilford Lane Branch</span>
                                                      <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" style="color:#fff">Create</button>
                                                            </h5>
                                                        </div>
                                                      
                                              
                                                        <div class="card-body py-3">
                                                            <!--begin::Table container-->
                                                            <div class="table-responsive">
                                                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3 data-table" id="example2" style="width:100%;font-size:12px" >
                                                                    <!--begin::Table head-->
                                                                 <thead class="text-center">
                                                                    <tr class="fw-bolder text-muted">
                                                                        <th class="">Date</th>
                                                                        <th class="min-w-140px"> Reason </th>
                                                                       
                                                                        <th class="min-w-100px"> Manage </th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                    <tbody class="text-center">
                                                                        
                                                                        
                                                                        @foreach($allIlfordlanedate as $ilfordlaneddate)
                                                                        <tr>
                                                                            <td>{{ $ilfordlaneddate->date }}</td>
                                                                            <td>{{ $ilfordlaneddate->reason }} </td>
                                                                            <td class="min-w-100px text-end">
                                                                                
                                                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Manage
                                                                                
                                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon--></a>
                                                                                <!--begin::Menu-->
                                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="{{ url('admin/ilford-branch-exam-day-off/delete/'.$ilfordlaneddate->id) }}" class="menu-link px-3">Delete</a>
                                                                                    </div>
                                                                                       
                                                                                    <!--end::Menu item-->
                                                                                </div>
                                                                                <!--end::Menu-->
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
                            </div>
                        </div>
                        <div class="col-md-7 col-xl-">

                        </div>
                    </div>
                
            </div>
            
        </div>
    </div>
     
</div>
	<script
										        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
										        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
										        crossorigin="anonymous">
										</script>
										<script
										        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
										        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
										        crossorigin="anonymous">
										</script>
										<script
										        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
										        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
										        crossorigin="anonymous">
										</script>
										
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
   new DataTable('#example');
</script>
<script>
   new DataTable('#example2');
</script>
@endsection