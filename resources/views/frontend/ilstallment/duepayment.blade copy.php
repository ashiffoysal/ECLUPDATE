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
			<div class="content-box">
				<ul class="course-info">
					@php
						$mockprice=0;
					@endphp
					@if($data->mock_test=='mock_test_yes')
	                @php
						$mockprice=$data->mock_amount;
					@endphp
					@endif
						@php
							$mainprice=0;
						@endphp
						@if($data->exam_information ==null)

						@else
						@foreach(json_decode($data->exam_information) as $mainsub)
						 
							@php
								$subject=App\Models\Subject::where('id',$mainsub->subject)->first();
								$mainprice=$mainsub->fees + $mainprice ;
							@endphp
						@endforeach
					@endif
				</ul>
				
			</div>
		</div>
	</section>



    @if($data->main_exam_type=='GCSE' || $data->main_exam_type=='A Level' || $data->main_exam_type=='AS Level' ||  $data->main_exam_type=='IGCSE' )
    <section class="contact-page-section" id="Installments">
                <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-md-12 mt-10">
                                  <div class="alert alert-success new2 p-4">
								       <i class="fa fa-info-circle" aria-hidden="true"></i>
								       <span class="alert-body">
								         <h6 class="alert-header">Notes</h6>
								         <p class="mb-0" style="color:black !important;font-size:16px">Thank you for selecting Installments.</p>
                                       
                                        </span>
								    </div> 
                            </div>
                            <div class="col-md-6">
                                <table class="styled-table">
                                    <thead>
                                        <tr>
                                            <th>Details</th>
                                            <th>Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data->exam_information ==null)

                                            @else
                                            @foreach(json_decode($data->exam_information) as $smainsub)
                                                @php

                                                    $subjects=App\Models\Subject::where('id',$smainsub->subject)->first();
                                                
                                                @endphp
                                                <tr>
                                                        <td>{{$subjects->subject_name ?? ''}}</td>
                                                        <td>£ {{ $smainsub->fees ?? '' }}</td>
                                                    </tr>

                                            @endforeach
							            @endif
							
							           <tr>
                                            <td>Mock Test Fees</td>
                                            <td>£ {{$mockprice ?? 0}}</td>
                                        </tr>
							            <tr>
                                            <td>Coupon Discount</td>
                                            <td>£ {{$data->discount_amount}}</td>
                                        </tr>
                                        @php
                                            $ilstallment_fees= ($data->admin_specialaccess_amount + $data->total_amount  - $data->discount_amount) * 0.05;
                                        @endphp
                                        <tr>
                                            <td>Installment Fee</td>
                                            <td>£ {{round($ilstallment_fees)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Special Access Fee</td>
                                            <td>£ {{$data->admin_specialaccess_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Fee</td>
                                            <td>£ {{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount)}}</td>
                                        </tr>

                                        <tr>
                                            <td>Paid Fee</td>
                                            <td>£ {{ round($data->paid_amount)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Due Fee</td>
                                            <td>£ {{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                @php
                                    $price=$mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount;
                                    $ilstrumentamount=$price/2;
                                @endphp
                                <table class="styled-table">
                                    <thead>
                                        <tr>
                                            <th>Installment Details</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                         <tr>
                                            <td>Second Installment Date</td>
                                            <td>{{ $data->second_installment_date }}</td>
                                            <td>£ {{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="custom_radio">
								  <input type="radio" value="card_new_payment_ilstallment" onclick="myilstallamountnew(this)" name="ilstallment_check" checked id="featured-5"><label for="featured-5">Card Payment</label>
								  <br>
								  <!--<input type="radio"  value="bank_new_payment_ilstallment" onclick="myilstallamountnew(this)" name="ilstallment_check" id="featured-6"><label  for="featured-6">Bank Payment</label>-->
								  <!--<br>-->
								  
								</div>
                            </div>


                           <div class="form-group" id="card_new_payment_ils">
                                <div class="form-group" >
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
                                <div class="form-group select-amount col-lg-12 col-md-12 col-sm-12 clearfix">
                                    <label style="font-size:16px;margin-bottom: 5px !important;">First installment</label>
                                    <span style="color: #d24580; font-size:14px">Now you have to pay   £{{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}}</span>
                                </div>

                                <form action="{{ url('cardpayment-duepayment/session') }}" method="POST">
                                    @csrf
                                    
                                    <input type="hidden" name="amount" id="main_amount" value="{{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}}">
                                    <input type="hidden" name="cu_booking_id" id="cu_booking_id" value="{{ $data->booking_id }}">
                                    <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
                                    <input type="hidden" name="main_id" id="cu_main_id" value="{{ $data->id }}">
                                    <input type="hidden" name="user_id" id="cu_user_id" value="{{ $data->user_id }}">
                                    <button class="theme-btn btn-style-five" type="submit" id="checkout-live-button">Click here to pay with card ( £ {{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}} )</button>
                                </form>
							
                           </div>
                        </div>
							
							<div class="form-group" id="bank_ilstallmanet" style="display: none">
	                            <form method="post" action="{{ url('/bankpayment-duepayment/session') }}" enctype="multipart/form-data">
										@csrf
										<div class="row clearfix">
											
											<div class="form-group select-amount col-lg-12 col-md-12 col-sm-12 clearfix">
											<label style="font-size:10px">ECL Account Details:</label>
											<span>Account Name: EDU SERVICE LIMITED <br>Account Number: 18901601 <br> Sort Code: 04-06-05</span>
											</div>

                                            <div class="form-group select-amount col-lg-12 col-md-12 col-sm-12 clearfix">
                                                <label style="font-size:16px;margin-bottom: 5px !important;">First installment</label>
                                                <span style="color: #d24580; font-size:14px">Now you have to pay   £{{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount) }}</span>
                                            </div>
    
											<div class="form-group col-lg-12 col-md-12 col-sm-12">
												<label class="margin">Transaction Details</label>
											</div>
											<!-- Form Group -->
											<div class="form-group col-lg-12 col-md-12 col-sm-12">
												<level>Reference </level><br>
												<input type="text" name="transection_id" value="" placeholder="Enter Reference" required="Reference Number" class="form-control" style="margin-top: 10px;">
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12">
												<level >Transaction Screenshot</level><br>
												<input type="file" name="file" style="margin-top: 10px;" accept=".png, .jpg, .jpeg">
												<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
											</div>
											<input type="hidden" name="total_amount" value="{{ round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount) }}">
											<input type="hidden" name="installment_amount" value="{{  round($mainprice + $mockprice - $data->discount_amount + $ilstallment_fees + $data->admin_specialaccess_amount - $data->paid_amount)}}">
						                    <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
						                    <input type="hidden" name="examid" value="{{ $data->id }}">
										</div>
	                                <div class="form-group">
	                                    <button class="btn btn-success" type="submit" name="submit-form">Upload Now</button>
	                                </div>
	                            </form>
                        	</div>
                            
                        </div>



                    </div>
     </section>
     @endif
	<!-- End Course Detail Section -->
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