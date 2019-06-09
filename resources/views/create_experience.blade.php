@extends('layout')



@section('title','Insider Suite |  Create Experience')

@section('head')

	@parent



	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

	<link rel="stylesheet" type="text/css" href="{{ url('css/customize/create_experience.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('css/customize/create_experience_res.css') }}">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="{{ url('css/intlTelInput.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('css/jquery-gallery.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('css/pignose.calendar.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('css/skippr.css') }}">

	<style>
		#loading {
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			position: fixed;
			display: block;
			opacity: 0.7;
			background-color: #fff;
			z-index: 99;
			text-align: center;
		}
		#loading-image {
			position: absolute;
			top: 100px;
			left: 240px;
			z-index: 100;
		}
	</style>

@endsection

@section('content')

    <?php $current_date = date('Y-m-d');?>

    <?php $min_price = "";?>

	<input type="hidden" value="{{auth()->user()->currency}}" id="user-currency">

	<div id="site-content">

		<!--<div id="loading">-->
		<!--<img id="loading-image" src="imgs/ajax-loader.gif" alt="Loading..." />-->
		<!--</div>-->

		<div class="_66jk8g">

			<div class="_36rlri">

				<a class="_1pp5so" href="#">

					<img src="images/IS-black.png" style="height: 45px;"/>

				</a>

			</div>

			<div class="_36rlri">

				<div class="_141w4qb">

					<a href="/create_experience?id={{$offer->id}}" class="_1k01n3v1" aria-busy="false">Menu</a>

				</div>

			</div>

			<div class="_19m5nfy">

				<div class="_36rlri">

					<a href="/create_experience?id={{$offer->id}}" class="_1k01n3v1" aria-busy="false">Exit</a>

				</div>

			</div>

		</div>



		<div class="sidebar">

			<div class="sidebar-brand">

				<h3>Create experience</h3>

			</div>

			<ul class="free-list">

				<li><a id="general" class="active">General Information</a></li>

			</ul>

			<ul class="key-list">

				<li><a id="accomodation" class="disabled"><img src="imgs/icon-lock.png">Accommodation</a></li>

				<li><a id="experience" class="disabled"><img src="imgs/icon-lock.png">Activity</a></li>

				<li><a id="review" class="disabled" data-accoms="{{$accoms}}" data-acts="{{$activities}}" data-ac="{{$accom_images}}" data-at="{{$act_images}}" data-acprice="{{$prices_accom}}" data-atprice="{{$prices_act}}"><img src="imgs/icon-lock.png">Review & Submit</a></li>

				{{--<li><a id="review" class="" data-accoms="3" ><img src="imgs/icon-lock.png">Review & Submit</a></li>--}}

				<li><a id="payment" class="disabled"><img src="imgs/icon-lock.png">Checkout</a></li>

				<li style="display: none!important;"><a id="invite" class="disabled" data-accoms="{{$accoms}}" data-acts="{{$activities}}" data-ac="{{$accom_images}}" data-at="{{$act_images}}" data-acprice="{{$prices_accom}}" data-atprice="{{$prices_act}}"><img src="imgs/icon-lock.png">Invite friends</a></li>

				{{--<li style="display: none!important;"><a id="invite" class="disabled" data-accoms="" data-acts="" data-ac="" data-at="" data-acprice="" data-atprice=""><img src="imgs/icon-lock.png">Invite friends</a></li>--}}

			</ul>

		</div>



		<div class="experience-content" data-id="{{$exp_link_imgs}}" data-category="{{$exp_link_imgs_categories}}">



			<section id="general_info">

				<div class="header">

					<h2>It's time to create your experience in {{$offer->location_place}}</h2>

				</div>

				<div class="form-general" style="min-height: unset!important;">

					<form id="input_form">

						<div class="form-content hidden">

							<label>Which city would you like to visit:</label>

							<input type="text" class="form-control" id="city" value="{{$offer->location_place}}, {{$offer->location_country}}" disabled required>

						</div>

						<div class="form-content">

							<label>When do you expect to arrive:</label>

							<input type="text" class="form-control" id="arrival_date" @if($experience['arrival_date'] =='') placeholder="dd/mm/yyyy"@endif value="{{$experience['arrival_date']}}" required readonly="readonly">

						</div>

						<div class="form-content">

							<label>Number of guests:</label>

							<input type="text" id="guests" class="form-control" @if($experience['guests_nb'] =='') placeholder="E.g. 3 guests" @elseif ($experience['guests_nb'] ==1) value="{{$experience['guests_nb']}} guest" @else value="{{$experience['guests_nb']}} guests" @endif required readonly="readonly">

							<div class="guests_extend">

								<div class="hkJiNs"></div>

								<div style="position:relative;">

									<div class="dsssji">

										<div class="TPxij">

											<label class="ijjuLW">Adults</label>

											<span class="egudlU select_option" min="1" max="15">

										<button type="button" class="fndzHx" id="adults_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>

										<label for="adults"><input id="adults" name="adults" readonly="" tabindex="-1" value="1"></label>

										<button type="button" class="active fndzHx" id="adults_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>

										</div>

										<button type="button" class="iCflgr" id="guest_apply">Apply</button>

									</div>

								</div>

							</div>

						</div>

						<div class="form-content">

							<label>Give a name to your trip:</label>

							<input type="text" class="form-control" id="experience_title" @if($experience['exp_name'] =='') value="{{$offer->location_place}} trip" @endif value="{{$experience['exp_name']}}" required>

						</div>

						<div class="form-content">

							<input type="button" class="_d4g44p2" aria-busy="false" id="save_general" value="Save &amp; Continue">

							<input type="button" class="backbutton" aria-busy="false" id="back_general" value="Back">

						</div>

					</form>

					<img class="general-picture" src="imgs/general_information.jpg" alt="Create your experience">

				</div>

			</section>



			<div id="experience_content">

				<section id="accommodation_info">

				</section>



				<section id="experience_info">

				</section>

			</div>





			<section id="invite_info">

				<div class="invite_sent">

					<h2 class="heading">Congratulation!</h2>

					<p>We're almost there {{ Auth::User()->first_name }}!</p>

					<p>Check out your email and pack up your suitcase</p>

				</div>

				<div class="header">

					<h2>Invite your friends to join your trip.</h2>

				</div>

				<div class="form-general" style="min-height: unset!important;">

					<div class="form-content">

						<label>Invite by email</label>

						<input id="invite_email">

						<p>Enter email addresses seperated by commas.</p>

					</div>

					<div class="form-content">

						<label>Include a message(optional)</label><br>

						<textarea rows="3" name="content" id="invite_message" class="form-control"></textarea>

					</div>

					<div class="form-content">

						<button type="button" class="_d4g44p2" aria-busy="false" id="send_invite"><span class="_cgr7tc7">Send invites</span></button>

						<!--<input type="button" class="backbutton" aria-busy="false" id="back_invite" value="Back">-->

						<button type="button" class="_d4g44p1 undobutton" aria-busy="false" id="skip_invite"><span class="_cgr7tc7">Skip</span></button>

					</div>

				</div>

			</section>



			<section id="review_info">

				<h2>Your day to day itinerary</h2>

				<div class="space">

					<div class="review_form"></div>

					<div class="submit_form">

						<div class="form_border">

							<div class="header_form">
								<script type="text/javascript" src="{{ url('js/customize/create_experience_4_19_3.js') }}"></script>

								<h3>{{$offer->location_place}}&nbsp;-&nbsp;<span class="review_exp"></span></h3>

								<p class="review_nb_guests">@if($experience['guests_nb'] == 1) {{$experience['guests_nb']}} &nbsp;guest @else {{$experience['guests_nb']}} &nbsp;guests @endif</p>

								<p class="review_period"></p>

							</div>

							<div class="body_form">

								<h6><b>Your package</b></h6>

								<div class="body_money">

									<p><span class="custom_accoms_num">0</span>&nbsp;<span class="custom_accoms_num_text">Accommodation: </span> <span class="review_accom_ap">$AUD0</span><span class="review_accom_bp"></span></p>

									<p><span class="custom_acts_num">0</span>&nbsp; <span class="custom_acts_num_text">Activity: </span><span class="review_act_ap">$AUD0</span><span class="review_act_bp"></span></p>

								</div>

							</div>

							<div class="footer_form">

								<p>Booking fee: <span class="suite_fee_span" style="float: right; color: black;">$AUD0.00</span></p>

								<p><span id="title_total" >Total: </span><span class="new_price">0.00€</span><span class="old_price">0.00€</span></p>

								<button type="button" class="btn-submit" aria-busy="false" id="submit_trip"><span class="_cgr7tc7">Submit my trip</span></button>

								<p class="alert_text">Not cancellable, non-refundable</p>

							</div>

							<div class="form-content submit-mobile">

								<!-- <input type="button" class="backbutton" aria-busy="false" id="back_review" value="Back"> -->

								<i class="fa fa-angle-left back_icon" aria-busy="false" id="back_review" value="Back"></i>

							</div>

						</div>

					</div>

				</div>

			</section>



			<section id="payment_info">

				<div class="payment_detail">

					<form class="payment_form" id="payment-form" method="post" action="/experience-payment">

						{!! csrf_field() !!}

						<h2>Checkout</h2>

						<h3>Contact Information</h3>

						<div class="row">

							<div class="col-md-12">

								<radiogroup id="check_title">

									<label class="radio-inline">

										<input type="radio" name="title" value="Mr" @if(Auth::User()->title == 'Mr') {{ 'checked' }} @endif><span>Mr</span>

									</label>

									<label class="radio-inline">

										<input type="radio" name="title" value="Mr" @if(Auth::User()->title == 'Mrs') {{ 'checked' }} @endif><span>Mrs</span>

									</label>

									<label class="radio-inline">

										<input type="radio" name="title" value="Ms" @if(Auth::User()->title == 'Ms') {{ 'checked' }} @endif><span>Ms</span>

									</label>

								</radiogroup>

							</div>

						</div>

						<div class="row">

							<div class="col-md-6 col-sm-6 col-xs-12">

								<label for="last_name">Surname*</label>

								<input type="text" id="last_name" name="last_name" class="form-control" value="{{ Auth::User()->last_name }}" placeholder="Enter" required>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">

								<label for="first_name">First name*</label>

								<input type="text" id="first_name" name="first_name" class="form-control" value="{{ Auth::User()->first_name }}" placeholder="Enter" required>

							</div>

						</div>

						<div class="row">

							<div class="col-md-6 col-sm-6 col-xs-12">

								<label for="phone_number">Phone*</label>

								<input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ Auth::User()->phone_number }}" required>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">

								<label for="email">Email*</label>

								<input type="email" id="email" name="email" class="form-control" placeholder="Enter" value="{{ Auth::User()->email }}" required disabled>

							</div>

						</div>

						<div class="row">

							<div class="col-md-6 col-sm-6 col-xs-12">

								<label for="datepicker">Date of birth*</label>

                                <?php $y = Auth()->User()->year; $m = Auth()->User()->month; $d = Auth()->User()->day; $birth = $d."/".$m."/".$y;?>

								<input type="text" name="datepicker" id="datepicker" class="form-control" @if($birth=="//") placeholder="dd/mm/yyyy" @else value="{{$birth}}" @endif required>

							</div>

						</div>

						<div class="row margin">

							<div class="col-md-9 col-sm-6 col-xs-12">

								<label for="promo_code">Promo code or gift card</label>

								<input class="form-control" id="promo_code" name="promo_code" type="text" value="" placeholder="ABCD1234">

							</div>

							<div class="col-md-3 col-sm-6 col-xs-12">

								<p id="promo_apply" style="text-align: center;">Apply</p>

							</div>

						</div>

						<div class="row margin">

							<div class="col-md-12 col-sm-12 col-xs-12">

								<label for="card-element">Credit or debit card</label>

								<div id="card-element"></div>

								<div id="card-errors" role="alert"></div>

							</div>

						</div>

						<div class="row margin">

							<div class="col-md-12 col-sm-12 col-xs-12">

								<h3>Additional Info</h3>

								<label for="additional_info">What is the reason for your InsiderSuite?</label><br>

								<textarea class="form-control" id="additional_info" name="additional_info" rows="5" placeholder="promised, we will keep this for us."></textarea>

								<label class="checkbox-inline"><input type="checkbox" name="agree" id="agree" required>I have read and accept the <a href="https://www.insidersuite.com/legal-terms" target="_blank">Terms and Conditions</a> of InsiderSuite</label>

								<input type="hidden" name="voucher_nb" id="voucher_nb" value="nothing">

								<input type="hidden" name="accom_count" id="accom_count" value="accom_count">

								<input type="hidden" name="act_count" id="act_count" value="act_count">

								<input type="hidden" name="exp_id" id="exp_id" value="{{$experience['id']}}">

								<input type="hidden" name="email_content" id="email_content" value="">

							</div>

						</div>

						<div class="row margin">

							<div class="col-md-6 col-sm-6 col-xs-6">

								<p  class="payment_price"><b>Total 0€</b></p>

							</div>

							<div class="col-md-6 col-sm-6 col-xs-6">

								<button id="pay">Submit Payment</button>

							</div>

						</div>

					</form>

				</div>

				<div class="form-content submit-mobile">

					<!-- <input type="button" class="backbutton" aria-busy="false" id="back_payment" value="Back"> -->

					<i class="fa fa-angle-left back_icon" aria-busy="false" id="back_payment" value="Back"></i>

				</div>

				<div class="payment_inside">

					<div class="form_border">

						<div class="header_form">

							<h3>{{$offer->location_place}}-<span class="review_exp"></span></h3>

							<p class="review_nb_guests">{{$experience['guests_nb']}} &nbsp;guests</p>

							<p class="review_period"></p>

						</div>

						<div class="body_form">

							<h6><b>Your package</b></h6>

							<div class="body_money">

								<p>Accommodation: <span class="review_accom_ap"></span><span class="review_accom_bp"></span></p>

								<p>Activity: <span class="review_act_ap"></span><span class="review_act_bp"></span></p>

								<p class="voucher_discount">Voucher discount: <span class="promotion_discount"></span></p>

							</div>

						</div>

						<div class="footer_form">

							<p>Insider Suite fee: <span class="suite_fee_span" style="float: right; color: black;">$AUD3.90</span></p>

							<p><span id="title_total" >Total: </span><span class="new_price">0€</span><span class="old_price">0€</span></p>

							<p class="alert_text">Not cancellable, non-refundable</p>

							<div class="methods">

								<p>Your payment is secure</p>

								<div class="advertise_imgs">

									<div class="visa"><img src="imgs/visa_master.jpg"/></div>

									<div class="nortorn"><img src="imgs/nortorn_https.png"/></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</section>



		</div>



		<div class="progress_bar"></div>



	</div>

@endsection



@section ('scripts')


	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script type="text/javascript" src="{{ url('js/utils.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/data.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/intlTelInput.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/jquery-gallery.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/moment.min.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/pignose.calendar.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/skippr.js') }}"></script>

	<script type="text/javascript" src="{{ url('js/magicsuggest-min.js') }}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

	<script>
        $(window).load(function() {
            $('#loading').hide();
        });
        if ("{{$experience}}" == null) {
            var exp_id = 0;
        } else {
            var exp_id = "{{$experience['id']}}";
        }
        var count_a = "{{$count_a}}";
        var count_c = "{{$count_c}}";
        var type = "{{$type}}";
        var _flags = "{{$_flags}}";
        var f_count = "{{$f_count}}";
        var custom_city_id = '<?php echo $_GET['id']; ?>';
	</script>

	<script type="text/javascript" src="{{ url('js/customize/create_experience_4_19_3.js') }}"></script>

	<script src="https://js.stripe.com/v3/"></script>

	<script>
		fetch('https://api.exchangeratesapi.io/latest?base=AUD')
		.then((resp) => resp.json())
		.then((data) => {
			let rate = data.rates.{{auth()->user()->currency}}
			localStorage.setItem('currency_rate', rate)
		})
	</script>

	<script>
        $('.slide-like').click(function () {var id = $(this).attr('id'); if (id < 100) removeSelection(id, 'accoms'); else removeSelection(id, 'acts');});
        $('.gallery-slideshow').slideshow({
            width: 280,
            height: 210,
            interval: 1000000
        });
        $('.selected-slideshow').slideshow({
            width: 187,
            height: 140,
            interval: 1000000
        });
        $('.theTarget').slideshow({
            interval: 8000,
            width: 351,
            height: 400
        });
		<?php
			$stripeKeys = \Config::get('services.stripe');
		?>
		var stripe = Stripe('<?php echo $stripeKeys['key']; ?>');
		//var stripe = Stripe('pk_live_w9jFXus57o0XyM73UBOQXsnA');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {style: style});
        card.mount("#card-element");
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            var hiddenInput1 = document.createElement('input');
            hiddenInput1.setAttribute('type', 'hidden');
            hiddenInput1.setAttribute('name', 'amount');
            var old_price = $(".payment_price").html();
            // var str = old_price.split("Total: $AUD");
            hiddenInput1.setAttribute('value', old_price.replace(/\D/g, ''));
            form.appendChild(hiddenInput1);
            var hiddenInput2 = document.createElement('input');
            hiddenInput2.setAttribute('type', 'hidden');
            hiddenInput2.setAttribute('name', 'email');
            hiddenInput2.setAttribute('value', $("#email").val());
            form.appendChild(hiddenInput2);
            // Submit the form
            form.submit();
        }
        if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod')
        {
            $(".response_add_trip_btn").css("position", "static");
            $(".setting-content").css("margin-bottom", "0px");
        }
	</script>

@endsection
