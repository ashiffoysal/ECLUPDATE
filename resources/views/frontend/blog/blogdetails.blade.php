@extends('layouts.frontend')
@section('title', $data->meta_title)
@section('meta_description', $data->meta_description)
@section('content')
 @section('meta')
    <meta property="og:url" content="{{URL::current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$data->title}}"/>
    <meta property="og:image" content="{{ asset('uploads/'.$data->image) }}"/>
    <meta property="og:description" content="{{$data->meta_description}}" />
@endsection

<style>
    .blog_details_left_title h1 {
    font-size: 29px;
    line-height: 42px;
    font-weight: 600;
 
}
h1 {
    font-size: 30px;
    font-weight: 700;
    color: #161616;
}
</style>
<div class="sub_menu_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sub_menu">
                    <ul>
                        <li><a href="{{url('/blogs')}}">Blogs</a></li>
                        <li><i class="fas fa-angle-right"></i></li>
                        <li><a href="{{ url()->current() }} ">Blog Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog_details_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog_details">
                    <!-- Start Blog Details Left -->
                    <div class="blog_details_left">
                        <div class="blog_details_left_contents_main">
                            <div class="bdlcm_img">
                                <img src="{{ asset('uploads/'.$data->image) }}" alt="">
                                <a href="{{ url('/blogs') }}" class="btn_style"><span><img src="{{ asset('frontend/updatedesign') }}/assets/images/a-level-exam-booking/arrow-left.png" alt=""></span> Back</a>
                            </div>
                            <div class="blog_details_left_title course_overview_title">
                                <ul>
                                    <li><a href="#">{{ $data->Category->name }}</a></li>
                                </ul>
                                <h1>{{ $data->title }}</h1>
                                <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/blog-details/calender.png" alt=""> Updated {{ \Carbon\Carbon::parse($data->created_at)->format('d-F-Y') }}</p>
                            </div>
                            <div class="blog_details_left_contents">
                                

                                {!! $data->description  !!}
                                
                            </div>
                        </div>
                        <div class="blog_details_left_form">
                            <form method="post" action="{{ url('blog/comment') }}">
                                @csrf
                                <h4>Leave a Comment Below</h4>
                                <input type="text" name="name" placeholder="Name" required>
                                <input type="email" name="email"  placeholder="Email" required>
                                <input type="hidden" name="blog_id" value="{{ $data->id }}">
                                <textarea placeholder="Type your message"  name="message" required></textarea>
                                <div class="blog_details_left_form_post">
                                    <p><span>I am not a robot</span></p>
                                    <div class="bdlf_post_submit">
                                        <div class="bdlf_verify">
                                            <p>What’s {{ $rand_one }} + {{$rand_two}} ?</p>
                                            <input type="text" placeholder="Enter here" required>
                                        </div>
                                        <button type="submit" class="btn_style">Post Comment <span><img src="{{ asset('frontend/updatedesign') }}/assets/images/home/arrow-right.png" alt=""></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Blog Details Left -->

                    <!-- Start Blog Details Right -->
                    <div class="blog_details_right">
                        <div class="blog_details_right_contents">
                            <div class="blog_details_right_single">
                                <div class="blog_details_right_single_title"><p>Recent Posts</p></div>
                                <div class="blog_details_right_single_contents">

                                    @foreach($popularPost as $post)
                                    <div class="bd_contents_single">
                                        <a href="{{ url('/details/'.$post->slug.'/'.$post->id) }}">
                                            <span class="recent_post_img">
                                                <img src="{{ asset('/uploads/'.$post->image) }}" alt="">
                                            </span>
                                            <span class="recent_post_contents">
                                                <p><img src="{{ asset('frontend/updatedesign') }}/assets/images/blog-details/calender.png" alt=""> {{ $post->created_at->format('D M Y') }}</p>
                                                <h4>{{ $post->title }}</h4>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="refund_policy_border"></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="blog_details_right_single blog_details_right_single_mt">
                                <div class="blog_details_right_single_title"><p>Categories</p></div>
                                <div class="blog_details_right_single_contents">
                                    <ul class="bdrs_categories">
                                        @foreach($allcategory as $category)
                                        <li><a href="{{url('category',$category->id)}}">{{$category->name}} 
                                            {{-- <span>15</span> --}}
                                        
                                        </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_details_right_single blog_details_right_single_mt">
                                <div class="blog_details_right_single_title"><p>Tags</p></div>
                                <div class="blog_details_right_single_contents">
                                    <ul class="bdrs_tags">
                                     
                                        @foreach(explode(',',$data->tag) as $tags)
                                        <li><a href="#">{{ $tags }}</a></li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Details Right -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection