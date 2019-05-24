<div class="selection">

  {{-- selected --}}
  <div class="selected">

    {{-- selected-title --}}
    <p class="selected-title">
      My selection <i class="fas fa-angle-down"></i>
    </p>
    {{-- ./ selected-title --}}

    {{-- details selected_content --}}
    <div class="details selected_content">
      @foreach($accoms_sel as $accom_sel)

        @php
          $sel_c ++;
        @endphp

        {{-- detail-item --}}
        <div class="detail-item">

          {{-- detail single_content --}}
          <div
            class="detail single_content"
            data-id="{{ $accom_sel->type_id }}"
            id="{{ $sel_c }}"
            data-source="{{ $accom }}"
            data-exp="{{ $exp_accom }}"
            data-img="{{ $accom_images }}"
            data-practical="{{ $accom_practical }}"
            data-experience="{{ $experience['arrival_date'] }}"
            data-reviews="{{ $reviews }}">

            @if($accom_sel->check_in == $accom_sel->check_out)

              @php
                $str1 = explode("-", $accom_sel->check_in);
                $check_in = $str1[2]."/".$str1[1]."/".$str1[0];
                $str2 = explode("-", $accom_sel->check_out);
                $day = (int)$str2[2] + 1;

                if ($day < 10) {
                  $day_ = "0".$day; 
                } else { 
                  $day_ = $day;
                }

                $check_out = $day_."/".$str2[1]."/".$str2[0];
              @endphp

            @else

              @php
                $str1 = explode("-", $accom_sel->check_in);
                $check_in = $str1[2]."/".$str1[1]."/".$str1[0];
                $str2 = explode("-", $accom_sel->check_out);
                $check_out = $str2[2]."/".$str2[1]."/".$str2[0]; 
              @endphp

            @endif

            {{-- selected-slideshow --}}
            <ul class="selected-slideshow">
              @foreach($accom_images as $accom_image)

                @if($accom_image->accom_id == $accom_sel->type_id)
                  <li>
                    <i
                      class="fas fa-heart slide-like accom"
                      data-id="{{ $accom_sel->type_id }}"
                      id="{{ $sel_c }}"></i>
                      <img src="{{ url($accom_image->path) }}" alt="">
                  </li>
                @endif

              @endforeach
            </ul>
            {{-- ./ selected-slideshow --}}

            @foreach($accoms as $accom)
              @if($accom)
                @if($accom->status != "false")

                  @if($accom->id == $accom_sel->type_id)
                    {{-- detail-info --}}
                    <div class="detail-info">

                      {{-- detail-info-head --}}
                      <div class="detail-info-head">

                        {{-- detail-info-address --}}
                        <p class="detail-info-address">
                          {{ $accom->full_address }}
                        </p>
                        {{-- ./ detail-info-address --}}

                        {{-- detail-info-name --}}
                        <p class="detail-info-name">
                          {{ $accom->name }}
                        </p>
                        {{-- ./ detail-info-name --}}

                        {{-- detail-discounted-price --}}
                          <p class='detail-discounted-price'>
                            <span class='detail-discounted-price-span'>
                              {{ $accom_sel->d_a_price }}
                            </span>
                            <small>/pers</small>
                          </p>
                        {{-- ./ detail-discounted-price --}}

                        {{-- detail-origin-price hidden --}}
                        <p class='detail-origin-price hidden'>
                          {{ $accom_sel->d_b_price }}
                        </p>
                        {{-- ./ detail-origin-price hidden --}}

                        {{-- detail-info-discount dHEojY hidden --}}
                        <p class='detail-info-discount dHEojY hidden'>
                          {{ $accom_sel->discount }}
                        </p>
                        {{-- ./ detail-info-discount dHEojY hidden --}}

                        @if($accom_sel->guests_num == 1)
                          <p class="detail-info-capacity">
                            <span class='detail-info-guests-num dHEojY'>
                              {{ $accom_sel->guests_num }}
                            </span> Guest coming
                          </p>
                        @else
                          <p class="detail-info-capacity">
                            <span class='detail-info-guests-num dHEojY'>
                              {{ $accom_sel->guests_num }}
                            </span> Guests coming
                          </p>
                        @endif

                      </div>
                      {{-- ./ detail-info-head --}}

                      {{-- detail-info-data origin eUhMAS hidden --}}
                      <div class="detail-info-data origin eUhMAS hidden">
                        <span class="detail-info-capacity">
                          {{ $accom->max_capacity }} guests
                        </span>
                        <span class="detail-info-rooms">
                          {{ $accom->room_nb }} rooms
                        </span>
                        <span class="detail-info-category">
                          {{ $accom->category }}
                        </span>
                      </div>
                      {{-- ./ detail-info-data origin eUhMAS hidden --}}

                    </div>
                    {{-- ./ detail-info --}}
                  @endif

                @endif
              @endif
            @endforeach
          </div>
          {{-- ./ detail single_content --}}
        </div>
        {{-- ./ detail-item --}}
      @endforeach
      <input id='elm_accom_sel' value="{{ $sel_c }}" type='hidden'>
    </div>
    {{-- ./ details selected_content --}}

  </div>
  {{-- ./ selected --}}

  {{-- form-content submit-mobile --}}
  <div class="form-content submit-mobile">

    <button
      type="button"
      class="_d4g44p2"
      aria-busy="false"
      id="save_accom">
        <span class="_cgr7tc7">Save my selection</span>
    </button>

    <input type="button" class="backbutton" aria-busy="false" id="back_accom" value="Back">

    <button
      type="button"
      class="_ky1ga6g undobutton"
      aria-busy="false"
      id="undo_accom">
        <span class="_cgr7tc7">Undo</span>
    </button>

  </div>
  {{-- ./ form-content submit-mobile --}}

</div>