@extends('layouts.frontend')
@section('title', 'Student Dashboard')
@section('content')
<style>
    .auto-container {
   
    max-width: 1620px !important;
    
}
.contact-banner-section {
    padding-top: 18px !important;
    padding-bottom: 10px !important;
}
</style>
  <section class="contact-banner-section">
        <div class="pattern-layer-one" style="background-image: url(frontend/images/icons/icon-5.png)"></div>
        <div class="pattern-layer-two" style="background-image: url(frontend/images/icons/icon-6.png)"></div>
        <div class="pattern-layer-three" style="background-image: url(frontend/images/icons/icon-4.png)"></div>
        <div class="auto-container">
            <!-- Page Breadcrumb -->
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Dashboard</li>
            </ul>
         
        </div>
    </section>
   @include('frontend.student.include.maincss')
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="container-scroller">
                <nav class="navbar default-layout-navbar col-lg-12">
                    @include('frontend.student.include.dasboardheader')
                </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          @include('frontend.student.include.sidebar')
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> All Tuition Booking
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  
                </ul>
              </nav>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <p class="card-description">Functional Skills Tuition 
                    </p>
                     <div class="table-responsive">
                    <table class="table table-hover" style="width:100%;font-size:14px">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Payment Status</th>
                                       
                                        <th scope="col">Manage</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alldata as $key => $data)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>{{ $data->created_at ?? '' }}</td>
                                        <td>{{ $data->booking_id }}</td>
                                        
                                        <td>
                                        @if($data->is_paid_verify==1)
                                          <span class="badge badge-success">Paid</span>  
                                        @endif
                                        @if($data->is_paid_verify==0)
                                        <span class="badge badge-danger">Unpaid</span>
                                        @endif
                                    </td>

                                      
                                        <td>
                                            @if($data->is_paid_verify==0)
                                            <a class="badge badge-gradient-primary" href="{{ url('make-payment/functional-skils-tuition/'.$data->booking_id) }}">Pay</a> 
                                            @endif
                                            <a class="badge badge-gradient-success" href="{{ url('/functional-skill-tuition-booking-details/'.$data->booking_id) }}">Details</a>
                                           

                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                                {{ $alldata->links()  }}
                    </table>
                  </div>
                   </div>
                </div>
              </div>
           
          </div>
        
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
            </div>
        </div>
        
    </div>
    </div>
</section>
@include('frontend.student.include.mainjs') 

@endsection
