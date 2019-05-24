@extends('layout')
@section('head')
@parent
<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ url('css/customize/review_page.css') }}">
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
			<label class="confirm_title">Thank you for your time!</label>
		    <div class="confirm_txt_sub">
		        <p>We really appreciate you taking the time out to share your experience with us - We count ourselves lucky for customers like you.<br>We look forward to seeing you again in the future!</p>
		    </div>
		    <div class="confirm_sub">
    			<h1>Discover more surprise</h1>
    			<a href="https://www.insidersuite.com/offers" class="btn btn-subscribe submit">See all sales</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section ('scripts')
<script type="text/javascript" src="{{ url('js/customize/review_page.js') }}"></script>
@endsection
