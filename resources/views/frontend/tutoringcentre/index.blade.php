@extends('layouts.frontend')
@section('title', 'Merit Tutors Tutoring Centre ')
@section('content')
<style>
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
          
.common_style p {
    font-weight: 500;
    color: #000000;
    margin: 30px 0 50px 0;
    font-family: initial;
    font-size: 18px;
}
</style>

    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Merit Tutors</h2>
                    <ul>
                       
                        <li>Merit Tutors – Premium Tuition -FOREST GATE , ILFORD - REDBRIDGE</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<style>
    
/* common style for some sections */
.common_style>section {
  padding: 50px 0;
}

.common_style .row {
  align-items: center;
}

.common_style h3 {
  font-weight: 600;
  color: #151516;
}

.common_style p {
    font-weight: 500;
    color: #000000;
    margin: 30px 0 50px 0;
}

.common_style img {
  width: 100%;
}
.admission_section a {
  /*background-color: #fdd31d;*/
  color: #fefeff;
}

/* end common style */

/* about section */
.about_section {
  text-align: right;
}

.about_section a {
  background-color: #6ebca8;
  color: #fefeff;
}
.call_to-btn {
  display: inline-block;
  padding: 15px 45px;
  border-radius: 10px;
  font-size: 15px;
  background-color: #ffffff;
  color: #262627;
  font-weight: 600;
  transition: all 0.3s ease 0s;
}

.hero_section .call_to-btn {}

.call_to-btn img {
  width: 18px;
  margin-left: 10px;
}

.btn_on-hover {
  transition: all 0.3s ease 0s;
}

.call_to-btn:hover,
.btn_on-hover:hover {
  -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.7);
  transform: translateY(-7px);
}
.my_image{
    width: 34% !important;
}
</style>

<div class="common_style">



    
<section class="admission_section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="admission_detail-box">
              <h3>
                 <a target="__blank" href="https://merittutors.co.uk/"><img class="my_image" src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="" width="55px" height="55px"></a><br>
                 
              </h3>
              <p>
               Studying the National Curriculum independently can be quite difficult and strenuous. GCSE and A Level content is not only challenging to grasp, it can also be very difficult to master.This is where Exam Centre London, in collaboration with Merit Tutors, can come in handy! Our experienced and qualified tutors offer a learner centred approach based around each student's unique learning needs.Merit Tutors acknowledges that every student learns differently, thus Merit Tutors places great importance in conducting sessions that are beneficial for the students first and foremost.Our fundamental aim is to provide the support required, helping each student reach their full potential. We strongly believe that each student has the potential to achieve the best possible grades with the correct guidance and assistance. That’s why we’re here!<br>
              </p>
            
            </div>
          </div>
          <div class="col-md-4">
            <div class="admission_img-container">
              <img src="{{asset('frontend')}}/about.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <section class="about_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="about_img-container">
               <img src="{{asset('frontend')}}/determine.png" alt="">
            </div>
          </div>
          <div class="col-md-8">
            <div class="about_detail-box">
            
              <p>
               Our tutors take the time to create a supportive yet motivating environment where the student can clarify their concerns yet receive the encouragement to attain the best possible outcomes. We acknowledge that candidates may have other commitments hence for this reason, our sessions are completely flexible, based around our student’s convenience. Whilst we always give preference to in person sessions, Merit Tutors has been a leading provider of online sessions in the market. As well as the stem subject, Merit Tutors is proud to share that we provide tutoring for all subjects including the less common subjects. Whether you need help with the written paper, coursework or practicals, Merit Tutors will direct you to the best and most competent tutors with years of valuable experience. 
              </p>
              <div class="">
                <a target="__blank" href="https://merittutors.co.uk/" class="call_to-btn btn_white-border">
                  Visit Our Website
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<section class="admission_section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="admission_detail-box">
              <h3>
                 Why choose Merit Tutors? 
              </h3>
              <p style="margin: 14px 0 10px 0 !important;">- Experienced and trained tutors</p>
              <p style="margin: 14px 0 10px 0 !important;">- A motivating and professional environment</p>
              <p style="margin: 14px 0 10px 0 !important;">- Access to locked exam papers for extensive exam practise</p>
              <p style="margin: 14px 0 10px 0 !important;">- A wide range of great resources</p>
              <p style="margin: 14px 0 10px 0 !important;">- Practise the required skills</p>
              <p style="margin: 14px 0 10px 0 !important;">- Regular homework to practise the course thoroughly </p>
             
                <span style="color:red">Enquire now to get started and attain the best possible outcomes.</span> 

            </div>
           
          </div>
          <div class="col-md-4">
            <div class="admission_img-container">
              <img src="{{asset('frontend')}}/why.png" alt="">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                <a target="__blank" href="https://merittutors.co.uk/" class="call_to-btn btn_white-border" style="background-color: #fdd31d !important;">
                  Visit Our Website
                </a>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- end about section -->

  </div>


@endsection