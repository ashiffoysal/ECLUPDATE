@extends('layouts.backend')
@section('title', 'Topics Update')
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Topics Update</h1>
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
                       
                         <a href="{{url('admin/supports/index')}}" class="badge badge-primary">All Supports</a>
                    </div>
                    <div class="ms-6">
                       
                         <a href="{{url('admin/supports/draft-index')}}" class="badge badge-danger">All Drafts</a>
                    </div>
                      <div class="ms-6">
                       
                         <a href="{{url('admin/exam-all-topic/index')}}" class="badge badge-danger">All Topics</a>
                    </div>
                    <!--end::Description-->
                </div>
            </div>
            <div class="card">
                <form action="{{ url('admin/update/topics') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- radio ends -->
                    <div class="row">
                        <div class="col-md-10 col-xl-10">
                            <div class="card-body">
                                <div class="tab-content pt-3" data-select2-id="select2-data-89-mk7z">
                                    <div class="tab-pane active" id="kt_builder_main" data-select2-id="select2-data-kt_builder_main">
                                         <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Title:<span class="required"></span></label>
                                            <div class="col-md-9 ">
                                                <div class="form-check form-check-custom form-check-solid form-switch mb-2">
                                                    <input class="form-control form-control-solid" type="text" name="title" placeholder="Enter Title" value="{{ $edit->title }}" required>
                                                    <input type="hidden" name="id" value="{{ $edit->id }}">
                                                    
                                                </div>
                                                @error('title')
                                                <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-md-3 col-form-label text-lg-end">Notes:<span class="required"></span></label>
                                            <div class="col-md-9">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex fw-bold h-100">
                                                  <textarea class="form-control form-control-solid" id="summernote" name="notes" rows="20" cols="50" required placeholder="Enter Notes"> {!! $edit->notes !!} </textarea>
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
                                    <div class="col-lg-1">
                                        <button type="submit" name="action" value="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                                            <span class="indicator-label">Update</span>
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
        $("#add_more_subject_row").append('<div class="row asif"> <label class="col-md-3 col-form-label text-lg-end">Subject Details:<span class="required"></span></label><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Type:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_type_change(this)" name="exam_type[]"  id="exam_type_'+i+'"  class="form-select form-select-solid" ><option value="">Select</option><option value="GCSE">GCSE</option><option value="A Level" >A Level</option><option value="AS Level">AS Level</option><option value="IGCSE" >IGCSE</option><option value="AAT">AAT</option><option value="Functional Skills">FUNCTIONAL SKILLS</option><option value="ACCA">ACCA</option></select></div></div><div class="col-md-2"><label class="col-form-label text-lg-end">Exam Board:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_board_change(this)" name="exam_board[]" id="exam_board_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-3"><label class="col-form-label text-lg-end">Subject:<span class="required"></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><select onchange="exam_subject_change(this)" name="subject[]" id="exam_subject_'+i+'" class="form-select form-select-solid"><option value="">Select</option></select></div></div><div class="col-md-2"><label class=" col-form-label text-lg-end">Fees:<span class="required"><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)"><i style="color:red" class="fa fa-times"></i></a></span></label><div class="form-check form-check-custom form-check-solid form-switch mb-2"><input class="form-control form-control-solid" type="test" name="fees[]" id="fees_'+i+'"></div></div></div>');
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
        //   var series_id =$("#exam_series_0").val();
        //   alert(series_id);
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
           var series_main =$("#series_main").val();
        //   alert(series_main);
           if(series_main){
                   var type_id=el.value;
                   var index_id = el.id; 
                   var arr = index_id.split('_');
                   var mainid=arr[2];
                   var series_id =$("#exam_type_"+mainid).val();
                   if(type_id) {
                      $.ajax({
                          url: "{{  url('get/supports/allsubject/all/') }}/"+type_id+'/'+series_id+'/'+series_main,
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
           }else{
                alert('Please Select Exam Series');
           }
          
         
         
     }
 
 </script>



<script>
    function exam_subject_change(el){
           var type_id=el.value;
           var index_id = el.id; 
           var arr = index_id.split('_');
           var mainid=arr[2];
        //   var series_main =$("#series_main).val();
        //   alert(series_main);
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


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
	$(document).ready(function() {
  $('#summernote').summernote({
	height: 300,  
  });
});
</script>

    
@endsection