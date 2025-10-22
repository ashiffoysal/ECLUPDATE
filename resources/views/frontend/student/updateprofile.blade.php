@extends('layouts.frontend')
@section('title', 'Update Profile')
@section('content')
<section class="dashboard_main">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="dashboard_section">
                  <div class="dashboard_design">
                    <!-- Start Dashboard Left Side -->
                    <div class="dashboard_left_main">
                      @include('frontend.student.include.sidebar')
                    </div>
                    <!-- End Dashboard Left Side -->

                    <!-- Start Dashboard Right Side -->
                    <div class="dashboard_right_main">
                      <div class="dashboard_right">
                        <div class="dashboard_right_header dashboard_edit_profile_header">
                          @include('frontend.student.include.dasboardheader')
                        </div>

                        <div class="edit_profile_right_contents">
                          <div class="tab-content" id="pills-tabContent">
                                 <!-- Start Tab-1 Contents -->
                                <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                  <div class="edit_profile_tab1_contents">
                                    <form action="{{ url('/student/updateprofile') }}"  method="post" enctype="multipart/form-data">
                                      @csrf
                                      <div class="edit_profile_img_upload">
                                        <div class="edit_profile_user_img">


                                          @if(Auth::user()->photo==null )
                                          <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/profile.png" alt=""></span>
                                        @else
                                        <span><img src="{{asset('/'.Auth::user()->photo)}}" alt=""></span>
                                        @endif
                            


                                          <div class="cnasfu_upload epi_upload">
                                            <input type="file" id="file" name="photo">
                                            <label for="file"><img src="{{ asset('frontend/updatedesign') }}/assets/images/camera.png" alt=""></label>
                                        </div>
                                        </div>
                                      </div>
                                      <div class="form-step active">
                                      <div class="single_form_parent">
                                        <div class="single_form_step single_form_column3">
                                          <label for="id1">First Name</label>
                                          <input type="text"  name="first_name" id="id1" placeholder="Enter First Name" value="{{ Auth::user()->name }}">
                                                @error('first_name')
                                                <div style="color: red">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="single_form_step single_form_column3">
                                          <label for="id2">Middle Name</label>
                                          <input type="text" name="middle_name" id="id2" placeholder="Please Enter Middle name"  value="{{ Auth::user()->middle_name }}">
                                         
                                        </div>
                                        <div class="single_form_step single_form_column3">
                                          <label for="id3">Last Name</label>
                                          <input type="text" name="last_name" id="id3"  placeholder="Enter Last Name" value="{{ Auth::user()->last_name }}">
                                          @error('last_name')
                                          <div style="color: red">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="single_form_parent">
                                        <div class="single_form_step single_form_column2">
                                          <label for="id4">Email</label>
                                          <input type="email" id="id4" name="email" placeholder="Please Enter Email" value="{{ Auth::user()->email }}">
                                              @error('email')
                                                <div style="color: red">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="flag1">Phone</label>
                                          <div class="phone-input flag_input_default">
                                                                  <div class="flag-select">
                                                                  <img id="flag-icon" src="https://flagcdn.com/w320/gb.png" alt="Country Flag" class="flag-icon">
                                                                      <select id="country-code" class="country-code">
                                                                          <option value="+44" data-flag="https://flagcdn.com/w320/gb.png" selected="">+44 (UK)</option>
                                                                          <option value="+1" data-flag="https://flagcdn.com/w320/us.png">+1 (USA)</option>
                                                                          <option value="+91" data-flag="https://flagcdn.com/w320/it.png">+39 (Italy)</option>
                                                                      </select>
                                                                  </div>
                                                                  <input type="text" name="phone" class="phone-number" placeholder="Enter Phone" value="{{ Auth::user()->phone }}">
                                                              </div>
                                        </div>
                                        <div class="single_form_column2 single_form_p">
                                          <p>Gender</p>
                                          <div class="form_step1_radio">
                                            <div class="form_step1_radio_single">
                                              <input type="radio" id="id10" name="gender" @if(Auth::user()->gender=='Male') checked @endif value="Male">
                                              <label for="id10">Male</label>
                                            </div>
                                            <div class="form_step1_radio_single">
                                              <input type="radio" id="id11" name="gender" @if(Auth::user()->gender=='Female') checked @endif value="Female" >
                                              <label for="id11">Female</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="id9">Date of Birth</label>
                                          <input type="date" id="id9" placeholder="Please Enter Date of Birth" value="{{ Auth::user()->date_of_birth }}">
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="id7">City</label>
                                          <input type="text" id="id7" placeholder="Please Enter City" value="{{ Auth::user()->city }}" name="city">
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="id8">Post Code</label>
                                          <input type="text" id="id8" name="postcode" placeholder="Please Enter Post Code" placeholder="Enter Postcode" value="{{ Auth::user()->zip }}">
                                          @error('email')
                                          <div style="color: red">{{ $message }}</div>
                                          @enderror
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="id5">Address Line 1</label>
                                          <input type="text" id="id5"  name="address_line_one" placeholder="Please Enter Address Line 1" value="{{ Auth::user()->address }}">
                                        </div>
                                        <div class="single_form_step single_form_column2">
                                          <label for="id6">Address Line 2</label>
                                          <input type="text" id="id6" name="address_line_two" placeholder="Please Enter Address Line 2" value="{{ Auth::user()->address_two }}">
                                        </div>
                                      </div>
                                      <div class="form_single_step_btns edit_profile_save_btn">
                                        <button type="submit" class="btn_style">Save Profile Details <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                      </div>
                                    </div>
                                    </form>	
                                  </div>
                                </div>
                                <!-- End Tab-1 Contents -->

                                <!-- Start Tab-2 Contents -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                  2
                                </div>
                                <!-- End Tab-2 Contents -->
                            </div>

                        </div>
                      </div>
                    </div>
                    <!-- End Dashboard Right Side -->
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

