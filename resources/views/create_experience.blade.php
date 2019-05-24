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
@endsection

@php
	$stripeKeys = \Config::get('services.stripe');
	$current_date = date('Y-m-d');
	$min_price = "";
@endphp

@section('content')
	{{-- site-content --}}
	<div id="site-content">

		{{-- <div id="loading">
			<img id="loading-image" src="imgs/ajax-loader.gif" alt="Loading..." />
		</div> --}}

		{{-- _66jk8g --}}
		<div class="_66jk8g">

			{{-- _36rlri --}}
			<div class="_36rlri">
				<a class="_1pp5so" href="#">
					<img src="images/IS-black.png" style="height: 45px;" >
				</a>
			</div>
			{{-- ./ _36rlri --}}

			{{-- _36rlri --}}
			<div class="_36rlri">
				{{-- _141w4qb --}}
				<div class="_141w4qb">
					<a href="/create_experience?id={{ $offer->id }}" class="_1k01n3v1" aria-busy="false">Menu</a>
				</div>
				{{-- ./ _141w4qb --}}
			</div>
			{{-- ./ _36rlri --}}

			{{-- _19m5nfy --}}
			<div class="_19m5nfy">
				{{-- _36rlri --}}
				<div class="_36rlri">
					<a
						href="/create_experience?id={{$offer->id}}"
						class="_1k01n3v1"
						aria-busy="false">
						Exit
					</a>
				</div>
				{{-- ./ _36rlri --}}
			</div>
			{{-- ./ _19m5nfy --}}

		</div>
		{{-- ./ _66jk8g --}}

		{{-- sidebar --}}
			@include('includes.client_sidebar')
		{{-- ./ sidebar --}}

		{{-- experience-content --}}
		<div
			class="experience-content"
			data-id="{{ $exp_link_imgs }}"
			data-category="{{ $exp_link_imgs_categories }}">

			{{-- general_info --}}
			<section id="general_info">
				@include('includes.general_info')
			</section>
			{{-- ./ general_info --}}

			{{-- experience_content --}}
			<div id="experience_content">
				<section id="accommodation_info"></section>
				<section id="experience_info"></section>
			</div>
			{{-- ./ experience_content --}}

			{{-- invite_info --}}
			<section id="invite_info">
				@include('includes.invite_info')
			</section>
			{{-- ./ invite_info --}}

			{{-- review_info --}}
			<section id="review_info">
				@include('includes.review_info')
			</section>
			{{-- ./ review_info --}}

			{{-- payment_info --}}
			<section id="payment_info">
				@include('includes.payment_info')
			</section>
			{{-- ./ payment_info --}}

		</div>
		{{-- ./ experience-content --}}

		<div class="progress_bar"></div>

	</div>
	{{-- ./ site-content --}}
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

	<script type="text/javascript">
	  $(window).load(function() {
			$('#loading').hide();
	  });
	  if ("{{ $experience }}" == null) {
			var exp_id = 0;
	  } else {
			var exp_id = "{{ $experience['id'] }}";
	  }
	  var count_a = "{{ $count_a }}";
	  var count_c = "{{ $count_c }}";
	  var type = "{{ $type }}";
	  var _flags = "{{ $_flags }}";
	  var f_count = "{{ $f_count }}";
	  var custom_city_id = "{{ request()->id }}";
	</script>

	<script type="text/javascript" src="{{ url('js/customize/create_experience_4_19_3.js') }}"></script>

	<script src="https://js.stripe.com/v3/"></script>

	<script type="text/javascript">

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

		var stripe = Stripe("{{ $stripeKeys['key'] }}");

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
	    var str = old_price.split("Total: $AUD");
	    hiddenInput1.setAttribute('value', parseFloat(str[1]));
	    form.appendChild(hiddenInput1);
	    var hiddenInput2 = document.createElement('input');
	    hiddenInput2.setAttribute('type', 'hidden');
	    hiddenInput2.setAttribute('name', 'email');
	    hiddenInput2.setAttribute('value', $("#email").val());
	    form.appendChild(hiddenInput2);
	    form.submit();
	  }

	  if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod') {
	    $(".response_add_trip_btn").css("position", "static");
	    $(".setting-content").css("margin-bottom", "0px");
	  }

	</script>

@endsection