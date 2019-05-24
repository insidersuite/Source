{{-- sidebar --}}
<div class="sidebar">

	{{-- sidebar-brand --}}
	<div class="sidebar-brand">
		<h3>Create experience</h3>
	</div>
	{{-- ./ sidebar-brand --}}

	{{-- free-list --}}
	<ul class="free-list">
		<li><a id="general" class="active">General Information</a></li>
	</ul>
	{{-- ./ free-list --}}

	{{-- key-list --}}
	<ul class="key-list">
		<li class="_accommodation">
			<a id="accomodation" class="disabled">
				<img src="imgs/icon-lock.png"> Accommodation
			</a>
		</li>
		<li>
			<a
				id="experience"
				class="disabled"
				data-expid="0">
				<img src="imgs/icon-lock.png"> Activity
			</a>
		</li>
		<li>
			<a
				id="review"
				class="disabled"
				data-accoms="{{ $accoms }}"
				data-acts="{{ $activities }}"
				data-ac="{{ $accom_images }}"
				data-at="{{ $act_images }}"
				data-acprice="{{ $prices_accom }}"
				data-atprice="{{ $prices_act }}">
				<img src="imgs/icon-lock.png"> Review & Submit
			</a>
		</li>
		{{-- <li>
			<a id="review" class="" data-accoms="3" >
				<img src="imgs/icon-lock.png"> Review & Submit
			</a>
		</li> --}}
		<li>
			<a id="payment" class="disabled">
				<img src="imgs/icon-lock.png"> Checkout
			</a>
		</li>
		<li style="display: none!important;">
			<a
				id="invite"
				class="disabled"
				data-accoms="{{ $accoms }}"
				data-acts="{{ $activities }}"
				data-ac="{{ $accom_images }}"
				data-at="{{ $act_images }}"
				data-acprice="{{ $prices_accom }}"
				data-atprice="{{ $prices_act }}">
				<img src="imgs/icon-lock.png"> Invite friends
			</a>
		</li>
		{{-- <li style="display: none!important;">
			<a id="invite" class="disabled" data-accoms="" data-acts="" data-ac="" data-at="" data-acprice="" data-atprice="">
				<img src="imgs/icon-lock.png"> Invite friends
			</a>
		</li> --}}
	</ul>
	{{-- ./ key-list --}}

</div>
{{-- ./ sidebar --}}