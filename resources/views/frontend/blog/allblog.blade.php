@extends('layouts.frontend')
@section('title', 'Exam Centre London Blogs | Expert Tips & Guides for Students')
@section('meta_description', 'Explore the latest blogs from Exam Centre London. Get expert tips, exam guides, and resources for GCSE, A-Level, ACCA, Functional Skills, and more. Stay informed and succeed!')
@section('content')
<style>
    .high_standard_title h1 {
    color: #000;
    margin-top: 15px;
    text-transform: capitalize;
}
</style>
 <!--================  Start (Blogs Title) Section  ================-->
 <section class="a_lavel_exams_main ucas_application_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="a_level_exams">
                    <div class="section_title high_standard_title exam_fees_title">
                        <b>Blogs</b>
                        <h1>Latest Exam Tips  <span>& Guides</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================  End (Blogs Title) Section  ================-->

<!--================  Start (Blogs) Section  ================-->
<section class="blogs_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blogs">
                    <div class="blogs_contents">

                        @foreach($allblog as $blog)
                        <div class="blogs_content_single">
                            <img src="{{asset('uploads/'.$blog->image)}}" alt="">
                            <ul>
                                {{-- <li><a href="#">Exams</a></li> --}}
                                <li><a href="#">{{  $blog->Category->name }}</a></li>
                            </ul>
                            <h4>{{ $blog->title }}</h4>
                            <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/blogs/calender.png" alt=""> {{ \Carbon\Carbon::parse($blog->created_at)->format('d-F-Y') }}
                            </p>
                            <div class="blogs_btns">
                                <a href="{{url('/details/'.$blog->slug.'/'.$blog->id)}}" class="btn_style">Read More <span><img src="{{asset('frontend/updatedesign')}}/assets/images/home/arrow-right.png" alt=""></span></a>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="blog_page_count exam_fees_modal_page_count">
                        {{ $allblog->links() }}
                        {{-- <ul>
                            <li><a href="#" class="blogs_page_count_prev"><span><i class="fas fa-arrow-left"></i></span></a></li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#"><span><i class="fas fa-arrow-right"></i></span></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection