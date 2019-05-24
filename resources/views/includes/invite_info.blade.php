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

		<button type="button" class="_d4g44p1 undobutton" aria-busy="false" id="skip_invite"><span class="_cgr7tc7">Skip</span></button>

	</div>

</div>