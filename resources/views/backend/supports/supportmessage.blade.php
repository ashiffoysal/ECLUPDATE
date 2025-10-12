@extends('layouts.backend')
@section('title', 'Supports Message')
@section('content')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
     const myDatePicker = MCDatepicker.create({ 
                el: '#date_of_birth',
                dateFormat: 'DD-MMM-YYYY',
    });
</script>
<style>
    tbody {
    font-size: 12px !important;
}

.form-control.form-control-solid {
    background-color: #ffffff;
    border-color: #afafaf;
    color: #5e6278;
    transition: color .2s ease,background-color .2s ease;
    margin: 1px -5px;
    border-radius: 10px;
}

.form-select.form-select-solid{
    background-color: #ffffff;
    border-color: #272828!important;
    color: #5e6278;
    transition: color .2s ease,background-color .2s ease;
    border-radius: 7px;
}
div#kt_post {
    background: #fff;
}

</style>




<div class="modal fade" id="PhotoIDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Topics</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Search</label>
            <input type="search" class="form-control mydesign" id="searchField" aria-describedby="searchHelp" placeholder="Search...">
          </div>
      </div>
      <div class="modal-footer" id="searchResults">
        
     
      </div>
	  </div>
	</div>
</div>

<!-- candidate -->



	               <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Create Supports</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->

									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="index.html" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Candidate</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Supports</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-1">
									<!--begin::Wrapper-->
									
									<!--end::Wrapper-->
									<!--begin::Button-->
									<a href="{{url('/admin/exam/allbooking')}}" class="btn btn-sm btn-primary">Back</a>
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
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-xl-row">
							
								
								<div class="container" style="padding:30px 0px">
									
                       
                                 <a href="{{url('admin/supports/index')}}" class="badge badge-primary">All Supports</a>
                                 <a target="_blank" href="{{url('admin/exam-all-topic/index')}}" class="badge badge-danger">All Topics</a>
                                  <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#PhotoIDModal">
									View Topics</a>
                    				    
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


									<!--end::Content-->
								</div>
								
								 <div class="card">
                                    <form action="{{ url('admin/supports/message-reply/'.$support->support_id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <!-- radio ends -->
                                            <div class="row">
                                                <div class="col-md-10 col-xl-10">
                                                    <div class="bg-white ">
                                            			<!--begin::Messenger-->
                                            			<div class="card w-100">
                                            				<div class="card-body">
                                            					<!--begin::Messages-->
                                            					<div class="scroll-y me-n5 pe-5" style="height: 628px;">
                                            						<!--begin::Message(in)-->
                                            						@if($support->is_contact==1)
                                            					
                                            								<div class="d-flex justify-content-end mb-10">
                                            							<!--begin::Wrapper-->
                                            							<div class="d-flex flex-column align-items-end">
                                            								<!--begin::User-->
                                            								<div class="d-flex align-items-center mb-2">
                                            									<!--begin::Details-->
                                            									<div class="me-3">
                                            										<span class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($support->created_at)->format('d/m/Y') }}</span>
                                            										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{ $support->name }}</a>
                                            									</div>
                                            									<!--end::Details-->
                                            									<!--begin::Avatar-->
                                            									<div class="symbol symbol-35px symbol-circle">
                                            										
                                            									</div>
                                            									<!--end::Avatar-->
                                            								</div>
                                            								<!--end::User-->
                                            								<!--begin::Text-->
                                            								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">{{ $support->message }}</div>
                                            								<!--end::Text-->
                                            							</div>
                                            							<!--end::Wrapper-->
                                            						</div>
                                            						@else
                                            								<div class="d-flex justify-content-start mb-10">
                                            							<!--begin::Wrapper-->
                                            							<div class="d-flex flex-column align-items-start">
                                            								<!--begin::User-->
                                            								<div class="d-flex align-items-center mb-2">
                                            									<!--begin::Avatar-->
                                            									<div class="symbol symbol-35px symbol-circle">
                                            										
                                            									</div>
                                            									<!--end::Avatar-->
                                            									<!--begin::Details-->
                                            									<div class="ms-3">
                                            									    @csrf
                                            										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{ $support->createdby }}</a>
                                            										<span class="text-muted fs-7 mb-1">
                                            										    {{ \Carbon\Carbon::parse($support->created_at)->format('d/m/Y') }}
                                            										</span>
                                            									</div>
                                            									<!--end::Details-->
                                            								</div>
                                            								<!--end::User-->
                                            								<!--begin::Text-->
                                            								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{!! $support->notes !!}</div>
                                            								<!--end::Text-->
                                            							</div>
                                            							<!--end::Wrapper-->
                                            						</div>
                                            						
                                            						
                                            						@endif
                                            						<!--end::Message(in)-->
                                            						<!--begin::Message(out)-->
                                            						
                                            						@foreach($alldata as $data)
                                            						
                                            						@if($data->sender_type==2)
                                            						<div class="d-flex justify-content-end mb-10">
                                            							<!--begin::Wrapper-->
                                            							<div class="d-flex flex-column align-items-end">
                                            								<!--begin::User-->
                                            								<div class="d-flex align-items-center mb-2">
                                            									<!--begin::Details-->
                                            									<div class="me-3">
                                            										<span class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</span>
                                            										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{ $support->name }}</a>
                                            									</div>
                                            									<!--end::Details-->
                                            									<!--begin::Avatar-->
                                            									<div class="symbol symbol-35px symbol-circle">
                                            										
                                            									</div>
                                            									<!--end::Avatar-->
                                            								</div>
                                            								<!--end::User-->
                                            								<!--begin::Text-->
                                            								<div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">{!! $data->message !!}</div>
                                            								<!--end::Text-->
                                            							</div>
                                            							<!--end::Wrapper-->
                                            						</div>
                                            						@endif
                                            						
                                            						@if($data->sender_type==1)
                                            						<!--end::Message(out)-->
                                            						<!--begin::Message(in)-->
                                            						<div class="d-flex justify-content-start mb-10">
                                            							<!--begin::Wrapper-->
                                            							<div class="d-flex flex-column align-items-start">
                                            								<!--begin::User-->
                                            								<div class="d-flex align-items-center mb-2">
                                            									<!--begin::Avatar-->
                                            									<div class="symbol symbol-35px symbol-circle">
                                            									
                                            									</div>
                                            									<!--end::Avatar-->
                                            									<!--begin::Details-->
                                            									<div class="ms-3">
                                            										<a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{$data->reply_admin}}</a>
                                            										<span class="text-muted fs-7 mb-1">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</span>
                                            									</div>
                                            									<!--end::Details-->
                                            								</div>
                                            								<!--end::User-->
                                            								<!--begin::Text-->
                                            								<div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">{!! $data->message !!}</div>
                                            								<!--end::Text-->
                                            							</div>
                                            							<!--end::Wrapper-->
                                            						</div>
                                            						@endif
                                            						@endforeach
                                            			
                                            					</div>
                                            					<!--end::Messages-->
                                            				</div>
                                            				<!--end::Card body-->
                                            				<!--begin::Card footer-->
                                            				<div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                                            					<!--begin::Input-->
                                            					<textarea name="cutomer_reply" class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message" required id="summernote" ></textarea>
                                            				    <input type="hidden" name="support_id" value="{{ $support->support_id }}">
                                            				    <input type="hidden" name="name" value="{{ $support->name }}">
                                            				    <input type="hidden" name="email" value="{{ $support->email }}">
                                            					<div class="d-flex flex-stack">
                                            			
                                            						<button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                                            						<!--end::Send-->
                                            					</div>
                                            					<!--end::Toolbar-->
                                            				</div>
                                            				<!--end::Card footer-->
                                            			</div>
                                            			<!--end::Messenger-->
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
                                            <div class="col-md-7 col-xl-7">
                    
                                            </div>
                                        </div>
                                    </form>
                                </div>
							
							</div>
							<!--end::Container-->
						</div>
					
					</div>

</div>

        <script src="https://code.jquery.com/jquery-migrate-3.4.1.js" integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	    <script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/add-payment.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/adjust-balance.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/invoices.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/payment-method.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/payment-table.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/view/statement.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/customers/update.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/new-card.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/widgets.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/chat/chat.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/create-app.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->







<script>
$('#specialAccess').click(function() {
  if ($(this).prop('checked')) {
     $("#access_topic").html("");
  } else {
     $("#access_topic").html("");
  }
});
</script>



<script>
$('#UcasAccess').click(function() {
  if ($(this).prop('checked')) {
     $("#Ucas_topic").html(' <p><strong>We are an authorized exam center for all UK exam boards and a registered UCAS center, providing services to private candidates who require support with their university applications via UCAS.</strong></p><h3><strong>Services Overview:</strong></h3><ol><li><p><strong>Mock Exams for Predicted Grades and UCAS References:</strong></p><ul><li>To provide a predicted grade and reference for your UCAS application, candidates must take a minimum of two mock exams.</li><li>The cost is £80 per exam, which includes marking. For two exams, the total is £160.</li><li>Mock exams completed by November will qualify for AS-level consideration by the 15th of November. After this date, full A-level exams will be required.</li><li>We typically predict a grade that is one level higher than the grade achieved in these mock exams.</li><li>Candidates can book mock exams at any time before the deadline.</li></ul></li><li><p><strong>UCAS Application Support:</strong></p><ul><li>A fee of £100 is charged for managing the UCAS application and related administrative tasks.</li><li>Additional support for personal statement writing is available for £50.</li></ul></li></ol><h3><strong>Process Outline:</strong></h3><ul><li>Candidates must create an account on the UCAS website and complete their application using our UCAS center number and buzz code.</li><li>The application will be sent to us for verification, allowing us to provide the necessary references and predicted grades.</li><li>Once verified, we forward the application to the universities, which will then assess it and issue offer letters accordingly.</li></ul><p>Our services are designed to ensure that private candidates receive comprehensive support and guidance throughout the UCAS application process, helping them secure a place at their chosen university.</p><p>For more details or to book your mock exams, please visit <a rel="noopener" target="_new" href="https://www.examcentrelondon.co.uk/ucas-registered-centre">our website</a>.</p> ');
  } else {
     $("#Ucas_topic").html("");
  }
});
</script>


<script>
$('#fsc').click(function() {
  if ($(this).prop('checked')) {
     $("#tution_topic").html("We understand that passing your Functional Skills exams can be challenging, and we’re here to help you succeed on your first attempt. As a professional exam centre, we offer personalised tuition services tailored specifically to your needs, designed to enhance your skills and boost your confidence. How Our Tuition Can Help You: • Flexible Learning Options: Choose between online sessions or face-to-face tuition at our centre, whichever suits you best. • Expert Support: Work with our qualified teachers who will focus on the areas you find most challenging, using past papers and exam questions. • Customised Sessions: Start with a minimum booking of four hours, with each session lasting two hours (£25 per hour). • Simple Booking: Easily arrange your personalised tuition through our website https://examcentrelondon.co.uk . With our tuition services, you’ll receive the individual attention and guidance you need to pass your exams with confidence.");
  } else {
     $("#tution_topic").html("");
  }
});

</script>




<script>
$('#alvelcourse').click(function() {
  if ($(this).prop('checked')) {
     $("#alevel_course_topic").html("Achieving high grades in your A-Level exams is crucial, and we're here to help you succeed. Our exam centre offers flexible A-Level tuition services tailored to your needs.Our Tuition Options:- Popular Subjects: Choose group or one-to-one tuition for subjects like Maths, Physics, Chemistry, Biology, and English Language.- Less Common Subjects*: One-to-one tuition is available for subjects like Sociology, Politics, and others.- Flexible Formats: Tuition can be conducted in-person at our centre or online, depending on your preference.- Expert Support: Our qualified teachers use proven techniques, past papers, and personalised feedback to enhance your exam performance.We encourage students booking exams with us to take advantage of our tuition services to boost their grades and confidence.")
     }else {
     $("#alevel_course_topic").html("");
     }
  
});

</script>

<script>
$('#gc').click(function() {
  
  if ($(this).prop('checked')) {
     $("#gcse_course_topic").html("We understand the importance of achieving great results in your GCSE exams, and we’re here to help you excel. Our exam centre offers flexible GCSE tuition services tailored to your needs.Our Tuition Options:	Core Subjects: Join group tuition for Maths, English, and Science at our centre, or opt for one-to-one sessions.Flexible Formats: Choose between in-person tuition at our centre or personalised one-to-one sessions online.Expert Guidance: Learn from our qualified teachers using proven techniques, past papers, and focused feedback to boost your performance.We encourage students booking their exams with us to take advantage of our tuition services to build confidence and improve their grades. ")
  } else {
     $("#gcse_course_topic").html("");
  }
});

</script>





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
  

    $(document).ready(function() {
        // Attach change event handler to the checkbox
        $('#tuitionAccess').change(function() {
            alert("ok");
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



  
    <script>
  
    function toggleSectionVisibility() {
      var checkbox = document.getElementById('courseAccess');
      var hiddenSection = document.getElementById('courseAccess_Section');
      hiddenSection.style.display = checkbox.checked ? '' : 'none';
    }
    document.getElementById('courseAccess').addEventListener('change', toggleSectionVisibility);
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

		<!--end::Page Custom Javascript-->
<script>
$(document).ready(function() {
    $('#searchField').on('input', function() { // Trigger on every input
        let query = $(this).val(); // Get the input value
        // alert(query);
        if (query.length > 2) { // Perform the search only if the input length is greater than 2 characters
            $.ajax({
                url: '{{ url('/admin/supports-topic/search') }}', // URL for the search route
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    // console.log(data);
                  
                     $('#searchResults').html(data); // Display the search results
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#searchResults').html(''); // Clear the search results if input is too short
        }
    });
});
</script>


    <script>
        function copypost(element) {
      	// alert('oik');
            // Get the text content of the clicked paragraph
            var text = $(element).text();
            
            // Create a temporary input element
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(text).select();
            document.execCommand('copy');
            $temp.remove();
            
            // Optionally alert the copied text
            // alert("Copied the text: " + text);
        }
    </script>
@endsection