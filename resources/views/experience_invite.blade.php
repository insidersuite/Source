@extends('layout')

@section('title','Insider Suite |  Invite Experience')
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
	<style type="text/css">
		#invite_info .ms-trigger {
			display: none!important;
		}
		#invite_info .ms-res-ctn.dropdown-menu {
			display: none!important;
		}
		#invite_info .ms-sel-ctn {
			padding-right: 0!important;
		}

		#invite_info .ms-ctn-focus {
			border-color: #f36;
		    outline: 0;
		    -webkit-box-shadow: unset;
		    box-shadow: unset;
		}

		#invite_info .form-control:focus {
			border-color: #f36;
		    outline: 0;
		    -webkit-box-shadow: unset;
		    box-shadow: unset;
		}
	</style>
@endsection
@section('content')
<div id="site-content">
	<div class="experience-content" style="margin-left: 0px; display: block; min-height: unset!important; height: unset!important;overflow: unset!important;">
		<section id="invite_info" style="display: block;">
			<div class="invite_sent">
				<h2 class="heading">Congratulation!</h2>
            <p>We're almost there {{ Auth::User()->first_name }}! Check out your email and pack up your suitcase.</p>
				<p><i>With who are you planning your trip?</i></p>
				<div class="form-check">
					<radiogroup id="check_title">
						<label class="radio-inline">
							<input type="radio" name="radiotitle" value="Alone"><span>Alone</span>
						</label>
						<label class="radio-inline">
							<input type="radio" name="radiotitle" value="Friends"><span>Friends</span>
						</label>
						<label class="radio-inline">
							<input type="radio" name="radiotitle" value="Family"><span>Family</span>
						</label>
						<label class="radio-inline">
							<input type="radio" name="radiotitle" value="Colleague"><span>Colleague(s)</span>
						</label>
						<label class="radio-inline">
							<input type="radio" name="radiotitle" value="Partner"><span>Partner</span>
						</label>
					</radiogroup>
				</div>				
			</div>
			<div class="header">
				<h2>Invite your friends to join your trip.</h2>
			</div>
			<div class="form-general" style="min-height: unset!important;">
				<div class="form-content">
					<input id="invite_email">
					<i>*Enter multiple email addresses using the tab key.</i>
				</div>
				<div class="form-content">
					<label>Include a message(optional)</label><br>
					<textarea rows="3" name="content" id="invite_message" class="form-control"></textarea>
				</div>
				<div class="form-content" style="display: none;">
					<textarea rows="3" name="invite_content" id="invite_content" class="form-control">{{$inviteMail->content}}</textarea>
				</div>
				<div class="form-content">
					<button type="button" class="_d4g44p2" aria-busy="false" id="send_invite"><span class="_cgr7tc7">Send invites</span></button>
					<button type="button" class="_d4g44p1 undobutton" aria-busy="false" id="skip_invite"><span class="_cgr7tc7">Skip</span></button>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
		var invite_exp_id = '{{$inviteMail->exp_id}}';
	</script>
</div>
@endsection

@section ('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
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
	<script type="text/javascript" src="{{ url('js/customize/experience_invite.js') }}"></script>	
@endsection


