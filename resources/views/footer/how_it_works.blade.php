@extends('layout')
@section('head')
@parent
<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);</style>
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/about.css') }}">
@endsection
@section('title','Insider Suite |  How it works')

@section('content')
<div id="site-content">
    <img class="our-story-banner1" src="{{ url('imgs/how_it_works.jpg') }}">
	<div class="container">
		<div id="shopify-section-1532006133324" class="shopify-section">
			<div class="hm-splash-page--benefits" id="jointhetribe">
				<h3>It's the best-kept travel secret...
</h3>
				<div class="hm-splash-page--benefit-container">
					<div class="hm-splash-page--benefit-item">
						<img src="../imgs/benefit-3_pink.png" alt="">
                           <h4>Be quick! First-come, first-served</h4>
                           <p>Our offers are <b>limited edition</b>, so <b>be quick</b> to enjoy <b>exclusive rates.</b></p>
					</div>		
					<div class="hm-splash-page--benefit-item">				
						<img src="../imgs/benefit-2_pink.png" alt="">
                           <h4>Customise your Holiday</h4>
                           <p><b>A complete day-by-day itinerary</b> based on your <b>personal interests</b> and <b>preferences</b>.</p>
					</div>		
					<div class="hm-splash-page--benefit-item">				
						<img src="../imgs/benefit-1_pink.png" alt="" style="height: 197px;margin-bottom: 31px;">
                           <h4>Your opinion is important</h4>
                           <p>Help us to shape Insider Suite future by <b>voting for new destinations</b> and <b> activities</b>.</p>
					</div>
				</div>
			</div>
		</div>		
		<div class="_1x0jb4k">
			<div class="_1hcsc9i" style="margin-bottom: 24px;">
				<h1 class="_177p5wr" style="text-align:left"><span>The Much Better 'Why'</span></h1>
			</div>
			<div class="_2h22gn">
				<div class="_ns9mjq2">
					<div style="margin-bottom: 24px; margin-right: 8px;">
						<div class="custom_div">
							<div class="_qufr4s">
								<img src="../imgs/why_1.png" class="_1k5k1h2" role="presentation" aria-hidden="true" focusable="false">
							</div>
							<h2 class="_y93c7s">A service of confidence</h2>
						</div>
						<div class="_1qtdxdb">
							<div class="_ncwphzu">
                                   <span>Our Customer Service provides extraordinary everyday care by supporting you during each step of your holiday planning!
                                   </span>
							</div>
						</div>
					</div>
				</div>
				<div class="_ns9mjq2">
					<div style="margin-bottom: 24px; margin-right: 8px;">
						<div class="custom_div">
							<div class="_qufr4s">
								<img src="../imgs/why_2.png" class="_1k5k1h2" role="presentation" aria-hidden="true" focusable="false">
							</div>
							<h2 class="_y93c7s">Oustanding style</h2>
						</div>
						<div class="_1qtdxdb">
							<div class="_ncwphzu">
                                   <span>We are always on the lookout for outstanding places to enrich our collection. Be ready for limitless possibilities!
                                </span>
							</div>
						</div>
					</div>
				</div>
				<div class="_ns9mjq2">
					<div style="margin-bottom: 24px; margin-right: 8px;">
						<div class="custom_div">
							<div class="_qufr4s">
								<img src="../imgs/why_3.png" class="_1k5k1h2" role="presentation" aria-hidden="true" focusable="false">
							</div>
							<h2 class="_y93c7s">Travel freely</h2>
						</div>
						<div class="_1qtdxdb">
							<div class="_ncwphzu">
                                   <span>Pre-arrange your whole holiday experience - from your own personal driver to the activities and much more! You can leave your wallet at home.
                                   </span>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<div class="section_sub">
			<h1>Design your next trip</h1>
			<a href="@if(Auth::User()) {{ url('offers') }} @else href="#" data-toggle="modal" data-target="#authentication" @endif" class="btn btn-subscribe">Access the offers</a>
		</div>
	</div>
</div>
@endsection
