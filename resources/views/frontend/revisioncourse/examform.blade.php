@extends('layouts.frontend')
@section('title', 'GCSE Revision Course')
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
</style>

    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>GCSE Revision Course</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>GCSE Revision Course</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


	<!-- End Event Detail Section -->
		<section class="event-detail-section">
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Content Column -->
				<div class="content-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column">
						<h5>GCSE Revision Course Details</h5>
						<p>Our intensive revision course is one of the best ways to revisit the syllabus in a fast and efficient way
under the guidance of subject experts. Our revision sessions are structured around practising as
many past papers, mastering key exam skills. A perfect opportunity to reinforce key concepts and
techniques to enhance and improve the student’s understanding.</p><br>

<p>Our main focus is ensuring that students receive the support and assistance required. For this
reason, our group size has been limited to (enter number) to ensure that students receive individual
help whilst also benefiting from a group setting. Small groups are an ideal form of learning,
promoting discussions among likeminded students with the opportunity to learn from one another
as well as the tutor. During the sessions, our subject experts would cover a list of topics that
students tend to find challenging whilst also considering the performance of previous years from the
examiner’s report. This intensive revision will prepare the students to answer all kinds of questions
that could possibly come up on their exams and help them identify any gaps in their learning and
understanding.</p>
						<div class="image">
							<!-- <img src="{{asset('frontend')}}/images2/resource/event-10.jpg" alt="" /> -->
						</div>
						
						<div class="learn-box">
							<p>(it's demo text..(Add info on dates and times))</p>
							<ul class="learn-list">
								<!--<li>Exam Centre London offers private GCSE candidates with a two day course per subject at the cost of<span style="color:red"> £250</span>.</li>-->
								<!--<li>These sessions will be detailed and provide a clear and thorough understanding of practical assessments with the opportunity for candidates to individually conduct practice assessments.</li>-->
								
							</ul>
						</div>
						
						<p>For further information, please do not hesitate to contact us.</p>
					
					</div>
				</div>
				
			</div>
		</div>
	</section>
	@endsection