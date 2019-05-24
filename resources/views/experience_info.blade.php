<section id="experience_info">

  {{-- header --}}
  <div class="header">

    <h2>
      Experience inspiring activities in {{ $offer->location_place }}.
    </h2>

    <p>
      <i>
        Bring fun to your everyday. Add activity to your trip if you think you deserve it.
      </i>
    </p>
  </div>
  {{-- ./ header --}}

  {{-- form_experience --}}
  <div class="details" id="form_experience">

    {{-- $activities loop --}}
    @foreach($activities as $act)

      @php
        $price_array_act = [];
        $discount_array_act = [];
      @endphp

      @if($act->status != "false")

        @foreach($prices_act as $price)
          @if ($price['activity_id'] == $act['id'])

            @php
              array_push($price_array_act, $price['price_a_discount']);
              array_push($discount_array_act, $price['discount']);
            @endphp

          @endif
        @endforeach

        @php
          $min_price_act = $price_array_act[0];
          for($i = 1; $i < count($price_array_act); $i ++) {
            if ($price_array_act[$i] < $min_price_act) {
              $min_price_act = $price_array_act[$i];
            }
          }

          $max_discount_act = $discount_array_act[0];
          for($i = 1; $i < count($discount_array_act); $i ++) {
            if ($discount_array_act[$i] > $max_discount_act) {
              $max_discount_act = $discount_array_act[$i];
            }
          }
        @endphp

        {{-- detail-item --}}
        <div class="detail-item">

          {{-- detail experience --}}
          <div
            class="detail experience"
            data-id="{{ $act->id }}"
            data-source="{{ $act }}"
            data-img="{{ $act_images }}"
            data-practical="{{ $act_practical }}"
            data-experience="{{ $experience['arrival_date'] }}"
            data-reviews="{{ $reviews }}">

            <ul class="gallery-slideshow">
              @foreach($act_images as $act_image)
                @if($act_image->act_id == $act->id)
                  <li>
                    <img src="{{ $act_image->path }}" alt="">
                  </li>
                @endif
              @endforeach
            </ul>

            {{-- detail-info --}}
            <div class="detail-info">
              {{-- detail-info-head --}}
              <div class="detail-info-head">

                @foreach($prices_act as $price)

                  @if ($price['activity_id'] == $act['id'] && $min_price_act == $price['price_a_discount'])
                    @php
                      $min_act_discount = $price->discount;
                    @endphp
                  @endif

                  @if ($price['activity_id'] == $act['id'] && $max_discount_act == $price['discount'])
                    @php
                      $max_act_discount = $price->discount;
                    @endphp
                  @endif

                @endforeach

                @php
                  $currency = 'AUD'; 
                  $discont10 = false;
                  $upto =  '-' . $max_act_discount * 100 . '%';
                  if($max_act_discount < 0.1 ) {
                    $discont10 = true;
                    $upto = $price['price_a_discount'] . $currency;
                  }
                @endphp

                <p class="detail-info-address">
                  {{ $act->address }}
                </p>

                <p class="detail-info-name">
                  {{ $act->name }}
                </p>

                <p class="detail-info-discount">
                  <span class="small">
                    @if(!$discont10) 
                      Up to
                    @endif
                  </span>
                  <span class="big">
                    {{ $upto }}
                  </span>
                </p>

              </div>
              {{-- ./ detail-info-head --}}

              {{-- detail-info-data origin eUhMAS --}}
              <div class="detail-info-data origin eUhMAS">
                @foreach ($act_practical as $pract)
                  @if($pract->act_id == $act->id)
                    <span class="detail-info-capacity">
                      {{ $pract->group_size}} guests
                    </span>
                    <span class="detail-info-experience">
                      {{ $act->category }}
                    </span>
                  @endif
                @endforeach
              </div>
              {{-- ./ detail-info-data origin eUhMAS --}}

            </div>
            {{-- ./ detail-info --}}

          </div>
          {{-- ./ detail experience --}}

        </div>
        {{-- ./ detail-item --}}

      @endif

    @endforeach
    {{-- ./ $activities loop --}}
  </div>
  {{-- ./ form_experience --}}

  {{-- selection --}}
  <div class="selection">
    <div class="selected">
      <p class="selected-title">My selection<i class="fas fa-angle-down"></i></p>
      <div class="details selected_content_act">
        @foreach($acts_sel as $act_sel)
          @php
            $sel_a++;
            $str1 = explode("-", $act_sel->check_in);
            $check_in = $str1[2]."/".$str1[1]."/".$str1[0];
          @endphp
          <div class="detail-item">
            <div
              class="detail activity single_content_act"
              data-id="{{ $act_sel->type_id }}"
              id="{{ $sel_a }}"
              data-source="{{ $act }}"
              data-img="{{ $act_images }}"
              data-practical="{{ $act_practical }}"
              data-experience="{{ $experience['arrival_date'] }}"
              data-reviews="{{ $reviews }}">

              <p class="detail-dates" id="act_date{{ $sel_a }}">
                Activity on <span>{{ $check_in }}</span>
              </p>

              <ul class="selected-slideshow">
                @foreach($act_images as $act_image)
                  @if($act_image->act_id == $act_sel->type_id)
                    <li>
                      <i class='fas fa-heart slide-like act' data-id='{{$act_sel->type_id}}' id='{{$sel_a}}'></i>
                      <img src="{{$act_image->path}}" alt="">
                    </li>
                  @endif
                @endforeach
              </ul>

              <div class="detail-info">
                @foreach($activities as $act)
                  @if($act->status != "false")

                    @php
                      $type_id = $act_sel->type_id;
                    @endphp

                    @if($act->id == $type_id)
                      <div class="detail-info-head">
                        @foreach($prices_act as $price)
                          @if ($price['activity_id'] == $act['id'] && $min_price_act == $price['price_a_discount'])
                            @php
                              $min_act_discount = $price->discount;
                            @endphp
                          @endif
                        @endforeach
                        <p class="detail-info-address">{{ $act->address }}</p>
                        <p class="detail-info-name">{{ $act->name }}</p>
                        <p class='detail-discounted-price'><span class='detail-discounted-price-span'>{{ $act_sel->d_a_price }}</span><small>/pers</small></p>
                        <p class='detail-origin-price hidden'>{{ $act_sel->d_b_price }}</p>
                        <p class='detail-info-discount dHEojY hidden'>{{ $act_sel->discount }}</p>
                        @if($act_sel->guests_num == 1)
                          <p class="detail-info-capacity"><span class='detail-info-guests-num dHEojY'>{{$act_sel->guests_num}}</span> Guest coming</p>
                        @else
                          <p class="detail-info-capacity"><span class='detail-info-guests-num dHEojY'>{{$act_sel->guests_num}}</span> Guests coming</p>
                        @endif
                      </div>
                      <div class="detail-info-data origin eUhMAS hidden">
                        @foreach ($act_practical as $pract)
                          @if ($pract->act_id == $act->id)
                            <span class="detail-info-capacity">{{ $pract->group_size }} guests</span>
                            <span class="detail-info-experience">{{ $act->category }}</span>
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
        <input id='elm_act_sel' value="{{ $sel_a }}" type='hidden'>
      </div>
      <div class="form-content submit-mobile">
        <button type="button" class="_d4g44p2" aria-busy="false" id="save_act"><span class="_cgr7tc7">Save my selection</span></button>
        <input type="button" class="backbutton" aria-busy="false" id="back_act" value="Back">
        <button type="button" class="_ky1ga6g undobutton" aria-busy="false" id="remove_act"><span class="_cgr7tc7">Undo</span></button>
      </div>
    </div>
  </div>
  {{-- ./ selection --}}

</section>