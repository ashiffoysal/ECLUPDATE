





@if(count($options[0]) > 0)
<h4 class="single_form_h4">I would like to sit the following papers <span>(£70 will be charged for each paper exam)</span></h4>
    <div class="single_form_parent">
      @foreach($options[0] as $key => $mysubject)
        @php
          $sku = '';
          foreach (explode(' ', $mysubject) as $key => $value) {
            $sku .= substr($value, 0, 1);
          }
        @endphp
       
      <div class="single_form_step2_check_main single_form_column3 single_form_p">
        @php
          $subject_name = App\Models\Subject::where('id', $mysubject)->select(['id', 'subject_name', 'unit_code'])->first();
        @endphp
        <p>{{ $subject_name->subject_name }} ({{ $subject_name->unit_code }}) <span>*</span></p>
        <div class="single_form_step2_check">
            	     <input  name="mock_subject_name[]" type="hidden"  value="{{ $subject_name->subject_name }}">
                                                        <input  name="mock_subject_id[]" type="hidden"  value="{{ $subject_name->id }}">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Papers-1" name="mock_test_paper_1[]" onclick="mcokpriceUpdate()" value="{{ $subject_name->subject_name }}-Papers 1">
          <label for="id38">Paper 1</label>
          <input type="date">
        </div>
        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Papers-2" name="mock_test_paper_2[]" onclick="mcokpriceUpdate()" value="{{ $subject_name->subject_name }}-Papers 2">
          <label for="id39">Paper 2</label>
          <input type="date">
        </div>
        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Papers-3" name="mock_test_paper_3[]" onclick="mcokpriceUpdate()" value="{{ $subject_name->subject_name }}-Papers 3">
          <label for="id40">Paper 3</label>
          <input type="date">
        </div>
        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Papers-4" name="mock_test_paper_4[]" onclick="mcokpriceUpdate()" value="{{ $subject_name->subject_name }}-Papers 4">
          <label for="id41">Paper 4</label>
          <input type="date">
        </div>
      </div>
      @endforeach
    </div>

    <div class="single_form_parent">
      <div class="single_form_p">
        <input type="hidden" name="hidden_mock_price" id="hidden_mock_price" value="0">
        <h4>Total Mock Fees: £ <span id="mock_total_amount">0</span></h4>

        <p style="margin-top:30px!important">Are you going to take this mock test as <a target="_blank" href="{{ url('ucas-registered-centre') }}">UCAS</a> reference? <span>(£100 will be charged)</span></p>
        <div class="form_step1_radio ">
          <div class="form_step1_radio_single">
            <input type="radio" id="id47" name="ucas_reference" value="no" checked>
            <label for="id47">NO</label>
          </div>
          <div class="form_step1_radio_single">
            <input type="radio" id="id48" name="ucas_reference" value="yes">
            <label for="id48">YES</label>
          </div>
        </div>
        
      </div>
    </div>
  @endif
          

 <script>

    function mcokpriceUpdate(){

      

            $.ajax({
                 url: "{{  url('/get/gcse-mockexams/price') }}",
                 type:"GET",
                 data:$('#multiStepForm').serialize(),
                 success:function(data) { 
                    
                     
                     $("#mock_total_amount").html(data);
                     $("#hidden_mock_price").val(data);
                     console.log(data);


                  }
             });





    }
  </script>

     

                     