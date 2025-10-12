@extends('layouts.frontend')
@section('title', 'Verify')
@section('content')
<style>
  .form-control {
    margin: 0px 5px;
    display: block;
    width: 100%;
    padding: 1.375rem 0.75rem;
    font-size: 3rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="sub_menu_main">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="sub_menu">
                  <ul>
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><i class="fas fa-angle-right"></i></li>
                      <li><a href="{{ url('student/signup') }}">Registration</a></li>
                      <li><i class="fas fa-angle-right"></i></li>
                      <li><a href="#">Email Verification</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8 mt-10" style="padding-top: 106px;padding-bottom: 66px;">
              <div class="section_title high_standard_title">
                <b>Email Verification</b>
                <h2>Enter your <span>code</span></h2>
                <p>Please check your email for the 6-digit verification code to continue with your exam booking.</p>
               
            </div>
                <form method="POST" action="{{ route('verify.code') }}"> 
                    @csrf
                    <input type="number" hidden value="{{ $id }}" name="id">
                    <div class="d-flex mb-3">
                        <input type="tel"  name="first" maxlength="1" pattern="[0-9]" class="form-control">
                        <input type="tel"  name="second" maxlength="1" pattern="[0-9]" class="form-control">
                        <input type="tel"  name="third" maxlength="1" pattern="[0-9]" class="form-control">
                        <input type="tel"  name="forth" maxlength="1" pattern="[0-9]" class="form-control">
                        <input type="tel"  name="five" maxlength="1" pattern="[0-9]" class="form-control">
                        <input type="tel"  name="six" maxlength="1" pattern="[0-9]" class="form-control">
                    </div>
                    <button type="submit" class="btn_style">Verify Email<span><img src="{{asset('frontend')}}/updatedesign/assets/images/home/arrow-right.png" alt=""></span></button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
const form = document.querySelector('form')
const inputs = form.querySelectorAll('input')
const KEYBOARDS = {
  backspace: 8,
  arrowLeft: 37,
  arrowRight: 39,
}

function handleInput(e) {
  const input = e.target
  const nextInput = input.nextElementSibling
  if (nextInput && input.value) {
    nextInput.focus()
    if (nextInput.value) {
      nextInput.select()
    }
  }
}

function handlePaste(e) {
  e.preventDefault()
  const paste = e.clipboardData.getData('text')
  inputs.forEach((input, i) => {
    input.value = paste[i] || ''
  })
}

function handleBackspace(e) { 
  const input = e.target
  if (input.value) {
    input.value = ''
    return
  }
  
  input.previousElementSibling.focus()
}

function handleArrowLeft(e) {
  const previousInput = e.target.previousElementSibling
  if (!previousInput) return
  previousInput.focus()
}

function handleArrowRight(e) {
  const nextInput = e.target.nextElementSibling
  if (!nextInput) return
  nextInput.focus()
}

form.addEventListener('input', handleInput)
inputs[0].addEventListener('paste', handlePaste)

inputs.forEach(input => {
  input.addEventListener('focus', e => {
    setTimeout(() => {
      e.target.select()
    }, 0)
  })
  
  input.addEventListener('keydown', e => {
    switch(e.keyCode) {
      case KEYBOARDS.backspace:
        handleBackspace(e)
        break
      case KEYBOARDS.arrowLeft:
        handleArrowLeft(e)
        break
      case KEYBOARDS.arrowRight:
        handleArrowRight(e)
        break
      default:  
    }
  })
})

</script>
@endsection