@extends('layouts.frontend')
@section('title', 'Functional Skills Tuition Booking')
@section('content')
<div class="sub_menu_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sub_menu">
                    <ul>
                        <li><a href="#">Exams</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="#">Functional Skills Tuition</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="#">Functional Skills Tuition Booking</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sub Menu -->

<!--================  Start (A Level Exam Booking Form) Section  ================-->
<section class="a_lavel_exams_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="a_level_exams">
                    <div class="section_title high_standard_title">
                        <b>Functional Skills Tuition Booking</b>
                        <h2>Please <span>Call</span> or <span>Email</span> us if you need any help with the form</h2>
                        <div class="a_level_exam_booking_header_btns">
                            <a href="tel:0208 616 2526"><i class="fa-solid fa-phone"></i>0208 616 2526</a>
                            <a href="mailto:info@examcentrelondon.co.uk"><i class="fa-solid fa-envelope"></i>info@examcentrelondon.co.uk</a>
                        </div>
                    </div>
                    <div class="a_level_exam_booking_form">
                 
                        <form action="{{ url('/functional-skills-tuition') }}" method="POST" enctype="multipart/form-data">
                            <!-- Start Step 1: Student Info -->
                            <div class="form-step active">
                                <div class="single_form_parent">
                                    <div class="single_form_step single_form_column3">
                                        <label for="id1">First Name<span>*</span></label>
                                        <input type="text" id="id1" name="first_name" placeholder="Please Enter First Name" value="{{ Auth::user()->name }}">
                                        @csrf
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id2">Middle Name</label>
                                        <input type="text" id="id2" name="middle_name" placeholder="Please Enter Middle Name" value="{{ Auth::user()->middle_name }}">
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id3">Last Name<span>*</span></label>
                                        <input type="text" id="id3" name="last_name" placeholder="Please Enter Last Name" value="{{ Auth::user()->last_name }}" required>
                                    </div>
                                </div>
                                <div class="single_form_parent">
                                    <div class="single_form_step single_form_column2">
                                        <label for="id4">Email<span>*</span></label>
                                        <input type="email" id="id4" name="email" placeholder="Please Enter Email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="flag1">Phone<span>*</span></label>
                                        <div class="phone-input flag_input_default">
                                            <div class="flag-select">
                                            <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon">
                                                <select id="country-code" class="country-code">
                                                    <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected="">+44 (UK)</option>
                                                    <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                    <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option>
                                                </select>
                                            </div>
                                            <input type="text" name="phone" placeholder="Please Enter Phone Number" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="id5">Address Line 1<span>*</span></label>
                                        <input type="text" id="id5" name="address_line_1" placeholder="Please Enter Address Line 1" value="{{ Auth::user()->address }}" required>
                                    </div>
                                    
                                    <div class="single_form_step single_form_column2">
                                        <label for="id7">City<span>*</span></label>
                                        <input type="text" id="id7" name="city" placeholder="Please Enter City" value="{{ Auth::user()->city }}" required>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="id8">Post Code<span>*</span></label>
                                        <input type="text" id="id8" name="post_code" placeholder="Please Enter Post Code" value="{{ Auth::user()->zip }}" required>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="flag2">Emergency Phone<span>*</span></label>
                                        <div class="phone-input flag_input_default">
                                            <div class="flag-select">
                                            <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon">
                                                <select id="country-code" class="country-code">
                                                    <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected="">+44 (UK)</option>
                                                    <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                    <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option>
                                                </select>
                                            </div>
                                            <input type="text" type="text" name="emergency_number" required placeholder="Please Enter Emergency Number" class="phone-number" required>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="single_form_parent">
                                    <div class="single_form_column2 single_form_p">
                                        <p>Gender <span>*</span></p>
                                        <div class="form_step1_radio">
                                            <div class="form_step1_radio_single">
                                                <input type="radio" id="id10" name="gender" @if(Auth::user()->gender=='Male') checked @endif  value="Male">
                                                <label for="id10">Male</label>
                                            </div>
                                            <div class="form_step1_radio_single">
                                                <input type="radio" id="id11" name="gender" @if(Auth::user()->gender=='Female') checked @endif>
                                                <label for="id11">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
										<div class="single_form_parent single_form_parent_step2">
											<div class="single_form_step single_form_column3">
												<label for="id21">Subject <span>*</span></label>
												<div class="single_form_select">
													<select onchange="subjectchange(this)" name="subject[]" id="subject_0" required>
                                                        <option disabled="disabled" selected="selected">Choose option</option>
														<option value="Maths">Maths</option>
                                                        <option value="English">English</option>
													</select>
													<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/angle-down.png" alt="">
												</div>
											</div>
											<div class="single_form_step single_form_column3">
												<label for="id21">Subject <span>*</span></label>
												<div class="single_form_select">
													<select  onchange="hourChange(this)" name="hour[]" id="hour_0">
														<option disabled="disabled" selected="selected">Choose option</option>
                                                    <option value="2">2 Hours</option>
                                                    <option value="4">4 Hours</option>
                                                    <option value="6">6 Hours</option>
                                                    <option value="8">8 Hours</option>
                                                    <option value="10">10 Hours</option>
													</select>
													<img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/angle-down.png" alt="">
												</div>
											</div>
											<div class="single_form_step single_form_column3">
												<label for="id22">Fees<span>*</span></label>
												<input type="text" type="text" name="fees" disabled id="fees_0">
                                                <input  type="hidden" name="fees_hidden[]" id="fees_hidden_0">
											</div>
                                        </div>

                                        <div id="add_more_subject">
                            
                                        </div>

                                    <div class="form_step_addsubject_btn">
                                        <a onclick="add_subject()" style="cursor: pointer"><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/add.png" alt=""> Add More</a>
                                    </div>
                            
                                <div class="single_form_parent">
                                   <div class="single_form_step single_form_column2">
                                          <label for="real-file-1">Passport / Driving license<span>*</span></label>
                                          <div class="form_file_upload_design">
                                              <input type="file"  name="fileUpload"  class="real-file"  required   accept="image/jpeg,image/jpg,image/png,application/pdf"/>
                                              {{-- <button type="button" class="custom-button">
                                                  <p class="custom-text">PDF or image file<br>
                                                      <span>max size: 5MB</span>
                                                      <a>Choose File</a>
                                                  </p>
                                              </button> --}}
                                          </div>
                                      </div>
                                </div>
                                <p class="error-message" style="display: none; color: red;">
                                    Please fill out all required fields before continuing.
                                    <!-- Please select your 'Gender' -->
                                </p>
                                <div class="form_single_step_btns">
                                    <button type="submit" class="btn_style">Submit <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                </div>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var i=1;
     function add_subject(){
     
       $("#add_more_subject").append('<div class="single_form_parent single_form_parent_step2"><div class="single_form_step single_form_column3"><label for="id21">Subject <span>*</span></label><div class="single_form_select"><select onchange="subjectchange(this)" name="subject[]" id="subject_'+i+'" required><option disabled="disabled" selected="selected">Choose option</option><option value="Maths">Maths</option><option value="English">English</option></select><img src="{{ asset("frontend/updatedesign") }}/assets/images/a-level-exam-booking/angle-down.png" alt=""></div></div><div class="single_form_step single_form_column3"><label for="id21">Subject <span>*</span></label><div class="single_form_select"><select  onchange="hourChange(this)" name="hour[]" id="hour_'+i+'"><option disabled="disabled" selected="selected">Choose option</option><option value="2">2 Hours</option><option value="4">4 Hours</option><option value="6">6 Hours</option><option value="8">8 Hours</option><option value="10">10 Hours</option></select><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/angle-down.png" alt=""></div></div><div class="single_form_step single_form_column3"><label for="id22">Unit Code <span>*</span></label><input type="text" type="text" name="fees" disabled id="fees_'+i+'"><input  type="hidden" name="fees_hidden[]" id="fees_hidden_'+i+'"></div></div>');
         i++ ;
     }
     
 </script>
 <script>
    function subjectchange(el){
        
          var subject=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[1];
          
          var myhour=$('#hour_'+mainid).val();
          if(myhour !=''){
              $amount=25 * myhour;
              $('#fees_'+mainid).val($amount);
              $('#fees_hidden_'+mainid).val($amount);
              
          }
          
          
          
          
    }
    
    function hourChange(el){
        
          var hour=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[1];
          var mysubject=$('#subject_'+mainid).val();
          
          if(mysubject !=''){
              $amount=25 * hour;
             $('#fees_'+mainid).val($amount);
             $('#fees_hidden_'+mainid).val($amount);
          }
          
          
          console.log(mysubject);
          
    }
    
</script>
@endsection
