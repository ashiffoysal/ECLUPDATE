@extends('layouts.frontend')
@section('title', 'Proctor Exam Booking')
@section('content')
<div class="sub_menu_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sub_menu">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{url('/iseb-details')}}">ISEB Exam </a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{url('/iseb-booking')}}">ISEB Exam Booking</a></li>
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
                        <b>ISEB Exam Booking</b>
                        <h2>Please <span>Call</span> or <span>Email</span> us if you need any help with the form</h2>
                        <div class="a_level_exam_booking_header_btns">
                            <a href="tel:0208 616 2526"><i class="fa-solid fa-phone"></i>0208 616 2526</a>
                            <a href="mailto:info@examcentrelondon.co.uk"><i class="fa-solid fa-envelope"></i>info@examcentrelondon.co.uk</a>
                        </div>
                    </div>
                    <div class="a_level_exam_booking_form">
                 
                        <form action="{{ url('/iseb-booking') }}" method="POST" enctype="multipart/form-data">
                            <!-- Start Step 1: Student Info -->
                             
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                            <div class="form-step active">
                                <div class="single_form_parent">
                                    <div class="single_form_step single_form_column3">
                                        <label for="id1">ISEB Unique Candidate Number (UCN)<span>*</span></label>
                                        <input type="text" id="id1" name="ucn_number" placeholder="Please Enter ISEB Unique Candidate Number (UCN)" required>
                                        
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id1">Child First Name<span>*</span></label>
                                        <input type="text" id="id1" name="child_first_name" placeholder="Please Enter First Name" value="{{ Auth::user()->name }}" required>
                                        @csrf
                                    </div>

                                    
                                   
                                    <div class="single_form_step single_form_column3">
                                        <label for="id3">Child Last Name<span>*</span></label>
                                        <input type="text" id="id3" name="child_last_name" placeholder="Please Enter Last Name" value="{{ Auth::user()->last_name }}" required>
                                    </div>
                                </div>
                                <div class="single_form_parent">
                                    <div class="single_form_step single_form_column3">
                                        <label for="id4">School<span>*</span></label>
                                        <input type="text" id="id4" name="school" placeholder="Please Enter school" required>
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id4">Date of Birth<span>*</span></label>
                                        <input type="date" id="id4" name="date_of_birth" placeholder="Please Enter school" required>
                                    </div>


                                    <div class="single_form_step single_form_column3">
                                        <label for="id1">Parent/Guardian's Name<span>*</span></label>
                                        <input type="text" id="id1" name="gurdian_name" placeholder="Please Enter Gurdian Name Name" required>
                                       
                                    </div>



                                    <div class="single_form_step single_form_column2">
                                        <label for="id4">Parent/Guardian's Email<span>*</span></label>
                                        <input type="email" id="id4" name="email" placeholder="Please Enter Email" value="{{ Auth::user()->email }}" required>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="flag1">Parent/Guardian's Contact Number<span>*</span></label>
                                        <div class="phone-input flag_input_default">
                                            <div class="flag-select">
                                            <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon">
                                                <select id="country-code" class="country-code">
                                                    <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected="">+44 (UK)</option>
                                                    <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                    <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option>
                                                </select>
                                            </div>
                                            <input type="text" name="phone_number" placeholder="Please Enter Phone Number" value="{{ Auth::user()->phone }}" required>
                                        </div>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="flag1">Parent/Guardian's Emergency Number<span>*</span></label>
                                        <div class="phone-input flag_input_default">
                                            <div class="flag-select">
                                            <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon">
                                                <select id="country-code" class="country-code">
                                                    <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected="">+44 (UK)</option>
                                                    <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                    <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option>
                                                </select>
                                            </div>
                                            <input type="text" name="emergency_phone" placeholder="Please Enter Emergency Number" required>
                                        </div>
                                    </div>
                                    <div class="single_form_step single_form_column2">
                                        <label for="id5">Address <span>*</span></label>
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
                                   
                                  
                                </div>
                                <div class="single_form_parent">
                                    <div class="single_form_column2 single_form_p">
                                        <p>Gender <span>*</span></p>
                                        <div class="form_step1_radio">
                                            <div class="form_step1_radio_single">
                                                <input type="radio" id="id10" name="gender" checked  value="Male">
                                                <label for="id10">Male</label>
                                            </div>
                                            <div class="form_step1_radio_single">
                                                <input type="radio" id="id11" name="gender"  value="Female">
                                                <label for="id11">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_form_parent single_form_parent_step2">
                                    <div class="single_form_step single_form_column3">
                                        <label for="id21">Exam Details <span>*</span></label>
                                        <div class="single_form_select">
                                        <select name="subject[]">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="11+ Common Entrance">- 11+ Common Entrance </option>
                                            <option value="13+ Common Entrance">- 13+ Common Entrance </option>
                                            <option value="Common Pre-Tests">- Common Pre-Tests</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id21">Date <span>*</span></label>
                                        <div class="single_form_select">
                                            <input  type="date" name="exam_date[]" required>
                                            <input type="hidden" name="fees[]" value="200">
                                        </div>
                                    </div>
                                    <div class="single_form_step single_form_column3">
                                        <label for="id22">Time<span>*</span></label>
                                        <div class="single_form_select">
                                            <select name="time[]" required>
                                                <option disabled="disabled" selected="selected">Choose option</option>
                                                <option value="10AM">10AM</option>
                                                <option value="2PM">2PM</option>
                                            
                                            </select>
                                        </div>
                                    </div>
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
     
       $("#add_more_subject").append('<div class="single_form_parent single_form_parent_step2"><div class="single_form_step single_form_column3"><label for="id21">Subject Details <span>*</span></label><input type="text" name="subject[]" placeholder="Please Enter Subject & Paper Details"></div><div class="single_form_step single_form_column3"><label for="id21">Subject <span>*</span></label><div class="single_form_select"><select  onchange="hourChange(this)" name="hour[]" id="hour_'+i+'"><option disabled="disabled" selected="selected">Choose option</option><option value="1">1 Hours</option><option value="1.5">1 Hour 30 Minutes</option><option value="2">2 Hours</option><option value="3">3 Hours</option><option value="3.5">3 Hour 30 Minutes</option></select><img src="{{ asset("frontend/updatedesign") }}/assets/images/a-level-exam-booking/angle-down.png" alt=""></div></div><div class="single_form_step single_form_column3"><label for="id22">Fees<span>*</span></label><input type="text" type="text" name="fees" disabled id="fees_'+i+'"><input  type="hidden" name="fees_hidden[]" id="fees_hidden_'+i+'"></div></div>');
         i++ ;
     }
     
 </script>
<script>
   
    
    function hourChange(el){
        
       
          var hour=el.value;
          var index_id = el.id; 
          var arr = index_id.split('_');
          var mainid=arr[1];
         
          var mysubject=$('#subject_'+mainid).val();
          
          if(mysubject !=''){
              $amount=70 * hour;
             $('#fees_'+mainid).val($amount);
             $('#fees_hidden_'+mainid).val($amount);
          }
          
          
          console.log(mysubject);
          
    }
    
</script>
@endsection
