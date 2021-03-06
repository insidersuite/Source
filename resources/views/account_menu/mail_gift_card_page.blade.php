@extends('layout')

@section('title','Insider Suite |  Mail Gift Card')

@section('head')
	@parent
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="{{ url('css/customize/gift_card.css') }}">
@endsection

@section('content')
	<div id="site-content">
		<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
			<div class="row">
				<div class="col-md-12 col-sm-12">				
					<h3 class="page-main-title">Gift Card</h3><br>
					<h3 style="font-style: italic;">Probably the most beautiful email you will send this year.</h3><br>
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<ul id="gift-cards">
								<li class="blue-card" style="display: block;"><img src="{{ url('imgs/blue-card.png') }}" class="img-responsive"></li>
								<li class="pink-card" style="display: none;"><img src="{{ url('imgs/pink-card.png') }}" class="img-responsive"></li>
								<li class="white-card" style="display: none;"><img src="{{ url('imgs/white-card.png') }}" class="img-responsive"></li>
							</ul>
						</div>
						<div class="col-md-9 col-sm-9">
							<div class="form-section" style="padding: 0px 0px 30px 0px;">
								<p style="font-size: 24px;font-weight: bolder;">Choose a design</p><br>
								<div class="sui-row GiftCardDesignPicker__DesignPickerRow-s1ald1iv-2 jZvIxs sc-chPdSV isksGx" gutter="10">
									<div class="sui-col sui-col-xs-12 sui-col-md-3 sc-EHOje btgdIN">
										<div id="blue" class="jek6oy-0-BorderedInputWrapper-jOgKav jbHdQk" type="button" disabled="">
											<div style="display:flex;">
												<div class="GiftCardDesignPicker__ColorBlock-s1ald1iv-0 fhrYHE" color="giftCardBlue"></div>
												<div style="font-weight:500;margin:0;font-size: 18px;">Blue</div>
											</div>
											<svg id="blue_check" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
									<div class="sui-col sui-col-xs-12 sui-col-md-3 sc-EHOje btgdIN">
										<div id="pink" class="jek6oy-0-BorderedInputWrapper-jOgKav fGCWzl" type="button">
											<div style="display:flex">
												<div class="GiftCardDesignPicker__ColorBlock-s1ald1iv-0 ifvAxF" color="primary"></div>
												<div style="font-weight:500;margin:0;font-size: 18px;">Pink</div>
											</div>
											<svg id="pink_check" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC" style="display:none;"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
									<div class="sui-col sui-col-xs-12 sui-col-md-3 sc-EHOje btgdIN">
										<div id="white" class="jek6oy-0-BorderedInputWrapper-jOgKav fGCWzl"  type="button">
											<div style="display:flex">
												<div class="GiftCardDesignPicker__ColorBlock-s1ald1iv-0 bcxXEz" color="white"></div>
												<div style="font-weight:500;margin:0;font-size: 18px;">White</div>
											</div>
											<svg id="white_check" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC" style="display:none;"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
								</div>
								<hr class="s1jjl8nz-0-Divider-hdPlfo gPzZwx" spacing="0">
								<p style="font-size: 24px;font-weight: bolder;">Select the Gift Level</p><br>
								<div class="sui-row sc-chPdSV isksGx" gutter="10">
									<div class="sui-col sui-col-xs-6 sui-col-md-3 GiftCardKiffLevel__KiffLevelCol-s108u2es-1 gOAuYo sc-EHOje btgdIN">
										<div id="serene_kiff" class="jek6oy-0-BorderedInputWrapper-eKTLaI dVdEvt" type="button">
											<div>
												<div id="serene_kiff_text" class="GiftCardKiffLevel__KiffDescription-s108u2es-0 cVhRmt" style="font-size: 13px;">Serene Vibe</div>
												<div style="font-weight:500;margin:0;font-size: 18px;">50$</div>
											</div>
											<svg id="card-50-value" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
									<div class="sui-col sui-col-xs-6 sui-col-md-3 GiftCardKiffLevel__KiffLevelCol-s108u2es-1 gOAuYo sc-EHOje btgdIN">
										<div id="serious_kiff" class="jek6oy-0-BorderedInputWrapper-eKTLaI dVdEvt" type="button">
											<div>
												<div id="serious_kiff_text" class="GiftCardKiffLevel__KiffDescription-s108u2es-0 cVhRmt" style="font-size: 13px;">Serious Vibe</div>
												<div style="font-weight:500;margin:0;font-size: 18px;">100$</div>
											</div>
											<svg id="card-100-value" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
									<div class="sui-col sui-col-xs-6 sui-col-md-3 GiftCardKiffLevel__KiffLevelCol-s108u2es-1 gOAuYo sc-EHOje btgdIN">
										<div id="solid_kiff" class="jek6oy-0-BorderedInputWrapper-eKTLaI dVdEvt" type="button">
											<div>
												<div id="solid_kiff_text" class="GiftCardKiffLevel__KiffDescription-s108u2es-0 cVhRmt" style="font-size: 13px;">Solid Vibe</div>
												<div style="font-weight:500;margin:0;font-size: 18px;">200$</div>
											</div>
											<svg id="card-200-value" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
									<div class="sui-col sui-col-xs-6 sui-col-md-3 GiftCardKiffLevel__KiffLevelCol-s108u2es-1 gOAuYo sc-EHOje btgdIN">
										<div id="kiff_yolo" class="jek6oy-0-BorderedInputWrapper-eKTLaI dVdEvt" type="button">
											<div>
												<div id="kiff_yolo_text" class="GiftCardKiffLevel__KiffDescription-s108u2es-0 cVhRmt" style="font-size: 13px;">Yolo Vibe</div>
												<div style="font-weight:500;margin:0;font-size: 18px;">500$</div>
											</div>
											<svg id="card-500-value" viewBox="0 0 24 24" width="16" height="16" class="GiftCardDesignPicker__CheckedColorSelector-s1ald1iv-1 hYlGKC"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
										</div>
									</div>
								</div>
								<hr class="s1jjl8nz-0-Divider-hdPlfo gPzZwx" spacing="0">
								<div class="s4xyhxd-0-BaseTitle-cdEphK goBYvE">Personalize your card</div>
							</div>
							<form id="payment_profile" action="api/gift-payment" method="post">
								<div>
									<div class="row">
										<div class="col-md-4">
											<div class="form_input">
												<label>Sender Name</label>
												<input type="text" name="sender_name" class="form-control" id="sender_name" placeholder="Enter your name" required>
											</div>
											<div class="form_input">
												<label>Beneficiary Name</label>
												<input type="text" name="beneficiary_name" class="form-control" id="beneficiary_name" placeholder="Enter the recipient name" required>
											</div>
											<div class="form_input">
												<label for="beneficiary">Beneficiary Email</label>
												<input type="email" name="beneficiary_email" class="form-control" id="beneficiary_email" placeholder="Enter the recipient email" required>
											</div>
										</div>
										<div class="col-md-8">
											<label for="description">Add a message to my gift</label>
											<textarea rows="5" id="message" class="form-control"></textarea>
										</div>
									</div>
									<br>
									<input type="hidden" name="price" id="amount" value="50">
									<input type="hidden" name="design_id" id="design_id">
									<hr>
									<h4 id="total_amount">Total Amount: $0</h4>
									<input type="submit" id="place_order" value="Order" class="sui-button sui-button-primary GiftCardLayout__SubmitGiftCard-s185zsgc-5 ihKlVZ sc-eNQAEJ hMCHmi">
								</div>
							</form>
							<form action="{{ url('/gift-payment') }}" method="get" id="payment-form" hidden>
								<div class="form-row">
									<label for="card-element">
									Credit or debit card
									</label>
									<div id="card-element">
									<!-- A Stripe Element will be inserted here. -->
									</div>

									<!-- Used to display form errors. -->
									<div id="card-errors" role="alert"></div>
								</div>

								<button type="submit">Submit Payment</button>
							</form>
						</div>
					</div>
					<br><br>
					<div class="GiftCardLayout__KeyPoints-s185zsgc-6 bleKwW">
						<div class="s4d32pm-0-Wrapper-jJBJoJ hqCIus">
							<div class="GiftCardKeyPoints__KeyPoint-s3ak8lw-0 dGLFjM">
								<svg viewBox="0 0 24 24" width="1em" height="1em" class="GiftCardKeyPoints__CheckIcon-s3ak8lw-1 kRjisP"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
								<div>Valid 12 months from the date of purchase</div>
							</div>
							<div class="GiftCardKeyPoints__KeyPoint-s3ak8lw-0 dGLFjM">
								<svg viewBox="0 0 24 24" width="1em" height="1em" class="GiftCardKeyPoints__CheckIcon-s3ak8lw-1 kRjisP"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
								<div>To be used on all offers</div>
							</div>
							<div class="GiftCardKeyPoints__KeyPoint-s3ak8lw-0 dGLFjM">
								<svg viewBox="0 0 24 24" width="1em" height="1em" class="GiftCardKeyPoints__CheckIcon-s3ak8lw-1 kRjisP"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="12" cy="12" r="12"></circle><path d="M11.267 17.21L6.62 13.484c-.433-.346-.52-1.002-.196-1.464.324-.46.937-.556 1.37-.209l3.182 2.55 5.275-6.576a.938.938 0 0 1 1.38-.113c.412.375.46 1.036.107 1.474l-6.47 8.062z" fill="#FFF"></path></g></svg>
								<div>Available now</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('foot')
	@parent
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script>
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
			hiddenInput1.setAttribute('value', $("#amount").val());
			form.appendChild(hiddenInput1);			
			var hiddenInput2 = document.createElement('input');
			hiddenInput2.setAttribute('type', 'hidden');
			hiddenInput2.setAttribute('name', 'design_id');
			hiddenInput2.setAttribute('value', $("#design_id").val());
			form.appendChild(hiddenInput2);
			var hiddenInput3 = document.createElement('input');
			hiddenInput3.setAttribute('type', 'hidden');
			hiddenInput3.setAttribute('name', 'sender_name');
			hiddenInput3.setAttribute('value', $("#sender_name").val());
			form.appendChild(hiddenInput3);
			var hiddenInput4 = document.createElement('input');
			hiddenInput4.setAttribute('type', 'hidden');
			hiddenInput4.setAttribute('name', 'beneficiary_name');
			hiddenInput4.setAttribute('value', $("#beneficiary_name").val());
			form.appendChild(hiddenInput4);
			var hiddenInput5 = document.createElement('input');
			hiddenInput5.setAttribute('type', 'hidden');
			hiddenInput5.setAttribute('name', 'beneficiary_email');
			hiddenInput5.setAttribute('value', $("#beneficiary_email").val());
			form.appendChild(hiddenInput5);
			var hiddenInput6 = document.createElement('input');
			hiddenInput6.setAttribute('type', 'hidden');
			hiddenInput6.setAttribute('name', 'little_word');
			hiddenInput6.setAttribute('value', $("#message").val());
			form.appendChild(hiddenInput6);
			// Submit the form
			form.submit();
		}
	</script>
	<script type="text/javascript" src="{{ url('js/customize/gift.js') }}"></script>
@endsection
