<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Receipt</title>
<style>
    /* Define your CSS styles for the printable invoice */
    /* You can customize these styles as needed */
    body {
        font-family: Arial, sans-serif;
        color: #333;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .invoice-container {
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        overflow: hidden;
    }
    .invoice-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .invoice-header h2 {
    color: #ffffff;
    margin: 0;
    padding: 10px 29px;
    background-color: #f10303;
    border-radius: 27px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    display: inline-block;
    font-family: fangsong;
    font-size: 21px;
}
   
    .invoice-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /*margin-bottom: 20px;*/
    }
    .invoice-details {
        border-radius: 5px;
        background-color: #f9f9f9;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .invoice-details table {
        width: 100%;
        border-collapse: collapse;
    }
    .invoice-details th,
    .invoice-details td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .invoice-total {
        text-align: right;
        font-weight: bold;
    }
    .row {
        margin-bottom: 10px;
    }

    p {
    font-family: emoji;
}

.logo {
    max-width: 250px;
}
thead {
    font-family: auto;
}
.invoice-details th, .invoice-details td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    font-family: emoji;
}
img {
    height: 60px;
    width: 224px;
}
</style>
</head>
<body>

<div class="invoice-container">
    <div class="invoice-header">
        <h2 style="color: #ffffff;
        margin: 0;
        padding: 10px 29px;
        background-color: #f10303;
        border-radius: 27px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        display: inline-block;
        font-family: fangsong;
        font-size: 21px;">Receipt</h2>
    </div>
    
    <!-- Logo and title -->
    <div class="invoice-info">
        <div>
            @if($data->receipt_for=='Merit Tutors')
            <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="Logo" class="logo">
            @else
            <img src="https://www.examcentrelondon.co.uk/uploads/logo/logo_1662996021.png" alt="Logo" class="logo">
            @endif
        </div>
        
    </div>

    <!-- Payment type and date -->
    <div class="invoice-info">
        <div>
            <p>Payment Type: {{ $data->payment_type }}</p>
        </div>
        <div>
            <p>Date: {{ $data->date }}</p>
        </div>
        <div>
            <p>Invoice No: {{ $data->no }}</p>
        </div>
    </div>

      <div class="row invoice-info ">
        <div>
            <p>Name: {{ $data->name }}</p>
        </div>
        <div>
            <p>Email: {{ $data->email }}</p>
        </div>
    </div>

    <!-- Invoice items -->
    <div class="invoice-details">
        <table>
            <thead>
                <tr>
                    
                    <th>Details</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                
            @if($data->tuition_fees==1)
            <tr>
                
                <td>Tuition Fees</td>
                <td>£ {{ $data->tuition_fees_amount }}</td>
            </tr>
            @endif
             @if($data->admission_fees==1)
            <tr>
                
                <td>Admission Fees</td>
                <td>£ {{ $data->admission_fees_amount }}</td>
            </tr>
            @endif
             @if($data->child_care_fees==1)
            <tr>
                
                <td>Child Care Fees</td>
                <td>£ {{ $data->child_care_fees_amount }}</td>
            </tr>
            @endif
             @if($data->examination_fees==1)
            <tr>
                
                <td>Examination Fees</td>
                <td>£ {{ $data->examination_fees_amount }}</td>
            </tr>
            @endif
             @if($data->refundable_deposite_fees==1)
            <tr>
                
                <td>Refundable Deposite</td>
                <td>£ {{ $data->refundable_deposite_fees_amount }}</td>
            </tr>
            @endif
             @if($data->resources==1)
            <tr>
                
                <td>Resources</td>
                <td>£ {{ $data->resources_amount }}</td>
            </tr>
            @endif
           
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1" class="invoice-total">Total:</td>
                    <td>£ {{ $data->total_amount }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- <div class="row invoice-info ">
        <div>
            <p>Name: ASIF</p>
        </div>
        <div>
            <p>Email: ashiffoysal8818@gmail.com</p>
        </div>
    </div> -->
    <!-- Received by and signature -->
    <div class="row">
        <div class="row">
        <div>
            <p>Received by: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        </div>
        <div>
            <p>Signature:</p>
            <img src="{{ asset('/'.$data->file)}}" >
        </div>
    </div>

    <!-- Email and phone number -->



    <div class="row invoice-info">
        
        
        @if($data->receipt_for=='Merit Tutors')
       
         <div>
            <p>54 Upton Lane, London E7 9LN</p>
        </div>
        <div>
            <p>0208 616 2526 </p>
        </div>
        <div>
            <p>info@merittutors.co.uk</p>
        </div>
        
        @else
        
        
        
        
          
         <div>
            <p>54 Upton Lane, London E7 9LN</p>
        </div>
        <div>
            <p> 0208 616 2526</p>
        </div>
        <div>
            <p>info@examcentrelondon.co.uk</p>
        </div>
        @endif
        
        
        
    </div>
</div>

<script>
    // Print the invoice
    window.onload = function() {
        window.print();
    };
</script>

</body>
</html>
