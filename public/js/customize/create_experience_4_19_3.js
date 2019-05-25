//-------------------Variables---------------------------


//////////////////////////////////////////////////////////////////////////////
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

// $.get('create_exp_accoms', { id: custom_city_id }, function(data){
//     $('#form_accommodation').empty().html(data);
// });

$("input[type=text], textarea").on({ 'touchstart' : function() {
    zoomDisable();
}});
$("input[type=text], textarea").on({ 'touchend' : function() {
    setTimeout(zoomEnable, 500);
}});

function zoomDisable(){
    $('head meta[name=viewport]').remove();
    $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />');
}
function zoomEnable(){
    $('head meta[name=viewport]').remove();
    $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1" />');
}
////////////////////////////////////////////////////////////////////////////////

var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;

$("#phone_number").intlTelInput({
    allowDropdown: true,
    autoHideDialCode: false,
    autoPlaceholder: "polite",
    dropdownContainer: "body",
    preferredCountries: ['au', 'nz', 'fr', 'gb', 'us'],
    utilsScript: "/js/utils.js"
});

$("#datepicker").datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat: 'dd/mm/yy'
});

$("#arrival_date").datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    dateFormat: 'dd/mm/yy',
    minDate: 0
});

$("#payment_form").validate({
    errorPlacement: function () {
    },
    errorClass: "label",
    highlight: function (element) {
        $(element).parent().addClass("error");
        $(element).parent().removeClass("success");
    },
    unhighlight: function (element) {
        $(element).parent().removeClass("error");
        $(element).parent().addClass("success");
    }
});

if ($(window).width() <= 767) {
    $("#general").trigger('click');
    $(".sidebar").attr('style', 'display: none;');
    $("._66jk8g").attr('style', 'display: block;');
    $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
}

var sidebar_height = $(".sidebar").height(), sel_accoms = [], sel_acts = [], flags = [], invite_content = [], is_clicked_invite = false, order_invite = 0, order_review = 0;


//---------------Prepare for calculate if it's a single date-----------------
if (f_count > 1) {
    var str = _flags.split("A"), i = 0, temp, price_t, flag;
    for (i = 0; i < f_count; i++) {
        temp = str[i].split("k" + i);
        price_t = temp[0].split("$");
        flag = {
            "price": price_t[1],
            "start_day": temp[1],
            "end_day": temp[2]
        };
        flags.push(flag);
    }
} else {
    temp = _flags.split("k1");
    price_t = temp[0].split("$");
    flag = {
        "price": price_t[1],
        "start_day": temp[1],
        "end_day": temp[2]
    };
    flags.push(flag);
}


// get_progress_status();
//-----------------Get Progress status-------------------------
// function get_progress_status() {
//   $.ajax({
//     type: 'get',
//     dataType: 'json',
//     url: 'get_progress_status',
//     data: { 'exp_id': exp_id},
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     success: function (e) {
//       var exp = e.exp;
//       console.log(e);
//       if (exp.exp_name != " ") {
//         if (e.exp_ac_count != 0) {
//           if (e.exp_at_count != 0) {
//             $(".progress_bar").attr('style', 'width: 60%');
//             $(".submit_count").html('5');
//           } else {
//             $(".progress_bar").attr('style', 'width: 50%');
//             $(".submit_count").html('5');
//           }
//         } else {
//           $(".progress_bar").attr('style', 'width: 40%');
//           $(".submit_count").html('6');
//         }
//       } else {
//         $(".progress_bar").attr('style', 'width: 0%');
//         $(".submit_count").html('10');
//       }      
//     }
//   });
// }
//----------------Sidebar Section ----------------------

$("#general").click(function () {
    $(".progress_bar").attr('style', 'width: 0%');
    $(".submit_count").html('5');

    $("#general_info").attr('style', 'display: block');
    $("#accommodation_info").attr('style', 'display: none');
    $("#experience_info").attr('style', 'display: none');
    $("#invite_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');

    $("#accomodation").removeClass('active');
    $("#experience").removeClass('active');
    $("#invite").removeClass('active');
    $("#review").removeClass('active');
    $("#payment").removeClass('active');
    $(this).addClass('active');

    is_clicked_invite = false;

    if ($(window).width() <= 767) {
        $(".sidebar").attr('style', 'display: none;');
        $("._66jk8g").attr('style', 'display: block;');
        $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
    }
//   get_progress_status();
});

$("#accomodation").click(function () {
    $(".progress_bar").attr('style', 'width: 15%');

    $("#accommodation_info").attr('style', 'display: block');
    $("#general_info").attr('style', 'display: none');
    $("#experience_info").attr('style', 'display: none');
    $("#invite_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');

    $("#general").removeClass('active');
    $("#experience").removeClass('active');
    $("#review").removeClass('active');
    $("#payment").removeClass('active');
    $("#invite").removeClass('active');
    $(this).addClass('active');

    is_clicked_invite = false;

    if ($(window).width() <= 767) {
        $(".sidebar").attr('style', 'display: none;');
        $("._66jk8g").attr('style', 'display: block;');
        $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
    }
});

$("#experience").click(function () {
    $(".progress_bar").attr('style', 'width: 30%');
    $(".submit_count").html('4');
    $("#experience_info").attr('style', 'display: block');
    $("#general_info").attr('style', 'display: none');
    $("#accommodation_info").attr('style', 'display: none');
    $("#invite_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');
    $("#general").removeClass('active');
    $("#accomodation").removeClass('active');
    $("#invite").removeClass('active');
    $("#review").removeClass('active');
    $("#payment").removeClass('active');
    $(this).addClass('active');

    is_clicked_invite = false;

    if ($(window).width() <= 767) {
        $(".sidebar").attr('style', 'display: none;');
        $("._66jk8g").attr('style', 'display: block;');
        $(".experience-content").attr('style', 'display: block; margin-left: 0px;padding-left: 15px; padding-right: 15px; margin-bottom: 0px;');
    }
    console.log('count_c'+ count_c);
});

$("#review").click(function () {
    $(".progress_bar").attr('style', 'width: 50%');
    $(".submit_count").html('2');
    var accoms = $(this).data('accoms');
    var acts = $(this).data('acts');
    var accom_imgs = $(this).data('ac');
    var act_imgs = $(this).data('at');
    var prices_accoms = $(this).data('acprice');
    var prices_acts = $(this).data('atprice');
    $("#review img:last-child").remove();
    $("#review_info").attr('style', 'display: flex');
    $("#invite_info").attr('style', 'display: none');
    $("#experience_info").attr('style', 'display: none');
    $("#general_info").attr('style', 'display: none');
    $("#accommodation_info").attr('style', 'display: none');
    $("#payment_info").attr('style', 'display: none');

    $("#invite").removeClass('active');
    $("#general").removeClass('active');
    $("#accomodation").removeClass('active');
    $("#experience").removeClass('active');
    $("#payment").removeClass('active');
    $(this).addClass('active');
    order_invite = order_review = 0;
    var review_accom_count = 0; var review_act_count = 0;

    if (is_clicked_invite == false) {
        invite_content = [];
        $(".review_form").empty();
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'get_experience_details',
            data: { 'exp_id': exp_id },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                e = data.exp;
                // Update number accom and act
                $('span.custom_accoms_num').html(data.count_a);
                $('span.custom_acts_num').html(data.count_c);
                var custom_accoms_num_text = (data.count_a > 1) ? 'Accommodations:' : 'Accommodation:';
                $('span.custom_accoms_num_text').text(custom_accoms_num_text);
                var custom_acts_num_text = (data.count_c > 1) ? 'Activities:' : 'Activity:';
                $('span.custom_acts_num_text').text(custom_acts_num_text);

                var date_list = [];
                var check_in_list = [];
                var check_out_list = [];
                e.forEach(sel => {
                    var diff = daysBetween(sel.check_in, sel.check_out);
                if (daysBetween(sel.check_in, sel.check_out) == 0) {
                    if (jQuery.inArray(sel.check_in, date_list) == -1) {
                        date_list.push(sel.check_in);
                    }
                } else {
                    var check_in = sel.check_in;
                    var str_in = check_in.split("-");
                    var check_out = sel.check_out;
                    var str_out = check_out.split("-");
                    var middle_dates = getMiddleDates(new Date(str_in[0],str_in[1]-1,str_in[2]), new Date(str_out[0],str_out[1]-1,str_out[2]-1));
                    middle_dates.forEach(date => {
                        var formated_date = formatDate(date.toDateString('yyyy-mm-dd'));
                    if (jQuery.inArray(formated_date, date_list) == -1) {
                        date_list.push(formated_date);
                    }
                });
                }
            });

                var exact_dates = date_list.sort();
                var total_content = "", mail_total_content = "";
                var total_acb_price = 0, total_atb_price = 0, total_aca_price = 0, total_ata_price = 0;
                var content = [], mail_content = []; var match_imgs = [];
                for (var k = 0; k < exact_dates.length; k++) {
                    var title = makeTitle(exact_dates[k], "review");
                    content[k] = "<div class='single_sel'><h3 class='date_range'>" + title + "</h3>";
                    mail_content[k] = "<div class='single_sel'><h3 class='date_range'>" + title + "</h3>";
                    e.forEach(exp => {
                        if (exp.type == "accommodation") {
                        var accoms_arr = $.map(accoms, function(value, index) {
                            return value;
                        });
                        if (exp.check_in == exact_dates[k]) {
                            b_price = exp.d_b_price.split("$AUD");
                            a_price = exp.d_a_price.split("$AUD");
                            // // total_acb_price += (parseInt(b_price[1])*exp.guests_num);
                            // total_acb_price += Math.floor(parseInt(b_price[1])*exp.guests_num);
                            // // total_aca_price += (parseInt(a_price[1])*exp.guests_num);
                            // total_aca_price += Math.floor(parseInt(a_price[1])*exp.guests_num);
                            accoms_arr.forEach(accom => {
                                if (accom.id == exp.type_id) {
                                review_accom_count ++;
                                content[k] += "<p class='card_type'>Accommodation</p><div class='part_sel'><ul class='gallery-selected'>";
                                match_imgs = [];
                                accom_imgs.forEach(img => {
                                    if (img.accom_id == accom.id) {
                                        match_imgs.push(img);
                                        content[k] += "<li><img src='" + img.path + "' style='width: 170px; height: 135px;'/>" + "</li>";
                                    }
                                });
                                content[k] += "</ul>";
                                mail_content[k] += "<p class='card_type'>Accommodation</p><div class='part_sel'><img src='http://www.insidersuite.com" + match_imgs[0].path + "' style='width: 170px; height: 135px;'/>";
                                if (exp.guests_num == 1) {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                } else {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                }
                                prices_accoms.forEach(price => {
                                    if ((price.check_in_date == exact_dates[k]) && (price.accomodation_id == accom.id)) {
                                        if(exp.guests_num == 1) {
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        } else {
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        }
                                        
                                        total_aca_price += parseInt(price.price_a_discount);
                                        total_acb_price += parseInt(price.price_b_discount);
                                    }
                                });
                            }
                        });
                            content[k] += "</div>";
                            mail_content[k] += "</div>";
                        } else if ((daysBetween(exact_dates[k], exp.check_in) < 0) && (daysBetween(exact_dates[k], exp.check_out) > 0)) {
                            accoms_arr.forEach(accom => {
                                if (accom.id == exp.type_id) {
                                review_accom_count ++;
                                content[k] += "<p class='card_type'>Accommodation</p><div class='part_sel'><ul class='gallery-selected'>";
                                mail_content[k] += "<p class='card_type'>Accommodation</p><div class='part_sel'>";
                                match_imgs = [];
                                accom_imgs.forEach(img => {
                                    if (img.accom_id == accom.id) {
                                        match_imgs.push(img);
                                        content[k] += "<li><img src='" + img.path + "' style='width: 170px; height: 135px;'/>" + "</li>";
                                    }
                                });
                                content[k] += "</ul>";
                                mail_content[k] += "<img src='http://www.insidersuite.com" + match_imgs[0].path + "' style='width: 170px; height: 135px;'/>";
                                if (exp.guests_num == 1) {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                } else {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + accom.name + "</h4><label>" + accom.full_address + "</label><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                }

                                prices_accoms.forEach(price => {   
                                    if ((price.check_in_date == exact_dates[k]) && (price.accomodation_id == accom.id)) {
                                        if(exp.guests_num == 1) {
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        } else {
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        }
                                        // content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        // mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + Math.floor(price.price_a_discount/exp.guests_num) + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + Math.floor(price.price_b_discount/exp.guests_num) + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + price.price_a_discount + "</b></p></div>";
                                        total_aca_price += parseInt(price.price_a_discount);
                                        total_acb_price += parseInt(price.price_b_discount);
                                    }
                                });
                            }
                        });
                            content[k] += "</div>";
                            mail_content[k] += "</div>";
                        }
                    } else if (exp.type == "activity") {
                        if (exp.check_in == exact_dates[k]) {
                            b_price = exp.d_b_price.split("$AUD");
                            a_price = exp.d_a_price.split("$AUD");
                            // // total_atb_price += parseInt(b_price[1]);
                            // total_atb_price += Math.floor(parseInt(b_price[1])*exp.guests_num);
                            // // total_ata_price += parseInt(a_price[1]);
                            // total_ata_price += Math.floor(parseInt(a_price[1])*exp.guests_num);
                            var acts_arr = $.map(acts, function(value, index) {
                                return value;
                            });
                            acts_arr.forEach(act => {
                                if (act.id == exp.type_id) {
                                review_act_count ++;
                                content[k] += "<div class='single_sel part_act_sel'><p class='card_type'>Activity</p><div class='part_sel'><ul class='gallery-slideshow'>";
                                mail_content[k] += "<div class='single_sel part_act_sel'><p class='card_type'>Activity</p><div class='part_sel'>";
                                match_imgs = [];
                                act_imgs.forEach(img => {
                                    if (img.act_id == act.id) {
                                        match_imgs.push(img);
                                        content[k] += "<li><img src='" + img.path + "' alt=''>" + "</li>";
                                    }
                                });
                                content[k] += "</ul>";
                                var practicals = $('.experience').data('practical'), group;
                                for (var i = 0; i < practicals.length; i++) {
                                    if (practicals[i].act_id == act.id) {
                                        group = practicals[i].group_size;
                                    }
                                }
                                console.log('group:',group);
                                mail_content[k] += "<img src='http://www.insidersuite.com" + match_imgs[0].path + "' alt='' style='width: 170px; height: 135px;'>";
                                if (exp.guests_num == 1) {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + act.name + "</h4><p>" + act.address + "</p><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + act.name + "</h4><p>" + act.address + "</p><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guest coming</span></div></div>";
                                } else {
                                    content[k] += "<div class='gallery-info'>" + "<h4>" + act.name + "</h4><p>" + act.address + "</p><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                    mail_content[k] += "<div class='gallery-info'>" + "<h4>" + act.name + "</h4><p>" + act.address + "</p><div class='gallery-info-data'><span class='gallery-info-capacity'>" + exp.guests_num + " Guests coming</span></div></div>";
                                }

                                prices_acts.forEach(price => {
                                    if ((price.check_in_date == exact_dates[k]) && (price.activity_id == act.id)) {
                                        if(exp.guests_num == 1) {
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + price.price_a_discount + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + price.price_b_discount + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + Math.floor(price.price_a_discount*exp.guests_num) + "</b></p></div>";
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + price.price_a_discount + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + price.price_b_discount + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adult): <b>$AUD" + Math.floor(price.price_a_discount*exp.guests_num) + "</b></p></div>";
                                        } else {
                                            mail_content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + price.price_a_discount + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + price.price_b_discount + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + Math.floor(price.price_a_discount*exp.guests_num) + "</b></p></div>";
                                            content[k] += "<div class='gallery-price-info'>" + "<p class='custom_a'><b>$AUD" + price.price_a_discount + "</b>/pers</p><p class='custom_b'>instead of <del>$AUD" + price.price_b_discount + "</del></p><p class='total_p'><img src='https://www.insidersuite.com/imgs/group.png' style='width: 20px; height: 20px;'/>Total (*"+ exp.guests_num +" adults): <b>$AUD" + Math.floor(price.price_a_discount*exp.guests_num) + "</b></p></div>";
                                        }
                                        
                                        total_atb_price += Math.floor(price.price_b_discount*exp.guests_num);
                                        total_ata_price += Math.floor(price.price_a_discount*exp.guests_num);
                                    }
                                });
                            }
                        });
                            content[k] += "</div>"; mail_content[k] += "</div>";
                        }
                    }
                });
                    content[k] += "</div>"; mail_content[k] += "</div>";
                    total_content += content[k]; mail_total_content += mail_content[k];
                }
                total_content += "<script>$('.gallery-selected').slideshow({interval: 1000000,width: 170,height: 135});$('.gallery-slideshow').slideshow({interval: 1000000,width: 170,height: 135});</script>";
                invite_content = mail_total_content;
                $(".review_form").html(total_content);
                $("#accom_count").val(review_accom_count);
                $("#act_count").val(review_act_count);
                console.log(review_accom_count, review_act_count);
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: 'get_experience',
                    data: { 'exp_id': exp_id },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (e) {
                        $(".review_exp").html(e.exp_name);
                    }
                });

                $(".review_period").html(makeSimpleTitle(exact_dates[0]) + "-" + makeSimpleTitle(exact_dates[exact_dates.length - 1]));
                $(".review_accom_ap").html("<b>$AUD" + total_aca_price + "</b>");
                $(".review_accom_bp").html("<del>$AUD" + total_acb_price + "</del>");
                $(".review_act_ap").html("<b>$AUD" + total_ata_price + "</b>");
                $(".review_act_bp").html("<del>$AUD" + total_atb_price + "</del>");
                var total_new = total_aca_price + total_ata_price;
                var total_old = total_acb_price + total_atb_price;
                var suite_fee = (total_new*0.06).toFixed(2);
                if(suite_fee > 55){
                    suite_fee = 55;
                }
                $(".suite_fee_span").html("$AUD" + suite_fee);
                $(".new_price").html("<b>$AUD" + (parseFloat(total_new)+parseFloat(suite_fee)) + "</b>");
                $(".old_price").html("<del>$AUD" + total_old + "</del>");
                $(".payment_price").html("Total: $AUD" + (parseFloat(total_new)+parseFloat(suite_fee)));
            }
        });
    }
    //$(".progress_bar").attr('style', 'width: 80%');
    $(".submit_count").html('2');
    if ($(window).width() <= 767) {
        $(".sidebar").attr('style', 'display: none;');
    }
});

$("#payment").click(function () {
    $(".progress_bar").attr('style', 'width: 70%');
    $(".submit_count").html('1');
    $("#payment img:last-child").remove();
    $("#payment_info").attr('style', 'display: flex');
    $("#invite_info").attr('style', 'display: none');
    $("#experience_info").attr('style', 'display: none');
    $("#general_info").attr('style', 'display: none');
    $("#accommodation_info").attr('style', 'display: none');
    $("#review_info").attr('style', 'display: none');

    is_clicked_invite = false;

    $("#general").removeClass('active');
    $("#accomodation").removeClass('active');
    $("#experience").removeClass('active');
    $("#review").removeClass('active');
    $("#invite").removeClass('active');
    if (count_c != 0 || count_a != 0) {
        $("#invite").removeClass('disabled');
    }
    $(this).addClass('active');
    if ($(window).width() <= 767) {
        $(".sidebar").attr('style', 'display: none;');
    }
});

$(".map_link").click(function () {
    $(".map_link").attr('style', 'display: none;');
    $(".photo_link").attr('style', 'display: block;');
    if ($(".map_info").hasClass('active')) {
        $(".map_info").removeClass('active');
        $("#map").removeClass('show');
        $(".headBg").addClass('show');
        $(".headBg").removeClass('disable');
        $("#map").addClass('disable');
    } else {
        $(".map_info").addClass('active');
        $("#map").addClass('show');
        $("#map").removeClass('disable');
        $(".headBg").addClass('disable');
        $(".headBg").removeClass('show');
    }
});
$(".photo_link").click(function () {
    $(".photo_link").attr('style', 'display: none;');
    $(".map_link").attr('style', 'display: block;');
    if ($(".map_info").hasClass('active')) {
        $(".map_info").removeClass('active');
        $("#map").removeClass('show');
        $(".headBg").addClass('show');
        $(".headBg").removeClass('disable');
        $("#map").addClass('disable');
    } else {
        $(".map_info").addClass('active');
        $("#map").addClass('show');
        $("#map").removeClass('disable');
        $(".headBg").addClass('disable');
        $(".headBg").removeClass('show');
    }
});
$(".dropdown-toggle").click(function () {
    $(".dropdown").addClass('open');
});

//----------------------General information ------------------------
$("#guests").click(function () {
    $(".dsssji").attr('style', 'display: block; width:100%;');
});

$("#adults_increase").click(function () {
    $("#adults_decrease").attr("disabled", false);
    var count = $("#adults").val();
    if (count != 15) {
        count++;
        $("#adults").val(count);
    } else {
        count = 1;
        $("#adults_increase").attr("disabled", true);
    }
});

$("#adults_decrease").click(function () {
    $("#adults_increase").attr("disabled", false);
    var count = $("#adults").val();
    if (count != 1) {
        count--;
        $("#adults").val(count);
    } else {
        count = 1;
        $("#adults_decrease").attr("disabled", true);
    }
});

$("#children_increase").click(function () {
    $("#children_decrease").attr("disabled", false);
    var count = $("#children").val();
    if (count != 15) {
        count++;
        $("#children").val(count);
    } else {
        count = 0;
        $("#children_increase").attr("disabled", true);
    }
});

$("#children_decrease").click(function () {
    $("#children_increase").attr("disabled", false);
    var count = $("#children").val();
    if (count != 0) {
        count--;
        $("#children").val(count);
    } else {
        count = 0;
        $("#children_decrease").attr("disabled", true);
    }
});

$("#infants_increase").click(function () {
    $("#infants_decrease").attr("disabled", false);
    var count = $("#infants").val();
    if (count != 15) {
        count++;
        $("#infants").val(count);
    } else {
        count = 0;
        $("#infants_increase").attr("disabled", true);
    }
});

$("#infants_decrease").click(function () {
    $("#infants_increase").attr("disabled", false);
    var count = $("#infants").val();
    if (count != 0) {
        count--;
        $("#infants").val(count);
    } else {
        count = 0;
        $("#infants_decrease").attr("disabled", true);
    }
});

$("#guest_apply").click(function () {
    var guests = parseInt($("#adults").val());
    if(guests > 1) {
        $("#guests").val(guests + " guests");
    } else {
        $("#guests").val(guests + " guest");
    }

    $(".dsssji").attr('style', 'display: none;');

});


$("#save_general").click(function () {
    if ($("#arrival_date").val() != "" && $("#experience_title").val() != "" && $("#guests").val() != "") {
        var str = $("#guests").val(),
            guests_nb = str.split(" guest"),
            data = {
                "city": $("#city").val(),
                "arrival_date": $("#arrival_date").val(),
                "guests_nb": guests_nb[0],
                "exp_name": $("#experience_title").val()
            };
        var loading = new Loading({discription: 'Waiting...'});
        // alert("InsiderSuite wants to show you funny accommodations and activities. Please wait some seconds");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'save_general_info',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (e) {
                console.log(e);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.get('create_exp_accoms', { id: custom_city_id, get_guests_num: guests_nb[0], arrival_date: $("#arrival_date").val(), exp_id: e.id }, function(result_data){
                    loadingOut(loading);
                    /* $('#form_accommodation').empty().html(result_data); */
                    $('#experience_content').empty().html(result_data);
                    // console.log(result_data)
                    
                    /*loadingOut(loading_custom);
                    console.log('loadingout')*/

              
                    $("#accomodation").removeClass('disabled');
                    $("#experience").removeClass('disabled');
                    $("#accomodation img:last-child").remove();
                    $("#experience img:last-child").remove();
                    $("#accomodation").trigger("click");
                    $("input#accom_guests").val(str);
                    $("input#act_guests").val(str);
                    $("input#exp_id").val(e.id);
                    $(".review_nb_guests").text(str);
                    $(".progress_bar").attr('style', 'width: 10%');
                    $(".submit_count").html('5');
                    exp_id = e.id;
                    //if (type == "new") {
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: 'save_favourite',
                        data: {'exp_id': e.id},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (e) {
                            /* loadingOut(loading);*/
                            $(".notification").attr('style', 'display:block;');
                            $(".notification").html(e);
                            $(".notification_short").attr('style', 'display:block;');
                            $(".notification_short").html(e);
                        }
                    });
                    //}
                });
            }
        });
    } else {
        alert("please input all the information.");
    }
});

$("#back_general").click(function () {
    $("#general_info").hide();
    $('.sidebar').show();
});



//---------------------------Invite Section----------------------
var ms = $('#invite_email').magicSuggest({
    placeholder: "Input friend's address.",
    allowDuplicates: false,
    useTabKey: true
});

$("#skip_invite").click(function () {
    $("#review").trigger("click");
});
/**
 * Validation
 */
function validateCalendarAccommodation(callBack) {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'validate_calendar_accommodation',
        data: { 'exp_id': exp_id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(e) {
            if(!e.success) {
                $("#payment").addClass('disabled');
                alert('We\'re sorry one accommodation is no longer available please review your selection');
                callBack(false);
            } else {
                callBack(true);
            }
        }
    });
}

function validateCalendarActivity(callBack) {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'validate_calendar_activity',
        data: { 'exp_id': exp_id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(e) {
            if(!e.success) {
                $("#payment").addClass('disabled');
                alert('We\'re sorry one activity is no longer available please review your selection');
                callBack(false);
            } else {
                callBack(true);
            }
        }
    });
}

//Review and Submit
$("#submit_trip").click(function () {
    $("input#email_content").val(invite_content);
    console.log(invite_content);
    validateCalendarAccommodation(function(rsAccom) {
        if(rsAccom) {
            validateCalendarActivity( function(rsAct){
                if(rsAct) {
                    $("#payment").removeClass('disabled').trigger("click");
                }else {
                    return;
                }
            });
        }else {
            return;
        }
    });
    //validateCalendarActivity();
    //$("#payment").removeClass('disabled').trigger("click");
});
//Payment Section
$("#promo_apply").click(function () {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'validate_promo_code',
        data: {'code': $("#promo_code").val()},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            console.log(e);
            if (e.result == "false") {
                alert(e.value);
                $('#promo_code').val('');
            } else if (e.result == "true"){
                $('#promo_apply').off('click');
                var old_price = $(".payment_price").html();
                var str = old_price.split("Total: $AUD");
                if (e.type == "dollar") {
                    if (parseFloat(e.value) > parseFloat(str[1])) {
                        alert("Your bill is less than voucher. You can to use it after.");
                    } else {
                        var new_price = (parseFloat(str[1]) - parseFloat(e.value)).toFixed(2);
                        $(".promotion_discount").html("$AUD" + e.value);
                        $("#voucher_nb").val($("#promo_code").val());
                        $(".payment_price").html("Total: $AUD" + new_price);
                        $(".voucher_discount").attr('style', 'display:block');
                        $(".new_price").html("<b>$AUD" + new_price + "</b>");
                    }
                } else {
                    var percentage = (100 - parseFloat(e.value)) / 100;
                    var new_price = (parseFloat(str[1]) * percentage).toFixed(2);
                    $(".promotion_discount").html(e.value + "%");
                    $("#voucher_nb").val($("#promo_code").val());
                    $(".payment_price").html("Total: $AUD" + new_price);
                    $(".voucher_discount").attr('style', 'display:block');
                    $(".new_price").html("<b>$AUD" + new_price + "</b>");
                }
            }
        }
    });
});
$("input[type='radio']").click(function(){
    if ($("input[name='title']:checked").val()) {
        $("#check_title").attr('style', 'border: none;padding: 5px;');
    } else {
        $("#check_title").attr('style', 'border: 1px solid red;padding: 5px;');
    }
});
var check_title = function () {
    if ($("input[name='title']:checked").val()) {
        $("#check_title").attr('style', 'border: none;padding: 5px;');
    } else {
        $("#check_title").attr('style', 'border: 1px solid red;padding: 5px;');
    }
};
$("#phone_number").change(function (){
    if ($("#phone_number").intlTelInput("isValidNumber") == "false") {
        $("#phone_number").attr('style', 'border: 1px solid red;');
    } else {
        $("#phone_number").attr('style', 'border: none;');
    }
});
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}
$("#email").change(function() {
    if (IsEmail($(this).val()) == "false") {
        $("#email").attr('style', 'border: 1px solid red;');
    } else {
        $("#email").attr('style', 'border: none;');
    }
});
$("#check").click(function (e) {
    e.preventDefault();
    check_title();
    if ($("input[name='title']:checked").val()) {
        console.log("title is valid");
        if ($("#phone_number").intlTelInput("isValidNumber")) {
            console.log("phone is valid");
            if (IsEmail($("#email").val())) {
                console.log("email is valid");
                if ($(".payment_form").valid()) {
                    var date = $("#datepicker").val();
                    var str = date.split('/');
                    var data = {
                        "title": $("input[name='title']:checked").val(),
                        "last_name": $("#last_name").val(),
                        "first_name": $("#first_name").val(),
                        "phone": $("#phone_number").intlTelInput("getNumber"),
                        "email": $("#email").val(),
                        "day": str[1],
                        "month": str[0],
                        "year": str[2],
                    };
                    console.log(data);
                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: 'save_payment_user',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (e) {
                            $("#payment-form").removeAttr('hidden');
                            $(".progress_bar").attr('style', 'width: 90%');
                            $(".submit_count").html('1');
                        }
                    });
                }
            }
        } else {
            $("#phone_number").attr('style', 'border: 1px solid red;');
        }
    }
});

//----------------Additional functions ---------------------------

function makeTitle(str, type) {
    var d = new parseDate(str);
    var day = parseDay(d);
    var month = parseMonth(d);
    var part = str.match(/(\d+)/g);
    var title = "";
    if (type == "invite") {
        order_invite ++;
        title = "Day " + order_invite + " - " + day + " " + part[2] + " " + month + " " + part[0];
    } else {
        order_review ++;
        title = "Day " + order_review + " - " + day + " " + part[2] + " " + month + " " + part[0];
    }
    return title;
}

function makeSimpleTitle(str) {
    var d = new parseDate(str);
    var weekday = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var day = weekday[d.getDay()];
    var month = parseMonth(d);
    var part = str.match(/(\d+)/g);
    var title = day + ", " + part[2] + " " + month + " " + part[0];
    return title;
}
function parseMonth(day) {
    const months = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
    return months[day.getMonth()];
}
function parseDay(day) {
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    return weekday[day.getDay()];
}
function parseDate(input) {
    var parts = input.match(/(\d+)/g);
    // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
    return new Date(parts[0], parts[1] - 1, parts[2]); // months are 0-based
}
function daysBetween(date1, date2) {
    //Get 1 day in milliseconds
    var one_day = 1000 * 60 * 60 * 24;

    // Convert both dates to milliseconds
    var date1_ms = new Date(date1).getTime();
    var date2_ms = new Date(date2).getTime();

    // Calculate the difference in milliseconds
    var difference_ms = date2_ms - date1_ms;

    // Convert back to days and return
    return Math.round(difference_ms / one_day);
}
function min_date(all_dates) {
    var min_dt = all_dates[0],
        min_dtObj = new Date(all_dates[0]);
    all_dates.forEach(function (dt, index) {
        if (new Date(dt) < min_dtObj) {
            min_dt = dt;
            min_dtObj = new Date(dt);
        }
    });
    return min_dt;
}
function convertDate(date) {
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth()+1).toString();
    var dd  = date.getDate().toString();

    var mmChars = mm.split('');
    var ddChars = dd.split('');

    return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
}
function loadingOut(loading) {
    setTimeout(() => loading.out(), 0);
}
function getMiddleDates(startDate, endDate) {
    var dates = [], currentDate = startDate;
    while (currentDate <= endDate) {
        dates.push(currentDate);
        currentDate = addDays.call(currentDate, 1);
    }
    return dates;
};
function addDays(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
