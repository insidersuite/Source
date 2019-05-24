@php
  $sel_c = 0;
  $flags = [];
  $sel_a = 100;
@endphp

@if(count($accoms) != 0)

  @if(request()->tab == 'accommodation')
    {{-- accommodation_info --}}
    <section id="accommodation_info">

      {{-- header --}}
      <div class="header">
        <h2>Book the ultimate accommodations in {{ $offer->location_place }}.</h2>
        <p><i>Get your wanderlust hyped up by adding multiple accommodation.</i></p>
      </div>
      {{-- ./ header --}}

      {{-- form_accommodation --}}
      <div class="details" id="form_accommodation">

        @foreach($accoms as $accom)

          @php
            $price_array = [];
            $discount_array = [];
          @endphp

          @foreach($prices_accom as $key => $price)
            @if ($price['accomodation_id'] == $accom['id'])

              @php
                array_push($price_array, $price['price_a_discount']);
                array_push($discount_array, $price['discount']);
              @endphp

            @endif
          @endforeach

          @php
            $min_price = $price_array[0];
            for($i = 1; $i < count($price_array); $i ++) {
              if ($price_array[$i] < $min_price) {
                $min_price = $price_array[$i];
              }
            }

            $max_dicount = $discount_array[0];
            for($i = 1; $i < count($discount_array); $i ++) {
              if ($discount_array[$i] > $max_dicount) {
                $max_dicount = $discount_array[$i];
              }
            }

          @endphp

          {{-- detail-item --}}
          <div class="detail-item">
            {{-- detail accomodation --}}
            <div
              class="detail accomodation"
              data-source="{{ $accom }}"
              data-exp="{{ $exp_accom }}"
              data-img="{{ $accom_images }}"
              data-practical="{{ $accom_practical }}"
              data-experience="{{ $experience['arrival_date'] }}"
              data-reviews="{{ $reviews }}">

              {{-- gallery-slideshow --}}
              <ul class="gallery-slideshow">
                @foreach($accom_images as $accom_image)
                  @if($accom_image->accom_id == $accom->id)
                    <li>
                      <img src="{{ $accom_image->path }}" alt="">
                    </li>
                  @endif
                @endforeach
              </ul>
              {{-- ./ gallery-slideshow --}}

              {{-- detail-info --}}
              <div class="detail-info">

                {{-- detail-info-head --}}
                <div class="detail-info-head">

                  @foreach($prices_accom as $price)
                    @if ($price['accomodation_id'] == $accom['id'] && $min_price == $price['price_a_discount'])
                      @php
                        $min_accom_discount = $price->discount;
                      @endphp
                    @endif
                  @endforeach

                  @php
                    $currency = 'AUD';
                    $discont10 = false;
                  @endphp

                  @foreach($prices_accom as $price)

                    @if ($price['accomodation_id'] == $accom['id'] && $max_dicount == $price['discount'])
                      @php
                        $max_accom_discount = $price->discount;
                        $max_accom_discount = $price->discount;
                        $upto =  '-' . $max_accom_discount * 100 . '%';
                        if($max_accom_discount < 0.1 ) {
                          $discont10 = true;
                          $upto = $price['price_a_discount'] . $currency;
                        }
                      @endphp
                    @endif
                  @endforeach

                  <p class="detail-info-address">{{ $accom->full_address }}</p>
                  <p class="detail-info-name">{{ $accom->name }}</p>
                  <p class="detail-info-discount">
                    <span class="small">
                      @if(!$discont10) Up to @else From @endif
                    </span>
                    <span class="big">{{ $upto }}</span>
                  </p>
                </div>
                {{-- ./ detail-info-head --}}

                {{-- detail-info-data origin eUhMAS --}}
                <div class="detail-info-data origin eUhMAS">
                  <span class="detail-info-capacity">
                    @if($accom->max_capacity == 1)
                      {{ $accom->max_capacity }} guest
                    @else
                      {{ $accom->max_capacity }} guests
                    @endif
                  </span>
                  <span class="detail-info-rooms">
                    @if($accom->room_nb == 1)
                      {{ $accom->room_nb }} room
                    @else
                      {{ $accom->room_nb }} rooms
                    @endif
                  </span>
                  <span class="detail-info-category">{{ $accom->category }}</span>
                </div>
                {{-- ./ detail-info-data origin eUhMAS --}}

              </div>
              {{-- ./ detail-info --}}

            </div>
            {{-- ./ detail accomodation --}}
          </div>
          {{-- ./ detail-item --}}
        @endforeach

      </div>
      {{-- ./ form_accommodation --}}

      @include('create_exp_accoms_selections')

    </section>
    {{-- ./ accommodation_info --}}
  @else
    @include('experience_info')
  @endif

  @include('includes.modal_1')
  @include('includes.modal_2')
  @include('includes.modal_3')

  <script>

    var origin_prices = "{{ $prices_accom }}";
    var origin_prices_na = "{{ $prices_accom_na }}";
    var act_prices = "{{ $prices_act }}";
    count_a = "{{ $count_a }}";
    count_c = "{{ $count_c }}";
    type = "{{ $type }}";
    _flags = "{{ $_flags }}";
    var f_count = "{{ $f_count }}";
    var sel_c = "{{ $sel_c }}";
    var sel_a = "{{ $sel_a }}";

    $('.slide-like.accom').click(function () {var id = $(this).attr('id');removeSelection(id, 'accoms');});
    $('.slide-like.act').click(function () {var id = $(this).attr('id');removeSelection(id, 'acts');});
  </script>

  <script type="text/javascript" src="{{ url('js/customize/create_experience_accom.js') }}"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&callback=initMap"></script>

  <script type="text/javascript">
    $('.gallery-slideshow').slideshow({
      width: 280,
      height: 210,
      interval: 1000000
    });
    if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod') {
      $(".response_add_trip_btn").css("position", "static");
      $(".setting-content").css("margin-bottom", "0px");
    }
  </script>

 @endif