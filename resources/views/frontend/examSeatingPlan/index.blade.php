@extends('layouts.frontend')
@section('title', 'Exam Seating Plan')
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

    <section class="breadcrumb-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Exam Seating Plan</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>Exam Seating Plan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="zh_exam_center" style="background-color: #fff; padding:10px 0px">
        <div class="container">
            <div class="zh_exam_center_heading text-center">
                <div class="zh_label">EXAM CENTRE LONDON | ECL</div>
                <h2 class="zh_heading">November 2023 Seating Plan</h2>
            </div>
        </div>
    </section>

@endsection