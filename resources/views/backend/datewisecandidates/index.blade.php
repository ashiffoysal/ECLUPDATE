@extends('layouts.backend')
@section('content')
<style>

div.dataTables_wrapper div.dataTables_length select {

  height: 33px;
}
div.dataTables_wrapper div.dataTables_filter input {

    height: 25px;
}
select.form-control {
    padding: 6px;
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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">GCSE Student Exam Request List</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3"> </h1>
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
                <div class="card-body">
                    <!--begin::Icon-->
                           <form action="{{ url('admin/date-wise/candidates') }}" method="post">
                                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" name="exam_date" class="form-control">
                            </div>
                               <div class="col-md-4">
                                 <select name="exam_time" class="form-control">
                                    <option value="">Select</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                              <div class="col-md-4">
                                 <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                     
                                
                             
                                
                            </form>
                    
                    <!--end::Description-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1" style="color:red">@if(isset($searchDate)) Search Results Date :{{ \Carbon\Carbon::parse($searchDate)->format('d/m/Y') ?? '' }}  Time: {{ $searchTime ?? '' }} @endif</span>
                                <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 orders</span> -->
                                
                                
                            </h3>
                        
                        </div>
              
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px"> Name </th>
                                            <th class="min-w-140px">Email-Phone</th>
                                              <th class="min-w-140px">Exam type</th>
                                           <th class="min-w-100px">Date</th>
                                           <th class="min-w-100px">Canidate ID </th>
                                           <th class="">Manage </th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                              @if(isset($alldata))
    @foreach($alldata as $skey => $data)
        @php
            $mainexam = App\Models\ExamRequest::where('id', $data->exam_id)
                ->select(['first_name','middle_name','last_name','email','phone','Candidate_number','exam_board','main_exam_type'])
                ->first();
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mainexam->first_name }} {{ $mainexam->middle_name }} {{ $mainexam->last_name }} <br><a target="blank" href="{{ url('admin/exambooking/maindetails',$data->exam_id) }}" class="badge badge-warning">Profile</a></td>
            <td>{{ $mainexam->email }} <br>{{ $mainexam->phone }}
            <br><a target="blank" href="{{ url('admin/candidate-gcse-alevel-igcse-confirmation/exambooking',$data->exam_id) }}" class="badge badge-warning">Statement Page</a>
            
            </td>
             <td>{{ $mainexam->main_exam_type }}</td>
            <td>{{ \Carbon\Carbon::parse($searchDate)->format('d/m/Y') ?? '' }} - {{ $searchTime }}</td>
            <td>{{ $mainexam->Candidate_number }}</td>
            <td style="text-aling:center">
    <table style="border:none;text-aling:center">
        @foreach($data->filteredExams as $details)
            <tr>
                <td >
                    <span class="copy-text">
                        {{ $mainexam->first_name }} {{ $mainexam->middle_name }} {{ $mainexam->last_name }}
                        ({{ $mainexam->Candidate_number }})<br>
                        {{ $data->exam_board }} - {{ $data->exam_subject }} - {{ $details->syllabus }}
                    </span>
          
                    <br>
                    <br>
                    <a href="javascript:void(0)" class="badge badge-primary copy-btn">Copy</a>
                    
                </td>
                <td></td>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </table>
</td>
        </tr>
    @endforeach
@endif



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



<script>
    function insertupdate(el){
        var id=el.id;
        var val=el.value;
       
            $.ajax({
                 url: "{{  url('admin/update/examnotes') }}",
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
$(document).on("click", ".copy-btn", function() {
    // find the closest td with .copy-text
    let textToCopy = $(this).closest("tr").find(".copy-text").text().trim();

    // copy to clipboard
    navigator.clipboard.writeText(textToCopy).then(function() {
        Swal.fire({
            icon: 'success',
            title: 'Copied!',
            text: textToCopy,
            showConfirmButton: false,
            timer: 1500
        });
    }).catch(function(err) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Could not copy text!',
        });
        console.error("Could not copy text: ", err);
    });
});
</script>

@endsection