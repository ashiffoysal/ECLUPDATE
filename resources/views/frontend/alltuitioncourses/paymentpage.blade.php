@extends('layouts.frontend')
@section('title', 'Exam Courses')
@section('content')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ripon.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          
.courses-page-section {
  
    padding: 10px 0px 100px;
}
h2.zh_heading {
    color: #247e3d !important;
    font-size: 28px !important;;
    font-weight: 800 !important;;
    line-height: 1.2em !important;;
    margin-bottom: 30px !important;;
}

label {
 
    color: black;
    font-weight: 600;
}
</style>
<link href="{{asset('frontend')}}/zaman/zamanovi.css" rel="stylesheet">


	<!-- End Contact Banner Section -->
		<section id="payment_method" style="margin-top:100px ">
			<div class="container shdw">

				<div class="row">
					<div class="col-sm-12">
						<div class="payment_sction">
							<div class="row">
								<div class="col-sm-5">
									<div class="div_left">
										<div class="payment_Alert">
											<h5>Payment Alert !!!</h5>
											<span>You must pay within 3 working days</span>
										</div>
										<div class="pmnt_smry">
											<h4 class="mb-4">Payment Summery</h4>
											
											<div class="exam_list mt-3">
												<table class="table">
													<thead>
														<tr style="border: 0px solid transparent !important;">
															<th scope="col">Course</th>
															<th scope="col">Subtotal</th>
														</tr>
													</thead>
													<tbody>
														<tr class="br_top">
															<td>{{ $data->course_name }}</td>
															<td> £ {{ $data->total_amount }}</td>
														
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="div_right">
										<h4>Payment Section</h4>
										<div class="radio_pymt">
											<div class="container">
												<div class="radio_main">

													<label for="radio-1" class="radio-label">
														<div class="radio_contain">
															
															<div class="radio-sec-m">
																
																	<input id="radio-1" name="radio" type="radio" checked>
																	<label for="radio-1" class="radio-label">Card Payment</label>
																
																
															</div>

															<div class="radio-sec-m2">
																<input id="radio-2" name="radio" type="radio">
																<label for="radio-2" class="radio-label">Bank
																	Payment</label>
															</div>



														</div>
													</label>
												</div>


												<div id="tran_bank" class="tran_detail">
													<h5>Transection Details</h5>
													<p>Click Pay Now! & Complete your Payment</p>
													<div class="card_sec">
														<img src="{{asset('frontend/zaman')}}/visa.png">
													</div>
													<div class="pay_btn">
													    	<form action="{{ route('courseonlinepayment.session') }}" method="POST">
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">
	    						
								  <input type="hidden" name="amount" id="main_amount" value="{{ $data->total_amount }}">
	                           
	                              <input type="hidden" name="booking_id" id="booking_id" value="{{ $data->booking_id }}">
	                       
	                              <input type="hidden" name="main_id" id="cu_main_id" value="{{ $data->id }}">
	                              
	                              <input type="hidden" name="user_id" id="cu_user_id" value="{{ $data->user_id }}">
														<button type="submit" class="btn btn-success">Click here to pay with card ( £ {{$data->total_amount}}
															)</button>
														</form>
													</div>
												</div>
												<div id="tran_Click" class="tran_detail_sec" style="display: none;">
													<div class="ecl_ac">
														<h5>ECL Account Details:</h5>
														<span><b>Account Name:</b> EDU SERVICE LIMITED</span>
														<br>
														<span><b>Account Number:</b>18901601</span>
														<br>
														<span><b>Sort Code:</b> 04-06-05</span>

													</div>
													<div class="tans_de">
														<h5 class="mb-2">Transection Details</h5>

														<form method="post" action="{{ url('/course/bankpayment') }}" enctype='multipart/form-data'>
														    @csrf
															<div class="form-group">
																<label for="formGroupExampleInput"><span
																		class="ref">Reference</span></label>
																<input type="text" name="transection_id" class="form-control"
																	id="formGroupExampleInput"
																	placeholder="Please Enter Reference No" required>
																	
	<input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
	<input type="hidden" name="amount" value="{{ $data->total_amount }}">

																	
																	
															</div>

															<div class="form-group">
																<label for="exampleFormControlFile1"><b>Transaction
																		Screenshot</b></label>
																<input type="file" class="form-control-file f2"
																	id="exampleFormControlFile1">
																<p class="ins">Allowed file types: png, jpg, jpeg.</p>
															</div>
													
													</div>
													<div class="upld_btn">
														<button type="submit" class="btn btn-success">Upload</button>
													</div>
	                                        </form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

		</section>
		<script>
		    $(document).ready(function(){
    $(".radio-sec-m").click(function(){
        $(".tran_detail_sec").hide();
      });
   
    $(".radio-sec-m").click(function(){
        $(".tran_detail").show();
      });
   
  });
  
$(document).ready(function(){
    $(".radio-sec-m2").click(function(){
      $(".tran_detail").hide();
    });
    $(".radio-sec-m2").click(function(){
      $(".tran_detail_sec").show();
    });
   
  });
  
		</script>
		
@endsection