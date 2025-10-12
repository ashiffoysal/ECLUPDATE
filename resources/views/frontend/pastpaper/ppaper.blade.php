@extends('layouts.frontend')
@section('title', 'Past Papers')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ripon.css') }}">
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
  background-image: url("https://www.examcentrelondon.co.uk/frontend/breadcrumb-bg.jpg");
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
          .section_padding {
    padding: 20px 0px;
}




.zh_exam_center .zh_exam_center_heading .zh_label {
    color: #ffffff;
    font-size: 18px;
    font-weight: 500;
    border-radius: 6px;
    margin-bottom: 0px;
    padding: 6px 20px 7px;
    display: inline-block;
    background-color: #71d6c5;
    font-family: 'Lato', sans-serif;
}
.zh_exam_center .zh_exam_center_heading {
    margin-bottom: 20px;
}
</style>

    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Past Papers</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>/ Past Papers </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
      <section class="zh_exam_center section_padding" style="background-color: #fff;">
        <div class="container">
            <div class="zh_exam_center_heading ">
                <div class="zh_label">Past Papers</div>
            </div>
            <div class="row">
             
              <div class="col-md-12 text-center">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Unit Code</th>
                          <th scope="col">Series</th>
                          <th scope="col">Papers</th>
                          <th scope="col">Mark Scheme</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mathematics</td>
                          <td>1MA1</td>
                          <td>June 2022</td>
                          <td>
                                <a href="" class="btn btn-success">Download</a>
                          </td>
                          <td>
                            
                              <a href="" class="btn btn-danger">Download</a>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
              </div>
            </div>
            <hr>
        </div>
        
    </section>
@endsection