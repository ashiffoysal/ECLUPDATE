<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('backend')}}/assets/izitost.css">

    <title>PAYMENT RECEIPT</title>
    <style>
        .bd-navbar {
    padding: 0.75rem 0;
    background-color: #7952b3 !important;
}

label.form-label {
    font-family: emoji;
    font-size: 20px;
}

h3.receipt {
    background: #f34949;
    font-family: emoji;
    font-size: 31px;
    border-radius: 16px;
    color: #fff;
}


table.table {
    font-family: emoji;
    font-size: 20px;
}

.form-control {
 
    border-radius: 10px !important;
}
    </style>
    <link href="{{asset('frontend/signature')}}/css/jquery.signature.css" rel="stylesheet">

<style>
.kbw-signature { width: 400px; height: 200px; }
</style>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<script src="{{asset('frontend/signature')}}/js/jquery.signature.js"></script>
<script>
$(function() {

  var sig = $('#sig').signature({
    syncField:'#signature', 
    syncFormat:'PNG'
    });

  $('#clear').click(function() {
    sig.signature('clear');
  });

});
</script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light bd-navbar">
  <div class="container">
    <a class="navbar-brand" href="#"  style="color:#fff !important">PAYMENT RECEIPT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav text-center" style="color:#fff !important">
     <a class="nav-link active" style="color:#fff !important" aria-current="page" href="{{ url('payment-receipt/index') }}">ALL RECEIPT</a>
        <a class="nav-link" style="color:#fff !important" href="{{ url('payment-receipt/create') }}">CREATE RECEIPT</a>
       
      </div>
    </div>
  </div>
</nav>

<div class="container" style="padding:50px 0px !important">
    <div class="row text-center">
         <div class="offset-5 col-md-2 col-sm-12">
             <h3 class="receipt">RECEIPT</h3>
         </div>
    </div>
</div>

<div class="container" style="padding-top:30px !important">
      <form action="{{ url('payment-receipt/create') }}" method="post" enctype='multipart/form-data'>
    <div class="container" style="">
        <div class="row">
            @csrf
                <div class="col-md-2" style="text-align: end !important;">
                     <label for="exampleFormControlInput1" class="form-label" >Receipt for :</label>
                </div>
                 <div class="col-md-10"> 
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="receipt_for" id="examcentre" value="Exam Centre London">
                      <label class="form-check-label form-label" for="examcentre">Exam Centre London</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="receipt_for" id="Merit" value="Merit Tutors" checked>
                      <label class="form-check-label form-label" for="Merit">Merit Tutors</label>
                    </div>
                   
                </div>
        </div>
        <div class="row">
                <div class="col-md-2 mt-2" style="text-align: end !important;">
                     <label for="exampleFormControlInput1" class="form-label" >Payment Type :</label>
                </div>
                 <div class="col-md-3 mt-2"> 
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio1" value="CASH" checked>
                      <label class="form-check-label form-label" for="inlineRadio1">CASH</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio2" value="BANK">
                      <label class="form-check-label form-label" for="inlineRadio2">BANK</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="payment_type" id="inlineRadio3" value="CARD">
                      <label class="form-check-label form-label" for="inlineRadio3">CARD</label>
                    </div>
                
            </div>
            <div class="col-md-4">
               <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label form-label">Date:</label>
                <div class="col-sm-10">
                  <input type="date" name="date" class="form-control" id="date" required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
               <div class="mb-3 row">
                <label for="invoicenumber" class="col-sm-2 col-form-label form-label">No:</label>
                <div class="col-sm-10">
                    @php
                        $rnumber=rand(99999,11111);
                    @endphp
                  <input type="text" class="form-control" id="invoicenumber" value="{{ $rnumber }}" disabled>
                  <input type="hidden" class="form-control"  name="no" id="invoicenumber" value="{{ $rnumber }}" >
                </div>
              </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3 row">
                <label for="invoicenumber" class="col-sm-2 col-form-label form-label" style="text-align: end;">Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="invoicenumber" required>
                </div>
              </div>
            </div>
             <div class="col-md-6">
               <div class="mb-3 row">
                <label for="invoicenumber" class="col-sm-2 col-form-label form-label" style="text-align: center;">Email:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="invoicenumber" required>
                </div>
              </div>
            </div>
         </div>
         
         <div class="row">
             <div class="col-md-12 text-center">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="tuition_fees">
                                
                              </td>
                              <td>Tuition Fees</td>
                              <td><input type="number" name="tuition_fees_amount" class="form-control" value="0" disabled></td>
                              
                        </tr>
                        <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="admission_fees" value="0" >
                                
                              </td>
                              <td>Admission Fees</td>
                              <td><input type="number" class="form-control" value="0" name="admission_fees_amount" disabled></td>
                              
                        </tr>
                         <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" name="child_care_fees">
                                
                              </td>
                              <td>Child Care Fees</td>
                              <td><input type="number" class="form-control" value="0" name="child_care_fees_amount" disabled></td>
                              
                        </tr>
                         <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="examination_fees" >
                                
                              </td>
                              <td>Examination Fees</td>
                              <td><input type="number" class="form-control" value="0" name="examination_fees_amount" disabled></td>
                              
                        </tr>
                         <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="refundable_deposite_fees" >
                                
                              </td>
                              <td>Refundable Deposite Fees</td>
                              <td><input type="number" name="refundable_deposite_fees_amount" class="form-control" value="0" disabled></td>
                              
                        </tr>
                          <tr>
                              <td>
                                  
                                  <input class="form-check-input" type="checkbox" value="1" name="resources" id="flexCheckDefault">
                                
                              </td>
                              <td>Resources</td>
                              <td><input type="number" name="resources_amount" class="form-control" value="0" disabled></td>
                              
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>
                                <span id="total_amount">£0</span> 
                                <input type="hidden" id="total_amount_hidden" name="total_amount_hidden" class="form-control" >
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
         </div>
          <div class="row" style="padding-10px;padding-bottom:100px;">
             <div class="col-md-4 text-right">
                    <label  class="form-label">Signature</label><br>
                              <div id="sig"></div>
                              <textarea name="signed" id="signature" style="display:none"></textarea>
                              <p style="clear: both;">

                            <button type="button" id="clear">Clear</button> 

                          </p>
                              
                 
             </div>
         </div>
         <div class="row" style="padding-10px;padding-bottom:100px;">
             <div class="col-md-12 text-center">
                 <button type="submit" class="btn btn-warning">Create</button>
             </div>
         </div>
         
         
         </div>
    </form>
</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
           <script src="{{asset('backend')}}/assets/izitost.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':
                iziToast.success({
                    message: '{{ Session::get('messege') }}',
                    'position': 'topRight'
                });
                break;
            case 'info':
                iziToast.info({
                    message: '{{ Session::get('messege') }}',
                    'position': 'topRight'
                });
                break;
            case 'warning':
                iziToast.warning({
                    message: '{{ Session::get('messege') }}',
                    'position': 'topRight'
                });
                break;
            case 'error':
                iziToast.error({
                    message: '{{ Session::get('messege') }}',
                    'position': 'topRight'
                });
                break;
        }
        @endif
    </script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // Function to calculate the sum of all enabled input fields
    function calculateSum() {
        var sum = 0;
        $('input[type="number"]:enabled').each(function() {
            sum += parseInt($(this).val());
        });
        $('#total_amount').text('£'+sum);
        $('#total_amount_hidden').val(sum);
    }

    // Initially calculate the sum
    calculateSum();

    // Enable/disable amount input based on checkbox status and set required attribute
    $('input[type="checkbox"]').change(function() {
        var isChecked = $(this).prop("checked");
        var amountInput = $(this).closest('tr').find('input[type="number"]');
        amountInput.prop('disabled', !isChecked);
        if (isChecked) {
            amountInput.prop('required', true);
        } else {
            amountInput.prop('required', false);
            amountInput.val('0');
        }
        calculateSum();
    });

    // Update sum when input values change
    $('input[type="number"]').on('input', function() {
        calculateSum();
    });
});
</script>
<script src="{{asset('frontend')}}/js/jquery.js"></script>
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.fancybox.js"></script>
<script src="{{asset('frontend')}}/js/appear.js"></script>
<script src="{{asset('frontend')}}/js/parallax.min.js"></script>
<script src="{{asset('frontend')}}/js/tilt.jquery.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.paroller.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.js"></script>
<script src="{{asset('frontend')}}/js/wow.js"></script>
<script src="{{asset('frontend')}}/js/nav-tool.js"></script>
<script src="{{asset('frontend')}}/js/jquery-ui.js"></script>

<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">-->
<link href="{{asset('frontend/signature')}}/css/jquery.signature.css" rel="stylesheet">

<style>
.kbw-signature { width: 400px; height: 200px; }
</style>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<script src="{{asset('frontend/signature')}}/js/jquery.signature.js"></script>
<script>
$(function() {

  var sig = $('#sig').signature({
    syncField:'#signature', 
    syncFormat:'PNG'
    });

  $('#clear').click(function() {
    sig.signature('clear');
  });

});
</script>

  </body>
</html>