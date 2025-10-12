@extends('layouts.frontend')
@section('title', 'ISEB Booking')
@section('content')
    <link href="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('frontend/FunctionalSkillTuiton')}}/css/main.css" rel="stylesheet" media="all">
    <script src="{{ asset('frontend') }}/js/ovi.js"></script>
    
    <style>
    .js--image-preview {
    height: 200px;
    width: 100%;
    position: relative;
    overflow: hidden;
    background-image: url(index-23.html);
    background-color: white;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    border: 2px dotted #43b97e;
}
.upload-options {
    position: relative;
    height: 75px;
    background-color: #43b97e;
    cursor: pointer;
    overflow: hidden;
    text-align: center;
    transition: background-color ease-in-out 150ms;
}
input[type="file"] {
    display: none;
}
.upload-options label::after {
    content: "Upload file";
    /* font-family: "Material Icons"; */
    position: absolute;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    top: calc(50% - 24.5px);
    left: calc(50% - 41.25px);
    z-index: 0;
}
        .wrapper--w680 {
    max-width: 60%;
}

.title {
    font-size: 24px;
    color: #525252;
    font-weight: 600;
    margin-bottom: 40px;
    font-style: initial;
    font-family: 'Flaticon';
}
.label {
    font-size: 16px;
    color: #555;
    text-transform: capitalize;
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    font-family: none;
}

.form-control{
    line-height: 50px;

    background: #fafafa;
    padding-left: 0;
    color: #555;
    font-size: 16px;
    font-family: inherit;
    padding-left: 22px;
    padding-right: 50px;
}

select.form-control:not([size]):not([multiple]) {
    height: calc(2.75rem + 5px);
}


.bg-gra-02 {

    background: linear-gradient(to top right, #55acee 0%, #6c4079 100%);
}
input[type="date" i] {
    padding: 0 10px;
}
    </style>
 
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">ISEB Booking</h2>
                    <form method="POST" action="{{ url('/iseb-booking') }}" enctype='multipart/form-data'>
                        @csrf
                        
                        
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                                    <div class="row row-space">
                                <div class="col-md-12">
                                      <h2 style="font-size: 21px;font-family: 'FontAwesome';color: blue; font-weight: 600;">Candidate Information:</h2>
                                </div>
                               <div class="col-md-6">
                            
                                <div class="input-group">
                                    <label class="label">ISEB Unique Candidate Number (UCN)</label>
                                    <input class="input--style-4" type="text" name="ucn_number" placeholder="Please Enter ISEB Unique Candidate Number (UCN)"  required>
                                    @error('first_name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Child's First Name:</label>
                                    <input class="input--style-4" type="text" name="child_first_name" placeholder="Please Enter Child's First Name" value="{{ Auth::user()->name }}" required>
                                    @error('first_name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Child's Last Name:</label>
                                    <input class="input--style-4" type="text" name="child_last_name" placeholder="Please Enter Child's Last Name" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                              <div class="col-md-6">
                                <label class="label">Gender</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender" required>
                                        
                                        <option value="Male" @if(Auth::user()->gender=='Male') selected @endif>Male</option>
                                        <option value="Female" @if(Auth::user()->gender=='Female') selected @endif>Female</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                        
                          <div class="row row-space">
                               <div class="col-md-6">
                                <label class="label">Current School</label>
                                <div class="rs-select2 js-select-simple select--no-search">
                                   <input class="input--style-4" type="text" name="school" placeholder="Please Enter Current School"  required>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                               <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Date of Birth</label>
                                    <input class="input--style-4" type="date" name="date_of_birth" placeholder="Please Enter Date of Birth"  required>
                                    @error('date_of_birth')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                         <div class="row row-space">
                            <div class="col-md-12">
                                 <h2 style="font-size: 21px;font-family: 'FontAwesome';color: blue; font-weight: 600;">Parent/Guardian's Information:</h2>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="input-group">
                                    <label class="label">Parent/Guardian's Name:</label>
                                    <input class="input--style-4" type="text" name="gurdian_name" placeholder="Please Enter Parent/Guardian's Name" required>
                                    @error('last_name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Parent/Guardian's Contact Email</label>
                                    <input class="input--style-4" type="text" name="email" placeholder="Please Enter Email" value="{{ Auth::user()->email }}" >
                                     @error('phone')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                        </div>
                         <div class="row row-space">
                           <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Parent/Guardian's Contact Number</label>
                                    <input class="input--style-4" type="text" name="phone_number" placeholder="Please Enter Phone Number" value="{{ Auth::user()->phone }}" required>
                                    @error('phone')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Emergency Number</label>
                                    <input class="input--style-4" type="text" name="emergency_phone" required placeholder="Please Enter Emergency Number">
                                    @error('emergency_number')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address_line_1" placeholder="Please Enter Address Line 1" value="{{ Auth::user()->address }}" required>
                                </div>
                            </div>
                          
                             <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">Post Code</label>
                                    <input class="input--style-4" type="text" name="post_code" placeholder="Please Enter Post Code" value="{{ Auth::user()->zip }}" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" name="city" placeholder="Please Enter City" value="{{ Auth::user()->city }}" required>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row row-space">
                            
                            <div class="col-md-4">
                                <label class="label">Exam Type:</label>
                               
                                    <select class="form-control" name="subject[]" id="" required>
                                        <option disabled="disabled" selected="selected">Choose option</option>
                                        <option value="11+ Common Entrance">- 11+ Common Entrance </option>
                                        <option value="13+ Common Entrance">- 13+ Common Entrance </option>
                                        <option value="Common Pre-Tests">- Common Pre-Tests</option>
                                    </select>
                                   
                            </div>
                            <div class="col-md-4">
                                <label class="label">Preferred Exam Date:</label>
                       
                                    <input class="form-control" type="date" name="exam_date[]" required>
                                    <input type="hidden" name="fees[]" value="200">
                            </div>
                             <div class="col-md-4">
                              
                                    <label class="label">Time</label>
                                    <select class="form-control" name="time[]" required>
                                        <option disabled="disabled" selected="selected">Choose option</option>
                                        <option value="10AM">10AM</option>
                                        <option value="2PM">2PM</option>
                                      
                                    </select>
                               
                            </div>
                            
                        </div>
                     
                        <!--<div class="row row-space" id="add_more_subject">-->
                            
                        <!--</div>-->
                        <!--<div class="row row-space" >-->
                        <!--    <div class="col-md-12 text-right">-->
                        <!--        <div class="">-->
                                    <!--<label class="label">Fees</label>-->
                        <!--            <a onclick="add_subject()" class="btn-sm btn-success" style="color:#fff">Add More</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        
                               <div class="row mb-5 mt-5">
                                  <div class="col-md-5">
          
                                       <label class="label">Photo Id <span class="required"></span></label>
                                        
                                            <div class="wrapper">
                                            <div class="box">
                                              <div class="js--image-preview">
                                                
                                              </div>
                                              <div class="upload-options">
                                              <label>
                                                <input type="file" class="image-upload" name="fileUpload" accept="image/*"/>
                                              </label>
                                              </div>
                                            </div>
                                
                                          </div>  
                                    </div>
                                </div> 
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Go To Payment Page</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/select2/select2.min.js"></script>
    <script src="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/datepicker/moment.min.js"></script>
    <script src="{{asset('frontend/FunctionalSkillTuiton')}}/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="{{asset('frontend/FunctionalSkillTuiton')}}/js/global.js"></script>
    
<script>
   var i=1;
    function add_subject(){
    
      $("#add_more_subject").append('<div class="col-md-4"><label class="label">Subject</label><div class="rs-select2 js-select-simple select--no-search"><select onchange="subjectchange(this)" class="form-control" name="subject[]" id="subject_'+i+'"><option disabled="disabled" selected="selected">Choose option</option><option value="Maths">Maths</option><option value="English">English</option></select><div class="select-dropdown"></div></div></div><div class="col-md-4"><label class="label">Total Hour</label><div class="rs-select2 js-select-simple select--no-search"><select onchange="hourChange(this)" class="form-control" name="hour[]" id="hour_'+i+'"><option disabled="disabled" selected="selected">Choose option</option><option value="2">2 Hours</option><option value="4">4 Hours</option><option value="6">6 Hours</option><option value="8">8 Hours</option><option value="10">10 Hours</option></select><div class="select-dropdown"></div></div></div><div class="col-md-4"><div class="input-group"><label class="label">Fees</label><input class="input--style-4" type="text" disabled name="fees[]" id="fees_'+i+'"><input  type="hidden" name="fees_hidden[]" id="fees_hidden_'+i+'"></div></div>');
        i++ ;
    }
    
</script>



<script>
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
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
			throw 'Kein Bild gew채hlt';
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
