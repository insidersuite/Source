@extends('layout')
@section('head')
@parent
<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/review_page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('css/jquery-gallery.css') }}">
@endsection
@section('title','Insider Suite |  Review Experience')

@section('content')
<div id="site-content">
	<div class="_5m2ieb" style="background-image:url(../images/pool-ranieri.jpg)">
        <div class="_314ao4">
            <div style="margin-bottom:24px">
                <div>
                    <section>
                        <div class="_1hargc54">
                            <h1 tabindex="-1" class="_tpbrp">{{$review->location}} - {{$review->experience_name}}</h1>
                        </div>
                        <div class="_byeukid">
                            <?php $first_day_stamp = strtotime($review->first_day); $last_day_stamp = strtotime($review->last_day); 
                                $first_dmy = date("j F Y", $first_day_stamp); $last_dmy = date("j F Y", $last_day_stamp); 
                            ?>
                            <h3 class="_tph2">{{$first_dmy}} - {{$last_dmy}}</h3>
                            <h3 class="_tph2">{{$review->act_count}} activities - {{$review->accom_count}} accommodations</h3>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="section_sub">
		    <div class="detail_sub">
		        <label>1. Purpose of your trip?</label>
		        <div class="radio_group">
    		        <radiogroup>
    		            <label>
    						<input type="radio" name="purpose" required="" value="business" checked=""><span>Business</span>
    					</label>
    					<label>
    						<input type="radio" name="purpose" required="" value="leisure"><span>Leisure</span>
    					</label>
    					<label>
    						<input type="radio" name="purpose" required="" value="other"><span>Other</span>
    					</label>
    		        </radiogroup>
		        </div>
		    </div>
		    <div class="detail_sub">
		        <label>2. Who did you travel with?</label>
		        <div class="radio_group">
    		        <radiogroup>
    		            <label>
    						<input type="radio" name="friends" required="" value="alone" checked=""><span>Alone</span>
    					</label>
    					<label>
    						<input type="radio" name="friends" required="" value="friends"><span>Friends</span>
    					</label>
    					<label>
    						<input type="radio" name="friends" required="" value="family"><span>Family</span>
    					</label>
    					<label>
    						<input type="radio" name="friends" required="" value="colleague"><span>Colleague(s)</span>
    					</label>
    					<label>
    						<input type="radio" name="friends" required="" value="partner"><span>Partner</span>
    					</label>
    		        </radiogroup>
		        </div>
		    </div>
            <?php $number_flag = 3; ?>
		    <div class="detail_sub">		        
		        @if ($accom_count != 0)
                <label><?php echo $number_flag;  $number_flag++;?>. Rates your accommodations</label>
		        @for ($i = 0; $i < $accom_count; $i ++)
		        <div class="row">
    		        <div class="col-md-6 col-sm-12 row">
    		            <div class="col-md-6 col-sm-6">
        		            <h3>Accommodation {{$i + 1}}</h3>
        		            <ul class="gallery-slideshow">
        						@foreach($accom_imgs as $accom_img)
        						@foreach($accom_img as $img)
        						@if($img->accom_id == $accoms[$i]['id'])
                                <li><img src="{{$img->path}}" style="width: 262.5px; height: 200px"/></li>
        						@endif
        						@endforeach
        						@endforeach
        					</ul>
    					</div>
    					<div class="col-md-6 col-sm-6 description_custom">
    					    <p><b>{{$accoms[$i]->name}}</b></p>
    					    <p>{{$accoms[$i]->full_address}} - {{$accoms[$i]->room_nb}} rooms</p>
    						<p>{{$accoms[$i]->category}}</p>
    					</div>
    		        </div>
    		        <div class="col-md-6 col-sm-12">
    		            <h3>Could you please provide your review?<span>(Optional)</span></h3>
    		            <textarea class="accom_review_text" id="accom_review_text_{{$i}}"></textarea>
    		        </div>
		        </div>
		        <div class="accom_action">
		            <p><svg aria-hidden="true" data-prefix="fal" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-info-circle fa-w-16 fa-lg"><path fill="currentColor" d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-36 344h12V232h-12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h48c6.627 0 12 5.373 12 12v140h12c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12h-72c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12zm36-240c-17.673 0-32 14.327-32 32s14.327 32 32 32 32-14.327 32-32-14.327-32-32-32z" class=""></path></svg>Your ratings will impact the review score</p>
		            <div class="row">
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Location</p>
		                    <div class="category_group" id="accom_location{{$i}}">
    		                    <a class="click_location_rate" id="accom_location_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_location_rate" id="accom_location_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_location_rate" id="accom_location_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_location_rate active" id="accom_location_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Staff</p>
		                    <div class="category_group" id="accom_staff{{$i}}">
    		                    <a class="click_staff_rate" id="accom_staff_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_staff_rate" id="accom_staff_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_staff_rate" id="accom_staff_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_staff_rate active" id="accom_staff_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Facilities</p>
		                    <div class="category_group" id="accom_facilities{{$i}}">
    		                    <a class="click_facilities_rate" id="accom_facilities_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_facilities_rate" id="accom_facilities_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_facilities_rate" id="accom_facilities_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_facilities_rate active" id="accom_facilities_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Cleanliness</p>
		                    <div class="category_group" id="accom_cleanliness{{$i}}">
    		                    <a class="click_cleanliness_rate" id="accom_cleanliness_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_cleanliness_rate" id="accom_cleanliness_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_cleanliness_rate" id="accom_cleanliness_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_cleanliness_rate active" id="accom_cleanliness_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Comfort</p>
		                    <div class="category_group" id="accom_comfort{{$i}}">
    		                    <a class="click_comfort_rate" id="accom_comfort_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_comfort_rate" id="accom_comfort_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_comfort_rate" id="accom_comfort_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_comfort_rate active" id="accom_comfort_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		                <div class="accom_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Value for money</p>
		                    <div class="category_group" id="accom_cost{{$i}}">
    		                    <a class="click_cost_rate" id="accom_cost_sad_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_cost_rate" id="accom_cost_affect_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_cost_rate" id="accom_cost_face_{{$accoms[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_cost_rate active" id="accom_cost_happy_{{$accoms[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        @endfor
		        @endif
		    </div>
		    <div class="detail_sub">		        
		        @if ($act_count != 0)
                <label><?php echo $number_flag; ?>. Rates your activities</label>
		        @for ($i = 0; $i < $act_count; $i ++)
		        <div class="row">
    		        <div class="col-md-6 col-sm-12 row">
    		            <div class="col-md-6 col-sm-6">
        		            <h3>Activity {{$i + 1}}</h3>
        		            <ul class="gallery-slideshow">
        						@foreach($act_imgs as $act_img)
        						@foreach($act_img as $img)
        						@if($img->act_id == $acts[$i]['id'])
                                <li><img src="{{$img->path}}" style="width: 262.5px; height: 200px"/></li>
        						@endif
        						@endforeach
        						@endforeach
        					</ul>
    					</div>
    					<div class="col-md-6 col-sm-6 description_custom">
    					    <p><b>{{$acts[$i]->name}}</b></p>
    						<p>{{$acts[$i]->category}}</p>
    					</div>
    		        </div>
    		        <div class="col-md-6 col-sm-12">
    		            <h3>Could you please provide your review?<span>(Optional)</span></h3>
    		            <textarea class="act_review_text" id="act_review_text_{{$i}}"></textarea>
    		        </div>
		        </div>
		        <div class="act_action">
		            <p><svg aria-hidden="true" data-prefix="fal" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-info-circle fa-w-16 fa-lg"><path fill="currentColor" d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-36 344h12V232h-12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h48c6.627 0 12 5.373 12 12v140h12c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12h-72c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12zm36-240c-17.673 0-32 14.327-32 32s14.327 32 32 32 32-14.327 32-32-14.327-32-32-32z" class=""></path></svg>Your ratings will impact the review score</p>
		            <div class="row">
		                <div class="act_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Location</p>
		                    <div class="category_group" id="act_location{{$i}}">
    		                    <a class="click_location_rate" id="act_location_sad_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_location_rate" id="act_location_affect_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_location_rate" id="act_location_face_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_location_rate active" id="act_location_happy_{{$acts[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		                <div class="act_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Staff</p>
		                    <div class="category_group" id="act_staff{{$i}}">
    		                    <a class="click_staff_rate" id="act_staff_sad_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_staff_rate" id="act_staff_affect_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_staff_rate" id="act_staff_face_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_staff_rate active" id="act_staff_happy_{{$acts[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		            </div>
		            <div class="act_action_row">
		                <div class="act_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Facilities</p>
		                    <div class="category_group" id="act_facilities{{$i}}">
    		                    <a class="click_facilities_rate" id="act_facilities_sad_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_facilities_rate" id="act_facilities_affect_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_facilities_rate" id="act_facilities_face_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_facilities_rate active" id="act_facilities_happy_{{$acts[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		                <div class="act_action_category col-lg-3 col-md-3 col-sm-6">
		                    <p>Value for money</p>
		                    <div class="category_group" id="act_cost{{$i}}">
    		                    <a class="click_cost_rate" id="act_cost_sad_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/sad_gray.png"><img class="active" src="../imgs/sad.png"></a>
    		                    <a class="click_cost_rate" id="act_cost_affect_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/affect-gray.png"><img class="active" src="../imgs/affect.png"></a>
    		                    <a class="click_cost_rate" id="act_cost_face_{{$acts[$i]['id']}}"><img class="inactive" src="../imgs/smiling-face-gray.png"><img class="active" src="../imgs/smiling-face.png"></a>
    		                    <a class="click_cost_rate active" id="act_cost_happy_{{$acts[$i]['id']}}"><img class="active" src="../imgs/smiling-happy-gray.png"><img class="inactive" src="../imgs/smiling-happy.png"></a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        @endfor
		        @endif
		    </div>
			<a class="btn btn-subscribe submit">Submit</a>
		</div>
	</div>
</div>
@endsection

@section ('scripts')
<script type="text/javascript" src="{{ url('js/jquery-gallery.js') }}"></script>
<script>
    $('.gallery-slideshow').slideshow({
		interval: 5000,
		width: 262.5,
		height: 200
	});
	var accom_count = "{{$accom_count}}";
	var act_count = "{{$act_count}}";
	var review_id = "{{$review->id}}";
</script>
<script type="text/javascript" src="{{ url('js/customize/review_page.js') }}"></script>
@endsection
