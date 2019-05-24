@extends('layout')

@section('title','Insider Suite |  Favourites')
@section('head')
@parent
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/favourites_list.css') }}">
@endsection
@section('content')
<div id="site-content">
	<div class="container header-content">
		<div class="row">
			<div class="col-md-6 col-xs-12 col-sm-12">
				<h2 style="font-style: italic;">Favorites</h2>
			</div>
			<div class="col-md-6 col-xs-12 col-sm-12" style="margin-top: 20px;">
				<a href="/offers" type="button" class="_ky1ga6g" aria-busy="false"><span class="_cgr7tc7">Create new experience</span></a>
			</div>
		</div>		
	</div>
	@if($count != 0)
	<div class="container favourites-grid">
		<div class="row">
			@foreach($experiences as $exp)
			@foreach($offers as $offer)
				@if($exp->city_id == $offer->id)
				<div class="col-xs-12 col-md-3 col-sm-6" style="margin-top: 20px;">
					<div class="card" style="background-image: url('{{$offer['img_path']}}');">						
						<i class='fas fa-heart slide-like' data-id='{{$exp->id}}'></i>
						<div class="description" data-id="{{$offer->id}}" data-expid='{{$exp->id}}'>
							<div class="description_title">
								<h2>{{$offer['location_place']}}</h2>
								<p>{{$offer['location_country']}}</p>
							</div>
							<div class="description_detail">
								<p>{{$exp->exp_name}}</p>
								@foreach($details as $detail)
								@if ($exp->id == $detail['exp_id'])
								<?php 
									$str_accommodation = $detail['accommodation'] . (($detail['accommodation'] > 1) ? ' Accommodations' : ' Accommodation');
									$str_activity = $detail['activity'] . (($detail['activity'] > 1) ? ' Activities' : ' Activity');
								?>
								<p>{{$str_accommodation}} - {{$str_activity }} </p>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
				@endif			
			@endforeach
			@endforeach
		</div>
	</div>
	@else
	<div class="container container2">
		<div class="no-favourites">
			<i class="far fa-heart"></i>
			<h4 class="heading-font-style">You do not have any upcoming trips</h4>
			<div class="separator"></div>
<p class="para-font-style">Start exploring ideas for your next trip.</p>
		</div>
	</div>
	@endif	
</div>
@endsection

@section('scripts')
<script>
	$(".description").click(function() {
		var id = $(this).data('id');
		var expid = $(this).data('expid');
		//var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;
		var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
		window.location = redirect_path + "/create_experience?id="+id + "&expid=" + expid;
	});
	$(".slide-like").click(function () {
		var id = $(this).data('id');
		$.ajax({
			type: 'post',
			dataType: 'json',
			url: 'delete_favourite',
			data: { 'exp_id': id },
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function (e) {
				location.reload(true);
			}
		});
	});
</script>
@endsection
