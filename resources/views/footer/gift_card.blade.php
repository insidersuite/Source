@extends('layout')

@section('title','Insider Suite |  GiftCard')
@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/simple_gift.css') }}">
@endsection
@section('content')
	<div id="site-content">
		<div class="gift_page">
			<div class="col-md-12 col-xs-12">
				<img class="our-story-banner" src="{{ url('imgs/gift_card_banner1.jpg') }}">
			</div>
			<h4 class="banner-heading heading-font-style">Give your loved ones an unforgettable ticket to discover their worlds</h4>
			
			<h4 class="occasion-text para-font-style" style="color: white !important;">The gift card that always works</h4>
		</div>
		<div class="gift_page">
			<div class="container" style="text-align: center;">
				<div class="gift_page">
					<div class="col-md-6 col-xs-12">
						<h1 class="gift_title">Easy to give <br> Fun to receive</h1>
						<p ><ul>
					            <li style="text-align: left;">Create the gift card by choosing the amount and adding a personalised message.</li>
					            <li style="text-align: left;">Your beloved will be able to use the gift card as a payment method when booking a trip.</li>
					            <li style="text-align: left;">Valid on all our offers.</li>
								<li style="text-align: left;">Can be redeemed within 12 months from the date of purchase.</li>
					        </ul></p>
						<a href="{{ url('mail_gift_card') }}" class="btn btn-mail-gift">Create the gift card</a>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="giftCardPicture GiftCardCard__GiftCardPicture-s1roh816-3 bylcQc"></div>
					</div>
				</div>
				<div class="gift_page">
					<div class="GiftCard__FeedbacksWrapper-nrsuvj-8 iMbfUf">
						<div class="s4xyhxd-0-BaseTitle-fPbdYi geSRhb">The gift that works every time</div>
						<div class="GiftCard__GiftCardFeedbacksSlider-nrsuvj-10 cDIIyG">
							<div class="Wrapper-s4d32pm-0 jhAoWd">
								<div class="FeedbacksSlider__FeedbacksWrapper-s1vcsq3l-5 hGboIR">
									<div class="feedbacks-quotes FeedbacksSlider__Quotes-s1vcsq3l-4 eKgvGv">“</div>
									<ul class="rslides">
										<li>
											<div aria-hidden="true" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto; display: flex; flex-direction: column; justify-content: space-between;">
												<div class="FeedbacksSlider__FeedbackEvent-s1vcsq3l-6 iPmhZV">Perfect for <span class="FeedbacksSlider__Event-s1vcsq3l-7 gNldto">a birthday</span></div>
												<div class="v7j7y7-0-Paragraph-cbzGIL iuGtqq" color="white">« It was unforgettable trip for my sister’s 30th birthday. I couldn’t find better way to surprise her. »</div>
												<div class="FeedbacksSlider__FeedbackAuthorBlock-s1vcsq3l-1 dMMFtK">
													<div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white" style="font-weight: 500;">John R.</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div aria-hidden="true" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto; display: flex; flex-direction: column; justify-content: space-between;">
												<div class="FeedbacksSlider__FeedbackEvent-s1vcsq3l-6 iPmhZV">Perfect for <span class="FeedbacksSlider__Event-s1vcsq3l-7 gNldto">a wedding gift</span></div>
												<div class="v7j7y7-0-Paragraph-cbzGIL iuGtqq" color="white">« We really enjoyed our  wedding trip. It was a truly magic escape! »</div>
												<div class="FeedbacksSlider__FeedbackAuthorBlock-s1vcsq3l-1 dMMFtK">
													<div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white" style="font-weight: 500;">Kim & Tom.</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div aria-hidden="true" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto; display: flex; flex-direction: column; justify-content: space-between;">
												<div class="FeedbacksSlider__FeedbackEvent-s1vcsq3l-6 iPmhZV">Perfect for <span class="FeedbacksSlider__Event-s1vcsq3l-7 gNldto">a baby moon</span></div>
												<div class="v7j7y7-0-Paragraph-cbzGIL iuGtqq" color="white">« Relaxing and romantic getaway after our first new born. Thank you, Insider Suite, for making out trip unforgettable!!!»</div>
												<div class="FeedbacksSlider__FeedbackAuthorBlock-s1vcsq3l-1 dMMFtK">
													<div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white" style="font-weight: 500;">Sam & James</div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white"></div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div aria-hidden="false" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto; display: flex; flex-direction: column; justify-content: space-between;">
												<div class="FeedbacksSlider__FeedbackEvent-s1vcsq3l-6 iPmhZV">Perfect for <span class="FeedbacksSlider__Event-s1vcsq3l-7 gNldto">the best mother-daughter weekend!</span></div>
												<div class="v7j7y7-0-Paragraph-cbzGIL iuGtqq" color="white">« Had truly wonderful time enjoying beautiful moments by the pool! Felt amazing after the spa day. »</div>
												<div class="FeedbacksSlider__FeedbackAuthorBlock-s1vcsq3l-1 dMMFtK">
													<div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white" style="font-weight: 500;">Kathia Z.</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div aria-hidden="true" data-swipeable="true" style="width: 100%; flex-shrink: 0; overflow: auto; display: flex; flex-direction: column; justify-content: space-between;">
												<div class="FeedbacksSlider__FeedbackEvent-s1vcsq3l-6 iPmhZV">Perfect for <span class="FeedbacksSlider__Event-s1vcsq3l-7 gNldto">a baby moon</span></div>
												<div class="v7j7y7-0-Paragraph-cbzGIL iuGtqq" color="white">« First weekend in love for young parents who have not had a moment together since the arrival of their little baby! »</div>
												<div class="FeedbacksSlider__FeedbackAuthorBlock-s1vcsq3l-1 dMMFtK">
													<div>
														<div class="Paragraph-v7j7y7-0 korWbn" color="white" style="font-weight: 500;">Kelly D.</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
									<div class="FeedbacksSlider__FeedbackSwipeables-s1vcsq3l-3 hcNjYu">
										<div style="overflow-x: hidden;">
											<div class="react-swipeable-view-container" style="flex-direction: row; transition: transform 0.35s cubic-bezier(0.15, 0.3, 0.25, 1) 0s; direction: ltr; display: flex; will-change: transform; transform: translate(-300%, 0px);">							
											</div>
										</div>										
									</div>
								</div>
							</div>
						</div>
						<div class="GiftCard__FeedbacksImage-nrsuvj-9 eUnazV"></div>
					</div>	
				</div>
				<div class="gift_page">
					<div class="subsection">
						<h1>Design your next trip</h1>
						<a href="@if(Auth::User()) {{ url('offers') }} @else {{ url('/') }} @endif" class="btn btn-subscribe">Access the offers</a>
					</div>
				</div>
			</div>			
		</div>
	</div>
@endsection
@section('foot')
	@parent
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="{{ url('js/responsiveslides.min.js') }}"></script>
	<script>
		$(function() {
			$(".rslides").responsiveSlides();
			if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod')
			{
	         	$(".eUnazV").css("margin-top", "900px");
	         	$(".cDIIyG").css("margin-top", "120px");
			}
		});
	</script>
@endsection
