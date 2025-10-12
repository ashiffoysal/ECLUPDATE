@extends('layouts.backend')
@section('content')

<style>
    .table>thead {
    vertical-align: bottom;
    text-align: center;
    font-weight: bold;
    font-family: math;
}
</style>
<div class="container mt-5">
    <div class="card">
        <!-- Header with Logo -->
        <div class="card-header text-center">
            <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="Merit Tutors Logo" class="img-fluid">
        </div>

        <div class="card-body">
            <form action="{{ url('admin/merit-custom-invoice/create') }}" method="post">
                <!-- Receipt Number and Date Row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="branch" class="form-label">Branch</label>
                        @csrf
                        <select class="form-select form-select-solid" name="branch">
                            <option value="1">Forest gate</option>
                            <option value="2">Ilford Lane</option>
                            <option value="3">Plaistow</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="receiptNumber" class="form-label">Receipt No.</label>
                        <input type="text" class="form-control" name="receiptNumber" id="receiptNumber" value="{{ $receipt_number }}">
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ Carbon\Carbon::today()->format('d/m/Y'); }}" required>
                    </div>
                </div>

                <!-- Name and Payment Type Row -->
                <div class="row mb-3">
                    <div class="col-md-5 mt-5">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="student_name" required>
                    </div>
                    <div class="col-md-5 mt-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-2 mt-5">
                        <label for="yearId" class="form-label">ID/Year</label>
                        <input type="text" class="form-control" id="yearId" name="yearId" required>
                    </div>
                    <div class="col-md-12 mt-4">
                        <label class="form-label">Payment Type</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="cash" value="Cash" checked>
                                <label class="form-check-label" for="cash">Cash</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="card" value="Card">
                                <label class="form-check-label" for="card">Card</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="bacs" value="Bacs">
                                <label class="form-check-label" for="bacs">Bacs</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details and Amounts Table -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Details</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Amount (£)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="tuitionFees" id="tuitionFees">
                                            <label class="form-check-label" for="tuitionFees">Tuition Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="tuitionFeesAmount" id="tuitionFeesAmount" value="0" disabled>
                                        <br>
                                        <input type="text" class="form-control" name="tuitionfeeDetails" id="tuitionfeeDetails" placeholder="Enter details" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" id="admissionFees" name="admissionFees">
                                            <label class="form-check-label" for="admissionFees">Admission Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="admissionFeesAmount" id="admissionFeesAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="childCareFees" id="childCareFees">
                                            <label class="form-check-label" for="childCareFees">Child Care Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="childCareFeesAmount" id="childCareFeesAmount" value="0" disabled>
                                        <div class="mb-3 mt-2">
                                            <label for="fromdate" class="form-label">From</label>
                                            <input type="date" class="form-control" name="fromdate" id="fromdate" disabled>
                                        </div>
                                        <div class="mb-3 mt-2">
                                            <label for="todate" class="form-label">To</label>
                                            <input type="date" class="form-control" name="todate" id="todate" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="examFees" id="examFees">
                                            <label class="form-check-label" for="examFees">Examination Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="examFeesAmount" id="examFeesAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="deposit" id="deposit">
                                            <label class="form-check-label" for="deposit">Refundable Deposit</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="depositAmount" id="depositAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="resources" id="resources">
                                            <label class="form-check-label" for="resources">Resources</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="resourcesAmount" id="resourcesAmount" value="0" disabled>
                                        <br>
                                        <input type="text" class="form-control" name="resourcesFeesDetails" id="resourcesFeesDetails" placeholder="Enter details" disabled>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Total Amount Row -->
                <div class="row mb-3">
                    <div class="offset-md-6 col-md-6">
                        <label for="totalAmount" class="form-label">Total Amount</label>
                        <input type="text" class="form-control" id="totalAmount" name="totalAmount" value="£0.00" readonly>
                    </div>
                </div>

                <!-- Received By and Signature Row -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="receivedBy" class="form-label">Received By</label>
                        <input type="text" class="form-control" id="receivedBy"  name="receivedBy" required>
                    </div>
                    <div class="col-md-6">
                        <label for="signature" class="form-label">Signature</label>
                        <input type="text" class="form-control" name="signature" id="signature" value="">
                    </div>
                </div>

                <!-- Notes Row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="notes" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="notes" name="remarks" value="">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                </div>
            </form>
        </div>

        <!-- Footer with Contact Info -->
        <div class="card-footer text-center">
            <p class="footer-text">Address: 54 Upton Lane, London E7 9LN | Phone: 0208 616 2526 or 0786 166 8674</p>
            <p class="footer-text">Website: <a href="https://www.merittutors.co.uk">merittutors.co.uk</a> | Email: <a href="mailto:info@merittutors.co.uk">info@merittutors.co.uk</a></p>
        </div>
    </div>
</div>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Function to update total amount
    function updateTotalAmount() {
        let total = 0;

        // Select all enabled amount input fields
        $('.amount-input').each(function() {
            if ($(this).is(':enabled') && !isNaN(parseFloat($(this).val()))) {
                total += parseFloat($(this).val());
            }
        });

        // Display the total in the Total Amount field
        $('#totalAmount').val('£' + total.toFixed(2));
    }

    // Enable/disable amount input and related fields based on checkbox
    $('.item-checkbox').change(function() {
        const relatedAmountInput = $(this).closest('tr').find('.amount-input');
        const relatedDetailInput = $(this).closest('tr').find('input[type="text"]');

        if ($(this).is(':checked')) {
            relatedAmountInput.prop('disabled', false).val(0); // Enable and reset to 0
            relatedDetailInput.prop('disabled', false); // Enable detail field if exists

            if ($(this).attr('id') === 'admissionFees') {
                relatedAmountInput.val(10); // Set Admission Fees to £10
            }
            if ($(this).attr('id') === 'deposit') {
                relatedAmountInput.val(50); // Set Refundable Deposit to £50
            }
        } else {
            relatedAmountInput.prop('disabled', true).val(0);  // Disable and reset to 0
            relatedDetailInput.prop('disabled', true).val('');  // Disable detail field if exists
        }

        updateTotalAmount();  // Update total when checkbox changes
    });

    // Enable/disable fromdate and todate when Child Care Fees is checked
    $('#childCareFees').change(function() {
        const fromDateInput = $('#fromdate');
        const toDateInput = $('#todate');

        if ($(this).is(':checked')) {
            fromDateInput.prop('disabled', false).prop('required', true);  // Enable and make required
            toDateInput.prop('disabled', false).prop('required', true);    // Enable and make required
        } else {
            fromDateInput.prop('disabled', true).prop('required', false).val(''); // Disable and remove required
            toDateInput.prop('disabled', true).prop('required', false).val('');   // Disable and remove required
        }
    });

    // Update total amount when amount input value changes
    $('.amount-input').on('input', function() {
        updateTotalAmount();
    });
</script>




{{--
<style>
    .table>thead {
    vertical-align: bottom;
    text-align: center;
    font-weight: bold;
    font-family: math;
}
</style>
<div class="container mt-5">
    <div class="card">
        <!-- Header with Logo -->
        <div class="card-header text-center">
            <img src="https://merittutors.co.uk/uploads/logo/logo_1648033550.png" alt="Merit Tutors Logo" class="img-fluid">
        </div>

        <div class="card-body">
            <form action="{{ url('admin/merit-custom-invoice/create') }}" method="post">
                <!-- Receipt Number and Date Row -->
                  <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="branch" class="form-label">Branch</label>
                        @csrf
                        <select class="form-select form-select-solid" name="branch">
                            <option value="1">Forest gate</option>
                            <option value="2">Ilford Lane</option>
                            <option value="3">Plaistow</option>
                        </select>
                    </div>
                  
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="receiptNumber" class="form-label">Receipt No.</label>
                       
                        <input type="text" class="form-control" name="receiptNumber" id="receiptNumber" value="{{ $receipt_number }}">
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" id="date" value="{{ Carbon\Carbon::today()->format('d/m/Y'); }}">
                    </div>
                </div>

                <!-- Name and Payment Type Row -->
                <div class="row mb-3">
                    <div class="col-md-5 mt-5">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="student_name" required>
                    </div>
                      <div class="col-md-5 mt-5">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" id="name" name="email" required>
                    </div>
                     <div class="col-md-2 mt-5">
                        <label for="yearId" class="form-label">ID/Year</label>
                        <input type="text" class="form-control" id="yearId" name="yearId" required>
                    </div>
                    <div class="col-md-12 " style="margin-top:10px">
                        <label class="form-label">Payment Type</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="cash" value="Cash" checked>
                                <label class="form-check-label" for="cash">Cash</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="card" value="Card">
                                <label class="form-check-label" for="card">Card</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paymentType" id="bacs" value="Bacs">
                                <label class="form-check-label" for="bacs">Bacs</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details and Amounts Table -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Details</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Amount (£)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="tuitionFees" id="tuitionFees">
                                            <label class="form-check-label" for="tuitionFees">Tuition Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="tuitionFeesAmount" id="tuitionFeesAmount" value="0" disabled>
                                        <input type="text" class="form-control" name="tuitionfeeDetails" value="" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" id="admissionFees" name="admissionFees">
                                            <label class="form-check-label" for="admissionFees">Admission Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="admissionFeesAmount" id="admissionFeesAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="childCareFees" id="childCareFees">
                                            <label class="form-check-label" for="childCareFees">Child Care Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="childCareFeesAmount" id="childCareFeesAmount" value="0" disabled>
                                        
                                        <div class="mb-3 mt-2">
                                          <label for="exampleFormControlInput1" class="form-label">From</label>
                                           <input type="date" class="form-control" name="fromdate" id="fromdate" >
                                        </div>
                                      
                                         <div class="mb-3 mt-2">
                                            <label for="exampleFormControlInput1" class="form-label">To</label>
                                            <input type="date" class="form-control" name="todate" id="todate" >
                                          </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="examFees" id="examFees">
                                            <label class="form-check-label" for="examFees">Examination Fees</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="examFeesAmount" id="examFeesAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="deposit" id="deposit">
                                            <label class="form-check-label" for="deposit">Refundable Deposit</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="depositAmount" id="depositAmount" value="0" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="resources" id="resources">
                                            <label class="form-check-label" for="resources">Resources</label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control amount-input" name="resourcesAmount" id="resourcesAmount" value="0" disabled>
                                        <input type="text" class="form-control" name="resourcesFeesDetails" value="" disabled>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Total Amount Row -->
                <div class="row mb-3">
                    <div class="offset-md-6 col-md-6">
                        <label for="totalAmount" class="form-label">Total Amount</label>
                        <input type="text" class="form-control" id="totalAmount" name="totalAmount" value="£0.00" readonly>
                    </div>
                </div>

                <!-- Received By and Signature Row -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="receivedBy" class="form-label">Received By</label>
                        <input type="text" class="form-control" id="receivedBy"  name="receivedBy" required>
                    </div>
                    <div class="col-md-6">
                        <label for="signature" class="form-label">Signature</label>
                        <input type="text" class="form-control" name="signature" id="signature" value="">
                    </div>
                </div>

                <!-- Notes Row -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="notes" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="notes" name="remarks" value="">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Create Invoice</button>
                </div>
            </form>
        </div>

        <!-- Footer with Contact Info -->
        <div class="card-footer text-center">
            <p class="footer-text">Address: 54 Upton Lane, London E7 9LN | Phone: 0208 616 2526 or 0786 166 8674</p>
            <p class="footer-text">Website: <a href="https://www.merittutors.co.uk">merittutors.co.uk</a> | Email: <a href="mailto:info@merittutors.co.uk">info@merittutors.co.uk</a></p>
        </div>
    </div>
</div>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Function to update total amount
    function updateTotalAmount() {
        let total = 0;

        // Select all enabled amount input fields
        $('.amount-input').each(function() {
            if ($(this).is(':enabled') && !isNaN(parseFloat($(this).val()))) {
                total += parseFloat($(this).val());
            }
        });

        // Display the total in the Total Amount field
        $('#totalAmount').val('£' + total.toFixed(2));
    }

    // Enable/disable amount input based on checkbox
    $('.item-checkbox').change(function() {
        const relatedAmountInput = $(this).closest('tr').find('.amount-input');

        if ($(this).is(':checked')) {
            relatedAmountInput.prop('disabled', false).val(0); // Enable and reset to 0
        } else {
            relatedAmountInput.prop('disabled', true).val(0);  // Disable and reset to 0
        }

        updateTotalAmount();  // Update total when checkbox changes
    });

    // Update total amount when amount input value changes
    $('.amount-input').on('input', function() {
        updateTotalAmount();
    });
</script>
 --}}

@endsection