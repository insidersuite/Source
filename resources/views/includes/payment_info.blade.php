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

			<h3>{{$offer->location_place}}-<span class="review_exp">Name of trip</span></h3>

			<p class="review_nb_guests">{{$experience['guests_nb']}} &nbsp;guests</p>

			<p class="review_period">Sun. 30 september, 16th - Mon. 1 october, 12th</p>

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