var redirect_path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');;

$(".click_location_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the other accommodations are active
            $("#accom_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_affect_"+type_id).removeClass('active');
            $("#accom_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_face_"+type_id).removeClass('active');
            $("#accom_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_affect_"+type_id).removeClass('active');
            $("#act_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_face_"+type_id).removeClass('active');
            $("#act_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_sad_"+type_id).removeClass('active');
            $("#accom_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_face_"+type_id).removeClass('active');
            $("#accom_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_sad_"+type_id).removeClass('active');
            $("#act_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_face_"+type_id).removeClass('active');
            $("#act_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_affect_"+type_id).removeClass('active');
            $("#accom_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_sad_"+type_id).removeClass('active');
            $("#accom_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_affect_"+type_id).removeClass('active');
            $("#act_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_sad_"+type_id).removeClass('active');
            $("#act_location_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_affect_"+type_id).removeClass('active');
            $("#accom_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_face_"+type_id).removeClass('active');
            $("#accom_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_location_sad_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_location_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_affect_"+type_id).removeClass('active');
            $("#act_location_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_face_"+type_id).removeClass('active');
            $("#act_location_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_location_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_location_sad_"+type_id).removeClass('active');
        }
    }
});

$(".click_staff_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_affect_"+type_id).removeClass('active');
            $("#accom_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_face_"+type_id).removeClass('active');
            $("#accom_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_affect_"+type_id).removeClass('active');
            $("#act_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_face_"+type_id).removeClass('active');
            $("#act_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_sad_"+type_id).removeClass('active');
            $("#accom_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_face_"+type_id).removeClass('active');
            $("#accom_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_sad_"+type_id).removeClass('active');
            $("#act_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_face_"+type_id).removeClass('active');
            $("#act_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_affect_"+type_id).removeClass('active');
            $("#accom_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_sad_"+type_id).removeClass('active');
            $("#accom_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_affect_"+type_id).removeClass('active');
            $("#act_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_sad_"+type_id).removeClass('active');
            $("#act_staff_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_affect_"+type_id).removeClass('active');
            $("#accom_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_face_"+type_id).removeClass('active');
            $("#accom_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_staff_sad_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_staff_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_affect_"+type_id).removeClass('active');
            $("#act_staff_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_face_"+type_id).removeClass('active');
            $("#act_staff_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_staff_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_staff_sad_"+type_id).removeClass('active');
        }
    }
});

$(".click_facilities_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_affect_"+type_id).removeClass('active');
            $("#accom_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_face"+type_id).removeClass('active');
            $("#accom_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_happy"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_affect_"+type_id).removeClass('active');
            $("#act_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_face_"+type_id).removeClass('active');
            $("#act_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_sad_"+type_id).removeClass('active');
            $("#accom_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_face_"+type_id).removeClass('active');
            $("#accom_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_sad_"+type_id).removeClass('active');
            $("#act_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_face_"+type_id).removeClass('active');
            $("#act_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_affect_"+type_id).removeClass('active');
            $("#accom_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_sad_"+type_id).removeClass('active');
            $("#accom_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_affect_"+type_id).removeClass('active');
            $("#act_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_sad_"+type_id).removeClass('active');
            $("#act_facilities_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_affect_"+type_id).removeClass('active');
            $("#accom_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_face_"+type_id).removeClass('active');
            $("#accom_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_facilities_sad_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_facilities_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_affect_"+type_id).removeClass('active');
            $("#act_facilities_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_face_"+type_id).removeClass('active');
            $("#act_facilities_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_facilities_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_facilities_sad_"+type_id).removeClass('active');
        }
    }
});

$(".click_cleanliness_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cleanliness_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_affect_"+type_id).removeClass('active');
            $("#accom_cleanliness_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_face_"+type_id).removeClass('active');
            $("#accom_cleanliness_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cleanliness_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_sad_"+type_id).removeClass('active');
            $("#accom_cleanliness_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_face_"+type_id).removeClass('active');
            $("#accom_cleanliness_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cleanliness_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_affect_"+type_id).removeClass('active');
            $("#accom_cleanliness_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_sad_"+type_id).removeClass('active');
            $("#accom_cleanliness_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cleanliness_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_affect_"+type_id).removeClass('active');
            $("#accom_cleanliness_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_face_"+type_id).removeClass('active');
            $("#accom_cleanliness_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cleanliness_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cleanliness_sad_"+type_id).removeClass('active');
        }
    }
});

$(".click_comfort_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_comfort_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_affect_"+type_id).removeClass('active');
            $("#accom_comfort_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_face_"+type_id).removeClass('active');
            $("#accom_comfort_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_comfort_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_sad_"+type_id).removeClass('active');
            $("#accom_comfort_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_face_"+type_id).removeClass('active');
            $("#accom_comfort_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_comfort_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_affect_"+type_id).removeClass('active');
            $("#accom_comfort_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_sad_"+type_id).removeClass('active');
            $("#accom_comfort_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_comfort_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_affect_"+type_id).removeClass('active');
            $("#accom_comfort_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_face_"+type_id).removeClass('active');
            $("#accom_comfort_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_comfort_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_comfort_sad_"+type_id).removeClass('active');
        }
    }
});

$(".click_cost_rate").click(function() {
    var data_id = $(this).attr('id');
    var str = data_id.split('_');
    var type_id = str[3];
    var parent_id = '#' + data_id;
    if (str[2] == 'sad') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the other accommodations are active
            $("#accom_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_affect_"+type_id).removeClass('active');
            $("#accom_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_face_"+type_id).removeClass('active');
            $("#accom_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_affect_"+type_id).removeClass('active');
            $("#act_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_face_"+type_id).removeClass('active');
            $("#act_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'affect') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_sad_"+type_id).removeClass('active');
            $("#accom_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_face_"+type_id).removeClass('active');
            $("#accom_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_sad_"+type_id).removeClass('active');
            $("#act_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_face_"+type_id).removeClass('active');
            $("#act_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'face') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_affect_"+type_id).removeClass('active');
            $("#accom_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_sad_"+type_id).removeClass('active');
            $("#accom_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_happy_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_affect_"+type_id).removeClass('active');
            $("#act_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_sad_"+type_id).removeClass('active');
            $("#act_cost_happy_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_happy_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_happy_"+type_id).removeClass('active');
        }
    } else if (str[2] == 'happy') {
        if($(parent_id).hasClass('active')) {
            $(parent_id + ' img').first().attr('class', 'inactive');
            $(parent_id + ' img:nth-child(2)').attr('class', 'active');   
            $(parent_id).removeClass('active');
        } else {
            $(parent_id + ' img').first().attr('class', 'active');
            $(parent_id + ' img:nth-child(2)').attr('class', 'inactive');   
            $(parent_id).addClass('active');
            //make the others are active
            $("#accom_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_affect_"+type_id).removeClass('active');
            $("#accom_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_face_"+type_id).removeClass('active');
            $("#accom_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#accom_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#accom_cost_sad_"+type_id).removeClass('active');
            //make the other activities are active
            $("#act_cost_affect_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_affect_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_affect_"+type_id).removeClass('active');
            $("#act_cost_face_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_face_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_face_"+type_id).removeClass('active');
            $("#act_cost_sad_"+type_id + ' img').first().attr('class', 'inactive');
            $("#act_cost_sad_"+type_id + ' img:nth-child(2)').attr('class', 'active');
            $("#act_cost_sad_"+type_id).removeClass('active');
        }
    }
});

$(".submit").click(function() {
    var data = {
      "purpose": $("input[name='purpose']:checked").val(),
      "friends": $("input[name='friends']:checked").val(),
      "accom_reviews": [],
      "act_reviews": [],
      "accom_counts": 0,
      "act_counts": 0,
      "review_flag": 1
    };
    if (accom_count != 0) {
        for (var i = 0; i < accom_count; i ++) {
            if ($("#accom_review_text_"+i).val() != '') {
                var accom_review = {
                    "id": "",
                    "review_text": $("#accom_review_text_"+i).val(),
                    "location": "",
                    "staff": "",
                    "facilities": '',
                    "cleanliness": '',
                    "comfort": '',
                    "cost": ''
                };
                var location_str = $("#accom_location"+i).children('.active').attr('id').split("_");
                var staff_str = $("#accom_staff"+i).children('.active').attr('id').split("_");
                var facilities_str = $("#accom_facilities"+i).children('.active').attr('id').split("_");
                var cleanliness_str = $("#accom_cleanliness"+i).children('.active').attr('id').split("_");
                var comfort_str = $("#accom_comfort"+i).children('.active').attr('id').split("_");
                var cost_str = $("#accom_cost"+i).children('.active').attr('id').split("_");
                
                accom_review.id = location_str[3];
                accom_review.location = location_str[2];
                accom_review.staff = staff_str[2];
                accom_review.facilities = facilities_str[2];
                accom_review.cleanliness = cleanliness_str[2];
                accom_review.comfort = comfort_str[2];
                accom_review.cost = cost_str[2];
                data.accom_reviews.push(accom_review);
                data.accom_counts += 1;
            }
        }
    }
    if (act_count != 0) {
        for (var i = 0; i < act_count; i ++) {
            if ($("#act_review_text_"+i).val() != '') {
                var act_review = {
                    "id": "",
                    "review_text": $("#act_review_text_"+i).val(),
                    "location": "",
                    "staff": "",
                    "facilities": '',
                    "cost": ''
                };
                var location_str = $("#act_location"+i).children('.active').attr('id').split("_");
                var staff_str = $("#act_staff"+i).children('.active').attr('id').split("_");
                var facilities_str = $("#act_facilities"+i).children('.active').attr('id').split("_");
                var cost_str = $("#act_cost"+i).children('.active').attr('id').split("_");
                
                act_review.id = location_str[3];
                act_review.location = location_str[2];
                act_review.staff = staff_str[2];
                act_review.facilities = facilities_str[2];
                act_review.cost = cost_str[2];
                data.act_reviews.push(act_review);
                data.act_counts += 1;
            }
        }
    }
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: '/save_review',
        data: {data: data, id: review_id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            console.log(e);
            window.location = redirect_path + "/confirm_review?id="+review_id
        }
    });
});