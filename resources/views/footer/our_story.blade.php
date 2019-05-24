@extends('layout')

@section('title','Insider Suite | Our story')
@section('content')

@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/our_story.css') }}">
@endsection

<div id="site-content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="normal-section" src="../imgs/Our_story_2.jpg" alt="">
			</div>
			<div class="col-md-6">
				<div class="normal-section">
					<b><h1 class="_tpbrp">How we got started</h1></b><br>
					<p>Insider Suite’s story was created to tackle a challenging dilemma: What if the indulgence of unforgettable holiday travel could be attainable for all? How amazing it would be if you could have more freedom while planning your escape?</p>
					<p>Organising your very best holiday plan can be challenging. That’s why our goal is to curate exclusive offers while providing a new way to travel - free, authentic and "unboring"!</p>
					<p>We believe that travelling leaves you speechless, then turns you into a storyteller.  It’s time to start writing your own story and get lost in secret destinations! Exploring the World is the best way to refresh the mind and body while creating  everlasting memories. Join Insider Suite to start your adventure story from extraordinary spots and phenomenal activities!</p>
					<p>All journeys have secret destinations of which Insider Suite is aware of…</p>
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-md-6" >
				<div class="normal-section">
					<b><h1 class="_tpbrp">We are Insider Suite</h1></b><br>
					<p>We believe that to travel is to live. We are here to empower your creativity allowing you to redefine your travelling experience.</p>
					<p>Our travel experts seek out the best spots around the world, sharing our insider tips and secrets to guarantee a unique experience. Insider Suite provides exclusive offers to get the best possible deals.  Enjoy charismatic accommodations and unforgettable activities that will make your heart beat faster with discounts of up to 80%.The entire Insider Suite team is engaged to make your trip a bespoke and unforgettable affair!</p>
					<p>Join us now to start your journey and explore the most delightful locations in the simplest of ways!</p>
				</div>
			</div>
			<div class="col-md-6">
				<img class="normal-section" src="../imgs/Our_story_1.jpg" alt="">
			</div>
		</div>
		
		<div class="section_sub">
			<h1>Design your next trip</h1>
			<a href="@if(Auth::User()) {{ url('offers') }} @else href="#" data-toggle="modal" data-target="#authentication" @endif" class="btn btn-subscribe">Access the offers</a>
		</div>
	</div>
</div>


@endsection
