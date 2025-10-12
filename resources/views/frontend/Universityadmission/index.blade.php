@extends('layouts.frontend')
@section('title', 'University london')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/ripon/ripon.css') }}">
<style>
    .zh_hero .zh_form_wrapper {
    width: 50%;
    max-width: 100%;
  
}
</style>

       <section class="zh_center_content section_padding">
    	<div class="container">
    		<div class="text-center">
    			<h2 class="zh_heading">UNIVERSITY ADMISSION IN UK</h2>
    			<div class="p_wrapper">
					<p>We work with a  distance learning providers to offer assessments that fit their requirements. If you are studying a distance learning course and interested in sitting your assessment in one of our centres, contact us to see how we can help.</p>
				</div>
				<div class="p_wrapper with_space">
					<!-- <a href="{{ url('/contact') }}" class="btn btn-secondary" style="color:white">Contact us</a> -->
					<a href="{{ url('/exam-booking-alevel') }}" class="btn btn-secondary" style="color:white">Book Appointment</a>
					
				</div>
    		</div>
    	</div>
    </section>
   <!-- Content by Ripon -->
   
    <!--<section class="zh_hero" style="background-image: url(frontend/images2/details/6.png);">-->
    <!--	<div class="zh_form_wrapper">-->
    <!--		<h1>A Level Exam Details</h1>-->
    <!--		<p>Exam Centre London has a network of exams centres covering a wide range of subjects, across the UK.</p>-->
    <!--     	<form>-->
    <!--     	<a href="{{ url('/exam-booking-alevel') }}" class="sectors-form btn btn-secondary" style="color:white">A Level Exam Booking</a>-->
    <!--     	</form>-->
    <!--  	</div>-->
    	<!--<div class="for-position">-->
    	<!--	<div class="image_wrapper">-->
	    <!--		<img src="{{asset('frontend')}}/images2/details/learning-partners-collage.jpg" alt="">-->
	    <!--	</div>-->
    	<!--</div>-->
    <!--</section>-->
	
    <section class="zh_detail_2 section_padding">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<h2 class="zh_heading">A Level Exam Details:</h2>
    			</div>
    			<div class="col-md-6">
    				<div class="p_wrapper">
    					<p>Exam Centre London are an independent, JCQ approved Assessment Centre for A-Level Examinations. We offer individual and group tuition with experienced tutors in addition to A-Level Assessments with leading Awarding Bodies including Pearson Edexcel, AQA, OCR and WJCE.</p>
						<p>Thousands of home-learners, distance-dearners and independent learners throughout London and Essex have benefitted from A-Level Examinations with Exam Centre London across a range of A-Level subjects including Maths, English, Physics, Chemistry and Biology.</p>
						<p>Many of our A-Level Candidates choose Exam Centre London as the Private Assessment Centre of choice offering highly experienced tutors for ongoing supportive tuition, exam preparation and fuss-free, affordable, external assessment.</p>
						<p>Whether you are resitting examinations to improve your grade or looking to sit A-Levels for the first time, Exam Centre London offers a tailored package that meets your learning and assessment needs. Our experienced, qualified teachers offer exam preparation through personalised tuition with ongoing assessment to gauge progress and target areas for development– all aimed at enabling you to obtain your highest possible grade.</p>
    				</div>
    				<div class="p_wrapper with_space">
					<!-- <a href="{{ url('/contact') }}" class="btn btn-secondary" style="color:white">Contact us</a> -->
					<a href="{{ url('/exam-booking-alevel') }}" class="btn btn-secondary" style="color:white">Book your exam</a>
					
				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="details_2_right md_right_content">
    					<h2 class="zh_heading" style="font-size: 16px;">A LEVEL SUBJECTS:</h2>
    					<p style="color: #06092d;font-size: 16px;line-height: 1.9em;">We offer a wealth of different A-Level options and are always happy to consider offering a subject of your choice if not listed below. Please get in touch to chat through your requirements and we’ll be happy to help.</p>
    					<div class="row">
    						<div class="col-md-6">
    							<ul class="disc_list">
		    						<li>Accounting</li>
		    						<li>Biology</li>
		    						<li>Bengali</li>
		    						<li>Art & design</li>
		    						<li>Business studies</li>
		    						<li>Arabic</li>
		    						<li>Computer Science</li>
		    						<li>Chemistry</li>
		    						<li>Religious studies</li>
		    						<li>Statistics</li>
		    						<li>Further Maths</li>
		    					</ul>
    						</div>
    						<div class="col-md-6">
    							<ul class="disc_list">
		    						<li>Economics</li>
		    						<li>English</li>
		    						<li>History</li>
		    						<li>Geography</li>
		    						<li>Maths</li>
		    						<li>Law</li>
		    						<li>Statistics</li>
		    						<li>Phychology</li>
		    						<li>Physics</li>
		    						<li>Sociology</li>
		    					</ul>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


    <!-- image with content -->
    <!-- image content 01 -->
    <section class="image_content">
    	<div class="row">
    		<div class="col-md-6 image_col" style="background-image: url(frontend/images2/details/4.png);">
    			<div class="image_left">
    				
    			</div>
    		</div>
    		<div class="col-md-6 ">
    			<div class="content_col right_left">
    				<h2 class="zh_heading" style="color:#247e3d;">A Level Exam Bodies</h2>
    				<div class="p_wrapper">
    					<!-- <h2 class="zh_heading" style="font-size:16px">Exam Bodies</h2> -->
    					<p class="zh_tagline">We work in partnership with a range of Awarding Bodies (often referred to as Exam Bodies). We offer A-Levels with the following Awarding Bodies:</p>
    					<ul class="disc_list">
    						<li>Pearson Edexcel</li>
    						<li>AQA</li>
    						<li>OCR</li>
    						<li>WJCE</li>
    					</ul>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    </section>
    <!--/ image content 01 -->

    <!-- image content 02 -->
    <section class="content_image">
    	<div class="row">
    		
    		<div class="col-md-6 ">
    			<div class="content_col">
    				<div class="right_left">
    			<h2 class="zh_heading" style="color:#247e3d;">November Re-Sit</h2>
    				<div class="p_wrapper with_space">
						<p class="zh_tagline">We offer A-Level(Only CIE) Re-Sit Examinations in November. This is a popular option for School and College Leavers who wish to improve their grade(s). Please contact us on 0208 616 25 26 for more information.</p>
						<br>
						<p><a style="color: red; font-weight: 600" href="{{ url('/exam-fees') }}">Click here</a>  for more details of our Examinations Fees.</p>
						<a  href="{{ url('/exam-booking-alevel') }}" class="btn btn-secondary" style="color:white; margin-top: 80px !important ;">Book your exam</a>
    				</div>
    			</div>
    			</div>
    			
    		</div>
    		<div class="col-md-6 image_col" style="background-image: url(frontend/images2/details/6.png);">
    			<div class="image_left">
    				
    			</div>
    		</div>
    	</div>
    </section>
    



    <!-- top logo content -->
    <section class="zh_top_logo_content" style="background-color:#fff !important;">
    	<div class="container ">
    		<h2 class="zh_heading mt-5" style="color:#247e3d;">A-Level Practical Assessments</h2>
    		<div class="row">
    			<div class="col-md-6">
    				<div class="p_wrapper">
    					<p>Exam Centre London works in conjunction with Merit Tutors to offer A-Level practical exams for Biology, Chemistry and Physics. Sessions are held in fully equipped science labs in within the borough of Newham and supervised by . highly qualified and competent science tutors. Practice sessions prior to the examination will equip candidates to accurately, confidently and safely manage equipment and conduct experiments.</p>

    					<p>Sessions are held in local state schools during the spring half term to ensure that candidates can maximise the use of labs without being disturbed. Detailed risk assessments are completed to ensure labs and equipment are safe to use.</p>

    				</div>
    			</div>
    			<div class="col-md-6">
    				<div class="p_wrapper">
    					<p>Practice practical sessions are led by one member of staff and up to five candidates giving learners opportunity to familiarise themselves with the lab and equipment. Tutors will demonstrate core practical skills with chance for learners to ask questions before conducting their own individual practical experiments individually. Tutors provide tailored feedback across the week on how to improve and maximise grades.</p>
    					<p>The five-day practical course culminates with a final session in which candidates demonstrate their learning under assessed conditions. Details of fees for our A-Level Practical Assessments course can be accessed here.</p>
    				</div>
    				<div class="p_wrapper with_space">
    					
    				</div>
    				
    			</div>	
    		</div>
    	</div>
    </section>
    <!--/ top logo content -->


@endsection
