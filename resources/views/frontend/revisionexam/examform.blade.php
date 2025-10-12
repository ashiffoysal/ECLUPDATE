@extends('layouts.frontend')
@section('title', 'Revision Course Exam')
@section('content')
  <style>
  .contact-page-section {
   
    padding: 10px 0px 70px !important;
}
    h1, h2, h3, h4, h5, h6 {
    color: #102039;
    font-family: "Roboto", sans-serif;
    font-weight: 700;
    text-transform: capitalize;
    line-height: 1.2;
    margin-bottom: 0;
}
    .breadcrumb-section {
  padding: 40px 0;
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
          
          
          
          
.get-in-touch {
  max-width: 800px;
  margin: 10px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0 !important;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  border: 1px solid;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 23px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
   background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
}


</style>
    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Revision Course Exam Booking</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>Revision Course Exam Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        <section class="contact-page-section">
        <<section class="get-in-touch">
    <span style="color: white;background: #2ccd04;padding: 3px 10px;margin: px 10px;/* margin: 33px 0px; */border-radius: 12px;margin-bottom: 14px;">Student Details</span>
   <form class="contact-form row">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required>
         <label class="label" for="name">First Name</label>
      </div>
        <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required>
         <label class="label" for="name">Middle Name</label>
      </div>
       <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required>
         <label class="label" for="name">Last Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" type="email" required>
         <label class="label" for="email">E-mail</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" type="text" required>
         <label class="label" for="phone">Contact Number</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" type="date" required>
         <label class="label" for="phone">Date of Birth</label>
      </div>
     <div class="form-field col-lg-6 ">
         <!--<input id="phone" class="input-text js-input" type="text" required>-->
         <select id="phone" class="input-text js-input">
             <option value="Male">Male</option>
             <option value="Female">Female</option>
         </select>
         <label class="label" for="phone">Gender</label>
      </div>
      
        <div class="form-field col-lg-6 ">
             <input id="" class="input-text js-input" type="text" required>
             <label class="label" for=""> School / College Name: </label>
        </div>
          
    
      <div class="form-field col-lg-12">
         <input id="message" class="input-text js-input" type="text" required>
         <label class="label" for="message">Address</label>
      </div>
      
          <div class="form-field col-lg-12">
          <span style="color: white;background: #2ccd04;padding: 3px 10px;margin: px 10px;/* margin: 33px 0px; */border-radius: 12px;margin-bottom: 14px;">Special Arrangements</span>
          </div> 
          
        <div class="form-field col-lg-6">
         <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Yes</label>
            </div>
         <label class="label" for="message">Do you require special access requirements during your exam?*</label>
      </div>
      
        <div class="form-field col-lg-6">
         <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Yes</label>
            </div>
         <label class="label" for="message">Do you suffer from any mental conditions such as high levels of anxiety?</label>
      </div>
        <div class="form-field col-lg-6">
         <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Yes</label>
            </div>
         <label class="label" for="message">Do you have any conditions or disability?</label>
      </div>
    <div class="form-field col-lg-12">
      <span style="color: white;background: #2ccd04;padding: 3px 10px;margin: px 10px;/* margin: 33px 0px; */border-radius: 12px;margin-bottom: 14px;">Exam Details:</span>
    </div>
    
    <div class="form-field col-lg-12">
      <span style="color: white;background: #2ccd04;padding: 3px 10px;margin: px 10px;/* margin: 33px 0px; */border-radius: 12px;margin-bottom: 14px;">Others:</span>
    </div>
            <div class="form-field col-lg-12 ">
             <input id="" class="input-text js-input" type="text" required>
             <label class="label" for="">Notes: </label>
        </div>
      
    
      
      
    
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>
        </section>
    
    {{-- 
    <section class="contact-page-section">
        <!--<div class="pattern-layer-three" style="background-image: url(frontend/images/icons/icon-8.png)"></div>-->
        <div class="auto-container">
            <div class="row clearfix">
                
           
                
                <!-- Form Column -->
                <div class="form-column col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        
                       
                        <!--<h2>Leave a message</h2>-->
                        <div class="contact-form">
                            <form action="" method="post" id="contact-form">
                                
                               @csrf                                
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="First Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Middle Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Last Name" required="">
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Contact Number" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Gender" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Date of Birth" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Address" required="">
                                </div>
                                
                                
                                
                              
                                
                                <div class="form-group">
                                    <textarea class="" name="message" placeholder="Comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="theme-btn btn-style-nine" type="submit" name="submit-form">Submit</button>
                                </div>
                                
                            </form>
                        </div>
                            
                    </div>
                        
                    </div>
                </div>
                
            </div>
        </section>
--}}


@endsection