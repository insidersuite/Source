<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top: 65px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-body-headers">
                    <div class="modal-body-header">
                        <div class="headBg lazyloaded discover_hotel" data-bg="https://res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/h_620,q_auto:eco/v1497970672/common/static/home-logout/testimonials"></div>
                        <button class="modal-header-btn discover_hotel">
                            <svg aria-hidden="true" data-prefix="fal" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-camera fa-w-16 fa-2x"><path fill="currentColor" d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z" class=""></path></svg>
                            <span>Discover the experience</span>
                        </button>
                    </div>
                    <div class="modal-sub-header">
                        <div class="modal-map-info map_info">
                            <h3 class="country">{{$offer->location_place}}, {{$offer->location_country}} / <span class="modal2-address"></span></h3>
                            <span class="discount">
                                <small class="small" id="accom_discont_text">Up to</small>
                                <span class="big" id="accom_discont">-20%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-body-contents">
                    <div class="text-contents">
                        <div class="part1-text">

                            <div class="part1-header">
                                <div class="part1-header-place"><h3 class="modal2-place"></h3></div>
                                <div class="part1-header-info-detail">
                                    <div><img src="../imgs/pamela.png" alt=""><span class="part1-accom-max-capacity"></span></div>
                                    <div><img src="../imgs/bed.png" alt=""><span class="part1-accom-room-nb"></span></div>
                                    <div><img src="../imgs/key.png" alt=""><span class="part1-accom-category"></span></div>
                                </div>
                            </div>

                            <div class="part1-accom-content"></div>

                            <div class="information_practice">

                                <div class="part1-tab-title">
                                    <h3>The good to know</h3>
                                </div>
                                <div class="detail_practice">
                                    <div class="text_detail_practice">
                                        <div class="practice">
                                            <h4 class="practice-title">Timetable</h4>
                                            <div class="practice-cell">
                                                <dl class="practice-one">
                                                    <dt>Check in</dt>
                                                    <dd id="check_in"></dd>
                                                </dl>
                                                <dl class="practice-one">
                                                    <dt>Check out</dt>
                                                    <dd id="check_out"></dd>
                                                </dl>
                                            </div>
                                            <div class="practice-cell">
                                                <dl class="practice-one">
                                                    <dt>Breakfast</dt>
                                                    <dd id="breakfast_access"></dd>
                                                </dl>
                                            </div>
                                            <div class="practice-cell">
                                                <dl class="practice-one">
                                                    <dt>Access Jacuzzi</dt>
                                                    <dd id="jacuzzi_access"></dd>
                                                </dl>
                                            </div>
                                            <div class="practice-cell">
                                                <dl class="practice-one">
                                                    <dt>Access Gym</dt>
                                                    <dd id="gym"></dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="practice get_there">
                                            <h4 class="practice-title">How to get there?</h4>
                                            <div class="practice-cell">
                                                <div class="practice-one" id="accomodation_note">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="map_detail_practice">
                                        <div class="map-image">
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="experience_insider_suite">
                                <div class="part1-tab-title">
                                    <h3>Experience Insider Suite</h3>
                                    <button class="modal-header-btn" id="discover_hotel">
                                        <svg aria-hidden="true" data-prefix="fal" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-camera fa-w-16 fa-2x"><path fill="currentColor" d="M324.3 64c3.3 0 6.3 2.1 7.5 5.2l22.1 58.8H464c8.8 0 16 7.2 16 16v288c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h110.2l20.1-53.6c2.3-6.2 8.3-10.4 15-10.4h131m0-32h-131c-20 0-37.9 12.4-44.9 31.1L136 96H48c-26.5 0-48 21.5-48 48v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48h-88l-14.3-38c-5.8-15.7-20.7-26-37.4-26zM256 408c-66.2 0-120-53.8-120-120s53.8-120 120-120 120 53.8 120 120-53.8 120-120 120zm0-208c-48.5 0-88 39.5-88 88s39.5 88 88 88 88-39.5 88-88-39.5-88-88-88z" class=""></path></svg>
                                        <span>Discover the experience</span>
                                    </button>
                                </div>
                                <div class="part1-tab-content"></div>
                            </div>

                            <div class="part1-accom-reviews">
                                <div class="part1-tab-title">
                                    <h3>Reviews</h3>
                                    <div class="review_total">
                                        <span class="review_total_grade">
                                            <span class="review_total_rate"></span>
                                            <span class="review_total_bar"></span>
                                        </span>
                                        <span class="review_total_count">0 reviews</span>
                                    </div>
                                </div>
                                <div class="accom_reviews"></div>
                            </div>
                        </div>
                    </div>
                    <div class="setting-content">

                        <div class="modal-dates" id="accomodation_bottom">
                            <h4 class="setting-title">When?</h4>
                            <div class="calender"></div>
                        </div>
                        <div class="modal-guests" style="margin-top: 20px;">
                            <h4 class="setting-title">Who's coming?</h4>
                            <div class="form-control-wrap">
                                <input type="text" readonly id="accom_guests" class="form-control" @if($experience['guests_nb'] =='') placeholder="E.g. 3 guests" @else value="{{$experience['guests_nb']}} guest(s)" @endif required>
                                <svg class="icon" viewBox="0 0 24 24" width="18" height="18" color="#ff2960"><g fill="currentColor" fill-rule="nonzero"><path d="M23.75 22a.75.75 0 1 1-1.5 0v-1.625c0-2.235-2.23-4.204-5.28-4.562a.75.75 0 0 1 .175-1.49c3.742.439 6.605 2.969 6.605 6.052V22zM15.75 22a.75.75 0 1 1-1.5 0v-1.625c0-2.5-2.767-4.625-6.25-4.625s-6.25 2.125-6.25 4.625V22a.75.75 0 1 1-1.5 0v-1.625c0-3.428 3.513-6.125 7.75-6.125s7.75 2.697 7.75 6.125V22zM15.119 11.662a.75.75 0 0 1 .252-1.478c.268.045.453.066.629.066a3.755 3.755 0 0 0 3.75-3.75A3.755 3.755 0 0 0 16 2.75c-.18 0-.369.02-.627.066a.75.75 0 1 1-.258-1.478c.337-.058.605-.088.885-.088a5.255 5.255 0 0 1 5.25 5.25A5.255 5.255 0 0 1 16 11.75a5.03 5.03 0 0 1-.881-.088zM8 11.75a5.25 5.25 0 1 1 0-10.5 5.25 5.25 0 0 1 0 10.5zm0-1.5a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5z"></path></g></svg>
                                <svg class="down_caret" viewBox="0 0 24 24" width="16" height="16"><path d="M5.726 8.83A.5.5 0 0 1 6.102 8h11.796a.5.5 0 0 1 .376.83l-5.898 6.74a.5.5 0 0 1-.752 0L5.726 8.83z" fill="currentColor" fill-rule="evenodd"></path></svg>
                            </div>
                            <div class="accom_guests_extend">
                                <div class="hkJiNs"></div>
                                <div style="position:relative;">
                                    <div class="dsssji accom_guests_alert">
                                        <div class="TPxij">
                                            <label class="ijjuLW">Adults</label>
                                            <span class="egudlU select_option" min="1" max="15">
                                            <button type="button" class="fndzHx" id="accom_adults_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>
                                            <label for="adults"><input id="accom_adults" name="adults" readonly="" tabindex="-1" value="1"></label>
                                            <button type="button" class="active fndzHx" id="accom_adults_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
                                        </div>
                                        <div class="TPxij">
                                            <label class="ijjuLW">Children</label>
                                            <span class="egudlU select_option" min="1" max="15">
                                            <button type="button" class="fndzHx" id="accom_children_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>
                                            <label for="children"><input id="accom_children" name="children" readonly="" tabindex="-1" value="0"></label>
                                            <button type="button" class="active fndzHx" id="accom_children_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
                                        </div>
                                        <div class="TPxij">
                                            <label class="ijjuLW">Infants<span style="color: #8c8888;font-size: 10px;">(under 2)</span></label>
                                            <span class="egudlU select_option" min="1" max="15">
                                            <button type="button" class="fndzHx" id="accom_infants_decrease"><svg viewBox="0 0 24 24" width="1em" height="1em"><rect fill="currentColor" fill-rule="nonzero" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></svg></button>
                                            <label for="infants"><input id="accom_infants" name="infants" readonly="" tabindex="-1" value="0"></label>
                                            <button type="button" class="active fndzHx" id="accom_infants_increase"><svg viewBox="0 0 24 24" width="1em" height="1em"><g fill="currentColor" fill-rule="nonzero"><rect x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect><rect transform="rotate(-90 12 12)" x="7.059" y="11.294" width="9.882" height="1.412" rx="0.706"></rect></g></svg></button></span>
                                        </div>
                                        <button type="button" class="iCflgr" id="accom_guest_apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="response_add_trip_btn">
                            <div class="result-content">
                                <span class="result-nights">
                                    <span id="participants_adult">1</span> <span class="participants_nights custom_nights">night</span> at:
                                </span>
                                <span class="result-price">
                                    <span class="result-price-discounted"><span class="big" id="accom_discounted_price">$AUD230</span><small class="small">/pers</small></span>
                                    <span class="result-price-origin">instead of <span class="result-price-origin-strike" id="accom_origin_price">$AUD230</span></span>
                                </span>
                            </div>
                            <button class="add_trip_btn _d4g44p2 result-btn">Add to your trip</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>