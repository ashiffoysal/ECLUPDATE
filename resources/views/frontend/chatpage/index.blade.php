@extends('layouts.frontend')
@section('title', 'Support Inquery')
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
    <style>
     
        .chat-container {
            /*width: 400px;*/
            height: 600px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            overflow: scroll;
        }

        .chat-header {
            background-color: #1d231d;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            border-bottom: 2px solid #ddd;
        }

        .chat-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background-color: #fafafa;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 100%;
            word-wrap: break-word;
        }

        .sent {
            width: 70%;
            background-color: #868282;
            color: white;
            align-self: flex-end;
        }

        .received {
            width: 100%;
            background-color: #ddd;
            color: black;
            align-self: flex-start;
        }

        .chat-footer {
            display: flex;
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 2px solid #ddd;
        }

        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .chat-footer button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .chat-footer button:hover {
            background-color: #45a049;
        }
    </style>

    <section class="breadcrumb-section text-center" style="padding-top: 20px; background-color: #EDF6FE !important;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Support Inquery</h2>
                    <ul>
                        <li><a href="{{ url('/')}}">home</a></li>
                        <li>/</li>
                        <li>Support Inquery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
        <section class="zh_exam_center section_padding" style="background-color: #fff;">
            <div class="container chat-container">
            
                    <div class="chat-header">
                        Support Box
                    </div>
                    <form action="{{ url('support-inquery',$alldata->support_id) }}" method="post">
                    <div class="chat-body" id="chat-body">
                        @csrf
                        <div class="message sent">{!! $alldata->notes !!}</div>
                        <input type="hidden" name="support_id" value="{{ $alldata->support_id }}" >
                        @foreach($allchats as $chat)
                            @if($chat->sender_type==1)
                            <div class="message sent">{!! $chat->message !!}</div>
                            @else
                            <div class="message received text-right">{!! $chat->message !!}</div>
                            @endif
                        @endforeach
                    </div>
                   
                    <div class="chat-footer">
                        <input type="text" name="cutomer_reply" placeholder="Type a message..." id="messageInput" required>
                        <button type="submit">Send</button>
                    </div>
               </form>
           </div>
       </section>

@endsection