{{-- header --}}
<div class="header">
	<h2>It's time to create your experience in {{ $offer->location_place }}</h2>
</div>
{{-- ./ header --}}

{{-- form-general --}}
<div class="form-general" style="min-height: unset!important;">
	{{-- input_form --}}
	<form id="input_form">

		{{-- form-content hidden --}}
		<div class="form-content hidden">
			<input type="text" class="form-control" id="city" value="{{ $offer->location_place }}, {{ $offer->location_country }}" disabled required>
		</div>
		{{-- ./ form-content hidden --}}

		{{-- form-content --}}
		<div class="form-content">
			<label for="arrival_date" style="cursor:pointer;">When do you expect to arrive : </label>
			<input type="text" class="form-control" id="arrival_date" @if($experience['arrival_date'] =='') placeholder="dd/mm/yyyy"@endif value="{{$experience['arrival_date']}}" required readonly="readonly">
		</div>
		{{-- ./ form-content --}}

		{{-- form-content --}}
		<div class="form-content">
			<label for="guests" style="cursor:pointer;">Number of guests:</label>
			<input type="text" id="guests" class="form-control" @if($experience['guests_nb'] =='') placeholder="E.g. 3 guests" @elseif ($experience['guests_nb'] ==1) value="{{ $experience['guests_nb'] }} guest" @else value="{{ $experience['guests_nb'] }} guests" @endif required readonly="readonly">
			{{-- guests_extend --}}
			<div class="guests_extend">

				<div class="hkJiNs"></div>

				{{-- style="position:relative;" --}}
				<div style="position:relative;">
					{{-- dsssji --}}
					<div class="dsssji">

						{{-- TPxij --}}
						<div class="TPxij">

							<label class="ijjuLW"> Adults </label>
							<span class="egudlU select_option" min="1" max="15">

							<button type="button" class="fndzHx" id="adults_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>

							<label for="adults"><input id="adults" name="adults" readonly="" tabindex="-1" value="1"></label>

							<button type="button" class="active fndzHx" id="adults_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
						</div>
						{{-- ./ TPxij --}}

						{{-- TPxij --}}
						<div class="TPxij">
							<label class="ijjuLW">Children</label>

							<span class="egudlU select_option" min="1" max="15">

							<button type="button" class="fndzHx" id="children_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>

							<label for="children"><input id="children" name="children" readonly="" tabindex="-1" value="0"></label>

							<button type="button" class="active fndzHx" id="children_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
						</div>
						{{-- ./ TPxij --}}

						{{-- TPxij --}}
						<div class="TPxij">
							<label class="ijjuLW">Infants<span style="color: #8c8888;font-size: 10px;">(under 2)</span></label>

							<span class="egudlU select_option" min="1" max="15">

							<button type="button" class="fndzHx" id="infants_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>

							<label for="infants"><input id="infants" name="infants" readonly="" tabindex="-1" value="0"></label>

							<button type="button" class="active fndzHx" id="infants_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
						</div>
						{{-- ./ TPxij --}}

						<button type="button" class="iCflgr" id="guest_apply">
							Apply
						</button>

					</div>
					{{-- ./ dsssji --}}
				</div>
				{{-- ./ style="position:relative;" --}}

			</div>
			{{-- ./ guests_extend --}}
		</div>
		{{-- ./ form-content --}}

		{{-- form-content --}}
		<div class="form-content">
			<label for="experience_title" style="cursor:pointer;">Give a name to your trip:</label>
			<input type="text" class="form-control" id="experience_title" @if($experience['exp_name'] =='') value="{{ $offer->location_place }} trip" @endif value="{{ $experience['exp_name'] }}" required>
		</div>
		{{-- ./ form-content --}}

		{{-- form-content --}}
		<div class="form-content">
			<input type="button" class="_d4g44p2" aria-busy="false" id="save_general" value="Save &amp; Continue">
			<input type="button" class="backbutton" aria-busy="false" id="back_general" value="Back">
		</div>
		{{-- ./ form-content --}}

	</form>
	{{-- ./ input_form --}}

	<img class="general-picture" src="{{ url('imgs/general_information.jpg') }}" alt="Create your experience">

</div>
{{-- ./form-general --}}