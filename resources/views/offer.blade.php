<html>
    <head>
    <!-- Latest compiled and minified CSS -->
<meta property="fb:app_id" content="625441737790452" />
<meta property="og:url" content="https://www.insidersuite.com/sponsor" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Upgrade your holiday... your way..." />
<meta property="og:description" content="Join Insider Suite & enjoy secret and exclusive offers, specially negotiated and packaged for unconventional traveler." />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138598787-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138598787-1');
</script>
<meta property="og:image" content="http://www.insidersuite.com/imgs/refer_background.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Upgrade your experience & plan every second of your trip to get the most out of pleasures and indulgences of holiday at the best rate." />

<meta name="keywords" content="INSIDER SUITE, Insider suite, Insider Suite, insider suite, quality holidays, luxury trips, private sale online, flash sales, short breaks, weekend breaks, cruises, skiing, hotels, insider, suite, luxury, hotels, sales, exclusive, holiday, experience, trip, gateway, boutique, suite, dream, travel , travel, club, hotels, unique experience, destination, discounts, best spot, " />
{{-- <link rel="stylesheet" type="text/css" href="{{ url('css/bulma.min.css') }}"> --}}
<link rel="shortcut icon" href="{{ url('imgs/favicon.ico') }}" />
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('css/modal-loading-animate.css') }}">
<link rel="stylesheet" href="{{ url('css/modal-loading.css') }}">
<link rel="stylesheet" href="{{ url('css/magicsuggest-min.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/fontawesome.css" integrity="sha384-0b7ERybvrT5RZyD80ojw6KNKz6nIAlgOKXIcJ0CV7A6Iia8yt2y1bBfLBOwoc9fQ" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

<!--<script type="text/javascript" src="{{ url('js/custom_head.js') }}"></script>-->
<style type="text/css">
	.loader {
	  border: 2px solid #f3f3f3;
	  border-radius: 50%;
	  border-top: 2px solid black;
	  width: 120px;
	  height: 120px;
	  -webkit-animation: spin 2s linear infinite; /* Safari */
	  animation: spin 2s linear infinite;
	}

	/* Safari */
	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
</style>
<!-- jQuery library -->
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<!-- Latest compiled JavaScript -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('css/customize/home.css') }}">
        <style>
            body{
                background-color : #f5f5f5;
            }
            .box{
                width:275px;
                height:200px;
                background:white;
            }
            .col{
                display:grid;
                grid-template-columns: 1fr 1fr;
            }
            .item1{
                display:grid;
                grid-column:1/2;
            }
            .item2{
                display:grid;
                grid-column:2/3;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-fixed-top transparent_navbar" style="background-color:white">
            <div class="container-fluid">
                <div class="row">
                    <div class="responsive_short">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle toggle-transparent" data-toggle="collapse" data-target="#navbar-full">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            @if (Auth::User()->role == 0)
                            <a class="navbar-brand" id="logo_black" href="{{ url('dashboard') }}"><img src="{{ url('imgs/logo_black.png') }}" class="black_logo"></a>
                            <a class="navbar-brand" id="logo_white" href="{{ url('dashboard') }}"><img src="{{ url('imgs/logo.png') }}" class="white_logo"></a>
                            @else
                            <a class="navbar-brand" id="logo_black" href="{{ url('offers') }}"><img src="{{ url('imgs/logo_black.png') }}" class="black_logo"></a>
                            <a class="navbar-brand" id="logo_white" href="{{ url('offers') }}"><img src="{{ url('imgs/logo.png') }}" class="white_logo"></a>
                            @endif
                        </div>
                        <div id="navbar-full" class="collapse full_white_icons" >
                            <ul class="nav-lists">
                                <li><a href="/offers"><img src="../imgs/location_black.png" class="header_icon nav_trip"><p class="header_text" style="color:black">Design your trip</p></a></li>
                                <li><a href="{{ url('gift-card') }}"><img src="../imgs/black_gift.png" class="header_icon nav_gift"><p class="header_text" style="color:black">Gift card</p></a></li>
                                <li><a href="{{ url('favourites_list') }}"><img src="../imgs/black_heart.png" class="header_icon nav_heart" ><p class="header_text" style="color:black">Favourites<span class="notification_short" style="display:none;"></span></p></a></li>
                                <li><a href="{{ url('write-to-us') }}"><img src="../imgs/black_help.png" class="nav_help header_icon" ><p class="header_text header_text_help" style="color:black">Help</p></a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="../imgs/black_user.png" class="nav_user header_icon" ><p class="header_text header_text_account" style="color:black">Account</p></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            @if(Auth::User()->profile_img != null)
                                            <img class="header_logo" src="{{Auth::User()->profile_img}}">{{ Auth::User()->username }}
                                            @else
                                            <img class="header_logo" src="//res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/c_fill,g_face,w_90,h_90/v1497970672/common/static/default-avatar">{{ Auth::User()->username }}
                                            @endif
                                        </li>
                                        <li @if(Request::segment(1) == 'profile') class="active" @endif><a href="{{ url('profile') }}">Profile</a></li>
                                        <li @if(Request::segment(1) == 'travel') class="active" @endif><a href="{{ url('travel') }}">Travel Companion</a></li>
                                        <li @if(Request::segment(1) == 'alerts') class="active" @endif><a href="{{ url('alerts') }}">Alerts</a></li>
                                        <li @if(Request::segment(1) == 'subscription') class="active" @endif><a href="{{ url('subscription') }}">Subscriptions</a></li>
                                        <li @if(Request::segment(1) == 'mail_gift_card') class="active" @endif><a href="{{ url('mail_gift_card') }}">Gift card</a></li>
                                        <li><a href="{{ url('logout') }}">Log out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="responsive_long">
                        <div class="col-md-3 col-xs-3 col-lg-3">
                            @if (Auth::User()->role == 0)
                            <a class="navbar-brand" id="logo_black" href="{{ url('dashboard') }}"><img src="{{ url('imgs/logo_black.png') }}" class="black_logo"></a>
                            <a class="navbar-brand" id="logo_white" href="{{ url('dashboard') }}"><img src="{{ url('imgs/logo_black.png') }}" class="white_logo"></a>                        
                            @else
                            <a class="navbar-brand" id="logo_black" href="{{ url('offers') }}"><img src="{{ url('imgs/logo_black.png') }}" class="black_logo"></a>
                            <a class="navbar-brand" id="logo_white" href="{{ url('offers') }}"><img src="{{ url('imgs/logo_black.png') }}" class="white_logo"></a>                        
                            @endif
                        </div>
                        <div class="col-md-9 col-xs-9 col-lg-9">
                            <div id="navbar" class="collapse navbar-collapse white_icons">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/offers"><img src="../imgs/location_black.png" class="design_header_icon nav_trip"><p class="header_text" style="color:black">Design your trip</p></a></li>
                                    <li><a href="{{ url('gift-card') }}"><img src="../imgs/black_gift.png" class="header_icon"><p class="header_text" style="color:black">Gift card</p></a></li>
                                    <li><a href="{{ url('favourites_list') }}"><img src="../imgs/black_heart.png" class="header_icon" ><p class="header_text" style="color:black">Favourites<span class="notification" style="display:none;"></span></p></a></li>
                                    <li><a href="{{ url('write-to-us') }}"><img src="../imgs/black_help.png" class="header_icon" ><p class="header_text header_text_help" style="color:black">Help</p></a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="../imgs/black_user.png" class="header_icon" ><p class="header_text header_text_account" style="color:black">Account</p></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if(Auth::User()->profile_img != null)
                                                <img class="header_logo" src="{{Auth::User()->profile_img}}">{{ Auth::User()->username }}
                                                @else
                                                <img class="header_logo" src="//res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/c_fill,g_face,w_90,h_90/v1497970672/common/static/default-avatar">{{ Auth::User()->username }}
                                                @endif
                                            </li>
                                            <li @if(Request::segment(1) == 'profile') class="active" @endif><a href="{{ url('profile') }}">Profile</a></li>
                                            <li @if(Request::segment(1) == 'travel') class="active" @endif><a href="{{ url('travel') }}">Travel Companion</a></li>
                                            <li @if(Request::segment(1) == 'alerts') class="active" @endif><a href="{{ url('alerts') }}">Alerts</a></li>
                                            <li @if(Request::segment(1) == 'subscription') class="active" @endif><a href="{{ url('subscription') }}">Subscriptions</a></li>
                                            <li @if(Request::segment(1) == 'mail_gift_card') class="active" @endif><a href="{{ url('mail_gift_card') }}">Gift card</a></li>
                                            <li><a href="{{ url('logout') }}">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse black_icons" style="display:none !important;">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/offers"><img src="../imgs/location_black.png" class="design_header_icon nav_trip"><p class="header_text" style="color:black">Design your trip</p></a></li>
                                    <li><a href="{{ url('gift-card') }}"><img src="../imgs/black_gift.png" class="header_icon"><p class="header_text" style="color:black">Gift card</p></a></li>
                                    <li><a href="{{ url('favourites_list') }}"><img src="../imgs/black_heart.png" class="header_icon" ><p class="header_text" style="color:black">Favourites<span class="notification" style="display:none;"></span></p></a></li>
                                    <li><a href="{{ url('write-to-us') }}"><img src="../imgs/black_help.png" class="header_icon" ><p class="header_text header_text_help" style="color:black">Help</p></a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="../imgs/black_user.png" class="header_icon" ><p class="header_text header_text_account" style="color:black">Account</p></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if(Auth::User()->profile_img != null)
                                                <img class="header_logo" src="{{Auth::User()->profile_img}}">{{ Auth::User()->username }}
                                                @else
                                                <img class="header_logo" src="//res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/c_fill,g_face,w_90,h_90/v1497970672/common/static/default-avatar">{{ Auth::User()->username }}
                                                @endif
                                            </li>
                                            <li @if(Request::segment(1) == 'profile') class="active" @endif><a href="{{ url('profile') }}">Profile</a></li>
                                            <li @if(Request::segment(1) == 'travel') class="active" @endif><a href="{{ url('travel') }}">Travel Companion</a></li>
                                            <li @if(Request::segment(1) == 'alerts') class="active" @endif><a href="{{ url('alerts') }}">Alerts</a></li>
                                            <li @if(Request::segment(1) == 'subscription') class="active" @endif><a href="{{ url('subscription') }}">Subscriptions</a></li>
                                            <li @if(Request::segment(1) == 'mail_gift_card') class="active" @endif><a href="{{ url('mail_gift_card') }}">Gift card</a></li>
                                            <li><a href="{{ url('logout') }}">Log out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div style="margin-top: 10%">
            <center><h1><b>Get Your Summer Started!</b></h1></center>
            <div class="col">
                <div class="box item1" style="margin-left:50%;margin-top:10%">
                    <button style="background-color:white;border:none;" onclick="window.location.href='/create_experience?id={{$id}}'">
                        <img src="images/box1.jpg" style="margin-top:10pt;width:100px;height:100px">
                        <center><h3 style="color:#fc3769"><b>Build your own trip<b></h3></center>
                        <center><h6>create your own route and we'll take<br>all the stress out of planning it.</h6></center>
                    </button>
                </div>
                <div class="box item2" style="margin-top:10%;margin-left:10%">
                    <button style="background-color:white;border:none;" onclick="window.location.href='#'">
                        <img src="images/box2.jpg" style="margin-top:10pt;width:100px;height:100px">
                        <center><h3 style="color:#fc3769"><b>Join a group<b></h3></center>
                        <center><h6>authentic travel in small groups with<br>an experienced Euroventure Tour<br>Leader</h6></center>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
