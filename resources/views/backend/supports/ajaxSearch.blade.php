<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@if($results->count() >0)

<style>
    .accordion-body {
    text-align: left;
}
</style>
<div class="accordion" id="accordionExample">
    
@foreach($results as $key => $myresults)
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne{{ $key }}">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $key }}" aria-expanded="true" aria-controls="collapseOne">
       {{ $myresults->title }}
      </button>
    </h2>
    <div id="collapseOne{{ $key }}" class="accordion-collapse collapse @if($key==0) show @endif" aria-labelledby="headingOne{{ $key }}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <h2>{{ $myresults->title }}</h2><br>
        <p id="{{ $key }}" onclick="copypost(this)">{!! $myresults->notes  !!}</p>
      </div>
    </div>
  </div>
  @endforeach

</div>




@else

<p style="font-size:20px;color:red">Data Not Found !</p>

@endif
