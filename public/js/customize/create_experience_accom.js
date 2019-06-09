//---------------------Experience Section ------------------------
var currency_rate = localStorage.getItem('currency_rate')
var accom_selected_day1 = "", accom_selected_day2 = "";
var accom = {};
var exp_accom = [];
var head_imgs = [];
var count_a = 0;
var count_c = 0;
origin_prices = origin_prices.replace(/&quot;/g, '"');
var prices = JSON.parse(origin_prices);

origin_prices_na = origin_prices_na.replace(/&quot;/g, '"');
var prices_na = JSON.parse(origin_prices_na);

$(".accomodation").click(function (event) {

    if ($(event.target).closest('.gallery-navbar').length > 0) {
        return false;
    }
    if ($(event.target).is('.gallery-control')) {
        return false;
    }

    $(".part1-tab-content").html("");
    accom_selected_day1 = "";
    accom_selected_day2 = "";
    accom = $(this).data('source');
    imgs_accom = $(this).data('img');
    exp_accom = $(this).data('exp');
    if (accom.max_capacity == 1) {
        $(".part1-accom-max-capacity").html(accom.max_capacity + " guest");
    } else {
        $(".part1-accom-max-capacity").html(accom.max_capacity + " guests");
    }

    if (accom.room_nb == 1) {
        $(".part1-accom-room-nb").html(accom.room_nb + " room");
    } else {
        $(".part1-accom-room-nb").html(accom.room_nb + " rooms");
    }

    $(".part1-accom-category").html(accom.category);
    var practicals = $(this).data('practical');

    practicals.forEach(practical => {
        if (practical.accom_id == accom.id) {
        $("#check_in").html(practical.check_in);
        $("#check_out").html(practical.check_out);
        if (practical.breakfast == "false") {
            $("#breakfast_access").parent().parent().attr('style', 'display: none');
        } else {
            $("#breakfast_access").html(practical.breakfast_t);
        }
        if (practical.jacuzzi_access == "false") {
            $("#jacuzzi_access").parent().parent().attr('style', 'display: none');
        } else {
            $("#jacuzzi_access").html(practical.jacuzzi_t);
        }
        if (practical.gym_access == "false") {
            $("#gym").parent().parent().attr('style', 'display: none');
        } else {
            $("#gym").html(practical.gym_t);
        }
        $(".accomodation_note").html(practical.note);
        $("#accomodation_note").html(practical.note);
    }
});
    head_imgs = [];
    imgs_accom.forEach(img => {
        if (img.accom_id == accom.id) {
        var path = { path: img.path };
        head_imgs.push(path);
    }
});
//   dong 2-27
    deleteMarkers();

    setTimeout(function(){
        setMap(accom.location_latitude, accom.location_longtitude, "map");
    }, 100);
// end
    $(".headBg").attr('data-bg', accom.path);
    $(".headBg").attr('style', "background-image:url(" + accom.path + ")");
    $(".modal2-place").html(accom.name);
    $(".modal2-address").html(accom.full_address);
    $(".part1-accom-content").html(accom.content);
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) { dd = '0' + dd }
    if (mm < 10) { mm = '0' + mm }
    today = yyyy + '-' + mm + '-' + dd;

    var ndate = [];
    var min_price = 1000000;
    for (var i = 0; i < prices.length - 1; i++) {
        if (prices[i].accomodation_id == accom.id) {
            if (min_price > parseInt(prices[i].price_a_discount)) {
                min_price = prices[i].price_a_discount;
            }
        }
    }

    var max_discount = 0;
    for (var i = 0; i < prices.length - 1; i++) {
        if (prices[i].accomodation_id == accom.id) {
            if (max_discount < parseFloat(prices[i].discount)) {
                max_discount = prices[i].discount;
            }
        }
    }

//   console.log('accom Min'+min_price);
    prices.forEach(price => {
        if (price.accomodation_id == accom.id && price.nb_available != 0) {
        ndate.push(price.check_in_date);
    }
    var acc = $('#accom_guests').val();
    acc = +acc.substring(0, acc.indexOf(' '));
    if (parseFloat(price.discount) == max_discount && price.accomodation_id == accom.id) {
        var price_a = (currency_rate * Math.floor(price.price_a_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        var price_b = (currency_rate * Math.floor(price.price_b_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')

        $("#accom_discounted_price").html($('#user-currency').val() + price_a);
        $("#accom_origin_price").html($('#user-currency').val() + price_b);
        if(max_discount < 0.1) {
            upto = (currency_rate * price.price_a_discount).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,') + $('#user-currency').val();
            $('#accom_discont_text').html('From');
        }else {
            $('#accom_discont_text').html('Up to');
            upto = '-' + Math.round(max_discount * 100, 2) + "%";
        }
        $("#accom_discont").html(upto);
    }
});

    // make dates array extract block dates
    var enableDates = [];
    for (var i = 0; i < ndate.length; i++) {
        var today = convertDate(new Date());
        var diff = daysBetween(today, ndate[i]);

        if (diff >= 0) {
            enableDates.push(ndate[i]);
        } else {
            enableDates.push("2900-01-01");
        }
    }

    // find the nearest date of arrival date
    var arrival_date = $("#arrival_date").val();
    console.log("original form arrival date: ", arrival_date);
    var date_str = arrival_date.split("/");
    str_date = date_str[2] + "-" + date_str[1] + "-" + date_str[0];
    console.log("arrival_date: ",str_date);
    var count = 0;
    enableDates.forEach(sel => {
        if (daysBetween(str_date, sel) <= 0) {
        count ++;
    }
});
    console.log("count: ",count);
    console.log("accommodation available dates: ", enableDates);
    var diff = daysBetween(str_date, today);
    console.log("DaysBetween: ", diff);
    var diff_plus = daysBetween(str_date, enableDates[0]);
    var k = 0;
    for (var j = 0; j < enableDates.length; j++) {
        if (count > 0) {
            if (0 >= daysBetween(str_date, enableDates[j])) {
                if (diff <= daysBetween(str_date, enableDates[j])) {
                    console.log("nearer than before: ", enableDates[j]);
                    console.log("current min: ", diff);
                    diff = daysBetween(str_date, enableDates[j]);
                    console.log("new min: ", diff);
                    k = j;
                }
            }
        } else {
            if (0 < daysBetween(str_date, enableDates[j])) {
                if (daysBetween(str_date, enableDates[j]) < diff_plus) {
                    diff_plus = daysBetween(str_date, enableDates[j]);
                    k = j;
                }
            }
        }
    }
    str_date = enableDates[k];
    console.log("str_date"+str_date);

    //initialization of calendar
    $('.calender').pignoseCalendar({
        multiple: true,
        lang: 'en',
        date: moment(str_date),
        theme: 'light',
        format: 'YYYY-MM-DD',
        modal: false,
        initialize: false,
        enabledDates: enableDates,
        default: { str_date },
        select: function (date, context) {
            /**
             * @params this Element
             * @params date moment[]
             * @params context PignoseCalendarContext
             * @returns void
             */

                // This is selected button Element.
            var $this = $(this);

            // You can get target element in `context` variable, This element is same `$(this)`.
            var $element = context.element;

            // You can also get calendar element, It is calendar view DOM.
            var $calendar = context.calendar;

            // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
            // If you unselected date, It will be `null`.
            calendarEvent(date[0], date[1], accom.id);
        }
    });

    $("#accom_guest_apply").click(function() {
        var guests = parseInt($("#accom_adults").val());

        if(guests > accom.max_capacity ){
            alert('great than max control');
        }
        $("#accom_guests").val(guests + (guests > 1 ? " guests" : " guest" ));
        $(".dsssji").attr('style', 'display: none;');

        if ($(window).width() <= 767) {
            $('.setting-content').css('margin-bottom', '180px');
        }

        //   first bug
        accom_selected_day1 = "";
        accom_selected_day2 = "";
        enableDates = [];
        for (var i = 0; i < ndate.length; i++) {
            var today = convertDate(new Date());
            var diff = daysBetween(today, ndate[i]);

            if (diff >= 0) {
                enableDates.push(ndate[i]);
            } else {
                enableDates.push("2900-01-01");
            }
        }
        $('.calender').pignoseCalendar({
            multiple: true,
            lang: 'en',
            date: moment(str_date),
            theme: 'light',
            format: 'YYYY-MM-DD',
            modal: false,
            initialize: false,
            enabledDates: enableDates,
            default: { str_date },
            select: function (date, context) {
                /**
                 * @params this Element
                 * @params date moment[]
                 * @params context PignoseCalendarContext
                 * @returns void
                 */

                    // This is selected button Element.
                var $this = $(this);

                // You can get target element in `context` variable, This element is same `$(this)`.
                var $element = context.element;

                // You can also get calendar element, It is calendar view DOM.
                var $calendar = context.calendar;

                // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
                // If you unselected date, It will be `null`.
                calendarEvent(date[0], date[1], accom.id);
            }
        });
    });
    // show experiences
    var content = '';
    var exp_ids = [];
    exp_accom.forEach(exp => {
        if (exp.accom_id == accom.id) {
        exp_ids.push(exp);
    }
});
    if (exp_ids.length > 0) {
        content += "<ul class='part1-tab-content-list'>";
        exp_ids.forEach(exp => {
            var temp = "<li class='part1-tab-content-detail' id='" + exp.accom_id + "'><img src='" + exp.path + "' alt='" + exp.title + "'>" + "<p>" + exp.title + "</p></li>";
        content += temp;
    });
        content += "</ul>";
        content += "<script>$('.part1-tab-content-detail').click(function () {var id = $(this).attr('id'); showExperience(id);});</script>";
        $(".part1-tab-content").html(content);
        $(".part1-tab-title").attr('style', 'display: block;');
    } else {
        $(".part1-tab-title").attr('style', 'display: none;');
    }
    // show reviews
    //   dong fixed 2-26

    $(".part1-accom-reviews .review_total_rate").html(accom.review_rate);
    $(".part1-accom-reviews .review_total_count").html(accom.review + " reviews");
    $(".part1-accom-reviews .review_total .review_total_bar").css("width", accom.review_rate * 20 + '%');
    $('.accom_reviews').empty().html('');
    var reviews = $(this).data('reviews');
    var search_text = $(".part1-accom-reviews").html();
    if (accom.review == 0) {
        $('.part1-accom-reviews').addClass('blank');
        $('.part1-accom-reviews').attr('hidden', '');
    } else {
        $('.part1-accom-reviews').removeClass('blank');
        $('.part1-accom-reviews').removeAttr('hidden');
    }
    setTimeout(function(){
        reviews.forEach(sel => {
            if ((sel.type == "accommodation") && (sel.type_id == accom.id) && !search_text.includes(sel.username)) {
            var content ="<div class='part1-review'><div class='detail-review'><div class='review-header'>";
            if (sel.pic == null) {
                content += "<div class='review-avatar'><img src='//res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/c_fill,g_face,w_90,h_90/v1497970672/common/static/default-avatar'></div>";
            } else {
                content += "<div class='review-avatar'><img src='" + sel.pic + "' alt=''></div>";
            }
            content += "<div class='review-header-top'><span class='review-username'>" + sel.username + "</span><span class='review-date'>" + sel.created_at + "</span></div><div class='review-score'><span class='review_total_rate'>" + sel.grade + "</span><span class='review_total_bar_space'><span class='review_total_bar_space'><span class='review_total_bar' style='width:" + (sel.grade * 20) + "%;'></span></span></span></div></div>";
            content += "<p class='review-message'>" + sel.content + "</p></div></div>";
            $(".accom_reviews").append(content);
        }
    });
    }, 100);
//   end

    $("#myModal2").modal('show');

    var calendarEvent = function (first_d, end_d, selected_accom_id) {
        if (end_d != null) { // if the second date is available
            if (first_d != null) {
                var total_a_discount = 0, total_b_discount = 0; //variables for period total prices
                var period = []; //variable for contain all dates which user requested
                // check the period is linked with next month
                period.push($.datepicker.formatDate('yy-mm-dd', new Date(first_d._d))); // push the first date of requested into the period variable
                var str_start = $.datepicker.formatDate('yy-mm-dd', new Date(first_d._d)).split("-");
                if (end_d._i) {
                    var str_end = end_d._i.split("-"); // returns day-1
                    var end_month = parseInt(str_end[1]); // get real month
                    var end_date = parseInt(str_end[2]); // get real date
                } else {
                    var str_end = $.datepicker.formatDate('yy-mm-dd', new Date(end_d._d)).split("-"); // returns day-1
                    var end_month = parseInt(str_end[1]); // get real month
                    var end_date = parseInt(str_end[2]); // get real date
                }
                //case of same month
                if (str_start[1] == end_month) {
                    var period_length = end_date - str_start[2] + 1;
                    $("#participants_adult").html(period_length);
                    console.log(+period.length > 1);
                    if (+period.length > 1) {
                        $(".custom_nights").html('nights');
                    } else {
                        $(".custom_nights").html('night');
                    }
                    var middle_d = "";
                    for (var i = 1; i < period_length; i++) {
                        var day = parseInt(str_start[2]) + parseInt(i);
                        if (day < 10) {
                            middle_d = str_start[0] + "-" + str_start[1] + "-" + "0" + day;
                        } else {
                            middle_d = str_start[0] + "-" + str_start[1] + "-" + day;
                        }
                        period.push(middle_d);
                    }
                } else { // case of next month
                    var date = new Date();
                    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                    var str_lastday = $.datepicker.formatDate('yy-mm-dd', lastDay).split("-");
                    var middle_d = "";
                    var length = str_lastday[2] - str_start[2] + 1;
                    for (var i = 1; i < length; i++) {
                        var day = parseInt(str_start[2]) + parseInt(i);
                        middle_d = str_start[0] + "-" + str_start[1] + "-" + day;
                        period.push(middle_d);
                    }
                    for (var j = 0; j < end_date; j++) {
                        if (j + 1 < 10) { middle_d = str_end[0] + "-" + str_end[1] + "-" + "0" + (j + 1); }
                        else { middle_d = str_end[0] + "-" + str_end[1] + "-" + (j + 1); }
                        period.push(middle_d);
                    }
                }
                // sum of prices
                console.log("period"+period);


                period.forEach(p => {
                    prices.forEach(price => {
                    if (price.check_in_date == p && price.accomodation_id == selected_accom_id) {
                    total_a_discount += parseInt(price.price_a_discount);
                    total_b_discount += parseInt(price.price_b_discount);
                }
            });
            });
                var flag = {
                    'price': total_a_discount,
                    'start_day': period[0],
                    'end_day': period[period.length - 1]
                };
                flags.push(flag);
                accom_selected_day1 = period[0];
                accom_selected_day2 = period[period.length - 1];
                console.log('date'+accom_selected_day2);
                var d = parseInt(accom_selected_day2.split("-")[2]) + 1;
                if (d < 10) {
                    accom_selected_day2 = accom_selected_day2.split("-")[0] + "-" + accom_selected_day2.split("-")[1] + "-" + "0" + d;
                } else {
                    accom_selected_day2 = accom_selected_day2.split("-")[0] + "-" + accom_selected_day2.split("-")[1] + "-" + d;
                }

                $("#participants_adult").html(period.length);
                if (+period.length > 1) {
                    $(".custom_nights").html('nights');
                } else {
                    $(".custom_nights").html('night');
                }
                var acc = $('#accom_guests').val();
                acc = +acc.substring(0, acc.indexOf(' '));
                var total_a = (currency_rate * Math.floor(total_a_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                var total_b = (currency_rate * Math.floor(total_b_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                $("#accom_discounted_price").html($('#user-currency').val() + total_a);
                $("#accom_origin_price").html($('#user-currency').val() + total_b);
                //   $("#accom_discont").html(Math.round((total_b_discount - total_a_discount) / total_b_discount * 100, 2) + "%");

                // 2019-03-08

                var flag_disable = 0;
                period.forEach(p => {
                    prices_na.forEach(price_na => {
                    if (price_na.check_in_date == p && price_na.accomodation_id == selected_accom_id) {
                    flag_disable = 1;
                }
            });
            });

                if(flag_disable == 1) {
                    alert('The duration you selected has unavailable days. Please select again including only available days.');
                    flag_disable = 0;
                    $("#participants_adult").html(1);
                    $(".custom_nights").html('night');
                    var max_discount = 0;
                    for (var i = 0; i < prices.length - 1; i++) {
                        if (prices[i].accomodation_id == accom.id) {
                            if (max_discount < parseFloat(prices[i].discount)) {
                                max_discount = prices[i].discount;
                            }
                        }
                    }

                    //   console.log('accom Min'+min_price);

                    prices.forEach(price => {
                        if (price.accomodation_id == accom.id && price.nb_available != 0) {
                        ndate.push(price.check_in_date);
                    }
                    var acc = $('#accom_guests').val();
                    acc = +acc.substring(0, acc.indexOf(' '));
                    if (parseFloat(price.discount) == max_discount && price.accomodation_id == accom.id) {
                        var price_a = (currency_rate * Math.floor(price.price_a_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                        var price_b = (currency_rate * Math.floor(price.price_b_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                        $("#accom_discounted_price").html($('#user-currency').val() + price_a);
                        $("#accom_origin_price").html($('#user-currency').val() + price_b);
                    }
                });

                    accom_selected_day1 = "";
                    accom_selected_day2 = "";
                    enableDates = [];
                    for (var i = 0; i < ndate.length; i++) {
                        var today = convertDate(new Date());
                        var diff = daysBetween(today, ndate[i]);

                        if (diff >= 0) {
                            enableDates.push(ndate[i]);
                        } else {
                            enableDates.push("2900-01-01");
                        }
                    }
                    $('.calender').pignoseCalendar({
                        multiple: true,
                        lang: 'en',
                        // date: moment(str_date),
                        theme: 'light',
                        format: 'YYYY-MM-DD',
                        modal: false,
                        initialize: false,
                        enabledDates: enableDates,
                        // default: { str_date },
                        select: function (date, context) {
                            /**
                             * @params this Element
                             * @params date moment[]
                             * @params context PignoseCalendarContext
                             * @returns void
                             */

                                // This is selected button Element.
                            var $this = $(this);

                            // You can get target element in `context` variable, This element is same `$(this)`.
                            var $element = context.element;

                            // You can also get calendar element, It is calendar view DOM.
                            var $calendar = context.calendar;

                            // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
                            // If you unselected date, It will be `null`.
                            calendarEvent(date[0], date[1], accom.id);
                        }
                    });
                }

            } else if (first_d == null) { // select the single date after current date
                var flag = {
                    'price': "",
                    'start_day': "",
                    'end_day': ""
                };
                var _end_d = end_d._i;
                accom_selected_day1 = _end_d;
                var d = parseInt(_end_d.split("-")[2]) + 1;
                if (d < 10) {
                    accom_selected_day2 = _end_d.split("-")[0] + "-" + _end_d.split("-")[1] + "-" + "0" + d;
                } else {
                    accom_selected_day2 = _end_d.split("-")[0] + "-" + _end_d.split("-")[1] + "-" + d;
                }
                flag.start_day = _end_d.split("-")[0] + "-" + _end_d.split("-")[1] + "-" + _end_d.split("-")[2];
                flag.end_day = _end_d.split("-")[0] + "-" + _end_d.split("-")[1] + "-" + _end_d.split("-")[2];
                prices.forEach(price => {
                    if (price.accomodation_id == selected_accom_id && price.check_in_date == _end_d) {
                    flag.price = price.price_a_discount;
                    var acc = $('#accom_guests').val();
                    acc = +acc.substring(0, acc.indexOf(' '));
                    var price_a = (currency_rate * Math.floor(price.price_a_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                    var price_b = (currency_rate * Math.floor(price.price_b_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                    $("#participants_adult").html('1');
                    $(".custom_nights").html('night');
                    $("#accom_discounted_price").html($('#user-currency').val() + price_a);
                    $("#accom_origin_price").html($('#user-currency').val() + price_b);
                    //   $("#accom_discont").html(Math.round(price.discount * 100, 2) + "%");
                }
            });
                flags.push(flag);
            }
        } else { // select the single date before current date
            if(first_d != null){
                var flag = {
                    'price': "",
                    'start_day': "",
                    'end_day': ""
                };
                var start_d = first_d._i;
                accom_selected_day1 = start_d;
                var day2_date = parseInt(start_d.split("-")[2]) + 1;
                if (day2_date < 10) {
                    accom_selected_day2 = start_d.split("-")[0] + "-" + start_d.split("-")[1] + "-" + "0" + day2_date;
                } else {
                    accom_selected_day2 = start_d.split("-")[0] + "-" + start_d.split("-")[1] + "-" + day2_date;
                }
                flag.start_day = start_d.split("-")[0] + "-" + start_d.split("-")[1] + "-" + start_d.split("-")[2];
                flag.end_day = start_d.split("-")[0] + "-" + start_d.split("-")[1] + "-" + start_d.split("-")[2];
                prices.forEach(price => {
                    if (price.accomodation_id == selected_accom_id && price.check_in_date == start_d) {
                    flag.price = price.price_a_discount;
                    var acc = $('#accom_guests').val();
                    acc = +acc.substring(0, acc.indexOf(' '));
                    var price_a = (currency_rate * Math.floor(price.price_a_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                    var price_b = (currency_rate * Math.floor(price.price_b_discount/acc)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                    $("#participants_adult").html('1');
                    $(".custom_nights").html('night');
                    $("#accom_discounted_price").html($('#user-currency').val() + price_a);
                    $("#accom_origin_price").html($('#user-currency').val() + price_b);
                    // $("#accom_discont").html(Math.round(price.discount * 100, 2) + "%");
                }
            });
                flags.push(flag);
            } else {
                accom_selected_day1 = "";
                accom_selected_day2 = "";
                enableDates = [];
                for (var i = 0; i < ndate.length; i++) {
                    var today = convertDate(new Date());
                    var diff = daysBetween(today, ndate[i]);

                    if (diff >= 0) {
                        enableDates.push(ndate[i]);
                    } else {
                        enableDates.push("2900-01-01");
                    }
                }
                $('.calender').pignoseCalendar({
                    multiple: true,
                    lang: 'en',
                    // date: moment(str_date),
                    theme: 'light',
                    format: 'YYYY-MM-DD',
                    modal: false,
                    initialize: false,
                    enabledDates: enableDates,
                    // default: { str_date },
                    select: function (date, context) {
                        /**
                         * @params this Element
                         * @params date moment[]
                         * @params context PignoseCalendarContext
                         * @returns void
                         */

                            // This is selected button Element.
                        var $this = $(this);

                        // You can get target element in `context` variable, This element is same `$(this)`.
                        var $element = context.element;

                        // You can also get calendar element, It is calendar view DOM.
                        var $calendar = context.calendar;

                        // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
                        // If you unselected date, It will be `null`.
                        calendarEvent(date[0], date[1], accom.id);
                    }
                });
            }
        }
    };
});
function showExperience(id) {

    // fixed by Dong
    var data = $(".experience-content").data('id');
    var data_categories = $(".experience-content").data('category');

    var total_data = [];
    for(var i = 0; i < data_categories.length; i++) {
        total_data.push({
            name : data_categories[i].category,
            data : []
        });
        for(var j = 0; j < data.length; j++) {
            if(data[j].category == data_categories[i].category && data[j].exp_id == id) {
                total_data[i].data.push(data[j].path);
            }
        }
    }
    $(".all_image_div").html("");
    if (total_data.length != 0) {
        var single_div = "";
        for(var k = 0; k < total_data.length; k++){
            if(total_data[k]['data'].length != 0) {
                single_div = "<div class='breakfast_'>";
                single_div += "<h2 class='jhDePP' style='text-transform: capitalize;'>" + total_data[k]['name'] + "</h2><div class='fDEzJd'><img class='image_' src='" + total_data[k]['data'][0] + "'></div>";
                single_div += "<div class='row isksGx' gutter='10'>";
                for (var l = 1; l < total_data[k]['data'].length; l ++) {
                    single_div += "<div class='col-xs-12 col-md-6 btgdIN'><div class='fDEzJd'><div class='gKZlhh'><img class='image_' src='" + total_data[k]['data'][l] + "'></div></div></div>";
                }
                single_div += "</div>";
                single_div += "</div>";
                $(".all_image_div").append(single_div);
                if(navigator.platform == 'iPad' || navigator.platform == 'iPod')
                {
                    $(".btgdIN.col-md-6").css("width", "49%");
                    $(".btgdIN.col-md-6").css("flex", "0 0 49%");
                }
            } else {
                continue;
            }
        }
    }
    // End

    $(".navbar").attr('style', 'display: none');
    $(".modal-experience-place").html("Welcome to " + accom.name + "*****");
    $("#modal-experience").modal('show');
}

$("#discover_hotel,.discover_hotel").click(function () {
    showExperience(accom.id);
});
$("#modal-experience").on("hidden.bs.modal", function () {
    // put your default event here
    $(".navbar").attr('style', 'display: block;');
});
$(".experience-model-close").click(function () {
    $(".navbar").attr('style', 'display: block;');
    $("#modal-experience").modal('hide');
});

$("#save_accom").click(function () {
    console.log(count_a);
    console.log(sel_accoms);
    if(sel_accoms.length == 0) {
        elm_accom_sel = $('#elm_accom_sel').val();
        if(elm_accom_sel > 0) {
            for(var i=1; i <= elm_accom_sel; i++ ) {
                sel_accoms.push(i);
            }
            //sel_c = elm_accom_sel;
        }
    }
    if (count_a != sel_accoms.length) {
        var trigger_count = 0;
        var data_array = [];
        sel_accoms.forEach(sel => {
        var x = document.getElementById(sel);
        if($("#"+sel).length <= 0) {
            return;
        }
        
        var y = x.getElementsByClassName("detail-info");
        var res_ = y[0].getElementsByClassName("detail-origin-price");
        var res = y[0].getElementsByClassName("detail-discounted-price-span");
        var d = y[0].getElementsByClassName("detail-info-discount");
        var c = y[0].getElementsByClassName("detail-info-guests-num");
        var str1 = $("#check_in" + sel).html().split("/");
        var check_in = str1[2] + "-" + str1[1] + "-" + str1[0];
        var str2 = $("#check_out" + sel).html().split("/");
        var check_out = str2[2] + "-" + str2[1] + "-" + str2[0];
        var data = {
            'experience_id': exp_id,
            'type_id': $("#"+sel).data('id'),
            'check_in': check_in,
            'check_out': check_out,
            'd_a_price': res[0].innerHTML,
            'd_b_price': res_[0].innerHTML,
            'discount': d[0].innerHTML,
            'guests_num': c[0].innerHTML,
            'type': 'accommodation'
        };

        flags.forEach(flag => {
            if (flag.price == data.d_a_price.replace('$', '') && flag.start_day == data.check_in) {
            data.check_out = flag.end_day;
        }
    });

        data_array.push(data);
        trigger_count++;
    });

        var ajax_data = {
            'data': data_array
        };

        if (trigger_count == sel_accoms.length) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'create_accom_info',
                data: ajax_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    count_a = sel_accoms.length;
                    console.log("ajax_result"+e);
                }
            });
        }

        $("#experience").trigger("click");
        $(".progress_bar").attr('style', 'width: 20%');
        $(".submit_count").html('4');
    } else if (sel_accoms.length == 0) {
        var data = {
            'experience_id': exp_id,
            'type': 'accommodation'
        };
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'delete_accom_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                console.log(e);
                $("#experience").trigger("click");
            }
        });
    } else {
        $("#experience").trigger("click");
    }
});

$("#back_accom").click(function () {
    $("#accommodation_info").hide();
    $('#general_info').show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".experience-content").animate({ scrollTop: 0 }, "slow");
});

$("#back_act").click(function () {
    $("#experience_info").hide();
    $('#accommodation_info').show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".experience-content").animate({ scrollTop: 0 }, "slow");
});

$("#back_review").click(function () {
    $("#review_info").hide();
    $('#experience_info').show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".experience-content").animate({ scrollTop: 0 }, "slow");
});

$("#back_payment").click(function () {
    $("#payment_info").hide();
    $('#review_info').show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    $(".experience-content").animate({ scrollTop: 0 }, "slow");
});

$("#undo_accom").click(function () {
    // $.ajax({
    //     type: 'post',
    //     dataType: 'json',
    //     url: 'undo_accom_info',
    //     data: { 'experience_id': exp_id },
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success: function (e) {
    //         location.reload(true);
    //     }
    // });
    $("#accommodation_info").attr('style', 'display: none');
    $("#general_info").attr('style', 'display: block');
    $("#experience_info").attr('style', 'display: none');
    $("#invite_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');

    $("#general").addClass('active');
    $("#accomodation").removeClass('active');
    $("#experience").removeClass('active');
    $("#invite").removeClass('active');
    $("#review").removeClass('active');
    $("#payment").removeClass('active');

    var height = $(".experience-content").height();
    $(".sidebar").height(height);

    if ($(window).width() <= 414) {
      $(".sidebar").attr('style', 'display: none;');
      $("._66jk8g").attr('style', 'display: block;');
      $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
    }
});

$(".add_trip_btn").click(function () {
    if ($(window).width() <= 768) {
        document.getElementById("accomodation_bottom").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
    }
    var date_diff_indays = function(date1, date2) {
        dt1 = new Date(date1);
        dt2 = new Date(date2);
        return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
    }
    day_booking = date_diff_indays(accom_selected_day1, accom_selected_day2);
    if(accom.min_day_booking > 0 && parseInt(day_booking) < parseInt(accom.min_day_booking)) {
        alert('Minimum stay: ' + accom.min_day_booking + ' nights');
        return;
    }
    elm_accom_sel = $('#elm_accom_sel').val();
    if(elm_accom_sel > 0) {
        for(var i=1; i <= elm_accom_sel; i++ ) {
            sel_accoms.push(i);
        }
        sel_c = elm_accom_sel;
    }

    if (accom_selected_day1 != '') {
        var content = create_selected_html();
        sel_accoms.push(sel_c);
        content += "<script>$('.slide-like').click(function () {var id = $(this).attr('id');removeSelection(id, 'accoms');});</script>";
        $(".selected_content").append(content);
        // $('#' + sel_c + '.gallery-slideshow').slideshow({interval: 5000,width: 205,height: 170});
        $('.selected-slideshow').slideshow({interval: 1000000,width: 187,height: 140});
        $("#myModal2").modal('hide');
    } else { alert("please select the date on the calendar."); }
});
var create_selected_html = function () {
    var str1 = accom_selected_day1.split("-");
    var day1 = str1[2] + "/" + str1[1] + "/" + str1[0];
    var str2 = accom_selected_day2.split("-");
    var day2 = str2[2] + "/" + str2[1] + "/" + str2[0];
    sel_c++;
    var acc = $('#accom_guests').val();
    acc = +acc.substring(0, acc.indexOf(' '));
    var temp = "";
    if (acc == 1) {
        temp = "<div class='detail-item'><div class='detail accomodation single_content' data-id='" + accom.id + "'" + "id='" + sel_c + "'><p class='detail-dates'>From <span id='check_in" + sel_c + "'>" + day1 + "</span> to <span id='check_out" + sel_c + "'>" + day2 + "</span></p>";
        temp += "<ul class='selected-slideshow'>";
        head_imgs.forEach(img => {
            temp += "<li><i class='fas fa-heart slide-like' data-id='" + accom.id + "'" + "id='" + sel_c + "'></i><img src='" + img.path + "' alt=''></li>";
    });
        temp += "</ul>";
        temp += "<div class='detail-info'>";
        temp += "<div class='detail-info-head'><p class='detail-info-address'>" + accom.full_address + "</p>" + "<p class='detail-info-name'>" + accom.name + "</p><p class='detail-discounted-price'><span class='detail-discounted-price-span'>" + $('#accom_discounted_price').html() + "</span><small>/pers</small></p><p class='detail-origin-price hidden'>" + $('#accom_origin_price').html() + "</p><p class='detail-info-discount hidden'>" + $('#accom_discont').html() + "</p><p class='detail-info-capacity'><span class='detail-info-guests-num dHEojY'>"+acc+"</span> Guest coming</p></div>";
        temp += "<div class='detail-info-data origin eUhMAS hidden'><span class='detail-info-capacity'>" + accom.max_capacity + " guests</span><span class='detail-info-rooms'>" + accom.room_nb + " rooms</span><span class='detail-info-category'>" + accom.category + "</span></div>";
        temp += "</div>";
        temp += "</div></div>";
    } else {
        temp = "<div class='detail-item'><div class='detail accomodation single_content' data-id='" + accom.id + "'" + "id='" + sel_c + "'><p class='detail-dates'>From <span id='check_in" + sel_c + "'>" + day1 + "</span> to <span id='check_out" + sel_c + "'>" + day2 + "</span></p>";
        temp += "<ul class='selected-slideshow'>";
        head_imgs.forEach(img => {
            temp += "<li><i class='fas fa-heart slide-like' data-id='" + accom.id + "'" + "id='" + sel_c + "'></i><img src='" + img.path + "' alt=''></li>";
    });
        temp += "</ul>";
        temp += "<div class='detail-info'>";
        temp += "<div class='detail-info-head'><p class='detail-info-address'>" + accom.full_address + "</p>" + "<p class='detail-info-name'>" + accom.name + "</p><p class='detail-discounted-price'><span class='detail-discounted-price-span'>" + $('#accom_discounted_price').html() + "</span><small>/pers</small></p><p class='detail-origin-price hidden'>" + $('#accom_origin_price').html() + "</p><p class='detail-info-discount hidden'>" + $('#accom_discont').html() + "</p><p class='detail-info-capacity'><span class='detail-info-guests-num dHEojY'>"+acc+"</span> Guests coming</p></div>";
        temp += "<div class='detail-info-data origin eUhMAS hidden'><span class='detail-info-capacity'>" + accom.max_capacity + " guests</span><span class='detail-info-rooms'>" + accom.room_nb + " rooms</span><span class='detail-info-category'>" + accom.category + "</span></div>";
        temp += "</div>";
        temp += "</div></div>";
    }

    /*temp += "<div class='eUhMAS'><span>Total: </span><span class='gTJpzd'><b>" + $("#accom_discounted_price").html() + "</b></span>" + "<del class='gNVZZi'>" + $("#accom_origin_price").html() + "</del>" + "<span class='dHEojY'>" + $("#accom_discont").html() + "</span></div></div>";*/

    return temp;
};
var removeSelection = function (id, type) {
    console.log(type);
    console.log(sel_accoms)
    if (type == "accoms") {
        // if (sel_accoms.length > 0 ) {
        var x = document.getElementById(id);
        var y = x.getElementsByClassName("detail-info");
        var res_ = y[0].getElementsByClassName("detail-origin-price");
        var res = y[0].getElementsByClassName("detail-discounted-price-span");
        var d = y[0].getElementsByClassName("detail-info-discount");
        var c = y[0].getElementsByClassName("detail-info-guests-num");
        var str1 = $("#check_in" + id).html().split("/");
        var check_in = str1[2] + "-" + str1[1] + "-" + str1[0];
        var str2 = $("#check_out" + id).html().split("/");
        var check_out = str2[2] + "-" + str2[1] + "-" + str2[0];
        var data = {
            'experience_id': exp_id,
            'type_id': $("#"+id).data('id'),
            'check_in': check_in,
            'check_out': check_out,
            'd_a_price': res[0].innerHTML,
            'd_b_price': res_[0].innerHTML,
            'discount': d[0].innerHTML,
            'guests_num': c[0].innerHTML,
            'type': 'accommodation'
        };
        flags.forEach(flag => {
            if (flag.price == data.d_a_price.replace('$', '') && flag.start_day == data.check_in) {
            data.check_out = flag.end_day;
        }
    });
        console.log(data);
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'remove_accom_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                console.log(e);
                count_a--;
                x.parentElement.style.display='none';
            }
        });
        // }
        if (sel_accoms.findIndex(e => { return e == id }) != "-1") {
            sel_accoms.splice(sel_accoms.findIndex(e => { return e == id }), 1);
            $("#" + id).closest('.detail-item').remove();
        }
    } else {
        console.log("removeSelection: ", sel_acts);
        // if (sel_acts.length > 0 ) {
        var x = document.getElementById(id);
        var y = x.getElementsByClassName("detail-info");
        var res_ = y[0].getElementsByClassName("detail-origin-price");
        var res = y[0].getElementsByClassName("detail-discounted-price-span");
        var d = y[0].getElementsByClassName("detail-info-discount");
        var c = y[0].getElementsByClassName("detail-info-guests-num");
        var date_ = $("#act_date" + id).find('span').text();
        console.log("id"+id);
        console.log("date"+date_);
        var str = date_.split("/");
        var date = str[2] + "-" + str[1] + "-" + str[0];
        var data = {
            'experience_id': exp_id,
            'type_id': $("#"+id).data('id'),
            'check_in': date,
            'check_out': date,
            'd_a_price': res[0].innerHTML,
            'd_b_price': res_[0].innerHTML,
            'discount': d[0].innerHTML,
            'guests_num': c[0].innerHTML,
            'type': 'activity'
        };
        console.log(data);
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'remove_act_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                console.log(e);
                count_c--;
                x.parentElement.style.display='none';
            }
        });
        // }
        if (sel_acts.findIndex(e => { return e == id }) != "-1") {
            sel_acts.splice(sel_acts.findIndex(e => { return e == id }), 1);
            $("#" + id).closest('.detail-item').remove();
        }
    }
};
$("#experience_view").click(function () {
    $('.modal-content').animate({
        scrollTop : 800
    }, 500);
});
$("#street_view").click(function () {
    $('.modal-content').animate({
        scrollTop : 1200
    }, 500);
});
function getGuests() {
    var guests = parseInt($("#accom_adults").val()) + parseInt($("#accom_children").val()) + parseInt($("#accom_infants").val());
    return guests;
}

$("#accom_adults_increase").click(function () {
    $("#accom_adults_decrease").attr("disabled", false);
    if(getGuests() ==  accom.max_capacity ) {
        $("#accom_adults_increase").attr("disabled", true);
        return;
    }
    var count =  $("#accom_adults").val();
    if (count != 15) {
        count ++;
        $("#accom_adults").val(count);
    } else {
        count = 1;
        $("#accom_adults_increase").attr("disabled", true);
    }
});
$("#accom_adults_decrease").click(function () {
    $("#accom_adults_increase").attr("disabled", false);
    $("#accom_children_increase").attr("disabled", false);
    $("#accom_infants_increase").attr("disabled", false);
    // if(getGuests() ==  accom.min_capacity ) {
    //     $("#accom_adults_decrease").attr("disabled", true);
    //     return;
    // }
    var count =  $("#accom_adults").val();
    if (count != 1) {
        count --;
        $("#accom_adults").val(count);
    } else {
        count = 1;
        $("#accom_adults_decrease").attr("disabled", true);
    }
});
$("#accom_children_increase").click(function () {
    $("#accom_children_decrease").attr("disabled", false);
    if(getGuests() ==  accom.max_capacity ) {
        $("#accom_children_increase").attr("disabled", true);
        return;
    }
    var count =  $("#accom_children").val();
    if (count != 15) {
        count ++;
        $("#accom_children").val(count);
    } else {
        count = 0;
        $("#accom_children_increase").attr("disabled", true);
    }
});
$("#accom_children_decrease").click(function () {
    $("#accom_adults_increase").attr("disabled", false);
    $("#accom_children_increase").attr("disabled", false);
    $("#accom_infants_increase").attr("disabled", false);
    // if(getGuests() ==  accom.min_capacity ) {
    //     $("#accom_children_decrease").attr("disabled", true);
    //     return;
    // }
    var count =  $("#accom_children").val();
    if (count != 0) {
        count --;
        $("#accom_children").val(count);
    } else {
        count = 0;
        $("#accom_children_decrease").attr("disabled", true);
    }
});
$("#accom_infants_increase").click(function () {
    $("#accom_infants_decrease").attr("disabled", false);
    if(getGuests() ==  accom.max_capacity ) {
        $("#accom_infants_increase").attr("disabled", true);
        return;
    }
    var count =  $("#accom_infants").val();
    if (count != 15) {
        count ++;
        $("#accom_infants").val(count);
    } else {
        count = 0;
        $("#accom_infants_increase").attr("disabled", true);
    }
});
$("#accom_infants_decrease").click(function () {
    $("#accom_adults_increase").attr("disabled", false);
    $("#accom_children_increase").attr("disabled", false);
    $("#accom_infants_increase").attr("disabled", false);
    // if(getGuests() ==  accom.min_capacity ) {
    //     $("#accom_infants_decrease").attr("disabled", true);
    //     return;
    // }
    var count =  $("#accom_infants").val();
    if (count != 0) {
        count --;
        $("#accom_infants").val(count);
    } else {
        count = 0;
        $("#accom_infants_decrease").attr("disabled", true);
    }
});
// dong 2-28
$("#act_guests").click(function () {
    $(".act_guests_alert").attr('style', 'display: block; width:100%;');
    if ($(window).width() <= 767) {
        $('.setting-content').css('margin-bottom', '380px');
    }
});

$("#accom_guests").click(function () {
    console.log("clicked");
    $(".accom_guests_alert").attr('style', 'display: block; width:100%;');
    if ($(window).width() <= 767) {
        $('.setting-content').css('margin-bottom', '380px');
    }
});
// TODO
function getGuestsAct() {
    var guests = parseInt($("#act_adults").val()) + parseInt($("#act_children").val()) + parseInt($("#act_infants").val());
    return guests;
}
$("#act_adults_increase").click(function () {
    $("#act_adults_decrease").attr("disabled", false);
    if(getGuestsAct() ==  act.group_size ) {
        $("#act_adults_increase").attr("disabled", true);
        return;
    }

    var count =  $("#act_adults").val();
    if (count != 15) {
        count ++;
        $("#act_adults").val(count);
    } else {
        count = 1;
        $("#act_adults_increase").attr("disabled", true);
    }
});
$("#act_adults_decrease").click(function () {
    $("#act_adults_increase").attr("disabled", false);
    if(getGuestsAct() <=  act.min_capacity ) {
        $("#act_adults_decrease").attr("disabled", true);
        return;
    }
    var count =  $("#act_adults").val();
    if (count != 1) {
        count --;
        $("#act_adults").val(count);
    } else {
        count = 1;
        $("#act_adults_decrease").attr("disabled", true);
    }
});
$("#act_children_increase").click(function () {
    $("#act_children_decrease").attr("disabled", false);
    if(getGuestsAct() ==  act.group_size ) {
        $("#act_children_increase").attr("disabled", true);
        return;
    }
    var count =  $("#act_children").val();
    if (count != 15) {
        count ++;
        $("#act_children").val(count);
    } else {
        count = 0;
        $("#act_children_increase").attr("disabled", true);
    }
});
$("#act_children_decrease").click(function () {
    $("#act_children_increase").attr("disabled", false);
    if(getGuestsAct() <=  act.min_capacity ) {
        $("#act_children_decrease").attr("disabled", true);
        return;
    }
    var count =  $("#act_children").val();
    if (count != 0) {
        count --;
        $("#act_children").val(count);
    } else {
        count = 0;
        $("#act_children_decrease").attr("disabled", true);
    }
});
$("#act_infants_increase").click(function () {
    $("#act_infants_decrease").attr("disabled", false);
    if(getGuestsAct() == act.group_size ) {
        $("#act_infants_increase").attr("disabled", true);
        return;
    }
    var count =  $("#act_infants").val();
    if (count != 15) {
        count ++;
        $("#act_infants").val(count);
    } else {
        count = 0;
        $("#act_infants_increase").attr("disabled", true);
    }
});
$("#act_infants_decrease").click(function () {
    $("#act_infants_increase").attr("disabled", false);
    if(getGuestsAct() <=  act.min_capacity ) {
        $("#act_infants_decrease").attr("disabled", true);
        return;
    }
    var count =  $("#act_infants").val();
    if (count != 0) {
        count --;
        $("#act_infants").val(count);
    } else {
        count = 0;
        $("#act_infants_decrease").attr("disabled", true);
    }
});


//-------------------Activity Section------------------------
act_prices = act_prices.replace(/&quot;/g, '"');
var _prices = JSON.parse(act_prices);
var act = [];
$(".experience").click(function () {

    if ($(event.target).closest('.gallery-navbar').length > 0) {
        return false;
    }
    if ($(event.target).is('.gallery-control')) {
        return false;
    }

    act_selected_day = "";
    act = $(this).data('source');
    imgs_act = $(this).data('img');
    var practicals = $(this).data('practical');

    //attach information about activity & practical
    $("#address_activity").html(act.address);
    $(".part1-exp-category").html(act.category);
    $("#activity_lang").html("Offered in " + act.language);
    $(".modal2-exp").html(act.name);
    $(".part1-act-content").html(act.content);

    practicals.forEach(practical => {
        if (practical.act_id == act.id) {
            act.group_size = practical.group_size;
        $("#activity_arrival_date").html("Starts at " + practical.start_time);
        $("#activity_activity_hours").html(practical.total_hours + " hours total");
        if (practical.parking == "true") {
            $("#activity_parking").html("Meal provided");
        } else {
            $("#activity_parking").html("Bring your meal");
        }
        $("#activity_group").html("Group of " + practical.group_size + " people");
        $('.part1-exp-max-capacity').html(practical.group_size + " guests");
        $("#activity_address").html(practical.address);
        $("#cancellation").html(practical.provided);
        $("#activity_bring").html(practical.bring);
        $("#activity_there").html(practical.there);
        $("#activity_know").html(practical.know);

    }
});
    //attach slide shows
    var content = [];
    content += "<ul class='theTarget'>";
    imgs_act.forEach(img => {
        if (img.act_id == act.id) {
        var temp = "<li style='background-image:url(" + img.path + ");'></li>";
        content += temp;
    }
});
    content += "</ul>";
    content += "<script>$('.theTarget').slideshow({interval: 8000,height: 350});</script>";
    $(".slider-modal").html(content);

    // init map
//   dong 2-27
    deleteMarkers();

    setTimeout(function(){
        setMap(act.location_latitude, act.location_longitude, "location");
    }, 100);
//   end
    // prepare calendar
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) { dd = '0' + dd }
    if (mm < 10) { mm = '0' + mm }
    today = yyyy + '-' + mm + '-' + dd;

    var ndate = [];
    var min_price = 1000000;
    for (var i = 0; i < _prices.length - 1; i++) {
        if (_prices[i].activity_id == act.id) {
            if (min_price > parseInt(_prices[i].price_a_discount)) {
                min_price = _prices[i].price_a_discount;
            }
        }
    }

    var max_discount_act = 0;
    for (var i = 0; i < _prices.length - 1; i++) {
        if (_prices[i].activity_id == act.id) {
            if (max_discount_act < parseFloat(_prices[i].discount)) {
                max_discount_act = _prices[i].discount;
            }
        }
    }
//   console.log('act Min'+min_price);

    _prices.forEach(price => {
        if (price.activity_id == act.id && price.nb_available != 0) {
        ndate.push(price.check_in_date);
    }
    var acc_act = $('#act_guests').val();
    acc_act = +acc_act.substring(0, acc_act.indexOf(' '));
    if (parseFloat(price.discount) == max_discount_act && price.activity_id == act.id) {
        var price_a = (currency_rate * Math.floor(price.price_a_discount)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        var price_b = (currency_rate * Math.floor(price.price_b_discount)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
        $("#act_discounted_price").html($('#user-currency').val() + price_a);
        $("#act_origin_price").html($('#user-currency').val() + price_b);
        $("#act_discont").html('-' + Math.round(max_discount_act * 100, 2) + "%");
    }
});
    // make dates array extract block dates
    var enableDates = [];
    for (var i = 0; i < ndate.length; i++) {
        var today = convertDate(new Date());
        var diff = daysBetween(today, ndate[i]);

        if (diff >= 0) {
            enableDates.push(ndate[i]);
        } else {
            enableDates.push("2900-01-01");
        }
    }
    // find the nearest date of arrival date
    var arrival_date = $("#arrival_date").val();
    console.log("original form of arrival date: ", arrival_date);
    var date_str = arrival_date.split("/");
    str_date = date_str[2] + "-" + date_str[1] + "-" + date_str[0];
    console.log("arrival date: ", str_date);
    var count = 0;
    enableDates.forEach(sel => {
        if (daysBetween(str_date, sel) < 0) {
        count ++;
    }
});
    console.log("count: ", count);
    console.log("activity available dates: ", enableDates);
    var diff = daysBetween(str_date, today);
    var diff_plus = daysBetween(str_date, enableDates[0]);
    var k = 0;
    for (var j = 0; j < enableDates.length; j++) {
        if (count > 0) {
            if (0 >= daysBetween(str_date, enableDates[j])) {
                if (diff <= daysBetween(str_date, enableDates[j])) {
                    diff = daysBetween(str_date, enableDates[j]);
                    k = j;
                }
            }
        } else {
            if (0 < daysBetween(str_date, enableDates[j])) {
                if (daysBetween(str_date, enableDates[j]) < diff_plus) {
                    diff_plus = daysBetween(str_date, enableDates[j]);
                    k = j;
                }
            }
        }
    }

    str_date = enableDates[k];
    //initialization of calendar
    $('.act_calender').pignoseCalendar({
        multiple: false,
        lang: 'en',
        date: moment(str_date),
        theme: 'light',
        format: 'YYYY-MM-DD',
        modal: false,
        initialize: false,
        enabledDates: enableDates,
        select: function (date, context) {
            /**
             * @params this Element
             * @params date moment[]
             * @params context PignoseCalendarContext
             * @returns void
             */

                // This is selected button Element.
            var $this = $(this);

            // You can get target element in `context` variable, This element is same `$(this)`.
            var $element = context.element;

            // You can also get calendar element, It is calendar view DOM.
            var $calendar = context.calendar;

            // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
            // If you unselected date, It will be `null`.
            calendarActEvent(date[0], act.id);
        }
    });

    $("#act_guest_apply").click(function() {
        var guests = parseInt($("#act_adults").val());
        if(guests < act.min_capacity) {
            alert('Min capacity guests ' + act.min_capacity);
            return;
        }

        if(guests > act.group_size ){
            alert('great than max control ' + act.group_size);
            returneturn;
        }
        
        var guests_text = (guests > 1) ? " guests" : " guest"
        $("#act_guests").val(guests + guests_text);
        $(".act_guests_alert").attr('style', 'display: none;');

        if ($(window).width() <= 767) {
            $('.setting-content').css('margin-bottom', '180px');
        }

        //   second bug
        act_selected_day = "";
        enableDates = [];
        for (var i = 0; i < ndate.length; i++) {
            var today = convertDate(new Date());
            var diff = daysBetween(today, ndate[i]);

            if (diff >= 0) {
                enableDates.push(ndate[i]);
            } else {
                enableDates.push("2900-01-01");
            }
        }
        $('.act_calender').pignoseCalendar({
            multiple: false,
            lang: 'en',
            date: moment(str_date),
            theme: 'light',
            format: 'YYYY-MM-DD',
            modal: false,
            initialize: false,
            enabledDates: enableDates,
            select: function (date, context) {
                /**
                 * @params this Element
                 * @params date moment[]
                 * @params context PignoseCalendarContext
                 * @returns void
                 */

                    // This is selected button Element.
                var $this = $(this);

                // You can get target element in `context` variable, This element is same `$(this)`.
                var $element = context.element;

                // You can also get calendar element, It is calendar view DOM.
                var $calendar = context.calendar;

                // Selected dates (start date, end date) is passed at first parameter, And this parameters are moment type.
                // If you unselected date, It will be `null`.
                calendarActEvent(date[0], act.id);
            }
        });
    });

    // show reviews
//   dong fixed 2-26
    $(".part1-act-reviews .review_total_rate").html(act.review_rate);
    $(".part1-act-reviews .review_total .review_total_bar").css("width", act.review_rate * 20 + '%');
    $(".part1-act-reviews .review_total_count").html(act.review + " reviews");
    $('.act_reviews').empty().html('');
    var reviews = $(this).data('reviews');
    var search_text = $(".part1-act-reviews").html();
    if (act.review == 0) {
        $('.part1-act-reviews').addClass('blank');
        $('.part1-act-reviews').attr('hidden', '');
    } else {
        $('.part1-act-reviews').removeClass('blank');
        $('.part1-act-reviews').removeAttr('hidden');
    }

    setTimeout(function(){
        reviews.forEach(sel => {
            if ((sel.type == "activity") && (sel.type_id == act.id) && !search_text.includes(sel.username)) {
            var content ="<div class='part1-review'><div class='detail-review'><div class='review-header'>";
            if (sel.pic == null) {
                content += "<div class='review-avatar'><img src='//res.cloudinary.com/staycation/image/upload/q_auto,fl_lossy,f_auto/c_scale,dpr_2/c_fill,g_face,w_90,h_90/v1497970672/common/static/default-avatar' alt=''></div>";
            } else {
                content += "<div class='review-avatar'><img src='" + sel.pic + "' alt=''></div>";
            }
            content += "<div class='review-header-top'><span class='review-username'>" + sel.username + "</span><span class='review-date'>" + sel.created_at + "</span></div><div class='review-score'><span class='review_total_rate'>" + sel.grade + "</span><span class='review_total_bar_space'><span class='review_total_bar_space'><span class='review_total_bar' style='width:" + (sel.grade * 20) + "%;'></span></span></span></div></div>";
            content += "<p class='review-message'>" + sel.content + "</p></div></div>";
            $(".act_reviews").append(content);
        }
    });
    }, 100);
    //   end

    $("#myModal1").modal('show');
});
$("#save_act").click(function () {
    console.log("test act:"+ count_c, sel_acts, sel_accoms);
    
    if(sel_acts.length == 0) {
        elm_act_sel = $('#elm_act_sel').val();
        if(elm_act_sel > 100) {
            for(var i=101; i <= elm_act_sel; i++ ) {
                sel_acts.push(i);
            }
            //sel_c = elm_accom_sel;
        }
    }
    // if (sel_acts.length == 0 && sel_accoms.length == 0) {
    if (sel_acts.length == 0 && sel_accoms.length == 0 && count_c == 0) {
            console.log("test act:"+ count_c, sel_acts, sel_accoms);

        $("#review").addClass('disabled').html("<img src='imgs/icon-lock.png'>Review &amp; Submit");
        $("#payment").addClass('disabled');
        count_c = 0;
        var data = {
            'experience_id': exp_id,
            'type': 'activity'
        };
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'delete_act_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                // console.log(e);
            }
        });
    } else if (sel_acts.length == 0 && sel_accoms.length != 0) {
            console.log("test act:"+ count_c, sel_acts, sel_accoms);

        count_c = 0;
        var data = {
            'experience_id': exp_id,
            'type': 'activity'
        };
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'delete_act_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                // console.log(e);
                $("#review").removeClass('disabled').trigger("click");
            }
        });
    // } else if (sel_acts.length != 0 && count_c != sel_acts.length) {
    } else if (sel_acts.length != 0 || count_c != 0) {
        console.log("test act:"+ count_c, sel_acts, sel_accoms);
        console.log(type);
        
        var trigger_count = 0;
        var data_array = [];

        sel_acts.forEach(sel => {
        

        if($("#" + sel).length <= 0) {
            return;
        }
        console.log(sel);
        var x = document.getElementById(sel);
        
        var y = x.getElementsByClassName("detail-info");
        var res_ = y[0].getElementsByClassName("detail-origin-price");
        var res = y[0].getElementsByClassName("detail-discounted-price-span");
        var d = y[0].getElementsByClassName("detail-info-discount");
        var c = y[0].getElementsByClassName("detail-info-guests-num");
        var date_ = $("#act_date" + sel).find('span').text();
        var str = date_.split("/");
        var date = str[2] + "-" + str[1] + "-" + str[0];
        var data = {
            'experience_id': exp_id,
            'type_id': $("#" + sel).data('id'),
            'check_in': date,
            'check_out': date,
            'd_a_price': res[0].innerHTML,
            'd_b_price': res_[0].innerHTML,
            'discount': d[0].innerHTML,
            'guests_num': c[0].innerHTML,
            'type': 'activity'
        };
        console.log('======================');
        console.log(data);
        data_array.push(data);
        trigger_count++;
    });
        var ajax_data = {
            'data': data_array
        };

        if (trigger_count == sel_acts.length) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'create_act_info',
                data: ajax_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (e) {
                    console.log("ajax_result"+e);
                    count_c = sel_acts.length;
                    $('span.custom_accoms_num').text(count_a);

                    // var custom_accoms_num_text = (count_a > 1) ? 'Accommodations:' : 'Accommodation:';
                    // $('span.custom_accoms_num_text').text(custom_accoms_num_text);
                    // var custom_acts_num_text = (count_c > 1) ? 'Activities:' : 'Activity:';
                    // $('span.custom_acts_num_text').text(custom_acts_num_text);

                    $('span.custom_acts_num').text(count_c);
                    $("#review").removeClass('disabled').trigger("click");
                }
            });
            console.log(type, exp_id)
            // if (type == "new") {
            //var loading = new Loading({discription: 'Waiting...'});
                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: 'save_favourite',
                    data: {'exp_id': exp_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (e) {
                        //loadingOut(loading);
                        $(".notification").attr('style', 'display:block;');
                        $(".notification").html(e);
                        $(".notification_short").attr('style', 'display:block;');
                        $(".notification_short").html(e);
                    }
                });
            // }
        }

    } else if (sel_acts.length != 0 || sel_accoms.length != 0){
            console.log("test act:"+ count_c, sel_acts, sel_accoms);

        //  {
        $("#review").removeClass('disabled').trigger("click");
        $('span.custom_accoms_num').text(count_a);
        $('span.custom_acts_num').text(count_c);
        // }
        // var custom_accoms_num_text = (count_a > 1) ? 'Accommodations:' : 'Accommodation:';
        // $('span.custom_accoms_num_text').text(custom_accoms_num_text);
        // var custom_acts_num_text = (count_c > 1) ? 'Activities:' : 'Activity:';
        // $('span.custom_acts_num_text').text(custom_acts_num_text);
    }
});

$("#remove_act").click(function () {
    // $.ajax({
    //     type: 'post',
    //     dataType: 'json',
    //     url: 'undo_act_info',
    //     data: { 'experience_id': exp_id },
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success: function (e) {
    //         location.reload(true);
    //     }
    // });
    $("#accommodation_info").attr('style', 'display: block');
    $("#general_info").attr('style', 'display: none');
    $("#experience_info").attr('style', 'display: none');
    $("#invite_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');

    $("#accomodation").addClass('active');
    $("#general").removeClass('active');
    $("#experience").removeClass('active');
    $("#invite").removeClass('active');
    $("#review").removeClass('active');
    $("#payment").removeClass('active');

    var height = $(".experience-content").height();
    $(".sidebar").height(height);

    if ($(window).width() <= 414) {
      $(".sidebar").attr('style', 'display: none;');
      $("._66jk8g").attr('style', 'display: block;');
      $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
    }
});
var calendarActEvent = function (first_d, selected_act_id) {
    if(first_d != null){
        var start_d = first_d._i;
        act_selected_day = first_d._i;
        var acc_act = $('#act_guests').val();
        acc_act = +acc_act.substring(0, acc_act.indexOf(' '));
        _prices.forEach(price => {
            if (price.activity_id == selected_act_id && price.check_in_date == start_d) {
                var price_a = (currency_rate * Math.floor(price.price_a_discount)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                var price_b = (currency_rate * Math.floor(price.price_b_discount)).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                $("#act_discounted_price").html($('#user-currency').val() + price_a);
                $("#act_origin_price").html($('#user-currency').val() + price_b);
                //   $("#act_discont").html(Math.round(price.discount * 100, 2) + "%");
        }
    });
    } else {
        act_selected_day = "";
    }
};

$(".add_trip_act_btn").click(function () {

    if ($(window).width() <= 768) {
        document.getElementById("activity_bottom").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
    }
    var acc_act = $('#act_guests').val();
    acc_act = +acc_act.substring(0, acc_act.indexOf(' '));
    if(act.min_capacity > 0 && acc_act < act.min_capacity) {
        alert('Min capacity guests ' + act.min_capacity);
        $('#act_guests').trigger('click');
        return;
    }
    elm_act_sel = $('#elm_act_sel').val();
    if(elm_act_sel > 100) {
        for(var i=101; i <= elm_act_sel; i++ ) {
            sel_acts.push(i);
        }
        sel_a = elm_act_sel;
    }
    if (act_selected_day != "") {
        var content = create_selected_html_act();
        sel_acts.push(sel_a);
        content += "<script>$('.slide-like').click(function () {var id = $(this).attr('id');removeSelection(id, 'acts');});</script>";
        $(".selected_content_act").append(content);
        $('#' + sel_a + ' .selected-slideshow').slideshow({interval: 1000000,width: 187,height: 140});
        $("#myModal1").modal('hide');
    } else {
        alert("please select the date on the calendar.");
    }
});
var create_selected_html_act = function () {
    var str = act_selected_day.split("-");
    var day = str[2] + "/" + str[1] + "/" + str[0];
    sel_a++;
    var acc_act = $('#act_guests').val();
    acc_act = +acc_act.substring(0, acc_act.indexOf(' '));
    var temp = "";
    temp = "<div class='detail-item'><div class='detail activity single_content_act' data-id='" + act.id + "'" + "id='" + sel_a + "'><p class='detail-dates' id='act_date" + sel_a + "'>Activity on <span>" + day + "</span></p>";
    temp += "<ul class='selected-slideshow'>";

    imgs_act.forEach(img => {
        if (img.act_id == act.id) {
        temp += "<li><img src='" + img.path + "' alt=''><i class='fas fa-heart slide-like' data-id='" + act.id + "'" + "id='" + sel_a + "'></i></li>";
    }
});
    var arr = $('.detail[data-id=' + act.id + ']').data('practical'), group;
    for (var i = 0; i < arr.length; i++) {
        console.log(arr[i].act_id, act.id);

        if (arr[i].act_id == act.id) {
            group = arr[i].group_size;
        }
    }

    temp += "</ul>";
    temp += "<div class='detail-info'>";
    if (acc_act == 1) {
        temp += "<div class='detail-info-head'><p class='detail-info-address'>" + act.address + "</p>" + "<p class='detail-info-name'>" + act.name + "</p><p class='detail-discounted-price'><span class='detail-discounted-price-span'>" + $('#act_discounted_price').html() + "</span><small>/pers</small></p><p class='detail-origin-price hidden'>" + $('#act_origin_price').html() + "</p><p class='detail-info-discount hidden'>" + $('#act_discont').html() + "</p><p class='detail-info-capacity'><span class='detail-info-guests-num dHEojY'>"+acc_act+"</span> Guest coming</p></div>";
    } else {
        temp += "<div class='detail-info-head'><p class='detail-info-address'>" + act.address + "</p>" + "<p class='detail-info-name'>" + act.name + "</p><p class='detail-discounted-price'><span class='detail-discounted-price-span'>" + $('#act_discounted_price').html() + "</span><small>/pers</small></p><p class='detail-origin-price hidden'>" + $('#act_origin_price').html() + "</p><p class='detail-info-discount hidden'>" + $('#act_discont').html() + "</p><p class='detail-info-capacity'><span class='detail-info-guests-num dHEojY'>"+acc_act+"</span> Guests coming</p></div>";
    }
    temp += "<div class='detail-info-data origin eUhMAS hidden'><span class='detail-info-capacity'>Max" +  group + " guests</span><span class='detail-info-experience'>" + act.category + "</span></div>";
    temp += "</div>";
    temp += "</div></div>";
    return temp;
};


//----------------Map integration-------------------------------
var map;
var map1;

// dong 2_27
var markers = [];

function deleteMarkers() {
    setMapOnAll(null);
    markers = [];
}

function setMapOnAll(map_custom) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map_custom);
    }
}


function setMap(_lat, _lng, type) {

    var uluru = { lat: parseFloat(_lat), lng: parseFloat(_lng) };
    var marker = new google.maps.Marker({
        position: uluru,
        title: "Hello World!"
    });

    markers.push(marker);

    if (type == "map") {
        map.panTo(uluru);
        markers[0].setMap(map);
    } else {
        map1.panTo(uluru);
        markers[0].setMap(map1);
    }
}

// end
function initMap() {
    var uluru = { lat: -33.865143, lng: 151.209900 };
    var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(uluru.lat, uluru.lng),
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: true,
        styles: [{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#444444" }] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{ "color": "#378b90" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#31b9c1" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#f2f2f2" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#46bcec" }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#31b9c1" }] }, { "featureType": "water", "elementType": "geometry.stroke", "stylers": [{ "color": "#31b9c1" }] }]
    };
    var mapOptions1 = {
        zoom: 14,
        center: new google.maps.LatLng(uluru.lat, uluru.lng),
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: true,
        styles: [{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#444444" }] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{ "color": "#378b90" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text.fill", "stylers": [{ "color": "#31b9c1" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#f2f2f2" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#46bcec" }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#31b9c1" }] }, { "featureType": "water", "elementType": "geometry.stroke", "stylers": [{ "color": "#31b9c1" }] }]
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    map1 = new google.maps.Map(document.getElementById('location_map'), mapOptions1);
}
