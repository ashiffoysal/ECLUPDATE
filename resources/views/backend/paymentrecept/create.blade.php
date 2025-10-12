<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('backend')}}/assets/izitost.css">
	<link rel="stylesheet" href="{{asset('backend')}}/assets/datatabels/dataTables.min.css">
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
     <div class="row">
         <div class="col-md-12">
              <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table" id="dataTableExample1" class="data-table" style="width:100%;font-size:14px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="">
                                            <th class="">#</th>
                                            <th class="">Name</th>
                                            <th class="">Email</th>
                                            <th class="">Total Amount</th>
                                            <th class="">Recept For</th>
                                            <th class="">Paid By</th>
                                            <th class="">Date</th>
                                            <th class="">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach($allData as $key => $data)
                                        <tr>
                                           <td>{{ $data->no }}</td>
                                           <td>{{ $data->name }}</td>
                                           <td>{{ $data->email }}</td>
                                           <td>{{ $data->total_amount }}</td>
                                           <td>{{ $data->receipt_for }}</td>
                                           <td>{{ $data->payment_type }}</td>
                                           @php
                                           $mainDate=date('d-m-Y', strtotime($data->date));
                                           @endphp
                                           <td>{{ $mainDate }}</td>
                                           <td>
                                               <a href="{{ url('/payment-receipt/edit',$data->id) }}" class="btn btn-danger">EDIT</a>
                                                <a href="{{ url('/payment-receipt/print',$data->id) }}" class="btn btn-success">Print</a>
                                           </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
         </div>
     </div>
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

    
       	<script src="{{asset('backend')}}/assets/datatabels/dataTables.min.js"></script>
		<script src="{{asset('backend')}}/assets/datatabels/dataTables-active.js"></script>
  </body>
</html>