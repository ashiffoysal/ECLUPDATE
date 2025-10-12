        


          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  @if(Auth::user()->photo==null )
                   <img src="{{asset('uploads')}}/istockphoto-1300845620-612x612.jpg" alt="profile">
                  @else
                  <img src="{{asset('/'.Auth::user()->photo)}}" alt="profile">
                  @endif
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/student/dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Account</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{url('/student/updateprofile')}}">Edit Profile</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ url('student/updatepassword') }}">Password Update</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/exam-booking-list') }}">
                <span class="menu-title">Exam Booking List</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{ url('/ucas-exam-booking-list') }}">
                <span class="menu-title">UCAS-Exam Booking List</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/functional-skill-tuition-booking-list') }}">
                <span class="menu-title">Functional Skill Tuition</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/course-purchase-list') }}">
                <span class="menu-title">Course Purchase List</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/iseb-booking-list') }}">
                <span class="menu-title">ISEB Booking List</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/proctor-booking-list') }}">
                <span class="menu-title">Proctor Purchase List</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contact') }}">
                <span class="menu-title">Supports & Help</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Payment</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <!-- <li class="nav-item"> <a class="nav-link" href="#">Payment History</a></li> -->
                  <li class="nav-item"> <a class="nav-link" href="{{url('/student/payment')}}"> Transection History</a></li>
                </ul>
              </div>
            </li>
               <li class="nav-item">
              <a class="nav-link" href="{{ url('/logout') }}">
                <span class="menu-title">Signout</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
            </li>
            {{--
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                 
                </div>
                <a href="{{ url('/exam-list') }}" class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Book Your Exam !</a>
               
              </span>
            </li>
            --}}
          </ul>