@extends('layouts.frontend')
@section('title', 'Refund Policy')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ripon.css') }}">
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
  padding: 100px 0;
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
.breadcrumb-section {
    padding: 50px 0 !important;
   
}

.zh_center_content {
    background-color: #ffffff;
}


.p_wrapper span {
    font-family: 'FontAwesome';
    font-size: large;
    font-weight: 800;
    color: blue;
}
</style>

    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Terms and Conditions for Installment Candidates</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>Terms and Conditions for Installment Candidates</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="zh_center_content section_padding">
    	<div class="container">
    		<div class="text-center">
    			<h2 class="zh_heading"></h2>
    			<div class="p_wrapper">
    			    
					<p>Welcome to Exam Centre London. By enrolling as an installment candidate, you agree to the following terms and conditions regarding your payment obligations and deadlines.</p> <br>


				</div>
			
    		</div>
    		
    		<hr>
    		
    		
    		<div class="text-center">
    			<h2 class="zh_heading">1. Payment Obligations</h2>
    			<div class="p_wrapper">
    			    
					<p>First Installment: The first installment must be paid by the agreed-upon date set by the exam centre.</p> <br>
						
					<p>Second Installment Deadline: The second installment must be paid by the second deadline date set by the exam centre. If this payment is not received by the deadline, a 5% administrative fee will be applied to the outstanding amount.</p> <br>
				    <p>Final Deadline for Second Installment: The second installment must be paid by 5th February (with 5% administration fee if applicable), which is the final deadline. If this payment is not received by this date, the candidate's exams will be cancelled.</p> <br>


				</div>
			
    		</div>
        	<br>
        	<div class="text-center">
        			<h2 class="zh_heading">2. Cancellation Policy</h2>
        			<div class="p_wrapper">
        			    
    					<p>Failure to Pay First Installment: Failure to pay the first installment by the agreed-upon date may result in the cancellation of the candidate's registration.</p> <br>
    						
    					<p>Failure to Pay Second Installment by Deadline: If the second installment is not paid by the second deadline date, a 5% administrative fee will be charged.</p> <br>
    				    <p>Failure to Pay Second Installment by Final Deadline: If the second installment is not paid at least 10 days before 15th February, the candidate's exams will be cancelled.</p> <br>
    
    
    				</div>
    			
        		</div>
        	
        		<br>
        	<div class="text-center">
        			<h2 class="zh_heading">3. Notification and Communication</h2>
        			<div class="p_wrapper">
        			    
    					<p>Payment Reminders: Candidates will receive payment reminders via email prior to each deadline.</p> <br>
    						
    					<p>Proof of Payment: Candidates must provide proof of payment upon request to confirm receipt and avoid any administrative actions.</p> <br>
    				    <p>Failure to Pay Second Installment by Final Deadline: If the second installment is not paid at least 10 days before 15th February, the candidate's exams will be cancelled.</p> <br>
    
    
    				</div>
    			
        		</div>
        		<br>
    		 	<div class="text-center">
        			<h2 class="zh_heading">4. Refund Policy</h2>
        			<div class="p_wrapper">
        			    
    					<p>Cancellation by Candidate: In the event of cancellation by the candidate, no refund will be issued for any payments made up to the point of cancellation.</p> <br>
    						
    					<p>Cancellation by Centre: If exams are cancelled by the centre due to non-payment, no refund will be issued for any payments made up to the point of cancellation.</p> <br>
    
    
    				</div>
    			
        		</div>
    	
    			<br>
    		 	<div class="text-center">
        			<h2 class="zh_heading">5. Contact Information
</h2>
        			<div class="p_wrapper">
        			    
    					<p>For any questions or concerns regarding your payment status, please contact our administration office at info@examcentrelondon.co.uk.
By agreeing to these terms and conditions, you acknowledge and accept the payment responsibilities and potential consequences outlined above.
Thank you for your cooperation.
</p> <br>
    						
    				
    
    
    				</div>
    			
        		</div>
    		
    		
    		
    	</div>
    </section>
    
    
    
 
    
    
    
    
        
@endsection