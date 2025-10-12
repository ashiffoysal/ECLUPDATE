@extends('layouts.frontend')
@section('title', 'Make Payment')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .course-detail-section .info-column .inner-column {
      
        margin-top: 0px !important;
    
    }
    .donate-page-section .donate-column .inner-column {
        position: relative;
        padding: 20px 35px 20px;
        background-color: #e2efef;
    }
    .donate-page-section {
        position: relative;
        padding: 40px 0px 70px;
    }
</style>
<style>
    .main-menu .navigation {
      
        margin: 0px 100px !important; 
    }
        .main-header.header-style-four .nav-outer {
         padding-left: 0px !important; 
    }
    .main-header .nav-outer {
       
        float: left  !important; 
        padding-left: 120px  !important; 
    }
    
    .pull-right {
         float: none !important; 
    }
</style>
<style>
        .checked {
          color: orange;
        }
    </style>
<style>
        .pricing-table .table tbody tr th {
    
            font-size: 14px;
        }
        .pricing-table .table thead th {
    
            font-size: 14px;
          
        }
        .teacher-details-information {
         
            border-top: 3px solid #02ff6a;
         
        }
        .teacher-details-information h3::before {
    
            background-color: #02ff6a;
        }
        .pricing-table .table tbody tr td {
            border: 1px solid #f0f0f0;
            font-weight: 400;
            color: #6b6b84;
            overflow-x: auto;
            font-family: "Roboto", sans-serif;
            padding: 22px 25px;
            font-size: 16px;
        }
    
    
        blockquote, .blockquote {
            background-color: #fafafa;
            padding: 25px !important;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            border-left: 3px solid #02ff6a;
            border-right: 3px solid #02ff6a;
            border-radius: 5px;
        }
        img.asifimage {
            height: 80px;
            margin: 10px 0px;
            padding: 10px 10px;
            border: 1px solid;
            border-radius: 14%;
        }
        .card{
           
            border: 0px solid rgba(0,0,0,.125) !important;
           
        }
       .course-detail-section .info-column .level-list li {
       
       padding-left: 15px !important; 
        
    }
    
    
    .form-group label {
        position: relative;
        color: #06142d;
        font-size: 18px;
        display: block;
        font-weight: 600;
        margin-bottom: 20px;
    }
    /**/
    .myback{
    	    border: 1px solid #f0f5f3;
        border-radius: 10px;
        padding: 28px;
        background: #f0f5f3;
        margin: 5px;
    }
    .mybackk{
    	  
        border-radius: 10px;
        padding: 2px;
       
    }
    .alert-success.new {
      background: none;
      border: none;
      border-left: 4px solid green;
      border-radius: 0;
      background: #fff;
      box-shadow: 1px 1px 4px rgba(0, 0, 0, .2);
    }
    
    .alert-success.new2 {
      background: #f4f7fa;
      border: none;
      border-left: 4px solid #45D298;
      border-radius: 0;
      box-shadow: 1px 1px 4px rgba(0, 0, 0, .2);
    }
    
    .alert-success.new2.p-4 {
      padding: 0.75rem 0.75rem !important;
    }
    
    .alert-success.new2 .fa {
      color: #45D298;
      display:table-cell;
      text-align: center;
      vertical-align: middle;
      font-size: 40px;
    }
    
    .alert-success .alert-body {
      padding-left: 0.75rem;
      display: table-cell;
      color: rgba(0,0,0,0.5);
    }
    
    .alert-success .alert-header {
        font-weight: 500;
        color: #d24580;
      padding: 0;
      margin: 0;
    }
    .mb-0, .my-0 {
        margin-bottom: 0!important;
        font-size: 12px;
    }
    .contact-page-section {
        
        padding: 20px 0px 70px;
    }
    .cource-detail-banner-section {
       
         padding-bottom: 1px; 
       
    }
    
    .custom_radio{
       margin: 20px;
    }
    .custom_radio input[type="radio"]{
      display: none;
    }
    .custom_radio input[type="radio"] + label{
      position: relative;
      display: inline-block;
      padding-left: 1.5em;
      margin-right: 2em;
      cursor: pointer;
      line-height: 1em;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
    .custom_radio input[type="radio"] + label:before,
    .custom_radio input[type="radio"] + label:after{
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 1em;
      height: 1em;
      text-align: center;
      color: white;
      font-family: Times;
      border-radius: 50%;
      -webkit-transition: all .3s ease;
      transition: all .3s ease;
    }
    .custom_radio input[type="radio"] + label:before {
      -webkit-transition: all .3s ease;
      transition: all .3s ease;
      box-shadow: inset 0 0 0 0.2em white, inset 0 0 0 1em white;
    }
    .custom_radio input[type="radio"] + label:hover:before {
      -webkit-transition: all .3s ease;
      transition: all .3s ease;
      box-shadow: inset 0 0 0 0.3em white, inset 0 0 0 1em #c6c6c6;
    }
    .custom_radio input[type="radio"]:checked + label:before {
      -webkit-transition: all .3s ease;
      transition: all .3s ease;
      box-shadow: inset 0 0 0 0.2em white, inset 0 0 0 1em #4CAF50;
    }
    .contact-page-section .info-column ul li {
       
        margin-bottom: 3px !important;
    }
</style>
<style>
    
        [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }
    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label
    {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }
    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }
    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #F87DA9;
        position: absolute;
        top: 4px;
        left: 4px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }
    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    
    
    section.contact-page-section.installments {
        padding: 54px 0px 50px 0px;
        background: #efefef;
    }
</style>
<style>
    .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

p {
    font-size: 17px;
    font-family: 'Flaticon';
}

span.testing-payment {
    font-weight: 900;
    font-size: 20px;
}
</style>

      <section class="cource-detail-banner-section text-center">
		<div class="pattern-layer-one" style="background-image: url(frontend/images/icons/icon-5.png)"></div>
		<div class="pattern-layer-two" style="background-image: url(frontend/images/icons/icon-6.png)"></div>
		<div class="pattern-layer-three" style="background-image: url(frontend/images/icons/icon-4.png)"></div>
		<div class="pattern-layer-four" style="background-image: url(frontend/images/icons/icon-8.png)"></div>
		<div class="auto-container">
			<!-- Page Breadcrumb -->
			<ul class="page-breadcrumb">
				<li><a href="#">Exam-Booking</a></li>
				<li>Make Payment</li>
				<li>{{ $data->main_exam_type ?? '' }} Exam Booking<br> </li>
			</ul>
		</div>
	</section>
	
	<section class="contact-page-section" id="fullpayment">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="info-column col-lg-12 col-md-12 col-sm-12">	
	<p>
At Exam Centre London, we are committed to providing our customers with the highest quality services and ensuring that their documents meet the required standards. In pursuit of this commitment, we offer a document checking service to ensure the accuracy and compliance of your submitted documents. We believe in transparency, which is why we want to inform you about the special access fee associated with this service.</p>
<p>
<span class="testing-payment">The Special Access Fee:</span>
As part of our dedication to meticulous document review, we offer a document checking service for a nominal fee of £25. This fee covers the cost of our expert team meticulously reviewing your documents to ensure they adhere to the necessary guidelines, standards, and requirements.
</p>
<p>
<span class="testing-payment">Why the Fee?</span>
The special access fee of £25 is necessary to support the efforts of our professional team, who invest their expertise and time to thoroughly review your documents. Their attention to detail helps prevent potential errors, discrepancies, or omissions that could otherwise lead to inconveniences or delays. We value the importance of accuracy and precision in your documents, whether they pertain to applications, submissions, or any other critical processes.
</p>
<p>
<span class="testing-payment">Fee Notification:</span>
It's important to note that the special access fee will be applicable after your documents have been thoroughly reviewed by our team. We want to ensure that you are informed about the fee only after you have experienced the benefits of our document checking service. This approach allows you to appreciate the value that our dedicated team brings to your documents.
</p>
<p>
<span class="testing-payment">Non-Refundable Nature:</span>
Please be aware that the special access fee is non-refundable. This policy is in place to cover the costs associated with the time and effort expended by our team during the document checking process. We recommend that you carefully review your documents before opting for our document checking service to ensure their accuracy and completeness.
</p>
<p>
<span class="testing-payment">Conclusion:</span>
At Exam Centre London, our document checking service aims to provide you with peace of mind, knowing that your documents meet the necessary standards and requirements. We are transparent about the special access fee of £25, which is a small investment to ensure the accuracy and compliance of your documents. Your satisfaction is our priority, and we look forward to assisting you in your document-related endeavors.

Should you have any questions, concerns, or require further clarification, please don't hesitate to reach out to our customer support team. Thank you for choosing Exam Centre London.</p>
</p>
               </div>
            </div>
        </div>
	</section>

	<section class="contact-page-section" id="fullpayment">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                    	 <div class="alert alert-success new2 p-4">
								       <i class="fa fa-info-circle" aria-hidden="true"></i>
								       <span class="alert-body">
								         <h6 class="alert-header">Payment Alert</h6>
								         <p class="mb-0" style="color:black !important">You must pay within 3 working days.</p>
								       </span>
								    </div>
                        <div class="sec-title-two">
                            <div class="title" style="color: white;">Total Amount £25</div>
                        </div>
                        <h6>Exam includes:</h6>
                        <ul>
                            <li>Special Access Checking Fee: £25</li>
                        </ul>

                    </div>
                </div>
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Payment Section</h2>
                        <div class="contact-form">
                        	<div class="form-group" id="card_new_payment" >
                        	    	<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<label class="margin">Transection Details</label>
									<span>Click Pay Now! &amp; Complete your Payment </span>
									<div class="cards"><img class="mycardcl" src="https://examcentrelondon.co.uk/frontend/images/icons/cards.png" alt="" height="30px">
									</div>
								</div>
								<style>
								    .mycardcl {
									    height: 80px;
									}
								</style>


							  <form action="{{ route('myonlinepayment.session') }}" method="POST">
	    						  <input type="hidden" name="_token" value="{{csrf_token()}}">
								  <input type="hidden" name="amount" id="main_amount" value="25">
	                              <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
	                              <input type="hidden" name="main_id" id="cu_main_id" value="{{ $data->id }}">
	                              <input type="hidden" name="user_id" id="cu_user_id" value="{{ $data->user_id }}">
								  <button class="theme-btn btn-style-five" type="submit" id="checkout-live-button">Click here to pay with card ( £ 25 )</button>
						      </form>
                        	    
                        	    
	            
                        	</div>



                        </div>
                            
                    </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>

 

@section('myjs')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
        	
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
@endsection
<script>
	function tabbutton(el){
		var id=el.id;
		if(id==999){
			$(this).addClass("active-btn");
			$("#888").removeClass("active-btn");

			$("#prod-monthly").show();
			$("#prod-onetime").hide();

		
		}else if(id==888){

			$(this).addClass("active-btn");
			$("#999").removeClass("active-btn");

			

			$("#prod-monthly").hide();
			$("#prod-onetime").show();
		}
		
	}
</script>




<script>
	function addcupon(){
		var cupon_code=$("#cupon_code").val();
		var booking_id=$("#cu_booking_id").val();
		var main_id=$("#cu_main_id").val();
		var user_id=$("#cu_user_id").val();
		var myamount=$("#myamount").val();
		
		if(cupon_code==''){
			$("#error_coupon").show();
			$("#success_coupon").hide();
			$("#warning_coupon").hide();
			$("#wrong_coupon").hide();
		}else{
			
		
             $.ajax({
                 url: "{{  url('/add/coupon/insert') }}",
                 type:"GET",
                 data:{
                 	"cupon_code":cupon_code,
                 	"booking_id":booking_id,
                 	"main_id":main_id,
                 	"user_id":user_id,
                 },
                 success:function(data) {
                 		
                 	console.log(data);
                 		
                   if(data=="already_used"){
						$("#error_coupon").hide();
						$("#success_coupon").hide();
						$("#wrong_coupon").hide();
						$("#warning_coupon").show();
                        
                	}
                	else if(data=="success"){
						$("#error_coupon").hide();
						$("#success_coupon").show();
						$("#warning_coupon").hide();
						$("#wrong_coupon").hide();

						location.reload();
                        
                	}

                	else if(data=="cupon_not_found"){

						$("#error_coupon").hide();
						$("#success_coupon").hide();
						$("#warning_coupon").hide();
						$("#wrong_coupon").show();

                        
                	}
                }
             });
           }
			       


		}
	
</script>

<script>
	function myamountnew(el){
		
		var val=el.value;

		if(val=="bank_new_payment"){
			$("#bank_new_payment").show();
			$("#card_new_payment").hide();
		}
		if(val=="card_new_payment"){
			$("#bank_new_payment").hide();
			$("#card_new_payment").show();
		}
	}
	
	
	function pay_section(el){
		
		var val=el.value;

		if(val=="full_payment"){
			$("#fullpayment").show();
			$("#Installments").hide();
		}
		if(val=="installments"){
			$("#Installments").show();
			$("#fullpayment").hide();
		}
	}



    function myilstallamountnew(el){
		
		var val=el.value;

		
		if(val=="card_new_payment_ilstallment"){
			$("#bank_ilstallmanet").hide();
			$("#card_new_payment_ils").show();
		}

        if(val=="bank_new_payment_ilstallment"){
			$("#bank_ilstallmanet").show();
			$("#card_new_payment_ils").hide();
		}
	}
</script>




@endsection