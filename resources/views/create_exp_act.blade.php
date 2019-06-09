

<div class="header">
    <h2>Experience inspiring activities in {{$offer->location_place}}.</h2>
    <p><i>Bring fun to your everyday. Add activity to your trip if you think you deserve it.</i></p>
</div>


<div class="details" id="form_experience">
    @foreach($activities as $act)
        <?php $price_array_act=array();?>
        <?php $discount_array_act=array();?>
        @if($act->status != "false")
            @foreach($prices_act as $price)
                @if ($price['activity_id'] == $act['id'])
                    <?php array_push($price_array_act, $price['price_a_discount']);?>
                    <?php array_push($discount_array_act, $price['discount']);?>
                @endif
            @endforeach
            <?php
            $min_price_act = $price_array_act[0];
            for($i = 1; $i < count($price_array_act); $i ++) {
                if ($price_array_act[$i] < $min_price_act) {
                    $min_price_act = $price_array_act[$i];
                }
            }
            ?>
            <?php
            $max_discount_act = $discount_array_act[0];
            for($i = 1; $i < count($discount_array_act); $i ++) {
                if ($discount_array_act[$i] > $max_discount_act) {
                    $max_discount_act = $discount_array_act[$i];
                }
            }
            ?>
            <div class="detail-item">
                <div class="detail experience" data-id="{{$act->id}}" data-source="{{$act}}" data-img="{{$act_images}}" data-practical="{{$act_practical}}" data-experience="{{$experience['arrival_date']}}" data-reviews="{{$reviews}}">
                    <ul class="gallery-slideshow">
                        @foreach($act_images as $act_image)
                            @if($act_image->act_id == $act->id)
                                <li><img src="{{$act_image->path}}" alt=""></li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="detail-info">
                        <div class="detail-info-head">
                            @foreach($prices_act as $price)
                                @if ($price['activity_id'] == $act['id'] && $min_price_act == $price['price_a_discount'])
                                    <?php $min_act_discount = $price->discount; ?>
                                @endif
                            @endforeach
                            @foreach($prices_act as $price)
                                @if ($price['activity_id'] == $act['id'] && $max_discount_act == $price['discount'])
                                    <?php $max_act_discount = $price->discount; ?>
                                @endif
                            @endforeach
                            <p class="detail-info-address">{{$act->address}}</p>
                            <p class="detail-info-name">{{$act->name}}</p>
                            <p class="detail-info-discount"><span class="small">Up to</span><span class="big">-{{($max_act_discount)*100}}%</span></p>
                        </div>
                        <div class="detail-info-data origin eUhMAS">
                            @foreach ($act_practical as $pract)
                                @if ($pract->act_id == $act->id)
                                    <span class="detail-info-capacity">{{$pract->group_size}} guests</span>
                                    <span class="detail-info-experience">{{$act->category}}</span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>


<div class="selection">
    <div class="selected">
        <p class="selected-title">My selection<i class="fas fa-angle-down"></i></p>
        <div class="details selected_content_act">
            <?php $sel_a = 100; ?>
            @foreach($acts_sel as $act_sel)
                <?php $sel_a ++; ?>
                <div class="detail-item">
                    <div class="detail activity single_content_act" data-id="{{$act_sel->type_id}}" id="{{$sel_a}}" data-source="{{$act}}" data-img="{{$act_images}}" data-practical="{{$act_practical}}" data-experience="{{$experience['arrival_date']}}" data-reviews="{{$reviews}}">
                        <?php $str1 = explode("-", $act_sel->check_in); $check_in = $str1[2]."/".$str1[1]."/".$str1[0];?>
                        <p class="detail-dates" id="act_date{{$sel_a}}">Activity on <span>{{$check_in}}</span></p>
                        <ul class="selected-slideshow">
                            @foreach($act_images as $act_image)
                                @if($act_image->act_id == $act_sel->type_id)
                                    <li>
                                        <i class='fas fa-heart slide-like' data-id='{{$act_sel->type_id}}' id='{{$sel_a}}'></i>
                                        <img src="{{$act_image->path}}" alt="">
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="detail-info">
                            @foreach($activities as $act)
                                @if($act->status != "false")
                                    <?php $type_id = $act_sel->type_id;?>
                                    @if($act->id == $type_id)
                                        <div class="detail-info-head">
                                            @foreach($prices_act as $price)
                                                @if ($price['activity_id'] == $act['id'] && $min_price_act == $price['price_a_discount'])
                                                    <?php $min_act_discount = $price->discount; ?>
                                                @endif
                                            @endforeach
                                            <p class="detail-info-address">{{$act->address}}</p>
                                            <p class="detail-info-name">{{$act->name}}</p>
                                            <p class='detail-discounted-price'><span class='detail-discounted-price-span'>{{$act_sel->d_a_price}}</span><small>/pers</small></p>
                                            <p class='detail-origin-price hidden'>{{$act_sel->d_b_price}}</p>
                                            <p class='detail-info-discount dHEojY hidden'>{{$act_sel->discount}}</p>
                                            @if($act_sel->guests_num == 1)
                                                <p class="detail-info-capacity"><span class='detail-info-guests-num dHEojY'>{{$act_sel->guests_num}}</span> Guest coming</p>
                                            @else
                                                <p class="detail-info-capacity"><span class='detail-info-guests-num dHEojY'>{{$act_sel->guests_num}}</span> Guests coming</p>
                                            @endif
                                        </div>
                                        <div class="detail-info-data origin eUhMAS hidden">
                                            @foreach ($act_practical as $pract)
                                                @if ($pract->act_id == $act->id)
                                                    <span class="detail-info-capacity">{{$pract->group_size}} guests</span>
                                                    <span class="detail-info-experience">{{$act->category}}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            @endforeach
            <input id='elm_act_sel' value="{{$sel_a}}" type='hidden'>
        </div>
        <div class="form-content submit-mobile">
            <button type="button" class="_d4g44p2" aria-busy="false" id="save_act"><span class="_cgr7tc7">Save my selection</span></button>
            <input type="button" class="backbutton" aria-busy="false" id="back_act" value="Back">
            <button type="button" class="_ky1ga6g undobutton" aria-busy="false" id="remove_act"><span class="_cgr7tc7">Back</span></button>
        </div>
    </div>
</div>


<div class="modal right fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-body-headers">
                    <div class="modal-body-header">
                        <div class="slider-modal"></div>
                    </div>
                    <div class="modal-sub-header">
                        <div class="modal-map-info map_info">
                            <h3 class="country">{{$offer->location_place}}, {{$offer->location_country}} / <span id="address_activity"></span></h3>
                            <span class="discount">
									<small class="small">Up to</small>
									<span class="big" id="act_discont">-20%</span>
								</span>
                        </div>
                    </div>
                </div>
                <div class="modal-body-contents">
                    <div class="text-contents">
                        <div class="part1-text">
                            <div class="part1-header">
                                <div class="part1-header-place"><h3 class="modal2-exp"></h3></div>
                                <div class="part1-header-info-detail">
                                    <div><img src="../imgs/pamela.png" alt=""><span class="part1-exp-max-capacity"></span></div>
                                    <div><img src="../imgs/hot-air-balloon.png" alt=""><span class="part1-exp-category" id="category_activity"></span></div>
                                </div>
                            </div>

                            <ul class="location-detail-info">
                                <li>
                                    <span class="_8tbpu3" aria-hidden="true"><img height="40" src="../images/icons/calendar.png"></span>
                                    <div id="activity_arrival_date" class="small"></div>
                                </li>
                                <li>
                                    <span class="_8tbpu3" aria-hidden="true"><img height="40" src="../images/icons/stopwatch.png"></span>
                                    <div id="activity_activity_hours" class="small"></div>
                                </li>
                                <li style="display: none!important;">
                                    <span class="_8tbpu3" aria-hidden="true"><i class="fas fa-home"></i></span>
                                    <div id="activity_parking" class="small"></div>
                                </li>
                                <li>
                                    <span class="_8tbpu3" aria-hidden="true"><img height="40" src="../images/icons/family.png"></span>
                                    <div id="activity_group" class="small"></div>
                                </li>
                                <li>
                                    <span class="_8tbpu3" aria-hidden="true"><img height="40" src="../images/icons/translation.png"></span>
                                    <div id="activity_lang" class="small">Offered in English</div>
                                </li>
                            </ul>

                            <div class="part1-act-content"></div>

                            <div class="information_practice">
                                <div class="part1-tab-title">
                                    <h3>The good to know</h3>
                                </div>
                                <div class="detail_practice">
                                    <div class="text_detail_practice">
                                        <div class="practice">
                                            <h4 class="practice-title">What we'll provide</h4>
                                            <div class="practice-cell">
                                                <div class="practice-one" id="cancellation"></div>
                                            </div>
                                        </div>
                                        <div class="practice">
                                            <h4 class="practice-title">What you should bring</h4>
                                            <div class="practice-cell">
                                                <div class="practice-one" id="activity_bring"></div>
                                            </div>
                                        </div>
                                        <div class="practice">
                                            <h4 class="practice-title">How to get there</h4>
                                            <div class="practice-cell">
                                                <div class="practice-one" id="activity_there"></div>
                                            </div>
                                        </div>
                                        <div class="practice">
                                            <h4 class="practice-title">what else should we know</h4>
                                            <div class="practice-cell">
                                                <div class="practice-one" id="activity_know"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="map_detail_practice">
                                        <div class="map-image">
                                            <div id="location_map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="part1-act-reviews">
                                <div class="part1-tab-title">
                                    <h3>Reviews</h3>
                                    <div class="review_total">
											<span class="review_total_grade">
												<span class="review_total_rate">0.0</span>
												<span class="review_total_bar"></span>
											</span>
                                        <span class="review_total_count">0 reviews</span>
                                    </div>
                                </div>
                                <div class="act_reviews"></div>
                            </div>
                        </div>
                    </div>
                    <div class="setting-content">

                        <div class="modal-dates" id="activity_bottom">
                            <h4 class="setting-title">When?</h4>
                            <div class="act_calender"></div>
                        </div>
                        <div class="modal-guests" style="margin-top: 20px;">
                            <h4 class="setting-title">Who's coming?</h4>
                            <div class="form-control-wrap">
                                <input type="text" id="act_guests" class="form-control" placeholder="E.g. 3 guests" required>
                                <svg class="icon" viewBox="0 0 24 24" width="18" height="18" color="#ff2960"><g fill="currentColor" fill-rule="nonzero"><path d="M23.75 22a.75.75 0 1 1-1.5 0v-1.625c0-2.235-2.23-4.204-5.28-4.562a.75.75 0 0 1 .175-1.49c3.742.439 6.605 2.969 6.605 6.052V22zM15.75 22a.75.75 0 1 1-1.5 0v-1.625c0-2.5-2.767-4.625-6.25-4.625s-6.25 2.125-6.25 4.625V22a.75.75 0 1 1-1.5 0v-1.625c0-3.428 3.513-6.125 7.75-6.125s7.75 2.697 7.75 6.125V22zM15.119 11.662a.75.75 0 0 1 .252-1.478c.268.045.453.066.629.066a3.755 3.755 0 0 0 3.75-3.75A3.755 3.755 0 0 0 16 2.75c-.18 0-.369.02-.627.066a.75.75 0 1 1-.258-1.478c.337-.058.605-.088.885-.088a5.255 5.255 0 0 1 5.25 5.25A5.255 5.255 0 0 1 16 11.75a5.03 5.03 0 0 1-.881-.088zM8 11.75a5.25 5.25 0 1 1 0-10.5 5.25 5.25 0 0 1 0 10.5zm0-1.5a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5z"></path></g></svg>
                                <svg class="down_caret" viewBox="0 0 24 24" width="16" height="16"><path d="M5.726 8.83A.5.5 0 0 1 6.102 8h11.796a.5.5 0 0 1 .376.83l-5.898 6.74a.5.5 0 0 1-.752 0L5.726 8.83z" fill="currentColor" fill-rule="evenodd"></path></svg>
                            </div>
                            <div class="accom_guests_extend">
                                <div class="hkJiNs"></div>
                                <div style="position:relative;">
                                    <div class="dsssji act_guests_alert">
                                        <div class="TPxij">
                                            <label class="ijjuLW">Adults</label>
                                            <span class="egudlU select_option" min="1" max="15">
												<button type="button" class="fndzHx" id="act_adults_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>
												<label for="adults"><input id="act_adults" name="adults" readonly="" tabindex="-1" value="1"></label>
												<button type="button" class="active fndzHx" id="act_adults_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
                                        </div>
                                        <button type="button" class="iCflgr" id="act_guest_apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="response_add_trip_btn">
                            <div class="result-content">
									<span class="result-nights">
										<span class="participants_nights">Price</span>:
									</span>
                                <span class="result-price">
										<span class="result-price-discounted"><span class="big" id="act_discounted_price">$AUD230</span><small class="small">/pers</small></span>
										<span class="result-price-origin">instead of <span class="result-price-origin-strike" id="act_origin_price">$AUD230</span></span>
									</span>
                            </div>
                            <button class="add_trip_act_btn _d4g44p2 result-btn">Add to your trip</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script type="text/javascript" src="https://www.insidersuite.com/js/jquery-3.3.1.min.js"></script>-->
<!--<script>-->
<!--    var origin_prices = "{{$prices_accom}}";-->
<!--    var origin_prices_na = "{{$prices_accom_na}}";-->
<!--    var act_prices = "{{$prices_act}}";-->
<!--    var count_a = "{{$count_a}}";-->
<!--    var count_c = "{{$count_c}}";-->
<!--    var type = "{{$type}}";-->
<!--    var _flags = "{{$_flags}}";-->
<!--    var f_count = "{{$f_count}}";-->
<!--</script>-->

<script type="text/javascript" src="{{ url('js/customize/activity.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&callback=initLocationMap"></script>
<script type="text/javascript">
    $('.gallery-slideshow').slideshow({
        width: 280,
        height: 210,
        interval: 1000000
    });
    if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod')
			{
	         	$(".response_add_trip_btn").css("position", "static");
	         	$(".setting-content").css("margin-bottom", "0px");	         	
			}
</script>