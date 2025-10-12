@extends('layouts.frontend')
@section('content')
{{--
    <style>
    h1, h2, h3, h4, h5, h6 {
    color: #102039;
    font-family: "Roboto", sans-serif;
    font-weight: 700;
    text-transform: capitalize;
    line-height: 1.2;
    margin-bottom: 0;
}
    .breadcrumb-section {
  padding: 40px 0;
  background-image: url("frontend/breadcrumb-bg.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover; }
  @media (min-width: 768px) and (max-width: 991.98px) {
    .breadcrumb-section {
      padding: 80px 0; } }
  @media (max-width: 767.98px) {
    .breadcrumb-section {
      padding: 60px 0; } }
  .breadcrumb-section ul {
    margin-top: 10px; }
    .breadcrumb-section ul li {
      display: inline-block;
      text-transform: capitalize;
      font-size: 18px;
      margin: 0 2px; }
      @media (min-width: 768px) and (max-width: 991.98px) {
        .breadcrumb-section ul li {
          font-size: 16px; } }
      @media (max-width: 767.98px) {
        .breadcrumb-section ul li {
          font-size: 16px; } }
      .breadcrumb-section ul li a {
        color: #606060;
        -webkit-transition: all 0.3s ease-in;
        -o-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in; }
        .breadcrumb-section ul li a:hover {
          color: #fe630e; }
</style>


    <section class="contact-page-section">
        <div class="pattern-layer-three" style="background-image: url(frontend/images/icons/icon-8.png)"></div>
        <div class="auto-container">
            <div class="row clearfix">
                
              <div class="col-md-12 mt-5 text-center">
		
			<div class="content-box">
				<h2>404 Page Not Found</h2>
			</div>
              </div>
                
            </div>
        </div>
    </section>
    
 --}}
 <style>
     
     .containersd {
    text-align: center;
    background-color: #fff;
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 100px;
    color: #ff6b6b;
}

h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    color: #666;
    margin-bottom: 30px;
}

.home-button {
    text-decoration: none;
    background-color: #ff6b6b;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.home-button:hover {
    background-color: #ff4d4d;
}


 </style>
<div class="containersd">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>We can't seem to find the page you're looking for.</p>
        <a href="{{ url('/') }}" class="home-button">Go Back to Home</a>
    </div>

@endsection