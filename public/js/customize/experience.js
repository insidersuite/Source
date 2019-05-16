var step2_show = false;
var step5_show = false;

$("#next_step0").click(function () {
  step2_show = true;
  $(".step0").fadeOut(1000);
  $(".step1").fadeIn(1000);
  setTimeout(function () {
    if (step2_show) {
      $(".step1").fadeOut(1000);
      $(".step3").fadeIn(1000);
    }
  }, 3000);
});

$("#next_step2").click(function () {
  $(".step2").fadeOut(1000);
  $(".step3").fadeIn(1000);
});

$("#next_step3").click(function () {
  step5_show = true;
  $(".step3").fadeOut(1000);
  $(".step4").fadeIn(1000);
  setTimeout(function () {
    if (step5_show) {
      $(".step4").fadeOut(1000);
      $(".step5").fadeIn(1000);
    }
  }, 3000);
});

$("#avatar_button").click(function() {
  $("#avatarUpload").trigger('click');
});

$("#avatar_link").click(function() {
  $("#avatarUpload").trigger('click');
});

$("#avatarUpload").on('change', function() {
  var formdata = new FormData();
  formdata.append('file', this.files[0]);
  $.ajax({
    type: 'post',
    dataType: 'json',
    url: 'profile_photo',
    data: formdata,
    processData: false,
    contentType: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (e) {
      $("#new_img").attr('src', e);
    }
  });
});

var ms = $('#indicate').magicSuggest({
  placeholder: "Indicate a country",
  allowDuplicates: false,
  useTabKey: true
});

var ts = $("#travel_buddy").magicSuggest({
  placeholder: "Indicate a email address",
  allowDuplicates: false,
  useTabKey: true
});

var as = $("#activity_name").magicSuggest({
  placeholder: "Input activity names",
  allowDuplicates: false,
  useTabKey: true
});

$("#next_step5").click(function () {
  var data = {
      "dream_countries": ms.getValue(),
      "often_country" : $("#indicate_travel").val(),
      "travel_buddy": ts.getValue(),
      "activity_name": as.getValue()
  };    
  $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'host_experience_data',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
            $(".step5").fadeOut(1000);
            $(".step7").fadeIn(1000);
        }
  });
});

$("#next_step5_skip").click(function () {
    $(".step5").fadeOut(1000);
    $(".step7").fadeIn(1000);    
});

$("#back_step7").click(function () {
  $(".step7").fadeOut(1000);
  $(".step5").fadeIn(1000);
});

$("#back_step5").click(function () {
  $(".step5").fadeOut(1000);
  $(".step4").fadeIn(1000);
  setTimeout(function () {
    if (step5_show) {
      $(".step5").fadeOut(1000);
      $(".step4").fadeIn(1000);
    }
  }, 3000);
});

$("#back_step4").click(function () {
  $(".step4").fadeOut(1000);
  $(".step3").fadeIn(1000);
  step5_show = false;
});

$("#back_step3").click(function () {
  $(".step3").fadeOut(1000);
  $(".step1").fadeIn(1000);
  setTimeout(function () {
    if (step2_show) {
      $(".step3").fadeOut(1000);
      $(".step1").fadeIn(1000);
    }
  }, 3000);
});

$("#back_step2").click(function () {
  $(".step2").fadeOut(1000);
  $(".step1").fadeIn(1000);
  setTimeout(function () {
    if (step2_show) {
      $(".step1").fadeOut(1000);
      $(".step2").fadeIn(1000);
    }
  }, 3000);
});

$("#back_step1").click(function () {
  $(".step1").fadeOut(1000);
  $(".step0").fadeIn(1000);
  step2_show = false;
});

$("#create_experience").click(function () {
    setTimeout(function(){window.location = redirect_path + "/offers";}, 1000);
});
