@if(count($options[0]) > 0)
  <h4 class="single_form_h4">
    I would like to sit the following papers 
    <span>(£80 will be charged for each paper exam)</span>
  </h4>

  <div class="single_form_parent">
    @foreach($options[0] as $key => $mysubject)
      @php
        $subject_name = App\Models\Subject::where('id', $mysubject)
            ->select(['id', 'subject_name', 'unit_code'])
            ->first();
      @endphp

      <div class="single_form_step2_check_main single_form_column3 single_form_p">
        <p>{{ $subject_name->subject_name }} ({{ $subject_name->unit_code }}) <span>*</span></p>

        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Paper-1" 
                 name="mock_test_paper_1[]" 
                 onclick="mockPriceUpdate()" 
                 value="{{ $subject_name->subject_name }} - Paper 1">
          <label for="{{ $subject_name->subject_name }}-Paper-1">Paper 1</label>
          <input type="date">
        </div>

        <input type="hidden" name="mock_subject_name[]" value="{{ $subject_name->subject_name }}">
        <input type="hidden" name="mock_subject_id[]" value="{{ $subject_name->id }}">

        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Paper-2" 
                 name="mock_test_paper_2[]" 
                 onclick="mockPriceUpdate()" 
                 value="{{ $subject_name->subject_name }} - Paper 2">
          <label for="{{ $subject_name->subject_name }}-Paper-2">Paper 2</label>
          <input type="date">
        </div>

        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Paper-3" 
                 name="mock_test_paper_3[]" 
                 onclick="mockPriceUpdate()" 
                 value="{{ $subject_name->subject_name }} - Paper 3">
          <label for="{{ $subject_name->subject_name }}-Paper-3">Paper 3</label>
          <input type="date">
        </div>

        <div class="single_form_step2_check">
          <input type="checkbox" id="{{ $subject_name->subject_name }}-Paper-4" 
                 name="mock_test_paper_4[]" 
                 onclick="mockPriceUpdate()" 
                 value="{{ $subject_name->subject_name }} - Paper 4">
          <label for="{{ $subject_name->subject_name }}-Paper-4">Paper 4</label>
          <input type="date">
        </div>
      </div>
    @endforeach
  </div>

  <div class="single_form_parent">
    <div class="single_form_p">
      <input type="hidden" name="hidden_mock_price" id="hidden_mock_price" value="0">
      <h4>Total Mock Fees: £ <span id="mock_total_amount">0</span></h4>

      <p style="margin-top:30px!important">
        Are you going to take this mock test as 
        <a target="_blank" href="{{ url('ucas-registered-centre') }}">UCAS</a> reference? 
        <span>(£100 will be charged)</span>
      </p>

      <div class="form_step1_radio">
        <div class="form_step1_radio_single">
          <input type="radio" id="ucas_no" name="ucas_reference" value="0" checked>
          <label for="ucas_no">NO</label>
        </div>
        <div class="form_step1_radio_single">
          <input type="radio" id="ucas_yes" name="ucas_reference" value="1">
          <label for="ucas_yes">YES</label>
        </div>
      </div>
    </div>
  </div>
@endif

<script>
  function mockPriceUpdate() {
    $.ajax({
      url: "{{ url('/get/mockexams/price') }}",
      type: "GET",
      data: $('#multiStepForm').serialize(),
      success: function(data) {
        $("#mock_total_amount").html(data);
        $("#hidden_mock_price").val(data);
      }
    });
  }
</script>
