@extends('private_admin.private')
@section('title','Insider Suite |  Admin Dashboard')
@section('head')
	@parent
	<link rel="stylesheet" type="text/css" href="{{ url('css/customize/admin_edit_experiences.css') }}">
@endsection
@section('content')
<div class="page-container">
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="title-box">
						<h1><svg style="width: 23px; margin-right: 10px; vertical-align: top;" aria-hidden="true" data-prefix="fal" data-icon="location-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-location-circle fa-w-16 fa-5x"><path fill="currentColor" d="M307.75 147l-181.94 84c-16.38 7.64-24.78 24.53-20.91 42.05 3.88 17.36 18.34 29.03 36.06 29.03h60.97v60.95c0 17.72 11.66 32.22 29.03 36.06 2.84.62 5.69.94 8.44.94 14.31 0 27.22-8.14 33.62-21.91L357 196.22l.25-.55c5.69-13.64 2.34-29.48-8.5-40.34-10.91-10.92-26.72-14.27-41-8.33zM244 364.67c-1.28 2.72-3.28 3.89-6.12 3.17-2.59-.58-3.94-2.2-3.94-4.81v-92.95h-92.97c-2.59 0-4.22-1.33-4.81-3.97-.62-2.78.44-4.84 3.12-6.08l181.31-83.72c.53-.22 1-.3 1.5-.3 1.91 0 3.47 1.39 4 1.92.62.62 2.56 2.83 1.69 5.25L244 364.67zM248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm0 464c-119.1 0-216-96.9-216-216S128.9 40 248 40s216 96.9 216 216-96.9 216-216 216z" class=""></path></svg>Activity Slider Images</h1>
					    <a type="button" class="btn btn-normal" id="upload_slider" data-id="{{$id}}">Upload Activity Slider Image</a>
					    <input id="file_upload" type="file" accept="image/*" style="opacity:0;">
					</div>
					
					<div style="display: none;">
					    <input id="act_id" type="number" value="{{$id}}">
					    <input id="offer_id" type="number" value="{{$offer_id}}">
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="content-box">
						<div class="boxes-list">
							@if($count != 0)
							<div class="row">
                                @foreach($datas as $data)
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="info-box hover-expand-effect">
										<div class="main_content">
                                            <img src="{{$data->path}}">
                                        </div>
                                        <div class="text_content">
                                            <svg class="delete" id="{{$data->id}}" aria-hidden="true" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-lg"><path fill="currentColor" d="M336 64l-33.6-44.8C293.3 7.1 279.1 0 264 0h-80c-15.1 0-29.3 7.1-38.4 19.2L112 64H24C10.7 64 0 74.7 0 88v2c0 3.3 2.7 6 6 6h26v368c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V96h26c3.3 0 6-2.7 6-6v-2c0-13.3-10.7-24-24-24h-88zM184 32h80c5 0 9.8 2.4 12.8 6.4L296 64H152l19.2-25.6c3-4 7.8-6.4 12.8-6.4zm200 432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V96h320v368zm-176-44V156c0-6.6 5.4-12 12-12h8c6.6 0 12 5.4 12 12v264c0 6.6-5.4 12-12 12h-8c-6.6 0-12-5.4-12-12zm-80 0V156c0-6.6 5.4-12 12-12h8c6.6 0 12 5.4 12 12v264c0 6.6-5.4 12-12 12h-8c-6.6 0-12-5.4-12-12zm160 0V156c0-6.6 5.4-12 12-12h8c6.6 0 12 5.4 12 12v264c0 6.6-5.4 12-12 12h-8c-6.6 0-12-5.4-12-12z" class=""></path></svg>                                            
                                        </div>
									</div>
                                </div>
                                @endforeach
							</div>
							@else
							<h1> There is no experience link data.</h1>
							@endif			
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section ('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/customize/admin_activity_slider_images.js') }}"></script>
@endsection