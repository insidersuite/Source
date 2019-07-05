@extends('layout')
@section('title','Insider Suite | Design your trip in exclusive selection of outstanding hotels and activities.')
@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/home.css') }}">
@endsection
@section('content')
<div id="site-content">
    <div class="_5m2ieb" style="background-image:url(../images/Background/InsiderSuite_Home1.jpg)">

        <video id="video" loop="" muted="" playsinline="" autoplay="" style="object-fit:cover;width:100%;height:100%">
          <source src="https://dddwzx8rabh1g.cloudfront.net/home_video.mp4" type="video/mp4">
          <source src="https://dddwzx8rabh1g.cloudfront.net/home_video.mp4" type="video/mp4">
        </video>
        <div class="_314ao4">
            <div style="margin-bottom:24px">
                <div>
                    <section>
                        <div class="_1hargc54">
                            <h1 tabindex="-1" class="_tpbrp">Pimp your trip</h1>
                        </div>
                        <div class="_byeukid">
                            Design your entire holiday with supreme accommodation and breathtaking activities in the most hyped-up locations.</br> Secret offers of up to 80% off are at your fingertips!
                        </div>
                    </section>
                </div>
            </div>
            <div>
                <div>
                    <div class="_36rlri" style="margin-bottom:8px;margin-right:8px">
                        <a href="@if(Auth::User()) {{ url('offers') }} @else href="#" data-toggle="modal" data-target="#authentication" @endif" class="_fcgkkz8">Access the offers</a>
                    </div>
                    <a href="#how-are-exp-different" class="_1tesales" aria-busy="false"><span class="_cgr7tc7">Our Story</span></a>
                </div>
            </div>
        </div>

    </div>
     <div class="text-content _1q61p8r"">
        <div id="how-are-exp-different">
                <div class="solid-content_full" >
                    <div class="_hjkdye">
                        <section>
                            <div class="_n3xqk0l">
                                <h1 tabindex="-1" class="_tpbrpy">Upgrade your holiday... <br/> Your way...</h1>
                            </div>
                            <div style="margin-top:0">
                                <div class="_1bvsgufuy">
                                    What could be better than travelling with the Spirit of Freedom? More smiling, less worrying!
                                    <b>Insider Suite </b>will spare you the hassle of preparing your vacay by handpicking the most refined accommodation and activities tailored to your dreams.
                                    Enjoy secret and exclusive offers, specially negotiated and packaged for the unconventional traveller like you. It’s time to become an Insider Suite crew member!
                                </div>
                            </div>
                            <div class="subscribe">
                              <a href="@if(Auth::User()) {{ url('offers') }} @else href="#" data-toggle="modal" data-target="#authentication" @endif" class="btn btn-subscribe">Join Now</a>
                             </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
    <script>
        checkforVideo();

        function checkforVideo() {
            //Every 500ms, check if the video element has loaded
            var b = setInterval(function(){
                if(VideoElement.readyState >= 3){
                    //This block of code is triggered when the video is loaded

                    //your code goes here

                    //stop checking every half second
                    clearInterval(b);

                }else{
                    alert("gagal");
                }                   
            },500);
        }
    </script>  
@endsection


