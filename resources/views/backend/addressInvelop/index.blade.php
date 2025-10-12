<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Exam Cnetre London</title>
  </head>
  <body style="padding: 0px 300px;">
   <table class="table" style="margin:100px auto;text-aling:center;padding:0px 100px;">
       @php
        $alldata=App\Models\ExamRequest::where('main_exam_type','GCSE')->where('is_result_published',1)->get();
       @endphp
       
          <tbody>
              @foreach($alldata as $data)
            <tr style="margin:15px 0px;text-align:center; border:1px solid #f7f7f7">
                <td scope="row" style="border:1px solid #f7f7f7; font-family: emoji;font-weight: 500 !important;font-size: 17px;">
                   {{$data->Candidate_number}} <br>
                  {{$data->first_name}} {{$data->middle_name}} {{$data->last_name}}<br>
                  {{ $data->address_line_1 }} {{ $data->address_line_2 }}, {{ $data->city}}, {{$data->postcode}}<br>
                  {{$data->phone}}<br>
                  {{$data->email}}
                </td>
            </tr>
            @endforeach
            
             
            
            
       
           
          </tbody>
        </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>




