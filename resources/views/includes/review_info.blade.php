<h2>Your day to day itinerary</h2>

<div class="space">

	<div class="review_form"></div>

	<div class="submit_form">

		<div class="form_border">

			<div class="header_form">

				<h3>{{$offer->location_place}}&nbsp;-&nbsp;<span class="review_exp">Name of trip</span></h3>

				<p class="review_nb_guests">@if($experience['guests_nb'] == 1) {{$experience['guests_nb']}} &nbsp;guest @else {{$experience['guests_nb']}} &nbsp;guests @endif</p>

				<p class="review_period">Sun. 30 september, 16th - Mon. 1 october, 12th</p>

			</div>

			<div class="body_form">

				<h6><b>Your package</b></h6>

				<div class="body_money">

					<p><span class="custom_accoms_num"></span>&nbsp;<span class="custom_accoms_num_text">Accommodation: </span> <span class="review_accom_ap"></span><span class="review_accom_bp"></span></p>

					<p><span class="custom_acts_num"></span>&nbsp; <span class="custom_acts_num_text">Activity: </span><span class="review_act_ap"></span><span class="review_act_bp"></span></p>

				</div>

			</div>

			<div class="footer_form">

				<p>Booking fee: <span class="suite_fee_span" style="float: right; color: black;">$AUD3.90</span></p>

				<p><span id="title_total" >Total: </span><span class="new_price">200,90€</span><span class="old_price">277,90€</span></p>

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