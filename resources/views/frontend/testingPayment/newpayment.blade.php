@extends('layouts.frontend')
@section('title', 'Make Payment')
@section('content')
<style>
    .mb-16 {
    margin-bottom: 4rem;
}
.lg\:text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem;
}
.font-semibold {
    font-weight: 600;
    font-family: 'FontAwesome';
    color: #000;
}
.cource-detail-banner-section {
    position: relative;
    overflow: hidden;
    padding: 50px 0px;
    background-color: #ffffff;
}
.block.mt-3.sm\:mt-5.text-xs.sm\:text-sm.font-medium.text-slate-700.dark\:text-slate-400 {
    font-family: auto;
    font-size: 17px;
    font-weight: 400;
}

.col-md-12.mystyle {
  
    border: 1px solid #f1f1f1;
}
.col-md-3.mystyle {
    padding: 10px 0px;
}
.col-md-3.mystyle a {
    background: #3ec7b0;
    padding: 9px 34px;
    margin: 49px 31px;
}
.col-md-3.mystylee {
    padding: 10px 0px;
}
.col-md-3.mystylee a {

    background: #3ec7b0;
    padding: 9px 34px;
    margin: 49px 31px;
}
</style>
<section class="cource-detail-banner-section text-center" style="padding-bottom:20px !important">
    	<div class="auto-container">
            <div class="mb-16">
                <h2 class="block text-2xl sm:text-3xl lg:text-4xl font-semibold ">Make Payment</h2>
                <div class="block mt-3 sm:mt-5 text-xs sm:text-sm font-medium text-slate-700 dark:text-slate-400">
                    <a class="" href="{{url('/')}}">Homepage</a><span class="text-xs mx-1 sm:mx-1.5">/</span>
                    <a class="" href="#">Make Payment</a><span class="text-xs mx-1 sm:mx-1.5"></span>
                </div>
            </div>
        </div>
</section>

<section class="cource-detail-banner-section text-center" style="padding-top:0px !important">
    <div class="auto-container">
        <div class="row">
        	  <div class="col-md-3 mystyle">
        	     <a href="#"><span style="font-size: 17px;font-weight: 500;font-family: 'FontAwesome';color: #ffffff;">Full payment</span></a>  
        	  </div> 
        	  <div class="col-md-3 mystylee" >
        	       <a href=""><span style="font-size: 17px;font-weight: 500;font-family: 'FontAwesome';color: #ffffff;    ">Installment payment</span></a> 
        	  </div>
     	 </div>
	<div>
</section>

<section class="cource-detail-banner-section text-center" style="padding-top:0px !important">
    <div class="auto-container">
	  <div class="col-md-12 mystyle">
	      <span style="font-size: 17px;font-weight: 500;font-family: 'FontAwesome';color: #ef0000;">Payment Alert</span><h3 style="font-size: 30px;font-weight: 400;font-family: 'FontAwesome';color: #000;">You must pay within 3 working days.</h3>
	  </div> 
	<div>
</section>
<section class="cource-detail-banner-section text-center" style="padding-top:0px !important">
    <div class="auto-container">
	  <div class="col-md-8 mystyle text-left">
	      <span style="font-size: 17px;font-weight: 500;font-family: 'FontAwesome';color: #000000;">Booking summary</span>
	  </div> 
	<div>
</section>
@endsection